<?php

use App\Models\Soal;
use App\Repositories\SoalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoalRepositoryTest extends TestCase
{
    use MakeSoalTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SoalRepository
     */
    protected $soalRepo;

    public function setUp()
    {
        parent::setUp();
        $this->soalRepo = App::make(SoalRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSoal()
    {
        $soal = $this->fakeSoalData();
        $createdSoal = $this->soalRepo->create($soal);
        $createdSoal = $createdSoal->toArray();
        $this->assertArrayHasKey('id', $createdSoal);
        $this->assertNotNull($createdSoal['id'], 'Created Soal must have id specified');
        $this->assertNotNull(Soal::find($createdSoal['id']), 'Soal with given id must be in DB');
        $this->assertModelData($soal, $createdSoal);
    }

    /**
     * @test read
     */
    public function testReadSoal()
    {
        $soal = $this->makeSoal();
        $dbSoal = $this->soalRepo->find($soal->id);
        $dbSoal = $dbSoal->toArray();
        $this->assertModelData($soal->toArray(), $dbSoal);
    }

    /**
     * @test update
     */
    public function testUpdateSoal()
    {
        $soal = $this->makeSoal();
        $fakeSoal = $this->fakeSoalData();
        $updatedSoal = $this->soalRepo->update($fakeSoal, $soal->id);
        $this->assertModelData($fakeSoal, $updatedSoal->toArray());
        $dbSoal = $this->soalRepo->find($soal->id);
        $this->assertModelData($fakeSoal, $dbSoal->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSoal()
    {
        $soal = $this->makeSoal();
        $resp = $this->soalRepo->delete($soal->id);
        $this->assertTrue($resp);
        $this->assertNull(Soal::find($soal->id), 'Soal should not exist in DB');
    }
}
