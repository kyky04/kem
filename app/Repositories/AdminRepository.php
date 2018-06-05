<?php

namespace App\Repositories;

use App\Models\Admin;
use InfyOm\Generator\Common\BaseRepository;

class AdminRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'string',
        'email',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Admin::class;
    }
}
