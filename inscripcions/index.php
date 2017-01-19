<!DOCTYPE html>
<?php
include "conn.php";
include "conf-games.php";
?>
<html>
	<head>
		<title>Inscripció LAN Party Ripoll</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />

		<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<!-- Millor posar els estils a un document a part. -->
		<style type="text/css">
		.margin-v-small {
			margin-top: 5px;
			margin-bottom: 5px;
		}
		.margin-v-med {
			margin-top: 30px;
			margin-bottom: 30px;
		}
		.margin-v-big {
			margin-top: 75px;
			margin-bottom: 75px;
		}
		.no-h-padding {
			padding-right: 0;
			padding-left: 0;
		}
		</style>
	</head>
	<body>
		<?php
			$rowSQL = mysqli_query($conn, "SELECT MAX(id) AS max FROM inscripcions");
			$resultat = mysqli_fetch_array($rowSQL);
			$inscrits = $resultat['max'];
	  ?>

		<div class="container margin-v-big">
			<h1>Inscripció LAN Party Ripoll</h1>
			<h6>Data límit: 31 d'octubre.</h6>
			<h6>Total inscrits: <?php echo $inscrits; ?></h6>
			<h6>Tots els camps són obligatoris.</h6>
			<br>

			<?php

				$dies = range(1,31);
				$mesos = range(1,12);
				$anys = range(2016,1900);

			 ?>
			
		  <form method="post" action="input.php" id="inscripcions" name="inscripcions">
		  <h5>Nom:</h5>
	      <input type="text" name="nom" required>

	      <h5>Cognoms:</h5>
	      <input type="text" name="cognoms" required>

	      <h5>Nick:</h5>
			<h6>Nom d'usuari que utilitzes al joc.</h6>
	      <input type="text" name="nick" required>

	<!-- Inici data naixement -->
	      <h5>Data naixement:</h5>
			<h6>Els menors de 18 anys hauran d'entregar el <a href="http://www.lanpartyripoll.cat/autoritzaciomenors.pdf" target="_blank">full d'autorització</a> en arribar a la LAN Party.</h6>
	      <select name="dianaixement" required>
	        <option selected="selected">---</option>

	        <?php
	          foreach ($dies as $dia) {
	        ?>

	        <option value=<?php echo $dia; ?>><?php echo $dia; }?></option>
	      </select>

	      <select name="mesnaixement" required>
	        <option selected="selected">---</option>
	        <?php
	          foreach ($mesos as $mes) {
	        ?>
	        <option value=<?php echo $mes; ?>><?php echo $mes; }?></option>
	      </select>

	      <select name="anynaixement" required>
	        <option selected="selected">---</option>
	        <?php
	          foreach ($anys as $any) {
	        ?>
	          <option value=<?php echo $any; ?>><?php echo $any; }?></option>
	      </select>
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
	/*
	Després, jo borraria les altres i ho posaria tot en funcions dintre del conf-games.php, com a l'exemple del csgo.

	et deixo l'exemple, tmb, de <?=?>. Fa el mateix que un <?php echo ;?>

	*/ ?>
	
	<?=getCsgoConfig($sql)?>
	
<!-- Fi config CS:GO -->

<!-- Inici config LOL -->

				<div id="LoL">
					<?php
						$lol = array();
						$sql = mysqli_query($conn, "SELECT equip FROM inscripcions WHERE categoria='LoL'");
						while ($row = $sql->fetch_assoc()) {
							if (!in_array($row['equip'],$lol)) {
								$lol[] = $row['equip'];
							}
						}
						mysqli_close($conn);
					?>
					<h5>Clan:</h5>
					<select id="equipLoLmulti" name="equipLoLmulti" required>
						<option value="nouLoL">Crea un clan nou</option>
	          <option selected="selected">---</option>
	          <?php
	            foreach ($lol as $equip) {
	          ?>
	            <option value="<?php echo $equip; ?>"><?php echo $equip; }?></option>
	        </select>
				</div>
				<div id="nouLoL">
					<h5>Nom del nou clan:</h5>
		      <input type="text" name="equipLoL">
				</div>
<!-- Fi config  LoL-->

				<br>
				<h5><input name="terms" required type="checkbox" > Accepto les <a href="http://www.lanpartyripoll.cat/reglament/" target="_blank">condicions de participació</a>.</h5>
				<br>
				<div>
					<input type="submit" value="Enviar"></input>
					<input type="reset" value="Reiniciar" onClick="amaga();">
					
				</div>
			</form>
		</div>

		<script type="text/javascript">
			function amaga() {
			$("#CSGO").hide();
			$("#LoL").hide();
			$("#nou").hide();
			$("#nouLoL").hide();
		    }
		    amaga();
		
			var anterior = "#" + $("#cat option:selected").val();
			$(anterior).show();
			var actual = "";

			$("#cat").change(function() {
				$("#nou").hide();
				$("#nouLoL").hide();
				actual = "#" + $("#cat option:selected").val();
				$("#equipCSGOmulti").val("---");
				$("#equipLoLmulti").val("---");

				$(anterior).hide();
				$(actual).show();
				anterior = actual;
				actual = "";
			});

			var	anterior1 = "#" + $("#equipCSGOmulti option:selected").val();
			$(anterior1).show();
			var actual1 = "";

			$("#equipCSGOmulti").change(function() {
				actual1 = "#" + $("#equipCSGOmulti option:selected").val();

				$(anterior1).hide();
				$(actual1).show();
				anterior1 = actual1;
				actual1 = "";

			});

			var anterior2 = "#" + $("#equipLoLmulti option:selected").val();
			$(anterior2).show();
			var actual2 = "";

			$("#equipLoLmulti").change(function() {
				actual2 = "#" + $("#equipLoLmulti option:selected").val();

				$(anterior2).hide();
				$(actual2).show();
				anterior2 = actual2;
				actual2 = "";

			});


		</script>
	</body>
</html>

