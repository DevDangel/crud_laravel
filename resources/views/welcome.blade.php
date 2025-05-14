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
    <div class="p-5 table-responsive">
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
                        <a href="" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil" style="background-color: #FFC107;padding: 5px;"></i></a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash" style="background-color: #DC3545;padding: 5px;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6e295b2b78.js" crossorigin="anonymous"></script>
</body>
</html>
