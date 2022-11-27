<x-plantilla>
    
    <div class="container p-3">
        <h1>Reservación</h1>
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
                    <div class="col-md-2 p-3">
                        <button type="submit" class="btn btn-dark">Reservar</button>
                    </div>
                    <div class="col-md-2 p-3">
                        <a href="/type" class="btn btn-dark">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>    
    </div>

    
    

</x-plantilla>