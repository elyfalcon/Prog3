<?php


class SubirCosas(){

public function subirImagenProducto($nombreArch,$nombref,$detino)
{

 if(isset($nombref))


}
public static function GuardarArchivos($array_objetos, $file) {
        $aux = explode(".", $file);
        $ext = $aux[sizeof($aux) - 1];
        $guardo = FALSE;
        if ($ext == 'json') {
            $guardo = GuardarJsonArray($array_objetos, $file);
        } elseif ($ext == 'csv') {
            $guardo = GuardarCsv($array_objetos, $file);
        } elseif ($ext == 'txt') {
            $guardo = GuardarJsonTxt($array_objetos, $file);
        }
        return $guardo;
    }
 public static function GuardarCsv($array_objetos, $file) {
        $guardo = FALSE;
        if (!empty($array_objetos)) {
            $archivo = fopen($file, 'w+');
            foreach ($array_objetos as $unObjeto) {
                fputs($archivo, (implode(',', $unObjeto->toArray()) . "\n"));
            }
            $guardo = TRUE;
        }
        return $guardo;
    }

    public static function GuardarJsonTxt($array_objetos, $file) {
        $guardo = FALSE;
        $archivo = fopen($file, 'w+');
        foreach ($array_objetos as $unObjeto) {
            $array_objeto = $unObjeto->toArrayKeyValue();
            fputs($archivo, (json_encode($array_objeto) . "\n"));
            $guardo = TRUE;
        }
        return $guardo;
    }

    public static function GuardarJsonArray($array_objetos, $file) {
        $arrayKeyValue = array();
        $guardo = FALSE;
        foreach ($array_objetos as $key => $objeto) {
            $arrayKeyValue[$key] = $objeto->toArrayKeyValue();
        }
        if (!empty($arrayKeyValue)) {
            $archivo = fopen($file, 'w+');
            fputs($archivo, (json_encode($arrayKeyValue) . "\n"));
            $guardo = TRUE;
        }
        return $guardo;
    }
function BorrarFoto($destino) {    
    if (file_exists($destino)) {
        BackupFoto($destino);
    }
}
public static function BackupFoto($archivo){
    date_default_timezone_set('America/Argentina/Buenos_Aires');    
    $aux=explode(".", $archivo); //separo el nombre
    $aux2=explode("/",$aux[0]); //separo el nombre por las /
    $ext = $aux[sizeof($aux) - 1];
    $nombre = $aux2[sizeof($aux2)-1];
    $backup= "backUpFotos/" . $nombre . date("y-m-d_H_i_s",time()) . "." . $ext ;

    rename($archivo,$backup);



}


}