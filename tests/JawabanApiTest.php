<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JawabanApiTest extends TestCase
{
    use MakeJawabanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJawaban()
    {
        $jawaban = $this->fakeJawabanData();
        $this->json('POST', '/api/v1/jawabans', $jawaban);

        $this->assertApiResponse($jawaban);
    }

    /**
     * @test
     */
    public function testReadJawaban()
    {
        $jawaban = $this->makeJawaban();
        $this->json('GET', '/api/v1/jawabans/'.$jawaban->id);

        $this->assertApiResponse($jawaban->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJawaban()
    {
        $jawaban = $this->makeJawaban();
        $editedJawaban = $this->fakeJawabanData();

        $this->json('PUT', '/api/v1/jawabans/'.$jawaban->id, $editedJawaban);

        $this->assertApiResponse($editedJawaban);
    }

    /**
     * @test
     */
    public function testDeleteJawaban()
    {
        $jawaban = $this->makeJawaban();
        $this->json('DELETE', '/api/v1/jawabans/'.$jawaban->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jawabans/'.$jawaban->id);

        $this->assertResponseStatus(404);
    }
}
