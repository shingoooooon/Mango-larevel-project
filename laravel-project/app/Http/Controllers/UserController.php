<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users/register');
    }

    public function store(CreateUser $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        auth()->login($user);

        return redirect('/')
            ->with('message', 'User created and logged in');
    }



    public function login()
    {
        return view('users/login');
    }

    public function authenticate()
    {

    }

}
