<?php
include_once('includes/conexion.php');
include_once('includes/Productos.php');
include_once('includes/Categorias.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $productos = new Productos;
	$categorias = new Categorias;
    $data = $productos->fetch_producto($id);
    $dato = $categorias->fetch_categorias();
	$cate = $productos->categoriadeproducto($id);
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Editar Producto</title>

    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h1>Editar Producto: <?php echo $data['nombre']; ?></h1>
                <form method="post" action="editarproducto.php">
                    <div class="mb-3">
                       	<label class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Nombre de Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Referencia</label>
                        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $data['referencia']; ?>">
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $data['precio']; ?>">
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Peso</label>
                        <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $data['peso']; ?>">
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Seleccionar Categoría</label>
                        <select class="form-select" aria-label="Default select example" name="categoria">
                          	<option value="<?php echo $cate['id']; ?>" selected><?php echo $cate['categoria']; ?></option>
                           <?php foreach($dato as $categoria){ ?>
                           <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['categoria']; ?></option>
                           <?php } ?>
                       	</select>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $data['stock']; ?>">
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Fecha y hora de registro</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $data['fecha']; ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-success btn-animate">Grabar</button>
                    <a class="btn btn-danger" href="listarproducto.php">Cancelar</a>
                </form>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


      
    </body>
</html>