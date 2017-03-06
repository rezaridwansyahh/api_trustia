<?php

namespace App\Http\Controllers;

use App\DataTables\KaseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKaseRequest;
use App\Http\Requests\UpdateKaseRequest;
use App\Repositories\KaseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KaseController extends AppBaseController
{
    /** @var  KaseRepository */
    private $kaseRepository;

    public function __construct(KaseRepository $kaseRepo)
    {
        $this->kaseRepository = $kaseRepo;
    }

    /**
     * Display a listing of the Kase.
     *
     * @param KaseDataTable $kaseDataTable
     * @return Response
     */
    public function index(KaseDataTable $kaseDataTable)
    {
        return $kaseDataTable->render('kases.index');
    }

    /**
     * Show the form for creating a new Kase.
     *
     * @return Response
     */
    public function create()
    {
        return view('kases.create');
    }

    /**
     * Store a newly created Kase in storage.
     *
     * @param CreateKaseRequest $request
     *
     * @return Response
     */
    public function store(CreateKaseRequest $request)
    {
        $input = $request->all();

        $kase = $this->kaseRepository->create($input);

        Flash::success('Kase saved successfully.');

        return redirect(route('kases.index'));
    }

    /**
     * Display the specified Kase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            Flash::error('Kase not found');

            return redirect(route('kases.index'));
        }

        return view('kases.show')->with('kase', $kase);
    }

    /**
     * Show the form for editing the specified Kase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            Flash::error('Kase not found');

            return redirect(route('kases.index'));
        }

        return view('kases.edit')->with('kase', $kase);
    }

    /**
     * Update the specified Kase in storage.
     *
     * @param  int              $id
     * @param UpdateKaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKaseRequest $request)
    {
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            Flash::error('Kase not found');

            return redirect(route('kases.index'));
        }

        $kase = $this->kaseRepository->update($request->all(), $id);

        Flash::success('Kase updated successfully.');

        return redirect(route('kases.index'));
    }

    /**
     * Remove the specified Kase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kase = $this->kaseRepository->findWithoutFail($id);

        if (empty($kase)) {
            Flash::error('Kase not found');

            return redirect(route('kases.index'));
        }

        $this->kaseRepository->delete($id);

        Flash::success('Kase deleted successfully.');

        return redirect(route('kases.index'));
    }
}
