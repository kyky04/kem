<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Repositories\SoalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SoalController extends AppBaseController
{
    /** @var  SoalRepository */
    private $soalRepository;

    public function __construct(SoalRepository $soalRepo)
    {
        $this->soalRepository = $soalRepo;
    }

    /**
     * Display a listing of the Soal.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->soalRepository->pushCriteria(new RequestCriteria($request));
        $soals = $this->soalRepository->all();

        return view('soals.index')
            ->with('soals', $soals);
    }

    /**
     * Show the form for creating a new Soal.
     *
     * @return Response
     */
    public function create()
    {
        return view('soals.create');
    }

    /**
     * Store a newly created Soal in storage.
     *
     * @param CreateSoalRequest $request
     *
     * @return Response
     */
    public function store(CreateSoalRequest $request)
    {
        $input = $request->all();

        $soal = $this->soalRepository->create($input);

        Flash::success('Soal saved successfully.');

        return redirect(route('soals.index'));
    }

    /**
     * Display the specified Soal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            Flash::error('Soal not found');

            return redirect(route('soals.index'));
        }

        return view('soals.show')->with('soal', $soal);
    }

    /**
     * Show the form for editing the specified Soal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            Flash::error('Soal not found');

            return redirect(route('soals.index'));
        }

        return view('soals.edit')->with('soal', $soal);
    }

    /**
     * Update the specified Soal in storage.
     *
     * @param  int              $id
     * @param UpdateSoalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoalRequest $request)
    {
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            Flash::error('Soal not found');

            return redirect(route('soals.index'));
        }

        $soal = $this->soalRepository->update($request->all(), $id);

        Flash::success('Soal updated successfully.');

        return redirect(route('soals.index'));
    }

    /**
     * Remove the specified Soal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            Flash::error('Soal not found');

            return redirect(route('soals.index'));
        }

        $this->soalRepository->delete($id);

        Flash::success('Soal deleted successfully.');

        return redirect(route('soals.index'));
    }
}
