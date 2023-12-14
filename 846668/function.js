jQuery(document).ready(function($){

	$(document).ready(function () {
		document.getElementById("radioCash").addEventListener("click", function () {
			document.getElementById("balance_div").style.display = 'block';
		})

		document.getElementById("radioMomo").addEventListener("click", function () {
			document.getElementById("balance_div").style.display = 'none';
		})

		document.getElementById("radioVisa").addEventListener("click", function () {
			document.getElementById("balance_div").style.display = 'none';
		})

	})

})

function checkChange(amount) {

}

function search() {
	// preventDefault();
	var formdata = jQuery("input[name=parcel_code]").val();
	var weight = 0;
	var amount = 0;

	jQuery.ajax({
		type: 'POST',
		url: 'search.php',
		data: {
			'p_code': formdata
		},

		success: function (json) {
			// console.log(json);
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var parcel_code = data[i].parcel_code;
				var parcel_type = data[i].parcel_type;
				var content_descr = data[i].content_descr;
				var no_items = data[i].no_items;
				var weight = new Number(data[i].weight);
				var volume = new Number(data[i].volume);
				if(weight > volume) {
					weight = weight;
				} else {
					weight = volume;
				}
				var amount = new Number(data[i].bill_amount);
				var insurance = data[i].insurance;
				var value_of_item = new Number(data[i].value_of_item);
				if(value_of_item == '') {
					value_of_item = 'N/A';
					jQuery("#value_of_item").html(value_of_item);
				} else {
					jQuery("#value_of_item").html("GH&#8373; "+value_of_item.toFixed(2));
				}

				jQuery("#parcel_type").html(parcel_type);
				jQuery("#content_descr").html(content_descr);
				jQuery("#no_items").html(no_items);
				jQuery("#weight").html(weight.toFixed(2)+" (Kg)");
				jQuery("#amount").html("GH&#8373; "+amount.toFixed(2)+" (OVERDUE COST)");
				jQuery("#t_amount").html("GH&#8373; "+amount.toFixed(2));
				jQuery("#insurance").html(insurance);

			}

			document.getElementById("received").addEventListener("keyup", function () {
				var received = jQuery("#received").val();
				var change = new Number(received) - amount;
				jQuery("#change").html(change.toFixed(2));

			})

			jQuery("#paymentBtn").off("click").on("click", function () {
				payment (parcel_code);
			})
		}
	})
}

function payment (p_code) {

	if(jQuery("input[type='radio'][name=pay_method]").is(":checked")) {
		var pay_method = document.querySelector("input[type='radio'][name=pay_method]:checked").value;
		jQuery.ajax({
			type: 'POST',
			url: 'payment.php',
			data: {
				'p_code': p_code,
				'pay_method': pay_method
			},

			beforeSend: function() {
				jQuery("#paymentBtn").html('<img src="../images/loading.gif" width="20px">');
			},

			success: function (responseText) {
				jQuery("#paymentBtn").html("Confirm Payment");
				if(responseText == '1') {
					toastr.success("Payment Complete");
					jQuery("input[name=amount_received]").val("");
					jQuery("#parcel_type").html("");
					jQuery("#content_descr").html("");
					jQuery("#no_items").html("");
					jQuery("#weight").html("");
					jQuery("#amount").html("");
					jQuery("#t_amount").html("");
					jQuery("#insurance").html("");
					jQuery("#value_of_item").html("");
					jQuery("#change").html("");
					jQuery("#pay_form").trigger("reset");
				} else if (responseText == '2') {
					toastr.info("Payment Already Confirmed");
				} else if (responseText == '3') {
					toastr.error("No Bill Set");
				} else {
					toastr.error("Payment Error. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	} else {
		toastr.info("Select Payment Method");
	}
	

}