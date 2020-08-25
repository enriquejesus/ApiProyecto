<?php

require 'db.php'; //Se incluye el archivo de la conexión a la BD

    class EscuelasModel extends DB{ //Se inicia la clase EscuelasModel trayendo todos los datos de BD

        function obtenerEscuelas(){ //Se crea la función obtenerEscuelas
            $query = $this->connect()->query('SELECT * FROM escuelas'); //Se realiza el query 
            
            return $query; //Se regresa el query
        }//finaliza la función

        function obtenerEscuela($id){ //Se crea la función obtenerEscuela
            $query = $this->connect()->prepare('SELECT * FROM escuelas  WHERE id= :id'); //Se realiza el query 
            $query->execute(['id' => $id]);//Manda el id para buscar en específicos
    
            return $query; //Se regresa el query
        }//finaliza la función

        function nuevaEscuela($escuela){//Se crea la función nuevaEscuela
            $query = $this->connect()->prepare('INSERT INTO escuelas ( clave,nombre,telefono,direccion,logo)
             VALUES ( :clave, :nombre, :telefono, :direccion, :logo)'); //Se realiza el query 
            $query->execute([  //De la linea 23 - 28 se utiliza par clave->valor para ir asignado las variables
                'clave' => $escuela['clave'],
                'nombre' => $escuela['nombre'],
                'telefono' => $escuela['telefono'],
                'direccion' => $escuela['direccion'],
                'logo' => $escuela['logo']]);
    
            return $query;//Se regresa el query
        }//finaliza la función

    }//Finaliza la clase EscuelasModel
?>