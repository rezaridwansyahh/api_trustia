<?php

use App\Models\CaseBiaya;
use App\Repositories\CaseBiayaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CaseBiayaRepositoryTest extends TestCase
{
    use MakeCaseBiayaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CaseBiayaRepository
     */
    protected $caseBiayaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->caseBiayaRepo = App::make(CaseBiayaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCaseBiaya()
    {
        $caseBiaya = $this->fakeCaseBiayaData();
        $createdCaseBiaya = $this->caseBiayaRepo->create($caseBiaya);
        $createdCaseBiaya = $createdCaseBiaya->toArray();
        $this->assertArrayHasKey('id', $createdCaseBiaya);
        $this->assertNotNull($createdCaseBiaya['id'], 'Created CaseBiaya must have id specified');
        $this->assertNotNull(CaseBiaya::find($createdCaseBiaya['id']), 'CaseBiaya with given id must be in DB');
        $this->assertModelData($caseBiaya, $createdCaseBiaya);
    }

    /**
     * @test read
     */
    public function testReadCaseBiaya()
    {
        $caseBiaya = $this->makeCaseBiaya();
        $dbCaseBiaya = $this->caseBiayaRepo->find($caseBiaya->id);
        $dbCaseBiaya = $dbCaseBiaya->toArray();
        $this->assertModelData($caseBiaya->toArray(), $dbCaseBiaya);
    }

    /**
     * @test update
     */
    public function testUpdateCaseBiaya()
    {
        $caseBiaya = $this->makeCaseBiaya();
        $fakeCaseBiaya = $this->fakeCaseBiayaData();
        $updatedCaseBiaya = $this->caseBiayaRepo->update($fakeCaseBiaya, $caseBiaya->id);
        $this->assertModelData($fakeCaseBiaya, $updatedCaseBiaya->toArray());
        $dbCaseBiaya = $this->caseBiayaRepo->find($caseBiaya->id);
        $this->assertModelData($fakeCaseBiaya, $dbCaseBiaya->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCaseBiaya()
    {
        $caseBiaya = $this->makeCaseBiaya();
        $resp = $this->caseBiayaRepo->delete($caseBiaya->id);
        $this->assertTrue($resp);
        $this->assertNull(CaseBiaya::find($caseBiaya->id), 'CaseBiaya should not exist in DB');
    }
}
