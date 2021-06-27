$(document).ready(function(){
    $('#registrarUsuario').click(function(){
        Swal.fire({
            title: 'Cargando datos...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            }
        })
        datas = new FormData();
        datas.append("name",$("input[name=name]").val());
        datas.append("email",$("input[name=email]").val());
        datas.append("contraseña",$("input[name=contraseña]").val());
        datas.append("ccontraseña",$("input[name=ccontraseña]").val());
        $.ajax({
            "dataSrc":"data",
            type:'POST',
            url:"/registrarUsuario",
            data:datas,
            processData:false,
            contentType:false,
            success:function(data){
                if(data.error == "on"){
                    Swal.fire({
                        icon: 'error',
                        title: data.mensaje,
                        showConfirmButton: true,
                        // timer: 2500
                    })
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: data.mensaje,
                        showConfirmButton: false,
                        timer: 2500
                    })
                    // limpiarErrores();
                    $("#formulario")[0].reset();
                }
            }
        })
    })
    //Creando token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})