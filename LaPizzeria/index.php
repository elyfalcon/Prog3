<?php

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

switch ($method) {
	case "GET":
	echo "dentro del GET";
		switch (key($_GET)) {
			case "PizzaCarga":
				require_once ('./PizzaCarga.php');

				echo "PizzaCarga";
				break;
		}
		break;
	
	case "POST":
            switch (key($_POST)) {
                case 'consultarPizza':
                    require_once './PizzaConsultar.php';
                    break;
                case 'altaPizza':
                    require_once './altaPizza.php';
                    break;
                case 'altaVenta':
                    if (isset($_FILES["foto"])) {
                        require_once 'manejadores/AltaVentaFoto.php';
                    } else {
                        require_once 'manejadores/AltaVenta.php';
                    }
                    break;
            }
            break;

	default:
		# code...
		break;
}


















?>