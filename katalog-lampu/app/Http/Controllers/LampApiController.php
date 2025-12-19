<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LampApiController extends Controller
{
    public function apilamp()
    {
        $lamp = lamp::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => "Berhasil di Tampilkan",
            'data'    => $lamp
        ], 200);
    }
}
