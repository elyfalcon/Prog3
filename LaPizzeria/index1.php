<?php
	date_default_timezone_set("America/Argentina/Buenos_Aires");

	$method = $_SERVER["REQUEST_METHOD"];

	switch ($method)
	{
		case "GET":
			switch (key($_GET))
			{
				case "carga":
					require_once('PizzaCarga.php');

					PizzaCarga::AgregarPizza($_GET["tipo"], $_GET["sabor"], $_GET["cantidad"], $_GET["precio"]);
					break;
			}
			break;
		}