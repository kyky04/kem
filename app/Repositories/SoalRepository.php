<?php

namespace App\Repositories;

use App\Models\Soal;
use InfyOm\Generator\Common\BaseRepository;

class SoalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_kelas',
        'judul',
        'pertanyaan',
        'jumlah_kata'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Soal::class;
    }
}
