<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
        $types = Type::all();
        return view('types/typeIndex', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', App\Models\Type::class);
        return view('types/typeCreate');
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
            'nombre' => 'required|max:255',
            'precio_noche' => 'required|min:0',
            'descripcion' => 'required|max:255',
            'numero_personas' => 'integer|min:1',
            'numero_camas' => 'integer|min:1',
            'tipo_cama' => 'required|max:255'
        ]);

        $type = Type::create($request->all());

        //Archivos
        if ($request->file('archivo')->isValid()) {
            $ubicacion = $request->archivo->store('public/fotos');

            $foto = new Foto();
            $foto->ubicacion = $ubicacion;
            $foto->nombre_original = $request->archivo->getClientOriginalName();
            $foto->mime = $request->archivo->getClientMimeType();

            $type->fotos()->save($foto);
        }

        return redirect('/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $fotos = Foto::all();
        return view('types/typeShow', compact('type', 'fotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $this->authorize('update', $type);

        return view('types/typeEdit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //Validar
        $request->validate([
            'nombre' => 'required|max:255',
            'precio_noche' => 'required|min:0',
            'descripcion' => 'required|max:255',
            'numero_personas' => 'integer|min:1',
            'numero_camas' => 'integer|min:1',
            'tipo_cama' => 'required|max:255'
        ]);

        //Actualizar
        Type::where('id', $type->id)->update($request->except('_token', '_method'));

        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $this->authorize('delete', $type);

        $type->delete();

        return redirect('/type');
    }
}
