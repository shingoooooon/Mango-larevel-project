<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\EditProfile;
use App\Http\Requests\EditUser;
use App\Http\Requests\LoginUser;
use App\Http\Requests\UpdatePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users/index', [
            'users' => $users,
        ]);

    }

    public function show(User $user)
    {
        return view('users/show', [
            'user' => $user,
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
            ->with('message', 'User-info has updated successfully');
    }

    public function editprofile(User $user)
    {
        return view('users/editprofile', [
            'user' => $user,
        ]);
    }

    public function updateprofile(User $user, EditProfile $request)
    {
        $user->username = $request->username;
        $user->email = $request->email;
        if (auth()->user()->is_admin)
        {
            $user->is_admin = $request->is_admin;
        }
        if ($request->hasFile('icon'))
        {
            $user->icon = $request->file('icon')->store('icons', 'public');
        }
        $user->save();

        return redirect()
            ->route('users.show', $user)
            ->with('message', 'Profile has updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('message', 'User has deleted successfully!');
    }

    public function changePassword()
    {
        return view('users/change-password');
    }

    public function updatePassword(UpdatePassword $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password))
        {
            return back()
                ->with("error", "Old Password doesn't match");
        }

        auth()->user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        return back()
            ->with('status', 'Password has changed successfully!');
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
            ->with('message', 'User has created and logged in!');
    }

    public function login()
    {
        return view('users/login');
    }

    public function authenticate(LoginUser $request)
    {
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
            return redirect()
                ->route('home')
                ->with('message', 'You have logged in!');
        }

        return back()->withErrors(['login' => 'lnvalid Credentials'])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('message', 'You have logged out!');
    }

}
