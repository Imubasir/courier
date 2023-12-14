jQuery(document).ready(function($){

	$(document).ready(function () {
		loadPayment ();

	})

})

function loadPayment () {
	var tbl_body = '';
	var weight = 0;
	var amount = 0;
	jQuery.ajax({
		url: 'loadPayment.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var parcel_code_fk = data[i].parcel_code_fk;
				var pay_type = data[i].pay_type;
				var parcel_sender = data[i].sender_name;
				var parcel_recipient = data[i].recipient_name;
				var parcel_origin = getBranchName(data[i].sender_origin);
				var parcel_destination = getBranchName(data[i].recipient_destination);
				var parcel_weight = new Number(data[i].weight);
				
				var volume = new Number(data[i].volume);
				if(parcel_weight > volume) {
					parcel_weight = parcel_weight;
				} else {
					parcel_weight = volume;
				}

				var parcel_amount = new Number(data[i].amount);
				var insured = data[i].insured;
				var insured_value = new Number(data[i].insured_value);
				var payment_date = data[i].payment_date;
				var received_by = data[i].received_by;
				var payment_branch = data[i].payment_branch;
				amount += new Number(parcel_amount);
				weight += new Number(parcel_weight);

				if(pay_type == 'NEW') {
					pay_type = "NEW PARCEL";
				} else if (pay_type == "RETURN") {
					pay_type = "RETURN PARCEL";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+payment_date+"</td><td>"+parcel_code_fk+"</td><td>"+pay_type+"</td><td>"+parcel_sender+"</td><td>"+parcel_recipient+"</td><td>"+parcel_origin+"</td><td>"+parcel_destination+"</td><td>"+parcel_weight.toFixed(2)+"</td><td>"+parcel_amount.toFixed(2)+"</td><td>"+payment_date+"</td></tr>";
			}
			jQuery("#view_body").html(tbl_body);
			jQuery("#amount").html("GH&#8373; "+amount.toFixed(2));
			jQuery("#weight").html(weight.toFixed(2)+" Kg");
			jQuery('#view_table').DataTable( {
					dom: 'Bfrtip',
					buttons: [ {
						extend: 'excel', footer: true,
						title: 'Payments',
						messageTop: 'Payments',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend: 'print', footer: true,
						title: 'Payments',
						messageTop: 'Payments',
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

function customSearch() {
	var formdata = new FormData(document.querySelector("#searchForm"));
	jQuery("#view_table").dataTable().fnDestroy();
	var tbl_body = '';
	var weight = 0;
	var amount = 0;

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
			var tbl_body = "";
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var parcel_code_fk = data[i].parcel_code_fk;
				var pay_type = data[i].pay_type;
				var parcel_sender = data[i].sender_name;
				var parcel_recipient = data[i].recipient_name;
				var parcel_origin = getBranchName(data[i].sender_origin);
				var parcel_destination = getBranchName(data[i].recipient_destination);
				var parcel_weight = new Number(data[i].weight);
				var volume = new Number(data[i].volume);
				if(parcel_weight > volume) {
					parcel_weight = parcel_weight;
				} else {
					parcel_weight = volume;
				}
				var parcel_amount = new Number(data[i].amount);
				var insured = data[i].insured;
				var insured_value = new Number(data[i].insured_value);
				var payment_date = data[i].payment_date;
				var received_by = getUsername(data[i].received_by);
				var payment_branch = data[i].payment_branch;
				amount += new Number(parcel_amount);
				weight += new Number(parcel_weight);

				if(pay_type == 'NEW') {
					pay_type = "NEW PARCEL";
				} else if (pay_type == "RETURN") {
					pay_type = "RETURN PARCEL";
				}

				tbl_body += "<tr><td>"+a+"</td><td>"+payment_date+"</td><td>"+parcel_code_fk+"</td><td>"+pay_type+"</td><td>"+parcel_sender+"</td><td>"+parcel_recipient+"</td><td>"+parcel_origin+"</td><td>"+parcel_destination+"</td><td>"+parcel_weight.toFixed(2)+"</td><td>"+parcel_amount.toFixed(2)+"</td><td>"+payment_date+"</td></tr>";
			}
			jQuery("#view_body").html(tbl_body);
			jQuery("#amount").html("GH&#8373; "+amount.toFixed(2));
			jQuery("#weight").html(weight.toFixed(2)+" Kg");
			jQuery('#view_table').DataTable( {
					dom: 'Bfrtip',
					buttons: [ {
						extend: 'excel', footer: true,
						title: 'Payments',
						messageTop: 'Payments',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend: 'print', footer: true,
						title: 'Payments',
						messageTop: 'Payments',
						exportOptions: {
							columns: ':visible'
						}
					},
					'colvis'
					]
				} );

			jQuery("#searchForm").trigger("reset");
			jQuery("#searchModal").modal("hide");
		}
	})
}