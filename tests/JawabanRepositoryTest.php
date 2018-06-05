<?php

use App\Models\Jawaban;
use App\Repositories\JawabanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JawabanRepositoryTest extends TestCase
{
    use MakeJawabanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JawabanRepository
     */
    protected $jawabanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jawabanRepo = App::make(JawabanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJawaban()
    {
        $jawaban = $this->fakeJawabanData();
        $createdJawaban = $this->jawabanRepo->create($jawaban);
        $createdJawaban = $createdJawaban->toArray();
        $this->assertArrayHasKey('id', $createdJawaban);
        $this->assertNotNull($createdJawaban['id'], 'Created Jawaban must have id specified');
        $this->assertNotNull(Jawaban::find($createdJawaban['id']), 'Jawaban with given id must be in DB');
        $this->assertModelData($jawaban, $createdJawaban);
    }

    /**
     * @test read
     */
    public function testReadJawaban()
    {
        $jawaban = $this->makeJawaban();
        $dbJawaban = $this->jawabanRepo->find($jawaban->id);
        $dbJawaban = $dbJawaban->toArray();
        $this->assertModelData($jawaban->toArray(), $dbJawaban);
    }

    /**
     * @test update
     */
    public function testUpdateJawaban()
    {
        $jawaban = $this->makeJawaban();
        $fakeJawaban = $this->fakeJawabanData();
        $updatedJawaban = $this->jawabanRepo->update($fakeJawaban, $jawaban->id);
        $this->assertModelData($fakeJawaban, $updatedJawaban->toArray());
        $dbJawaban = $this->jawabanRepo->find($jawaban->id);
        $this->assertModelData($fakeJawaban, $dbJawaban->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJawaban()
    {
        $jawaban = $this->makeJawaban();
        $resp = $this->jawabanRepo->delete($jawaban->id);
        $this->assertTrue($resp);
        $this->assertNull(Jawaban::find($jawaban->id), 'Jawaban should not exist in DB');
    }
}
