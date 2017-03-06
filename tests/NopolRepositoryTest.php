<?php

use App\Models\Nopol;
use App\Repositories\NopolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NopolRepositoryTest extends TestCase
{
    use MakeNopolTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NopolRepository
     */
    protected $nopolRepo;

    public function setUp()
    {
        parent::setUp();
        $this->nopolRepo = App::make(NopolRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNopol()
    {
        $nopol = $this->fakeNopolData();
        $createdNopol = $this->nopolRepo->create($nopol);
        $createdNopol = $createdNopol->toArray();
        $this->assertArrayHasKey('id', $createdNopol);
        $this->assertNotNull($createdNopol['id'], 'Created Nopol must have id specified');
        $this->assertNotNull(Nopol::find($createdNopol['id']), 'Nopol with given id must be in DB');
        $this->assertModelData($nopol, $createdNopol);
    }

    /**
     * @test read
     */
    public function testReadNopol()
    {
        $nopol = $this->makeNopol();
        $dbNopol = $this->nopolRepo->find($nopol->id);
        $dbNopol = $dbNopol->toArray();
        $this->assertModelData($nopol->toArray(), $dbNopol);
    }

    /**
     * @test update
     */
    public function testUpdateNopol()
    {
        $nopol = $this->makeNopol();
        $fakeNopol = $this->fakeNopolData();
        $updatedNopol = $this->nopolRepo->update($fakeNopol, $nopol->id);
        $this->assertModelData($fakeNopol, $updatedNopol->toArray());
        $dbNopol = $this->nopolRepo->find($nopol->id);
        $this->assertModelData($fakeNopol, $dbNopol->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNopol()
    {
        $nopol = $this->makeNopol();
        $resp = $this->nopolRepo->delete($nopol->id);
        $this->assertTrue($resp);
        $this->assertNull(Nopol::find($nopol->id), 'Nopol should not exist in DB');
    }
}
