jQuery(document).ready(function($){

	$(document).ready(function () {
		loadParcels ();
	})
})

function loadParcels () {
	jQuery.ajax({
		url: 'loadParcels.php',

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var date_created = data[i].date_created;
				var parcel_code = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var parcel_code_fk = data[i].parcel_code_fk;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBranchName(data[i].recipient_destination);

				var action = "<button class='btn btn-sm btn-info' onclick='viewDetails(\""+parcel_code+"\")'><i class='fa fa-eye'></i> View</button>";
				if(!parcel_code_fk) {
					var del = "<button class='btn btn-sm btn-danger' onclick='delParcel(\""+parcel_code+"\")'><i class='fa fa-trash'></i> Remove</button>";
				} else {
					var del = "";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+action+"</td><td>"+del+"</td></tr>";
			}
			jQuery("#view_body").html(tbl_body);
			jQuery('#view_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'Daily Parcels',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6]
					}
				},
				{
					extend: 'print',
					title: 'Daily Registered Parcels',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6]
					}
				},
				'colvis'
				]
			} );
		}
	})
}

function viewDetails(parcelcode) {
	jQuery("#details").modal("show");
	jQuery.ajax({
		type: 'POST',
		url: 'parcelDetails.php',
		data: {
			'parcelcode': parcelcode
		},

		success: function (json) {
			
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var parcel_code = data[i].parcel_code;
				var manifest_code = data[i].manifest_code;
				var sender_name = data[i].sender_name;
				var sender_address = data[i].sender_address;
				var sender_location = data[i].sender_location;
				var sender_address = data[i].sender_address;
				// var sender_city = data[i].sender_city;
				var sender_telephone = data[i].sender_telephone;
				var sender_origin = getBranchName(data[i].sender_origin);

				var recipient_name = data[i].recipient_name;
				var recipient_address = data[i].recipient_address;
				var recipient_location = data[i].recipient_location;
				// var recipient_city = data[i].recipient_city;
				var recipient_telephone = data[i].recipient_telephone;
				var recipient_destination = getBranchName(data[i].recipient_destination);
				
				var service_type = data[i].service_type;
				var parcel_type = data[i].parcel_type;
				var no_items = data[i].no_items;
				var weight = new Number(data[i].weight);
				var volume = new Number(data[i].volume);
				if(weight > volume) {
					weight = weight;
				} else {
					weight = volume;
				}
				var amount = new Number(data[i].amount);
				var content_descr = data[i].content_descr;
				var insurance = data[i].insurance;
				var value_of_item = new Number(data[i].value_of_item);
				var date_created = data[i].date_created;
				var created_by = data[i].created_by;

				jQuery("#parcel_code").html(": "+parcel_code);
				jQuery("#manifest_code").html(": "+manifest_code);
				jQuery("#sender_name").html(": "+sender_name);
				jQuery("#sender_address").html(": "+sender_address);
				jQuery("#sender_location").html(": "+sender_location);
				// jQuery("#sender_city").html(": "+sender_city);
				jQuery("#sender_telephone").html(": "+sender_telephone);
				jQuery("#sender_origin").html(": "+sender_origin);

				jQuery("#recipient_name").html(": "+recipient_name);
				jQuery("#recipient_address").html(": "+recipient_address);
				jQuery("#recipient_location").html(": "+recipient_location);
				// jQuery("#recipient_city").html(": "+recipient_city);
				jQuery("#recipient_telephone").html(": "+recipient_telephone);
				jQuery("#recipient_destination").html(": "+recipient_destination);

				jQuery("#service_type").html(": "+service_type);
				jQuery("#parcel_type").html(": "+parcel_type);
				jQuery("#no_items").html(": "+no_items);
				jQuery("#weight").html(": "+weight.toFixed(2)+" Kg");
				jQuery("#amount").html(": GH&#8373; "+amount.toFixed(2));
				jQuery("#content_descr").html(": "+content_descr);
				jQuery("#insurance").html(": "+insurance);
				jQuery("#value_of_item").html(": GH&#8373; "+value_of_item.toFixed(2));
				jQuery("#date_created").html(": "+date_created);
				jQuery("#created_by").html(": "+created_by);

				loadTracking(parcel_code);

				jQuery("#qrcode").barcode(
					parcel_code,
					"code128", {
						showHRI: true,
						barHeight: 45,
						barWidth: 2,
						output: "css",
						fontSize: 20,
						color: "#000000",
						bgColor: "#FFFFFF",
						moduleSize: 3,
						marginHRI: 1,
					}
					);
			}

		}
	})
}


function loadTracking (parcelcode) {
	jQuery.ajax({
		type: 'POST',
		url: 'loadTracking.php',
		data: {
			'parcelcode':parcelcode
		},

		success: function (json) {
			var data = JSON.parse(json);
			var tbl_body = '';

			for (var i = 0; i < data.length; i++) {
				var remark=data[i].remark;
				var location=data[i].branch_name;
				var date_created = data[i].track_date_created;

				tbl_body += "<tr><td>"+date_created+"</td><td>"+location+"</td><td>"+remark+"</td></tr>";
			}
			jQuery("#track_body").html(tbl_body);
		}
	})
}

function customSearch() {
	var formdata = new FormData(document.querySelector("#searchForm"));
	jQuery("#view_table").dataTable().fnDestroy();

	jQuery.ajax({
		type: 'POST',
		url: 'searh.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var date_created = data[i].date_created;
				var parcel_code = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var recipient_name = data[i].recipient_name;
				var parcel_code_fk = data[i].parcel_code_fk;
				var sender_origin = getBranchName(data[i].sender_origin);
				var recipient_destination = getBranchName(data[i].recipient_destination);

				if(!parcel_code_fk) {
					var del = "<button class='btn btn-sm btn-danger' onclick='delParcel(\""+parcel_code+"\")'><i class='fa fa-trash'></i> Remove</button>";
				} else {
					var del = "";
				}

				var action = "<button class='btn btn-sm btn-info' onclick='viewDetails(\""+parcel_code+"\")'><i class='fa fa-eye'></i> View</button>";

				tbl_body += "<tr><td>"+a+"</td><td>"+date_created+"</td><td>"+parcel_code+"</td><td>"+sender_name+"</td><td>"+recipient_name+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+action+"</td><td>"+del+"</td></tr>";
			}
			jQuery("#view_body").html(tbl_body);
			jQuery("#searchModal").modal("hide");
			jQuery("#searchForm").trigger("reset");
			jQuery('#view_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'Daily Parcels',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'print',
					title: 'Daily Parcels',
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

function delParcel (parcelcode) {
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
				url: 'delParcel.php',
				data: {
					'parcelcode':parcelcode
				},

				success: function (responseText) {
					if(responseText == 1) {
						Swal.fire(
							'Deleted!',
							'Parcel has been deleted.',
							'success'
							)
						jQuery('#view_table').dataTable().fnDestroy();
						loadParcels ();
					} else if (responseText == 2) {
						Swal.fire(
							'Notice!',
							'Parcel Assigned to manifest',
							'info'
							)
					} else {
						toastr.error("Error Deleting Parcel. Please Contact your Administrator");
						write_internal_error(responseText);
					}

				}
			})
		}
	})
	
}