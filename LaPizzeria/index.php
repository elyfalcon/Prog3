<?php

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

switch ($method) {
	case "GET":
		switch (key($_GET)) {
			case "PizzaCarga":
				require_once ('./PizzaCarga.php');
				break;
		}
		break;
	
	default:
		# code...
		break;
}


















?>