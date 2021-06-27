@extends('app')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="text-center cabezeraLogin">
                            LOGIN
                    </div>
                    <hr style="margin-top: 4px; margin-bottom: 10px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                            <div class="p-5">
                                <form method="POST" action="{{ route('loginAutenticate') }}"  class="user">
                                    @csrf
            
                                    <div class="form-group row">
                                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Correo Electronico" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
            
                                    <div class="form-group">
                                        <div class="row justify-content-md-center">
                                        <div class="col-11 paddingizquierda" style="padding-right: 0px;">
                                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password" style="width: 109%;">
                                        </div>
                                        <div class="col-1 moverDerecha" style="">
                                            <button id="ShowPassword" class="btn" type="button" onclick="mostrarPassword()" style="box-shadow: none;" >
                                            <span class="fa fa-eye-slash icon" style="color: rgb(0, 0, 0); font-size: 14px;"></span> </button>
                                        </div>
                                    </div>
                                        
                                            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                            {{--  <div class="d-flex bd-highlight" style="margin: 0px;">
                                                <div class="w-100 bd-highlight">
                                                    <input id="password" type="password" class="form-control " name="password" placeholder="Contraseña" >
                                                </div>
                                                <div class="flex-shrink-1 bd-highlight" style="margin: 0px;">
                                                    <div class="input-group-append" >
                                                        <button id="show_password" class="btn btn colorAddJC border" type="button" onclick="mostrarPassword()" >
                                                        <span class="fa fa-eye-slash icon" style="color: rgb(0, 0, 0); font-size: 14px;"></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif  --}}
                                    </div>
            
                                    <div class="form-group row mb-0">
                                            <button type="submit" class="btn btn-primary btn-user btn-block" style="background:#006d50">
                                                Iniciar Sesion
                                            </button>
                                    </div>
                                </form>
                            {{--  <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>  --}}
                            </div>
                    </div>
                    <hr style="margin-top: 1px; margin-bottom: 4px;">
                    <div class="cabezeraLogin text-center" style="padding-bottom: 10px">
                        Desarrollado por: <br>
                        Diego Alejandro Garzón Novoa <br>
                        diegoagn1999@gmail.com <br>
                    </div>
                </div>
        </div>
    </div>
</div>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script>
    //funcion para mostrar contraseña
    function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
	$(document).ready(function () {
	//CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
    });
</script>

@endsection
