<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NopolApiTest extends TestCase
{
    use MakeNopolTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNopol()
    {
        $nopol = $this->fakeNopolData();
        $this->json('POST', '/api/v1/nopols', $nopol);

        $this->assertApiResponse($nopol);
    }

    /**
     * @test
     */
    public function testReadNopol()
    {
        $nopol = $this->makeNopol();
        $this->json('GET', '/api/v1/nopols/'.$nopol->id);

        $this->assertApiResponse($nopol->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNopol()
    {
        $nopol = $this->makeNopol();
        $editedNopol = $this->fakeNopolData();

        $this->json('PUT', '/api/v1/nopols/'.$nopol->id, $editedNopol);

        $this->assertApiResponse($editedNopol);
    }

    /**
     * @test
     */
    public function testDeleteNopol()
    {
        $nopol = $this->makeNopol();
        $this->json('DELETE', '/api/v1/nopols/'.$nopol->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/nopols/'.$nopol->id);

        $this->assertResponseStatus(404);
    }
}
