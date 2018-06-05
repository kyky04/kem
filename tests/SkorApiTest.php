<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SkorApiTest extends TestCase
{
    use MakeSkorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSkor()
    {
        $skor = $this->fakeSkorData();
        $this->json('POST', '/api/v1/skors', $skor);

        $this->assertApiResponse($skor);
    }

    /**
     * @test
     */
    public function testReadSkor()
    {
        $skor = $this->makeSkor();
        $this->json('GET', '/api/v1/skors/'.$skor->id);

        $this->assertApiResponse($skor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSkor()
    {
        $skor = $this->makeSkor();
        $editedSkor = $this->fakeSkorData();

        $this->json('PUT', '/api/v1/skors/'.$skor->id, $editedSkor);

        $this->assertApiResponse($editedSkor);
    }

    /**
     * @test
     */
    public function testDeleteSkor()
    {
        $skor = $this->makeSkor();
        $this->json('DELETE', '/api/v1/skors/'.$skor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/skors/'.$skor->id);

        $this->assertResponseStatus(404);
    }
}
