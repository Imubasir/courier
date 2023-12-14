jQuery(document).ready(function($){

	$(document).ready(function () {
		_sender_origin ();
		updateOverdueBill();
		var state = checkRememberMe();
		if(state != '') {
			$("#checkbox1").attr("checked", true);
			getCredentials(state);
			$("#username_label").addClass("mdc-floating-label mdc-floating-label--float-above");
			$("#password_label").addClass("mdc-floating-label mdc-floating-label--float-above");
		} else {
			$("#checkbox1").attr("checked", false);
		}
	})
})

function sign_up () {
	var password = jQuery("input[name=password]").val();
	var con_password = jQuery("input[name=confirm_password]").val();

	if(password == con_password) {
		var formdata = new FormData(document.querySelector("#signup_form"));
		jQuery.ajax({
			type: 'POST',
			url: 'php/sign_up.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
			// console.log(responseText);
				if(responseText == '1') {
					Swal.fire({
						title: 'Registration Successful',
						titleText: 'Account will be active within 24hrs',
						icon: 'success',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					})
					jQuery("#signup_form").trigger("reset");
				} else if (responseText == '2') {
					Swal.fire({
						titleText: 'Account Alreadt Exists',
						icon: 'info',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					})
				} else {
				// toastr.error("System Error. Please Contact Your Administrator");
					write_error(responseText);
				}
			}
		})
	} else {
		toastr.info("Passwords Do Not Match");
	}

}


function login () {
	var formdata = new FormData(document.querySelector("#loginForm"));

	var check = document.getElementById("checkbox1");
	if (check.checked) {
		formdata.append("remember", "true");
	} else {
		formdata.append("remember", "false");
	}

	jQuery.ajax({
		type: 'POST',
		url: 'php/login.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			// alert(responseText);
			if(responseText == '52189') {
				window.location = './220101/';
				localStorage.setItem("login", "true");
			} else if (responseText == '74190') {
				toastr.warning("Username or Password Incorrect");
			} else {
				toastr.error("System Error. Please Contact Your Administrator");
				write_error(responseText);
			}
		}
	})
}

function write_error(err) {
	jQuery.ajax ({
		type: 'POST',
		url: 'php/write_error.php',
		data: {
			'error': err
		},

		success: function() {

		}
	})
}

function write_internal_error(err) {
	jQuery.ajax ({
		type: 'POST',
		url: '../php/write_error.php',
		data: {
			'error': err
		},

		success: function(r) {
			// console.log("Error"+r);
		}
	})
}

function printout(div) {
	printJS({
		printable: div,
		type: 'html',
		scanStyles: true,
		targetStyles: ['*'],
		documentTitle: 'https://www.flyafricaworld.com/',
		css: ["../vendors/bootstrap/dist/css/bootstrap.min.css", "../assets/css/style.css", "../assets/css/custom_css.css", "../vendors/font-awesome/css/font-awesome.min.css"]
	})
}


function destinations () {
	var option = "<option selected value=''>Select Destination</option>";
	jQuery.ajax ({
		url: '../php/destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("#manifest_destination").html(option);
		}
	})
}

function create_manifest_dest () {
	var option = "<option selected value=''>Select Destination</option>";
	jQuery.ajax ({
		url: '../php/cust_destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("#manifest_destination").html(option);
		}
	})
}

function system_users () {
	var option = "<option selected value=''>Select Dispatcher</option>";
	jQuery.ajax ({
		url: '../php/dispatcher.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var name = data[i].name;
				var email = data[i].email;

				option += "<option value='"+email+"'>"+name+"</option>";
			}
			jQuery("#manifest_dispatcher").html(option);
		}
	})
}

function manifest_preview (code) {
	jQuery.ajax ({
		type: 'POST',
		url: '../php/manifest_preview.php',
		data: {
			'manifestCode':code,
		},

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var manifest_code = data[i].manifest_code;
				var branch_name = data[i].branch_name;

				jQuery("#man_code").html("Manifest Code: "+manifest_code);
				jQuery("#man_dest").html("Manifest Destination: "+branch_name);
			}
		}
	})
}

function branch () {
	var option = "<option selected value=''>Select Station</option>";
	option += "<option></option>";
	jQuery.ajax ({
		url: './php/destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("select[name=branch]").html(option);

		}
	})
}

function internal_branch () {
	var option = "<option selected value=''>Select Station</option>";
	option += "<option></option>";
	jQuery.ajax ({
		url: '../php/destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("select[name=branch]").html(option);
			jQuery("select[name=edit_branch]").html(option);

		}
	})
}

function _sender_origin () {
	var option = "<option selected value=''>Sender Origin</option>";
	jQuery.ajax ({
		url: '../php/destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("select[name=sender_origin]").html(option);

		}
	})
}

function regional_origin () {
	var option = "<option selected value=''>Sender Origin</option>";
	jQuery.ajax ({
		url: '../php/regional_destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("select[name=regional_sender_origin]").html(option);

		}
	})
}

function regional_recipient_origin () {
	var option = "<option selected value=''>Sender Origin</option>";
	jQuery.ajax ({
		url: '../php/regional_destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("select[name=regional_recipient_destination]").html(option);

		}
	})
}

function _recipient_origin () {
	var option = "<option selected disabled>Recipient Destination</option>";
	jQuery.ajax ({
		url: '../php/cust_destinations.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;

				option += "<option value='"+branch_code+"'>"+branch_name+"</option>";
			}
			jQuery("select[name=recipient_destination]").html(option);

		}
	})
}

function flights () {
	var option = "<option selected value=''>Select Flight</option>";
	jQuery.ajax ({
		url: '../php/flight.php',

		success: function(json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var flight_code = data[i].flight_code;
				var flight_name = data[i].flight_name;

				option += "<option value='"+flight_code+"'>"+flight_name+"</option>";
			}
			jQuery("select[name=manifest_flight]").html(option);

		}
	})
}

function getBranchName (branch_code) {
	var value = "";
	jQuery.ajax({
		async: false,
		type: 'POST',
		url: '../php/getBranchName.php',
		data: {
			'branch_code': branch_code
		},

		success: function (responseText) {
			value = responseText;
		}
	})
	return value;
}

function checkRememberMe () {
	var value = "";

	jQuery.ajax({
		async: false,
		url: './php/checkRememberMe.php',

		success: function(response) {
			console.log(response);
			value = response;
		}
	})
	return value;
}

function getCredentials (token) {
	jQuery.ajax({
		type: 'POST',
		url: './php/getCredentials.php',
		data: {
			'token': token
		},

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var username = data[i].email;
				var password = data[i].password;

				jQuery("input[name=awa_username]").val(username);
				jQuery("input[name=awa_password]").val(password);
			}
		}
	})
}

function keep_open(ids) {
	var id = ids.split(",");
	for (var i = 0; i < id.length; i++) {
		var id1 = id[0];
		var id2 = id[1];
	}

	jQuery('.' + id2).click();

	jQuery('.' + id1).on({
		"shown.bs.dropdown": function() { jQuery(this).attr('closable', false); },
        //"click":             function() { }, // For some reason a click() is sent when Bootstrap tries and fails hide.bs.dropdown
		"hide.bs.dropdown": function() { return jQuery(this).attr('closable') == 'true'; }
	});

	jQuery('.' + id1).children().first().on({
		"click": function() {
			jQuery(this).parent().attr('closable', true);
		}
	})
}

function getUsername(user) {
	var value = '';
	jQuery.ajax({
		async: false,
		type: 'POST',
		url: '../php/getUsername.php',
		data: {
			'usercode': user
		},

		success: function (response) {
			value = response;
		}
	})
	return value;
}

function updateOverdueBill () {
	jQuery.ajax({
		url: '../php/updateBill.php',

		success: function (responseText) {
			// alert(responseText);
		}
	})
}