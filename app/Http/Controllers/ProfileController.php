<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.profile.index', [
            'title' => 'Profile Settings'
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
        //
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
    public function updateTheme(Request $request)
    {
        $themes = ['default', 'cerulean', 'cosmo', 'flatly', 'journal', 'lumen', 'materia', 'minty', 'sandstone', 'simplex', 'sketchy', 'spacelab', 'united', 'yeti', 'zephyr'];
        $request->validate(
            [
                'theme' => ['required', Rule::in($themes)]
            ],
            [
                'theme.required' => 'Tema harus dipilih.',
                'theme.in' => 'Tema tidak tersedia.'
            ]
        );
        User::find(auth()->user()->id)->update([
            'theme' => $request->theme
        ]);
        $theme = ucwords($request->theme);
        return redirect(route((auth()->user()->is_admin ? 'dashboard.settings' : 'profile.index')))
            ->with('alert', 'success')
            ->with('html', "Tema <strong>$theme</strong> berhasil diterapkan.");
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfiles(Request $request)
    {
        $rules = [
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'full_name' => ['required', 'max:50'],
            'avatar' => ['image', 'file', 'max:2000'],
        ];
        $messages = [
            'gender.required' => 'Silahkan pilih gender kamu.',
            'gender.in' => 'Gender tidak tersedia.',
            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.max' => 'Nama lengkap maksimal 50 karakter.',
            'avatar.image' => 'Avatar harus berupa gambar.',
            'avatar.file' => 'Avatar tidak valid.',
            'avatar.max' => 'Ukuran maksimal avatar adalah 2MB.',
        ];
        if ($request->born_date) {
            $rules['born_date'] = ['date'];
            $messages['born_date.date'] = 'Format tanggal lahir tidak valid.';
        }
        if ($request->number) {
            $rules['number'] = ['numeric'];
            $messages['number.numeric'] = 'Nomor telepon tidak valid.';
        }
        $data = $request->validate($rules, $messages);
        if ($request->remove_avatar == 1 && !is_null(auth()->user()->avatar)) {
            unset($data['avatar']);
            unlink(public_path(auth()->user()->avatar));
            User::find(auth()->user()->id)->update(['avatar' => null]);
        } else if ($request->avatar) {
            $avatar = auth()->user()->id . '.' . $data['avatar']->extension();
            $request->file('avatar')->move(public_path('/img/avatars'), $avatar);
            $data['avatar'] = "/img/avatars/$avatar";
        }
        User::find(auth()->user()->id)->update($data);
        return redirect(route((auth()->user()->is_admin ? 'dashboard.settings' : 'profile.index')))
            ->with('alert', 'success')
            ->with('html', 'Profile berhasil diupdate.')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePassword(Request $request)
    {
        $credentials = [
            'email' => auth()->user()->email,
            'password' => $request->old_password,
        ];
        if (Auth::attempt($credentials)) {
            $request->validate(
                [
                    'new_password' => ['min:8', 'same:password_confirmation']
                ],
                [
                    'new_password.min' => 'Password minimal 8 karakter.',
                    'new_password.same' => 'Konfirmasi password tidak sesuai.',
                ]
            );
            User::find(auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flush();
            return redirect(route('login.index'))
                ->with('alert', 'success')
                ->with('text', 'Password berhasil diganti, silahkan login kembali dengan password yang sudah anda ubah.');
        } else {
            return back()
                ->with('alert', 'error')
                ->with('text', 'Password lama anda salah!');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
