@extends('inicio')
@section('content')

<br>
<div class="card shadow mb-4" id="divIngresarDatos">
    <div class="card-body py-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar un usuario</h6>
        </div>
        <form class="was-validated" id="formulario">
            <div class="mb-3">
                <label for="name">Nombre Completo</label><br>
                <input id="name" name="name" type="text" class="form-control" required>
                <small class="form-text text-muted " id="errorNombreCompleto" >
                </small>
            </div>

            <div class="mb-3">
                <label for="email">Correo Electronico</label><br>
                <input id="email" name="email" type="email" class="form-control" required>
                <small class="form-text text-muted" id="errorCorreoElectronico"></small>
            </div>

            <div class="mb-3">
                <label for="contraseña">Contraseña</label><br>
                <input id="contraseña" name="contraseña" type="password" class="form-control" required>
                <small class="form-text text-muted" id="errorContraseña"></small>
            </div>

            <div class="mb-3">
                <label for="ccontraseña">Confirmar Contraseña</label><br>
                <input id="ccontraseña" name="ccontraseña" type="password" class="form-control" required>
                <small class="form-text text-muted" id="errorConfirmarContraseña"></small>
            </div>


            <button type="button" class="btn btn-primary btn-lg btn-block" id="registrarUsuario">Registrar</button>
            
        </form>
        <script rel="stylesheet" src="{{asset('js/administrador/registrarVendedor.js')}}"></script>

    </div>
@endsection