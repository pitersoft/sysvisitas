<?php  

	session_start();
	include '../../../conf/conexion.php';
	$usuario = $_SESSION['username'];
	if(!isset($usuario)){
	  header("location: login.php");
	}

	include '../../../libraries.php';
?>





	<div class="bg-ligth" style="width: 100%;">
		<?php
          $sellac= "SELECT * FROM usuario WHERE email='$usuario'";
          $queryac=mysqli_query($conexion,$sellac);
          while($acceso = mysqli_fetch_array($queryac))
          {
		?>
		<div class="row justify-content-center" style="width: 100%;">
			<div class=" bg-light rounded my-2 mx-2 ml-1" style="width: 98%;padding: 20px 0px 20px 30px;">
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
				<h4 class="text-center text-dark pt-2">Permisos</h4>
			    <div style="width: 100%;">
				<div style="width: 100%;display: flex;flex-direction: row;justify-content: space-around;"> 	
				

			      <!-- Nuevo Usuaario -->
			      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h5 class="modal-title" id="exampleModalLabel">Nuevo Nivel</h5>
			              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: none;">X</button>
			            </div>
			            <form action="agregar.php" method="POST">
			              <div class="modal-body">
			                <div class="mb-3 form-check">
			                  <label for="exampleInputNombre1" class="form-label">Nombre</label>
			                  <input type="text" class="form-control" name="nnivel" id="exampleInputNombre1">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputApellidos1" class="form-label">Descripci??n</label>
			                  <textarea type="text" class="form-control" name="ndescripcion" id="exampleInputApellidos1"></textarea>
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputEstado1" class="form-label">Estado</label>
			                  <select class="form-control" name="nestado" id="exampleInputEstado1">
			                    <option value="0"> Deshabilitado </option>
			                    <option value="1"> Habilitado </option>
			                  </select>
			                </div>
			              </div>
			              <div class="modal-footer">
			                <input type="submit" name="agregarnivel" class="btn btn-success" value="Agregar">
			                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			              </div>
			            </form>
			          </div>
			        </div>
			      </div>
				</div>
				<hr>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
				            <th scope="col">NIVEL</th>
				            <th scope="col">DESCRIPCI??N</th>
				            <th scope="col">ESTADO</th>	
				        
				        <?php
				             $sellac= "SELECT * FROM usuario WHERE email='$usuario'";
          					$queryac=mysqli_query($conexion,$sellac);
					          while($acceso1 = mysqli_fetch_array($queryac))
					          {
							
												if ($acceso1['login']==1) {
													echo '<th scope="col">ACCIONES</th>';
												}

						    		}
								?>

						</tr>
					</thead>
					<tbody>
						<?php
							$sqlbq="SELECT * FROM niveles";
							$res=$conexion->query($sqlbq);
							while($row=$res->fetch_assoc()){ 
						?>
						<tr>
							<th scope="row"><?php echo $row['idnivel']; ?></th>
				            <td><?php echo $row['nivel']; ?></td>
				            <td><?php echo $row['descripcion']; ?></td>
				            <td><?php $es=$row['estado'];
				                if ($es==true){
				                echo "Habilitado";
				                }else{
				                echo "Deshabilitado";
				                } ?>
				            </td>
				      <?php
				             $sellac= "SELECT * FROM usuario WHERE email='$usuario'";
          					$queryac=mysqli_query($conexion,$sellac);
					          while($acceso2 = mysqli_fetch_array($queryac))
					          {

											if ($acceso2['login']==1) {
							?>
							<td>
							  <a href="nuevopermiso.php?id=<?php echo $row['idnivel']; ?>" class="btn btn-secondary">
				                <i class="bi bi-file-lock2-fill"></i>
				              </a>
				              <a href="modificar.php?id=<?php echo $row['idnivel']; ?>" class="btn btn-warning">
				                Editar
				              </a>
				              <a href="eliminar.php?id=<?php echo $row['idnivel']; ?>" class="btn btn-danger">
				                Eliminar
				              </a>
				            </td>
				      <?php
											}

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
		    "emptyTable": "Ning??n dato disponible en esta tabla",
		    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
		    "search": "Buscar:",
		    "infoThousands": ",",
		    "loadingRecords": "Cargando...",
		    "paginate": {
		        "first": "Primero",
		        "last": "??ltimo",
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
		        "collection": "Colecci??n",
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
		        "add": "A??adir condici??n",
		        "button": {
		            "0": "Constructor de b??squeda",
		            "_": "Constructor de b??squeda (%d)"
		        },
		        "clearAll": "Borrar todo",
		        "condition": "Condici??n",
		        "conditions": {
		            "date": {
		                "after": "Despues",
		                "before": "Antes",
		                "between": "Entre",
		                "empty": "Vac??o",
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
		                "notEmpty": "No vac??o",
		                "not": "Diferente de"
		            },
		            "string": {
		                "contains": "Contiene",
		                "empty": "Vac??o",
		                "endsWith": "Termina en",
		                "equals": "Igual a",
		                "notEmpty": "No Vacio",
		                "startsWith": "Empieza con",
		                "not": "Diferente de"
		            },
		            "array": {
		                "not": "Diferente de",
		                "equals": "Igual",
		                "empty": "Vac??o",
		                "contains": "Contiene",
		                "notEmpty": "No Vac??o",
		                "without": "Sin"
		            }
		        },
		        "data": "Data",
		        "deleteTitle": "Eliminar regla de filtrado",
		        "leftTitle": "Criterios anulados",
		        "logicAnd": "Y",
		        "logicOr": "O",
		        "rightTitle": "Criterios de sangr??a",
		        "title": {
		            "0": "Constructor de b??squeda",
		            "_": "Constructor de b??squeda (%d)"
		        },
		        "value": "Valor"
		    },
		    "searchPanes": {
		        "clearMessage": "Borrar todo",
		        "collapse": {
		            "0": "Paneles de b??squeda",
		            "_": "Paneles de b??squeda (%d)"
		        },
		        "count": "{total}",
		        "countFiltered": "{shown} ({total})",
		        "emptyPanes": "Sin paneles de b??squeda",
		        "loadMessage": "Cargando paneles de b??squeda",
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
		                "_": "??Est?? seguro que desea eliminar %d filas?",
		                "1": "??Est?? seguro que desea eliminar 1 fila?"
		            }
		        },
		        "error": {
		            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">M??s informaci??n&lt;\\\/a&gt;).<\/a>"
		        },
		        "multi": {
		            "title": "M??ltiples Valores",
		            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aqu??, de lo contrario conservar??n sus valores individuales.",
		            "restore": "Deshacer Cambios",
		            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
		        }
		    },
		    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
		}  
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
