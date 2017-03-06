<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgencyAPIRequest;
use App\Http\Requests\API\UpdateAgencyAPIRequest;
use App\Models\Agency;
use App\Repositories\AgencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AgencyController
 * @package App\Http\Controllers\API
 */

class AgencyAPIController extends AppBaseController
{
    /** @var  AgencyRepository */
    private $agencyRepository;

    public function __construct(AgencyRepository $agencyRepo)
    {
        $this->agencyRepository = $agencyRepo;
    }

    /**
     * Display a listing of the Agency.
     * GET|HEAD /agencies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agencyRepository->pushCriteria(new RequestCriteria($request));
        $this->agencyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $agencies = $this->agencyRepository->all();

        return $this->sendResponse($agencies->toArray(), 'Agencies retrieved successfully');
    }

    /**
     * Store a newly created Agency in storage.
     * POST /agencies
     *
     * @param CreateAgencyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgencyAPIRequest $request)
    {
        $input = $request->all();

        $agencies = $this->agencyRepository->create($input);

        return $this->sendResponse($agencies->toArray(), 'Agency saved successfully');
    }

    /**
     * Display the specified Agency.
     * GET|HEAD /agencies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agency $agency */
        $agency = $this->agencyRepository->findWithoutFail($id);

        if (empty($agency)) {
            return $this->sendError('Agency not found');
        }

        return $this->sendResponse($agency->toArray(), 'Agency retrieved successfully');
    }

    /**
     * Update the specified Agency in storage.
     * PUT/PATCH /agencies/{id}
     *
     * @param  int $id
     * @param UpdateAgencyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgencyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agency $agency */
        $agency = $this->agencyRepository->findWithoutFail($id);

        if (empty($agency)) {
            return $this->sendError('Agency not found');
        }

        $agency = $this->agencyRepository->update($input, $id);

        return $this->sendResponse($agency->toArray(), 'Agency updated successfully');
    }

    /**
     * Remove the specified Agency from storage.
     * DELETE /agencies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agency $agency */
        $agency = $this->agencyRepository->findWithoutFail($id);

        if (empty($agency)) {
            return $this->sendError('Agency not found');
        }

        $agency->delete();

        return $this->sendResponse($id, 'Agency deleted successfully');
    }
}
