<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoalApiTest extends TestCase
{
    use MakeSoalTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSoal()
    {
        $soal = $this->fakeSoalData();
        $this->json('POST', '/api/v1/soals', $soal);

        $this->assertApiResponse($soal);
    }

    /**
     * @test
     */
    public function testReadSoal()
    {
        $soal = $this->makeSoal();
        $this->json('GET', '/api/v1/soals/'.$soal->id);

        $this->assertApiResponse($soal->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSoal()
    {
        $soal = $this->makeSoal();
        $editedSoal = $this->fakeSoalData();

        $this->json('PUT', '/api/v1/soals/'.$soal->id, $editedSoal);

        $this->assertApiResponse($editedSoal);
    }

    /**
     * @test
     */
    public function testDeleteSoal()
    {
        $soal = $this->makeSoal();
        $this->json('DELETE', '/api/v1/soals/'.$soal->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/soals/'.$soal->id);

        $this->assertResponseStatus(404);
    }
}
