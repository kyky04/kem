<?php

namespace App\Repositories;

use App\Models\Pertanyaan;
use InfyOm\Generator\Common\BaseRepository;

class PertanyaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_soal',
        'pertanyaan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pertanyaan::class;
    }
}
