<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMerekAPIRequest;
use App\Http\Requests\API\UpdateMerekAPIRequest;
use App\Models\Merek;
use App\Repositories\MerekRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MerekController
 * @package App\Http\Controllers\API
 */

class MerekAPIController extends AppBaseController
{
    /** @var  MerekRepository */
    private $merekRepository;

    public function __construct(MerekRepository $merekRepo)
    {
        $this->merekRepository = $merekRepo;
    }

    /**
     * Display a listing of the Merek.
     * GET|HEAD /mereks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->merekRepository->pushCriteria(new RequestCriteria($request));
        $this->merekRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mereks = $this->merekRepository->all();

        return $this->sendResponse($mereks->toArray(), 'Mereks retrieved successfully');
    }

    /**
     * Store a newly created Merek in storage.
     * POST /mereks
     *
     * @param CreateMerekAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMerekAPIRequest $request)
    {
        $input = $request->all();

        $mereks = $this->merekRepository->create($input);

        return $this->sendResponse($mereks->toArray(), 'Merek saved successfully');
    }

    /**
     * Display the specified Merek.
     * GET|HEAD /mereks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Merek $merek */
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            return $this->sendError('Merek not found');
        }

        return $this->sendResponse($merek->toArray(), 'Merek retrieved successfully');
    }

    /**
     * Update the specified Merek in storage.
     * PUT/PATCH /mereks/{id}
     *
     * @param  int $id
     * @param UpdateMerekAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerekAPIRequest $request)
    {
        $input = $request->all();

        /** @var Merek $merek */
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            return $this->sendError('Merek not found');
        }

        $merek = $this->merekRepository->update($input, $id);
        return $this->sendResponse($input,"BISA KEK");
        //return $this->sendResponse($merek->toArray(), 'Merek updated successfully');
    }

    /**
     * Remove the specified Merek from storage.
     * DELETE /mereks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Merek $merek */
        $merek = $this->merekRepository->findWithoutFail($id);

        if (empty($merek)) {
            return $this->sendError('Merek not found');
        }

        $merek->delete();

        return $this->sendResponse($id, 'Merek deleted successfully');
    }
}
