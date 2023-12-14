jQuery(document).ready(function($){

	$(document).ready(function () {
		// $("#result_tbl").dataTable();
		create_manifest_dest ();
		flights ();
		system_users ();

		$("#checkAll").click(function() {
			if ($(this).prop("checked") == true) {
				var tbl = document.getElementById("result_body");
				var rowCount = tbl.rows.length;
				$('input[type="checkbox"]').attr('checked', true);

			} else if ($(this).prop("checked") == false) {
				$('input[type="checkbox"]').attr('checked', false);
			}
		})
	})

})
function back () {
	document.getElementById("create_div").style.display = 'block';
	document.getElementById("assign_div").style.display = 'none';
	document.getElementById("man_prev").style.display = 'none';
}


function create_manifest () {
	var manifest_destination = jQuery("#manifest_destination").val();
	var manifest_dispatcher = jQuery("#manifest_dispatcher").val();
	var manifest_flight = jQuery("select[name=manifest_flight]").val();

	if(manifest_destination == '') {
		toastr.info("Please select manifest destination");
	} else if (manifest_dispatcher == '') {
		toastr.info("Please select manifest dispatcher");
	} else if (manifest_flight == '') {
		toastr.info("Please select flight");
	} else {


		var formdata = new FormData(document.querySelector("#manifestForm"));

		jQuery.ajax({
			type: 'POST',
			url: 'createManifest.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			beforeSend: function() {
				jQuery("#genBtn").html('<img src="../images/loading.gif" width="20px">');
			},

			success: function (responseText) {
				jQuery("#genBtn").html("<i class='fa fa-save'></i> Create");
				var output = responseText.split("|");
				var status = output[0];
				var code = output[1];

				if(status == '1') {
					toastr.success("Manifest Created");
					jQuery("#manifestForm").trigger("reset");

					document.getElementById("create_div").style.display = 'none';
					document.getElementById("assign_div").style.display = 'block';

					load_to_assign ();
					document.getElementById("man_prev").style.display = 'block';
					manifest_preview(code);

					jQuery("#saveAssignBtn").off("click").on("click", function () {
						saveAssign (code);
					})
				} else {
					toastr.error("Error Creating Manifest. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	}
}

function load_to_assign () {
	var tbl_body = "";
	jQuery.ajax({
		url: 'load_to_assign.php',

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var date_created = data[i].date_created;
				var parcel_code = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var assign_status = data[i].assign_status;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBranchName(data[i].recipient_destination);

				if(assign_status == 0) {
					tbl_body += "<tr><td><input type='hidden' value='"+parcel_code+"_sending'/>"+a+"</td><td><input type='checkbox' id='"+parcel_code+"' /></td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td></tr>";
				} else if (assign_status == 1) {
					tbl_body += "<tr><td><input type='hidden' value='"+parcel_code+"_sending'/>"+a+"</td><td><input type='checkbox' id='"+parcel_code+"' checked/></td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td></tr>";
				} else if (assign_status == 4) {
					tbl_body += "<tr style='background: #bda6f3'><td><input type='hidden' value='"+parcel_code+"_return'/>"+a+"</td><td><input type='checkbox' id='"+parcel_code+"' /></td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td></tr>";
				} else if (assign_status == 5) {
					tbl_body += "<tr style='background: #bda6f3'><td><input type='hidden' value='"+parcel_code+"_return'/>"+a+"</td><td><input type='checkbox' id='"+parcel_code+"' checked /></td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td></tr>";
				}

			}
			jQuery("#result_body").html(tbl_body);
			jQuery("#result_tbl").dataTable();
		}
	})
}

function saveAssign(code) {
	var tbl = document.getElementById("result_body");
	var rowCount = tbl.rows.length;
	for (var i = 0; i < rowCount; i++) {

		var row = tbl.rows[i];
		var parcel = row.cells[0].getElementsByTagName('input')[0];
		var chkbox = row.cells[1].getElementsByTagName('input')[0];
		if (null != chkbox && true == chkbox.checked) {
			var parcelCode = parcel.value;

			assign(code, parcelCode, 'assign');

		} else if (null != chkbox && false == chkbox.checked) {
			var parcelCode = parcel.value;
			
			assign(code, parcelCode, 'unassign');
		}
	}
	toastr.success("New Consignment Created");
}

function assign(manifest, parcel, status) {
	jQuery.ajax({
		type: 'POST',
		url: 'assignParcel.php',
		data: {
			'm_code':manifest,
			'p_code': parcel,
			'status': status
		},

		success: function(responseText) {
			if(responseText == '1') {
				// toastr.success("New Consignment Created");
			} else {
				toastr.error("Error Assigning Consignment. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}

	})
}
