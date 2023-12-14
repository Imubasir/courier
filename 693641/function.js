jQuery(document).ready(function($){
	$(document).ready(function() {
		$('.sigPad').signaturePad();
	});

	document.getElementById("proxy_check").addEventListener("change", function() {
		var elem = document.getElementById("proxy_check");
		if(elem.checked == true) {
			document.getElementById("proxy_form").style.display = 'block';
		} else {
			document.getElementById("proxy_form").style.display = 'none';
		}
	})

})

function search () {
	var code = jQuery("input[name=code]").val();

	jQuery.ajax({
		type: 'POST',
		url: 'search.php',
		data: {
			'code': code
		},

		success: function (json) {
			var data = JSON.parse(json);
			if(data.length != 0) {

				for (var i = 0; i < data.length; i++) {
					var assign_status = data[i].assign_status;
					var parcel_type = data[i].parcel_type;
					var sender_name = data[i].sender_name;
					var recipient_name = data[i].recipient_name;
					var recipient_telephone = data[i].recipient_telephone;
					var pay_method = data[i].pay_method;

					if(assign_status == '3') {
						jQuery("#parcel_status").html(": PARCEL DELIVERED <sup><a href='#!' onclick='viewDelivered(\""+code+"\")'>View Details</a></sup>");
						jQuery("#issueBtn").attr("disabled", true);
					} else if (assign_status == '2') {
						jQuery("#parcel_status").html(": PARCEL AVAILABLE");
						jQuery("#issueBtn").attr("disabled", false);
					} else if (assign_status == '6') {
						jQuery("#parcel_status").html(": PARCEL AVAILABLE");
						jQuery("#issueBtn").attr("disabled", false);
					} else if (assign_status == '7') {
						jQuery("#parcel_status").html(": RETURNED PARCEL DELIVERED <sup><a href='#!' onclick='viewDelivered(\""+code+"\")'>View Details</a></sup>");
						jQuery("#issueBtn").attr("disabled", true);
					}
					 else {
						jQuery("#parcel_status").html(": PARCEL NOT AVAILABLE");
						jQuery("#issueBtn").attr("disabled", true);
					} 

					jQuery("#parcel_type").html(": "+parcel_type);
					jQuery("#sender_name").html(": "+sender_name);
					jQuery("#recipient_name").html(": "+recipient_name);
					jQuery("#recipient_telephone").html(": "+recipient_telephone);
				}

			} else {
				toastr.info("Item Not Found");
			}

			jQuery("#issueBtn").off("click").on("click", function () {
				var status = checkReturnPayment(code);
				if(status == '1') {
					var formdata = new FormData();

					var output = jQuery("input[name=output]").val();
					var name = jQuery("input[name=name]").val();

					formdata.append("code", code);
					formdata.append("signature", output);
					formdata.append("name", name);

					var elem = document.getElementById("proxy_check");
					if(elem.checked == true) {
						var proxy_name = jQuery("input[name=proxy_name]").val();
						var proxy_address = jQuery("textarea[name=proxy_address]").val();
						var proxy_id = jQuery("input[name=proxy_id]").val();

						formdata.append("proxy_check", 'true');
						formdata.append("proxy_name", proxy_name);
						formdata.append("proxy_id", proxy_id);
						formdata.append("proxy_address", proxy_address);
					} else {
						formdata.append("proxy_check", 'false');
					}

					jQuery.ajax({
						type: 'POST',
						url: 'issue.php',
						data: formdata,
						cache: false,
						processData: false,
						contentType: false,

						success: function (responseText) {
							console.log(responseText);
							if(responseText == '1') {
								toastr.success("Item Issued");
								jQuery("#parcel_type").html(": "+parcel_type);
								jQuery("#sender_name").html(": "+sender_name);
								jQuery("#recipient_name").html(": "+recipient_name);
								jQuery("#recipient_telephone").html(": "+recipient_telephone);
							} else {
								toastr.error("Issue Error. Please Contact your Administrator");
								write_internal_error(responseText);
							}
						}
					})
				} else {
					toastr.error(status);
				}

			})
		}
	})
}

function viewDelivered (code) {
	jQuery("#detail").modal("show");

	jQuery.ajax({
		type: 'POST',
		url: 'deliveryDetail.php',
		data: {
			'p_code': code
		},

		success: function (json) {
			var data = JSON.parse(json);
			if(data.length != 0) {
				for (var i = 0; i < data.length; i++) {
					var recipient_name = data[i].recipient_name;
					var recipient_address = data[i].recipient_address;
					var recipient_location = data[i].recipient_location;
					var recipient_telephone = data[i].recipient_telephone;
					var recipient_destination = data[i].recipient_destination;
					var receiving_signature = data[i].receiving_signature;
					var receiving_name = data[i].receiving_name;
					var date_pickup = data[i].date_pickup;
					var issued_by = data[i].issued_by;

					var proxy = data[i].proxy;
					if(proxy == 'Y') {
						document.getElementById("proxy_info").style.display = 'block';
						var proxy_name = data[i].proxy_name;
						var proxy_ghcard = data[i].proxy_ghcard;
						var proxy_address = data[i].proxy_address;
						jQuery("#proxy").html("YES");

						jQuery("#prox_name").html(proxy_name);
						jQuery("#prox_id").html(proxy_ghcard);
						jQuery("#prox_add").html(proxy_address);
					} else {
						document.getElementById("proxy_info").style.display = 'none';
						jQuery("#proxy").html("NO");
					}

					jQuery("#pick_date").html(date_pickup);
					jQuery("#recipient").html(recipient_name);
					jQuery("#recipient_phone").html(recipient_telephone);
					jQuery("#issuer").html(issued_by);
					if(receiving_signature != '') {
						jQuery(".sigpad").signaturePad({displayOnly: true}).regenerate(receiving_signature);
					} else if (receiving_name != '') {
						jQuery(".sigpad").html(receiving_name);
						jQuery(".sigpad").addClass("signature");
					}
				}
			} else {

			}
		}
	})
}

function checkReturnPayment (code) {
	var value = "";

	jQuery.ajax({
		async: false,
		type: 'POST',
		url: 'checkReturnPayment.php',
		data: {
			'p_code': code
		},

		success: function (response) {
			value = response;
		}
	})
	return value;
}