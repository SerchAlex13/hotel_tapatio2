<x-plantilla>
    
    <div class="container p-3">
        <h1>Crear nuevo tipo de habitación</h1>
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
                <form action="/type" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="precio_noche" class="form-label">Precio por noche</label>
                        <input type="number" step="0.01" class="form-control" name="precio_noche" id="precio_noche" value="{{ old('precio_noche')}}">
                    </div>
                    <div class="col-md-12">
                        <label for="archivo" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="archivo">
                        {{-- <input type="file" name="archivos[]"> --}}
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <!-- <input type="text" class="form-control" name="descripcion" id="descripcion"> -->
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5" cols="50">{{ old('descripcion')}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="numero_personas" class="form-label">Número de personas</label>
                        <input type="number" class="form-control" name="numero_personas" id="numero_personas" value="{{ old('numero_personas')}}">
                    </div>
                    <div class="col-md-4">
                        <label for="numero_camas" class="form-label">Número de camas</label>
                        <input type="number" class="form-control" name="numero_camas" id="numero_camas" value="{{ old('numero_camas')}}">
                    </div>
                    <div class="col-md-4">
                        <label for="tipo_cama" class="form-label">Tipo de cama</label>
                        <input type="text" class="form-control" name="tipo_cama" id="tipo_cama" value="{{ old('tipo_cama')}}">
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