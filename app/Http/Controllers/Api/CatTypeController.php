<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catTypes = CatType::all();
        return response()->json($catTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_type' => 'required|string|max:255',
            'cat_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $catType = CatType::create($request->all());
        return response()->json($catType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatType $catType)
    {
        return response()->json($catType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatType $catType)
    {
        $validator = Validator::make($request->all(), [
            'cat_type' => 'required|string|max:255',
            'cat_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $catType->update($request->all());
        return response()->json($catType, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatType $catType)
    {
        $catType->delete();
        return response()->json(null, 204);
    }
}
