<?php  
namespace App\Models\ORM;
 
 use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class usuario extends \Illuminate\Database\Eloquent\Model {  

  function ValidarUsuarioExistenteLogin()
    {
        $usuarios = usuario::all();
        foreach($usuarios as $usuario)
        {
            if($usuario->id == $this->id)
            {
                if($usuario->clave == $this->clave)
                {
                    return $usuario;
                }
                else
                {
                    return "clave";
                }
            }
        }
        return "nombre";
    }


}
?>