<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lamp;

class VisitorController extends Controller
{
    public function searchlamp()
    {
        $data = Lamp::all();
        return view('searchlamp', compact('data'));
    }

    public function actsearchlamp(Request $request)
        {
            $title = $request->input('name');
            $lamp = Lamp::where('name', 'like', '%' . $title . '%')->get();
            return view('actsearchlamp', ['data' => $lamp]);
        }
}
