jQuery(document).ready(function($){

	$(document).ready(function () {
		loadCustomer ();

	})

})

function loadCustomer () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadCustomer.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var cust_id = data[i].cust_id;
				var customer_name = data[i].customer_name;
				var customer_address = data[i].customer_address;
				var customer_phone = data[i].customer_phone;
				var action = "<button class='btn btn-sm btn-info' onclick='edit(\""+cust_id+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+customer_name+"</td><td>"+customer_address+"</td><td>"+customer_phone+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#customer_body").html(tbl_body);
			jQuery('#customer_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'Customers',
					exportOptions: {
						columns: [0, 1, 2, 3]
					}
				},
				{
					extend: 'print',
					title: 'Customers',
					exportOptions: {
						columns: [0, 1, 2, 3]
					}
				},
				'colvis'
				]
			} );
		}
	})
}

function addCustomer() {
	var formdata = new FormData(document.querySelector("#addForm"));

	jQuery.ajax({
		type: 'POST',
		url: 'addCustomer.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Customer Created");
				jQuery("#addForm").trigger("reset");
				jQuery("#addModal").modal("hide");
				loadCustomer ();
			} else {
				toastr.error("Error Creating Customer. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function edit(id) {
	jQuery("#editModal").modal("show");

	jQuery.ajax({
		type: 'POST',
		url: 'fetchCustomer.php',
		data: {
			'id': id
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var name = data[i].customer_name;
				var address = data[i].customer_address;
				var phone = data[i].customer_phone;

				jQuery("input[name=edit_customer_name]").val(name);
				jQuery("textarea[name=edit_customer_address]").val(address);
				jQuery("input[name=edit_customer_phone]").val(phone);
			}
		}
	})
	jQuery("#saveBtn").off("click").on("click", function () {
		var formdata = new FormData(document.querySelector("#editForm"));
		formdata.append("id", id);

		jQuery.ajax({
			type: 'POST',
			url: 'updateCustomer.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Customer Updated");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadCustomer ();
				} else {
					toastr.error("Error Updating Customer. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delBtn").off("click").on("click", function () {
		jQuery.ajax({
			type: 'POST',
			url: 'delCustomer.php',
			data: {
				'id':id
			},

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Customer Deleted");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadCustomer ();
				} else {
					toastr.error("Error Deleting Customer. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})
}