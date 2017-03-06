<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KaseApiTest extends TestCase
{
    use MakeKaseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKase()
    {
        $kase = $this->fakeKaseData();
        $this->json('POST', '/api/v1/kases', $kase);

        $this->assertApiResponse($kase);
    }

    /**
     * @test
     */
    public function testReadKase()
    {
        $kase = $this->makeKase();
        $this->json('GET', '/api/v1/kases/'.$kase->id);

        $this->assertApiResponse($kase->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKase()
    {
        $kase = $this->makeKase();
        $editedKase = $this->fakeKaseData();

        $this->json('PUT', '/api/v1/kases/'.$kase->id, $editedKase);

        $this->assertApiResponse($editedKase);
    }

    /**
     * @test
     */
    public function testDeleteKase()
    {
        $kase = $this->makeKase();
        $this->json('DELETE', '/api/v1/kases/'.$kase->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kases/'.$kase->id);

        $this->assertResponseStatus(404);
    }
}
