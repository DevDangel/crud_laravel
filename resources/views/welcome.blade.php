<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p3">Tienda Super Descuentos</h1>
    <!-- modal de agregar producto -->

    <!-- mostrar errores -->
    @if(session("Correcto"))
    <div class="alert alert-success">{{session("Correcto")}} </div>
    @endif
    @if(session("Incorrecto"))
    <div class="alert alert-danger">{{session("Incorrecto")}} </div>
    @endif
    <script>
        var res=function(){
            var not=confirm("Esta Seguro que desea eliminar el registro?");
            return not;
        }
    </script>
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para editar producto -->
                    <form method="POST" action="{{route('crud.create')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Codigo</label>
                            <input name="txtcodigo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese el codigo del producto</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input name="txtnombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese el nombre del producto</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                            <input name="txtprecio" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese el precio del producto</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                            <input name="txtcantidad" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese la cantidad de productos</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- -->
     <!--Tabla MAIN CONTENT -->
    <div class="p-5 table-responsive">
        <button class="btn btn-success"
        class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir Productos</button>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                <tr class="table table-secondary">
                    <th scope="row">{{$item ->id_producto}} </th>
                    <td>{{$item -> nombre}} </td>
                    <td>{{$item -> precio}} </td>
                    <td>{{$item -> cantidad}} </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modalEditar{{ $item->id_producto }}">
                            <i class="fa-solid fa-pencil" style="background-color: #FFC107;padding: 5px;"></i>
                        </a>
                        <a href="{{route('crud.delete',$item->id_producto)}}" onclick="return res()" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash" style="background-color: #DC3545;padding: 5px;"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    </div>
    @foreach ($datos as $item)
    <!-- Modal para editar producto-->
    <div class="modal fade" id="modalEditar{{ $item->id_producto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para editar producto -->
                    <form method="POST" action="{{route('crud.update')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Codigo</label>
                            <input type="text" class="form-control"
                            name="txtcodigo" value="{{$item->id_producto}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese el codigo del producto</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control"
                            name="txtnombre" value="{{$item->nombre}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese el nombre del producto</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                            <input type="number" class="form-control"
                            name="txtprecio" value="{{$item->precio}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese el precio del producto</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                            <input type="number" class="form-control"
                            name="txtcantidad" value="{{$item->cantidad}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Por favor, ingrese la cantidad de productos</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6e295b2b78.js" crossorigin="anonymous"></script>
</body>
</html>
