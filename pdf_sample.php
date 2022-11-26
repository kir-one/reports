<!--
Created by                 
 Yb  db  dP.d88 8d8b. 
  YbdPYbdP 8  8 8P Y8 
   YP  YP  `Y88 8   8 
-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css"/>
        <title>project_unam</title>
    </head>
    <body>
	<?php
	
		// define variables
		$id_def = $_GET['valueID'];
		$fechaInicial_def = '2021-01-01';
		$fechaFinal_def = '2021-12-31';
			
		// string connection
        $server = mysqli_connect("localhost", "root", "Donut.38", "unam");
		
		if 
		(!$server->set_charset("utf8")) {
			echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
		}
						
		$query_k = query_creator(0);
        $result =  $server->query($query_k);
		
		if($result->num_rows>0): //  bring nam3
			echo "
			<main>
			<div class='row border-bottom'>
			<div  class='container'>
				<img src='./img/logo.jpg' style='th:200px; max-width:130px; float: left;'/>
				<img src='./img/logo.jpg' style='width:200px; max-width:130px; float: right;'/>
				<h3 class='col-lg-3 sz' style='font-family: mermaid;'>Instituto de Investigación de Materiales</h3>
				<h4 class='col-lg-3 sz' style='font-family: mermaid;'>UNAM</h4>
				<h4 class='col-lg-3 sz' style='font-family: mermaid;'>".$result->fetch_array()["nam3"]."</h4>
			</div>
			</div>";
		endif;
		
		
		//---------------------------#
        //      REPORTS SECTION 		
		//---------------------------#
		
		$query_I = query_creator(1);
        $result =  $server->query($query_I);
		
		if($result->num_rows>0) //  draw apoyo1nv
		{
			echo"
			<div id='help'>
			<h2 class='col-lg-3 sz'><b>Apoyo a la Investigación</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>DESCRIPCIÓN</th>
					<th class='title_k'>FECHA</th>
					<th class='title_k'>TIPO</th>
					<th class='title_k'>AGRADEC.</th> 
					<th style='border-right: 2px solid #ece79c !important;'>NIVEL</th> 
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td width=377px style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["descripcion"]."</td>
					<td style= 'text-align: center;'>".$var_fila["anio"]."</td>							
					<td style= 'text-align: center;'>".$var_fila["tipo"]."</td>
					<td style= 'text-align: center;'>".$var_fila["agradecimiento"]."</td>				
					<td style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["nivel"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='2' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='3' class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
							
		//< %-----------------------------------------% >
		
		$query_II = query_creator(2);
        $result =  $server->query($query_II);
		
		if($result->num_rows>0) //  draw arti¢ulo
		{
			echo"			
			<div id='article'> 
			<h2 class='col-lg-3 sz'><b>Artículos</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>FECHA</th>
					<th class='title_k'>DOI</th>
					<th class='title_k'>CITAS</th> 
					<th style='border-right: 2px solid #ece79c !important;'>ESTATUS</th> 
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td width=236px style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
					<td style= 'text-align: center;'>".$var_fila["anio"]."</td>							
					<td style= 'text-align: left;'>".$var_fila["doi"]."</td>
					<td width=38px style= 'text-align: center;'>".$var_fila["citas"]."</td>				
					<td style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["estado"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='3' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
					
		//< %-----------------------------------------% >
		$query_III = query_creator(3);
        $result =  $server->query($query_III);
		
		if($result->num_rows>0) //  draw arti¢uloDiv
		{
			echo"
			<div id='disclosure'>
			<h2 class='col-lg-3 sz'><b>Artículos de Divulgación</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>FECHA</th>
					<th style='border-right: 2px solid #ece79c !important;'>REVISTA</th> 
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
					<td width=88px style= 'text-align: center;'>".$var_fila["anio"]."</td>				
					<td style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["revista"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='2' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td  class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
							
		//< %-----------------------------------------% >
		
		$query_IV = query_creator(4);
        $result =  $server->query($query_IV);
		
		if($result->num_rows>0) //  draw c@pitule
		{
			echo"			
			<div id='chapter'> 
			<h2 class='col-lg-3 sz'><b>Capítulo de Libro</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>FECHA</th>
					<th class='title_k'>EDIT.</th>
					<th class='title_k'>AUTOR</th>
					<th class='title_k'>PAGS.</th>
					<th class='title_k'>LIBRO</th>
					<th style='border-right: 2px solid #ece79c !important;'>ESTATUS</th> 
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
					<td style= 'text-align: center;'>".$var_fila["anio"]."</td>
					<td style= 'text-align: center;'>".$var_fila["editorial"]."</td>				
					<td style= 'text-align: left;'>".$var_fila["autor"]."</td>				
					<td style= 'text-align: center;'>".$var_fila["paginas"]."</td>				
					<td width=147px style= 'text-align: left;'>".$var_fila["libro"]."</td>								
					<td style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["estado"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='5' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
				
		//< %-----------------------------------------% >
		
		$query_V = query_creator(5);
        $result =  $server->query($query_V);
		
		if($result->num_rows>0) //  draw cuerpoCo£
		{
			echo"			
			<div id='body'> 
			<h2 class='col-lg-3 sz'><b>Cuerpos Colegiados</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>LUGAR</th>
					<th class='title_k'>ACTIVIDAD</th>
					<th class='title_k'>INICIO</th>
					<th style='border-right: 2px solid #ece79c !important;'>TÉRMINO</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td width=188px style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
					<td width=49px style= 'text-align: center;'>".$var_fila["lugar"]."</td>
					<td width=238px style= 'text-align: left;'>".$var_fila["actividad"]."</td>				
					<td style= 'text-align: center;'>".$var_fila["inicio"]."</td>											
					<td style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["final"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='3' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
				
		//< %-----------------------------------------% >
		
		$query_VI = query_creator(6);
        $result =  $server->query($query_VI);
		
		if($result->num_rows>0) //  draw cursø
		{
			echo"			
			<div id='course'> 
			<h2 class='col-lg-3 sz'><b>Cursos</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>INSTITUCIÓN</th>
					<th class='title_k'>SEM</th>
					<th class='title_k'>HORA</th>
					<th class='title_k'>TIPO</th>
					<th class='title_k'>INICIO</th>
					<th class='title_k'>TERMINO</th>
					<th class='title_k'># AA</th>
					<th class='title_k'>AÑO</th>
					<th style='border-right: 2px solid #1e3689 !important;'>GRADO</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
					<td style= 'text-align: center;'>".$var_fila["institucion"]."</td>
					<td width=38px style= 'text-align: center;'>".$var_fila["semestre"]."</td>	
					<td width=38px style= 'text-align: center;'>".$var_fila["hora"]."</td>		
					<td width=49px style= 'text-align: left;'>".$var_fila["tipo"]."</td>		
					<td width=58px style= 'text-align: center;'>".$var_fila["inicio"]."</td>		
					<td width=58px style= 'text-align: center;'>".$var_fila["final"]."</td>		
					<td style= 'text-align: center;'>".$var_fila["noalumno"]."</td>					
					<td style= 'text-align: center;'>".$var_fila["anio"]."</td>											
					<td width=48px style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["grado"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='7' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='3' class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
				
		//< %-----------------------------------------% >
			
		$query_VII = query_creator(7);
        $result =  $server->query($query_VII);
		
		if($result->num_rows>0) //  draw desarrollo7ec
		{
			echo"
			<div id='develop'> 
			<h2 class='col-lg-3 sz'><b>Desarrollo Tecnológico</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th style='title_k'>DESCIRPCIÓN</th>
					<th class='title_k'>FECHA</th>
					<th style='border-right: 2px solid #ece79c !important;'>DETALLES ADICIONALES</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["descripcion"]."</td>
					<td style= 'text-align: center;'>".$var_fila["anio"]."</td>			
					<td style= 'text-align: left; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["detalles"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='2' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
		
		//< %-----------------------------------------% >
			
		$query_VIII = query_creator(8);
        $result =  $server->query($query_VIII);
		
		if($result->num_rows>0) //  draw estudiantes
		{
			echo"
			<div id='students'> 
			<h2 class='col-lg-3 sz'><b>Estudiantes</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th style='title_k'>NOMBRES</th>
					<th class='title_k'>APELLIDOS</th>
					<th class='title_k'>NIVEL</th>
					<th class='title_k'>SITUACIÓN</th>
					<th class='title_k'>FECHA</th>
					<th class='title_k'>INICIO</th>
					<th class='title_k'>TÉRMINO</th>
					<th style='border-right: 2px solid #ece79c !important;'>COTUTOR</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
					<td style= 'text-align: left;'>".$var_fila["apellido"]."</td>
					<td style= 'text-align: center;'>".$var_fila["nivel"]."</td>			
					<td style= 'text-align: center;'>".$var_fila["situacion"]."</td>			
					<td style= 'text-align: center;'>".$var_fila["fecha"]."</td>			
					<td style= 'text-align: center;'>".$var_fila["inicio"]."</td>			
					<td style= 'text-align: center;'>".$var_fila["final"]."</td>						
					<td style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["cotutor"]."</td>				
				</tr>";	
			}	
			
			echo "<tr>
					<td colspan='5' style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='3' class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
				
		//< %-----------------------------------------% >
				
		$query_IX = query_creator(9);
        $result =  $server->query($query_IX);
		
		if($result->num_rows>0) //  draw estimul0s
		{
			echo"
			<div id='stimulus'> 
			<h2 class='col-lg-3 sz'><b>Estímulos</b></h2>
			<table style='width: 482px ' align = 'center'> 
				<tr>
					<th class='title_k'>ESTÍMULO</th>
					<th style='border-right: 2px solid #1e3689 !important;'>FECHA</th> 
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "<tr>
						<td style='text-align:center; border-left: 2px solid #f7f7f7 !important;'>".$var_fila["estimulo"]."</td>
						<td style= 'text-align:center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["anio"]."</td>
					</tr>";	
			}	
			
			echo "<tr>
					<td style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}
							
		//< %-----------------------------------------% >
		
		$query_X = query_creator(10);		
        $result =  $server->query($query_X);
    		
		if($result->num_rows>0)	//  draw evento$ 
		{
			echo"
			<div id = 'events'> 
			<h2 class='col-lg-3 sz'><b>Eventos</b></h2>	
			<table style='width: 682px; ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>TIPO</th>
					<th class='title_k'>PART.</th>
					<th class='title_k'>TÍTULO</th>
					<th style='border-right: 2px solid #ece79c !important;'>FECHA</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["evento"]."</td> 
					<td width=50px style= 'text-align: center;'>".$var_fila["tipoEvento"]."</td> 
					<td width=55px style= 'text-align: center;'>".$var_fila["tipoParticipacion"]."</td>
					<td style='text-align: left;'>".$var_fila["titulo"]."</td> 	
					<td width=50px style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["anio"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td colspan='3' style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";		
		}
		
		//< %-----------------------------------------% >
		
		$query_XIII = query_creator(13);		
        $result =  $server->query($query_XIII);
    		
		if($result->num_rows>0)	//  draw libr0
		{
			echo"
			<div id = 'book'> 
			<h2 class='col-lg-3 sz'><b>Libro</b></h2>	
			<table style='width: 682px; ' align = 'center'>
				<tr> 
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>FECHA</th>
					<th style='border-right: 2px solid #ece79c !important;'>EDITORIAL</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td> 
					<td width=90px style= 'text-align: center;'>".$var_fila["anio"]."</td> 
					<td width=110px style= 'text-align:center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["editorial"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";
		}
				
		//< %-----------------------------------------% >
		
		$query_XIV = query_creator(14);		
        $result =  $server->query($query_XIV);
    		
		if($result->num_rows>0)	//  draw m4terial 
		{
			echo"
			<div id = 'matter'> 
			<h2 class='col-lg-3 sz'><b>Material Didáctico</b></h2>	
			<table style='width: 582px; ' align = 'center'>
				<tr> 
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>FECHA</th>
					<th style='border-right: 2px solid #ece79c !important;'>LUGAR</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td> 
					<td width=100px style= 'text-align: center;'>".$var_fila["anio"]."</td> 
					<td width=160px style= 'text-align:center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["lugar"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td colspan='2' style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";
		}
				
		//< %-----------------------------------------% >
		
		$query_XV = query_creator(15);		
        $result =  $server->query($query_XV);
    		
		if($result->num_rows>0)	//  draw m€morias 
		{
			echo"
			<div id = 'memory'> 
			<h2 class='col-lg-3 sz'><b>Memorias en Extenso</b></h2>	
			<table style='width: 682px; ' align = 'center'>
				<tr> 
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>LUGAR</th>
					<th style='border-right: 2px solid #ece79c !important;'>FECHA</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td> 
					<td width=220px style= 'text-align: center;'>".$var_fila["lugar"]."</td> 
					<td width=100px style= 'text-align:center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["anio"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";
		}
				
		//< %-----------------------------------------% >
		
		$query_XVI = query_creator(16);		
        $result =  $server->query($query_XVI);
    		
		if($result->num_rows>0)	//  draw o₺rasActs 
		{
			echo"
			<div id = 'other'> 
			<h2 class='col-lg-3 sz'><b>Otras Actividades</b></h2>	
			<table style='width: 582px; ' align = 'center'>
				<tr> 
					<th class='title_k'>DESCIRPCIÓN</th>
					<th class='title_k'>FECHA</th>
					<th style='border-right: 2px solid #ece79c !important;'>TIPO</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["descripcion"]."</td> 
					<td width=99px style= 'text-align: center;'>".$var_fila["anio"]."</td> 
					<td width=88px style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["tipo"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";
		}
		
		//< %-----------------------------------------% >
		
		$query_XVII = query_creator(17);		
        $result =  $server->query($query_XVII);
    		
		if($result->num_rows>0)	//  draw ₱atentes 
		{
			echo"
			<div id = 'patent'> 
			<h2 class='col-lg-3 sz'><b>Patentes</b></h2>	
			<table style='width: 682px; ' align = 'center'>
				<tr> 
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>FECHA</th>
					<th class='title_k'>EXPEDIENTE</th>
					<th style='border-right: 2px solid #1e3689 !important;'>ESTATUS</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td> 
					<td width=99px style= 'text-align: center;'>".$var_fila["anio"]."</td>  
					<td width=99px style= 'text-align: center;'>".$var_fila["expediente"]."</td> 
					<td width=93px style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["estado"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td colspan='2' style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";
		}
	
		//< %-----------------------------------------% >
		
		$query_XVIII = query_creator(18);		
        $result =  $server->query($query_XVIII);
    		
		if($result->num_rows>0)	//  draw ₱remios
		{
			echo"
			<div id = 'prices'> 
			<h2 class='col-lg-3 sz'><b>Premios</b></h2>	
			<table style='width: 682px; ' align = 'center'>
				<tr> 
					<th class='title_k'>NOMBRE</th>
					<th class='title_k'>DESCRIPCION</th>
					<th class='title_k'>TIPO</th>
					<th style='border-right: 2px solid #1e3689 !important;'>FECHA</th>
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "
				<tr>
					<td style='text-align: text-left;border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td> 
					<td width=288px style= 'text-align: left;'>".$var_fila["descripcion"]."</td>  
					<td style= 'text-align: center;'>".$var_fila["tipo"]."</td> 
					<td width=99px style= 'text-align: center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["fecha"]."</td> 
				</tr>";		
			}
				
			echo "<tr>
					<td colspan='2' style = 'background-color:#ffffff; border-left: 3px solid white !important; border-bottom: 2px solid white !important;'/>
					<td colspan='2' class='total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div> </main>";	
		}
		else
		{
			//echo "N/A";
		}
				
		//< %-----------------------------------------% >
				
		$query_XIX = query_creator(19);
        $result =  $server->query($query_XIX);
		
		if($result->num_rows>0) //  draw re₽orteTec
		{
			echo"
			<div id='report'> 
			<h2 class='col-lg-3 sz'><b>Reportes Técnicos</b></h2>
			<table style='width: 682px ' align = 'center'> 
				<tr>
					<th class='title_k'>NOMBRE</th>
					<th style='border-right: 2px solid #1e3689 !important;'>FECHA</th> 
				</tr>";
		
			while ($var_fila=$result->fetch_array())
			{
				echo "<tr>
						<td style='text-align:left; border-left: 2px solid #f7f7f7 !important;'>".$var_fila["nombre"]."</td>
						<td width=92px style= 'text-align:center; border-right: 2px solid #f7f7f7 !important;'>".$var_fila["anio"]."</td>
					</tr>";	
			}	
			
			echo "<tr>
					<td style = 'background-color:#ffffff; border-left: 2px solid white !important; border-bottom: 2px solid white !important;'/>
					<td  class= 'total' >TOTAL: $result->num_rows</th>				
				</tr>	
			</table> </div>";
		}
		
		else {
			//do nothing
		}

		$server->close();
		
		//---------------------------#
		//       QUERY SECTION
		//---------------------------#
		
		function query_creator ($query_ID)
		{
			// set parameters --> such umportant
			$id = $GLOBALS['id_def'];
			$fechaInicial = $GLOBALS['fechaInicial_def'];
			$fechaFinal = $GLOBALS['fechaFinal_def'];
			
			// nombreInv
			if ($query_ID == 0){
				$query_template = "select CONCAT(NOMBRES, ' ', APELLIDOS) nam3 from investigador 
				where IDINV = $id";
			}
			// apoyoInv		
			else if ($query_ID == 1){
				$query_template = "select a.DESCRIPCION descripcion, IFNULL(DATE_FORMAT(a.ANIO, '%d/%m/%Y'), 'Sin fecha') anio, t.nombre tipo, IFNULL(tt.nombre, 'No aplica') agradecimiento, IFNULL(n.NOMBRE, 'N/A') nivel from apoyoinves as a
				  left join tipoapoyoinv t on a.TIPOAPOYOINV_IDTIPOAPOYOINV = t.IDTIPOAPOYOINV
				  left join tipoagra tt on a.TIPOAGRA_IDTIPOAGRA = tt.IDTIPOAGRA
                  left join nivelagra n on a.NIVELAGRA_IDNIVELAGRA = n.IDNIVELAGRA
				  where a.INVESTIGADOR_IDINV = $id
				  and a.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}
			// articulos
			else if ($query_ID == 2){
				$query_template = "select a.NOMBRE nombre, DATE_FORMAT(a.ANIO, '%d/%m/%Y') anio, a.DOI doi, IFNULL(a.CITAS, '0') citas, e.ESTADO estado from articulo as a
				  left join estado e on a.ESTADO_IDESTADO = e.IDESTADO
				  where a.INVESTIGADOR_IDINV = $id
				  and a.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}
			// articulosDiv
			else if ($query_ID == 3){
				$query_template = "select a.NOMBRE nombre, DATE_FORMAT(a.ANIO, '%d/%m/%Y') anio, IFNULL(a.REVISTA, 'Sin revista') revista from articulosdivulgacion as a
				  where a.INVESTIGADOR_IDINV = $id
				  and a.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}				
			// capituloLibro
			else if ($query_ID == 4){
				$query_template = "select c.NOMBRE nombre, DATE_FORMAT(c.ANIO, '%d/%m/%Y') anio, REPLACE(IFNULL(c.EDITORIAL, 'N/A'), 'NULL', 'N/A') editorial, IFNULL(c.autores, 'Desconocido') autor, IFNULL(c.PAGINAS, '-') paginas, SUBSTRING_INDEX(IFNULL(c.LIBRO, 'Sin título'), '. E', 1)  libro, IFNULL(e.ESTADOCAP, 'Sin dato') estado from capitulolibro as c
				  left join estadocap e on c.ESTADOCAP_IDESTCAP = e.IDESTCAP
                  where c.INVESTIGADOR_IDINV = $id
				  and c.ANIO between '$fechaInicial' and '$fechaFinal'
				order by nombre";
			}			
			// cuerpoCol
			else if ($query_ID == 5){
				$query_template = "select c.CUERPO nombre, c.LUGARCC lugar, SUBSTRING_INDEX(IFNULL(c.ACTIVIDAD, ''),'. ', 2) actividad, DATE_FORMAT(c.FECHAINICIO, '%d/%m/%Y') inicio, IFNULL(DATE_FORMAT(c.FECHATERMINO, '%d/%m/%Y'), '-') final from cuerposcolegiados as c 
				  where c.INVESTIGADOR_IDINV = $id
				order by inicio";
			}
			// cursos
			else if ($query_ID == 6){
				$query_template = "select c.NOMBRE nombre, i.NOMBRE institucion, REPLACE(IFNULL(c.SEMESTRE, '-'), 'NULL', '-') semestre, IFNULL(c.HORAS, '0.00') hora , IFNULL(t.NOMBRE, 'Sin tipo') tipo,  IFNULL(DATE_FORMAT(c.FECHAINICIO, '%d/%m/%Y'), '-') inicio, IFNULL(DATE_FORMAT(c.FECHATERMINO, '%d/%m/%Y'), '-') final, IFNULL(c.NOALUMNOS, '0') noalumno, IFNULL(c.ANIOINFORME, '') anio, g.NOMDG grado from curso as c 
				  left join gradodocencia g on c.GRADODOCENCIA_IDDG = g.IDDG
				  left join institucion i on c.INSTITUCION_IDINST = i.IDINST
				  left join tipo t on c.TIPO_IDTIPO = t.IDTIPO
				  where c.INVESTIGADOR_IDINV = $id
				order by inicio";
			}				
			// desarrollloTec
			else if ($query_ID == 7){
				$query_template = "select d.DESCRIPCION descripcion, DATE_FORMAT(d.ANIO, '%d/%m/%Y') anio, IFNULL(d.DETALLES, 'Sin detalle') detalles from desarrollotec as d
				  where d.INVESTIGADOR_IDINV = $id
				  and d.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}
			// estudiantes
			else if ($query_ID == 8){
				$query_template = "select e.NOMBRES nombre, e.APELLIDOS apellido, n.NIVEL nivel, s.SITUACION situacion, IFNULL(e.FECHAGRADO, '-') fecha , IFNULL(DATE_FORMAT(e.INICIOVIGENCIA, '%d/%m/%Y'), '-') inicio, IFNULL(DATE_FORMAT(e.TERMINOVIGENCIA, '%d/%m/%Y'), '-') final, IFNULL(e.COTUTOR, 'Sin dato') cotutor from estudiante as e
				  left join nivel n on e.NIVEL_IDNIVEL = n.IDNIVEL
                  left join situacion s on e.SITUACION_IDSIT = s.IDSIT
				  where e.INVESTIGADOR_IDINV = $id
				order by fecha";			
			}
			// estimulos
			else if ($query_ID == 9){
				$query_template = "select e.ESTIMULO estimulo, DATE_FORMAT(e.ANIO, '%d/%m/%Y') anio from estimulos as e
				  where e.INVESTIGADOR_IDINV = $id
				  and e.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}				
			// eventos
			else if ($query_ID == 10){
				$query_template = "select e.EVENTO evento, REPLACE (te.NOMBRETIPOEVENTO, 'í', '&iacute;') tipoEvento, tp.NOMBRETP tipoParticipacion, SUBSTRING_INDEX(REPLACE(e.TITULO, 'ó', '&oacute;'), '.', 1) as titulo, DATE_FORMAT(e.ANIOEVEN, '%d/%m/%Y') anio from eventos as e
				  left join tipoevento te on e.TIPOEVENTO_IDTIPOEVENTO = te.IDTIPOEVENTO 
				  left join tipoparticipacion tp on e.TIPOPARTICIPACION_IDTIPOPARTICIPACION = tp.IDTIPOPARTICIPACION
				  where e.INVESTIGADOR_IDINV = $id
				  and e.ANIOEVEN between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}
			// infraestructura
			
			// interAcademico
			
			// libro
			else if ($query_ID == 13){
				$query_template = "select l.NOMBRE nombre, IFNULL(DATE_FORMAT(l.ANIO, '%d/%m/%Y'), 'Sin fecha') anio, REPLACE(l.EDITORIAL, 'NULL', 'N/A') editorial from libro as l
				  where l.INVESTIGADOR_IDINV = $id
				  and l.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}	
			// material
			else if ($query_ID == 14){
				$query_template = "select m.NOMBREMD nombre, DATE_FORMAT(m.ANIO, '%d/%m/%Y') anio, m.LUGARMD lugar from materialdidactico as m
				  where m.INVESTIGADOR_IDINV = $id
				  and m.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}
			// memorias
			else if ($query_ID == 15){
				$query_template = "select m.NOMBREM nombre, m.LUGAR lugar, DATE_FORMAT(m.ANIO, '%d/%m/%Y') anio from memoriasextenso as m
				  where m.INVESTIGADOR_IDINV = $id
				  and m.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}
			// otrasActs
			else if ($query_ID == 16){
				$query_template = "select o.DESCRIPCIONOA descripcion, DATE_FORMAT(o.ANIOOA, '%d/%m/%Y') anio, t.NOMOA tipo from otrasactividades as o
				  left join tipootrasactividades t on o.TIPOOTRASACTIVIDADES_IDTIPOOA = t.IDTIPOOA
                  where o.INVESTIGADOR_IDINV = $id
				  and o.ANIOOA between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}	
			// patente
			else if ($query_ID == 17){
				$query_template = "select p.NOMBRE nombre, DATE_FORMAT(p.ANIO, '%d/%m/%Y') anio, REPLACE(p.EXPENDIENTE, 'NULL', 'pendiente') expediente, IFNULL(e.PATNOMBRE, 'N/A') estado from patente as p
				  left join estadopat e on p.ESTADOPAT_IDESTPAT = e.IDESTPAT
                  where p.INVESTIGADOR_IDINV = $id
				  and p.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}	
			// premios
			else if ($query_ID == 18){
				$query_template = "select p.NOMBREPRE nombre, REPLACE(IFNULL(p.DESCRIPCIONPRE, 'Sin descripción'), 'NULL', 'Sin descripción') descripcion, t.PREMIOST tipo, DATE_FORMAT(p.FECHAPR, '%d/%m/%Y') fecha from premios as p
 				  left join tipopremios t on p.TIPOPREMIOS_IDTIPOPREMIOS = t.IDTIPOPREMIOS
				  where p.INVESTIGADOR_IDINV = $id
				  and p.FECHAPR between '$fechaInicial' and '$fechaFinal'
				order by fecha";
			}			
			// reportez
			else if ($query_ID == 19){
				$query_template = "select r.NOMBRERP nombre, IFNULL(DATE_FORMAT(r.ANIO, '%d/%m/%Y'), '-') anio from reportestecnicos as r
				  where r.INVESTIGADOR_IDINV = $id
				  and r.ANIO between '$fechaInicial' and '$fechaFinal'
				order by anio";
			}	
			// sinodal
			
			// tranfeTecno
			
			// tutorias
			
			// servTecnicos

			return $query_template;
		}
	?>    
	<footer>
	<!--	-->	
	</footer>							
    </body>
	
</html>

<script type='text/javascript'>
	$(function(){
		//$('#events').remove();
		//stimulus
		//help
		//article
		//disclosure
		//chapter
		//body
		//course
		//develop
		//
	})
</script>
