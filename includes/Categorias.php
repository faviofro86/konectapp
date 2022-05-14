<?php

class Categorias{
    
    public function fetch_categorias(){
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM categorias");
        $query->execute();
        $resultado=$query->fetchAll();
        return $resultado;
    }
   
    
}

?>