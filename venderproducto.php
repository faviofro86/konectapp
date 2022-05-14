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
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Vender Producto</title>

    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h1>Vender Producto: <?php echo $data['nombre']; ?></h1>
                <form method="post" action="vender.php">
                    <div class="mb-3">
                       	<label class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $data['precio']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $data['stock']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                       	<label class="form-label">Ingrese la cantidad a vender:</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" onchange="myFunction(this.value);">
                    </div>
                    <div class="mb-3">
						<p>El total es: <input type="text" class="form-control" id="total" name="total"></p>
                    </div>
                    <button type="submit" class="btn btn-success btn-animate">Registrar venta</button>
                    <a class="btn btn-danger" href="listarproducto.php">Cancelar</a>
                </form>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
        

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        -->
        <script>
			
			function myFunction(val) {
				var y = document.getElementById("precio").value;
				var x = val*y;
				document.getElementById("total").value=x;
			}

		</script>
      
    </body>
</html>