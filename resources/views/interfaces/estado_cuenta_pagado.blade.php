<x-plantilla>

    <div class="container p-3">
        <h1 class="display-1">Estado de cuenta</h1>
    </div>

    

    <div class="container w-75 d-flex justify-content-evenly p-3">
        <div class="p-3">
            <h1 class="display-6">Saldo pendiente: $0.00</h1>
        </div>
        <div class="col-md-2 p-3">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Pagar
            </button>
        </div>
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
                        
                        <div class="col-md-2 p-3">
                            <a href="/estado_cuenta_pagado" class="btn btn-info">Pagar</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-3 text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    <tr>
                        {{-- <td>Hospedaje</td>
                        
                        <td>1 noche habitación Lujosa</td>

                        <td>1/12/2022</td>
                        
                        <td>$1600</td> --}}
                    </tr>
            </tbody>
        </table>
    </div>

</x-plantilla>