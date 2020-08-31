<?php
    require '../controllers/apiEscuelas.php';//Se incluye el controlador correspondiente que es update()
    $api = new ApiEscuelas();//Se crea una instancia del controlador, es asginada a la variable $api
    
    $id= '';
    $clave = '';
    $nombre = '';
    $telefono = '';
    $direccion = '';
    $logo = '';
    /*
     * de la linea 5 - 10 se delimita las variables que se inicializan 
     */

    if(isset($_POST['id']) && isset($_POST['clave']) && isset($_POST['nombre']) 
       && isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_FILES['logo'])){
       /*
        * Para realizar el método este debe de verificar mediante isset
        * si ya existe por ello se ocupa en cada una de ellas
        */
        if( isset($_FILES['logo'])){
            $item = array(
                'id' => $_POST['id'],
                'clave' => $_POST['clave'],
                'nombre' => $_POST['nombre'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'logo' =>  addslashes(file_get_contents($_FILES['logo']['tmp_name']))
            );

            /*
             * Es importante como se manejan archivos volver a realizar una comprobación
             * por esto se vuelve a realizar con la variable que corresponde a archivos
             * dado que si no se hace la linea 28 contiene algo importante, que corresponde 
             * a recuperar como temporal mediante file_get_contents 
             */
            $api->update($item); //una vez realizado la comprobación este manda a llamar al metódo update
        }
        else{
            $api->error('Error con el archivo: ' .$api->getError());//si encuentra un error con el archivo manda este mensaje
        }

    }else{
        $api->error('Error al llamar la API');//si encuentra un fallo mayor manda este mensaje
    }
?>