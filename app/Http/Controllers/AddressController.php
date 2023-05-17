<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address = Address::all();
        return response()->json(['success' => true, 'data' => $address], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_address' => 'required',
            'teamA' => 'required',
            'teamB' => 'required',
            'event_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $address = Address::create($validator->validated());
        return response()->json(['success' => true, 'data' => $address], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::find($id);
        return response()->json(['success' => true, 'data' => $address], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $address = Address::find($id);
        $validator = Validator::make($request->all(), [
            'name_address' => 'required',
            'teamA' => 'required',
            'teamB' => 'required',
            'event_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $address->update($validator->validated());
            return response()->json(['success' => true, 'data' => $address], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);
        $address->delete();
        return response()->json(['success' => true, 'message' => `post id:{$id} has been deleted`], 200);
    }
}
