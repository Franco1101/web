<?php
function ListadoRegalos( $vConexion) {
	
$ListadoRegalos=array();
   
	$SQL = "SELECT *
			FROM regalo R";
			
	//2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
    $rs = mysqli_query($vConexion, $SQL);
    
	$i=0;
    while ($data = mysqli_fetch_array($rs)) {
			$ListadoRegalos[$i]['NOMRegalo'] = $data['nom_regalo'];
			$i++;
    }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $ListadoRegalos;

}
?>