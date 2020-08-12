<?php
    require '../controllers/apiEscuelas.php';//Se incluye el controlador correspondiente que es getById

    $api = new ApiEscuelas();//Se crea una instancia del controlador, es asginada a la variable $api

    if(isset($_GET['id'])){//Se verifica mediante isset si la variable id existe
        $id = $_GET['id']; //si existe se asigna la variable 
        
        if(is_numeric($id)){ //Se debe comprobar si la variable $id es numerica con is_numeric
            $api->getById($id); // si se valida que existe la variable y es numerica manda a llamar el método getById
        }//fin de comprobación de variable
        else{//en caso se no cumplirse la condicional anterior 
            $api->error('No coincide  con un identificador valido');  //muestra que no es un caracter valido
        }//fin del caso else anidado
    }//fin de comprobación si existe la variable
    else{// en caso de ingresar sin el número valido y accede a esta vista
        $api->getAll();//accede al método getAll para así no generar un error al usuario
    }//fin del caso else
?>