jQuery(document).ready(function($){

	$(document).ready(function () {
		loadGroup ();
		loadPages ();

		$("#checkAll").click(function() {
			if ($(this).prop("checked") == true) {
				var tbl = document.getElementById("paging_body");
				var rowCount = tbl.rows.length;
				$('input[type="checkbox"]').attr('checked', true);

			} else if ($(this).prop("checked") == false) {
				$('input[type="checkbox"]').attr('checked', false);
			}
		})

	})

})

function loadPages () {
	var tbl_body = '';
	var tbl_body2 = '';
	jQuery.ajax({
		url: 'loadPages.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0, a = 1; i < data.length, a<data.length+1; i++, a++) {
				var page_id = data[i].page_id;
				var page = data[i].page;
				var page_cat = data[i].page_cat;

				tbl_body += "<tr><td>"+a+"</td><td>"+page+"</td><td>"+page_cat+"</td></tr>";
				// tbl_body2 += "<tr><td><input type='checkbox' value='"+page_id+"'></td><td>"+page+"</td><td>"+page_cat+"</td></tr>";
			}

			jQuery("#page_body").html(tbl_body);
			// jQuery("#paging_body").html(tbl_body2);
			jQuery("#page_table").dataTable();
		}
	})
}

function loadGroup () {
	var tbl_body = "";

	jQuery.ajax({
		url: 'loadGroup.php',

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var group_id = data[i].group_id;
				var group_name = data[i].group_name;
				var action = "<button class='btn btn-sm btn-info' onclick='pagesModal(\""+group_id+","+group_name+"\")'>Pages</button>"
				tbl_body += "<tr><td>"+a+"</td><td>"+group_name+"</td><td>"+action+"</td></tr>";
			}
			jQuery("#group_body").html(tbl_body);
			jQuery("#group_table").dataTable();
		}
	})
}

function addGroup () {
	var group_name = jQuery("input[name=group_name]").val();

	jQuery.ajax({
		type: 'POST',
		url: 'addGroup.php',
		data: {
			'group': group_name
		},

		success: function(responseText) {
			if(responseText == '1') {
				toastr.success("New Group Created");
				jQuery("input[name=group_name]").val("");
				loadGroup ();
			} else {
				toastr.error("Error Creating Group. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function addPage () {
	jQuery("#page_table").dataTable().fnDestroy();
	var page_name = jQuery("input[name=page_name]").val();
	var page_cat = jQuery("input[name=page_cat]").val();

	jQuery.ajax({
		type: 'POST',
		url: 'addPage.php',
		data: {
			'page': page_name,
			'cat': page_cat
		},

		success: function(responseText) {
			if(responseText == '1') {
				toastr.success("New Page Created");
				jQuery("input[name=page_name]").val("");
				jQuery("input[name=page_cat]").val("");
				loadPages ();
			} else {
				toastr.error("Error Creating Group. Please Contact your Administrator");
				write_internal_error(responseText);
			}
		}
	})
}

function pagesModal(grouping) {
	jQuery("#assignModal").modal("show");
	var group = grouping.split(",");
	var grp_id = group[0];
	var grp_name = group[1];
	jQuery("#group_heading").html(grp_name);

	var tbl_body = "";
	jQuery.ajax({
		url: 'loadPages.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var page_id = data[i].page_id;
				var page = data[i].page;
				var page_cat = data[i].page_cat;

				tbl_body += "<tr><td><input type='checkbox' id='"+page_id+"' value='"+page_id+"'></td><td>"+page+"</td><td>"+page_cat+"</td></tr>";
				checkstate (page_id+","+grp_id);
			}
			jQuery("#paging_body").html(tbl_body);
		}
	})

	jQuery("#saveAccessBtn").off("click").on("click", function() {
		var tbl = document.getElementById("paging_body");
		var rowCount = tbl.rows.length;
		for (var i = 0; i < rowCount; i++) {

			var row = tbl.rows[i];
			var chkbox = row.cells[0].getElementsByTagName('input')[0];
			if (null != chkbox && true == chkbox.checked) {
				var page = chkbox.value;

				addAccess(page+","+grp_id);

			} else if (null != chkbox && false == chkbox.checked) {
				var page = chkbox.value;

				delAccess(page+","+grp_id);
			}
		}
		toastr.info("Access Updated");
		jQuery("#assignModal").modal('hide');
	})
}

function addAccess (codes) {
	var output = codes.split(",");
	var page = output[0];
	var group = output[1];

	jQuery.ajax({
		type: 'POST',
		url: 'addAccess.php',
		data: {
			'page_id': page,
			'group_id': group
		},

		success: function(responseText) {

		}
	})
}

function delAccess (codes) {
	var output = codes.split(",");
	var page = output[0];
	var group = output[1];

	jQuery.ajax({
		type: 'POST',
		url: 'delAccess.php',
		data: {
			'page_id': page,
			'group_id': group
		},

		success: function(responseText) {
			console.log(responseText);
		}
	})
}

function checkstate (para) {
	var data = para.split(",");
	for (var i = 0; i < data.length; i++) {
		var page = data[0];
		var group = data[1];

	}

	jQuery.ajax({
		type: 'POST',
		url: 'checkStatus.php',
		data: {
			'page': page,
			'group': group
		},

		success: function(e) {
			if (e == 1) {
				document.getElementById(page).checked = true;
			}
		}
	})
}