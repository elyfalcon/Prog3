<?php
class UploadFoto{
//Tamaño y Formatos permitidos

 public static function UploadF($archivo,$destino) 
 {

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000)) { //Manejo de error de archivo 
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "
";
    }
  else
    {
    //Muestra informacion del archivo subido

    echo "Upload: " . $_FILES["file"]["name"] . "
";
    echo "Type: " . $_FILES["file"]["type"] . "
";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb
";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "
";

     //Verifica si el archivo existe

    if (file_exists("$destino/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {		

      move_uploaded_file($_FILES["file"]["tmp_name"], "$destino/" . $_FILES["file"]["name"]);

	echo "Almacenado en: " . "$destino/" . $_FILES["file"]["name"];

	$nombreArchivo = $_FILES["file"]["name"];

        // Muestra la imagen subida
        echo "<$destino src='$destino/$nombreArchivo'>";
      }
    }
  }
else
  {
  echo "Archivo invalido, Solamente archivos GIF, JPG y PNG son permitidos";
  }
}
}