jQuery(document).ready(function ($) {
	fetch_profile();

	document.getElementById("checkPassword").addEventListener("click", function () {
		var chk = document.getElementById("checkPassword");
		if(chk.checked == true) {
			document.getElementById("paswd_div").style.display = 'block';
		} else {
			document.getElementById("paswd_div").style.display = 'none';
		}
	})
})

function fetch_profile () {
	jQuery.ajax({
		url: 'fetch_profile.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var username = data[i].email;
				var firstname = data[i].firstname;
				var lastname = data[i].lastname;
				var access_group = data[i].access_group;
				var last_login = data[i].last_login;
				var image = data[i].image;
				var password = data[i].password;
				var role = data[i].group_name;
				var branch = data[i].branch_name;

				jQuery("#first_name").val(firstname);
				jQuery("#last_name").val(lastname);
				jQuery("#email").val(username);
				jQuery("#last_login").html(last_login);
				jQuery("#role").html(role);
				jQuery("#profile_image").attr("src", image);
				jQuery("#station").html(branch);


			}

		}
	})
}


function updateLogin() {
	var formData = new FormData(document.querySelector("#updateLoginForm"));

	var chk = document.getElementById("checkPassword");
	if(chk.checked == true) {
		formData.append("pswd_check", "true");
	} else {
		formData.append("pswd_check", "false");
	}

	jQuery.ajax({
		type: 'POST',
		url: 'updateLogin.php',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("Profile Update Complete");
				fetch_profile();

			} else {
				toastr.error("Error Updating Profile. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function imageChanger() {
	var imageFile = new FormData(document.querySelector("#image_form"));

	jQuery.ajax({
		type: 'POST',
		url: 'changeImage.php',
		data: imageFile,
		cache: false,
		processData: false,
		contentType: false,

		success: function(responseText) {
			if(responseText == '1') {
				toastr.success("Image Updated");
				jQuery("#imageChanger").modal("hide");
				
				fetch_profile();
			} else {
				toastr.error("Error Updating Image");

				write_page_error(responseText);
			}
		}
	})
}