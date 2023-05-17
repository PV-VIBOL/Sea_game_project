<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competition = Competition::all();
        return response()->json(['success' => true, 'data' => $competition], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'teamA' => 'required',
            'teamB' => 'required',
            'event_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $competition = Competition::create($validator->validated());
        return response()->json(['success' => true, 'data' => $competition], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competition = Competition::find($id);
        return response()->json(['success' => true, 'data' => $competition], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $competition = Competition::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'team_a' => 'required',
            'team_b' => 'required',
            'event_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $competition->update($validator->validated());
            return response()->json(['success' => true, 'data' => $competition], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $competition = Competition::find($id);
        $competition->delete();
        return response()->json(['success' => true, 'message' => `post id:{$id} has been deleted`], 200);
    }

    public function getEventFromCompetition(string $id)
    {
        $competition = Event::find($id)->competitions;
        return response()->json(['success' => true, 'data' => $competition], 200);
    }
}
