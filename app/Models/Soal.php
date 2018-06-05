<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Soal
 * @package App\Models
 * @version June 3, 2018, 4:49 pm UTC
 */
class Soal extends Model
{
    use SoftDeletes;

    public $table = 'soals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_kelas',
        'judul',
        'pertanyaan',
        'jumlah_kata'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_kelas' => 'integer',
        'judul' => 'string',
        'pertanyaan' => 'string',
        'jumlah_kata' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_kelas' => 'required',
        'judul' => 'required',
        'pertanyaan' => 'required',
        'jumlah_kata' => 'required',
    ];

    
}
