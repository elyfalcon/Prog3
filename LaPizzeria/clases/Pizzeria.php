<?php

require_once 'pizza.php';


class Pizzeria{


public static function ValidarTipo($tipo)
	{
		$retorno = 0;

		if(strtolower($tipo) == "molde" || strtolower($tipo) == "piedra")
		{
			$retorno = 1;
		}

		return $retorno;
	}
	public static function ValidarSabor($sabor)
	{
		$retorno = 0;

		if(strtolower($sabor) == "muzza" || strtolower($sabor) == "jamon" || strtolower($sabor) == "especial")
		{
			$retorno = 1;
		}

		return $retorno;
	}

	public function isEqual($pizza)
	{
		if(strtoupper($this->tipo) == strtoupper($pizza->tipo) && strtoupper($this->sabor) == strtoupper($pizza->sabor))
		{
			$isEqual = true;
		}
		else
		{
			$isEqual = false;
		}

		return $isEqual;
	}

public static function SiguienteId($arrayPizzas)
	{
		$proximoId = 0;
		if (isset($arrayPizzas))
		{
			foreach ($arrayPizzas as $pizza)
			{
				if ($pizza->id > $proximoId)
				{
					$proximoId = $pizza->id;
				}
			}
		}

		return $proximoId + 1;
	}

public static function TraerId($ListaPizzas, $tipo, $sabor)
	{
		$id = 0;

		foreach ($ListaPizzas as $pizza)
		{
			if(strtoupper($pizza->tipo) == strtoupper($tipo) && strtoupper($pizza->sabor) == strtoupper($sabor))
			{
				$id = $pizza->id;
				break;
			}
		}

		return $id;
	}
	public static function HayStock($ListaPizzas, $tipo, $sabor, $cantidad)
	{
		$stock = -1;

		foreach ($ListaPizzas as $pizza)
		{
			if(strtoupper($pizza->tipo) == strtoupper($tipo) && strtoupper($pizza->sabor) == strtoupper($sabor))
			{
				$stock = $pizza->cantidad - $cantidad;
				break;
			}
		}

		return $stock;
	}


public static function LeerJson($archivo)
{
	$lista=array();
	if(file_exists($archivo))
	{
	$contenido=file_get_contents($archivo);
	$con=utf8_decode($contenido);
	$datos=json_decode($con,true);
	foreach ($datos as $dato) {
        if (isset($objeto)) {
          $objeto = new Pizza($objeto->id,$objeto->sabor, $objeto->tipo,  $objeto->cantidad, $objeto->precio);
          array_push($listado, $objeto);
              }
     }
    }
   return $lista; 
}

public static function LeerTxt($archivoTxt)
	{
		$archivo = fopen($archivoTxt, "r");
		$ListaPizzas = array();
		$arrayDatos = array();
		$linea = "";

		while (!feof($archivo))
		{
			$linea = fgets($archivo);

			if ((string)$linea != "") //Evito las lineas vacias
			{
				$arrayDatos = json_decode($linea, true); //El segundo parametro en true para que trate la salida como array.
				$pizza = new Pizza($arrayDatos["id"], $arrayDatos["tipo"], $arrayDatos["sabor"], $arrayDatos["cantidad"], $arrayDatos["precio"]);
				array_push($ListaPizzas, $pizza);
			}
		}
	}

public static function AgregarPizza($sabor,$tipo,$precio,$cantidad,$foto)
{
	//$listaP=LeerJson(archivo);
	if(ValidarTipo($tipo) !=1)
	{
		echo "<br> El tipo debe ser molde o piedra";

	}
	if(ValidarSabor($sabor)!=1)
	{
		echo "<br> El sabor puede ser jamon, muzza o especial";

	}

	//$prod=self::ExistePizza($listaP,$sabor,$tipo);
	$id = SiguienteId($prod);
	$pizza = new Pizza($id, $tipo, $sabor, $cantidad, $precio);//armo la pizza con el nuevo id

	$listaP=LeerJson($archivoPizza);
	$prod=self::ExistePizza($listaP,$sabor,$tipo);

	if($prod=null)
	{
		echo "<br>La pizza no exite"; //agrego la pizza
		$newProducto=new Pizza($sabor,$tipo,$precio);
		array_push($listaP, $newProducto);
	}
	else
	{
		echo "<br>La pizza ya existe"; //modifico la cantidad, agregandola
		$prod_cant=$prod->getCandidad();
		$prod->setCantidad($prod_cant+$cantidad);
		echo "<br>Se agrego la cantidad nueva, en stock: ".$prod->getCantidad();
	}
	if(isset($foto)) //si tiene foto la subo
	{
	$aux = explode(".", $Foto);
    $ext = $aux[sizeof($aux) - 1];
    $destino = "./fotos/" . $sabor .  $tipo . "." . $ext;
     $nuevoPizza->setFoto($destino);
    //cargarimagen($foto,$aux,$destino)
	}
	GuardarJson($ListaP,"./archivos/Pizza.txt");

}

public static function ConsultarPizza($sabor,$tipo)
{
$retorno="no hay";
$haysabor=false;
$haytipo=false;

if(ValidarTipo($tipo) !=1)
	{
		echo "<br> El tipo debe ser molde o piedra";

	}
	if(ValidarSabor($sabor)!=1)
	{
		echo "<br> El sabor puede ser jamon, muzza o especial";

	}

 $ListaP= LeerJson("./archivos/Pizza.txt");
 foreach ($ListaP as $pizza) {
 	if($pizza->getSabor() ==$sabor)
 	{
 		$haysabor=true;
 		if($pizza->getTipo()==$tipo)
 		{
 			$haytipo=true;
 		}
 	}

 	 }//fin foreach
 	 if($haysabor=true && $haytipo=true)
 	 {
 	 	echo "<br> Hay pizza del sabor y tipo elegido <br>: Cantidad: " .$pizza->getCantidad();
 	 }
    else if($haysabor=true && $haytipo=false)
    {
    	echo "<br> Hay pizza del sabor elegido pero no del tipo seleccionado <br> Tipo Disponible: " . $helado->getTipo() . "<br>Cantidad Disponible: " . $pizza->getCantidad();
    }
    else
    {
    	echo "<br> No hay pizza";
    }
}

public static function GuardarJson($ListaProd,$n_archivo)
{
  $lista=ListaProd;
  $archivo=fopen($n_archivo, "w");

  foreach ($lista as $key) {
  	$array=array('id'=>$key->getId(),'sabor'=>$key->getSabor(),'tipo'=>getIipo(),'precio'=>getPrecio());
  	array_push($lista, $array);
  	fputs($archivo,json_encode($array).PHP_EOL);
  }
}

public static function ExistePizza($listaProductos,$sabor,$tipo)
{
 $retorno=null;
 foreach ($listaProductos as $producto) {
 	if($producto->getSabor()==$sabor && $producto->getTipo()==$tipo)
 	{
 		$retorno=$producto;

 	}
 	return $retorno;

 }//fin foreach
}

 public static function VentaPizza($sabor,$tipo,$cantidad,$email)
 {

	if(ValidarTipo($tipo) != 1)
		{
			echo "<br>Tipo de Pizza incorrecto. Ingresó $tipo pero debe ser MOLDE o PIEDRA";
		}
		else if(ValidarSabor($sabor) != 1)
		{
			echo "<br>El Sabor de Pizza incorrecto. Ingresó $sabor pero debe ser MUZZA, o JAMON, o ESPECIAL";
		}
		
		$ListaPizzas = LeerTxt("archivos/Pizza.txt");
		$hayPizza=ExistePizza($ListaPizzas,$sabor,$tipo);
		$pizza = new Pizza($id, $tipo, $sabor, $cantidad, $precio);
		if(!empty($hayPizza))
		{
			$stockreal=HayStock($ListaPizzas,$tipo,$sabor,$cantidad); //verifico si puedo vender
			if(stockreal >=0)
			{
				$archivo = fopen("archivos/Venta.txt", "a");
				$arrayVenta = $pizza->toArray();
				$arrayVenta["email"] = $mail;
				$linea = json_encode($arrayVenta);
				fputs($archivo, $linea . "\n");
				fclose($archivo);

				$archivo = fopen("archivos/Pizza.txt", "w");
				foreach ($ListaPizzas as $unaPizza)
				{
					if($unaPizza->isEqual($pizza))
					{
						//Guardo en el stock actual ($unaPizza) el remanente luego de la venta
						$unaPizza->setCantidad($stockreal);
						
					}
					$linea = json_encode($unaPizza->toArray());
					fputs($archivo, $linea . "\n");
				}	
				fclose($archivo);


			}
			else
			{
				echo "<br>No se puede vender la cantidad pedida, solo hay: ";
				$retorno = $pizza->getCantidad() + $stockreal;
			}


		}

	//	retun $retorno;


 }

}

























?>