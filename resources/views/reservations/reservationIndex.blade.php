<x-plantilla>

    <div class="container p-3">
        <h1 class="display-1">Historial de reservaciones</h1>
    </div>

    <div class="container p-3 text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    {{-- <th>Número de habitación</th> --}}
                    {{-- <th>Tipo de habitación</th> --}}
                    <th>Fecha de inicio</th>
                    <th>Noches</th>
                    <th>Fecha de fin</th>
                    <th>Pago total</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($reservations as $reservation)
                    <tr>
                        {{-- <td>{{ $reservation->room->numero }}</td> --}}
                        
                        <td>{{ $reservation->fecha_inicio }}</td>

                        <td>{{ $reservation->noches }}</td>

                        <td>{{ $reservation->fecha_fin }}</td>

                        <td>{{ $reservation->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-plantilla>