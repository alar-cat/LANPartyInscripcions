function amaga() {
			$("#CSGO").hide();
			$("#LoL").hide();
    		$("#Overwatch").hide();
			$("#nou").hide();
			$("#nouLoL").hide();
    		$("#nouOverwatch").hide();
		    }
		    amaga();
		
			var anterior = "#" + $("#cat option:selected").val();
			$(anterior).show();
			var actual = "";

			$("#cat").change(function() {
				$("#nou").hide();
				$("#nouLoL").hide();
                $("#nouOverwatch").hide();
				$("#equipCSGOmulti").val("---");
				$("#equipLoLmulti").val("---");
                $("#equipOverwatchmulti").val("---");
                actual = "#" + $("#cat option:selected").val();

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

			var anterior3 = "#" + $("#equipOverwatchmulti option:selected").val();
			$(anterior3).show();
			var actual3 = "";

			$("#equipOverwatchmulti").change(function() {
    		actual3 = "#" + $("#equipOverwatchmulti option:selected").val();

    		$(anterior3).hide();
    		$(actual3).show();
    		anterior3 = actual3;
    		actual3 = "";

			});
