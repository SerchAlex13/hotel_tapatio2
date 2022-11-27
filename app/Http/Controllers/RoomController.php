<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('verified')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms/roomIndex', compact('rooms'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTipo(Type $type)
    {
        $rooms = Room::where('type_id', $type->id)->where('estado', 'Disponible')->get();

        return view('rooms/roomIndex', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', App\Models\Room::class);

        $types = Type::all();

        return view('rooms/roomCreate', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar
        $request->validate([
            'type_id' => 'required',
            'numero' => 'required|max:255|unique:App\Models\Room'
        ]);

        $room = Room::create($request->all());

        return redirect('/room');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms/roomShow', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $this->authorize('update', $room);

        $types = Type::all();

        return view('rooms/roomEdit', compact('room', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //Validar
        $request->validate([
            'type_id' => 'required',
            'numero' => 'required|max:255',
        ]);

        //Actualizar
        Room::where('id', $room->id)->update($request->except('_token', '_method'));

        return redirect()->route('room.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function actualizarDisponibilidad(Request $request, Room $room)
    {
        //Validar
        $request->validate([
            'estado' => 'required'
        ]);

        //Actualizar
        Room::where('id', $room->id)->update($request->except('_token', '_method'));

        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $this->authorize('delete', $room);

        $room->delete();

        return redirect('/room');
    }
}
