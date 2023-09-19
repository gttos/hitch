<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $users = User::all();

        return view('auth.user.user-index', [
            'users' => $users
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(string $id)
    {
        return view('auth.user.user-edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($id);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);

        return Redirect::route('auth.user-index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();

        return Redirect::route('auth.user-index');
    }
}
