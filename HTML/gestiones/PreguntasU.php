<!-- -----------------------------------------------------------------------
	    Universidad Nacional Autonoma de Honduras (UNAH)
		           Facultad de Ciencias Economicas
	        Departamento de Informatica administrativa
        Analisis, Programacion y Evaluacion de Sistemas
                    Primer Periodo 2022


Equipo:
Allan Mauricio Hernández ...... (mauricio.galindo@unah.hn)
Andrés Isaías Flores .......... (aifloresp@unah.hn)
Esperanza Lisseth Cartagena ... (esperanza.cartagena@unah.hn)
Fanny Merari Ventura .......... (fmventura@unah.hn
José David García ............. (jdgarciad@unah.hn)
José Luis Martínez ............ (jlmartinezo@unah.hn)
Luis Steven Vásquez ........... (Lsvasquez@unah.hn)
Sara Raquel Ortiz ............. (Sortizm@unah.hn)

Catedratico:
LIC. CLAUDIA REGINA NUÑEZ GALINDO
Lic. GIANCARLO MARTINI SCALICI AGUILAR
Lic. KARLA MELISA GARCIA PINEDA 

----------------------------------------------------------------------

Programa:          PreguntasU
Fecha:             16-jul-2022
Programador:       Andrés
descripcion:       Menu

-----------------------------------------------------------------------

                Historial de Cambio

-----------------------------------------------------------------------

Programador               Fecha                      Descripcion
Andrés	        01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Allan		        01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
Esperanza		    01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
José		        01-oct-2022 al 01-dic-2022   	Etiqueta y validacion
----------------------------------------------------------------------- -->

<?php
include("../conexion.php");

?>
<?php include 'barralateralinicial.php';?>
  </div>
  <title>Gestion Preguntas Usuario</title>
           <div class="container mt-12">
                  <div class="col-md-12">
                     <h1>PREGUNTAS</h1> 
                     <a href="Nueva_Preguntas.php"><input type="submit" class="btn btn-primary btn-block" Value="Crear Preguntas"></a><p>
                     <form action="Buscador_Preguntas.php" method="get" class="form_search">
                            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" size=40>
                            <input type="submit" value="Buscar" class="btn_search">
                     </form>

                     <table class="table">
                        <thead class="table-succees table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Preguntas</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                //Paginador
			                    $sql_registe = mysqli_query($conn,"SELECT COUNT(*) as total_registro FROM tbl_preguntas WHERE Id_Preguntas = Id_Preguntas ");
			                    $result_register = mysqli_fetch_array($sql_registe);
			                    $total_registro = $result_register['total_registro'];

			                    $por_pagina = 10;

                                if(empty($_GET['pagina']))
                                {
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];
                                }

                                $desde = ($pagina-1) * $por_pagina;
                                $total_paginas = ceil($total_registro / $por_pagina);
                                    $sql = mysqli_query($conn,"select * FROM tbl_preguntas LIMIT $desde,$por_pagina ");
                                    mysqli_close($conn);

			                        $result = mysqli_num_rows($sql);
                                    if($result > 0){
                                    while($row=mysqli_fetch_array($sql)){
                                ?>
                                     <tr>
                                        <th><?php echo $row['Id_Preguntas']?></th>
                                        <th><?php echo $row['Preguntas']?></th>
                                        <th><a href="Actualizar_Preguntas.php?Id=<?php echo $row['Id_Preguntas'] ?>"class="btn btn-primary" >Editar</a></th><p>
                                        <th><a href="Delete_Preguntas.php?Id=<?php echo $row['Id_Preguntas'] ?>"class="btn btn-danger">Eliminar</a></th><p>
                                    </tr>
                                <?php
                                       }
                                    }
                                ?>
                        </tbody>
                      </table>
                      <div class="paginador">
			            <ul>
			            <?php 
				        if($pagina != 1)
				        {
			            ?>
				        <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				        <li><a href="?pagina=<?php echo $pagina-1; ?>">Ant</a></li>
			            <?php 
				        }
				        for ($i=1; $i <= $total_paginas; $i++) { 
					    # code...
					    if($i == $pagina)
					    {
						echo '<li class="pageSelected">'.$i.'</li>';
					    }else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					    }
				        }

				        if($pagina != $total_paginas)
				        {  
			            ?>
				        <li><a href="?pagina=<?php echo $pagina + 1; ?>">Sig</a></li>
				        <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			            <?php } ?>
			            </ul>
		                </div>
                        <div class="reportes">
                            <a class="btn btn-warning" href="Reporte_Preguntas.php" >Reporte</a>
                        </div>
                  </div>
           </div>
    </body>

     <style type="text/css">
        .paginador ul{
        padding: 15px;
        list-style: none;
        background: #FFF;
        margin-top: 15px;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-end;
        }
      .paginador a, .pageSelected{
        color: #428bca;
        border: 1px solid #ddd;
        padding: 5px;
        display: inline-block;
        font-size: 14px;
        text-align: center;
        width: 35px;
      }
      .paginador a:hover{
        background: #ddd;
     }
      .pageSelected{
        color: #FFF;
        background: #428bca;
        border: 1px solid #428bca;
    }
    /*============ Buscador ============*/
.form_search{
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	float: right;
	background: initial;
	padding: 10px;
	border-radius: 10px;
}
.form_search .btn_search{
	background: #1faac8;
	color: #FFF;
	padding: 0 20px;
	border: 0;
	cursor: pointer;
	margin-left: 10px;
}
</style>

</section>
<?php include 'barralateralfinal.php';?>