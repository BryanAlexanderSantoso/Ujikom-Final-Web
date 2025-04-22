<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatType;

class BookController extends Controller
{

    public function index()
    {
        $catTypes = CatType::all();
        return view('index-book', compact('catTypes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'cat_type_id' => 'required|exists:cat_types,id',
    ]);

    // Misal simpan ke booking atau apapun
    // Booking::create([...]);

    return redirect()->route('book.index')->with('success', 'Category selected successfully!');
}


}
