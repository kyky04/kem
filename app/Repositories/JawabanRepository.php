<?php

namespace App\Repositories;

use App\Models\Jawaban;
use InfyOm\Generator\Common\BaseRepository;

class JawabanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_soal',
        'jawaban',
        'benar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Jawaban::class;
    }
}
