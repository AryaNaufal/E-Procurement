<?php

namespace App;

use App\ResponseMessage;
use Exception;

class DocumentService
{
	private $db;

	public function __construct()
	{
		$this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}

	public function getDocuments(): array
	{
		$sql = "SELECT * FROM documents";
		try {
			$document = $this->db->squery($sql, []);
			return ResponseMessage::createSuccessResponse(
				message: 'Data katalog berhasil diambil',
				data: $document
			);
		} catch (Exception) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server'
			);
		}
	}

	public function getDocument(string $userId): array
	{
		$sql = "SELECT * FROM documents WHERE id = :user_id";
		try {
			$document = $this->db->squery($sql, ['user_id' => $userId]);
			if (empty($document)) {
				return ResponseMessage::createErrorResponse(
					message: 'Dokumen tidak ditemukan'
				);
			}
			return ResponseMessage::createSuccessResponse(
				message: 'Dokumen  berhasil diambil',
				data: $document
			);
		} catch (Exception) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server'
			);
		}
	}

	public function getProposal(string $userId, string $tenderId): array
	{
		$sql = "SELECT proposal FROM participants WHERE user_id = :user_id AND tender_id = :tender_id";
		try {
			$proposal = $this->db->squery($sql, ['user_id' => $userId, 'tender_id' => $tenderId]);
			return ResponseMessage::createSuccessResponse(
				message: 'Proposal berhasil diambil',
				data: $proposal
			);
		} catch (Exception) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server'
			);
		}
	}

	public function postDocument(string $userId, array $file, string $type): array
	{
		// Validasi file ekstensi dan MIME
		$allowedExtensions = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png'];
		$allowedMimeTypes = [
			'application/msword',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'application/vnd.ms-excel',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'application/pdf',
			'image/jpeg',
			'image/png'
		];

		$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
		$mimeType = mime_content_type($file['tmp_name']);

		if (!in_array($extension, $allowedExtensions) || !in_array($mimeType, $allowedMimeTypes)) {
			return ResponseMessage::createErrorResponse(
				message: 'Format file tidak diperbolehkan'
			);
		}

		// Validasi dokumen type
		$validFields = [
			'akta_perubahan',
			'sk_menkumham',
			'ktp_pengurus_perusahaan',
			'surat_keterangan_domisili_perusahaan',
			'siup',
			'tdp',
			'npwp',
			'pkp',
			'spt',
			'laporan_keuangan',
			'rekening_koran',
			'sertifikasi',
			'list_daftar_pengalaman_kerja',
			'list_tenaga_ahli',
			'akta_pendirian'
		];

		if (!in_array($type, $validFields)) {
			return ResponseMessage::createErrorResponse(
				message: 'Tipe dokumen tidak dikenali'
			);
		}

		try {
			$sqlCheck = "SELECT * FROM documents WHERE user_id = :user_id";
			$existingDocument = $this->db->squery($sqlCheck, ['user_id' => $userId]);

			// Buat nama file baru yang unik
			$originalName = pathinfo($file['name'], PATHINFO_FILENAME);
			$safeName = preg_replace('/[^a-zA-Z0-9-_]/', '_', strtolower($originalName));
			$newFileName = "document_{$userId}_{$safeName}.{$extension}";
			$filePath = ROOT_PATH . 'assets/document/' . $newFileName;

			if (!empty($existingDocument)) {
				$oldFile = $existingDocument[0][$type] ?? null;

				// Hapus file lama jika ada
				if ($oldFile && file_exists(ROOT_PATH . 'assets/document/' . $oldFile)) {
					unlink(ROOT_PATH . 'assets/document/' . $oldFile);
				}

				move_uploaded_file($file['tmp_name'], $filePath);

				$sqlUpdate = "UPDATE documents SET $type = :value WHERE user_id = :user_id";
				$this->db->squery($sqlUpdate, [
					'value' => $newFileName,
					'user_id' => $userId
				]);

				return ResponseMessage::createSuccessResponse(
					message: 'Dokumen berhasil diperbarui'
				);
			}

			// Insert pertama kali
			move_uploaded_file($file['tmp_name'], $filePath);

			// Siapkan data insert
			$fields = array_fill_keys($validFields, '');
			$fields[$type] = $newFileName;
			$fields['user_id'] = $userId;

			$columns = implode(', ', array_keys($fields));
			$placeholders = ':' . implode(', :', array_keys($fields));

			$sqlInsert = "INSERT INTO documents ($columns) VALUES ($placeholders)";
			$this->db->squery($sqlInsert, $fields);

			return ResponseMessage::createSuccessResponse(
				message: 'Dokumen berhasil disimpan'
			);
		} catch (Exception) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server'
			);
		}
	}

	public function postProposal(string $userId, string $tenderId, array $file): array
	{
		$allowedTypes = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png'];
		$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

		if (!in_array($extension, $allowedTypes)) {
			return ResponseMessage::createErrorResponse(
				message: 'Format file tidak diperbolehkan'
			);
		}

		$uploadDir = ROOT_PATH . 'assets/document/proposal/';
		$filePath = sprintf('%sproposal_%s_%s.%s', $uploadDir, $userId, $tenderId, $extension);

		try {
			$proposalCheck = $this->db->squery("SELECT proposal FROM participants WHERE tender_id = :tender_id", ['tender_id' => $tenderId]);

			if (empty($proposalCheck)) {
				$this->db->squery(
					"INSERT INTO participant (user_id, tender_id, registration_date, proposal) 
					VALUES (:user_id, :tender_id, :registration_date, :proposal)",
					[
						'user_id' => $userId,
						'tender_id' => $tenderId,
						'registration_date' => date('Y-m-d H:i:s'),
						'proposal' => sprintf('%sproposal_%s_%s.%s', $uploadDir, $userId, $tenderId, $extension)
					]
				);
			}

			$this->db->squery(
				"UPDATE participants SET proposal = :proposal WHERE user_id = :user_id AND tender_id = :tender_id",
				[
					'user_id' => $userId,
					'tender_id' => $tenderId,
					'proposal' => sprintf('proposal_%s_%s.%s', $userId, $tenderId, $extension)
				]
			);

			$this->db->squery(
				"UPDATE documents SET proposal = :proposal WHERE user_id = :user_id",
				[
					'user_id' => $userId,
					'proposal' => sprintf('proposal_%s_%s.%s', $userId, $tenderId, $extension)
				]
			);

			move_uploaded_file($file['tmp_name'], $filePath);
			return ResponseMessage::createSuccessResponse(
				message: 'Berhasil upload proposal'
			);
		} catch (Exception $e) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server' . $e
			);
		}
	}
}
