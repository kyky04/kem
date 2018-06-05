<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKelasAPIRequest;
use App\Http\Requests\API\UpdateKelasAPIRequest;
use App\Models\Kelas;
use App\Repositories\KelasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KelasController
 * @package App\Http\Controllers\API
 */

class KelasAPIController extends AppBaseController
{
    /** @var  KelasRepository */
    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepo)
    {
        $this->kelasRepository = $kelasRepo;
    }

    /**
     * Display a listing of the Kelas.
     * GET|HEAD /kelas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kelasRepository->pushCriteria(new RequestCriteria($request));
        $this->kelasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kelas = $this->kelasRepository->all();

        return $this->sendResponse($kelas->toArray(), 'Kelas retrieved successfully');
    }

    /**
     * Store a newly created Kelas in storage.
     * POST /kelas
     *
     * @param CreateKelasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKelasAPIRequest $request)
    {
        $input = $request->all();

        $kelas = $this->kelasRepository->create($input);

        return $this->sendResponse($kelas->toArray(), 'Kelas saved successfully');
    }

    /**
     * Display the specified Kelas.
     * GET|HEAD /kelas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kelas $kelas */
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            return $this->sendError('Kelas not found');
        }

        return $this->sendResponse($kelas->toArray(), 'Kelas retrieved successfully');
    }

    /**
     * Update the specified Kelas in storage.
     * PUT/PATCH /kelas/{id}
     *
     * @param  int $id
     * @param UpdateKelasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKelasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kelas $kelas */
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            return $this->sendError('Kelas not found');
        }

        $kelas = $this->kelasRepository->update($input, $id);

        return $this->sendResponse($kelas->toArray(), 'Kelas updated successfully');
    }

    /**
     * Remove the specified Kelas from storage.
     * DELETE /kelas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kelas $kelas */
        $kelas = $this->kelasRepository->findWithoutFail($id);

        if (empty($kelas)) {
            return $this->sendError('Kelas not found');
        }

        $kelas->delete();

        return $this->sendResponse($id, 'Kelas deleted successfully');
    }
}
