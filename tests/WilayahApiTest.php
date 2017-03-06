<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WilayahApiTest extends TestCase
{
    use MakeWilayahTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWilayah()
    {
        $wilayah = $this->fakeWilayahData();
        $this->json('POST', '/api/v1/wilayahs', $wilayah);

        $this->assertApiResponse($wilayah);
    }

    /**
     * @test
     */
    public function testReadWilayah()
    {
        $wilayah = $this->makeWilayah();
        $this->json('GET', '/api/v1/wilayahs/'.$wilayah->id);

        $this->assertApiResponse($wilayah->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWilayah()
    {
        $wilayah = $this->makeWilayah();
        $editedWilayah = $this->fakeWilayahData();

        $this->json('PUT', '/api/v1/wilayahs/'.$wilayah->id, $editedWilayah);

        $this->assertApiResponse($editedWilayah);
    }

    /**
     * @test
     */
    public function testDeleteWilayah()
    {
        $wilayah = $this->makeWilayah();
        $this->json('DELETE', '/api/v1/wilayahs/'.$wilayah->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/wilayahs/'.$wilayah->id);

        $this->assertResponseStatus(404);
    }
}
