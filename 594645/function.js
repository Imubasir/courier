jQuery(document).ready(function($){

	$(document).ready(function () {
		loadDiary ();
	})
})

function loadDiary () {
	jQuery.ajax({
		url: 'loadDiary.php',

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var waybill = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var sender_telephone = data[i].sender_telephone;
				var recipient_name = data[i].recipient_name;
				var recipient_telephone = data[i].recipient_telephone;
				var no_items = data[i].no_items;
				var content_descr = data[i].content_descr;
				var weight = new Number(data[i].weight).toFixed(2);
				var volume = new Number(data[i].volume).toFixed(2);
				if(weight > volume) {
					weight = weight;
				} else {
					weight = volume;
				}

				
				tbl_body += "<tr><td>"+a+"</td><td>"+waybill+"</td><td>"+sender_name+"</td><td>"+sender_telephone+"</td><td>"+recipient_name+"</td><td>"+recipient_telephone+"</td><td>"+no_items+"</td><td>"+content_descr+"</td><td>"+weight+"</td></tr>";
			}
			jQuery("#diary_body").html(tbl_body);
			jQuery('#diary_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'Daily Parcels',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
					}
				},
				{
					extend: 'print',
					title: 'Daily Registered Parcels',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
					}
				},
				'colvis'
				]
			} );
		}
	})
}


function customSearch() {
	jQuery("#diary_table").dataTable().fnDestroy();
	var formdata = new FormData(document.querySelector("#searchForm"));
	jQuery("#view_table").dataTable().fnDestroy();

	jQuery.ajax({
		type: 'POST',
		url: 'searchDiary.php',
		data: formdata,
		cache: false,
		contentType: false,
		processData: false,

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var waybill = data[i].parcel_code;
				var sender_name = data[i].sender_name;
				var sender_telephone = data[i].sender_telephone;
				var recipient_name = data[i].recipient_name;
				var recipient_telephone = data[i].recipient_telephone;
				var no_items = data[i].no_items;
				var content_descr = data[i].content_descr;
				var weight = data[i].weight;
				var volume = new Number(data[i].volume);
				if(weight > volume) {
					weight = weight;
				} else {
					weight = volume;
				}
				
				tbl_body += "<tr><td>"+a+"</td><td>"+waybill+"</td><td>"+sender_name+"</td><td>"+sender_telephone+"</td><td>"+recipient_name+"</td><td>"+recipient_telephone+"</td><td>"+no_items+"</td><td>"+content_descr+"</td><td>"+weight+"</td></tr>";
			}

			jQuery("#diary_body").html(tbl_body);
			jQuery("#searchModal").modal("hide");
			jQuery("#searchForm").trigger("reset");
			jQuery('#diary_table').DataTable( {
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

