<?php

if(isset($_POST["sabor"]) && isset($_POST["tipo"]) )
{    
    Pizzeria::ConsultarPizza($_POST["sabor"], $_POST["tipo"]);
}

?>