<?php  

session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="Bootstrap-4-4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="DataTables-1.10.24/css/dataTables.bootstrap4.min.css"/>
	 
	<script type="text/javascript" src="jQuery-3.3.1/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>
<body class="" style="width: 100%;">
	<div class="bg-ligth" style="width: 100%;">
		<?php
		    include '../../../conf/conexion.php';
		     $sellac= "SELECT * FROM usuario WHERE email='$usuario'";
          $queryac=mysqli_query($conexion,$sellac);
          while($acceso = mysqli_fetch_array($queryac))
          {
		?>
		<div class="row justify-content-center" style="width: 100%;">
			<div class=" bg-light rounded my-2 mx-2 ml-1" style="width: 98%;padding: 20px 0px 20px 30px;">
				<h4 class="text-center text-dark pt-2">Personas</h4>
				<?php
				if ($acceso['login']==1) {
					echo '<button type="button" class="btn btn-success col-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
			       Nuevo
			    </button>';
				}
				?>
			    <?php  
			    	}
				?>

			      <!-- Nuevo Usuaario -->
			      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h5 class="modal-title" id="exampleModalLabel">Nuevo Persona</h5>
			              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			            </div>
			            <form action="agregarusuario.php" method="POST">
			              <div class="modal-body">
			                <div class="mb-3 form-check">
			                  <label for="exampleInputNombres" class="form-label">Nombres</label>
			                  <input type="text" class="form-control" name="nnombres" id="exampleInputNombres">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputApellidom" class="form-label">Apellido Paterno</label>
			                  <input type="text" class="form-control" name="napellidop" id="exampleInputApellidom">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputApellidop" class="form-label">Apellido Materno</label>
			                  <input type="text" class="form-control" name="napellidom" id="exampleInputApellidop">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputDni" class="form-label">DNI</label>
			                  <input type="text" class="form-control" name="ndni" id="exampleInputDni">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputFechanac" class="form-label">Fecha Nacimiento</label>
			                  <input type="date" class="form-control" name="nfechanac" id="exampleInputFechanac">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputTelefono" class="form-label">Teléfono</label>
			                  <input type="number" class="form-control" name="ntelefono" id="exampleInputTelefono">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputDireccion" class="form-label">Dirección</label>
			                  <input type="text" class="form-control" name="ndireccion" id="exampleInputDireccion">
			                </div>
			              </div>
			              <div class="modal-footer">
			                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			                <input type="submit" name="nuevo" class="btn btn-success" value="Agregar">
			              </div>
			            </form>
			          </div>
			        </div>
			      </div>
				<hr>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">N°</th>
				            <th scope="col">NOMBRES</th>
				            <th scope="col">APELLIDO PATERNO</th>
				            <th scope="col">APELLIDO MATERNO</th>
				            <th scope="col">DNI</th>
				            <th scope="col">FECHA NACIMIENTO</th>
				            <th scope="col">TELÉFONO</th>
				            <th scope="col">DIRECCIÓN</th>
				            <?php
				             $sellac= "SELECT * FROM usuario WHERE email='$usuario'";
          					$queryac=mysqli_query($conexion,$sellac);
					          while($acceso1 = mysqli_fetch_array($queryac))
					          {
							?>
							<?php
							if ($acceso1['login']==1) {
								echo '<th scope="col">MANTENIMIENTOS</th>';
							}
							?>
						    <?php  
						    	}
							?>
						</tr>
					</thead>
					<tbody>
						<?php
							$sqlbq="SELECT * FROM personas";
							$res=$conexion->query($sqlbq);
							while($row=$res->fetch_assoc()){ 
						?>
						<tr>
							<th scope="row"><?php echo $row['idpersona']; ?></th>
				            <td><?php echo $row['nombres']; ?></td>
				            <td><?php echo $row['apellido_pat']; ?></td>
				            <td><?php echo $row['apellido_mat']; ?></td>
				            <td><?php echo $row['dni']; ?></td>
				            <td><?php echo $row['fecha_nacimiento']; ?></td>
				            <td><?php echo $row['telefono']; ?></td>
				            <td><?php echo $row['direccion']; ?></td>
				            <?php
				             $sellac= "SELECT * FROM usuario WHERE email='$usuario'";
          					$queryac=mysqli_query($conexion,$sellac);
					          while($acceso2 = mysqli_fetch_array($queryac))
					          {
							?>
							<?php
							if ($acceso2['login']==1) {
								echo '<td>
				              <a href="modificarusuario.php?id=<?php echo $row[\'idpersona\']; ?>" class="btn btn-warning">
				                Editar
				              </a>
				              <a href="eliminarusuario.php?id=<?php echo $row[\'idpersona\']; ?>" class="btn btn-danger">
				                Eliminar
				              </a>
				            </td>';
							}
							?>
						    <?php  
						    	}
							?>
						</tr>
						<?php
							}  
						?>
					</tbody>	
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('table').DataTable({
				"language": idioma_espanol
			});
		})
		var idioma_espanol ={
		    "processing": "Procesando...",
		    "lengthMenu": "Mostrar _MENU_ registros",
		    "zeroRecords": "No se encontraron resultados",
		    "emptyTable": "Ningún dato disponible en esta tabla",
		    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
		    "search": "Buscar:",
		    "infoThousands": ",",
		    "loadingRecords": "Cargando...",
		    "paginate": {
		        "first": "Primero",
		        "last": "Último",
		        "next": "Siguiente",
		        "previous": "Anterior"
		    },
		    "aria": {
		        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
		        "sortDescending": ": Activar para ordenar la columna de manera descendente"
		    },
		    "buttons": {
		        "copy": "Copiar",
		        "colvis": "Visibilidad",
		        "collection": "Colección",
		        "colvisRestore": "Restaurar visibilidad",
		        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
		        "copySuccess": {
		            "1": "Copiada 1 fila al portapapeles",
		            "_": "Copiadas %d fila al portapapeles"
		        },
		        "copyTitle": "Copiar al portapapeles",
		        "csv": "CSV",
		        "excel": "Excel",
		        "pageLength": {
		            "-1": "Mostrar todas las filas",
		            "1": "Mostrar 1 fila",
		            "_": "Mostrar %d filas"
		        },
		        "pdf": "PDF",
		        "print": "Imprimir"
		    },
		    "autoFill": {
		        "cancel": "Cancelar",
		        "fill": "Rellene todas las celdas con <i>%d<\/i>",
		        "fillHorizontal": "Rellenar celdas horizontalmente",
		        "fillVertical": "Rellenar celdas verticalmentemente"
		    },
		    "decimal": ",",
		    "searchBuilder": {
		        "add": "Añadir condición",
		        "button": {
		            "0": "Constructor de búsqueda",
		            "_": "Constructor de búsqueda (%d)"
		        },
		        "clearAll": "Borrar todo",
		        "condition": "Condición",
		        "conditions": {
		            "date": {
		                "after": "Despues",
		                "before": "Antes",
		                "between": "Entre",
		                "empty": "Vacío",
		                "equals": "Igual a",
		                "notBetween": "No entre",
		                "notEmpty": "No Vacio",
		                "not": "Diferente de"
		            },
		            "number": {
		                "between": "Entre",
		                "empty": "Vacio",
		                "equals": "Igual a",
		                "gt": "Mayor a",
		                "gte": "Mayor o igual a",
		                "lt": "Menor que",
		                "lte": "Menor o igual que",
		                "notBetween": "No entre",
		                "notEmpty": "No vacío",
		                "not": "Diferente de"
		            },
		            "string": {
		                "contains": "Contiene",
		                "empty": "Vacío",
		                "endsWith": "Termina en",
		                "equals": "Igual a",
		                "notEmpty": "No Vacio",
		                "startsWith": "Empieza con",
		                "not": "Diferente de"
		            },
		            "array": {
		                "not": "Diferente de",
		                "equals": "Igual",
		                "empty": "Vacío",
		                "contains": "Contiene",
		                "notEmpty": "No Vacío",
		                "without": "Sin"
		            }
		        },
		        "data": "Data",
		        "deleteTitle": "Eliminar regla de filtrado",
		        "leftTitle": "Criterios anulados",
		        "logicAnd": "Y",
		        "logicOr": "O",
		        "rightTitle": "Criterios de sangría",
		        "title": {
		            "0": "Constructor de búsqueda",
		            "_": "Constructor de búsqueda (%d)"
		        },
		        "value": "Valor"
		    },
		    "searchPanes": {
		        "clearMessage": "Borrar todo",
		        "collapse": {
		            "0": "Paneles de búsqueda",
		            "_": "Paneles de búsqueda (%d)"
		        },
		        "count": "{total}",
		        "countFiltered": "{shown} ({total})",
		        "emptyPanes": "Sin paneles de búsqueda",
		        "loadMessage": "Cargando paneles de búsqueda",
		        "title": "Filtros Activos - %d"
		    },
		    "select": {
		        "1": "%d fila seleccionada",
		        "_": "%d filas seleccionadas",
		        "cells": {
		            "1": "1 celda seleccionada",
		            "_": "$d celdas seleccionadas"
		        },
		        "columns": {
		            "1": "1 columna seleccionada",
		            "_": "%d columnas seleccionadas"
		        }
		    },
		    "thousands": ".",
		    "datetime": {
		        "previous": "Anterior",
		        "next": "Proximo",
		        "hours": "Horas",
		        "minutes": "Minutos",
		        "seconds": "Segundos",
		        "unknown": "-",
		        "amPm": [
		            "am",
		            "pm"
		        ]
		    },
		    "editor": {
		        "close": "Cerrar",
		        "create": {
		            "button": "Nuevo",
		            "title": "Crear Nuevo Registro",
		            "submit": "Crear"
		        },
		        "edit": {
		            "button": "Editar",
		            "title": "Editar Registro",
		            "submit": "Actualizar"
		        },
		        "remove": {
		            "button": "Eliminar",
		            "title": "Eliminar Registro",
		            "submit": "Eliminar",
		            "confirm": {
		                "_": "¿Está seguro que desea eliminar %d filas?",
		                "1": "¿Está seguro que desea eliminar 1 fila?"
		            }
		        },
		        "error": {
		            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
		        },
		        "multi": {
		            "title": "Múltiples Valores",
		            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
		            "restore": "Deshacer Cambios",
		            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
		        }
		    },
		    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
		}  
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>