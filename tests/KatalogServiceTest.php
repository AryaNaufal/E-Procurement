<?php

use PHPUnit\Framework\TestCase;
use App\DB;
use App\KatalogService;
use App\ResponseMessage;

class KatalogServiceTest extends TestCase
{
    private $katalogService;
    private $dbMock;

    protected function setUp(): void
    {
        error_reporting(E_ALL);
        // Mock DB class
        $this->dbMock = $this->createMock(DB::class);

        $this->katalogService = $this->getMockBuilder(KatalogService::class)
            ->onlyMethods(['__construct', 'savePhoto', 'saveDocument'])
            ->disableOriginalConstructor()
            ->getMock();

        $reflection = new ReflectionClass($this->katalogService);
        $dbProp = $reflection->getProperty('db');
        $dbProp->setAccessible(true);
        $dbProp->setValue($this->katalogService, $this->dbMock);
    }

    public function testGetKatalogsSuccess()
    {
        $nockedData = [
            [
                'id' => 1,
                'user_id' => '1',
                'kode_produk' => 'A123',
                'produk_solusi' => 'Produk A',
                'tkdn_produk' => '50',
                'jenis' => 'import',
                'harga' => '10000',
                'expired_harga' => '20000',
                'kategori' => 'Electric',
                'deskripsi' => 'description',
                'gambar' => 'photo_123.jpg',
                'dokumen' => 'doc_123.pdf'
            ],
            [
                'id' => 2,
                'user_id' => '2',
                'kode_produk' => 'B123',
                'produk_solusi' => 'Produk B',
                'tkdn_produk' => '70',
                'jenis' => 'lokal',
                'harga' => '20000',
                'expired_harga' => '30000',
                'kategori' => 'Alat Tulis Kantor',
                'deskripsi' => 'description',
                'gambar' => 'photo_123.jpg',
                'dokumen' => 'doc_123.pdf'
            ]
        ];

        $this->dbMock->method('squery')->willReturn($nockedData);

        $response = $this->katalogService->getKatalogs();

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Data katalog berhasil diambil',
            data: $nockedData
        ), $response);
    }

    public function testGetKatalogsFail()
    {
        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->katalogService->getKatalogs();

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testGetKatalogByIdSuccess()
    {
        $mockedData = [[
            'id' => '1',
            'user_id' => '1',
            'kode_produk' => 'B123',
            'produk_solusi' => 'Produk B',
            'tkdn_produk' => '70',
            'jenis' => 'lokal',
            'harga' => '20000',
            'expired_harga' => '30000',
            'kategori' => 'Alat Tulis Kantor',
            'deskripsi' => 'description',
            'gambar' => 'photo_123.jpg',
            'dokumen' => 'doc_123.pdf'
        ]];

        $this->dbMock->method('squery')->willReturnCallback(function ($sql, $params) use ($mockedData) {
            return $params['id'] === '123' ? $mockedData : null;
        });

        $response = $this->katalogService->getKatalogById('123');

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Data katalog berhasil diambil',
            data: $mockedData
        ), $response);
    }

    public function testGetKatalogByIdNotFound()
    {
        $this->dbMock->method('squery')->willReturn(null);

        $response = $this->katalogService->getKatalogById('999');

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Data katalog tidak ditemukan'
        ), $response);
    }

    public function testGetKatalogByIdFail()
    {
        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->katalogService->getKatalogById('123');

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testPostKatalogSuccess()
    {
        $data = [
            'user_id' => 'u1',
            'kode_produk' => 'P001',
            'nama_produk' => 'Solusi X',
            'tkdn_produk' => '40%',
            'jenis_produk' => 'Hardware',
            'harga_produk' => 1000000,
            'expired_harga' => '2025-12-31',
            'kategori_produk' => 'Elektronik',
            'deskripsi_produk' => 'Deskripsi produk',
            'photo' => ['tmp_name' => '/assets/katalog/image/photo_123.jpg', 'error' => 0, 'size' => 50000, 'name' => 'photo_123.jpg'],
            'document' => ['tmp_name' => '/assets/katalog/document/doc_123.pdf', 'error' => 0, 'size' => 100000, 'name' => 'doc_123.pdf'],
        ];

        $this->katalogService->method('savePhoto')->willReturn('photo_123.jpg');
        $this->katalogService->method('saveDocument')->willReturn('doc_123.pdf');

        $this->dbMock->expects($this->once())
            ->method('squery')
            ->with(
                $this->stringContains('INSERT INTO katalog'),
                $this->arrayHasKey('kode_produk')
            );

        $response = $this->katalogService->postKatalog($data);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Katalog berhasil ditambahkan'
        ), $response);
    }

    public function testPostKatalogFail()
    {
        $data = [
            'user_id' => 'u1',
            'kode_produk' => 'P001',
            'nama_produk' => 'Solusi X',
            'tkdn_produk' => '40%',
            'jenis_produk' => 'Hardware',
            'harga_produk' => 1000000,
            'expired_harga' => '2025-12-31',
            'kategori_produk' => 'Elektronik',
            'deskripsi_produk' => 'Deskripsi produk',
            'photo' => ['tmp_name' => '/assets/katalog/image/photo_123.jpg', 'error' => 0, 'size' => 50000, 'name' => 'photo_123.jpg'],
            'document' => ['tmp_name' => '/assets/katalog/document/doc_123.pdf', 'error' => 0, 'size' => 100000, 'name' => 'doc_123.pdf'],
        ];

        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->katalogService->postKatalog($data);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testPutKatalogSuccess()
    {
        $katalogId = '1';
        $existingData = [[
            'id' => $katalogId,
            'gambar' => 'gambar_lama.jpg',
            'dokumen' => 'dokumen_lama.pdf'
        ]];

        $inputData = [
            'kode_produk' => 'A123',
            'nama_produk' => 'Produk A',
            'tkdn_produk' => '50',
            'jenis_produk' => 'import',
            'harga_produk' => '10000',
            'expired_harga' => '20000',
            'kategori_produk' => 'Electric',
            'deskripsi_produk' => 'description',
            'gambar' => ['error' => 0, 'tmp_name' => 'gambar_baru.pdf'],
            'dokumen' => ['error' => 0, 'tmp_name' => 'dokumen_baru.pdf']
        ];

        $this->dbMock->method('squery')->willReturn($existingData);

        $this->katalogService->method('savePhoto')->willReturn('gambar_baru.jpg');
        $this->katalogService->method('saveDocument')->willReturn('dokumen_baru.pdf');

        $this->dbMock->expects($this->once())
            ->method('supdate')
            ->with(
                $this->stringContains('UPDATE katalog'),
                $this->callback(function ($params) {
                    return $params['gambar'] === 'gambar_baru.jpg' &&
                        $params['dokumen'] === 'dokumen_baru.pdf' &&
                        $params['id'] === '1';
                })
            );

        $response = $this->katalogService->putKatalog($katalogId, $inputData);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Katalog berhasil diubah'
        ), $response);
    }

    public function testPutKatalogNotFound()
    {
        $katalogId = '999';
        $inputData = [
            'kode_produk' => 'A123',
            'nama_produk' => 'Produk A',
            'tkdn_produk' => '50',
            'jenis_produk' => 'import',
            'harga_produk' => '10000',
            'expired_harga' => '20000',
            'kategori_produk' => 'Electric',
            'deskripsi_produk' => 'description',
            'photo' => ['error' => 1],
            'document' => ['error' => 1]
        ];

        $this->dbMock->method('squery')->willReturn([]);

        $response = $this->katalogService->putKatalog($katalogId, $inputData);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Data katalog tidak ditemukan'
        ), $response);
    }

    public function testPutKatalogFail()
    {
        $katalogId = '1';
        $inputData =  [
            'kode_produk' => 'A123',
            'nama_produk' => 'Produk A',
            'tkdn_produk' => '50',
            'jenis_produk' => 'import',
            'harga_produk' => '10000',
            'expired_harga' => '20000',
            'kategori_produk' => 'Electric',
            'deskripsi_produk' => 'description',
            'photo' => ['error' => 1],
            'document' => ['error' => 1]
        ];

        $existingData = [[
            'id' => $katalogId,
            'kode_produk' => 'A123',
            'produk_solusi' => 'Produk A',
            'tkdn_produk' => '50',
            'jenis' => 'import',
            'harga' => '10000',
            'expired_harga' => '20000',
            'kategori' => 'Electric',
            'deskripsi' => 'description',
            'gambar' => 'photo_123.jpg',
            'dokumen' => 'doc_123.pdf'
        ]];

        $this->dbMock->method('squery')->willReturnCallback(function ($sql, $params) use ($existingData) {
            if (str_contains($sql, 'SELECT * FROM katalog')) {
                return $params['id'] === '1' ? $existingData : [];
            }
            return null;
        });

        $this->dbMock->method('supdate')->willThrowException(new Exception('DB update error'));

        $response = $this->katalogService->putKatalog($katalogId, $inputData);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testDeleteKatalogSuccess()
    {
        define('ROOT_PATH', __DIR__);
        $katalogId = '1';
        $gambar = 'gambar.jpg';
        $dokumen = 'dokumen.pdf';

        $this->dbMock->method('squery')->willReturn([
            ['gambar' => $gambar, 'dokumen' => $dokumen]
        ]);

        $this->dbMock->expects($this->once())
            ->method('sdelete')
            ->with(
                $this->stringContains('DELETE FROM katalog'),
                ['id' => $katalogId]
            )
            ->willReturn(true);

        $response = $this->katalogService->deleteKatalog($katalogId);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Katalog berhasil dihapus'
        ), $response);
    }

    public function testDeleteKatalogFail()
    {
        $katalogId = '3';

        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->katalogService->deleteKatalog($katalogId);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }
}
