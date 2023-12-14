jQuery(document).ready(function($){

	$(document).ready(function () {
		loadManifest ();
	})

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

function back () {
	document.getElementById("manifest_div").style.display = 'block';
	document.getElementById("assign_div").style.display = 'none';
	document.getElementById("man_prev").style.display = 'none';
}

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

				var action = "<button class='btn btn-sm btn-success' onclick='assign(\""+manifest_code+"\")'><i class='fa fa-calendar-check-o'></i> Assign</button>";

				tbl_body += "<tr><td>"+a+"</td><td>"+manifest_code+"</td><td>"+manifest_origin+"</td><td>"+manifest_destination+"</td><td>"+manifest_flight+"</td><td>"+manifest_dispatcher+"</td><td>"+manifest_date_added+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#manifest_body").html(tbl_body);
			jQuery("#manifest_table").dataTable();
		}
	})
}

function assign (m_code) {
	document.getElementById("manifest_div").style.display = 'none';
	document.getElementById("assign_div").style.display = 'block';

	load_to_assign (m_code);
	document.getElementById("man_prev").style.display = 'block';
	manifest_preview(m_code);
}

function load_to_assign (m_code) {
	var tbl_body = "";
	jQuery.ajax({
		type: 'POST',
		url: 'load_to_assign.php',
		data: {
			'm_code': m_code
		},

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var date_created = data[i].date_created;
				var parcel_code = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBranchName(data[i].recipient_destination);
				var assign_status = data[i].assign_status;

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

			jQuery("#saveAssignBtn").off("click").on("click", function () {
				saveAssign (m_code);
			})
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

			assign_parcel(code, parcelCode, 'assign');

		} else if (null != chkbox && false == chkbox.checked) {
			var parcelCode = parcel.value;
			
			assign_parcel(code, parcelCode, 'unassign');
		}
	}
		toastr.success("New Consignment Created");
}

function assign_parcel(manifest, parcel, status) {
	jQuery.ajax({
		type: 'POST',
		url: 'assignParcel.php',
		data: {
			'm_code':manifest,
			'p_code': parcel,
			'status': status
		},

		success: function(responseText) {
			console.log(responseText);
			if(responseText == '1') {
				
			} else if (responseText == ''){
				
			} else {
				toastr.error("Error Assigning Consignment. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}

	})
}
