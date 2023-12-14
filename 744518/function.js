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
				
				if (manifest_dispatch_status == 1) {
					var action1 = '<span style="background: green;padding: 5px;padding-left: 15px;padding-right:15px;border-radius: 5px;color: white;">Dispatched</span>';
					var action2 = "<button class='btn btn-sm btn-secondary' onclick='print(\""+manifest_code+"\")'><i class='fa fa-print'></i> Print</button>";
				} else if (manifest_dispatch_status == 2) {
					var action1 = '<span style="background: #17a2b8;padding: 5px;padding-left: 15px;padding-right:15px;border-radius: 5px;color: white;display: inline-block;">Received</span>';
					var action2 = "<button class='btn btn-sm btn-secondary' onclick='print(\""+manifest_code+"\")'><i class='fa fa-print'></i> Print</button>";
				} else if (manifest_dispatch_status == 0) {
					var action1 = "<button class='btn btn-sm btn-success' onclick='dispatch(\""+manifest_code+", "+manifest_destination+"\")'><i class='fa fa-send'></i> Dispatch</button>";
					var action2 = "<button class='btn btn-sm btn-secondary' onclick='print(\""+manifest_code+"\")'><i class='fa fa-print'></i> Print</button>";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+action1+"</td><td>"+action2+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery("#manifest_table").dataTable();
		}
	})
}

function dispatch(code) {
	jQuery.ajax({
		type: 'POST',
		url: 'dispatch_manifest.php',
		data: {
			'code': code
		},

		success: function (responseText) {
			console.log(responseText);
			if(responseText == '1') {
				toastr.success("Manifest Dispatched");
				loadManifest ();
			} else {
				toastr.error("Dispatching Error. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function print (code) {
	jQuery("#wayBillModal").modal("show");
	var tbl_body = '';
	var total_weight = 0;

	jQuery.ajax({
		type: 'POST',
		url: 'waybill.php',
		data: {
			'm_code': code
		},

		success: function (json) {
			// console.log(json);
			var data = JSON.parse(json);

			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				// Manifest Details
				var manifest_code = data[i].manifest_code;
				var manifest_origin = getBranchName(data[i].manifest_origin);
				var manifest_destination = getBranchName(data[i].manifest_destination);
				var manifest_flight = data[i].manifest_flight;
				var manifest_dispatcher = getUsername(data[i].manifest_dispatcher);
				var manifest_date_added = data[i].manifest_date_added;
				var manifest_date_dispatched = data[i].manifest_date_dispatched;
				var manifest_date_received = data[i].manifest_date_received;
				var manifest_dispatch_status = data[i].manifest_dispatch_status;

				jQuery("#manifest_code").html(manifest_code);
				jQuery("#manifest_date_created").html(manifest_date_added);
				jQuery("#manifest_source").html(manifest_origin);
				jQuery("#manifest_destination").html(manifest_destination);
				jQuery("#manifest_date_sent").html(manifest_date_dispatched);
				jQuery("#manifest_date_received").html(manifest_date_received);
				jQuery("#manifest_dispatcher").html(manifest_dispatcher);
				jQuery("#manifest_flight").html(manifest_flight);


				//Parcel Details
				var assign_status = data[i].assign_status;

				var parcel_code = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var content_descr = data[i].content_descr;
				if(assign_status == '5') {
					var sender_origin = getBranchName(data[i].sender_origin)+" (RETURN)";
				} else {
					var sender_origin = getBranchName(data[i].sender_origin);
				}
				var recipient_destination = getBranchName(data[i].recipient_destination);
				
				var parcel_weight = new Number(data[i].weight);
				var volume = new Number(data[i].volume);
				if (parcel_weight > volume) {
					weight = parcel_weight;
				} else {
					weight = volume;
				}
				
				// var weight = new Number(data[i].weight);
				total_weight += new Number(weight);
				
				tbl_body += "<tr><td>"+a+"</td><td><div id='"+parcel_code+"' style='letter-spacing: 3px'>"+parcel_code+"</div></td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+content_descr+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+weight.toFixed(2)+"</td></tr>";
			}

			jQuery("#waybill_body").html(tbl_body);
			jQuery("#total_weight").html(total_weight.toFixed(2)+" Kg");
			displayCode();
			jQuery("#manifest_qrcode").barcode(
				code,
				"code128", {
					showHRI: true,
					barHeight: 35,
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
	})
}

function displayCode () {
	var tbl = document.getElementById("waybill_body");
	var rowCount = tbl.rows.length;
	for (var i = 0; i < rowCount; i++) {

		var row = tbl.rows[i];
		var parcelcode = row.cells[1]/*.getElementsByTagName('td')[0]*/;
		var code = parcelcode.textContent;

		jQuery("#"+code).barcode(
				code,
				"code128", {
					showHRI: true,
					barHeight: 30,
					barWidth: 1,
					marginHRI: 1,
					output: "css",
					fontSize: 15,
					color: "#000000",
					bgColor: "#FFFFFF",
					moduleSize: 1,
				}
			);
	}
}