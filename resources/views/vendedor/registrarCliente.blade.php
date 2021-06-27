@extends('inicio')
@section('content')

<br>
<div class="card shadow mb-4" id="divIngresarDatos">
    <div class="card-body py-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar un Cliente</h6>
        </div>
        <form class="was-validated" id="formulario">
            <div class="mb-3">
                <label for="name">Nombre Completo</label><br>
                <input id="name" name="name" type="text" class="form-control" required>
                <small class="form-text text-muted " id="errorNombreCompleto" >
                </small>
            </div>

            <div class="mb-3">
                <label for="documento">Documento de identidad</label><br>
                <input id="documento" name="documento" type="text" class="form-control" required>
                <small class="form-text text-muted" id="errorCorreoElectronico"></small>
            </div>

            <div class="mb-3">
                <label for="correo">Correo Electronico</label><br>
                <input id="correo" name="correo" type="email" class="form-control" required>
                <small class="form-text text-muted" id="errorContraseña"></small>
            </div>

            <div class="mb-3">
                <label for="direccion">Dirección</label><br>
                <input id="direccion" name="direccion" type="text" class="form-control" required>
                <small class="form-text text-muted" id="errorConfirmarContraseña"></small>
            </div>


            <button type="button" class="btn btn-primary btn-lg btn-block" id="registrarCliente">Registrar</button>
            
        </form>
        <script rel="stylesheet" src="{{asset('js/vendedor/registrarCliente.js')}}"></script>

    </div>
@endsection