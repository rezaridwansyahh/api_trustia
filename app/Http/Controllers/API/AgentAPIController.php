<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgentAPIRequest;
use App\Http\Requests\API\UpdateAgentAPIRequest;
use App\Models\Agent;
use App\Models\Kase;
use App\Repositories\AgentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AgentController
 * @package App\Http\Controllers\API
 */

class AgentAPIController extends AppBaseController
{
    /** @var  AgentRepository */
    private $agentRepository;

    public function __construct(AgentRepository $agentRepo)
    {
        $this->agentRepository = $agentRepo;
    }

    /**
     * Display a listing of the Agent.
     * GET|HEAD /agents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agentRepository->pushCriteria(new RequestCriteria($request));
        $this->agentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $agents = $this->agentRepository->all();

        return $this->sendResponse($agents->toArray(), 'Agents retrieved successfully');
    }

    /**
     * Store a newly created Agent in storage.
     * POST /agents
     *
     * @param CreateAgentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgentAPIRequest $request)
    {
        $input = $request->all();

        $agents = $this->agentRepository->create($input);

        return $this->sendResponse($agents->toArray(), 'Agent saved successfully');
    }

    /**
     * Display the specified Agent.
     * GET|HEAD /agents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agent $agent */
        $agent = $this->agentRepository->findWithoutFail($id);

        if (empty($agent)) {
            return $this->sendError('Agent not found');
        }

        return $this->sendResponse($agent->toArray(), 'Agent retrieved successfully');
    }

    /**
     * Update the specified Agent in storage.
     * PUT/PATCH /agents/{id}
     *
     * @param  int $id
     * @param UpdateAgentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agent $agent */
        $agent = $this->agentRepository->findWithoutFail($id);

        if (empty($agent)) {
            return $this->sendError('Agent not found');
        }

        $agent = $this->agentRepository->update($input, $id);

        return $this->sendResponse($agent->toArray(), 'Agent updated successfully');
    }

    /**
     * Remove the specified Agent from storage.
     * DELETE /agents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agent $agent */
        $agent = $this->agentRepository->findWithoutFail($id);

        if (empty($agent)) {
            return $this->sendError('Agent not found');
        }

        $agent->delete();

        return $this->sendResponse($id, 'Agent deleted successfully');
    }

    public function acceptAgent($id){
      $agent = Agent::find($id);
      if($agent->status==1){
        $agent->status = 0;
      }else {
        $agent->status = 1;
      }
        $agent->save();
      return $this->sendResponse($agent, 'Udah diganti coy statusnya');
    }

}
