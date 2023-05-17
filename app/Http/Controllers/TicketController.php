<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::all();
        return response()->json(['success' => true, 'data' => $ticket], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'zone' => 'required',
            'event_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $ticket = Ticket::create($validator->validated());
            return response()->json(['success' => true, 'data' => $ticket], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        return response()->json(['success' => true, 'data' => $ticket], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $validator = Validator::make($request->all(), [
            'zone' => 'required',
            'event_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        } else {
            $ticket->update($validator->validated());
            return response()->json(['success' => true, 'data' => $ticket], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['success' => true, 'message' => `post id:{$id} has been deleted`], 200);
    }

    public function getEventFromTicket(string $id)
    {
        $ticket = Event::find($id)->tickets;
        return response()->json(['success' => true, 'data' => $ticket], 200);
    }
}
