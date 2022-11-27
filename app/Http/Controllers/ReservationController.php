<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
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
        // $reservations = Reservation::all();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('reservations/reservationIndex', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('reservations/reservationCreate', compact('rooms'));
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
            'room_id' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'noches' => 'required',
            'precio' => 'required',
        ]);

        $request->merge(['user_id' => Auth::id()]);

        $reservation = Reservation::create($request->all());

        return redirect('/reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservations/reservationShow', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();

        return view('reservations/reservationEdit', compact('reservation', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //Validar
        $request->validate([
            'room_id' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'noches' => 'required',
            'precio' => 'required',
        ]);

        //Actualizar
        Reservation::where('id', $reservation->id)->update($request->except('_token', '_method'));

        return redirect()->route('reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('/reservation');
    }
}
