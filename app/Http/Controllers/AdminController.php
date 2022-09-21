<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __invoke()
    {
        $info = [
            'email' => 'bestAdmin@gmail.com',
            'password' => 'option123'
        ];


        if(Auth::attempt($info)){
            $user = Auth::user();
            $adminToken = $user->createToken('admin-token',['create','update','delete']);

            return [
                    'admin' => $adminToken->plainTextToken
            ];
        }

    }
}
