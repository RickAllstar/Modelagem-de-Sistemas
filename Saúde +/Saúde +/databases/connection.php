<?php
$connection = new mysqli("localhost","root","","clinica_medica");
    if($connection -> connect_error){
                       die($connection -> connect_error);
    }

?>