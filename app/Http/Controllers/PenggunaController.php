<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.pengguna', [
            'pengguna' => User::latest()->get(),
        ]);
    }
}
