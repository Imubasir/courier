jQuery(document).ready(function($) {
	_sender_origin ();
	$("#view_table").dataTable();
})

function generate () {
	var formdata = new FormData(document.querySelector("#queryForm"));
	var tbl_body = '';
	var tl_weight = 0;
	var tl_amount = 0;

	jQuery("#view_table").dataTable().fnDestroy();
	jQuery.ajax({
		type: 'POST',
		url: 'fetchSent.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			jQuery("#genBtn").html('<img src="../images/loading.gif" width="20px">');
		},
		success: function (json) {
			var data = JSON.parse(json);
			if(data.length == 0) {
				toastr.info("No Data Found");
				jQuery("#genBtn").html('Generate');
			} else {
				jQuery("#genBtn").html('Generate');
				document.getElementById("query_div").style.display = 'none';
				document.getElementById("result_div").style.display = 'grid';

				for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
					var manifest_flight = data[i].manifest_flight;
					if(!manifest_flight) {
						manifest_flight = '-';
					}
					var manifest_code = data[i].manifest_code;
					if(!manifest_code) {
						manifest_code = '-'
					}
					var parcel_code = data[i].parcel_code;
					var sender_origin = data[i].sender_origin;
					var recipient_destination = data[i].recipient_destination;
					var sender_name = data[i].sender_name;
					var sender_telephone = data[i].sender_telephone;
					var recipient_name = data[i].recipient_name;
					var recipient_telephone = data[i].recipient_telephone;
					var pay_type = data[i].pay_type;

					var no_items = data[i].no_items;
					var content_descr = data[i].content_descr;

					var weight = new Number(data[i].weight).toFixed(2);
					var volume = new Number(data[i].volume).toFixed(2);
					if(weight > volume) {
						weight = weight;
					} else {
						weight = volume;
					}
					var amount = new Number(data[i].amount).toFixed(2);

					var pay_method = data[i].pay_method;
					if(!pay_method) {
						pay_method = '-';
					}
					var date_created = data[i].date_created;

					tl_weight += new Number(weight);
					tl_amount += new Number(amount);

					tbl_body += "<tr><td>"+a+"</td><td>"+manifest_flight+"</td><td>"+parcel_code+"</td><td>"+manifest_code+"</td><td>"+pay_type+"</td><td>"+sender_origin+"</td><td>"+recipient_destination+"</td><td>"+sender_name+"</td><td>"+sender_telephone+"</td><td>"+recipient_name+"</td><td>"+recipient_telephone+"</td><td>"+no_items+"</td><td>"+content_descr+"</td><td>"+weight+"</td><td>"+amount+"</td><td>"+pay_method+"</td><td>"+date_created+"</td></tr>";
				}
				jQuery("#view_body").html(tbl_body);
				jQuery('#view_table').DataTable( {
					dom: 'Bfrtip',
					buttons: [ {
						extend: 'excel', footer: true,
						title: 'Report - Overdue Payments',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend: 'print', footer: true,
						title: 'Report - Overdue Payments',
						exportOptions: {
							columns: ':visible'
						}
					},
					'colvis'
					]
				} );

				jQuery("#total_weight").html(tl_weight.toFixed(2)+" Kg");
				jQuery("#total_amount").html("GH&#8373; "+tl_amount.toFixed(2));

			}
		},
		error: function () {
			jQuery("#genBtn").html('Generate');
		}
	})
}

function goback() {
	jQuery("#queryForm").trigger("reset");
	document.getElementById("query_div").style.display = 'block';
	document.getElementById("result_div").style.display = 'none';
}