<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CaseBiayaApiTest extends TestCase
{
    use MakeCaseBiayaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCaseBiaya()
    {
        $caseBiaya = $this->fakeCaseBiayaData();
        $this->json('POST', '/api/v1/caseBiayas', $caseBiaya);

        $this->assertApiResponse($caseBiaya);
    }

    /**
     * @test
     */
    public function testReadCaseBiaya()
    {
        $caseBiaya = $this->makeCaseBiaya();
        $this->json('GET', '/api/v1/caseBiayas/'.$caseBiaya->id);

        $this->assertApiResponse($caseBiaya->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCaseBiaya()
    {
        $caseBiaya = $this->makeCaseBiaya();
        $editedCaseBiaya = $this->fakeCaseBiayaData();

        $this->json('PUT', '/api/v1/caseBiayas/'.$caseBiaya->id, $editedCaseBiaya);

        $this->assertApiResponse($editedCaseBiaya);
    }

    /**
     * @test
     */
    public function testDeleteCaseBiaya()
    {
        $caseBiaya = $this->makeCaseBiaya();
        $this->json('DELETE', '/api/v1/caseBiayas/'.$caseBiaya->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/caseBiayas/'.$caseBiaya->id);

        $this->assertResponseStatus(404);
    }
}
