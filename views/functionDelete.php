<?php
     require '../controllers/apiEscuelas.php';//Se incluye el controlador correspondiente que es delete()

    $api = new ApiEscuelas();//Se crea una instancia del controlador, es asginada a la variable $api
    
    $id = '';//Se crea la variable id inicialida

    if(isset($_POST['id'])  ){//Mediante isset se verifica que exista un id
        $item =  $_POST['id']; //Si este existe, este debe de enviarlo mediante _POST
        $api->delete($item);//Se pasa el item enviado mediante _POST
    }//Fin de la comprobación 
    else{//En caso de que ocurra un error 
        $api->error('Error al llamar la API');//Muestra este error
    }//fin el else
?>