jQuery(document).ready(function($) {

	$(document).ready(function () {
		_sender_origin ();
		_recipient_origin ();
		check_branch ();
		customers ();
		parcelTypes ();
		select_flight ();

		jQuery("select[name=parcel_type]").select2();

		document.getElementById("parcel_weight").addEventListener("keyup", function () {
			var weight = $("#parcel_weight").val();
			if (weight == '') {
				weight = 0.00;
			}

			var round_weight = roundoff(weight);
			$("#countdown").html(round_weight);
			check_weight();
		})

		//On Page load
		$("#checkLargeParcel").attr("checked", false);
		var elem = document.getElementById("checkLargeParcel");
		if(elem.checked == false) {
			document.getElementById("parcel_weight").addEventListener("keyup", function () {
				var weight = roundoff($("#parcel_weight").val());
				getRate(weight);
			})
		} else if (elem.checked == true) {
			
		}


		document.getElementById("checkLargeParcel").addEventListener("change", function() {
			var elem = document.getElementById("checkLargeParcel");
			if(elem.checked == true) {
				document.getElementById("largeParcelDiv").style.display = 'flex';

				$("#calcBtn").off("click").on("click", function () {
					var weight = calculateVolume();
					$("#countdown").html(weight+ " Kg");
					getRate(weight);
				})
			} else {
				document.getElementById("largeParcelDiv").style.display = 'none';

				document.getElementById("parcel_weight").addEventListener("keyup", function () {
					var weight = $("#parcel_weight").val();
					getRate(weight);
				})
			}
		})

		document.getElementById("sender_type").addEventListener('change', function () {
			var type = $("#sender_type").val();

			if(type == 'LOCAL') {
				$("input[name=sender_address]").attr("readonly", false);
				$("input[name=sender_address]").attr("placeholder", "Sender's Ghana Card Number");
				$("input[name=sender_location]").attr("readonly", false);
				$("input[name=sender_phone]").attr("readonly", false);
				$("input[name=recipient_name]").attr("readonly", false);
				$("input[name=recipient_address]").attr("readonly", false);
				$("input[name=recipient_address]").attr("placeholder", "Recipient's Ghana Card Number");
				$("input[name=recipient_location]").attr("readonly", false);
				$("input[name=recipient_phone]").attr("readonly", false);

				document.getElementById("indv_name").style.display = 'block';
				jQuery("#sender_name").attr("disabled", false);
				document.getElementById("company_name").style.display = 'none';

				document.getElementById("recipient_name").style.display = 'block';
				jQuery("#recipient_name").attr("disabled", false);
				document.getElementById("recipient_company_name").style.display = 'none';

			} else if (type == 'COMPANY') {
				$("input[name=sender_address]").attr("readonly", true);
				$("input[name=sender_address]").attr("placeholder", "Sender's Ghana Card Number");
				$("input[name=sender_location]").attr("readonly", false);
				$("input[name=sender_phone]").attr("readonly", false);
				$("input[name=recipient_name]").attr("readonly", false);
				$("input[name=recipient_address]").attr("readonly", true);
				$("input[name=recipient_address]").attr("placeholder", "Recipient's Ghana Card Number");
				$("input[name=recipient_location]").attr("readonly", false);
				$("input[name=recipient_phone]").attr("readonly", false);

				document.getElementById("indv_name").style.display = 'none';
				jQuery("#sender_name").attr("disabled", true);
				document.getElementById("company_name").style.display = 'block';

				document.getElementById("recipient_name").style.display = 'none';
				jQuery("#recipient_name").attr("disabled", true);
				document.getElementById("recipient_company_name").style.display = 'block';

			} else if (type == 'FORIEGN') {
				$("input[name=sender_address]").attr("readonly", false);
				$("input[name=sender_address]").attr("placeholder", "Sender's Passport Number");
				$("input[name=sender_location]").attr("readonly", false);
				$("input[name=sender_phone]").attr("readonly", false);
				$("input[name=recipient_name]").attr("readonly", false);
				$("input[name=recipient_address]").attr("readonly", false);
				$("input[name=recipient_address]").attr("placeholder", "Recipient's Ghana Card/Passport");
				$("input[name=recipient_location]").attr("readonly", false);
				$("input[name=recipient_phone]").attr("readonly", false);

				document.getElementById("indv_name").style.display = 'block';
				jQuery("#sender_name").attr("disabled", false);
				document.getElementById("company_name").style.display = 'none';

				document.getElementById("recipient_name").style.display = 'block';
				jQuery("#recipient_name").attr("disabled", false);
				document.getElementById("recipient_company_name").style.display = 'none';

			}
		})

		document.getElementById("sender_name_select").addEventListener("change", function () {
			var company_name = $("#sender_name_select").val();
			companyInfo(company_name, 's');
		})

		document.getElementById("recipient_sender_name_select").addEventListener("change", function () {
			var company_name = $("#recipient_sender_name_select").val();
			companyInfo(company_name, 'r');
		})

		document.getElementById("insurance_no").addEventListener('click', function () {
			document.getElementById("parcel_value_div").style.display = 'none';
		})

		document.getElementById("insurance_yes").addEventListener('click', function () {
			document.getElementById("parcel_value_div").style.display = 'block';
		})

		
	})
})

function roundoff(value) {
	return (Math.ceil(value / 0.5) * 0.5).toFixed(2);
}

function addParcel () {

	var sender_type = jQuery("select[name=sender_type]").val();
	var flight = jQuery("select[name=flight]").val();
	
	if(sender_type == 'COMPANY') {
		var sender_name = 'COMPANY';
		var recipient_name = 'COMPANY';
		var sender_address = 'COMPANY';
		var recipient_address = 'COMPANY';
	} else {
		var sender_name = jQuery("input[name=sender_name]").val();
		var recipient_name = jQuery("input[name=recipient_name]").val();
		var sender_address = jQuery("input[name=sender_address]").val();
		var recipient_address = jQuery("input[name=recipient_address]").val();
	}

	
	var sender_phone = jQuery("input[name=sender_phone]").val();
	var sender_origin = jQuery("input[name=sender_origin]").val();

	
	var recipient_phone = jQuery("input[name=recipient_phone]").val();
	var recipient_destination = jQuery("select[name=recipient_destination]").val();

	var parcel_weight = jQuery("input[name=parcel_weight]").val();
	var parcel_type = jQuery("input[name=parcel_type]").val();

	if (sender_type == '') {
		toastr.info("Please select sender type");
	} else if (sender_name == '') {
		toastr.info("Please enter Sender Name");
	} else if (sender_address == '') {
		toastr.info("Please enter Sender Ghana Card Number");
	} else if (sender_phone == '') {
		toastr.info("Please enter Sender Phone");
	} else if (sender_phone.length < 10) {
		toastr.info("Re-check sender phone. Digits less than 10");
	} else if (sender_origin == '') {
		toastr.info("Please select Sender Origin");
	} else if (recipient_name == '') {
		toastr.info("Please enter Recipient Name");
	} else if (recipient_address == '') {
		toastr.info("Please enter recipient address");
	} else if (recipient_phone == '') {
		toastr.info("Please enter Recipient Phone");
	} else if (recipient_phone.length < 10) {
		toastr.info("Re-check recipient phone. Digits less than 10");
	} else if (recipient_destination == '') {
		toastr.info("Please enter Recipient Destination");
	} else if (flight == '') {
		toastr.info("Please select flight");
	} else if (parcel_weight == '') {
		toastr.info("Please enter Weight of Parcel");
	} else if (parcel_type == '') {
		toastr.info("Please select parcel type");
	} else if (!jQuery("input[name='insurance']").is(':checked')) {
		toastr.info("Please select Insurance Option");
	} else {

		var formdata = new FormData(document.querySelector("#addParcelForm"));
		var serviceType = document.querySelector("input[type='radio'][name=service_type]:checked").value;
		var insurance = document.querySelector("input[type='radio'][name=insurance]:checked").value;
		var parcel_group = document.querySelector("input[type='radio'][name=parcel_group]:checked").value;

		var sender_type = jQuery("#sender_type").val();

		var elem = document.getElementById("checkLargeParcel");
		if (elem.checked == true) {
			var large_parcel_check = 'true';
		} else if (elem.checked == false) {
			var large_parcel_check = 'false';
		}

		formdata.append("serviceType", serviceType);
		formdata.append("insurance", insurance);
		formdata.append("large_parcel_check", large_parcel_check);
		formdata.append("parcel_group", parcel_group);

		jQuery.ajax({
			type: 'POST',
			url: 'addParcel.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			beforeSend: function() {
				jQuery("#genBtn").html('<img src="../images/loading.gif" width="20px">');
			},

			success: function (responseText) {
				console.log(responseText);
				jQuery("#genBtn").html("<i class='fa fa-saves'></i> Create Consignment");
				var outputs = responseText.split("|");
				var status = outputs[0];
				var parcelcode = outputs[1];

				if (status == '1') {
					toastr.success("New Consignment Created");
					jQuery("#addParcelForm").trigger("reset");
					jQuery("#display_amount").html("0.00");
					if(sender_type != 'COMPANY') {
						showPayment(parcelcode);
					}

					_sender_origin ();
					_recipient_origin ();
					check_branch ();
					customers ();
					parcelTypes ();
					select_flight ();

					jQuery("select[name=parcel_type]").select2();
				} else {
					toastr.error("Error Creating Consignment. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	}
}

function resetForm (formid) {
	jQuery("#"+formid).trigger("reset");
	_sender_origin ();
	_recipient_origin ();
	check_branch ();
	customers ();
	parcelTypes ();
	select_flight ();
}

function showBill () {
	var p_code = jQuery("input[name=edit_code]").val();
	if(!p_code) {
		toastr.info("Enter Parcel Code to Search");
	} else {
		wayBill(p_code);
	}
}

function wayBill(parcelcode) {
	jQuery.ajax({
		type: 'POST',
		url: 'parcelDetails.php',
		data: {
			'parcelcode': parcelcode
		},

		success: function (json) {
			var data = JSON.parse(json);
			if(data.length == 0) {
				toastr.info("No Record Found");
			} else {

				var status = checkPayment(parcelcode);
				if (status == 1) {
					jQuery("#details").modal("show");

					var tbl_body = "";
					for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
						var parcel_code = data[i].parcel_code;
						var manifest_code = data[i].manifest_code;
						var sender_name = data[i].sender_name;
						var sender_address = data[i].sender_address;
						var sender_email = data[i].sender_email;
						var sender_location = data[i].sender_location;
						var sender_telephone = data[i].sender_telephone;
						var sender_origin = getBranchName(data[i].sender_origin);

						var recipient_name = data[i].recipient_name;
						var recipient_address = data[i].recipient_address;
						var recipient_email = data[i].recipient_email;
						var recipient_location = data[i].recipient_location;
						var recipient_telephone = data[i].recipient_telephone;
						var recipient_destination = getBranchName(data[i].recipient_destination);

						var flight = data[i].flight;
						var service_type = data[i].service_type;
						var parcel_type = data[i].parcel_type;
						var parcel_group = data[i].parcel_group;
						if(parcel_group == '0') {
							parcel_group = "NEW PARCEL";
						} else if (parcel_group == '1') {
							parcel_group = "RETURN PARCEL";
						}
						var no_items = data[i].no_items;
						var weight = new Number(data[i].weight);
						var volume = new Number(data[i].volume);
						if(weight > volume) {
							weight = weight;
						} else {
							weight = volume;
						}

						var amount = new Number(data[i].amount);
						var content_descr = data[i].content_descr;
						var insurance = data[i].insurance;
						var value_of_item = new Number(data[i].value_of_item);
						var date_created = data[i].date_created;
						var created_by = getUsername(data[i].created_by);
						
						jQuery(".parcel_code").html(": "+parcel_code);
						jQuery(".manifest_code").html(": "+manifest_code);
						jQuery(".sender_name_2").html(": "+sender_name);
						jQuery(".sender_address").html(": "+ sender_address);
						jQuery(".sender_location").html(": "+sender_location);
						jQuery(".senders_email").html(": "+sender_email);
						jQuery(".sender_telephone").html(": "+sender_telephone);
						jQuery(".sender_origin").html(": "+sender_origin);

						jQuery(".recipient_name_").html(": "+recipient_name);
						jQuery(".recipient_address").html(": "+recipient_address);
						jQuery(".recipient_location").html(": "+recipient_location);
						jQuery(".recipients_email").html(": "+recipient_email);
						jQuery(".recipient_telephone").html(": "+recipient_telephone);
						jQuery(".recipient_destination").html(": "+recipient_destination);

						jQuery(".flight").html(": "+flight);
						jQuery(".service_type").html(": "+service_type);
						jQuery(".parcel_type").html(": "+parcel_type);
						jQuery(".no_items").html(": "+no_items);
						jQuery(".insurance").html(": "+insurance);
						jQuery(".value_of_item").html(": GH&#8373; "+value_of_item.toFixed(2));
						jQuery(".weight").html(": "+weight.toFixed(2)+" Kg");
						jQuery(".amount").html(": GH&#8373; "+amount.toFixed(2));
						jQuery(".content_descr").html(": "+content_descr);
						jQuery(".parcel_group").html(": "+parcel_group);

						if(insurance == 'YES') {
							jQuery(".ins_amount").html(": ");
						} else {
							jQuery(".ins_amount").html(": ");
						}
						jQuery(".total_amount").html(": GH&#8373; "+amount.toFixed(2));

						jQuery(".date_created").html("DATE: "+date_created);
						jQuery(".created_by").html(": "+created_by);

						jQuery(".qrcode").barcode(
							parcel_code,
							"code128", {
								showHRI: true,
								barHeight: 45,
								barWidth: 2,
								marginHRI: 1,
								output: "css",
								fontSize: 15,
								color: "#000000",
								bgColor: "#FFFFFF",
								moduleSize: 3,
							}
							);
					}

				} else {
					toastr.info("Incomplete Payment");
				}
			}

		}
	})
}

function check_weight() {

	jQuery('#countdown').CountUpCircle({
		duration: 1000,
		opacity_anim: false,
		step_divider: 0.1
	});
}

function check_branch () {

	jQuery.ajax({
		url: 'check_branch.php',

		success: function (val) {
			jQuery("select[name=sender_origin]").val(val);
		}
	})
}

function edit() {

	var p_code = jQuery("input[name=edit_code]").val();
	jQuery.ajax({
		type: 'POST',
		url: 'parcelDetails.php',
		data: {
			'parcelcode': p_code
		},

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var parcel_code = data[i].parcel_code;
				var manifest_code = data[i].manifest_code;
				var sender_type = data[i].sender_type;

				var sender_name = data[i].sender_name;
				var sender_address = data[i].sender_address;
				var sender_email = data[i].sender_email;
				var sender_location = data[i].sender_location;
				var sender_telephone = data[i].sender_telephone;
				var sender_origin = data[i].sender_origin;

				var recipient_name = data[i].recipient_name;
				var recipient_address = data[i].recipient_address;
				var recipient_email = data[i].recipient_email;
				var recipient_location = data[i].recipient_location;
				var recipient_telephone = data[i].recipient_telephone;
				var recipient_destination = data[i].recipient_destination;

				var flight = data[i].flight;
				var service_type = data[i].service_type;
				var parcel_type = data[i].parcel_type;
				var parcel_group = data[i].parcel_group;
				var no_items = data[i].no_items;
				var weight = data[i].weight;
				var volume = data[i].volume;
				var amount = data[i].amount;
				var content_descr = data[i].content_descr;
				var insurance = data[i].insurance;
				var value_of_item = data[i].value_of_item;

				jQuery("select[name=sender_type]").val(sender_type);
				jQuery("input[name=sender_name]").val(sender_name);
				jQuery("input[name=sender_address]").val(sender_address);
				jQuery("input[name=sender_email]").val(sender_email);
				jQuery("input[name=sender_location]").val(sender_location);
				jQuery("input[name=sender_phone]").val(sender_telephone);
				jQuery("select[name=sender_origin]").val(sender_origin);

				jQuery("input[name=recipient_name]").val(recipient_name);
				jQuery("input[name=recipient_address]").val(recipient_address);
				jQuery("input[name=recipient_email]").val(recipient_email);
				jQuery("input[name=recipient_location]").val(recipient_location);
				jQuery("input[name=recipient_phone]").val(recipient_telephone);
				jQuery("select[name=recipient_destination]").val(recipient_destination);

				if (service_type == 'AIRPORT-AIRPORT') {
					jQuery("#air_air").attr("checked", "checked");
				} else if (service_type == 'airport-door') {
					jQuery("#AIRPORT-DOOR").attr("checked", "checked");
				}

				if (parcel_group == '0') {
					jQuery("#newParcel").prop('checked', true);
				} else if (parcel_group == '1') {
					jQuery("#returnParcel").prop('checked', true);
				}

				jQuery("input[name=parcel_quantity]").val(no_items);
				jQuery("input[name=parcel_weight]").val(weight);
				
				var volume_output = volume.split("*");

				var parcel_check = volume_output[0];
				var parcel_length = volume_output[1];
				var parcel_width = volume_output[2];
				var parcel_height = volume_output[3];

				jQuery("input[name=length]").val(parcel_length);
				jQuery("input[name=width]").val(parcel_width);
				jQuery("input[name=height]").val(parcel_height);

				if(parcel_check == 'Y') {
					jQuery("#checkLargeParcel").attr("checked", "checked");
					document.getElementById("largeParcelDiv").style.display = 'flex';
				} else {
					jQuery("#checkLargeParcel").attr("checked", false);
					document.getElementById("largeParcelDiv").style.display = 'none';
				}

				jQuery("#countdown").html(weight);
				check_weight();
				getRate(weight);

				jQuery("select[name=flight]").val(flight);
				jQuery("select[name=parcel_type]").val(parcel_type);

				jQuery("input[name=parcel_description]").val(content_descr);

				if(insurance == 'NO') {
					jQuery("#insurance_no").attr("checked", "checked");
				} else if (insurance == 'YES') {
					jQuery("#insurance_yes").attr("checked", "checked");
				}
				jQuery("input[name=parcel_value]").val(value_of_item);

			}

			jQuery("#btn_type").html("<button class='btn btn-sm btn-info' onclick='updateParcel(\""+parcel_code+"\")'><i class='fa fa-save'></i> Save Consignment</button>");

		}
	})
}

function updateParcel (code) {

	var sender_type = jQuery("input[name=sender_type]").val();
	var flight = jQuery("input[name=flight]").val();

	var sender_name = jQuery("input[name=sender_name]").val();
	var sender_address = jQuery("input[name=sender_address]").val();
	var sender_phone = jQuery("input[name=sender_phone]").val();

	var recipient_name = jQuery("input[name=recipient_name]").val();
	var recipient_address = jQuery("input[name=recipient_address]").val();
	var recipient_phone = jQuery("input[name=recipient_phone]").val();
	var recipient_destination = jQuery("input[name=recipient_destination]").val();

	var parcel_weight = jQuery("input[name=parcel_weight]").val();
	var parcel_type = jQuery("select[name=parcel_type]").val();

	if (sender_type == '') {
		toastr.info("Please select sender type");
	} else if(sender_name == '') {
		toastr.info("Please enter Sender Name");
	} else if (sender_address == '') {
		toastr.info("Please enter Sender Ghana Card Number");
	} else if (sender_phone == '') {
		toastr.info("Please enter Sender Phone");
	} else if (sender_phone.length < 10) {
		toastr.info("Recheck sender phone. Digits less than 10");
	} else if (recipient_name == '') {
		toastr.info("Please enter Recipient Name");
	} else if (recipient_address == '') {
		toastr.info("Please enter recipient address");
	} else if (recipient_phone == '') {
		toastr.info("Please enter recipient Phone");
	} else if (recipient_phone.length < 10) {
		toastr.info("Recheck recipient phone. Digits less than 10");
	} else if (recipient_destination == '') {
		toastr.info("Please enter recipient destination");
	} else if (flight == '') {
		toastr.infor("Please select flight");
	} else if (parcel_weight == '') {
		toastr.info("Please enter weight of parcel");
	} else if (parcel_type == '') {
		toastr.info("Please select parcel type");
	} else if (!jQuery("input[name='insurance']").is(':checked')) {
		toastr.info("Please select insurance option");
	} else {

		var formdata = new FormData(document.querySelector("#addParcelForm"));
		var serviceType = document.querySelector("input[type='radio'][name=service_type]:checked").value;
		var insurance = document.querySelector("input[type='radio'][name=insurance]:checked").value;
		var parcel_group = document.querySelector("input[type='radio'][name=parcel_group]:checked").value;

		var elem = document.getElementById("checkLargeParcel");
		if (elem.checked == true) {
			var large_parcel_check = 'true';
		} else if (elem.checked == false) {
			var large_parcel_check = 'false';
		}

		formdata.append("parcelCode", code);
		formdata.append("serviceType", serviceType);
		formdata.append("insurance", insurance);
		formdata.append("large_parcel_check", large_parcel_check);
		formdata.append("parcel_group", parcel_group);

		jQuery.ajax({
			type: 'POST',
			url: 'updateParcel.php',
			data: formdata,
			cache: false,
			processData: false,
			contentType: false,

			success: function (responseText) {
				var outputs = responseText.split("|");
				var status = outputs[0];
				var parcelcode = outputs[1];

				if(status == '1') {
					toastr.success("Consignment Updated");
					jQuery("#addParcelForm").trigger("reset");
					jQuery("#display_amount").html("0.00");
					if(sender_type != 'COMPANY') {
						showPayment(parcelcode);
					}

					_sender_origin ();
					_recipient_origin ();
					check_branch ();
					customers ();
					parcelTypes ();
					select_flight ();

					jQuery("select[name=parcel_type]").select2();
				} else {
					toastr.error("Error Creating Consignment. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	}
}

function customers () {
	var option = "<option selected disabled>Select Customer</option>";
	jQuery.ajax({
		url: 'customers.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var customer_name = data[i].customer_name;
				var customer_address = data[i].customer_address;
				var customer_phone = data[i].customer_phone;

				option += "<option value='"+customer_name+"'>"+customer_name+"</option>";
			}
			jQuery("select[name=sender_name_select]").html(option);
			jQuery("select[name=recipient_sender_name_select]").html(option);
		}
	})
}

function companyInfo (company_name, t) {
	jQuery.ajax({
		type: 'POST',
		url: 'companyInfo.php',
		data: {
			'company': company_name
		},

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var address = data[i].customer_address;
				var phone = data[i].customer_phone;

				if(t == 's') {
					jQuery("input[name=sender_location]").val(address);
					jQuery("input[name=sender_phone]").val(phone);
				} else if (t == 'r') {
					jQuery("input[name=recipient_location]").val(address);
					jQuery("input[name=recipient_phone]").val(phone);
				}

				
			}
		}
	})
}
function showPaymentBill () {
	var p_code = jQuery("input[name=edit_code]").val();
	if(!p_code) {
		toastr.info("Enter Parcel Code to Search");
	} else {
		showPayment(p_code);
	}
}

function showPayment (code) {
	// console.log(code);
	jQuery.ajax({
		type: 'POST',
		url: 'parcelDetails.php',
		data: {
			'parcelcode': code
		},

		success: function (json) {
			var data = JSON.parse(json);
			if(data.length == 0) {
				toastr.info("No Record Found");
			} else {
				jQuery("#paymentdetails").modal("show");

				for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
					var parcel_code = data[i].parcel_code;
					var sender_name = data[i].sender_name;
					var origin = getBranchName(data[i].sender_origin);

					var recipient_name = data[i].recipient_name;
					var destination = getBranchName(data[i].recipient_destination);

					var service_type = data[i].service_type;
					var parcel_type = data[i].parcel_type;
					var weight = data[i].weight;
					var volume = new Number(data[i].volume);
					if(weight > volume) {
						weight = weight;
					} else {
						weight = volume;
					}
					
					var amount = data[i].amount;

					var insurance = data[i].insurance;
					var value_of_item = data[i].value_of_item;
					var date_created = data[i].date_created;
					var created_by = getUsername(data[i].created_by);

					jQuery("#parcel_code").html(": "+parcel_code);
					jQuery("#bill_shipper").html(": "+sender_name);

					jQuery("#bill_recipient").html(": "+recipient_name);

					jQuery("#bill_route").html(": "+origin+" TO "+destination);
					jQuery("#bill_serviceType").html(": "+service_type);
					jQuery("#bill_parcelType").html(": "+parcel_type);
					jQuery("#bill_weight").html(": "+weight+" Kg");
					if(insurance == 'YES') {
						jQuery("#bill_insurance").html(": "+insurance);
					} else {
						jQuery("#bill_insurance").html(": "+insurance);
					}
					jQuery("#bill_insurance_rate").html(": ");
					jQuery("#bill_amount").html(": GH&#8373; "+amount);
					jQuery("#bill_date").html(date_created);
					jQuery("#bill_issuer").html(": "+created_by);

					jQuery("#code").barcode(
						parcel_code,
						"code128", {
							showHRI: true,
							barHeight: 45,
							barWidth: 1.5,
							marginHRI: 1,
							output: "css",
							fontSize: 10,
							color: "#000000",
							bgColor: "#FFFFFF",
							moduleSize: 3,
						}
						);
				}
			}
		}
	})
}

function getRate (weight) {
	jQuery.ajax({
		type: 'POST',
		url: 'getRate.php',
		data: {
			'weight': weight
		},

		success: function (response) {
			jQuery("#display_amount").html(response);
		}
	})
}

function calculateVolume () {
	var weight = new Number(jQuery("input[name=parcel_weight]").val());

	var length = jQuery("input[name=length]").val();
	var width = jQuery("input[name=width]").val();
	var height = jQuery("input[name=height]").val();

	var parcelVolume = length * width * height;
	var volume_to_rate = parcelVolume/6000;

	if(volume_to_rate > weight) {
		return new Number(volume_to_rate.toFixed(2));
	} else {
		return new Number(weight.toFixed(2));
	}
}

function fetch_daily_parcel () {
	jQuery('#daily_table').dataTable().fnDestroy();
	jQuery.ajax({
		url: 'fetch_daily_parcel.php',

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			if(data.length != 0) {
				jQuery("#daily_modal").modal("show");

				for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
					var date_created = data[i].date_created;
					var parcel_code = data[i].parcel_code;
					var sender_name = data[i].sender_name;
					var recipient_name = data[i].recipient_name;
					var parcel_code_fk = data[i].parcel_code_fk;
					var sender_origin = getBranchName(data[i].sender_origin);
					var recipient_destination = getBranchName(data[i].recipient_destination);

					tbl_body += "<tr><td>"+a+"</td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td></tr>";
				}
				jQuery("#daily_body").html(tbl_body);
				jQuery('#daily_table').DataTable( {
					dom: 'Bfrtip',
					buttons: [ {
						extend: 'excel',
						title: 'Daily Parcels',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6]
						}
					},
					{
						extend: 'print',
						title: 'Daily Registered Parcels',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6]
						}
					},
					'colvis'
					]
				} );
			} else {
				toastr.info("No Record Found");
			}
			
		}

	})
}

function parcelTypes () {
	var option = "<option>Select Parcel Type</option>";
	jQuery.ajax({
		url: 'parceltype.php',

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var code = data[i].parcelType_code;
				var descr = data[i].parcelType_descr;

				option+= "<option value='"+code+"'>"+code+"</option>";
			}
			jQuery("select[name=parcel_type]").html(option);
			// jQuery("#newParcel").attr("checked", "checked");
		}
	})
}

function select_flight () {
	var option = "<option>SELECT FLIGHT</option>";
	jQuery.ajax({
		url: 'selectFlight.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var code = data[i].flight_code;
				var name = data[i].flight_name;

				option+= "<option value='"+code+"'>"+name+"</option>";
			}
			jQuery("select[name=flight]").html(option);
		}
	})
}

function showParcelLabel () {
	var p_code = jQuery("input[name=edit_code]").val();
	if(!p_code) {
		toastr.info("Enter Parcel Code to Search");
	} else {
		fetch_parcel_label(p_code);
	}
}

function fetch_parcel_label (p_code) {
	jQuery("#labelDetails").modal("show");

	jQuery.ajax({
		type: 'POST',
		url: 'fetch_label.php',
		data: {
			'p_code': p_code
		},

		success: function (json) {
			var data = JSON.parse(json);

			if(data.length != 0) {
				for (var i = 0; i < data.length; i++) {
					var name = data[i].sender_name;
					var location = data[i].sender_location;
					var address = data[i].sender_address;
					var phone = data[i].sender_telephone;

					var re_name = data[i].recipient_name;
					var re_location = data[i].recipient_location;
					var re_address = data[i].recipient_address;
					var re_phone = data[i].recipient_telephone;

					var parcel_code = data[i].parcel_code;
					var weight = data[i].weight;
					var manifest_code = data[i].manifest_code;

					var sender = "<span style='font-weight: bold;font-size: 19px'>"+name+"</span><br>"+address+"<br>"+location+"<br>"+phone;
					var recipient = "<span style='font-weight: bold;font-size: 19px'>"+re_name+"</span><br>"+re_address+"<br>"+re_location+"<br>"+re_phone;
				}

				jQuery("#parcel_id").html(parcel_code);
				jQuery("#sender_info").html(sender);
				jQuery("#recipient_info").html(recipient);
				
				jQuery("#parcel_code").barcode(
					parcel_code,
					"code128", {
						showHRI: true,
						barHeight: 45,
						barWidth: 1.5,
						marginHRI: 1,
						output: "css",
						fontSize: 10,
						color: "#000000",
						bgColor: "#FFFFFF",
						moduleSize: 3,
					}
					);
			}

		}
	})
}

function checkPayment(code) {
	var value = '';
	jQuery.ajax({
		async: false,
		type: 'POST',
		url: 'checkPayment.php',
		data: {
			'p_code': code
		},

		success: function (response) {
			value = response;
		}
	})
	return value;
}