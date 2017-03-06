<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKaseAPIRequest;
use App\Http\Requests\API\UpdateKaseAPIRequest;
use App\Models\Kase;
use App\Repositories\KaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KaseController
 * @package App\Http\Controllers\API
 */

class KaseAPIController extends AppBaseController
{
    /** @var  KaseRepository */
    private $kaseRepository;

    public function __construct(KaseRepository $kaseRepo)
    {
        $this->kaseRepository = $kaseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/kases",
     *      summary="Get a listing of the Kases.",
     *      tags={"Kase"},
     *      description="Get all Kases",
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
     *                  @SWG\Items(ref="#/definitions/Kase")
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
        $this->kaseRepository->pushCriteria(new RequestCriteria($request));
        $this->kaseRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kases = $this->kaseRepository->all();

        return $this->sendResponse($kases->toArray(), 'Kases retrieved successfully');
    }

    /**
     * @param CreateKaseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/kases",
     *      summary="Store a newly created Kase in storage",
     *      tags={"Kase"},
     *      description="Store Kase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Kase that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Kase")
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
     *                  ref="#/definitions/Kase"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKaseAPIRequest $request)
    {
        $input = $request->all();

        $kases = $this->kaseRepository->create($input);

        return $this->sendResponse($kases->toArray(), 'Kase saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/kases/{id}",
     *      summary="Display the specified Kase",
     *      tags={"Kase"},
     *      description="Get Kase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Kase",
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
     *                  ref="#/definitions/Kase"
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
        /** @var Kase $kase */
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            return $this->sendError('Kase not found');
        }

        return $this->sendResponse($kase->toArray(), 'Kase retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateKaseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/kases/{id}",
     *      summary="Update the specified Kase in storage",
     *      tags={"Kase"},
     *      description="Update Kase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Kase",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Kase that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Kase")
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
     *                  ref="#/definitions/Kase"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kase $kase */
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            return $this->sendError('Kase not found');
        }

        $kase = $this->kaseRepository->update($input, $id);

        return $this->sendResponse($kase->toArray(), 'Kase updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/kases/{id}",
     *      summary="Remove the specified Kase from storage",
     *      tags={"Kase"},
     *      description="Delete Kase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Kase",
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
        /** @var Kase $kase */
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            return $this->sendError('Kase not found');
        }

        $kase->delete();

        return $this->sendResponse($id, 'Kase deleted successfully');
    }
}
