<?php

use App\Models\Merek;
use App\Repositories\MerekRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MerekRepositoryTest extends TestCase
{
    use MakeMerekTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MerekRepository
     */
    protected $merekRepo;

    public function setUp()
    {
        parent::setUp();
        $this->merekRepo = App::make(MerekRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMerek()
    {
        $merek = $this->fakeMerekData();
        $createdMerek = $this->merekRepo->create($merek);
        $createdMerek = $createdMerek->toArray();
        $this->assertArrayHasKey('id', $createdMerek);
        $this->assertNotNull($createdMerek['id'], 'Created Merek must have id specified');
        $this->assertNotNull(Merek::find($createdMerek['id']), 'Merek with given id must be in DB');
        $this->assertModelData($merek, $createdMerek);
    }

    /**
     * @test read
     */
    public function testReadMerek()
    {
        $merek = $this->makeMerek();
        $dbMerek = $this->merekRepo->find($merek->id);
        $dbMerek = $dbMerek->toArray();
        $this->assertModelData($merek->toArray(), $dbMerek);
    }

    /**
     * @test update
     */
    public function testUpdateMerek()
    {
        $merek = $this->makeMerek();
        $fakeMerek = $this->fakeMerekData();
        $updatedMerek = $this->merekRepo->update($fakeMerek, $merek->id);
        $this->assertModelData($fakeMerek, $updatedMerek->toArray());
        $dbMerek = $this->merekRepo->find($merek->id);
        $this->assertModelData($fakeMerek, $dbMerek->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMerek()
    {
        $merek = $this->makeMerek();
        $resp = $this->merekRepo->delete($merek->id);
        $this->assertTrue($resp);
        $this->assertNull(Merek::find($merek->id), 'Merek should not exist in DB');
    }
}
