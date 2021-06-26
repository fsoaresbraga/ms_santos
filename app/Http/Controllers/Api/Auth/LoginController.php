<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Api\User;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            return response()->json(Auth::user(), 200);
        }else {
            $json = ['error'=> 'Usuário ou senha incorreto'];
            return response()->json($json, 401);
        }
    }

    public function logout () {
        if(Auth::logout()) {
            $json = ['success'=> 'Usuário deslogado'];
            return response()->json($json, 200);
        }
    }
}
