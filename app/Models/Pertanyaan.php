<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pertanyaan
 * @package App\Models
 * @version June 3, 2018, 5:41 pm UTC
 */
class Pertanyaan extends Model
{
    use SoftDeletes;

    public $table = 'pertanyaans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_soal',
        'pertanyaan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_soal' => 'integer',
        'pertanyaan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_soal' => 'required',
        'pertanyaan' => 'required'
    ];

    public function jawaban()
    {   
        return $this->hasMany('App\Models\Jawaban','id_soal');
    }
}
