<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login', [
            'title' => 'Bidji Course | Login'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $remember = ($request->remember == 'on' ? true : false);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')
                ->with('alert', 'info')
                ->with('text', 'Selamat datang, ' . auth()->user()->full_name . '!');
        };
        return back()
            ->with('alert', 'error')
            ->with('text', 'Email atau password salah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
