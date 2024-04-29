<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resto_user;
use Illuminate\Support\Facades\Validator;

class reg_login extends Controller
{
    public function index()
    {
        // Only authenticated users can access this method
        return view('home');
    }
    public function register(Request $req)
    {
        // Validation rules
        $rules = [
            'email' => 'required|email|unique:resto_user,email',
            'password' => 'required|min:6',
        ];

        // Custom messages for validation errors
        $messages = [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
        ];

        // Validate the request data
        $validator = Validator::make($req->all(), $rules, $messages);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, create and save the user
        $user = new resto_user();
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->save();

        // Redirect with success message
        return redirect('register')->with('success', 'Registration Successful');
    }

    public function login(Request $req)
    {
        // Validation rules
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        // Custom messages for validation errors
        $messages = [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'password.required' => 'Password is required.',
        ];

        // Validate the request data
        $validator = Validator::make($req->all(), $rules, $messages);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find user by email
        $user = resto_user::where('email', $req->input('email'))->first();

        session(['email' => $req->input('email')]);



        // If user doesn't exist, redirect back with error message
        if (!$user) {
            return redirect('login')->with('error', 'Invalid Email');
        }

        // Check if password matches
        if ($user->password != $req->input('password')) {
            return redirect('login')->with('error', 'Invalid Password');
        }

        // If email and password are correct, redirect to home
        return redirect('home');
    }
    public function logout()
    {
        session()->forget('email');
        return redirect('login');
    }

    public function showdata()
    {
        $data = resto_user::all();
        return view('home', ['data' => $data]);
    }
    public function update(Request $req)
    {
        $data = resto_user::find($req->id);

        $data->email = $req->input('email');
        $data->password = $req->input('password');
        $data->save();
        return redirect('home')->with('up_success', 'Updated Successfully');
    }

    public function edit($id)
    {
        $data = resto_user::find($id);
        return view('edit', ['data' => $data]);
    }

    public function delete($id)
    {
        $data = resto_user::find($id);
        $data->delete();
        return redirect('home')->with('de_success', 'Deleted Successfully');
    }
}
