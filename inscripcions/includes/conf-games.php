<?php

function getCsgoConfig($sql) {

	$csgo = array();
	while ($row = $sql->fetch_assoc()) {
		if (!in_array($row['equip'],$csgo)) {
			$csgo[] = $row['equip'];
		}
	}

	$csgoconfig = '<div id="CSGO">
	<h5>Equip CS:GO:</h5>
	<h6>Sisplau, no t\'inscriguis a un equip que no sigui el teu.</h6>
	<select id="equipCSGOmulti" name="equipCSGOmulti" required>
	<option value="nou">Crea un equip nou</option>
	<option selected="selected">---</option>';

	foreach ($csgo as $equip) {
		$csgoconfig .= '<option value="'. $equip .' ">' . $equip . '</option>';
	}

	$csgoconfig .= '</select>
		</div>

	<div id="nou">
	<h5>Nom del nou equip CS:GO:</h5>
	<input type="text" name="equipCSGO">
	</div>';

	return $csgoconfig;
}

function getLolConfig($sql) {

	$lol = array();
	while ($row = $sql->fetch_assoc()) {
		if (!in_array($row['equip'],$lol)) {
			$lol[] = $row['equip'];
		}
	}

	$lolconfig = '<div id="LoL">
		<h5>Clan:</h5>
		<h6>Sisplau, no t\'inscriguis a un clan que no sigui el teu.</h6>
		<select id="equipLoLmulti" name="equipLoLmulti" required>
		<option value="nouLoL">Crea un clan nou</option>
		<option selected="selected">---</option>';

		foreach ($lol as $equip) {
			$lolconfig .= '<option value="'. $equip .' ">' . $equip . '</option>';
		}

		$lolconfig .= '</select>
		</div>
		<div id="nouLoL">
		<h5>Nom del nou clan:</h5>
		<input type="text" name="equipLoL">
		</div>';

		return $lolconfig;
}
