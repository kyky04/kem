<?php

use App\Models\Skor;
use App\Repositories\SkorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SkorRepositoryTest extends TestCase
{
    use MakeSkorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SkorRepository
     */
    protected $skorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->skorRepo = App::make(SkorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSkor()
    {
        $skor = $this->fakeSkorData();
        $createdSkor = $this->skorRepo->create($skor);
        $createdSkor = $createdSkor->toArray();
        $this->assertArrayHasKey('id', $createdSkor);
        $this->assertNotNull($createdSkor['id'], 'Created Skor must have id specified');
        $this->assertNotNull(Skor::find($createdSkor['id']), 'Skor with given id must be in DB');
        $this->assertModelData($skor, $createdSkor);
    }

    /**
     * @test read
     */
    public function testReadSkor()
    {
        $skor = $this->makeSkor();
        $dbSkor = $this->skorRepo->find($skor->id);
        $dbSkor = $dbSkor->toArray();
        $this->assertModelData($skor->toArray(), $dbSkor);
    }

    /**
     * @test update
     */
    public function testUpdateSkor()
    {
        $skor = $this->makeSkor();
        $fakeSkor = $this->fakeSkorData();
        $updatedSkor = $this->skorRepo->update($fakeSkor, $skor->id);
        $this->assertModelData($fakeSkor, $updatedSkor->toArray());
        $dbSkor = $this->skorRepo->find($skor->id);
        $this->assertModelData($fakeSkor, $dbSkor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSkor()
    {
        $skor = $this->makeSkor();
        $resp = $this->skorRepo->delete($skor->id);
        $this->assertTrue($resp);
        $this->assertNull(Skor::find($skor->id), 'Skor should not exist in DB');
    }
}
