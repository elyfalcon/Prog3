<?php
 require_once './clases/Pizzeria.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');
$method = $_SERVER['REQUEST_METHOD'];
echo $method;

switch ($method) {
	case "GET":
	echo "dentro del GET";
		switch (key($_GET)) {
			case "PizzaCarga":
				require_once ('PizzaCarga.php');
				PizzaCarga::AgregarPizza($_GET["tipo"], $_GET["sabor"], $_GET["cantidad"], $_GET["precio"]);

				echo "PizzaCarga";
				break;
		}
		break;
	
	case "POST":
            switch (key($_POST)) {
                case 'consultarPizza':
                    require_once 'PizzaConsultar.php';
                    break;
                case 'altaPizza':
                    require_once 'altaPizza.php';
                    break;
                case 'altaVenta':
                    if (isset($_FILES["foto"])) {
                        require_once '/AltaVentaFoto.php';
                    } else {
                        require_once '/AltaVenta.php';
                    }
                    break;
            }
            break;
    case "PUT":
			parse_str(file_get_contents("php://input"), $_PUT);

			switch (key($_PUT))
			{
				case "carga":
					require_once("PizzaCargaPlus.php");

					PizzaCargaPlus::AltaPlus($_PUT["tipo"], $_PUT["sabor"], $_PUT["cantidad"], $_PUT["precio"]);
					break;
			}
			break;

	default:
		# code...
		break;
}


















?>