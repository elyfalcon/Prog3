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
	public static function validarSabor($sabor)
	{
		$retorno = 0;

		if(strtolower($sabor) == "muzza" || strtolower($sabor) == "jamon" || strtolower($sabor) == "especial")
		{
			$retorno = 1;
		}

		return $retorno;
	}

public static function siguienteId($arrayPizzas)
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

public static function AgregarPizza($sabor,$tipo,$precio,$cantidad,$foto)
{
	//$listaP=LeerJson(archivo);
	if(Pizzeria::ValidarTipo($tipo) !=1)
	{
		echo "<br> El tipo debe ser molde o piedra";

	}
	if(Pizzeria::validarSabor($sabor)!=1)
	{
		echo "<br> El sabor puede ser jamon, muzza o especial";

	}

	//$prod=self::ExistePizza($listaP,$sabor,$tipo);
	$id = Pizza::siguienteId($prod);
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

if(Pizzeria::ValidarTipo($tipo) !=1)
	{
		echo "<br> El tipo debe ser molde o piedra";

	}
	if(Pizzeria::validarSabor($sabor)!=1)
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























}

?>