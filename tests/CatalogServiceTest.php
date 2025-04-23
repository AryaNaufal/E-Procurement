<?php

use PHPUnit\Framework\TestCase;
use App\DB;
use App\CatalogService;
use App\ResponseMessage;

class CatalogServiceTest extends TestCase
{
    private $catalogService;
    private $dbMock;

    protected function setUp(): void
    {
        error_reporting(E_ALL);
        // Mock DB class
        $this->dbMock = $this->createMock(DB::class);

        $this->catalogService = $this->getMockBuilder(CatalogService::class)
            ->onlyMethods(['__construct', 'savePhoto', 'saveDocument'])
            ->disableOriginalConstructor()
            ->getMock();

        $reflection = new ReflectionClass($this->catalogService);
        $dbProp = $reflection->getProperty('db');
        $dbProp->setAccessible(true);
        $dbProp->setValue($this->catalogService, $this->dbMock);
    }

    public function testGetCatalogsSuccess()
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

        $response = $this->catalogService->getCatalogs();

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Data katalog berhasil diambil',
            data: $nockedData
        ), $response);
    }

    public function testGetCatalogsFail()
    {
        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->catalogService->getCatalogs();

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testGetCatalogByIdSuccess()
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

        $response = $this->catalogService->getCatalogById('123');

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Data katalog berhasil diambil',
            data: $mockedData
        ), $response);
    }

    public function testGetCatalogByIdNotFound()
    {
        $this->dbMock->method('squery')->willReturn(null);

        $response = $this->catalogService->getCatalogById('999');

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Data katalog tidak ditemukan'
        ), $response);
    }

    public function testGetCatalogByIdFail()
    {
        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->catalogService->getCatalogById('123');

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testPostCatalogSuccess()
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

        $this->catalogService->method('savePhoto')->willReturn('photo_123.jpg');
        $this->catalogService->method('saveDocument')->willReturn('doc_123.pdf');

        $this->dbMock->expects($this->once())
            ->method('squery')
            ->with(
                $this->stringContains('INSERT INTO katalog'),
                $this->arrayHasKey('kode_produk')
            );

        $response = $this->catalogService->postCatalog($data);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Catalog berhasil ditambahkan'
        ), $response);
    }

    public function testPostCatalogFail()
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

        $response = $this->catalogService->postCatalog($data);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testPutCatalogSuccess()
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

        $this->catalogService->method('savePhoto')->willReturn('gambar_baru.jpg');
        $this->catalogService->method('saveDocument')->willReturn('dokumen_baru.pdf');

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

        $response = $this->catalogService->putCatalog($katalogId, $inputData);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Catalog berhasil diubah'
        ), $response);
    }

    public function testPutCatalogNotFound()
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

        $response = $this->catalogService->putCatalog($katalogId, $inputData);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Data katalog tidak ditemukan'
        ), $response);
    }

    public function testPutCatalogFail()
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

        $response = $this->catalogService->putCatalog($katalogId, $inputData);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }

    public function testDeleteCatalogSuccess()
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

        $response = $this->catalogService->deleteCatalog($katalogId);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            message: 'Catalog berhasil dihapus'
        ), $response);
    }

    public function testDeleteCatalogFail()
    {
        $katalogId = '3';

        $this->dbMock->method('squery')->willThrowException(new Exception('DB error'));

        $response = $this->catalogService->deleteCatalog($katalogId);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            message: 'Terjadi kesalahan pada server'
        ), $response);
    }
}
