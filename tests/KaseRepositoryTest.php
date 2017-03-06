<?php

use App\Models\Kase;
use App\Repositories\KaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KaseRepositoryTest extends TestCase
{
    use MakeKaseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KaseRepository
     */
    protected $kaseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kaseRepo = App::make(KaseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKase()
    {
        $kase = $this->fakeKaseData();
        $createdKase = $this->kaseRepo->create($kase);
        $createdKase = $createdKase->toArray();
        $this->assertArrayHasKey('id', $createdKase);
        $this->assertNotNull($createdKase['id'], 'Created Kase must have id specified');
        $this->assertNotNull(Kase::find($createdKase['id']), 'Kase with given id must be in DB');
        $this->assertModelData($kase, $createdKase);
    }

    /**
     * @test read
     */
    public function testReadKase()
    {
        $kase = $this->makeKase();
        $dbKase = $this->kaseRepo->find($kase->id);
        $dbKase = $dbKase->toArray();
        $this->assertModelData($kase->toArray(), $dbKase);
    }

    /**
     * @test update
     */
    public function testUpdateKase()
    {
        $kase = $this->makeKase();
        $fakeKase = $this->fakeKaseData();
        $updatedKase = $this->kaseRepo->update($fakeKase, $kase->id);
        $this->assertModelData($fakeKase, $updatedKase->toArray());
        $dbKase = $this->kaseRepo->find($kase->id);
        $this->assertModelData($fakeKase, $dbKase->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKase()
    {
        $kase = $this->makeKase();
        $resp = $this->kaseRepo->delete($kase->id);
        $this->assertTrue($resp);
        $this->assertNull(Kase::find($kase->id), 'Kase should not exist in DB');
    }
}
