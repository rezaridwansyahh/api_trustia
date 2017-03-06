<?php

use App\Models\Wilayah;
use App\Repositories\WilayahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WilayahRepositoryTest extends TestCase
{
    use MakeWilayahTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WilayahRepository
     */
    protected $wilayahRepo;

    public function setUp()
    {
        parent::setUp();
        $this->wilayahRepo = App::make(WilayahRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWilayah()
    {
        $wilayah = $this->fakeWilayahData();
        $createdWilayah = $this->wilayahRepo->create($wilayah);
        $createdWilayah = $createdWilayah->toArray();
        $this->assertArrayHasKey('id', $createdWilayah);
        $this->assertNotNull($createdWilayah['id'], 'Created Wilayah must have id specified');
        $this->assertNotNull(Wilayah::find($createdWilayah['id']), 'Wilayah with given id must be in DB');
        $this->assertModelData($wilayah, $createdWilayah);
    }

    /**
     * @test read
     */
    public function testReadWilayah()
    {
        $wilayah = $this->makeWilayah();
        $dbWilayah = $this->wilayahRepo->find($wilayah->id);
        $dbWilayah = $dbWilayah->toArray();
        $this->assertModelData($wilayah->toArray(), $dbWilayah);
    }

    /**
     * @test update
     */
    public function testUpdateWilayah()
    {
        $wilayah = $this->makeWilayah();
        $fakeWilayah = $this->fakeWilayahData();
        $updatedWilayah = $this->wilayahRepo->update($fakeWilayah, $wilayah->id);
        $this->assertModelData($fakeWilayah, $updatedWilayah->toArray());
        $dbWilayah = $this->wilayahRepo->find($wilayah->id);
        $this->assertModelData($fakeWilayah, $dbWilayah->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWilayah()
    {
        $wilayah = $this->makeWilayah();
        $resp = $this->wilayahRepo->delete($wilayah->id);
        $this->assertTrue($resp);
        $this->assertNull(Wilayah::find($wilayah->id), 'Wilayah should not exist in DB');
    }
}
