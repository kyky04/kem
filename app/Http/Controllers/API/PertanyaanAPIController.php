<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePertanyaanAPIRequest;
use App\Http\Requests\API\UpdatePertanyaanAPIRequest;
use App\Models\Pertanyaan;
use App\Repositories\PertanyaanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PertanyaanController
 * @package App\Http\Controllers\API
 */

class PertanyaanAPIController extends AppBaseController
{
    /** @var  PertanyaanRepository */
    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepo)
    {
        $this->pertanyaanRepository = $pertanyaanRepo;
    }

    /**
     * Display a listing of the Pertanyaan.
     * GET|HEAD /pertanyaans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {      
        $this->pertanyaanRepository->pushCriteria(new RequestCriteria($request));
        $this->pertanyaanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pertanyaans = Pertanyaan::with('jawaban')->get();

        return $this->sendResponse($pertanyaans->toArray(), 'Pertanyaans retrieved successfully');
    }

    public function pertanyaanBySoal(Request $request)
    {   
        $id_soal = $request->id_soal;
        $this->pertanyaanRepository->pushCriteria(new RequestCriteria($request));
        $this->pertanyaanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pertanyaans = Pertanyaan::where('id_soal',$id_soal)->with('jawaban')->get();

        return $this->sendResponse($pertanyaans->toArray(), 'Pertanyaans retrieved successfully');
    }

    /**
     * Store a newly created Pertanyaan in storage.
     * POST /pertanyaans
     *
     * @param CreatePertanyaanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePertanyaanAPIRequest $request)
    {
        $input = $request->all();

        $pertanyaans = $this->pertanyaanRepository->create($input);

        return $this->sendResponse($pertanyaans->toArray(), 'Pertanyaan saved successfully');
    }

    /**
     * Display the specified Pertanyaan.
     * GET|HEAD /pertanyaans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pertanyaan $pertanyaan */
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            return $this->sendError('Pertanyaan not found');
        }

        return $this->sendResponse($pertanyaan->toArray(), 'Pertanyaan retrieved successfully');
    }

    /**
     * Update the specified Pertanyaan in storage.
     * PUT/PATCH /pertanyaans/{id}
     *
     * @param  int $id
     * @param UpdatePertanyaanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePertanyaanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pertanyaan $pertanyaan */
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            return $this->sendError('Pertanyaan not found');
        }

        $pertanyaan = $this->pertanyaanRepository->update($input, $id);

        return $this->sendResponse($pertanyaan->toArray(), 'Pertanyaan updated successfully');
    }

    /**
     * Remove the specified Pertanyaan from storage.
     * DELETE /pertanyaans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pertanyaan $pertanyaan */
        $pertanyaan = $this->pertanyaanRepository->findWithoutFail($id);

        if (empty($pertanyaan)) {
            return $this->sendError('Pertanyaan not found');
        }

        $pertanyaan->delete();

        return $this->sendResponse($id, 'Pertanyaan deleted successfully');
    }
}
