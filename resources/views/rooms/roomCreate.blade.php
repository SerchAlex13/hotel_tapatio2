<x-plantilla>
    
    <div class="container p-3">
        <h1>Crear nueva habitación</h1>
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
                <form action="/room" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" value="{{ old('numero')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="type_id" class="form-label">Tipo de habitación</label>
                        <select name="type_id" class="form-control selectpicker" data-live-search="true">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 p-3">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                    <div class="col-md-2 p-3">
                        <a href="/type" class="btn btn-info">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>    
    </div>

</x-plantilla>