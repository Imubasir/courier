jQuery(document).ready(function($) {
	getData ();
})

function getData () {

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_manifest'
		},

		success: function (json) {
			var results = json.split("*");

			jQuery("#general_daily_manifest").html(new Number(results[0]));
			jQuery("#daily_dispatch").html(new Number(results[1]));
			jQuery("#daily_pending").html(new Number(results[2]));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'weekly_manifest'
		},
		
		success: function (json) {
			var results = json.split("*");

			jQuery("#general_weekly_manifest").html(new Number(results[0]));
			jQuery("#weekly_dispatch").html(new Number(results[1]));
			jQuery("#weekly_pending").html(new Number(results[2]));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'monthly_manifest'
		},
		
		success: function (json) {
			var results = json.split("*");

			jQuery("#general_monthly_manifest").html(new Number(results[0]));
			jQuery("#monthly_dispatch").html(new Number(results[1]));
			jQuery("#monthly_pending").html(new Number(results[2]));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'yearly_manifest'
		},

		success: function (json) {
			var results = json.split("*");

			jQuery("#general_yearly_manifest").html(new Number(results[0]));
			jQuery("#yearly_dispatch").html(new Number(results[1]));
			jQuery("#yearly_pending").html(new Number(results[2]));
		}
	})

	// -------Stations-----

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_manifest_accra'
		},

		success: function (json) {
			var results = json.split("*");

			jQuery("#general_daily_manifest_accra").html(new Number(results[0]));
			jQuery("#daily_dispatch_accra").html(new Number(results[1]));
			jQuery("#daily_pending_accra").html(new Number(results[2]));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_manifest_kumasi'
		},
		
		success: function (json) {
			var results = json.split("*");

			jQuery("#general_daily_manifest_kumasi").html(new Number(results[0]));
			jQuery("#daily_dispatch_kumasi").html(new Number(results[1]));
			jQuery("#daily_pending_kumasi").html(new Number(results[2]));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_manifest_takoradi'
		},
		
		success: function (json) {
			var results = json.split("*");

			jQuery("#general_daily_manifest_takoradi").html(new Number(results[0]));
			jQuery("#daily_dispatch_takoradi").html(new Number(results[1]));
			jQuery("#daily_pending_takoradi").html(new Number(results[2]));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_manifest_tamale'
		},

		success: function (json) {
			var results = json.split("*");

			jQuery("#general_daily_manifest_tamale").html(new Number(results[0]));
			jQuery("#daily_dispatch_tamale").html(new Number(results[1]));
			jQuery("#daily_pending_tamale").html(new Number(results[2]));
		}
	})
}