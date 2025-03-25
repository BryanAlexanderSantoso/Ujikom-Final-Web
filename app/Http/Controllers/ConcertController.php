<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $concerts = Concert::all();
        return view('concerts.index', compact('concerts'));
    }

    public function create()
    {
        return view('concerts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'concert_name' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('concert_images', 'public');

        Concert::create([
            'image' => $imagePath,
            'concert_name' => $request->concert_name,
            'venue' => $request->venue,
            'date' => $request->date,
            'ticket_price' => $request->ticket_price,
        ]);

        return redirect()->route('concerts.index')->with('success', 'Konser berhasil ditambahkan.');
    }

    public function show(Concert $concert)
    {
        return view('concerts.show', compact('concert'));
    }

    public function edit(Concert $concert)
    {
        return view('concerts.edit', compact('concert'));
    }

    public function update(Request $request, Concert $concert)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'concert_name' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        $data = [
            'concert_name' => $request->concert_name,
            'venue' => $request->venue,
            'date' => $request->date,
            'ticket_price' => $request->ticket_price,
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($concert->image);
            $imagePath = $request->file('image')->store('concert_images', 'public');
            $data['image'] = $imagePath;
        }

        $concert->update($data);

        return redirect()->route('concerts.index')->with('success', 'Konser berhasil diperbarui.');
    }

    public function destroy(Concert $concert)
    {
        Storage::disk('public')->delete($concert->image);
        $concert->delete();
        return redirect()->route('concerts.index')->with('success', 'Konser berhasil dihapus.');
    }
}
