<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SiswaApiTest extends TestCase
{
    use MakeSiswaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSiswa()
    {
        $siswa = $this->fakeSiswaData();
        $this->json('POST', '/api/v1/siswas', $siswa);

        $this->assertApiResponse($siswa);
    }

    /**
     * @test
     */
    public function testReadSiswa()
    {
        $siswa = $this->makeSiswa();
        $this->json('GET', '/api/v1/siswas/'.$siswa->id);

        $this->assertApiResponse($siswa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSiswa()
    {
        $siswa = $this->makeSiswa();
        $editedSiswa = $this->fakeSiswaData();

        $this->json('PUT', '/api/v1/siswas/'.$siswa->id, $editedSiswa);

        $this->assertApiResponse($editedSiswa);
    }

    /**
     * @test
     */
    public function testDeleteSiswa()
    {
        $siswa = $this->makeSiswa();
        $this->json('DELETE', '/api/v1/siswas/'.$siswa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/siswas/'.$siswa->id);

        $this->assertResponseStatus(404);
    }
}
