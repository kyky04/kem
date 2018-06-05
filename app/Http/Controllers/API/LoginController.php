<?php

namespace App\Http\Controllers\API;

use App\Models\Siswa;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JawabanController
 * @package App\Http\Controllers\API
 */

class LoginController extends AppBaseController
{
   
    public function login(Request $request)
    {
   $usernameCheck = Siswa::where('email', $request->email)->first();
        if($usernameCheck)
        {
        $passwordCheck = Siswa::where('email', $request->email)
                            ->where('password',$request->password)
                            ->first();
        if($passwordCheck)
        {
            return response()->json([
                'status' => "Login Berhasil",
                'siswa' => $usernameCheck
            ]);
        }else{
            return response()->json([
                'status' => "Password Salah",
            ]);
        }
        }else{
            return response()->json([
                'status' => "Username Salah",
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }          
    }

    public function loginAdmin(Request $request)
    {
   $usernameCheck = Admin::where('email', $request->email)->first();
        if($usernameCheck)
        {
        $passwordCheck = Admin::where('email', $request->email)
                            ->where('password',$request->password)
                            ->first();
        if($passwordCheck)
        {
            return response()->json([
                'status' => "Login Berhasil",
                'admin' => $usernameCheck
            ]);
        }else{
            return response()->json([
                'status' => "Password Salah",
            ]);
        }
        }else{
            return response()->json([
                'status' => "Email Salah",
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }          
    }
}
