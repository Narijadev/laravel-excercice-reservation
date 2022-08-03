<?php

namespace App\Http\Controller\Api;

class UsersController extends Controller{

    public function index()
    {
        $users = User::all();
        return response()->json([
            'status'=>200,
            'users'=>$users,
            'rakoto'=>'rakoto'
        ])
    }
}

