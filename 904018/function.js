jQuery(document).ready(function($){

	$(document).ready(function () {
		loadLog ();

	})

})

function loadLog () {
	var tbl_body = '';
	jQuery.ajax({
		url: 'loadLog.php',

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var log_activity = data[i].log_activity;
				var log_user = data[i].log_user;
				var log_date_added = data[i].log_date_added;

				tbl_body += "<tr><td>"+a+"</td><td>"+log_activity+"</td><td>"+log_user+"</td><td>"+log_date_added+"</td></tr>";
			}
			jQuery("#log_body").html(tbl_body);
			jQuery("#log_table").dataTable();
		}
	})
}

function search() {
	var formdata = new FormData(document.querySelector("#searchForm"));
	jQuery("#log_table").dataTable().fnDestroy();
	var tbl_body = '';

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
			for (var i = 0,a = 1; i < data.length, a<data.length+1; i++, a++) {
				var log_activity = data[i].log_activity;
				var log_user = data[i].log_user;
				var log_date_added = data[i].log_date_added;

				tbl_body += "<tr><td>"+a+"</td><td>"+log_activity+"</td><td>"+log_user+"</td><td>"+log_date_added+"</td></tr>";
			}
			jQuery("#log_body").html(tbl_body);
			jQuery("#log_table").dataTable();
		}
	})
}