<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJawabanRequest;
use App\Http\Requests\UpdateJawabanRequest;
use App\Repositories\JawabanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JawabanController extends AppBaseController
{
    /** @var  JawabanRepository */
    private $jawabanRepository;

    public function __construct(JawabanRepository $jawabanRepo)
    {
        $this->jawabanRepository = $jawabanRepo;
    }

    /**
     * Display a listing of the Jawaban.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jawabanRepository->pushCriteria(new RequestCriteria($request));
        $jawabans = $this->jawabanRepository->all();

        return view('jawabans.index')
            ->with('jawabans', $jawabans);
    }

    /**
     * Show the form for creating a new Jawaban.
     *
     * @return Response
     */
    public function create()
    {
        return view('jawabans.create');
    }

    /**
     * Store a newly created Jawaban in storage.
     *
     * @param CreateJawabanRequest $request
     *
     * @return Response
     */
    public function store(CreateJawabanRequest $request)
    {
        $input = $request->all();

        $jawaban = $this->jawabanRepository->create($input);

        Flash::success('Jawaban saved successfully.');

        return redirect(route('jawabans.index'));
    }

    /**
     * Display the specified Jawaban.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            Flash::error('Jawaban not found');

            return redirect(route('jawabans.index'));
        }

        return view('jawabans.show')->with('jawaban', $jawaban);
    }

    /**
     * Show the form for editing the specified Jawaban.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            Flash::error('Jawaban not found');

            return redirect(route('jawabans.index'));
        }

        return view('jawabans.edit')->with('jawaban', $jawaban);
    }

    /**
     * Update the specified Jawaban in storage.
     *
     * @param  int              $id
     * @param UpdateJawabanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJawabanRequest $request)
    {
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            Flash::error('Jawaban not found');

            return redirect(route('jawabans.index'));
        }

        $jawaban = $this->jawabanRepository->update($request->all(), $id);

        Flash::success('Jawaban updated successfully.');

        return redirect(route('jawabans.index'));
    }

    /**
     * Remove the specified Jawaban from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            Flash::error('Jawaban not found');

            return redirect(route('jawabans.index'));
        }

        $this->jawabanRepository->delete($id);

        Flash::success('Jawaban deleted successfully.');

        return redirect(route('jawabans.index'));
    }
}
