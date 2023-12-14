jQuery(document).ready(function($){

	$(document).ready(function () {
		loadManifest ();
		// updateBill ();

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
					var action = "<button class='btn btn-sm btn-info' onclick='receive_manifest(\""+manifest_code+"\")'><i class='fa fa-handshake-o'></i> Receive Manifest</button>";
				} else if (manifest_dispatch_status == '2') {
					var manifest_dispatch_status = 'Received';
					var action = "<button class='btn btn-sm btn-success' onclick='receive_parcel(\""+manifest_code+"\")'>Receive Parcels</button>";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+manifest_date_dispatched+"</td><td>"+manifest_dispatch_status+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery("#manifest_table").dataTable();
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
			// console.log(json);
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
					var action = "<button class='btn btn-sm btn-info' onclick='receive_manifest(\""+manifest_code+"\")'><i class='fa fa-handshake-o'></i> Receive Manifest</button>";
				} else if (manifest_dispatch_status == '2') {
					var manifest_dispatch_status = 'Received';
					var action = "<button class='btn btn-sm btn-success' onclick='receive_parcel(\""+manifest_code+"\")'>Receive Parcels</button>";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+manifest_date_dispatched+"</td><td>"+manifest_dispatch_status+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery("#manifest_table").dataTable();
			jQuery("#searchModal").modal("hide");
			jQuery("#searchForm").trigger("reset");

		}
	})
}

function receive_manifest (code) {
	jQuery.ajax({
		type: 'POST',
		url: 'receive_manifest.php',
		data: {
			'm_code': code
		},

		success: function (responseText) {
			// console.log(responseText);
			toastr.success("Manifest Received");
			loadManifest ();
			receive_parcel(code);
		}
	})
}

function receive_parcel (code) {
	document.getElementById("manifest_div").style.display = 'none';
	document.getElementById("parcel_div").style.display = 'block';
	var tbl_body = '';
	jQuery.ajax({
		type: 'POST',
		url: 'list_parcels.php',
		data: {
			'm_code': code
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var parcel_code = data[i].parcel_code;
				var manifest_code = data[i].manifest_code;
				var date_created = data[i].date_created;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBranchName(data[i].recipient_destination);
				var date_received = data[i].date_received;
				var assign_status = data[i].assign_status;

				if(assign_status == '1') {
					status = "<label style='background-color: red;color: white;padding:5px;border-radius:3px'>Pending</label>";
					var action = "<button class='btn btn-sm btn-info' onclick='receive_item(\""+parcel_code+", "+manifest_code+",sending"+"\")'>Receive Item</button>";
				} else if (assign_status == '2') {
					status = "<label style='background-color: green;color: white;padding:5px;border-radius:3px'>Received";
					var action = "";
				} else if (assign_status == '3') {
					status = "<label style='background-color: green;color: white;padding:5px;border-radius:3px'>Delivered";
					var action = "";
				} else if (assign_status == '5') {
					status = "<label style='background-color: #17a2b8;color: white;padding:5px;border-radius:3px'>Returned Item";
					var action = "<button class='btn btn-sm btn-info' onclick='receive_item(\""+parcel_code+","+manifest_code+",returned"+"\")'>Receive Item</button>";
				} else if (assign_status == '6') {
					status = "<label style='background-color: #17a2b8;color: white;padding:5px;border-radius:3px'>Returned Item Received";
					var action = "";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+parcel_code+"</td><td>"+date_created+"</td><td>"+date_received+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+status+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#receive_body").html(tbl_body);
			jQuery("#receive_tbl").dataTable();
		}
	})
}

function receive_item (code) {
	jQuery.ajax({
		type: 'POST',
		url: 'receive_item.php',
		data: {
			'code': code
		},

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("Item Received");
				reloadItems (code);
			} else {
				toastr.error("Receiving Error. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function reloadItems (code) {
	var outputs = code.split(",");
	var p_code = outputs[0];
	var m_code = outputs[1];

	jQuery("#receive_tbl").dataTable().fnDestroy();
	var tbl_body = '';
	jQuery.ajax({
		type: 'POST',
		url: 'list_parcels.php',
		data: {
			'm_code': m_code
		},

		success: function (json) {
			// console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var parcel_code = data[i].parcel_code;
				var manifest_code = data[i].manifest_code;
				var date_created = data[i].date_created;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBrancName(data[i].recipient_destination);
				var date_received = data[i].date_received;
				var assign_status = data[i].assign_status;
				
				if(assign_status == '1') {
					status = "<label style='background-color: red;color: white;padding:5px;border-radius:3px'>Pending</label>";
					var action = "<button class='btn btn-sm btn-info' onclick='receive_item(\""+parcel_code+", "+manifest_code+"\")'>Receive Item</button>";
				} else if (assign_status == '2') {
					status = "<label style='background-color: green;color: white;padding:5px;border-radius:3px'>Received";
					var action = "";
				} else if (assign_status == '3') {
					status = "<label style='background-color: green;color: white;padding:5px;border-radius:3px'>Delivered";
					var action = "";
				} else if (assign_status == '5') {
					status = "<label style='background-color: #17a2b8;color: white;padding:5px;border-radius:3px'>Returned Item";
					var action = "<button class='btn btn-sm btn-info' onclick='receive_item(\""+parcel_code+","+manifest_code+",returned"+"\")'>Receive Item</button>";
				} else if (assign_status == '6') {
					status = "<label style='background-color: #17a2b8;color: white;padding:5px;border-radius:3px'>Returned Item Received";
					var action = "";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+parcel_code+"</td><td>"+date_created+"</td><td>"+date_received+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+status+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#receive_body").html(tbl_body);
			jQuery("#receive_tbl").dataTable();

		}
	})
}

function fetchOverDue () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'overdue.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var parcel_code = data[i].parcel_code;
				var manifest_code = data[i].manifest_code;
				var date_created = data[i].date_created;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBranchName(data[i].recipient_destination);
				var date_received = data[i].date_received;
				var assign_status = data[i].assign_status;

				var status = "<label style='background-color: red;color: white;padding:5px;border-radius:3px'>Overdue</label>";

				var action = "<button class='btn btn-sm btn-info' onclick='return_item(\""+parcel_code+", "+manifest_code+"\")'>Return Item</button>";
				

				tbl_body += "<tr><td>"+a+"</td><td>"+parcel_code+"</td><td>"+date_created+"</td><td>"+date_received+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+status+"</td><td>"+action+"</td></tr>";
			}

			jQuery("#overdue_body").html(tbl_body);
			jQuery("#overdue_tbl").dataTable();
		}
	})
}

function return_item (values) {
	var codes = values.split(",");
	var m_code = codes[1];

	jQuery.ajax({
		type: 'POST',
		url: 'return_item.php',
		data: {
			'code': values
		},

		success: function (response) {
			console.log(response);
			if(response == '1') {
				toastr.success("Scheduled for Return");
				fetchOverDue ();
				receive_parcel(m_code);
			} else {
				toastr.error("Return Error. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function goBack() {
	document.getElementById("parcel_div").style.display = 'none';
	document.getElementById("manifest_div").style.display = 'block';
}