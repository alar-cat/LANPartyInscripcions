<!DOCTYPE html>
<?php
include "includes/conn.php";
include "includes/conf-games.php";
include "includes/functions.php";
?>
<html>
	<head>
		<title>Inscripció LAN Party Ripoll</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />
		<link rel="stylesheet" href="css/style.css" />

		<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/categories.js" async></script>

	</head>
	<body>

		<div class="container margin-v-big">
			<h1>Inscripció LAN Party Ripoll</h1>
			<h6>Data límit: 31 d'octubre.</h6>
			<h6>Total inscrits: <?=getInscrits($conn)?></h6>
			<h6>Preu:</h6>
			<h6>Per inscriure's a més d'una categoria torni a omplir el formulari modificant aquest camp.</h6>
			<h6>Tots els camps són obligatoris.</h6>
			<br>

		  <form method="post" action="input.php" id="inscripcions" name="inscripcions">
		  <h5>Nom:</h5>
	      <input type="text" name="nom" required>

	      <h5>Cognoms:</h5>
	      <input type="text" name="cognoms" required>

	      <h5>Àlies (nick):</h5>
	      <input type="text" name="nick" required>

	<!-- Inici data naixement -->
	      <h5>Data naixement:</h5>
				<h6>Els menors de 18 anys hauran d'entregar el <a href="https://www.lanpartyripoll.cat/autoritzaciomenors.pdf" target="_blank">full d'autorització</a> en arribar a la LAN Party.</h6>
	      <?=getData()?> <!-- Fa el mateix que obrir php i cridar echo funció -->
	<!-- Final data naixement -->

	      <h5>DNI:</h5>
	      <input type="text" name="dni" required>

	      <h5>Correu-e:</h5>
	      <input type="text" name="email" required>

	      <h5>Telèfon:</h5>
	      <input type="text" name="telefon" required>

	      <h5>Població:</h5>
	      <input type="text" name="poblacio" required>

	      <h5>Categoria:</h5>
	      <select id="cat" name="categoria" required>
					<option value="none" selected="selected">---</option>
	        <option value="CSGO">CS:GO</option>
	        <option value="FIFA16">FIFA16</option>
	        <option value="LoL">LoL</option>
	      </select>

<!-- Config CS:GO -->
	<?php
		$sql = mysqli_query($conn, "SELECT equip FROM inscripcions WHERE categoria='CSGO'");
		echo getCsgoConfig($sql);
	?>
<!-- Fi config CS:GO -->

<!-- Inici config LOL -->
	<?php
		$sql = mysqli_query($conn, "SELECT equip FROM inscripcions WHERE categoria='LoL'");
		echo getLolConfig($sql);
		mysqli_close($conn);
	?>
<!-- Fi config  LoL-->

				<br>
				<h5><input name="terms" required type="checkbox" > Accepto les <a href="http://www.lanpartyripoll.cat/reglament/" target="_blank">condicions de participació</a>.</h5>
				<br>
				<div>
					<input type="submit" value="Enviar">
					<input type="reset" value="Reiniciar" onClick="amaga();">

				</div>
			</form>
		</div>
	</body>
</html>
