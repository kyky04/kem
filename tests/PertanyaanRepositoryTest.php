<?php

use App\Models\Pertanyaan;
use App\Repositories\PertanyaanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PertanyaanRepositoryTest extends TestCase
{
    use MakePertanyaanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PertanyaanRepository
     */
    protected $pertanyaanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pertanyaanRepo = App::make(PertanyaanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePertanyaan()
    {
        $pertanyaan = $this->fakePertanyaanData();
        $createdPertanyaan = $this->pertanyaanRepo->create($pertanyaan);
        $createdPertanyaan = $createdPertanyaan->toArray();
        $this->assertArrayHasKey('id', $createdPertanyaan);
        $this->assertNotNull($createdPertanyaan['id'], 'Created Pertanyaan must have id specified');
        $this->assertNotNull(Pertanyaan::find($createdPertanyaan['id']), 'Pertanyaan with given id must be in DB');
        $this->assertModelData($pertanyaan, $createdPertanyaan);
    }

    /**
     * @test read
     */
    public function testReadPertanyaan()
    {
        $pertanyaan = $this->makePertanyaan();
        $dbPertanyaan = $this->pertanyaanRepo->find($pertanyaan->id);
        $dbPertanyaan = $dbPertanyaan->toArray();
        $this->assertModelData($pertanyaan->toArray(), $dbPertanyaan);
    }

    /**
     * @test update
     */
    public function testUpdatePertanyaan()
    {
        $pertanyaan = $this->makePertanyaan();
        $fakePertanyaan = $this->fakePertanyaanData();
        $updatedPertanyaan = $this->pertanyaanRepo->update($fakePertanyaan, $pertanyaan->id);
        $this->assertModelData($fakePertanyaan, $updatedPertanyaan->toArray());
        $dbPertanyaan = $this->pertanyaanRepo->find($pertanyaan->id);
        $this->assertModelData($fakePertanyaan, $dbPertanyaan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePertanyaan()
    {
        $pertanyaan = $this->makePertanyaan();
        $resp = $this->pertanyaanRepo->delete($pertanyaan->id);
        $this->assertTrue($resp);
        $this->assertNull(Pertanyaan::find($pertanyaan->id), 'Pertanyaan should not exist in DB');
    }
}
