<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSkorAPIRequest;
use App\Http\Requests\API\UpdateSkorAPIRequest;
use App\Models\Skor;
use App\Repositories\SkorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SkorController
 * @package App\Http\Controllers\API
 */

class SkorAPIController extends AppBaseController
{
    /** @var  SkorRepository */
    private $skorRepository;

    public function __construct(SkorRepository $skorRepo)
    {
        $this->skorRepository = $skorRepo;
    }

    /**
     * Display a listing of the Skor.
     * GET|HEAD /skors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->skorRepository->pushCriteria(new RequestCriteria($request));
        $this->skorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $skors = Skor::with('soal')->with('siswa')->get();

        return $this->sendResponse($skors->toArray(), 'Skors retrieved successfully');
    }

    public function skorSiswa(Request $request)
    {   
        $id_soal = $request->get('id_soal');
        $skors = Skor::with('soal')->with('siswa')->where('id_soal',$id_soal)->get();

        return $this->sendResponse($skors->toArray(), 'Skors retrieved successfully');
    }

    public function skorSaya(Request $request)
    {   
        $id_siswa = $request->get('id_siswa');
        $skors = Skor::with('soal')->with('siswa')->where('id_siswa',$id_siswa)->get();

        return $this->sendResponse($skors->toArray(), 'Skors retrieved successfully');
    }

    /**
     * Store a newly created Skor in storage.
     * POST /skors
     *
     * @param CreateSkorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSkorAPIRequest $request)
    {
        $input = $request->all();

        $skors = $this->skorRepository->create($input);

        return $this->sendResponse($skors->toArray(), 'Skor saved successfully');
    }

    /**
     * Display the specified Skor.
     * GET|HEAD /skors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Skor $skor */
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            return $this->sendError('Skor not found');
        }

        return $this->sendResponse($skor->toArray(), 'Skor retrieved successfully');
    }

    /**
     * Update the specified Skor in storage.
     * PUT/PATCH /skors/{id}
     *
     * @param  int $id
     * @param UpdateSkorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Skor $skor */
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            return $this->sendError('Skor not found');
        }

        $skor = $this->skorRepository->update($input, $id);

        return $this->sendResponse($skor->toArray(), 'Skor updated successfully');
    }

    /**
     * Remove the specified Skor from storage.
     * DELETE /skors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Skor $skor */
        $skor = $this->skorRepository->findWithoutFail($id);

        if (empty($skor)) {
            return $this->sendError('Skor not found');
        }

        $skor->delete();

        return $this->sendResponse($id, 'Skor deleted successfully');
    }
}
