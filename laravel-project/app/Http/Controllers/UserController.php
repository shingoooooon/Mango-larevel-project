<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\EditProfile;
use App\Http\Requests\EditUser;
use App\Http\Requests\LoginUser;
use App\Http\Requests\UpdatePassword;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->all();

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

    public function update($id, EditUser $request)
    {
        $this->repository->update($request->all(), $id);

        return redirect()
            ->route('users.index')
            ->with('message', 'User-info has updated successfully');
    }

    public function editProfile(User $user)
    {
        return view('users/editProfile', [
            'user' => $user,
        ]);
    }

    public function updateProfile(User $user, EditProfile $request)
    {
        $user->username = $request->username;
        $user->email = $request->email;
        if (auth()->user()->is_admin) {
            $user->is_admin = $request->is_admin;
        }
        if ($request->hasFile('icon')) {
            $user->icon = $request->file('icon')->store('icons', 'public');
        }
        $user->save();

        return redirect()
            ->route('users.show', $user)
            ->with('message', 'Profile has updated successfully!');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

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
        if (!Hash::check($request->old_password, auth()->user()->password)) {
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
        // checking whether input is email or username
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login')]);

        // the user will be retrieved by the value of $field
        // the framework will automatically hash the password
        if (auth()->attempt($request->only($field, 'password'))) {
            $request->session()->regenerate();

            $folder = auth()->user()->folders()->first();
            if ($folder) {
                return redirect()
                    ->route('tasks.index', $folder)
                    ->with('message', 'You are logged in');
            }
            return redirect()
                ->route('home')
                ->with('message', 'You have logged in!');
        }

        return back()->withErrors(['login' => 'Invalid Credentials'])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        return redirect()
            ->route('login')
            ->with('message', 'You have logged out!');
    }

}
