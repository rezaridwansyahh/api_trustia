<?php

use App\Models\Tipe;
use App\Repositories\TipeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipeRepositoryTest extends TestCase
{
    use MakeTipeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipeRepository
     */
    protected $tipeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipeRepo = App::make(TipeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipe()
    {
        $tipe = $this->fakeTipeData();
        $createdTipe = $this->tipeRepo->create($tipe);
        $createdTipe = $createdTipe->toArray();
        $this->assertArrayHasKey('id', $createdTipe);
        $this->assertNotNull($createdTipe['id'], 'Created Tipe must have id specified');
        $this->assertNotNull(Tipe::find($createdTipe['id']), 'Tipe with given id must be in DB');
        $this->assertModelData($tipe, $createdTipe);
    }

    /**
     * @test read
     */
    public function testReadTipe()
    {
        $tipe = $this->makeTipe();
        $dbTipe = $this->tipeRepo->find($tipe->id);
        $dbTipe = $dbTipe->toArray();
        $this->assertModelData($tipe->toArray(), $dbTipe);
    }

    /**
     * @test update
     */
    public function testUpdateTipe()
    {
        $tipe = $this->makeTipe();
        $fakeTipe = $this->fakeTipeData();
        $updatedTipe = $this->tipeRepo->update($fakeTipe, $tipe->id);
        $this->assertModelData($fakeTipe, $updatedTipe->toArray());
        $dbTipe = $this->tipeRepo->find($tipe->id);
        $this->assertModelData($fakeTipe, $dbTipe->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipe()
    {
        $tipe = $this->makeTipe();
        $resp = $this->tipeRepo->delete($tipe->id);
        $this->assertTrue($resp);
        $this->assertNull(Tipe::find($tipe->id), 'Tipe should not exist in DB');
    }
}
