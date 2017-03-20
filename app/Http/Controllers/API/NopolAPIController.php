<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNopolAPIRequest;
use App\Http\Requests\API\UpdateNopolAPIRequest;
use App\Models\Nopol;
use App\Repositories\NopolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NopolController
 * @package App\Http\Controllers\API
 */

class NopolAPIController extends AppBaseController
{
    /** @var  NopolRepository */
    private $nopolRepository;

    public function __construct(NopolRepository $nopolRepo)
    {
        $this->nopolRepository = $nopolRepo;
    }

    /**
     * Display a listing of the Nopol.
     * GET|HEAD /nopols
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nopolRepository->pushCriteria(new RequestCriteria($request));
        $this->nopolRepository->pushCriteria(new LimitOffsetCriteria($request));
        $nopols = $this->nopolRepository->all();

        return $this->sendResponse($nopols->toArray(), 'Nopols retrieved successfully');
    }

    /**
     * Store a newly created Nopol in storage.
     * POST /nopols
     *
     * @param CreateNopolAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNopolAPIRequest $request)
    {
        $input = $request->all();

        $nopols = $this->nopolRepository->create($input);

        return $this->sendResponse($nopols->toArray(), 'Nopol saved successfully');
    }

    /**
     * Display the specified Nopol.
     * GET|HEAD /nopols/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nopol $nopol */
        $nopol = $this->nopolRepository->cekplat($id);

        if (empty($nopol)) {
            return $this->sendError('Nopol not found');
        }

        return $this->sendResponse($nopol->toArray(), 'Nopol retrieved successfully');
    }

    /**
     * Update the specified Nopol in storage.
     * PUT/PATCH /nopols/{id}
     *
     * @param  int $id
     * @param UpdateNopolAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNopolAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nopol $nopol */
        $nopol = $this->nopolRepository->findWithoutFail($id);

        if (empty($nopol)) {
            return $this->sendError('Nopol not found');
        }

        $nopol = $this->nopolRepository->update($input, $id);

        return $this->sendResponse($nopol->toArray(), 'Nopol updated successfully');
    }

    /**
     * Remove the specified Nopol from storage.
     * DELETE /nopols/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Nopol $nopol */
        $nopol = $this->nopolRepository->findWithoutFail($id);

        if (empty($nopol)) {
            return $this->sendError('Nopol not found');
        }

        $nopol->delete();

        return $this->sendResponse($id, 'Nopol deleted successfully');
    }
}
