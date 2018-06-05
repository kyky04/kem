<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiswaAPIRequest;
use App\Http\Requests\API\UpdateSiswaAPIRequest;
use App\Models\Siswa;
use App\Repositories\SiswaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SiswaController
 * @package App\Http\Controllers\API
 */

class SiswaAPIController extends AppBaseController
{
    /** @var  SiswaRepository */
    private $siswaRepository;

    public function __construct(SiswaRepository $siswaRepo)
    {
        $this->siswaRepository = $siswaRepo;
    }

    /**
     * Display a listing of the Siswa.
     * GET|HEAD /siswas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->siswaRepository->pushCriteria(new RequestCriteria($request));
        $this->siswaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $siswas = $this->siswaRepository->all();

        return $this->sendResponse($siswas->toArray(), 'Siswas retrieved successfully');
    }

    public function indexByKelas(Request $request)
    {
        $id_kelas = $request->get('id_kelas');
        $siswas = Siswa::where('id_kelas',$id_kelas)->get();

        return $this->sendResponse($siswas->toArray(), 'Siswas retrieved successfully');
    }

    /**
     * Store a newly created Siswa in storage.
     * POST /siswas
     *
     * @param CreateSiswaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiswaAPIRequest $request)
    {
        $input = $request->all();

        $siswas = $this->siswaRepository->create($input);

        return $this->sendResponse($siswas->toArray(), 'Siswa saved successfully');
    }

    /**
     * Display the specified Siswa.
     * GET|HEAD /siswas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Siswa $siswa */
        $siswa = $this->siswaRepository->findWithoutFail($id);

        if (empty($siswa)) {
            return $this->sendError('Siswa not found');
        }

        return $this->sendResponse($siswa->toArray(), 'Siswa retrieved successfully');
    }

    /**
     * Update the specified Siswa in storage.
     * PUT/PATCH /siswas/{id}
     *
     * @param  int $id
     * @param UpdateSiswaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiswaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Siswa $siswa */
        $siswa = $this->siswaRepository->findWithoutFail($id);

        if (empty($siswa)) {
            return $this->sendError('Siswa not found');
        }

        $siswa = $this->siswaRepository->update($input, $id);

        return $this->sendResponse($siswa->toArray(), 'Siswa updated successfully');
    }

    /**
     * Remove the specified Siswa from storage.
     * DELETE /siswas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Siswa $siswa */
        $siswa = $this->siswaRepository->findWithoutFail($id);

        if (empty($siswa)) {
            return $this->sendError('Siswa not found');
        }

        $siswa->delete();

        return $this->sendResponse($id, 'Siswa deleted successfully');
    }
}
