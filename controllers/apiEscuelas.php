<?php

//Se incluye el archivo escuelasModel.php 
    require '../models/escuelasModel.php';

    class apiEscuelas {
    /* ---- Función de reutilización ----
    *  De la linea 13 - 23 contiene funciónes especificas para contener los mensajes
    * Cada uno cumple con su función según sea el caso
    *  -- Nota -- Es importante concatenar JSON_UNESCAPED_UNICODE, en cada mensaje, ya que de no ser asi no podra tener acceso a agregar caracteres como: ñ, í , ó , etc.
    */

    function error($mensaje){ //inició función error
        echo '<code>' . json_encode(array('mensaje' => $mensaje,JSON_UNESCAPED_UNICODE)) . '</code>'; //mensaje de error
    } //fin de función error 

    function exito($mensaje){//inició función error
        echo '<code>' . json_encode(array('mensaje' => $mensaje,JSON_UNESCAPED_UNICODE)) . '</code>'; //mensaje de exito
    }//fin de función error 

    function printJSON($array){//inició función error
        echo '<code>' . json_encode($array,JSON_UNESCAPED_UNICODE) . '</code>'; //mensaje de printJSON
     }//fin de función error 
    

        function getAll(){ //Inició función getAll 
            $escuela = new EscuelasModel(); //Se crea un objeto y se asigna a EscuelasModel();
            $escuelas = array(); //Se crea un array vacío 
            $escuelas["items"] = array(); //se asigna la variable $escuelas a un array 
    
            $res = $escuela->obtenerEscuelas(); //Se trae el query de conexión, mediante el método obtenerEscuelas();
    
            if($res->rowCount()){//inición de if y Se realiza un conteo mediante rowCount()
                while ($row = $res->fetch(PDO::FETCH_ASSOC)){ // Inicio del ciclo while y Mediante el puntero $row se trae los datos 1 x 1
        
                    $item=array( //Se inicializa un array de la linea 36 - 43 donde este asigna datos par clave - valor
                        "id" => $row['id'], //importante asingnar la variable $row para traer los datos asignados
                        "clave" => $row['clave'],
                        "nombre" => $row['nombre'],
                        "telefono" => $row['telefono'],
                        "direccion" => $row['direccion'],
                        "logo" => $row['logo']
                    );
                    array_push($escuelas["items"], $item); // Al termino de los datos son agregados en el array _push, donde se inicializa con 
                    //la variable $escuelas y se concatena con el $item, este tiene agregado todos los datos traidos
                }//fin del ciclo while
                
                $this->printJSON($escuelas); //Una ves traida la información, esta se asigna al método printJSON, y se imprimen los datos
            }//fin del ciclo if
            else{//inició del else
                
                $this->error('No hay elementos'); //Rn caso de que rowCount no encuentre algún dato, este imprimira que no contiene elementos

            }// fin del ciclo else
        }

    }
?>