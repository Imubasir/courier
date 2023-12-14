jQuery(document).ready(function($){

	$(document).ready(function () {
		loadFlight ();
	})

})

function loadFlight () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadFlight.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var flight_code = data[i].flight_code;
				var flight_name = data[i].flight_name;
				var flight_descr = data[i].flight_descr;

				var action = "<button class='btn btn-sm btn-info' onclick='edit(\""+flight_code+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+flight_code+"</td><td>"+flight_name+"</td><td>"+flight_descr+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#flight_body").html(tbl_body);
			jQuery("#flight_table").dataTable();
		}
	})
}

function addFlight() {
	var formdata = new FormData(document.querySelector("#addForm"));

	jQuery.ajax({
		type: 'POST',
		url: 'addFlight.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Flight Created");
				jQuery("#addForm").trigger("reset");
				jQuery("#addModal").modal("hide");
				loadFlight ();
			} else {
				toastr.error("Error Creating Flight. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function edit(id) {
	jQuery("#editModal").modal("show");
	
	jQuery.ajax({
		type: 'POST',
		url: 'fetchFlight.php',
		data: {
			'id': id
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var flight_code = data[i].flight_code;
				var flight_name = data[i].flight_name;
				var flight_descr = data[i].flight_descr;
				
				jQuery("input[name=edit_flight_name]").val(flight_name);
				jQuery("textarea[name=edit_flight_descr]").val(flight_descr);
			}
		}
	})

	jQuery("#saveBtn").off("click").on("click", function () {
		var formdata = new FormData(document.querySelector("#editForm"));
		formdata.append("id", id);

		jQuery.ajax({
			type: 'POST',
			url: 'updateFlight.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Flight Updated");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadFlight ();
				} else {
					toastr.error("Error Updating Flight. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delBtn").off("click").on("click", function () {
		jQuery.ajax({
			type: 'POST',
			url: 'delFlight.php',
			data: {
				'id':id
			},

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Flight Deleted");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadFlight ();
				} else {
					toastr.error("Error Deleting Flight. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

}