<?php

namespace App\Http\Controllers;

use App\DataTables\CaseDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCaseDetailRequest;
use App\Http\Requests\UpdateCaseDetailRequest;
use App\Repositories\CaseDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CaseDetailController extends AppBaseController
{
    /** @var  CaseDetailRepository */
    private $caseDetailRepository;

    public function __construct(CaseDetailRepository $caseDetailRepo)
    {
        $this->caseDetailRepository = $caseDetailRepo;
    }

    /**
     * Display a listing of the CaseDetail.
     *
     * @param CaseDetailDataTable $caseDetailDataTable
     * @return Response
     */
    public function index(CaseDetailDataTable $caseDetailDataTable)
    {
        return $caseDetailDataTable->render('case_details.index');
    }

    /**
     * Show the form for creating a new CaseDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('case_details.create');
    }

    /**
     * Store a newly created CaseDetail in storage.
     *
     * @param CreateCaseDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateCaseDetailRequest $request)
    {
        $input = $request->all();

        $caseDetail = $this->caseDetailRepository->create($input);

        Flash::success('Case Detail saved successfully.');

        return redirect(route('caseDetails.index'));
    }

    /**
     * Display the specified CaseDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            Flash::error('Case Detail not found');

            return redirect(route('caseDetails.index'));
        }

        return view('case_details.show')->with('caseDetail', $caseDetail);
    }

    /**
     * Show the form for editing the specified CaseDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            Flash::error('Case Detail not found');

            return redirect(route('caseDetails.index'));
        }

        return view('case_details.edit')->with('caseDetail', $caseDetail);
    }

    /**
     * Update the specified CaseDetail in storage.
     *
     * @param  int              $id
     * @param UpdateCaseDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaseDetailRequest $request)
    {
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            Flash::error('Case Detail not found');

            return redirect(route('caseDetails.index'));
        }

        $caseDetail = $this->caseDetailRepository->update($request->all(), $id);

        Flash::success('Case Detail updated successfully.');

        return redirect(route('caseDetails.index'));
    }

    /**
     * Remove the specified CaseDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $caseDetail = $this->caseDetailRepository->findWithoutFail($id);

        if (empty($caseDetail)) {
            Flash::error('Case Detail not found');

            return redirect(route('caseDetails.index'));
        }

        $this->caseDetailRepository->delete($id);

        Flash::success('Case Detail deleted successfully.');

        return redirect(route('caseDetails.index'));
    }
}
