<?php
namespace App\Models\PDO;
use App\Models\PDO\AccesoDatos;
include_once __DIR__ . '/AccesoDatos.php';

class cd
{
	public $id;
 	public $nombre;
  	public $sexo;
  	public $Perfil;
  	public $clave;

  	public static function TraerTodoLosCds()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as Nombre, sexo,Perfil from Usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(\PDO::FETCH_CLASS, "App\Models\PDO\cd");		
	}

	static function altaUsuario(Request $request, Response $response, $args)
    {
        $usuario = $request->getAttribute('usuario');
        $usuario->save();
        return $response->getBody()->write("<br>Usuario dado de alta con exito");
    }


}
?>