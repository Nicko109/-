<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() !== null) {
            return redirect()->route('personal.main.index');
        }
        return view('main.guest');
    }
}

