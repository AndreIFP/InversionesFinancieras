<?php 

	$conexion=mysqli_connect('localhost','root','','prueba');
	$sql="SELECT id,nombre from t_paises";
	$result=mysqli_query($conexion,$sql);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="select2/select2.min.css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>
</head>
<body>
	<section style="text-align: center;">
		<select id="controlBuscador" style="width: 50%">
			<?php while ($ver=mysqli_fetch_row($result)) {?>

			<option value="<?php echo $ver[0] ?>">
				<?php echo $ver[1] ?>
			</option>

			<?php  }?>
		</select>
	</section>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>