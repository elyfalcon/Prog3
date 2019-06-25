<?php
include 'Pizzeria.php';
include 'ManejoArchivos'

class BorrarPizza
{


$ListaPizzas = Pizzeria::LeerTxt("archivos/Pizza.txt");
$pizzaExiste = Pizzeria::ExistePizza($pizzas, $sabor, $tipo);
echo " Pregunto  si hay Pizza sabor $sabor de $tipo <br>";

if (!empty($pizzaExiste)) {
    $destino = $pizzaExiste->getFoto();
    eliminarFoto($destino);
    foreach ($pizzas as $key => $value) {
        if($value->Pizzzeria::isEqual($pizzaExiste)){
            unset($pizzas[$key]);
            
        }

        ManejoArchivos::Guardar($pizzas, Pizza.txt);
} else {
    echo "Pizza No Existe";
}
    }















}

?>