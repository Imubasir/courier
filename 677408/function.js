jQuery(document).ready(function($) {
	getData ();
})

function getData () {

	//------------------------ Overal Parcels Taken----------------------------

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_parcel'
		},

		success: function (json) {
			jQuery("#general_daily_parcel").html(json);
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'weekly_parcel'
		},
		
		success: function (json) {
			jQuery("#general_weekly_parcel").html(json);
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'monthly_parcel'
		},
		
		success: function (json) {			
			jQuery("#general_monthly_parcel").html(json);
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'yearly_parcel'
		},

		success: function (json) {
			jQuery("#general_yearly_parcel").html(json);
		}
	})


	//------------------------ Overal Payments Taken----------------------------


	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'daily_payment'
		},

		success: function (json) {
			jQuery("#general_daily_payment").html((new Number(json)).toFixed(2));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'weekly_payment'
		},
		
		success: function (json) {
			jQuery("#general_weekly_payment").html((new Number(json)).toFixed(2));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'monthly_payment'
		},
		
		success: function (json) {			
			jQuery("#general_monthly_payment").html((new Number(json)).toFixed(2));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'yearly_payment'
		},

		success: function (json) {
			jQuery("#general_yearly_payment").html((new Number(json)).toFixed(2));
		}
	})

	//------------------------ Branch Parcels Taken----------------------------

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'accra_daily_parcel'
		},

		success: function (json) {
			jQuery("#accra_daily_parcel").html(json);
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'kumasi_daily_parcel'
		},
		
		success: function (json) {
			jQuery("#kumasi_daily_parcel").html(json);
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'takoradi_daily_parcel'
		},
		
		success: function (json) {			
			jQuery("#takoradi_daily_parcel").html(json);
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'tamale_daily_parcel'
		},

		success: function (json) {
			jQuery("#tamale_daily_parcel").html(json);
		}
	})

	//------------------------ Branch Payment Taken----------------------------

		jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'accra_daily_payment'
		},

		success: function (json) {
			jQuery("#accra_daily_payment").html((new Number(json)).toFixed(2));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'kumasi_daily_payment'
		},
		
		success: function (json) {
			jQuery("#kumasi_daily_payment").html((new Number(json)).toFixed(2));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'takoradi_daily_payment'
		},
		
		success: function (json) {			
			jQuery("#takoradi_daily_payment").html((new Number(json)).toFixed(2));
		}
	})

	jQuery.ajax({
		type: 'POST',
		url: 'getData.php',
		data: {
			'type': 'tamale_daily_payment'
		},

		success: function (json) {
			jQuery("#tamale_daily_payment").html((new Number(json)).toFixed(2));
		}
	})
}