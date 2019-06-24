<?php

class Pizza {

	private $_id;
  private $_sabor;
  private $_tipo;
  private $_precio = 0;
  private $_cantidad = 0;
  private $_foto;


public function __constructor($sabor,$tipo,$precio,$cantidad,$foto='no_foto.jpg',$id)
{
	$this->_sabor=$sabor;
	$this->_tipo=$tipo;
	$this->_precio=$precio;
	$this->_cantidad=$cantidad;
  $this->_foto=$foto;
  $this->_id=$id;

}

public function getSabor(){
        return $this->_sabor;
 }

 public function getTipo()
 {
 	return $this->_tipo;
 }

public function getPrecio()
 {
 	return $this->_precio;
 }
public function getCantidad()
 {
 	return $this->_cantidad;
 }
 public function getId()
 {
  return $this->_id;
 }
 public function getFoto()
 {
  return $this->_foto;
 }

 public function setPrecio($precio) {

        return $this->_precio = $precio;
 }
  public function setSabor($sabor) {

        return $this->_sabor = $sabor;
 }
  public function setTipo($tipo) {
        return $this->_tipo = $tipo;
 }

 public function setId($id)
 {
  return $this->_id=$id;
 }

public function setFoto($foto)
{
  return $this->_foto=$foto;
}


public function MostrarPizza()
{
  echo "Sabor:  $this->sabor - Tipo: $this->tipo - Importe:  $this->precio  - Cantidad: $this-> cantidad <br>";
}


public function ToArray()
 {
 	$arrayP=array();
  array_push($arrayP,$this->id);
 	array_push($arrayP,$this->sabor);
 	array_push($arrayP,$this->tipo);
 	array_push($arrayP,$this->precio);
 	array_push($arrayP,$this->cantidad);

 	return $arrayP;
}
















}
?>