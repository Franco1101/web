<?php
function Validar_Regalo( $vNomRegalo, $MiConexion) {	

$vMensaje='';

$ListadoRegalos=array();

	$SQL = "SELECT *
			FROM regalo";
			 
	$rs = mysqli_query($MiConexion, $SQL);
	
	$i=0;
	while ($data = mysqli_fetch_array($rs)) {
			$ListadoRegalos['$i']['NOMRegalo']  = $data['nom_regalo'];
			$i++;
    }
	
	$CantRegalos=count($ListadoRegalos);
	
	for($i=0; $i < $CantRegalos; $i++){
		if($_POST['regalo']==$ListadoRegalos['$i']['NOMRegalo']) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
			$vMensaje='Ese regalo ya se eligio. <br />';
		}
	}
	
	if(empty($_POST['regalo'])) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        $vMensaje='Debe ingresar un nombre. <br />';
	}

	return $vMensaje;
}
?>