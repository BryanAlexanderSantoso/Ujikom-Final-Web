<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concerts = Concert::all();
        return response()->json($concerts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'concert_name' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = $request->file('image')->store('concert_images', 'public');

        $concert = Concert::create([
            'image' => $imagePath,
            'concert_name' => $request->concert_name,
            'venue' => $request->venue,
            'date' => $request->date,
            'ticket_price' => $request->ticket_price,
        ]);

        return response()->json($concert, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Concert $concert)
    {
        return response()->json($concert);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concert $concert)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'concert_name' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

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

        return response()->json($concert, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concert $concert)
    {
        Storage::disk('public')->delete($concert->image);
        $concert->delete();
        return response()->json(null, 204);
    }
}
