<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.register', [
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
        $data = $request->validate(
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
                'gender.required' => 'Silahkan pilih gender kamu.'
            )
        );
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        try {
            $seed = $user->id;
            $avatar_url = "https://api.dicebear.com/6.x/avataaars/png?seed=$seed&backgroundColor=b6e3f4,c0aede,d1d4f9,ffdfbf,ffd5dc&backgroundType=gradientLinear&accessoriesProbability=25";
            $avatar = file_get_contents($avatar_url);
            $avatar_file_name = "$seed.png";
            $avatar_file_path = public_path('img/avatars/' . $avatar_file_name);
            file_put_contents($avatar_file_path, $avatar);
            $user->update(['avatar' => '/img/avatars/' . $avatar_file_name]);
        } catch (\Exception $e) {
            //do nothing...
        };
        return redirect('/login')
            ->with('alert', 'success')
            ->with('text', 'Registrasi berhasil, sekarang kamu bisa login!');
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
