<?php

include_once('includes/conexion.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
	$pre1 = $pdo->query("SELECT stock FROM productos WHERE id = ".$id);
    $pre2 = $pre1->fetchColumn();
	
	if($pre2 < $cantidad){
		$url = "<meta http-equiv='refresh' content='1;URL=venderproducto.php?id=".$id."'><script language='javascript'>alert('No hay stock')</script>";
    	echo $url;
	}else{
		$sql = "INSERT INTO `ventas` (`fecha`,`total`) VALUES (now(), '".$total."')";
		$pdo->query($sql);

		$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
		$lastId = $stmt->fetchColumn();

		$sql = "INSERT INTO `detalle_venta` (`id_venta`,`id_producto`,`cantidad`,`subtotal`) VALUES ('".$lastId."','".$id."','".$cantidad."','".$total."')";
		$pdo->query($sql);
		
		$final = $pre2 - $cantidad;
		$updt = "UPDATE productos SET stock = ? WHERE id = ?";
		$pdo->prepare($updt)->execute([$final, $id]);

		$url = "<meta http-equiv='refresh' content='1;URL=listarproducto.php'><script language='javascript'>alert('Venta grabada')</script>";
		echo $url;
		
	}
	    
} catch(PDOException $e) {
   echo $e->getMessage();
}

$pdo = null;

?>