<?php

require_once 'funciones/conexion.php';
$MiConexion=ConexionBD();
$Mensaje='';

/**-----------    LISTAR REGALOS ELEGIDOS   --------------------**/
require_once 'funciones/listado_regalos.php';
$Listado_Regalos = ListadoRegalos( $MiConexion);
$CantidadRegalos = count($Listado_Regalos);

/**-----------------    REGISTRAR REGALO   -------------------**/
require_once 'funciones/registrar_Regalo.php';
require_once 'funciones/validacion_Regalos.php';
if (!empty($_POST['registrar'])) {
    //estoy en condiciones de poder validar los datos
    $Mensaje=Validar_Regalo($_POST['regalo'], $MiConexion);
    if (empty($Mensaje)) {
        if (Registrar_Regalo( $MiConexion) != false) {
            $Mensaje = 'El regalo se guardo correctamente.';
        }else{
			$Mensaje = 'Error al guardar el regalo.';
		}
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Baby de Marti</title>
	<!-- Estilos bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
		  rel="stylesheet" 
		  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
		  crossorigin="anonymous">
	<!-- Estilos propios -->
	<link href="estilos/estilos.css" rel="stylesheet" type="text/css" >
</head>
<body>
	<div class="fondo">
		<div class="text-center p-2">
			<H1 class="mt-4 mb-4">Baby Martina</H1>
		</div>
		
		<div class="container">
			<div class="container">
			<div class="row p-2">
			<div class="col-12">
				<div id="carousel" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-inner">
					<div class="carousel-item active">
					  <img src="imagenes/tef1.jpg" class="d-block w-100 rounded-4" alt="foto1" width="80%" style="max-width:500px;">
					</div>
					<div class="carousel-item">
					  <img src="imagenes/tef2.jpg" class="d-block w-100 rounded-4" alt="foto2" width="80%" style="max-width:500px;">
					</div>
					<div class="carousel-item">
					  <img src="imagenes/tef9.jpg" class="d-block w-100 rounded-4" alt="foto2" width="80%" style="max-width:500px;">
					</div>
				  </div>
				  
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				  </button>
				</div>		
			</div>
			</div>
			</div>
			
			<div class="container">
			<div class="row p-2">
				<div class="col-12">
					<div class="text-center mx-2">
						<label for="exampleFormControlInput1" 
							   class="form-label">Elegir un regalo para recibir un beb&eacute; puede ser difícil porque hay muchas buenas opciones.</label>			
					</div>
					
					<form role="FORM" method="POST">						
						<div class="row">
							<div class="col-12">
							
								<div class="btn-group col-12 mb-2">									
									<div class="input-group">
									  <select class="form-select" 
											  id="inputGroupSelect04">
										<option selected>Sugerencias</option>
										<option value="1">Mamadera -NUK-</option>
										<option value="2">Cepillo para mamaderas</option>
										<option value="3">Pañales -Talle P-Estrella o Baby Set</option>
										<option value="4">Ropita m&aacute;s 3meses</option>
										<option value="5">Ba&ntilde;era</option>
										<option value="6">Set corta u&ntilde;as</option>
										<option value="7">Toallones</option>
										<option value="8">Oleo -Estrella- Algod&oacute;n</option>
									  </select>
									</div>
								</div>
								
								<?php if (empty($Mensaje)){?>	
								  <div class="bs-component text-center">
									<div class="alert alert-dismissible alert-info">												
									  <strong>Puede agregar un regalo que no este en la lista</strong>												
									</div>
								  </div>
								<?php } else { ?>		
								  <div class="bs-component text-center">
									<div class="alert alert-dismissible alert-warning">
									  <strong><?php echo $Mensaje; ?></strong>
									</div>
								  </div>
								<?php }?>
								
								<input class="form-control form-control-lg mb-2" 
									   type="text"
									   name="regalo"	
									   id="regalo"
									   placeholder=".un poco entre todos hace un monton " 
									   aria-label=".form-control-sm example"
									   autofocus>
								<button type="submit" 
										class="btn btn-primary mb-3 col-12"
										value="registrar"
										name="registrar">Guardar</button>

								<br>								
							</div>
						</div>
					</form>
					
					<label class="control-label">Listado de regalos:</label>
					<ul class="list-group opacity-50">
					<?php for ($i=0; $i<$CantidadRegalos; $i++){ ?>
					  <li class="list-group-item"><b><?php echo $Listado_Regalos[$i]['NOMRegalo']; ?></b></li>
					<?php } ?>
					</ul>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<!-- JavaScript bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
			integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
			crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
			integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
			crossorigin="anonymous"></script>

</body>
</html>