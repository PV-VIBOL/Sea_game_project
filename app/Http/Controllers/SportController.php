<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sport = Sport::all();
        return response()->json(['success' => true, 'data' => $sport], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'name_sport' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $sport = Sport::create($validator->validated());
            return response()->json(['success' => true, 'data' => $sport], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sport = Sport::find($id);
        return response()->json(['success' => true, 'data' => $sport], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sport = Sport::find($id);
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'name_sport' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $sport->update($validator->validated());
            return response()->json(['success' => true, 'data' => $sport], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sport = Sport::find($id);
        $sport->delete();
        return response()->json(['success' => true, 'message' => `post id:{$id} has been deleted`], 200);
    }
}
