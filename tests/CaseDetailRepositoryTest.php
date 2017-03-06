<?php

use App\Models\CaseDetail;
use App\Repositories\CaseDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CaseDetailRepositoryTest extends TestCase
{
    use MakeCaseDetailTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CaseDetailRepository
     */
    protected $caseDetailRepo;

    public function setUp()
    {
        parent::setUp();
        $this->caseDetailRepo = App::make(CaseDetailRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCaseDetail()
    {
        $caseDetail = $this->fakeCaseDetailData();
        $createdCaseDetail = $this->caseDetailRepo->create($caseDetail);
        $createdCaseDetail = $createdCaseDetail->toArray();
        $this->assertArrayHasKey('id', $createdCaseDetail);
        $this->assertNotNull($createdCaseDetail['id'], 'Created CaseDetail must have id specified');
        $this->assertNotNull(CaseDetail::find($createdCaseDetail['id']), 'CaseDetail with given id must be in DB');
        $this->assertModelData($caseDetail, $createdCaseDetail);
    }

    /**
     * @test read
     */
    public function testReadCaseDetail()
    {
        $caseDetail = $this->makeCaseDetail();
        $dbCaseDetail = $this->caseDetailRepo->find($caseDetail->id);
        $dbCaseDetail = $dbCaseDetail->toArray();
        $this->assertModelData($caseDetail->toArray(), $dbCaseDetail);
    }

    /**
     * @test update
     */
    public function testUpdateCaseDetail()
    {
        $caseDetail = $this->makeCaseDetail();
        $fakeCaseDetail = $this->fakeCaseDetailData();
        $updatedCaseDetail = $this->caseDetailRepo->update($fakeCaseDetail, $caseDetail->id);
        $this->assertModelData($fakeCaseDetail, $updatedCaseDetail->toArray());
        $dbCaseDetail = $this->caseDetailRepo->find($caseDetail->id);
        $this->assertModelData($fakeCaseDetail, $dbCaseDetail->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCaseDetail()
    {
        $caseDetail = $this->makeCaseDetail();
        $resp = $this->caseDetailRepo->delete($caseDetail->id);
        $this->assertTrue($resp);
        $this->assertNull(CaseDetail::find($caseDetail->id), 'CaseDetail should not exist in DB');
    }
}
