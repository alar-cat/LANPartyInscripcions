<?php

function getCsgoConfig($sql)
{
	$csgo = array();
	
	while ($row = $sql->fetch_assoc()) {
		if (!in_array($row['equip'],$csgo)) {
			$csgo[] = $row['equip'];
		}
	}

	$csgoconfig = '<div id="CSGO">
	<h5>Equip CS:GO:</h5>
	<select>
	<option value="nou">Crea un equip nou</option>
	<option selected="selected">---</option>';

	foreach ($csgo as $equip) {
		$csgoconfig .= '<option value="'. $equip.' ">' . $equip . '</option>';
	}

	$csgoconfig .= '</select>
		</div>

	<div id="nou">
	<h5>Nom del nou equip CS:GO:</h5>
	<input type="text" name="equipCSGO">
	</div>';

	return $csgoconfig;
}