<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWilayahAPIRequest;
use App\Http\Requests\API\UpdateWilayahAPIRequest;
use App\Models\Wilayah;
use App\Repositories\WilayahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WilayahController
 * @package App\Http\Controllers\API
 */

class WilayahAPIController extends AppBaseController
{
    /** @var  WilayahRepository */
    private $wilayahRepository;

    public function __construct(WilayahRepository $wilayahRepo)
    {
        $this->wilayahRepository = $wilayahRepo;
    }

    /**
     * Display a listing of the Wilayah.
     * GET|HEAD /wilayahs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wilayahRepository->pushCriteria(new RequestCriteria($request));
        $this->wilayahRepository->pushCriteria(new LimitOffsetCriteria($request));
        $wilayahs = $this->wilayahRepository->all();

        return $this->sendResponse($wilayahs->toArray(), 'Wilayahs retrieved successfully');
    }

    /**
     * Store a newly created Wilayah in storage.
     * POST /wilayahs
     *
     * @param CreateWilayahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWilayahAPIRequest $request)
    {
        $input = $request->all();

        $wilayahs = $this->wilayahRepository->create($input);

        return $this->sendResponse($wilayahs->toArray(), 'Wilayah saved successfully');
    }

    /**
     * Display the specified Wilayah.
     * GET|HEAD /wilayahs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Wilayah $wilayah */
        $wilayah = $this->wilayahRepository->findWithoutFail($id);

        if (empty($wilayah)) {
            return $this->sendError('Wilayah not found');
        }

        return $this->sendResponse($wilayah->toArray(), 'Wilayah retrieved successfully');
    }

    /**
     * Update the specified Wilayah in storage.
     * PUT/PATCH /wilayahs/{id}
     *
     * @param  int $id
     * @param UpdateWilayahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWilayahAPIRequest $request)
    {
        $input = $request->all();

        /** @var Wilayah $wilayah */
        $wilayah = $this->wilayahRepository->findWithoutFail($id);

        if (empty($wilayah)) {
            return $this->sendError('Wilayah not found');
        }

        $wilayah = $this->wilayahRepository->update($input, $id);

        return $this->sendResponse($wilayah->toArray(), 'Wilayah updated successfully');
    }

    /**
     * Remove the specified Wilayah from storage.
     * DELETE /wilayahs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Wilayah $wilayah */
        $wilayah = $this->wilayahRepository->findWithoutFail($id);

        if (empty($wilayah)) {
            return $this->sendError('Wilayah not found');
        }

        $wilayah->delete();

        return $this->sendResponse($id, 'Wilayah deleted successfully');
    }
}
