<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PertanyaanApiTest extends TestCase
{
    use MakePertanyaanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePertanyaan()
    {
        $pertanyaan = $this->fakePertanyaanData();
        $this->json('POST', '/api/v1/pertanyaans', $pertanyaan);

        $this->assertApiResponse($pertanyaan);
    }

    /**
     * @test
     */
    public function testReadPertanyaan()
    {
        $pertanyaan = $this->makePertanyaan();
        $this->json('GET', '/api/v1/pertanyaans/'.$pertanyaan->id);

        $this->assertApiResponse($pertanyaan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePertanyaan()
    {
        $pertanyaan = $this->makePertanyaan();
        $editedPertanyaan = $this->fakePertanyaanData();

        $this->json('PUT', '/api/v1/pertanyaans/'.$pertanyaan->id, $editedPertanyaan);

        $this->assertApiResponse($editedPertanyaan);
    }

    /**
     * @test
     */
    public function testDeletePertanyaan()
    {
        $pertanyaan = $this->makePertanyaan();
        $this->json('DELETE', '/api/v1/pertanyaans/'.$pertanyaan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pertanyaans/'.$pertanyaan->id);

        $this->assertResponseStatus(404);
    }
}
