<?php

if(isset($_POST["sabor"]) && isset($_POST["tipo"]) )
{    
    Pizzeria::consultarPizza($_POST["sabor"], $_POST["tipo"]);
}

?>