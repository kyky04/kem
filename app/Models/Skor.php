<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Skor
 * @package App\Models
 * @version June 3, 2018, 4:56 pm UTC
 */
class Skor extends Model
{
    use SoftDeletes;

    public $table = 'skors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_siswa',
        'id_soal',
        'skor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_siswa' => 'integer',
        'id_soal' => 'integer',
        'skor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_siswa' => 'required',
        'id_soal' => 'required',
        'skor' => 'required'
    ];

    public function soal()
    {
        return $this->belongsTo('App\Models\Soal','id_soal');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa','id_siswa');
    }
}
