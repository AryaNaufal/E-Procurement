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

	public function getDocuments()
	{
		$sql = "SELECT * FROM document";
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

	public function getDocument($id)
	{
		$sql = "SELECT * FROM document WHERE id = :id";
		try {
			$document = $this->db->squery($sql, ['id' => $id]);
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

	public function getProposal(string $id)
	{
		$sql = "SELECT proposal FROM participant WHERE tender_id = :id";
		try {
			$proposal = $this->db->squery($sql, ['id' => $id]);
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

	public function postDocument($id, $file, $type)
	{
		$allowedTypes = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png'];
		$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

		if (!in_array($extension, $allowedTypes)) {
			return ResponseMessage::createErrorResponse(
				message: 'Format file tidak diperbolehkan'
			);
		}

		$sqlCheck = "SELECT * FROM document WHERE user_id = :id";
		try {
			$existingDocument = $this->db->squery($sqlCheck, ['id' => $id]);

			$filePath = ROOT_PATH . 'assets/document/' . basename($file['name']);

			if (!empty($existingDocument)) {
				$updateFields = [];

				// Cek dan perbarui field berdasarkan type yang diterima
				switch ($type) {
					case 'akta_perubahan':
						if ($existingDocument[0]['akta_perubahan'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['akta_perubahan'] = basename($filePath);
						}
						break;

					case 'sk_menkumham':
						if ($existingDocument[0]['sk_menkumham'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['sk_menkumham'] = basename($filePath);
						}
						break;

					case 'ktp_pengurus_perusahaan':
						if ($existingDocument[0]['ktp_pengurus_perusahaan'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['ktp_pengurus_perusahaan'] = basename($filePath);
						}
						break;

					case 'surat_keterangan_domisili_perusahaan':
						if ($existingDocument[0]['surat_keterangan_domisili_perusahaan'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['surat_keterangan_domisili_perusahaan'] = basename($filePath);
						}
						break;

					case 'siup':
						if ($existingDocument[0]['siup'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['siup'] = basename($filePath);
						}
						break;

					case 'tdp':
						if ($existingDocument[0]['tdp'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['tdp'] = basename($filePath);
						}
						break;

					case 'npwp':
						if ($existingDocument[0]['npwp'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['npwp'] = basename($filePath);
						}
						break;

					case 'pkp':
						if ($existingDocument[0]['pkp'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['pkp'] = basename($filePath);
						}
						break;

					case 'spt':
						if ($existingDocument[0]['spt'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['spt'] = basename($filePath);
						}
						break;

					case 'laporan_keuangan':
						if ($existingDocument[0]['laporan_keuangan'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['laporan_keuangan'] = basename($filePath);
						}
						break;

					case 'rekening_koran':
						if ($existingDocument[0]['rekening_koran'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['rekening_koran'] = basename($filePath);
						}
						break;

					case 'sertifikasi':
						if ($existingDocument[0]['sertifikasi'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['sertifikasi'] = basename($filePath);
						}
						break;

					case 'list_daftar_pengalaman_kerja':
						if ($existingDocument[0]['list_daftar_pengalaman_kerja'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['list_daftar_pengalaman_kerja'] = basename($filePath);
						}
						break;

					case 'list_tenaga_ahli':
						if ($existingDocument[0]['list_tenaga_ahli'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['list_tenaga_ahli'] = basename($filePath);
						}
						break;

					case 'akta_pendirian':
						if ($existingDocument[0]['akta_pendirian'] != $filePath) {
							move_uploaded_file($file['tmp_name'], $filePath);
							$updateFields['akta_pendirian'] = basename($filePath);
						}
						break;

					default:
						return ResponseMessage::createErrorResponse(
							message: 'Invalid file type'
						);
				}

				// Jika ada perubahan, lakukan update
				if (!empty($updateFields)) {
					$updateFields['user_id'] = $id;
					$sqlUpdate = "UPDATE document SET ";
					$sqlUpdate .= implode(", ", array_map(function ($field) {
						return "$field = :$field";
					}, array_keys($updateFields)));
					$sqlUpdate .= " WHERE user_id = $id";

					$existingDocument = $this->db->squery_single($sqlCheck, ['id' => $id]);

					$this->db->squery($sqlUpdate, $updateFields);

					return ResponseMessage::createSuccessResponse(
						message: 'Dokumen berhasil diperbarui'
					);
				}

				return ResponseMessage::createSuccessResponse(
					message: 'Dokumen sudah ada, tidak ada perubahan yang dilakukan'
				);
			}

			// Jika dokumen belum ada, lakukan insert baru
			move_uploaded_file($file['tmp_name'], $filePath);

			// Menyimpan file pertama kali sesuai dengan type yang diterima
			$sqlInsert = "INSERT INTO document (user_id, akta_perubahan, sk_menkumham, ktp_pengurus_perusahaan, surat_keterangan_domisili_perusahaan, siup, tdp, npwp, pkp, spt, laporan_keuangan, rekening_koran, sertifikasi, list_daftar_pengalaman_kerja, list_tenaga_ahli, akta_pendirian) 
                  VALUES (:user_id, :akta_perubahan, :sk_menkumham, :ktp_pengurus_perusahaan, :surat_keterangan_domisili_perusahaan, :siup, :tdp, :npwp, :pkp, :spt, :laporan_keuangan, :rekening_koran, :sertifikasi, :list_daftar_pengalaman_kerja, :list_tenaga_ahli, :akta_pendirian)";
			$this->db->squery($sqlInsert, [
				'user_id' => $id,
				'akta_perubahan' => ($type == 'akta_perubahan') ? basename($filePath) : '',
				'sk_menkumham' => ($type == 'sk_menkumham') ? basename($filePath) : '',
				'ktp_pengurus_perusahaan' => ($type == 'ktp_pengurus_perusahaan') ? basename($filePath) : '',
				'surat_keterangan_domisili_perusahaan' => ($type == 'surat_keterangan_domisili_perusahaan') ? basename($filePath) : '',
				'siup' => ($type == 'siup') ? basename($filePath) : '',
				'tdp' => ($type == 'tdp') ? basename($filePath) : '',
				'npwp' => ($type == 'npwp') ? basename($filePath) : '',
				'pkp' => ($type == 'pkp') ? basename($filePath) : '',
				'spt' => ($type == 'spt') ? basename($filePath) : '',
				'laporan_keuangan' => ($type == 'laporan_keuangan') ? basename($filePath) : '',
				'rekening_koran' => ($type == 'rekening_koran') ? basename($filePath) : '',
				'sertifikasi' => ($type == 'sertifikasi') ? basename($filePath) : '',
				'list_daftar_pengalaman_kerja' => ($type == 'list_daftar_pengalaman_kerja') ? basename($filePath) : '',
				'list_tenaga_ahli' => ($type == 'list_tenaga_ahli') ? basename($filePath) : '',
				'akta_pendirian' => ($type == 'akta_pendirian') ? basename($filePath) : ''
			]);

			return ResponseMessage::createSuccessResponse(
				message: 'Dokumen berhasil disimpan'
			);
		} catch (Exception) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server'
			);
		}
	}

	public function postProposal(string $tenderId, array $file): array
	{
		$allowedTypes = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png'];
		$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

		if (!in_array($extension, $allowedTypes)) {
			return ResponseMessage::createErrorResponse(
				message: 'Format file tidak diperbolehkan'
			);
		}

		$uploadDir = ROOT_PATH . 'assets/document/proposal/';
		$filePath = sprintf('%sproposal_%s_%s.%s', $uploadDir, $_SESSION['id'], $tenderId, $extension);

		try {
			$proposalCheck = $this->db->squery("SELECT proposal FROM participant WHERE tender_id = :tender_id", ['tender_id' => $tenderId]);

			if (empty($proposalCheck)) {
				$this->db->squery(
					"INSERT INTO participant (user_id, tender_id, registration_date, proposal) 
					VALUES (:user_id, :tender_id, :registration_date, :proposal)",
					[
						'user_id' => $_SESSION['id'],
						'tender_id' => $tenderId,
						'registration_date' => date('Y-m-d H:i:s'),
						'proposal' => sprintf('%sproposal_%s_%s.%s', $uploadDir, $_SESSION['id'], $tenderId, $extension)
					]
				);
			}

			$this->db->squery(
				"UPDATE participant SET proposal = :proposal WHERE user_id = :user_id AND tender_id = :tender_id",
				[
					'user_id' => $_SESSION['id'],
					'tender_id' => $tenderId,
					'proposal' => sprintf('proposal_%s_%s.%s', $_SESSION['id'], $tenderId, $extension)
				]
			);

			move_uploaded_file($file['tmp_name'], $filePath);
			return ResponseMessage::createSuccessResponse(
				message: 'Berhasil upload proposal'
			);
		} catch (Exception) {
			return ResponseMessage::createErrorResponse(
				message: 'Terjadi kesalahan pada server'
			);
		}
	}
}
