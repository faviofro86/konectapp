<?php

class Productos{
    
    public function fetch_productos(){
        global $pdo;
        $query = $pdo->prepare("SELECT p.*, c.categoria as categoria FROM productos p JOIN categorias c ON p.id_categoria = c.id ");
        $query->execute();
		$resultado=$query->fetchAll();
        return $resultado;
    }
	
	public function fetch_producto($id){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
		$query->bindValue(1, $id);
        $query->execute();
        $resultado=$query->fetch();
        return $resultado;
    }
    
    public function fetch_productoxcategoria($categoria){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM productos WHERE id_categoria = ?");
        $query->bindValue(1, $categoria);
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
    }
	
	public function categoriadeproducto($id){
        global $pdo;
        
        $query = $pdo->prepare("SELECT c.categoria as categoria, p.id_categoria as id FROM productos p JOIN categorias c ON p.id_categoria = c.id WHERE p.id = ?");
        $query->bindValue(1, $id);
        $query->execute();
        $resultado = $query->fetch();
        return $resultado;
    }  
   
    
}

?>