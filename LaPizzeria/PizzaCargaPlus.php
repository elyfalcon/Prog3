<?php
require_once("Pizzeria.php");

class PizzaCargaPlus
{

public static function AltaPlus($tipo, $sabor, $cantidad, $precio)
	{
		if(Pizzeria::ValidarTipo($tipo) != 1)
		{
			echo "<br>Tipo de Pizza incorrecto. Ingresó $tipo pero debe ser MOLDE o PIEDRA";
		}
		else if(Pizzeria::ValidarSabor($sabor) != 1)
		{
			echo "<br>Sabor de Pizza incorrecto. Ingresó $sabor pero debe ser MUZZA, o JAMON, o ESPECIAL";
		}
		$arrayPizzas = Pizza::leerPizzas("archivos/Pizza.txt");
		$id = Pizzeria::SiguienteId($arrayPizzas);
		$pizza = new Pizza($id, $tipo, $sabor, $cantidad, $precio);
		$hayStock = false;
		
		$archivo = fopen("archivos/Pizza.txt", "w");

		foreach ($arrayPizzas as $unaPizza)
		{
			if($pizza->esIgual($unaPizza)) //Hay en stock, reemplazo precio y acumulo stock.
			{
				$hayStock = true;
				$unaPizza->setPrecio($pizza->getPrecio()); //actualizo el precio
				$unaPizza->setCantidad($unaPizza->getCantidad() + $pizza->getCantidad());
			}

			$linea = json_encode($unaPizza->toArray());
			fputs($archivo, $linea . "\n");
		}

		if(!$hayStock) //No hay en stock la pizza, agrego una nueva línea.
		{
			$linea = json_encode($pizza->toArray());
			fputs($archivo, $linea . "\n");

			if ($foto != null)
			{
              //  ManejadorArchivos::cargarImagenPorNombre($foto, ($pizza->getTipo() . "_" . $pizza->getSabor()), "./ImagenesDePizzas/");
			}
		}

		fclose($archivo);
	}

			
			






















	}
?>