<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJawabanAPIRequest;
use App\Http\Requests\API\UpdateJawabanAPIRequest;
use App\Models\Jawaban;
use App\Repositories\JawabanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JawabanController
 * @package App\Http\Controllers\API
 */

class JawabanAPIController extends AppBaseController
{
    /** @var  JawabanRepository */
    private $jawabanRepository;

    public function __construct(JawabanRepository $jawabanRepo)
    {
        $this->jawabanRepository = $jawabanRepo;
    }

    /**
     * Display a listing of the Jawaban.
     * GET|HEAD /jawabans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jawabanRepository->pushCriteria(new RequestCriteria($request));
        $this->jawabanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jawabans = $this->jawabanRepository->all();

        return $this->sendResponse($jawabans->toArray(), 'Jawabans retrieved successfully');
    }

    public function indexBySoal(Request $request)
    {   
        $id_soal = $request->id_soal;
        $jawabans = Jawaban::where('id_soal',$id_soal)->get();

        return $this->sendResponse($jawabans->toArray(), 'Jawabans retrieved successfully');
    }

    /**
     * Store a newly created Jawaban in storage.
     * POST /jawabans
     *
     * @param CreateJawabanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJawabanAPIRequest $request)
    {
        $input = $request->all();

        $jawabans = $this->jawabanRepository->create($input);

        return $this->sendResponse($jawabans->toArray(), 'Jawaban saved successfully');
    }

    /**
     * Display the specified Jawaban.
     * GET|HEAD /jawabans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jawaban $jawaban */
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            return $this->sendError('Jawaban not found');
        }

        return $this->sendResponse($jawaban->toArray(), 'Jawaban retrieved successfully');
    }

    /**
     * Update the specified Jawaban in storage.
     * PUT/PATCH /jawabans/{id}
     *
     * @param  int $id
     * @param UpdateJawabanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJawabanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jawaban $jawaban */
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            return $this->sendError('Jawaban not found');
        }

        $jawaban = $this->jawabanRepository->update($input, $id);

        return $this->sendResponse($jawaban->toArray(), 'Jawaban updated successfully');
    }

    /**
     * Remove the specified Jawaban from storage.
     * DELETE /jawabans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jawaban $jawaban */
        $jawaban = $this->jawabanRepository->findWithoutFail($id);

        if (empty($jawaban)) {
            return $this->sendError('Jawaban not found');
        }

        $jawaban->delete();

        return $this->sendResponse($id, 'Jawaban deleted successfully');
    }
}
