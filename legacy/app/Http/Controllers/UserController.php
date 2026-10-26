<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.v_index', [
            'title' => 'Tabel User'
        ]);
    }
}
