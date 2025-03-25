<?php

namespace App\Http\Controllers;

use App\Models\CatType;
use Illuminate\Http\Request;

class CatTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $catTypes = CatType::all();
        return view('cat_types.index', compact('catTypes'));
    }

    public function create()
    {
        return view('cat_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_type' => 'required|string|max:255',
            'cat_description' => 'nullable|string',
        ]);

        CatType::create($request->all());

        return redirect()->route('cat_types.index')->with('success', 'Tipe Kategori berhasil ditambahkan.');
    }

    public function show(CatType $catType)
    {
        return view('cat_types.show', compact('catType'));
    }

    public function edit(CatType $catType)
    {
        return view('cat_types.edit', compact('catType'));
    }

    public function update(Request $request, CatType $catType)
    {
        $request->validate([
            'cat_type' => 'required|string|max:255',
            'cat_description' => 'nullable|string',
        ]);

        $catType->update($request->all());

        return redirect()->route('cat_types.index')->with('success', 'Tipe Kategori berhasil diperbarui.');
    }

    public function destroy(CatType $catType)
    {
        $catType->delete();
        return redirect()->route('cat_types.index')->with('success', 'Tipe Kategori berhasil dihapus.');
    }
}
