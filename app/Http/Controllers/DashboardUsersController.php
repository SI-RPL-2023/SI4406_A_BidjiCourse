<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.users.index', [
            'title' => 'Users Management',
            'users' => User::get()
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
        return view('pages.dashboard.users.detail', [
            'title' => $user->full_name,
            'user' => $user
        ]);
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
        if ($user->id == auth()->user()->id) {
            return redirect(route('users.index'))
                ->with('alert', 'info')
                ->with('text', 'Untuk alasan keamanan, anda tidak diperbolehkan menghapus akun anda sendiri.');
        } 
        $username = $user->full_name;
        // $user->delete();
        @unlink(public_path($user->avatar));
        return redirect(route('users.index'))
            ->with('alert', 'success')
            ->with('html', 'Akun <strong>' . $username . '</strong> berhasil dihapus');
    }
}
