<?php

namespace App\Repositories;

use App\Models\Siswa;
use InfyOm\Generator\Common\BaseRepository;

class SiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_kelas',
        'nama',
        'username',
        'email',
        'password',
        'jenis_kelamin',
        'sekolah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Siswa::class;
    }
}
