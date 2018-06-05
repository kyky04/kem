<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePertanyaanRequest;
use App\Http\Requests\UpdatePertanyaanRequest;
use App\Repositories\PertanyaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PertanyaanController extends AppBaseController
{
    /** @var  PertanyaanRepository */
    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepo)
    {
        $this->pertanyaanRepository = $pertanyaanRepo;
    }

    /**
     * Display a listing of the Pertanyaan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pertanyaanRepository->pushCriteria(new RequestCriteria($request));
        $pertanyaans = $this->pertanyaanRepository->all();

        return view('pertanyaans.index')
            ->with('pertanyaans', $pertanyaans);
    }

    /**
     * Show the form for creating a new Pertanyaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pertanyaans.create');
    }

    /**
     * Store a newly created Pertanyaan in storage.
     *
     * @param CreatePertanyaanRequest $request
     *
     * @return Response
     */
    public function store(CreatePertanyaanRequest $request)
    {
        $input = $request->all();

        $pertanyaan = $this->pertanyaanRepository->create($input);

        Flash::success('Pertanyaan saved successfully.');

        return redirect(route('pertanyaans.index'));
    }

    /**
     * Display the specified Pertanyaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            Flash::error('Pertanyaan not found');

            return redirect(route('pertanyaans.index'));
        }

        return view('pertanyaans.show')->with('pertanyaan', $pertanyaan);
    }

    /**
     * Show the form for editing the specified Pertanyaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            Flash::error('Pertanyaan not found');

            return redirect(route('pertanyaans.index'));
        }

        return view('pertanyaans.edit')->with('pertanyaan', $pertanyaan);
    }

    /**
     * Update the specified Pertanyaan in storage.
     *
     * @param  int              $id
     * @param UpdatePertanyaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePertanyaanRequest $request)
    {
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            Flash::error('Pertanyaan not found');

            return redirect(route('pertanyaans.index'));
        }

        $pertanyaan = $this->pertanyaanRepository->update($request->all(), $id);

        Flash::success('Pertanyaan updated successfully.');

        return redirect(route('pertanyaans.index'));
    }

    /**
     * Remove the specified Pertanyaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            Flash::error('Pertanyaan not found');

            return redirect(route('pertanyaans.index'));
        }

        $this->pertanyaanRepository->delete($id);

        Flash::success('Pertanyaan deleted successfully.');

        return redirect(route('pertanyaans.index'));
    }
}
