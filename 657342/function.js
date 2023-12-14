jQuery(document).ready(function($){

	$(document).ready(function () {
		// loadManifest ();

	})

})

function loadTracking () {
	var parcelcode = jQuery("input[name=search_code]").val();
	jQuery.ajax({
		type: 'POST',
		url: 'loadTracking.php',
		data: {
			'parcelcode':parcelcode
		},

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			var stage_array = new Array();
			for (var i = 0; i < data.length; i++) {
				stage_array.push(data[i].stage);
			}
			console.log(stage_array);
				if(stage_array.includes("1")) {
					jQuery("#stage_one").addClass("active");
					jQuery("#stage_two").removeClass("active");
					jQuery("#stage_three").removeClass("active");
					jQuery("#stage_four").removeClass("active");
					jQuery("#stage_five").removeClass("active");
				}

				if(stage_array.includes("2")) {
					jQuery("#stage_one").addClass("active");
					jQuery("#stage_two").addClass("active");
					jQuery("#stage_three").removeClass("active");
					jQuery("#stage_four").removeClass("active");
					jQuery("#stage_five").removeClass("active");
				}

				if(stage_array.includes("3")) {
					jQuery("#stage_one").addClass("active");
					jQuery("#stage_two").addClass("active");
					jQuery("#stage_three").addClass("active");
					jQuery("#stage_four").removeClass("active");
					jQuery("#stage_five").removeClass("active");
				}

				if(stage_array.includes("4")) {
					jQuery("#stage_one").addClass("active");
					jQuery("#stage_two").addClass("active");
					jQuery("#stage_three").addClass("active");
					jQuery("#stage_four").addClass("active");
					jQuery("#stage_five").removeClass("active");
				}

				if(stage_array.includes("5")) {
					jQuery("#stage_one").addClass("active");
					jQuery("#stage_two").addClass("active");
					jQuery("#stage_three").addClass("active");
					jQuery("#stage_four").addClass("active");
					jQuery("#stage_five").addClass("active");

				}
		}
	})
}