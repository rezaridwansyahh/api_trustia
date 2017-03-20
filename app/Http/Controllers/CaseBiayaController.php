<?php

namespace App\Http\Controllers;

use App\DataTables\CaseBiayaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCaseBiayaRequest;
use App\Http\Requests\UpdateCaseBiayaRequest;
use App\Repositories\CaseBiayaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CaseBiayaController extends AppBaseController
{
    /** @var  CaseBiayaRepository */
    private $caseBiayaRepository;

    public function __construct(CaseBiayaRepository $caseBiayaRepo)
    {
        $this->caseBiayaRepository = $caseBiayaRepo;
    }

    /**
     * Display a listing of the CaseBiaya.
     *
     * @param CaseBiayaDataTable $caseBiayaDataTable
     * @return Response
     */
    public function index(CaseBiayaDataTable $caseBiayaDataTable)
    {
        return $caseBiayaDataTable->render('case_biayas.index');
    }

    /**
     * Show the form for creating a new CaseBiaya.
     *
     * @return Response
     */
    public function create()
    {
        return view('case_biayas.create');
    }

    /**
     * Store a newly created CaseBiaya in storage.
     *
     * @param CreateCaseBiayaRequest $request
     *
     * @return Response
     */
    public function store(CreateCaseBiayaRequest $request)
    {
        $input = $request->all();

        $caseBiaya = $this->caseBiayaRepository->create($input);

        Flash::success('Case Biaya saved successfully.');

        return redirect(route('caseBiayas.index'));
    }

    /**
     * Display the specified CaseBiaya.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            Flash::error('Case Biaya not found');

            return redirect(route('caseBiayas.index'));
        }

        return view('case_biayas.show')->with('caseBiaya', $caseBiaya);
    }

    /**
     * Show the form for editing the specified CaseBiaya.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            Flash::error('Case Biaya not found');

            return redirect(route('caseBiayas.index'));
        }

        return view('case_biayas.edit')->with('caseBiaya', $caseBiaya);
    }

    /**
     * Update the specified CaseBiaya in storage.
     *
     * @param  int              $id
     * @param UpdateCaseBiayaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaseBiayaRequest $request)
    {
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            Flash::error('Case Biaya not found');

            return redirect(route('caseBiayas.index'));
        }

        $caseBiaya = $this->caseBiayaRepository->update($request->all(), $id);

        Flash::success('Case Biaya updated successfully.');

        return redirect(route('caseBiayas.index'));
    }

    /**
     * Remove the specified CaseBiaya from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $caseBiaya = $this->caseBiayaRepository->findWithoutFail($id);

        if (empty($caseBiaya)) {
            Flash::error('Case Biaya not found');

            return redirect(route('caseBiayas.index'));
        }

        $this->caseBiayaRepository->delete($id);

        Flash::success('Case Biaya deleted successfully.');

        return redirect(route('caseBiayas.index'));
    }
}
