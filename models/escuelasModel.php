<?php

require 'db.php'; //Se incluye el archivo de la conexión a la BD

    class EscuelasModel extends DB{ //Se inicia la clase EscuelasModel trayendo todos los datos de BD

        function obtenerEscuelas(){ //Se crea la función obtenerEscuelas
            $query = $this->connect()->query('SELECT * FROM escuelas'); //Se realiza el query 
            
            return $query; //Se regresa el query
        }//finaliza la función

        function obtenerEscuela($id){ //Se crea la función obtenerEscuela
            $query = $this->connect()->prepare('SELECT * FROM escuelas  WHERE id= :id'); //Se realiza el query 
            $query->execute(['id' => $id]);
    
            return $query; //Se regresa el query
        }//finaliza la función

    }//Finaliza la clase EscuelasModel
?>