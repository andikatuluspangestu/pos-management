<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'sales') {
                return redirect('/sales');
            } elseif (Auth::user()->role == 'customer') {
                return redirect('/customer');
            }
        }

        return redirect('/login')->with('error', 'Email atau password yang anda masukan salah!');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,sales,customer', 
        ]);

        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'role'          => $request->role,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'city'          => $request->city,
            'postal_code'   => $request->postal_code,
        ]);

        Auth::login($user);

        return redirect('/home');
    }

    public function profile()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        if ($user->role == 'admin') {
            return view('admin.profile', compact('user'));
        } elseif ($user->role == 'sales') {
            return view('sales.profile', compact('user'));
        } elseif ($user->role == 'customer') {
            return view('customer.profile', compact('user'));
        }
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        // Cek apakah ada password yang diinput atau tidak
        if ($request->password != '') {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = bcrypt($request->password);
        } else {
            $user->password = $user->password;
        }

        // Update data user
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->address      = $request->address;
        $user->city         = $request->city;
        $user->postal_code  = $request->postal_code;

        $user->save();

        return redirect()->back()->with('success', 'Profile berhasil diupdate!');
    }

}
