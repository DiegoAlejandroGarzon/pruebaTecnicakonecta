$(document).ready(function(){
    $('#registrarCliente').click(function(){
        Swal.fire({
            title: 'Cargando datos...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            }
        })
        datas = new FormData();
        datas.append("name",$("input[name=name]").val());
        datas.append("documento",$("input[name=documento]").val());
        datas.append("correo",$("input[name=correo]").val());
        datas.append("direccion",$("input[name=direccion]").val());
        $.ajax({
            "dataSrc":"data",
            type:'POST',
            url:"/registrarClientee",
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