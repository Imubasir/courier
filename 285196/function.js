jQuery(document).ready(function($){

	$(document).ready(function () {
		loadBranch ();

	})

})

function loadBranch () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadBranch.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;
				var branch_prefix = data[i].prefix;
				var action = "<button class='btn btn-sm btn-info' onclick='edit(\""+branch_code+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+branch_code+"</td><td>"+branch_name+"</td><td>"+branch_prefix+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#branch_body").html(tbl_body);
			jQuery("#branch_table").dataTable();
		}
	})
}

function loadRegionalBranch () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadRegionalBranch.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;
				var branch_prefix = data[i].prefix;
				var action = "<button class='btn btn-sm btn-info' onclick='editRegional(\""+branch_code+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+branch_code+"</td><td>"+branch_name+"</td><td>"+branch_prefix+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#regional_branch_body").html(tbl_body);
			jQuery("#regional_branch_table").dataTable();
		}
	})
}

function addBranch() {
	var formdata = new FormData(document.querySelector("#addForm"));

	jQuery.ajax({
		type: 'POST',
		url: 'addBranch.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Branch Created");
				jQuery("#addForm").trigger("reset");
				jQuery("#addModal").modal("hide");
				loadBranch ();
			} else {
				toastr.error("Error Creating Branch. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function addRegionalBranch() {
	var formdata = new FormData(document.querySelector("#addRegionalForm"));

	jQuery.ajax({
		type: 'POST',
		url: 'addRegionalBranch.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Regional Station Created");
				jQuery("#addRegionalForm").trigger("reset");
				jQuery("#addRegionalModal").modal("hide");
				loadRegionalBranch ();
			} else {
				toastr.error("Error Creating Regional Station. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function edit(id) {
	jQuery("#editModal").modal("show");
	
	jQuery.ajax({
		type: 'POST',
		url: 'fetchBranch.php',
		data: {
			'id': id
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;
				var branch_prefix = data[i].prefix;
				
				jQuery("input[name=edit_branch_name]").val(branch_name);
				jQuery("input[name=edit_prefix]").val(branch_prefix);
			}
		}
	})

	jQuery("#saveBtn").off("click").on("click", function () {
		var formdata = new FormData(document.querySelector("#editForm"));
		formdata.append("id", id);

		jQuery.ajax({
			type: 'POST',
			url: 'updateBranch.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Branch Updated");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadBranch ();
				} else {
					toastr.error("Error Updating Branch. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delBtn").off("click").on("click", function () {
		jQuery.ajax({
			type: 'POST',
			url: 'delBranch.php',
			data: {
				'id':id
			},

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Branch Deleted");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadBranch ();
				} else {
					toastr.error("Error Deleting Branch. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

}

function editRegional (id) {
	jQuery("#editRegionalModal").modal("show");
	
	jQuery.ajax({
		type: 'POST',
		url: 'fetchRegionalBranch.php',
		data: {
			'id': id
		},

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var branch_code = data[i].branch_code;
				var branch_name = data[i].branch_name;
				var branch_prefix = data[i].prefix;
				
				jQuery("input[name=edit_regional_branch_name]").val(branch_name);
				jQuery("input[name=edit_regional_prefix]").val(branch_prefix);
			}
		}
	})

	jQuery("#saveRegBtn").off("click").on("click", function () {
		var formdata = new FormData(document.querySelector("#editRegionalForm"));
		formdata.append("id", id);

		jQuery.ajax({
			type: 'POST',
			url: 'updateRegionalBranch.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Station Updated");
					jQuery("#editRegionalForm").trigger("reset");
					jQuery("#editRegionalModal").modal("hide");
					loadRegionalBranch ();
				} else {
					toastr.error("Error Updating Regional Station. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delRegBtn").off("click").on("click", function () {
		jQuery.ajax({
			type: 'POST',
			url: 'delRegionalBranch.php',
			data: {
				'id':id
			},

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Station Deleted");
					jQuery("#editRegionalForm").trigger("reset");
					jQuery("#editRegionalModal").modal("hide");
					loadRegionalBranch ();
				} else {
					toastr.error("Error Deleting Station. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

}