<?php

namespace App;

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
      return $this->createSuccessResponse('Data katalog berhasil diambil', $document);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function getDocument($id)
  {
    $sql = "SELECT * FROM document WHERE id = :id";
    try {
      $document = $this->db->squery($sql, ['id' => $id]);
      if (empty($document)) {
        return $this->createErrorResponse('Dokumen tidak ditemukan');
      }
      return $this->createSuccessResponse('Dokumen  berhasil diambil', $document);
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server');
    }
  }

  public function postDocument($id, $file, $type)
  {
    $allowedTypes = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png'];
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedTypes)) {
      return $this->createErrorResponse('Format file tidak diperbolehkan');
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
              $updateFields['akta_perubahan'] = $filePath;
            }
            break;

          case 'sk_menkumham':
            if ($existingDocument[0]['sk_menkumham'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['sk_menkumham'] = $filePath;
            }
            break;

          case 'ktp_pengurus_perusahaan':
            if ($existingDocument[0]['ktp_pengurus_perusahaan'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['ktp_pengurus_perusahaan'] = $filePath;
            }
            break;

          case 'surat_keterangan_domisili_perusahaan':
            if ($existingDocument[0]['surat_keterangan_domisili_perusahaan'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['surat_keterangan_domisili_perusahaan'] = $filePath;
            }
            break;

          case 'siup':
            if ($existingDocument[0]['siup'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['siup'] = $filePath;
            }
            break;

          case 'tdp':
            if ($existingDocument[0]['tdp'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['tdp'] = $filePath;
            }
            break;

          case 'npwp':
            if ($existingDocument[0]['npwp'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['npwp'] = $filePath;
            }
            break;

          case 'pkp':
            if ($existingDocument[0]['pkp'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['pkp'] = $filePath;
            }
            break;

          case 'spt':
            if ($existingDocument[0]['spt'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['spt'] = $filePath;
            }
            break;

          case 'laporan_keuangan':
            if ($existingDocument[0]['laporan_keuangan'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['laporan_keuangan'] = $filePath;
            }
            break;

          case 'rekening_koran':
            if ($existingDocument[0]['rekening_koran'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['rekening_koran'] = $filePath;
            }
            break;

          case 'sertifikasi':
            if ($existingDocument[0]['sertifikasi'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['sertifikasi'] = $filePath;
            }
            break;

          case 'list_daftar_pengalaman_kerja':
            if ($existingDocument[0]['list_daftar_pengalaman_kerja'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['list_daftar_pengalaman_kerja'] = $filePath;
            }
            break;

          case 'list_tenaga_ahli':
            if ($existingDocument[0]['list_tenaga_ahli'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['list_tenaga_ahli'] = $filePath;
            }
            break;

          case 'akta_pendirian':
            if ($existingDocument[0]['akta_pendirian'] != $filePath) {
              move_uploaded_file($file['tmp_name'], $filePath);
              $updateFields['akta_pendirian'] = $filePath;
            }
            break;

          case 'proposal':
            if ($existingDocument[0]['proposal'] != $filePath) {
              move_uploaded_file($file['tmp_name'], ROOT_PATH . "assets/document/proposal/" . basename($file['name']));
              $updateFields['proposal'] = $filePath;
            }
            break;

          default:
            return $this->createErrorResponse('Invalid file type');
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

          // Hapus file lama jika ada perubahan
          foreach ($updateFields as $field => $filePath) {
            if ($existingDocument[$field] != basename($filePath)) {
              if ($field === 'proposal' && file_exists(ROOT_PATH . "assets/document/proposal/" . $existingDocument[$field])) {
                unlink(ROOT_PATH . "assets/document/proposal/" . $existingDocument[$field]);
              } else if (file_exists(ROOT_PATH . "assets/document/" . $existingDocument[$field])) {
                unlink(ROOT_PATH . "assets/document/" . $existingDocument[$field]);
              }
            }
            $updateFields[$field] = basename($filePath);
          }

          $this->db->squery($sqlUpdate, $updateFields);

          return $this->createSuccessResponse('Dokumen berhasil diperbarui');
        }

        return $this->createSuccessResponse('Dokumen sudah ada, tidak ada perubahan yang dilakukan');
      }

      // Jika dokumen belum ada, lakukan insert baru
      move_uploaded_file($file['tmp_name'], $filePath);

      // Menyimpan file pertama kali sesuai dengan type yang diterima
      $sqlInsert = "INSERT INTO document (user_id, akta_perubahan, sk_menkumham, ktp_pengurus_perusahaan, surat_keterangan_domisili_perusahaan, siup, tdp, npwp, pkp, spt, laporan_keuangan, rekening_koran, sertifikasi, list_daftar_pengalaman_kerja, list_tenaga_ahli, akta_pendirian, proposal) 
                  VALUES (:user_id, :akta_perubahan, :sk_menkumham, :ktp_pengurus_perusahaan, :surat_keterangan_domisili_perusahaan, :siup, :tdp, :npwp, :pkp, :spt, :laporan_keuangan, :rekening_koran, :sertifikasi, :list_daftar_pengalaman_kerja, :list_tenaga_ahli, :akta_pendirian, :proposal)";
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
        'akta_pendirian' => ($type == 'akta_pendirian') ? basename($filePath) : '',
        'proposal' => ($type == 'proposal') ? basename($filePath) : '',
      ]);

      return $this->createSuccessResponse('Dokumen berhasil disimpan');
    } catch (Exception $e) {
      return $this->createErrorResponse('Terjadi kesalahan pada server' . $e->getMessage());
    }
  }

  private function createSuccessResponse(string $message, array $data = []): array
  {
    return [
      'status' => 'success',
      'message' => $message,
      'data' => $data
    ];
  }

  private function createErrorResponse(string $message): array
  {
    return [
      'status' => 'error',
      'message' => $message
    ];
  }
}
