<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipeApiTest extends TestCase
{
    use MakeTipeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipe()
    {
        $tipe = $this->fakeTipeData();
        $this->json('POST', '/api/v1/tipes', $tipe);

        $this->assertApiResponse($tipe);
    }

    /**
     * @test
     */
    public function testReadTipe()
    {
        $tipe = $this->makeTipe();
        $this->json('GET', '/api/v1/tipes/'.$tipe->id);

        $this->assertApiResponse($tipe->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipe()
    {
        $tipe = $this->makeTipe();
        $editedTipe = $this->fakeTipeData();

        $this->json('PUT', '/api/v1/tipes/'.$tipe->id, $editedTipe);

        $this->assertApiResponse($editedTipe);
    }

    /**
     * @test
     */
    public function testDeleteTipe()
    {
        $tipe = $this->makeTipe();
        $this->json('DELETE', '/api/v1/tipes/'.$tipe->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipes/'.$tipe->id);

        $this->assertResponseStatus(404);
    }
}
