<?php

use PHPUnit\Framework\TestCase;
use App\DB;
use App\CompanyService;
use App\ResponseMessage;

class CompanyServiceTest extends TestCase
{
    private $dbMock;
    private $companyService;

    protected function setUp(): void
    {
        error_reporting(E_ALL);
        // Mock kelas DB
        $this->dbMock = $this->createMock(DB::class);

        // Injeksi DB ke dalam CompanyService secara manual
        $this->companyService = $this->getMockBuilder(CompanyService::class)
            ->onlyMethods(['__construct'])
            ->disableOriginalConstructor()
            ->getMock();

        // Override properti private $db secara langsung
        $reflection = new ReflectionClass($this->companyService);
        $dbProperty = $reflection->getProperty('db');
        $dbProperty->setAccessible(true);
        $dbProperty->setValue($this->companyService, $this->dbMock);
    }

    public function testGetCompanyDataSuccess(): void
    {
        $mockedData = [[
            'user_id' => '1',
            'name' => 'Antara',
            'type' => 'Perusahaan Negara Umum (PERUM)',
            'mail' => 'antara@example.com',
            'phone' => '1234',
            'mobile_phone' => '1234',
            'address' => 'asd',
            'provinsi' => '31',
            'kota' => '3171',
            'kecamatan' => '317102',
            'kelurahan' => '3171021001',
            'kategori' => 'Internet,Arsitektur,Software house,Perlengkapan Fotografi'
        ]];

        $this->dbMock->method('squery')->willReturnCallback(function ($sql, $params) use ($mockedData) {
            return $params['user_id'] === '1' ? $mockedData : null;
        });

        $response = $this->companyService->getCompanyData('1');

        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Data perusahaan berhasil ditemukan.', $response['message']);
        $this->assertArrayHasKey('data', $response);
    }

    public function testGetCompanyDataNotFound(): void
    {
        $this->dbMock->method('squery')
            ->willReturn(null);

        $response = $this->companyService->getCompanyData('1');

        $this->assertEquals(ResponseMessage::createErrorResponse(
            'Data perusahaan tidak ditemukan.'
        ), $response);
    }

    public function testPostCompanyDataSuccess(): void
    {
        $data = [
            'company_name' => 'Test Company',
            'company_type' => 'Tech',
            'company_mail' => 'test@mail.com',
            'company_phone' => '123456',
            'company_mobile_phone' => '098765',
            'company_address' => 'Jl. ABC',
            'company_province' => 'Jawa',
            'company_regency' => 'Bandung',
            'company_district' => 'Coblong',
            'company_village' => 'Dago',
            'company_category' => 'Startup',
            'user_id' => '123'
        ];

        $this->dbMock->method('squery_single')->willReturn(null);
        $this->dbMock->method('sinsert')->willReturn(true);

        $response = $this->companyService->postCompanyData($data);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            'Data perusahaan berhasil disimpan'
        ), $response);
    }

    public function testPostCompanyDataAlreadyExists(): void
    {
        $this->dbMock->method('squery_single')->willReturnCallback(function ($sql, $params) {
            return $params['user_id'] === '123' ? ['user_id' => '123'] : null;
        });

        $response = $this->companyService->postCompanyData([
            'user_id' => '123',
        ]);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            'Data perusahaan sudah ada'
        ), $response);
    }

    public function testUpdateCompanyDataSuccess(): void
    {
        $userId = '123';
        $data = [
            'company_name' => 'Updated Co',
            'company_type' => 'IT',
            'company_mail' => 'new@mail.com',
            'company_phone' => '11111',
            'company_mobile_phone' => '22222',
            'company_address' => 'Jl. Baru',
            'company_province' => 'Jabar',
            'company_regency' => 'Bandung',
            'company_district' => 'Sukajadi',
            'company_village' => 'Sukasari',
            'company_category' => 'Enterprise'
        ];

        $this->dbMock->method('squery_single')->willReturn(['user_id' => $userId]);
        $this->dbMock->method('supdate')->willReturn(true);

        $response = $this->companyService->updateCompanyData($userId, $data);

        $this->assertEquals(ResponseMessage::createSuccessResponse(
            'Data perusahaan berhasil diupdate'
        ), $response);
    }

    public function testUpdateCompanyDataNotFound(): void
    {
        $this->dbMock->method('squery_single')->willReturn(null);

        $response = $this->companyService->updateCompanyData('999', []);

        $this->assertEquals(ResponseMessage::createErrorResponse(
            'Data perusahaan tidak ditemukan'
        ), $response);
    }
}
