<?php
class PizzaCarga{
public static function AgregarPizza($sabor,$tipo,$precio,$cantidad,$foto)
{
	
	if(ValidarTipo($tipo) !=1)
	{
		echo "<br> El tipo debe ser molde o piedra";

	}
	if(ValidarSabor($sabor)!=1)
	{
		echo "<br> El sabor puede ser jamon, muzza o especial";

	}

	
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
    $destino = "ImagenesDePizzas/" . $sabor .  $tipo . "." . $ext;
   // $nombre=
    require_once 'upload_file.php';
    upload_file::UploadF($destino,"ImagenesDePizzas");
     $nuevoPizza->setFoto($destino);
    
	}
	GuardarJson($ListaP,"./archivos/Pizza.txt");

}

/*

if (isset($_GET["sabor"]) && isset( $_GET ["tipo"] ) && isset( $_GET ["cantidad"]) && isset($_GET ["precio"]))
{
    Pizzeria::AgregarPizza($_GET["sabor"], $_GET["tipo"], $_GET["cantidad"], $_GET["precio"], null);*/
}
