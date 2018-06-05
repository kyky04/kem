<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admin
 * @package App\Models
 * @version June 3, 2018, 6:49 pm UTC
 */
class Admin extends Model
{
    use SoftDeletes;

    public $table = 'admins';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    
}
