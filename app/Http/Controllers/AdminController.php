<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == "POST") {

            if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
                return back()->with('message', 'Wrong Phone Number or Password');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return view('user.login');
        }
    }
    public function register(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric|starts_with:98|digits:10|unique:users,phone',
                'password' => 'required|min:8',
                'address' => 'required',

            ]);
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->school = $request->school;
            $user->role = 2;
            $user->password = bcrypt($request->password);
            dd($user);
        } else {
            return view('user.register');
        }
    }
}
