<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CaseDetailApiTest extends TestCase
{
    use MakeCaseDetailTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCaseDetail()
    {
        $caseDetail = $this->fakeCaseDetailData();
        $this->json('POST', '/api/v1/caseDetails', $caseDetail);

        $this->assertApiResponse($caseDetail);
    }

    /**
     * @test
     */
    public function testReadCaseDetail()
    {
        $caseDetail = $this->makeCaseDetail();
        $this->json('GET', '/api/v1/caseDetails/'.$caseDetail->id);

        $this->assertApiResponse($caseDetail->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCaseDetail()
    {
        $caseDetail = $this->makeCaseDetail();
        $editedCaseDetail = $this->fakeCaseDetailData();

        $this->json('PUT', '/api/v1/caseDetails/'.$caseDetail->id, $editedCaseDetail);

        $this->assertApiResponse($editedCaseDetail);
    }

    /**
     * @test
     */
    public function testDeleteCaseDetail()
    {
        $caseDetail = $this->makeCaseDetail();
        $this->json('DELETE', '/api/v1/caseDetails/'.$caseDetail->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/caseDetails/'.$caseDetail->id);

        $this->assertResponseStatus(404);
    }
}
