@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Productos')

{{-- plugins --}}
  {{-- Datatable --}}
  @section('plugins.Datatables', true)
  {{-- Sweetalert2 --}}
  @section('plugins.Sweetalert2', true)

{{-- Content body: main page content --}}

@section('content_body')
      <div class="tittle text-center">
          <h1>Productos</h1>
      </div>
      <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="crear()">
          Crear Producto
        </button>
      </div>  
      <div class="container mt-4">
          <table class="table table-striped table-hover display responsive nowrap" cellspacing="0" id="datatable" style="width: 100%">
                  <thead class="bg-info">
                      <tr>
                          <th data-priority="1">Foto</th>
                          <th>Codigo</th>  
                          <th data-priority="2">Nombre</th>  
                          <th>Categoria</th> 
                          <th>Cantidad</th>  
                          <th>Precio</th>  
                          <th class="text-center">Accion</th>                
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot class="bg-info">
                      <tr>
                          <th>Foto</th>
                          <th>Codigo</th>  
                          <th>Nombre</th>  
                          <th>Categoria</th> 
                          <th>Cantidad</th>  
                          <th>Precio</th>  
                          <th class="text-center">Accion</th>                  
                      </tr>
                  </tfoot>
          </table>
      </div> 
  
  <!-- Modal -->
  <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document" style="min-width: 600px">
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
                <img id="preview" src="" width="200" height="200" alt="Imagen previsualizada">
            </div>
            <div class="form-group">
                <label for="foto" id="fotoTitle">Foto Producto || Solo Formato (JPG Y PNG)</label>
                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png" required onchange="previewImage()">
            </div>
              <div class="form-group text-center"> 
                  <label for="nombre">Nombre del Producto.</label> 
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre del Producto." required> 
                  <small id="nombreSmall" class="form-text text-muted">Nombre del Producto.</small> 
              </div> 
              <div class="form-group text-center"> 
                <label for="codigo">Codigo del Producto.</label> 
                <input type="text" class="form-control" id="codigo" placeholder="Codigo del Producto." required> 
                <small id="codigoSmall" class="form-text text-muted">Codigo del Producto.</small> 
            </div> 
            <div class="form-group text-center">
              <label for="categoria">Categoria del Producto.</label>
              <input type="hidden" class="form-control" id="categoriaVer" readonly>
              <select class="form-control mb-2" id="categoria" style="width: 100%" required>
                @foreach ($categorias as $item)
                    <option value="{{$item->nombre}}">{{$item->nombre}}</option> 
                @endforeach
              </select>
          </div>
              <div class="form-group text-center"> 
                  <label for="descripcion">Descripcion del Producto.</label> 
                  <textarea class="form-control" id="descripcion" rows="5" maxlength="3000" required></textarea>
                  <small id="descripcionSmall" class="form-text text-muted">Descripcion del Producto, Caracteres maximo (3000) .</small>  
              </div> 
            <div class="form-row justify-content-around">
              <div class="form-group col-md-5"> 
                  <label for="cantidad">Cantidad Disponible.</label> 
                  <input type="number" class="form-control" id="cantidad" placeholder="cantidad" min="0" required>
                  <small id="cantidadSmall" class="form-text text-muted">Cantidad disponible.</small> 
              </div> 
              <div class="form-group col-md-5"> 
                  <label for="precio">Precio del Producto.</label> 
                  <input type="number" class="form-control" id="precio" placeholder="precio" min="0" required> 
                  <small id="precioSmall" class="form-text text-muted">Precio del Producto.</small> 
              </div> 
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="submit" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guarda</button>
          </div>
      </form>
      </div>
      </div>
  </div>
@stop

@push('css')
    <style>
        .dropdown-menu.show {
        display: inline-table;
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    var rutaAccion = "";

    var table = new DataTable('#datatable', {
        ajax: '{{route('producto.lista')}}',
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
                            return '<img src="' + row.fotoUrl + '" width="100" height="100" alt="Imagen del Producto">';
                        } else {
                            return '<span class="text-muted">Imagen no disponible</span>';
                        }
                    }
                },
              {data: 'codigo', name: 'codigo', className: 'text-center'},   
              {data: 'nombre', name: 'nombre', className: 'text-center'},         
              {data: 'categoria', name: 'categoria', className: 'text-center'},  
              {data: 'cantidad', name: 'cantidad', className: 'text-center'},     
              {data: 'precio', name: 'precio', className: 'text-center'},     
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
            targets: [6,0],
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
            url: " {{route('producto.datoProducto')}}/" + id,
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
        formData.append('codigo', $.trim($('#codigo').val()));
        formData.append('nombre', $.trim($('#nombre').val()));
        formData.append('descripcion', $.trim($('#descripcion').val()));
        formData.append('categoria', $.trim($('#categoria').val()));
        formData.append('precio', $.trim($('#precio').val()));
        formData.append('cantidad', $.trim($('#cantidad').val()));

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
                title: 'Producto no registrada',
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
                title: "Producto no agregada",
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
        rutaAccion = "{{route('producto.crear')}}";
        $('#categoriaVer').attr('type', 'hidden');
        $("#codigo").attr("readonly", false);
        $("#nombre").attr("readonly", false);
        $("#descripcion").attr("readonly", false);
        $("#cantidad").attr("readonly", false);
        $("#precio").attr("readonly", false);
        $("#foto").attr("required", true);
        $("#titulo").html("Crear nuevo producto");
        $("#bg-titulo").attr("class","modal-header bg-primary"); 
        $('#categoria').show()
        $('#codigoSmall').show() 
        $('#nombreSmall').show()
        $('#descripcionSmall').show()
        $('#cantidadSmall').show()
        $('#precioSmall').show()
        $('#foto').show()
        $('#fotoTitle').show()
        $('#submit').show()
        $("#preview").attr("src", "https://imgs.search.brave.com/Bfzk8ae9opnLUUsizlmK5Ryk5NTaPaDoenOyMe8F5yk/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/aHVic3BvdC5jb20v/aHViZnMvbWVkaWEv/Zm90b2dyYWZpYXNk/ZXByb2R1Y3RvZWpl/bXBsb3RoZWthLmpw/ZWc");
        $('#modalCRUD').modal('show');
    };

    ver = async function(id) {
        try {
            datos = await consulta(id);
            $("#titulo").html("Ver Producto -> " + datos.nombre);
            $("#bg-titulo").attr("class","modal-header bg-info"); 
            // asigancion de valores
            $("#preview").attr("src", datos.fotoUrl);
            $("#nombre").val(datos.nombre);
            $("#codigo").val(datos.codigo);
            $("#categoriaVer").val(datos.categoria);
            $("#descripcion").val(datos.descripcion);
            $("#cantidad").val(datos.cantidad);
            $("#precio").val(datos.precio);
            $('#categoriaVer').attr('type', 'text');
            // readoly true
            $("#descripcion").attr("readonly", true);
            $("#nombre").attr("readonly", true);
            $("#codigo").attr("readonly", true);
            $("#cantidad").attr("readonly", true);
            $("#precio").attr("readonly", true);
            // ocultar botones y small
            $('#categoria').hide()
            $('#codigoSmall').hide() 
            $('#nombreSmall').hide()
            $('#descripcionSmall').hide()
            $('#cantidadSmall').hide()
            $('#precioSmall').hide()
            $('#foto').hide()
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
            rutaAccion = "{{route('producto.editar')}}/"+id;
            $("#titulo").html("Editar Producto -> " + datos.nombre);
            $("#bg-titulo").attr("class","modal-header bg-warning"); 
            // Asignacion de valores
            $("#precio").val(datos.precio);
            $("#cantidad").val(datos.cantidad);
            $("#descripcion").val(datos.descripcion);
            $("#categoria").val(datos.categoria);
            $('#categoria').trigger('change');
            $("#codigo").val(datos.codigo);
            $("#nombre").val(datos.nombre);
            $("#preview").attr("src", datos.fotoUrl);
            // readoly false
            $("#codigo").attr("readonly", false);
            $("#nombre").attr("readonly", false);
            $("#descripcion").attr("readonly", false);
            $("#cantidad").attr("readonly", false);
            $("#precio").attr("readonly", false);
            $("#foto").attr("required", false);
            // mostrar botones y small
            $('#categoriaVer').attr('type', 'hidden');
            $('#categoria').show()
            $('#codigoSmall').show() 
            $('#nombreSmall').show()
            $('#descripcionSmall').show()
            $('#cantidadSmall').show()
            $('#precioSmall').show()
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
                url: "{{route('producto.eliminar')}}/"+id,
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