<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register', [
            'title' => 'Bidji Course | Daftar'
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
        $credentials = $request->validate(
            [
                'email' => ['required', 'unique:users', 'email'],
                'gender' => ['required'],
                'full_name' => ['required', 'max:50'],
                'password' => ['required', 'min:8', 'same:password_confirm']
            ],
            array(
                'password.same' => 'Konfirmasi password tidak sesuai.',
                'password.min' => 'Password minimal 8 karakter.',
                'full_name.max' => 'Nama maksimal 50 karakter.',
                'email.unique' => 'Email sudah digunakan.',
                'email.email' => 'Masukan email yang benar.',
                'gender.required' => 'Silahkan pilih gender anda.'
            )
        );
        $credentials['password'] = bcrypt($credentials['password']);
        User::create($credentials);
        return redirect('/login')
            ->with('alert', 'success')
            ->with('text', 'Registrasi berhasil, sekarang anda bisa login!');
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
