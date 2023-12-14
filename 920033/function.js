jQuery(document).ready(function($){

	$(document).ready(function () {
		loadUsers ();
		internal_branch ();
		loadGroups ()
	})

})

function loadUsers () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadUsers.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a = 1; i < data.length, a<data.length+1; i++, a++) {
				var email = data[i].email;
				var name = data[i].name;
				var access_group = data[i].group_name;
				if(!access_group) {
					access_group = '';
				}
				var branch_name = data[i].branch_name;

				var action = "<button class='btn btn-sm btn-info' onclick='editUser(\""+email+"\")'>Edit</button";
				tbl_body += "<tr><td>"+a+"</td><td>"+email+"</td><td>"+name+"</td><td>"+access_group+"</td><td>"+branch_name+"</td><td>"+action+"</td></tr>";
			}

			jQuery("#user_body").html(tbl_body);
			jQuery('#user_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'System Users',
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					}
				},
				{
					extend: 'pdf',
					title: 'System Users',
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					}
				},
				{
					extend: 'print',
					title: 'System Users',
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					}
				},
				'colvis'
				]
			} );
		}
	})
}

function loadRequests () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadrequest.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a = 1; i < data.length, a<data.length+1; i++, a++) {
				var email = data[i].email;
				var name = data[i].name;
				var access_group = data[i].group_name;
				if(!access_group) {
					access_group = '';
				}
				var branch_name = data[i].branch_name;

				var action = "<button class='btn btn-sm btn-info' onclick='assign(\""+email+"\")'>Edit</button";
				tbl_body += "<tr><td>"+a+"</td><td>"+email+"</td><td>"+name+"</td><td>"+access_group+"</td><td>"+branch_name+"</td><td>"+action+"</td></tr>";
			}

			jQuery("#list_body").html(tbl_body);
			jQuery('#list_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'Account Requests',
					messageTop: 'Account Requests',
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					}
				},
				{
					extend: 'print',
					title: 'Account Requests',
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					}
				},
				'colvis'
				]
			} );
		}
	})
}

function assign(user) {
	jQuery("#assignModal").modal("show");

	jQuery("#accessBtn").off("click").on("click").on("click", function() {
		var formdata = new FormData(document.querySelector("#accessForm"));
		if (jQuery('input[name=userLogin_status]').is(':checked')) {
			var userLogin_status = '1';
		} else {
			var userLogin_status = '0';
		}

		formdata.append("email", user);
		formdata.append("userLogin_status", userLogin_status);

		jQuery.ajax({
			type: 'POST',
			url: 'addAccess.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Access Updated");
					jQuery("#accessForm").trigger("reset");
					jQuery("#assignModal").modal("hide");
				} else {
					toastr.error("Error Creating Access. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delRequest").off("click").on("click", function () {
		deleteUser(user);
		jQuery("#assignModal").modal("hide");
	})
}

function addUser () {
	var formdata = new FormData(document.querySelector("#account_form"));

	jQuery.ajax({
		type: 'POST',
		url: 'addUser.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Account Created");
				jQuery("#account_form").trigger("reset");
				
			} else {
				toastr.error("Error Creating Account. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function loadGroups () {
	var option = "<option selected disabled>Select User Group</option>";
	jQuery.ajax({
		url: 'loadGroups.php',

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var group_id = data[i].group_id;
				var group_name = data[i].group_name;

				option += "<option value='"+group_id+"'>"+group_name+"</option>";
			}
			jQuery("select[name=user_group]").html(option);
			jQuery("select[name=edit_user_group]").html(option);
		}
	})
}

function editUser(user) {
	jQuery("#editUserModal").modal("show");

	jQuery.ajax({
		type: 'POST',
		url: 'fetchUser.php',
		data: {
			'user':user
		},

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var image = data[i].image;
				var branch_id = data[i].branch_id;
				var firstname = data[i].firstname;
				var lastname = data[i].lastname;
				var group = data[i].access_group;
				var status = data[i].log_status;
				var email = data[i].email;

				jQuery("#edit_image").attr("src", "../uploads/"+image);
				jQuery("select[name=edit_branch]").val(branch_id);
				jQuery("input[name=edit_fname]").val(firstname);
				jQuery("input[name=edit_lname]").val(lastname);
				jQuery("select[name=edit_user_group]").val(group);
				if (status == '1') {
					jQuery("input[name=edit_userLogin_status]").attr("checked", true);
				} else if (status == '0'){
					jQuery("input[name=edit_userLogin_status]").attr("checked", false);
				};
				jQuery("input[name=edit_email]").val(email);
			}

			jQuery("#delUser").off("click").on("click", function () {
				deleteUser(email);
				jQuery("#editUserModal").modal("hide");
			})
		}
	})
}

function saveEdit() {
	var formdata = new FormData(document.querySelector("#edit_form"));
	if (jQuery('input[name=edit_userLogin_status]').is(':checked')) {
		var login_status = '1';
	} else {
		var login_status = '0';
	}
	formdata.append("status", login_status);

	jQuery.ajax({
		type: 'POST',
		url: 'saveEdit.php',
		data: formdata,
		cache: false,
		processData: false,
		contentType: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("User Updated");
				jQuery("#edit_form").trigger("reset");
				loadUsers ();
				jQuery("#editUserModal").modal("hide");

			} else {
				toastr.error("Error Updating User. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function deleteUser (user) {
	jQuery.ajax({
		type: 'POST',
		url: 'delUser.php',
		data: {
			'user':user
		},

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("User Deleted");
				loadUsers ();
				loadRequests ();

			} else {
				toastr.error("Error Deleting User. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}