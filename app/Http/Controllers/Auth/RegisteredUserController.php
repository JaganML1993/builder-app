<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register1');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255',
            'role' => 'required|exists:roles,id',
            'status' => 'required|in:0,1'
        ]);

        // Create user
        $user = new User();
        $user->name = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->account_name = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->status = $request->input('status');
        $user->save();

        return redirect('admin/index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Retrieve roles for dropdown
        $roles = \App\Models\Role::get();

        // dd($user,$roles);

        // Pass the user and roles data to the view
        return view('auth.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|exists:roles,id',
            'status' => 'required|in:0,1'
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Update user data
        $user->name = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->account_name = $request->input('username');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->status = $request->input('status');

        // Check if the password is being updated
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect('admin/index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'User deleted successfully!');
}

}
