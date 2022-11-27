<x-plantilla>

    <div class="container p-3">
        <h1 class="display-1">Disponibilidad de habitaciones</h1>
    </div>

    <div class="container p-3">
        <h1 class="display-6">Elige el número de habitación</h1>
    </div>

    @can('create', App\Models\Room::class)
    <div class="container p-3">
        <a href="/room/create" class="btn btn-primary">Crear nueva habitación</a>
    </div>
    @endcan

    <div class="container p-3 text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Tipo de habitación</th>
                    <th>Disponibilidad</th>
                    {{-- <th>Reservar</th> --}}
                    @can('roomAdministrador', App\Models\Room::class)
                    <th>Modificar disponibilidad</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    @endcan
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($rooms as $room)
                    <tr>
                        <td>
                            <a class="nav-link link-primary" href="/room/{{ $room->id }}">
                                {{ $room->numero }}
                            </a>
                        </td>
                        <td>{{ $room->type->nombre }}</td>
                        
                        <td>{{ $room->estado }}</td>
                        {{-- <td>
                            <a href="#" class="btn btn-info">Elegir</a>
                        </td> --}}
                        @can('update', $room)
                        <td>
                            <div>
                                <form action="{{ route('actualizar', $room) }}" method="POST" class="">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <div class="row">
                                        <div class="col-md-7">
                                            <select name="estado" class="form-control selectpicker">
                                                <option value="Disponible" {{ $room->estado === 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                                <option value="Ocupada" {{ $room->estado === 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                                                <option value="En limpieza" {{ $room->estado === 'En limpieza' ? 'selected' : '' }}>En limpieza</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-dark">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                        
                        <td>
                            <a href="/room/{{ $room->id }}/edit" class="btn btn-outline-dark">Editar</a>
                        </td>
                        @endcan
                        @can('delete', $room)
                        <td>
                            <form action="/room/{{ $room->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Borrar" class="btn btn-outline-danger">
                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-plantilla>