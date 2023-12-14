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
					var manifest_dispatch_status = 'Not Dispatched';
				} else if (manifest_dispatch_status == '1') {
					var manifest_dispatch_status = 'Dispatched';
				} else if (manifest_dispatch_status == '2') {
					var manifest_dispatch_status = 'Received';
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+manifest_date_dispatched+"</td><td>"+manifest_dispatch_status+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery('#manifest_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'List of Manifests',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdf',
					title: 'List of Manifests',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'print',
					title: 'List of Manifests',
					exportOptions: {
						columns: ':visible'
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
					var manifest_dispatch_status = 'Not Dispatched';
				} else if (manifest_dispatch_status == '1') {
					var manifest_dispatch_status = 'Dispatched';
				} else if (manifest_dispatch_status == '2') {
					var manifest_dispatch_status = 'Received';
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+manifest_date_dispatched+"</td><td>"+manifest_dispatch_status+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery('#manifest_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'List of Manifests',
					messageTop: 'List of Manifests for Receiving Items',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdf',
					title: 'List of Manifests',
					messageTop: 'List of Manifest for Receiving Items',
				},
				'colvis'
				]
			} );
			jQuery("#searchModal").modal("hide");
			jQuery("#searchForm").trigger("reset");

		}
	})
}