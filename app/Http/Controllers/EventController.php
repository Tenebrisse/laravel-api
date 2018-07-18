<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    *
    * @SWG\Get(
    *     path="/api/events",
    *     description="Returns events overview.",
    *     operationId="getEvents",
    *     produces={"application/json"},
    *     tags={"events"},
    *     @SWG\Response(
    *         response=200,
    *         description="Events overview."
    *     ),
    *     @SWG\Response(
    *         response=401,
    *         description="Unauthorized action.",
    *     )
    * )
    *
    */
    public function index() {
        return response()->json(Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EventRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @SWG\Post(
     *     path="/api/events",
     *     description="Create an event with parameters.",
     *     operationId="addEvent",
     *     produces={"application/json"},
     *     tags={"events"},
     *     @SWG\Parameter(name="name", in="formData", required=true, type="string", description="Name of the event"),
     *     @SWG\Parameter(name="cookie_id", in="formData", required=true, type="integer", description="Unique cookie ID"),
     *     @SWG\Parameter(name="referrer", in="formData", required=true, type="string", description="Source of the event"),
     *     @SWG\Response(
     *         response=201,
     *         description="New event has been created successfully."
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Unprocessable Entity."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function store(EventRequest $request) {
        $event = Event::create($request->input());

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/api/events/{id}",
     *     description="Returns event with correspondant id.",
     *     operationId="getEventById",
     *     produces={"application/json"},
     *     tags={"events"},
     *     @SWG\Parameter(name="id", in="path", required=true, type="integer", description="ID of the event"),
     *     @SWG\Response(
     *         response=200,
     *         description="Event overview."
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function show(Event $event) {
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     *
     * @SWG\Put(
     *     path="/api/events/{id}",
     *     description="Update event with correspondant id.",
     *     operationId="updateEventById",
     *     produces={"application/json"},
     *     tags={"events"},
     *     @SWG\Parameter(name="id", in="path", required=true, type="integer", description="ID of the event"),
     *     @SWG\Parameter(name="name", in="formData", required=false, type="string", description="Name of the event"),
     *     @SWG\Parameter(name="cookie_id", in="formData", required=false, type="integer", description="Unique cookie ID"),
     *     @SWG\Parameter(name="referrer", in="formData", required=false, type="string", description="Source of the event"),
     *     @SWG\Response(
     *         response=200,
     *         description="Event has been updated successfully."
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function update(Request $request, Event $event) {
        $request->validate([
            'name' => 'sometimes|filled|string|min:3',
            'cookie_id' => 'sometimes|filled|integer|unique:events,cookie_id',
            'referrer' => 'sometimes|filled|string|min:3'
        ]);

        $event->update($request->input());

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     *
     * @SWG\Delete(
     *     path="/api/events/{id}",
     *     description="Delete event with correspondant id.",
     *     operationId="deleteEventById",
     *     produces={"application/json"},
     *     tags={"events"},
     *     @SWG\Parameter(name="id", in="path", required=true, type="integer", description="ID of the event"),
     *     @SWG\Response(
     *         response=200,
     *         description="Event has been deleted successfully."
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function destroy(Event $event) {
        $event->delete();

        return response()->json("", 204);
    }
}
