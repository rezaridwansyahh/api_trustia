<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCaseBiayaAPIRequest;
use App\Http\Requests\API\UpdateCaseBiayaAPIRequest;
use App\Models\CaseBiaya;
use App\Repositories\CaseBiayaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CaseBiayaController
 * @package App\Http\Controllers\API
 */

class CaseBiayaAPIController extends AppBaseController
{
    /** @var  CaseBiayaRepository */
    private $caseBiayaRepository;

    public function __construct(CaseBiayaRepository $caseBiayaRepo)
    {
        $this->caseBiayaRepository = $caseBiayaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/caseBiayas",
     *      summary="Get a listing of the CaseBiayas.",
     *      tags={"CaseBiaya"},
     *      description="Get all CaseBiayas",
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
     *                  @SWG\Items(ref="#/definitions/CaseBiaya")
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
        $this->caseBiayaRepository->pushCriteria(new RequestCriteria($request));
        $this->caseBiayaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $caseBiayas = $this->caseBiayaRepository->all();

        return $this->sendResponse($caseBiayas->toArray(), 'Case Biayas retrieved successfully');
    }

    /**
     * @param CreateCaseBiayaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/caseBiayas",
     *      summary="Store a newly created CaseBiaya in storage",
     *      tags={"CaseBiaya"},
     *      description="Store CaseBiaya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CaseBiaya that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CaseBiaya")
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
     *                  ref="#/definitions/CaseBiaya"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCaseBiayaAPIRequest $request)
    {
        $input = $request->all();

        $caseBiayas = $this->caseBiayaRepository->create($input);

        return $this->sendResponse($caseBiayas->toArray(), 'Case Biaya saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/caseBiayas/{id}",
     *      summary="Display the specified CaseBiaya",
     *      tags={"CaseBiaya"},
     *      description="Get CaseBiaya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CaseBiaya",
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
     *                  ref="#/definitions/CaseBiaya"
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
        /** @var CaseBiaya $caseBiaya */
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            return $this->sendError('Case Biaya not found');
        }

        return $this->sendResponse($caseBiaya->toArray(), 'Case Biaya retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCaseBiayaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/caseBiayas/{id}",
     *      summary="Update the specified CaseBiaya in storage",
     *      tags={"CaseBiaya"},
     *      description="Update CaseBiaya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CaseBiaya",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CaseBiaya that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CaseBiaya")
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
     *                  ref="#/definitions/CaseBiaya"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCaseBiayaAPIRequest $request)
    {
        $input = $request->all();

        /** @var CaseBiaya $caseBiaya */
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            return $this->sendError('Case Biaya not found');
        }

        $caseBiaya = $this->caseBiayaRepository->update($input, $id);

        return $this->sendResponse($caseBiaya->toArray(), 'CaseBiaya updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/caseBiayas/{id}",
     *      summary="Remove the specified CaseBiaya from storage",
     *      tags={"CaseBiaya"},
     *      description="Delete CaseBiaya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CaseBiaya",
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
        /** @var CaseBiaya $caseBiaya */
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            return $this->sendError('Case Biaya not found');
        }

        $caseBiaya->delete();

        return $this->sendResponse($id, 'Case Biaya deleted successfully');
    }
}
