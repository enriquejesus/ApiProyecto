<?php
 require '../controllers/apiEscuelas.php'; //Se incluye el controlador correspondiente que es getAll
    
    
    $api = new apiEscuelas(); //Se crea una instancia del controlador, es asginada a la variable $api 
    $api->getAll(); //Manda a llamar el método getAll

?>