<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Page extends Controller
{
    public function styles()
    {
        return view('styles');
    }
}
