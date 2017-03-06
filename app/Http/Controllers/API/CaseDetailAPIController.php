<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCaseDetailAPIRequest;
use App\Http\Requests\API\UpdateCaseDetailAPIRequest;
use App\Models\CaseDetail;
use App\Repositories\CaseDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CaseDetailController
 * @package App\Http\Controllers\API
 */

class CaseDetailAPIController extends AppBaseController
{
    /** @var  CaseDetailRepository */
    private $caseDetailRepository;

    public function __construct(CaseDetailRepository $caseDetailRepo)
    {
        $this->caseDetailRepository = $caseDetailRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/caseDetails",
     *      summary="Get a listing of the CaseDetails.",
     *      tags={"CaseDetail"},
     *      description="Get all CaseDetails",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/CaseDetail")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->caseDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->caseDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $caseDetails = $this->caseDetailRepository->all();

        return $this->sendResponse($caseDetails->toArray(), 'Case Details retrieved successfully');
    }

    /**
     * @param CreateCaseDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/caseDetails",
     *      summary="Store a newly created CaseDetail in storage",
     *      tags={"CaseDetail"},
     *      description="Store CaseDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CaseDetail that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CaseDetail")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CaseDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCaseDetailAPIRequest $request)
    {
        $input = $request->all();

        $caseDetails = $this->caseDetailRepository->create($input);

        return $this->sendResponse($caseDetails->toArray(), 'Case Detail saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/caseDetails/{id}",
     *      summary="Display the specified CaseDetail",
     *      tags={"CaseDetail"},
     *      description="Get CaseDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CaseDetail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CaseDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var CaseDetail $caseDetail */
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            return $this->sendError('Case Detail not found');
        }

        return $this->sendResponse($caseDetail->toArray(), 'Case Detail retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCaseDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/caseDetails/{id}",
     *      summary="Update the specified CaseDetail in storage",
     *      tags={"CaseDetail"},
     *      description="Update CaseDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CaseDetail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CaseDetail that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CaseDetail")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CaseDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCaseDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var CaseDetail $caseDetail */
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            return $this->sendError('Case Detail not found');
        }

        $caseDetail = $this->caseDetailRepository->update($input, $id);

        return $this->sendResponse($caseDetail->toArray(), 'CaseDetail updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/caseDetails/{id}",
     *      summary="Remove the specified CaseDetail from storage",
     *      tags={"CaseDetail"},
     *      description="Delete CaseDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CaseDetail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var CaseDetail $caseDetail */
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            return $this->sendError('Case Detail not found');
        }

        $caseDetail->delete();

        return $this->sendResponse($id, 'Case Detail deleted successfully');
    }
}
