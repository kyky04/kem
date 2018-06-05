<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSoalAPIRequest;
use App\Http\Requests\API\UpdateSoalAPIRequest;
use App\Models\Soal;
use App\Repositories\SoalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SoalController
 * @package App\Http\Controllers\API
 */

class SoalAPIController extends AppBaseController
{
    /** @var  SoalRepository */
    private $soalRepository;

    public function __construct(SoalRepository $soalRepo)
    {
        $this->soalRepository = $soalRepo;
    }

    /**
     * Display a listing of the Soal.
     * GET|HEAD /soals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->soalRepository->pushCriteria(new RequestCriteria($request));
        $this->soalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $soals = $this->soalRepository->all();

        return $this->sendResponse($soals->toArray(), 'Soals retrieved successfully');
    }

    public function indexByKelas(Request $request)
    {   

        $id_kelas = $request->get('id_kelas');
        $soals = Soal::where('id_kelas',$id_kelas)->get();

        return $this->sendResponse($soals->toArray(), 'Soals retrieved successfully');
    }

    /**
     * Store a newly created Soal in storage.
     * POST /soals
     *
     * @param CreateSoalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSoalAPIRequest $request)
    {
        $input = $request->all();

        $soals = $this->soalRepository->create($input);

        return $this->sendResponse($soals->toArray(), 'Soal saved successfully');
    }

    /**
     * Display the specified Soal.
     * GET|HEAD /soals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Soal $soal */
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            return $this->sendError('Soal not found');
        }

        return $this->sendResponse($soal->toArray(), 'Soal retrieved successfully');
    }

    /**
     * Update the specified Soal in storage.
     * PUT/PATCH /soals/{id}
     *
     * @param  int $id
     * @param UpdateSoalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Soal $soal */
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            return $this->sendError('Soal not found');
        }

        $soal = $this->soalRepository->update($input, $id);

        return $this->sendResponse($soal->toArray(), 'Soal updated successfully');
    }

    /**
     * Remove the specified Soal from storage.
     * DELETE /soals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Soal $soal */
        $soal = $this->soalRepository->findWithoutFail($id);

        if (empty($soal)) {
            return $this->sendError('Soal not found');
        }

        $soal->delete();

        return $this->sendResponse($id, 'Soal deleted successfully');
    }
}
