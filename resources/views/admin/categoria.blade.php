@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Categorias')

{{-- plugins --}}
  {{-- Datatable --}}
  @section('plugins.Datatables', true)
  {{-- Sweetalert2 --}}
  @section('plugins.Sweetalert2', true)

{{-- Content body: main page content --}}

@section('content_body')
    {{-- Titulo --}}
    <div class="tittle h1 text-center">
        <h1>Categorias</h1>
    </div>

    {{-- Boton modal --}}
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="crear()">
            Crear Categoria
        </button>
    </div>   

    {{-- Table --}}
    <div class="container mt-4">
        <table class="table table-striped table-hover display responsive nowrap" cellspacing="0" id="datatable" style="width: 100%">
            <thead class="bg-info">
                <tr>
                    <th data-priority="1">Foto</th>
                    <th data-priority="2">Nombre</th>
                    <th>Descripcion</th>  
                    <th>Cant Productos</th>  
                    <th class="text-center">Accion</th>                  
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot class="bg-info">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>  
                    <th>Cant Productos</th>  
                    <th class="text-center">Accion</th>                  
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="formulario" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header" id="bg-titulo">
                            <h5 class="modal-title" id="titulo"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="preview" src="" height="200" width="200" alt="Imagen previsualizada">
                            </div>
                            <div class="form-group">
                                <label for="foto" id="fotoTitle">Foto Categoria || Solo Formato (JPG Y PNG)</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png" required onchange="previewImage()">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre Categoria</label>
                                <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre categoria" pattern="^[a-zA-Z0-9]+$" title="Solo se permiten números y letras sin espacios" required>
                                <small id="nombremall" class="form-text text-muted">No se permiten espacion.</small>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion Corta de la Categoria</label>
                                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
                                <small id="descripcionmall" class="form-text text-muted">descripcion con menos de 255 caracteres.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="submit" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@stop

{{-- Push extra scripts --}}

@push('css')
    <style>
        .dropdown-menu.show {
        display: inline-table;
        }
    </style>
@endpush

@push('js')
<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    var rutaAccion = "";

    var table = new DataTable('#datatable', {
        ajax: '{{route('categoria.lista')}}',
        responsive:true,
        processing: true,
        serverSide: true,
      lengthMenu: [[10, 25, 50, 100],[10, 25, 50, 100]],
      columns: [
                {
                    data: 'foto',
                    name: 'foto',
                    className: 'text-center',
                    render: function (data, type, row) {
                        if (row.fotoUrl) {
                            return '<img src="' + row.fotoUrl + '" width="100" height="100" alt="Imagen de la categoría">';
                        } else {
                            return '<span class="text-muted">Imagen no disponible</span>';
                        }
                    }
                },
              {data: 'nombre', name: 'nombre', className: 'text-center'},         
              {data: 'descripcion', name: 'descripcion', className: 'text-center'},  
              {data: 'cantidad', name: 'cantidad', className: 'text-center'},     
              {
                "data": null,
                "width": "100px",
                "className" : "text-center",
                "render": function(data, type, row, meta) {
                    return `
                        <div class="dropdown dropleft">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class=""></i> Accion
                            </button>
                            <div class="dropdown-menu dropdown-menu-sm" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item bg-info ver" data-id="${row.id}" href="javascript:ver(${row.id});"><i class="fa fa-file"></i> Ver</a>
                                <a class="dropdown-item bg-warning editar" data-id="${row.id}" href="javascript:editar(${row.id});"><i class="fa fa-edit"></i> Editar</a>
                                <a class="dropdown-item bg-danger eliminar" data-id="${row.id}" href="javascript:eliminar(${row.id});"><i class="fa fa-trash"></i> Eliminar</a>
                            </div>
                        </div>`;
                },
                "orderable": false
            },    
      ],
          columnDefs: [{
            orderable: false, 
            targets: [4,0],
            responsivePriority: 1,
            responsivePriority: 2,

            }],
          language: {
                  "zeroRecords": "No se encontraron resultados",
                  "emptyTable": "Ningún dato disponible en esta tabla",
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
                   },
                   "sProcessing":"Procesando...",
          },        
  });

    //  Consultas EndPoint
    consulta = function(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
        url: "{{ route('categoria.datoCategoria') }}/" + id,
        method: "GET",
        success: function(Data) {
            resolve(Data);
        },
        error: function(xhr, status, error) {
            reject(error);
        }
        });
    });
    };

    // Enviar datos
    $('#formulario').submit(function(e){
        e.preventDefault(); // Previene el recargo de la página

        var formData = new FormData(this);
        formData.append('foto', $('#foto')[0].files[0]);
        formData.append('descripcion', $.trim($('#descripcion').val()));
        formData.append('nombre', $.trim($('#nombre').val()));

            $.ajax({
            url: rutaAccion,
            method: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false, 
            processData: false,
            cache:false,
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function(data) {
                table.ajax.reload(null, false);
                if (data.success) {
                    Swal.fire({
                    title: data.informacion,
                    text: "El registro fue "+data.accion+" al sistema",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true
                    }); 
            } else {
                Swal.fire({
                title: 'Categoria no registrada',
                text: "Error en el registro",
                icon: "error",
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true
                }); 
            }

            },
            error: function(xhr, status, error) {
            Swal.fire({
                title: "Categoria no agregada",
                text: "El registro no fue agregado al sistema!!",
                icon: "error"
            });
            }
        });

        $('#modalCRUD').modal('hide'); // Cierra el modal después de la solicitud AJAX
    });

  // ACCIONES
    crear = function(){
        $("#formulario").trigger("reset");
        rutaAccion = "{{route('categoria.crear')}}";
        $("#nombre").attr("readonly", false);
        $("#descripcion").attr("readonly", false);
        $("#foto").attr("required", true);
        $("#titulo").html("Crear nueva Categoria");
        $("#bg-titulo").attr("class","modal-header bg-primary"); 
        $('#nombremall').show()
        $('#descripcionmall').show()
        $('#foto').show()
        $('#fotoTitle').show()
        $('#submit').show()
        $("#preview").attr("src", "https://imgs.search.brave.com/B8ZYgqZpEVLxPFhLOM_TdebRpG3TTWlvCz6rWRRMIh4/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMtY3NlLmNhbnZh/LmNvbS9pbWFnZS80/MTIzNy9iYW5uZXIu/anBn");
        $('#modalCRUD').modal('show');
    };

    ver = async function(id) {
        try {
            $("#formulario").trigger("reset");
            datos = await consulta(id);
            $("#titulo").html("Ver Categoria -> " + datos.nombre);
            $("#bg-titulo").attr("class","modal-header bg-info"); 
            $("#preview").attr("src", datos.fotoUrl);
            $("#nombre").val(datos.nombre);
            $("#nombre").attr("readonly", true);
            $("#descripcion").val(datos.descripcion);
            $("#descripcion").attr("readonly", true);
            $('#nombremall').hide()
            $('#descripcionmall').hide()
            $('#foto').hide()
            $('#fotoTitle').hide()
            $('#fotoTitle').hide()
            $('#submit').hide()
            $('#modalCRUD').modal('show'); 
        } catch (error) {
            console.error("Error:", error);
        }
    };

    editar = async function(id){
        try {
            $("#formulario").trigger("reset");
            datos = await consulta(id);
            rutaAccion = "{{route('categoria.editar')}}/"+id;
            $("#titulo").html("Editar Categoria -> " + datos.nombre);
            $("#bg-titulo").attr("class","modal-header bg-warning"); 
            $("#preview").attr("src", datos.fotoUrl);
            $("#nombre").val(datos.nombre);
            $("#nombre").attr("readonly", false);
            $("#descripcion").val(datos.descripcion);
            $("#descripcion").attr("readonly", false);
            $("#foto").attr("required", false);
            $('#nombremall').show()
            $('#descripcionmall').show()
            $('#foto').show()
            $('#fotoTitle').show()
            $('#submit').show()
            $('#modalCRUD').modal('show'); 
        } catch (error) {
            console.error("Error:", error);
        }
    };

    eliminar = function(id){
        Swal.fire({
            title: '¿ Estas seguro que desea eliminar el registro?',
            text: "¡ No podrás revertir esto !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡ Sí, bórralo !',
            }).then((result) => {
            if (result.isConfirmed){
                $.ajax({
                url: "{{route('categoria.eliminar')}}/"+id,
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    if (data.success) {
                    table.row('#' + id).remove().draw();
                    // Mostrar mensaje de éxito con temporizador
                    Swal.fire({
                        title: '¡ Eliminado !',
                        text: 'Tu registro ha sido eliminado.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    });
                    } else {
                    // Mostrar mensaje de error
                    Swal.fire({
                        title: '¡ Error !',
                        text: 'Tu registro no ha sido eliminado.',
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    });
                    }
                }
                });
            }
            });
    };

    // FIN ACCIONES

    function previewImage() {
        const file = document.getElementById('foto').files[0];
        const preview = document.getElementById('preview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
                preview.src = "";
            }
    }

</script>
@endpush