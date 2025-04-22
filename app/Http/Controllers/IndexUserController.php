<?php

namespace App\Http\Controllers;use App\Models\Concert;
use Illuminate\Http\Request;

class IndexUserController extends Controller
{
    public function index()
    {
        $concerts = Concert::all(); // ambil semua data dari tabel concerts
        return view('index-user', compact('concerts')); // kirim ke view index-user
    }
}
