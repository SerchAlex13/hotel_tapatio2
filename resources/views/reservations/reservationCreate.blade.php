<x-plantilla>
    
    <div class="container p-3">
        <h1 class="display-1">Reservación</h1>
    </div>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/reservation" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label for="noches" class="form-label">Noches</label>
                        <input type="number" class="form-control" name="noches" id="noches" value="{{ old('noches')}}">
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio')}}">
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_fin" class="form-label">Fecha de fin</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="precio" class="form-label">Costo</label>
                        <input type="text" class="form-control" name="precio" id="precio" value="{{ old('precio')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="type_id" class="form-label">Número de habitación</label>
                        <select name="room_id" class="form-control selectpicker" data-live-search="true">
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->numero }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-2 p-3">
                        <button type="submit" class="btn btn-dark">Reservar</button>
                    </div> --}}
                    <!-- Button trigger modal -->
                    <div class="col-md-2 p-3">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Reservar
                        </button>
                    </div>
                    <div class="col-md-2 p-3">
                        <a href="/type" class="btn btn-dark">Cancelar</a>
                    </div>
                
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pago</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mx-auto col-md-8">
                                        <label id="icon" for="email"><i class="bi bi-credit-card-2-front"></i></label>
                                        <label for="numero" class="form-label">Número de tarjeta</label>
                                        <input type="text" class="form-control" name="numero" id="numero"">
                                    </div>
                                    <div class="mx-auto col-md-8">
                                        <label id="icon" for="password"><i class="bi bi-credit-card"></i></label>
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="password" class="form-control" name="cvv" id="cvv">
                                    </div>
                                    <div class="mx-auto col-md-8">
                                        <label id="icon" for="password"><i class="bi bi-calendar-date"></i></label>
                                        <label for="fecha" class="form-label">Fecha vencimiento</label>
                                        <input type="text" class="form-control" name="fecha" id="fecha"">
                                    </div>
                                    <div class="container w-75 d-flex justify-content-end p-3">
                                        
                                        <div class="p-4">
                                            <button type="submit" class="btn btn-info">Pagar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>    
    </div>

    

</x-plantilla>