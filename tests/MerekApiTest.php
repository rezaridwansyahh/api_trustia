<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MerekApiTest extends TestCase
{
    use MakeMerekTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMerek()
    {
        $merek = $this->fakeMerekData();
        $this->json('POST', '/api/v1/mereks', $merek);

        $this->assertApiResponse($merek);
    }

    /**
     * @test
     */
    public function testReadMerek()
    {
        $merek = $this->makeMerek();
        $this->json('GET', '/api/v1/mereks/'.$merek->id);

        $this->assertApiResponse($merek->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMerek()
    {
        $merek = $this->makeMerek();
        $editedMerek = $this->fakeMerekData();

        $this->json('PUT', '/api/v1/mereks/'.$merek->id, $editedMerek);

        $this->assertApiResponse($editedMerek);
    }

    /**
     * @test
     */
    public function testDeleteMerek()
    {
        $merek = $this->makeMerek();
        $this->json('DELETE', '/api/v1/mereks/'.$merek->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mereks/'.$merek->id);

        $this->assertResponseStatus(404);
    }
}
