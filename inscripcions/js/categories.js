function amaga() {
			$("#equips").hide();
			$("#nou").hide();
    		$("#equipMulti").val("---");
}
amaga();

var actual = "";

$("#cat").change(function() {

	actual = $("#cat :selected").val();

    if (actual == "CSGO" || actual == "LoL") {
        $("#equips").show();
    }
    else {
        amaga();
    }
});

$("#equipMulti").change(function() {

    actual = $("#equipMulti :selected").val();

    if (actual == "nou") {
    	$("#nou").show();
	}
	else {
        $("#nou").hide();
	}
});