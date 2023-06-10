<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function getSource(Request $request)
    {
        $theme = Theme::select('source')->where('name', $request->name)->firstOrFail();
        return response()->json($theme->source);
    }
}
