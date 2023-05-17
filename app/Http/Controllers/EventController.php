<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowEventResource;
use App\Models\Address;
use App\Models\Event;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //search for events
    public function searchEvent($sport_name)
    {
        $event = Event::leftJoin('competitions', 'events.id', 'competitions.event_id')
            ->leftJoin('sports', 'sports.id', 'events.sport_id')->where('sports.name_sport', 'like', '%' . $sport_name . '%')->get();
        return response()->json(['success' => true, 'data' => $event], 201);
    }
    // get detail of events
    public function getDetail($id)
    {
        $event = Event::leftJoin('competitions', 'events.id', 'competitions.event_id')
            ->leftJoin('sports', 'sports.id', 'events.sport_id')
            ->leftJoin('addresses', 'addresses.id', 'events.address_id')
            ->select(
                'sports.name_sport',
                'competitions.team_a',
                'competitions.team_b',
                'events.date',
                'competitions.name',
                'competitions.time',
                'addresses.name_address',
                'sports.description',
                'addresses.zone_a',
                'addresses.zone_b',
            )
            ->where('events.id', $id)
            ->get();
        return response()->json(['success' => true, 'data' => $event], 201);
    }

    public function index()
    {
        $event = Event::all();
        return response()->json(['success' => true, 'data' => $event], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'sport_id' => 'required',
            'address_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $event = Event::create($validator->validated());
            return response()->json(['success' => true, 'data' => $event], 200);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json(['success' => true, 'data' => $event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'sport_id' => 'required',
            'address_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $event->update($validator->validated());
            return response()->json(['success' => true, 'data' => $event], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success' => true, 'message' => `post id:{$id} has been deleted`], 200);
    }
    public function getSportFromEvent(string $id)
    {
        $sport = Sport::find($id)->events;
        return response()->json(['success' => true, 'data' => $sport], 200);
    }

    public function getAddressFromEvent(string $id)
    {
        $address = Address::find($id)->events;
        return response()->json(['success' => true, 'data' => $address], 200);
    }
}
