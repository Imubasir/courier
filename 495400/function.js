jQuery(document).ready(function($){

	$(document).ready(function () {
		loadRates ();
		loadTypes ();

	})

})

function loadRates () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadRates.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var rate_id = data[i].rate_id;
				var rate_weight_from = data[i].rate_weight_from;
				var rate_weight_to = data[i].rate_weight_to;
				var rate_weight = rate_weight_from+" - "+rate_weight_to;
				var price = data[i].price;

				var action = "<button class='btn btn-sm btn-info' onclick='edit(\""+rate_id+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+rate_weight+"</td><td>"+price+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#rate_body").html(tbl_body);
			jQuery("#rate_table").dataTable();
		}
	})
}

function addRate() {
	var formdata = new FormData(document.querySelector("#searchForm"));

	jQuery.ajax({
		type: 'POST',
		url: 'addRate.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Rate Created");
				jQuery("#searchForm").trigger("reset");
				jQuery("#addModal").modal("hide");
				loadRates ();
			} else {
				toastr.error("Error Creating Rate. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function edit(id) {
	jQuery("#editModal").modal("show");
	
	jQuery.ajax({
		type: 'POST',
		url: 'fetchRate.php',
		data: {
			'id': id
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var rate_id = data[i].rate_id;
				var rate_weight_from = data[i].rate_weight_from;
				var rate_weight_to = data[i].rate_weight_to;
				var price = data[i].price;
				
				jQuery("input[name=edit_weight_from]").val(rate_weight_from);
				jQuery("input[name=edit_weight_to]").val(rate_weight_to);
				jQuery("input[name=edit_price]").val(price);
			}
		}
	})

	jQuery("#saveBtn").off("click").on("click", function () {
		var formdata = new FormData(document.querySelector("#editForm"));
		formdata.append("id", id);

		jQuery.ajax({
			type: 'POST',
			url: 'updateRate.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Rate Updated");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadRates ();
				} else {
					toastr.error("Error Updating Rate. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delBtn").off("click").on("click", function () {
		jQuery.ajax({
			type: 'POST',
			url: 'delRate.php',
			data: {
				'id':id
			},

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Rate Deleted");
					jQuery("#editForm").trigger("reset");
					jQuery("#editModal").modal("hide");
					loadRates ();
				} else {
					toastr.error("Error Deleting Rate. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

}

function loadTypes () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadTypes.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var id = data[i].parcelType_id;
				var code = data[i].parcelType_code;
				var descr = data[i].parcelType_descr;
				
				var action = "<button class='btn btn-sm btn-info' onclick='editType(\""+id+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+code+"</td><td>"+descr+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#type_body").html(tbl_body);
			jQuery("#type_table").dataTable();
		}
	})
}

function addType() {
	var formdata = new FormData(document.querySelector("#typeForm"));

	jQuery.ajax({
		type: 'POST',
		url: 'addType.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.success("New Type Created");
				jQuery("#typeForm").trigger("reset");
				jQuery("#addTypeModal").modal("hide");
				loadTypes ();
			} else {
				toastr.error("Error Creating Type. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function editType(id) {
	jQuery("#editTypeModal").modal("show");
	
	jQuery.ajax({
		type: 'POST',
		url: 'fetchType.php',
		data: {
			'id': id
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var code = data[i].parcelType_code;
				var descr = data[i].parcelType_descr;
				
				jQuery("input[name=edit_type_code]").val(code);
				jQuery("input[name=edit_type_descr]").val(descr);
			}
		}
	})

	jQuery("#editTypeBtn").off("click").on("click", function () {
		var formdata = new FormData(document.querySelector("#editTypeForm"));
		formdata.append("id", id);

		jQuery.ajax({
			type: 'POST',
			url: 'updateType.php',
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Type Updated");
					jQuery("#editTypeForm").trigger("reset");
					jQuery("#editTypeModal").modal("hide");
					loadTypes ();
				} else {
					toastr.error("Error Updating Type. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})

	jQuery("#delTypeBtn").off("click").on("click", function () {
		jQuery.ajax({
			type: 'POST',
			url: 'delType.php',
			data: {
				'id':id
			},

			success: function (responseText) {
				if(responseText == '1') {
					toastr.success("Type Deleted");
					jQuery("#editTypeForm").trigger("reset");
					jQuery("#editTypeModal").modal("hide");
					loadTypes ();
				} else {
					toastr.error("Error Deleting Type. Please Contact your Administrator");
					write_internal_error(responseText);
				}
			}
		})
	})
}

function loadVariables () {
	var tbl_body = '';

	jQuery.ajax({
		url: 'loadVariables.php',

		success: function (json) {
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var constant_id = data[i].constant_id;
				var rate_constant = data[i].rate_constant;
				var return_rate = data[i].return_rate;

				var action1 = "<button class='btn btn-info btn-sm' onclick='editRateConstant(\""+constant_id+"\")'>Edit</button>";
				var action2 = "<button class='btn btn-info btn-sm' onclick='editReturnConstant(\""+constant_id+"\")'>Edit</button>";
				tbl_body += "<tr><th>Above Base Amount</th><td>"+rate_constant+"</td><td>"+action1+"</td></tr>";
				tbl_body += "<tr><th>Return Cost</th><td>"+return_rate+"</td><td>"+action2+"</td></tr>";
			}

			jQuery("#variable_body").html(tbl_body);
		}
	})
}

function editRateConstant (const_id) {

	jQuery.ajax({
		type: 'POST',
		url: 'loadVariable.php',
		data: {
			'const_id': const_id
		},

		success: function (json) {
			jQuery("#editConstantModal").modal("show");
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var constant_id = data[i].constant_id;
				var rate_constant = data[i].rate_constant;

				jQuery("input[name=r_constant]").val(rate_constant);
			}

			jQuery("#saveConstantBtn").off("click").on("click", function() {
				var newConstant = jQuery("input[name=r_constant]").val();

				jQuery.ajax({
					type: 'POST',
					url: 'updateConstant.php',
					data: {
						'const_id': const_id,
						'newConstant': newConstant
					},

					success: function (responseText) {
						if(responseText == '1') {
							toastr.info("Rate Constant Updated");
							jQuery("#editConstantModal").modal("hide");
							loadVariables ();
						} else {
							toastr.error("Update Failed. Please Contact your Administrator");
							write_internal_error(responseText);
						}
					}
				})
			})
		}
	})
}

function editReturnConstant (const_id) {

	jQuery.ajax({
		type: 'POST',
		url: 'loadVariable.php',
		data: {
			'const_id': const_id
		},

		success: function (json) {
			jQuery("#editReturnConstantModal").modal("show");
			var data = JSON.parse(json);

			for (var i = 0; i < data.length; i++) {
				var constant_id = data[i].constant_id;
				var return_rate = data[i].return_rate;

				jQuery("input[name=return_constant]").val(return_rate);
			}

			jQuery("#saveReturnConstantBtn").off("click").on("click", function() {
				var newReturn = jQuery("input[name=return_constant]").val();

				jQuery.ajax({
					type: 'POST',
					url: 'updateReturn.php',
					data: {
						'const_id': const_id,
						'newReturn': newReturn
					},

					success: function (responseText) {
						if(responseText == '1') {
							toastr.info("Return Rate Updated");
							jQuery("#editReturnConstantModal").modal("hide");
							loadVariables ();
						} else {
							toastr.error("Return Rate Update Failed. Please Contact your Administrator");
							write_internal_error(responseText);
						}
					}
				})
			})
		}
	})
}

function loadOverdue() {
	var tbl_body = "";
	jQuery.ajax({
		url: 'loadOverdue.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var over_id = data[i].over_id;
				var over_from = data[i].over_from;
				var over_to = data[i].over_to;
				var range = over_from+" - "+over_to;
				var over_amount =  data[i].over_amount;

				var btn = "<button class='btn btn-sm btn-info' onclick='editOverdue(\""+over_id+"\")'>Edit</button>";
				tbl_body += "<tr><td>"+a+"</td><td>"+range+"</td><td>"+over_amount+"</td><td>"+btn+"</td></tr>";
			}
			jQuery("#overdue_body").html(tbl_body);
			jQuery("#overdue_table").DataTable();

		}
	})
}

function addOverDue() {
	var formdata = new FormData(document.querySelector("#overdueForm"));
	jQuery.ajax({
		type: 'POST',
		url: 'addOverdue.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (responseText) {
			if(responseText == '1') {
				toastr.info("Amount Added");
				jQuery("#addOverdueModal").modal("hide");
				jQuery("#overdueForm").trigger("reset");
				loadOverdue();
			} else {
				toastr.error("Amount Failed. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function editOverdue(over_id) {
	jQuery("#editOverdueModal").modal("show");
	jQuery.ajax({
		type: 'POST',
		url: 'loadOverdue_single.php',
		data: {
			'id': over_id
		},

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var over_id = data[i].over_id;
				var over_from = data[i].over_from;
				var over_to = data[i].over_to;
				var over_amount =  data[i].over_amount;

				jQuery("input[name=edit_day_from]").val(over_from);
				jQuery("input[name=edit_day_to]").val(over_to);
				jQuery("input[name=edit_overdue_amount]").val(over_amount);
			}

			jQuery("#editBtn").off("click").on("click", function () {
				var formdata = new FormData(document.querySelector("#editOverdueForm"));
				formdata.append("id", over_id);

				jQuery.ajax({
					type: 'POST',
					url: 'editOverdue.php',
					data: formdata,
					cache: false,
					contentType: false,
					processData: false,

					success: function (responseText) {
						if(responseText == '1') {
							toastr.info("Overdue Updated");
							jQuery("#editOverdueModal").modal("hide");
							jQuery("#overdueForm").trigger("reset");
							loadOverdue();
						} else {
							toastr.error("Overdue Update Failed. Please Contact your Administrator");
							write_internal_error(responseText);
						}
					}
				})
			})
		}

	})
}