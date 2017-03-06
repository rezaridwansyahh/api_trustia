<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipeAPIRequest;
use App\Http\Requests\API\UpdateTipeAPIRequest;
use App\Models\Tipe;
use App\Repositories\TipeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TipeController
 * @package App\Http\Controllers\API
 */

class TipeAPIController extends AppBaseController
{
    /** @var  TipeRepository */
    private $tipeRepository;

    public function __construct(TipeRepository $tipeRepo)
    {
        $this->tipeRepository = $tipeRepo;
    }

    /**
     * Display a listing of the Tipe.
     * GET|HEAD /tipes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipeRepository->pushCriteria(new RequestCriteria($request));
        $this->tipeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tipes = $this->tipeRepository->all();

        return $this->sendResponse($tipes->toArray(), 'Tipes retrieved successfully');
    }

    /**
     * Store a newly created Tipe in storage.
     * POST /tipes
     *
     * @param CreateTipeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeAPIRequest $request)
    {
        $input = $request->all();

        $tipes = $this->tipeRepository->create($input);

        return $this->sendResponse($tipes->toArray(), 'Tipe saved successfully');
    }

    /**
     * Display the specified Tipe.
     * GET|HEAD /tipes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tipe $tipe */
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            return $this->sendError('Tipe not found');
        }

        return $this->sendResponse($tipe->toArray(), 'Tipe retrieved successfully');
    }

    /**
     * Update the specified Tipe in storage.
     * PUT/PATCH /tipes/{id}
     *
     * @param  int $id
     * @param UpdateTipeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tipe $tipe */
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            return $this->sendError('Tipe not found');
        }

        $tipe = $this->tipeRepository->update($input, $id);

        return $this->sendResponse($tipe->toArray(), 'Tipe updated successfully');
    }

    /**
     * Remove the specified Tipe from storage.
     * DELETE /tipes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tipe $tipe */
        $tipe = $this->tipeRepository->findWithoutFail($id);

        if (empty($tipe)) {
            return $this->sendError('Tipe not found');
        }

        $tipe->delete();

        return $this->sendResponse($id, 'Tipe deleted successfully');
    }
}
