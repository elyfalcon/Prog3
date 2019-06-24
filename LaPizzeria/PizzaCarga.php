<?php


include './clases/Pizzeria.php';

if (isset($_GET["sabor"]) && isset( $_GET ["tipo"] ) && isset( $_GET ["cantidad"]) && isset($_GET ["precio"]))
{
    Pizzeria::agregarPizza($_GET["sabor"], $_GET["tipo"], $_GET["cantidad"], $_GET["precio"], null);
}