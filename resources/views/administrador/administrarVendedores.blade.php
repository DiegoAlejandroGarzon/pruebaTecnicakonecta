@extends('inicio')
@section('content')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<div class="mb-3"></div>



<div class="card shadow mb-4" id="divTabla">
    <div class="card-body py-3">
        <div class="row">
            <div class="container card-header py-3 ">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
            </div>
        </div>
    </div>
    
    <div class="card-body py-3">
        <table id="tablaUsuarios" class="table display responsive nowrap" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th ></th>
                    <th >Nombre</th>
                    <th >Email</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody style="color:black"></tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title m-0 font-weight-bold text-primary" id="staticBackdropLabel">Editar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="contenidoModalEdicionEditar">
            <div class="card-body py-3">
                    <form class="was-validated" id="formularioBarrioEditar" enctype="multipart/form-data">
                        <input type="text" name="id" id="id" hidden>
                        <div class="mb-3">
                            <label for="nombre">Nombre</label><br>
                            <input id="nombre" name="nombre" type="text" class="form-control bloqueo" required>
                            <small class="form-text text-muted " id="nombre">
                            </small>
                        </div>
                        <div class="mb-3">
                            <label for="barrioEditar">Email</label><br>
                            <input id="email" name="email" type="text" class="form-control bloqueo" required>
                            <small class="form-text text-muted " id="email">
                            </small>
                        </div>
                        
                    </form>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary limpiarErrores" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="guardarEdicion">Guardar</button>
        </div>
        </div>
    </div>
</div>
<script rel="stylesheet" src="{{asset('js/administrador/administrarVendedores.js')}}"></script>
@endsection