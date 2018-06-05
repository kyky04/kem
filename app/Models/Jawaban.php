<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jawaban
 * @package App\Models
 * @version June 3, 2018, 4:50 pm UTC
 */
class Jawaban extends Model
{
    use SoftDeletes;

    public $table = 'jawabans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_soal',
        'jawaban',
        'benar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_soal' => 'integer',
        'jawaban' => 'string',
        'benar' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_soal' => 'required',
        'jawaban' => 'required',
        'benar' => 'required'
    ];

    
}
