<?php
$conection = new mysqli("localhost","root","","sistema_escolar");
    if($conection -> connect_error){
                       die($conection -> connect_error);
    }

?>