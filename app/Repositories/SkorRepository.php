<?php

namespace App\Repositories;

use App\Models\Skor;
use InfyOm\Generator\Common\BaseRepository;

class SkorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_siswa',
        'id_soal',
        'skor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Skor::class;
    }
}
