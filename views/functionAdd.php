<?php
    require '../controllers/apiEscuelas.php';//Se incluye el controlador correspondiente que es add()

    $api = new ApiEscuelas();//Se crea una instancia del controlador, es asginada a la variable $api
    
    $clave = ''; //De la linea 6 - 10 se definen las variables 
    $nombre = '';
    $telefono = '';
    $direccion = '';
    $logo = '';
    
    if(isset($_POST['clave']) && isset($_POST['nombre'])  //De la linea 12 a 14 se busca verificar mediante isset
    && isset($_POST['telefono']) && isset($_POST['direccion']) // si existe el valor, todo mediante con _POST
    && isset($_FILES['logo'])){ //El único distinto es logo ya que es un archivo de imagen que se guarda en byte en la Base de datos
       
        if(isset($_FILES['logo'])){ //Para realizar cambios, vuelve a verificar la existencia del archivo de imagen
            $item = array( //Se inicia la inserción de los datos de la linea 17 - 25 
                'clave' => $_POST['clave'],
                'nombre' => $_POST['nombre'],
                'telefono' => $_POST['telefono'],
                'direccion' => $_POST['direccion'],
                'logo' => base64_encode ( stripslashes( //En el caso particular de los datos con imagenes se declara base64_encode
                          addslashes(file_get_contents( //Ya que con este se obtiene la información y este lo que realiza es la conversión 
                          $_FILES['logo']['tmp_name'])) ) ) //  y lo sube a la bd 
            );
            $api->add($item); //Finaliza agregando el dato
        }
        else{//En caso de no poder subirlo por un error o datos faltantes 
            $api->error('Error con el archivo: ' .$api->getError());//Manda este mensaje
        }

    }//fin de la comprobación de datos para subirlos
    else{//En caso de haber un error por la comunicación de parte del servidor u otra situación
        $api->error('Error al llamar la API');//Manda este mensaje 
    }
?>