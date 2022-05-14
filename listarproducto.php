<?php
include_once('includes/conexion.php');
include_once('includes/Productos.php');

$productos = new Productos;
$data = $productos->fetch_productos();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Lista de Productos</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h2>Lista de Productos</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Fecha de registro</th>
                            <th scope="col" colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $one) {?>
                        <tr>
                            <td><?php echo $one['id']; ?></td>
                            <td><?php echo $one['nombre']; ?></td>
                            <td><?php echo $one['referencia']; ?></td>
                            <td><?php echo $one['precio']; ?></td>
                            <td><?php echo $one['peso']; ?></td>
                            <td><?php echo $one['categoria']; ?></td>
                            <td><?php echo $one['stock']; ?></td>
                            <td><?php echo $one['fecha']; ?></td>
                            <td><a class="btn btn-danger" href="eliminarproducto.php?id=<?php echo $one['id']; ?>">Eliminar</a></td>
                            <td><a class="btn btn-warning" href="edicionproducto.php?id=<?php echo $one['id']; ?>">Editar</a></td>
                            <td><a class="btn btn-primary" href="venderproducto.php?id=<?php echo $one['id']; ?>">Vender</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a class="btn btn-success" href="newproducto.php">Agregar Producto</a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </body>
</html>