<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Use User Model
use App\User;
//Use Resources to convert into json
use App\Http\Resources\UserResource as UserResource;

class UserController extends Controller
{
    //
    public function getusers()
    {
        $users = User::get();
        return UserResource::collection($users);
    }

    /*public function verificaruser($id)
    {        
        $users = User::get($id);        
    }

    return response()->json([
        'error' => 'Resource not found'
    ], 404);
    data: "Resource not found"*/
}
