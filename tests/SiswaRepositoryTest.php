<?php

use App\Models\Siswa;
use App\Repositories\SiswaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SiswaRepositoryTest extends TestCase
{
    use MakeSiswaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SiswaRepository
     */
    protected $siswaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->siswaRepo = App::make(SiswaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSiswa()
    {
        $siswa = $this->fakeSiswaData();
        $createdSiswa = $this->siswaRepo->create($siswa);
        $createdSiswa = $createdSiswa->toArray();
        $this->assertArrayHasKey('id', $createdSiswa);
        $this->assertNotNull($createdSiswa['id'], 'Created Siswa must have id specified');
        $this->assertNotNull(Siswa::find($createdSiswa['id']), 'Siswa with given id must be in DB');
        $this->assertModelData($siswa, $createdSiswa);
    }

    /**
     * @test read
     */
    public function testReadSiswa()
    {
        $siswa = $this->makeSiswa();
        $dbSiswa = $this->siswaRepo->find($siswa->id);
        $dbSiswa = $dbSiswa->toArray();
        $this->assertModelData($siswa->toArray(), $dbSiswa);
    }

    /**
     * @test update
     */
    public function testUpdateSiswa()
    {
        $siswa = $this->makeSiswa();
        $fakeSiswa = $this->fakeSiswaData();
        $updatedSiswa = $this->siswaRepo->update($fakeSiswa, $siswa->id);
        $this->assertModelData($fakeSiswa, $updatedSiswa->toArray());
        $dbSiswa = $this->siswaRepo->find($siswa->id);
        $this->assertModelData($fakeSiswa, $dbSiswa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSiswa()
    {
        $siswa = $this->makeSiswa();
        $resp = $this->siswaRepo->delete($siswa->id);
        $this->assertTrue($resp);
        $this->assertNull(Siswa::find($siswa->id), 'Siswa should not exist in DB');
    }
}
