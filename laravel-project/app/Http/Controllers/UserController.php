<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\EditUser;
use App\Http\Requests\LoginUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users/index', [
            'users' => $users,
        ]);

    }

    public function edit(User $user)
    {
        return view('users/edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, EditUser $request)
    {
        $user->username = $request->username;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('message', 'User edited successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('message', 'User deleted successfully');
    }

    public function create()
    {
        return view('users/register');
    }

    public function store(CreateUser $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        auth()->login($user);

        return redirect('/home')
            ->with('message', 'User created and logged in');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('message', 'You have been logged out');
    }

    public function login()
    {
        return view('users/login');
    }

    public function authenticate(LoginUser $request)
    {
        // checking input is email or username.
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login')]);

        if (auth()->attempt($request->only($field, 'password'))) {
            $request->session()->regenerate();

            $folder = auth()->user()->folders()->first();

            if ($folder)
            {
                return redirect()
                    ->route('tasks.index', $folder)
                    ->with('message', 'You are logged in');
            }
            return redirect('/home')
                ->with('message', 'You have logged in!');
        }

        return back()->withErrors(['login' => 'lnvalid Credentials'])->onlyInput('login');
    }

}
