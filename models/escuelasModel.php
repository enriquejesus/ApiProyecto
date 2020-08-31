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

        function eliminarEscuela($id){//Se crea la función eliminarEscuela
            $query = $this->connect()->prepare('DELETE  FROM escuelas  WHERE id= :id');//se realiza el query sql
            $query->execute(['id' => $id]);//se manda el id para confirmar
    
            return $query;//retorna el query
        }// fin de la función 

        function actualizaEscuela($item){//Se crea la función actualizaEscuela
            $query = $this->connect()->prepare(//Se realiza el query sql
            'UPDATE  escuelas SET 
            clave = :clave, 
            nombre = :nombre,
            telefono = :telefono, 
            direccion = :direccion,
            logo = :logo
            WHERE id = :id'
            );
            /*
                De la linea 42 - 48 se realiza la asignación de variables
                donde debe ser iguales los datos del formulario al de la bd
                para ser la actualización necesaria
            */
            $query->execute([//Ejecuta el query
                'id'=> $item['id'],
                'clave' => $item['clave'],
                'nombre' => $item['nombre'],
                'telefono' => $item['telefono'],
                'direccion' => $item['direccion'],
                'logo' => $item['logo']]);
                /*
                 * De la linea 56 - 61 se hace asignación de 
                 * par clave - valor para realizar el query
                 */
            return $query;//retorna el query
        }//fin de la función

    }//Finaliza la clase EscuelasModel
?>