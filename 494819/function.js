jQuery(document).ready(function($){

	$(document).ready(function () {
		loadManifest ();

	})

})

function loadManifest () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadManifest.php',

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);

			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var manifest_code = data[i].manifest_code;
				var manifest_origin = getBranchName(data[i].manifest_origin);
				var manifest_destination = getBranchName(data[i].manifest_destination);
				var manifest_flight = data[i].manifest_flight;
				var manifest_dispatcher = getUsername(data[i].manifest_dispatcher);
				var manifest_date_added = data[i].manifest_date_added;
				var manifest_date_dispatched = data[i].manifest_date_dispatched;
				var manifest_dispatch_status = data[i].manifest_dispatch_status;
				
				if(manifest_dispatch_status == '0') {
					var action = "<button class='btn btn-sm btn-danger' onclick='delManifest(\""+manifest_code+"\")'><i class='fa fa-trash'></i> Remove</button>";
					var manifest_dispatch_status = '<span style="background: #dc3545;padding: 5px;padding-right: 7px;padding-left: 7px;border-radius: 5px;color: white;white-space: nowrap;display: inline-block;">Not Dispatched</span>';
				} else if (manifest_dispatch_status == '1') {
					var action = "";
					var manifest_dispatch_status = '<span style="background: green;padding: 5px;padding-right: 15px;padding-left: 15px;border-radius: 5px;color: white;display: inline-block;">Dispatched</span>';
				} else if (manifest_dispatch_status == '2') {
					var action = "";
					var manifest_dispatch_status = '<span style="background: #17a2b8;padding: 5px;padding-right: 15px;padding-left: 15px;border-radius: 5px;color: white;display: inline-block;">Received</span>';
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+manifest_date_dispatched+"</td><td>"+manifest_dispatch_status+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery('#manifest_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'List of Manifests',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
					}
				},
				{
					extend: 'print',
					title: 'List of Manifests',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
					}
				},
				'colvis'
				]
			} );
		}
	})
}

function search () {
	jQuery("#manifest_table").dataTable().fnDestroy();
	var formdata = new FormData(document.querySelector("#searchForm"));
	var tbl_body = '';

	jQuery.ajax({
		type: 'POST',
		url: 'search.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var manifest_code = data[i].manifest_code;
				var manifest_origin = getBranchName(data[i].manifest_origin);
				var manifest_destination = getBranchName(data[i].manifest_destination);
				var manifest_flight = data[i].manifest_flight;
				var manifest_dispatcher = data[i].manifest_dispatcher;
				var manifest_date_added = data[i].manifest_date_added;
				var manifest_date_dispatched = data[i].manifest_date_dispatched;
				var manifest_dispatch_status = data[i].manifest_dispatch_status;
				
				if(manifest_dispatch_status == '0') {
					var action = "<button class='btn btn-sm btn-danger' onclick='delManifest(\""+manifest_code+"\")'><i class='fa fa-trash'></i> Remove</button>";
					var manifest_dispatch_status = '<span style="background: #dc3545;padding: 5px;padding-right: 7px;padding-left: 7px;border-radius: 5px;color: white;white-space: nowrap;display: inline-block;">Not Dispatched</span>';
				} else if (manifest_dispatch_status == '1') {
					var action = "";
					var manifest_dispatch_status = '<span style="background: green;padding: 3px;border-radius: 1px;color: white;display: inline-block;">Dispatched</span>';
				} else if (manifest_dispatch_status == '2') {
					var action = "";
					var manifest_dispatch_status = '<span style="background: #17a2b8;padding: 5px;padding-right: 15px;padding-left: 15px;border-radius: 5px;color: white;">Received</span>';
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+manifest_date_dispatched+"</td><td>"+manifest_dispatch_status+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery('#manifest_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					messageTop: 'List of Manifests',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'print',
					messageTop: 'List of Manifests',
					exportOptions: {
						columns: ':visible'
					}
				},
				'colvis'
				]
			} );
			jQuery("#searchModal").modal("hide");
			jQuery("#searchForm").trigger("reset");

		}
	})
}

function delManifest(code) {
	Swal.fire({
		title: 'Are you sure?',
		text: 'You won\'t be able to revert this',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#e06666',
		confirmButtonText: 'Yes, delete it'
	}).then((result) => {
		if(result.isConfirmed) {
			jQuery.ajax({
				type: 'POST',
				url: 'delManifest.php',
				data: {
					'manifestCode':code
				},

				success: function (responseText) {
					if(responseText == 1) {
						Swal.fire(
							'Deleted!',
							'Manifest has been deleted.',
							'success'
							)
						jQuery('#manifest_table').dataTable().fnDestroy();
						loadManifest ();
					} else if (responseText == 2) {
						Swal.fire(
							'Notice!',
							'Parcels assigned to manifest',
							'info'
							)
					} else {
						toastr.error("Error Deleting Manifest. Please Contact your Administrator");
						write_internal_error(responseText);
					}

				}
			})
		}
	})
}