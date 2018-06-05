<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSkorRequest;
use App\Http\Requests\UpdateSkorRequest;
use App\Repositories\SkorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SkorController extends AppBaseController
{
    /** @var  SkorRepository */
    private $skorRepository;

    public function __construct(SkorRepository $skorRepo)
    {
        $this->skorRepository = $skorRepo;
    }

    /**
     * Display a listing of the Skor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->skorRepository->pushCriteria(new RequestCriteria($request));
        $skors = $this->skorRepository->all();

        return view('skors.index')
            ->with('skors', $skors);
    }

    /**
     * Show the form for creating a new Skor.
     *
     * @return Response
     */
    public function create()
    {
        return view('skors.create');
    }

    /**
     * Store a newly created Skor in storage.
     *
     * @param CreateSkorRequest $request
     *
     * @return Response
     */
    public function store(CreateSkorRequest $request)
    {
        $input = $request->all();

        $skor = $this->skorRepository->create($input);

        Flash::success('Skor saved successfully.');

        return redirect(route('skors.index'));
    }

    /**
     * Display the specified Skor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            Flash::error('Skor not found');

            return redirect(route('skors.index'));
        }

        return view('skors.show')->with('skor', $skor);
    }

    /**
     * Show the form for editing the specified Skor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            Flash::error('Skor not found');

            return redirect(route('skors.index'));
        }

        return view('skors.edit')->with('skor', $skor);
    }

    /**
     * Update the specified Skor in storage.
     *
     * @param  int              $id
     * @param UpdateSkorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkorRequest $request)
    {
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            Flash::error('Skor not found');

            return redirect(route('skors.index'));
        }

        $skor = $this->skorRepository->update($request->all(), $id);

        Flash::success('Skor updated successfully.');

        return redirect(route('skors.index'));
    }

    /**
     * Remove the specified Skor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            Flash::error('Skor not found');

            return redirect(route('skors.index'));
        }

        $this->skorRepository->delete($id);

        Flash::success('Skor deleted successfully.');

        return redirect(route('skors.index'));
    }
}
