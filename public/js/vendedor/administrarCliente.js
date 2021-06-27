$(document).ready(function(){
    //CARGAR TABLA DE USUARIOS
    var tablaUsuario = $('#tablaUsuarios').DataTable({
        responsive: false,
        "ajax":"/clientesLista",
        "columns":[
            {'defaultContent':''},
            {data:'nombre'},
            {data:'documento'},
            {data:'email'},
            {data:'direccion'},
            {'defaultContent' :'<center><button type="button" class="edit btn btn-warning btn-sm" data-toggle="modal" data-target="#modal"><i class="fas fa-edit"></i></button><button type="button" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></center>'},
        ],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0,
        } ],
        'language': {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",              
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    });



    //CARGANDO NUMERACIOND DE TABLA
    tablaUsuario.on('order.dt search.dt', function () {
        tablaUsuario.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
            tablaUsuario.cell(cell).invalidate('dom');
        });
    }).draw();

        //BOTON DE EDITAR
    $('#tablaUsuarios tbody').on('click','button.edit', function(e){
        //var usuarionEditar = tablaUsuario.row($(this)).data().id;
        var usuarionEditar = tablaUsuario.row(($(this)).parents("tr")).data();
        var usuarionEditar = usuarionEditar.id;
        $.ajax({
            type:'get',
            url:'editarCliente/'+usuarionEditar,
            success:function(data){
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#email').val(data.correo);
                $('#documento').val(data.documento);
                $('#direccion').val(data.direccion);
            }
        })
    })

      //BOTON DE ELIMINAR
    var editar = $('#tablaUsuarios tbody').on('click','button.delete', function(e){
        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
            title: '¿Estas seguro?',
            text: "El usuario va a ser eliminado para siempre!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, elimina eso!',
            cancelButtonText: 'No, cancelalo!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                var usuarionEliminar = tablaUsuario.row(($(this)).parents("tr")).data().id;
                $.ajax({
                    type:'post',
                    url:'eliminarUsuario/'+usuarionEliminar,
                    success:function(response){
                        var table =$('#tablaUsuarios').DataTable();
                        swalWithBootstrapButtons.fire(
                        'Borrado!',
                        response.message,
                        'success'
                        )
                        tablaUsuario.ajax.reload();
                    }
                })
                
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                'Cancelado',
                'Tu registro ha sido salvado :)',
                'error'
                )
            }
        })
    })

    
    //Editar
    $('#guardarEdicion').click(function(){
        // limpiarErrores();
        Swal.fire({
            title: 'Cargando datos...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            }
        })
        datas = new FormData();
        datas.append("id",$("input[name=id]").val());
        datas.append("nombre",$("input[name=nombre]").val());
        datas.append("email",$("input[name=email]").val());
        datas.append("documento",$("input[name=documento]").val());
        datas.append("direccion",$("input[name=direccion]").val());

        $.ajax({
            "dataSrc":"data",
            type:'POST',
            url:"/editarCliente",
            data:datas,
            processData:false,
            contentType:false,
            success:function(data){
                if(data.error == true){
                    Swal.fire({
                        icon: 'error',
                        title: "error al guardar",
                        showConfirmButton: true,
                        // timer: 2500
                    })
                }else{
                    var table = $('#tablaUsuarios').DataTable();
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: "Actualizado correctamente",
                        showConfirmButton: false,
                        timer: 2500
                    })
                    //window.location.reload();
                }
            },error:function(msj){
                Swal.fire({
                    icon: 'error',
                    title: 'Revisa el formulario nuevamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                var errores = msj.responseJSON.errors;
                for(var error in errores){
                    if(error=='comuna'){
                        $('#errorcomunaEditar').html('<div class="limpiar alert alert-danger">'+errores[error]+"</div>");
                    }
                    if(error=='barrio'){
                        $('#errorbarrioEditar').html('<div class="limpiar alert alert-danger">'+errores[error]+"</div>");
                    }
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