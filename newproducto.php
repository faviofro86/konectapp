<?php
include_once('includes/conexion.php');
include_once('includes/Categorias.php');

$categorias = new Categorias;
$data = $categorias->fetch_categorias();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Agregar Producto</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h1>Agregar Producto</h1>
                <form method="post" action="grabarproducto.php">
                    <div class="mb-3">
					   	<label class="form-label">Nombre de Producto</label>
                       	<input type="text" class="form-control" name="nombre" placeholder="Producto 1" required>
                    </div>
                    <div class="mb-3">
                 	    <label class="form-label">Referencia</label>
                    	<input type="text" class="form-control" name="referencia" placeholder="Referencia" required>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" placeholder="S/" required>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Peso</label>
                        <input type="text" class="form-control" name="peso" placeholder="gr." required>
                    </div>
                    <div class="mb-3">
                       <label class="form-label">Seleccionar Categoría</label>
					   <select class="form-select" aria-label="Default select example" name="categoria" required>
                           <?php foreach($data as $categoria){ ?>
                           <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['categoria']; ?></option>
                           <?php } ?>
                       </select>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Stock</label>
                        <input type="text" class="form-control" name="stock" placeholder="1 - 1000" required> 
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