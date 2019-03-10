<?php
function getEquips($sql) {
    $equips = array();
    while ($row = $sql->fetch_assoc()) {
        if (!in_array($row['equip'],$equips) && ($row['equip'] != '---')) {
            $equips[] = $row['equip'];
        }
    }

    $config = '<div id="equips">
	<h5>Equip:</h5>
	<h6>Sisplau, no t\'inscriguis a un equip que no sigui el teu.</h6>
	<select id="equipMulti" name="equipMulti" required>
	<option value="---" selected="selected">---</option>
	<option value="nou">Crea un equip nou</option>';

    foreach ($equips as $equip) {
        $config .= '<option value="'.$equip.'">'.$equip.'</option>';
    }

    $config .= '</select>
		</div>

	<div id="nou">
	<h5>Nom del nou equip:</h5>
	<input type="text" name="equipC">
	</div>';

    return $config;
}
