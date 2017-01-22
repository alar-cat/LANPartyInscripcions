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
				$("#equipCSGOmulti").val("---");
				$("#equipLoLmulti").val("---");
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
