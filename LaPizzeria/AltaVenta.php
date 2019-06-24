<?php

if (isset($_POST["sabor"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]) && isset($_POST["mail"])) {
    Pizzeria::VentaPizza($_POST["sabor"], $_POST["tipo"], $_POST["cantidad"], $_POST["mail"],null);
}









?>