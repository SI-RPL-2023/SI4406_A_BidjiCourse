<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flush();
        return redirect(route('index'))
            ->with('toast', 'success')
            ->with('text', 'Anda berhasil logout.');
    }
}
