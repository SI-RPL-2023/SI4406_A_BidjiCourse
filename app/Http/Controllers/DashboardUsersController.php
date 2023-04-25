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
    public function update(Request $request, User $user) //AJAX request in resources\views\pages\dashboard\users\index.blade.php
    {
        if ($user->id == auth()->user()->id) {
            return response()->json([
                'alert' => 'warning',
                'html' => 'Untuk alasan keamanan, anda tidak diperbolehkan mengubah role anda sendiri.',
            ]);
        }
        $role = $request->role == 1 ? 'Admin' : 'Student';
        $bg = $request->role == 1 ? 'danger' : 'success';
        $badge = "<span class='badge text-bg-$bg'>$role</span>";
        $user->update([
            'is_admin' => $request->role
        ]);  
        return response()->json([
            'alert' => 'info',
            'html' => "Role <strong>$user->full_name</strong> sekarang adalah $badge",
            'badge' => $badge,
            'id' => $user->id,
            'role' => $request->role
        ]);
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
        $full_name = $user->full_name;
        $user->delete();
        if (!is_null($user->avatar)) {
            unlink(public_path($user->avatar));
        }
        return redirect(route('users.index'))
            ->with('alert', 'success')
            ->with('html', `Akun <strong>$full_name</strong> berhasil dihapus`);
    }
}
