<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Siswa
 * @package App\Models
 * @version June 3, 2018, 4:54 pm UTC
 */
class Siswa extends Model
{
    use SoftDeletes;

    public $table = 'siswas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_kelas',
        'nama',
        'username',
        'email',
        'password',
        'jenis_kelamin',
        'sekolah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_kelas' => 'integer',
        'nama' => 'string',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'jenis_kelamin' => 'integer',
        'sekolah' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_kelas' => 'required',
        'nama' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',
        'jenis_kelamin' => 'required',
        'sekolah' => 'required'
    ];

    
}
