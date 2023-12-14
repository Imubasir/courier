jQuery(document).ready(function($){

	$(document).ready(function () {
		loadParcelsTypes ();
	})
})

function loadParcelsTypes () {
	jQuery.ajax({
		url: 'loadParcelsTypes.php',

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a = 1; i < data.length, a < data.length+1; i++, a++) {
				var type = data[i].parcelType_code;
				var descr = data[i].parcelType_descr;

				tbl_body += "<tr><td>"+a+"</td><td>"+type+"</td><td>"+descr+"</td></tr>";
			}
			jQuery("#type_body").html(tbl_body);
			jQuery('#type_table').DataTable( {
				dom: 'Bfrtip',
				buttons: [ {
					extend: 'excel',
					title: 'Parcel Types',
					exportOptions: {
						columns: [0, 1, 2]
					}
				},
				{
					extend: 'print',
					title: 'Parcel Types',
					exportOptions: {
						columns: [0, 1, 2]
					}
				},
				'colvis'
				]
			} );
		}
	})
}

