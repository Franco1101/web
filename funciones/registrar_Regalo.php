<?php 
function Registrar_Regalo( $vConexion){

    $SQL="INSERT INTO regalo (nom_regalo)
		  VALUES ('{$_POST['regalo']}')";

    if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar cargar el regalo.</h4>');
    }
		
	return true;
}
?>