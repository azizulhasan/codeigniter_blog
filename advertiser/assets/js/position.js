$(document).ready(function () {
	$("#admin_position").DataTable();

	/*  When user click add user button */

	$("#create-new-position").click(function () {
		$("#btn-save").val("create-position");
		$("#btn-save").trigger("reset");
		$("#btn-save").html("Save Changes");
		$("#positon_id").val("");
		$("#positionForm").trigger("reset");
		$("#positionCrudModal").html("Add New Position");
		$("#ajax-blog-modal").modal("show");
	});

	/* When click edit user */

	$("body").on("click", ".edit-position", function () {
		var positon_id = $(this).data("id");

		$.ajax({
			type: "Post",
			url: $("meta[name='url']").attr("content") + "admin/position/get_by_id",
			data: {
				id: positon_id,
			},
			dataType: "json",
			success: function (res) {
				if (res.success == true) {
					$("#title-error").hide();
					$("#blog_code-error").hide();
					$("#description-error").hide();
					$("#positionCrudModal").html("Edit Position");
					$("#btn-save").val("edit-position");
					$("#btn-save").html("Update Position");
					$("#ajax-blog-modal").modal("show");
					$("#position_id").val(res.data[0].id);
					$("#position_name").val(res.data[0].position_name);
				}
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	});

	$("body").on("click", ".delete-position", function () {
		var positon_id = $(this).data("id");
		console.log(positon_id);
		if (confirm("Are You sure want to delete !")) {
			$.ajax({
				type: "POST",
				url: $("meta[name='url']").attr("content") + "admin/position/delete",
				data: {
					id: positon_id,
				},
				dataType: "json",
				success: function (data) {
					if (data.status == true) {
						$("#position_id_" + positon_id).remove();
					}
				},
				error: function (data) {
					console.log("Error:", data);
				},
			});
		}
	});
});

if ($("#positionForm").length > 0) {
	$("#positionForm").validate({
		submitHandler: function (form) {
			var actionType = $("#btn-save").val();
			$("#btn-save").html("Sending..");
			var position_name = $("#position_name").val();
			var id = $("#position_id").val();

			// Create an FormData object
			var data = new FormData();
			// If you want to add an extra field for the FormData

			data.append("position_name", position_name);

			if (id) {
				data.append("id", id);
			}

			$.ajax({
				data: data,
				url: $("meta[name='url']").attr("content") + "position/store",
				type: "POST",
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (res) {
					console.log(res);
					console.log(res.data[0].position_name);
					var position =
						'<tr id="position_id_' +
						res.data[0].id +
						'"><td>' +
						res.data[0].id +
						"</td><td>" +
						res.data[0].position_name +
						"</td>";

					position +=
						'<td><a href="javascript:void(0)" id="" data-id="' +
						res.data[0].id +
						'" class="btn btn-info edit-position">Edit</a><a href="javascript:void(0)" id="" data-id="' +
						res.data[0].id +
						'" class="btn btn-danger delete-user delete-position">Delete</a></td></tr>';

					if (actionType == "create-position") {
						$("#position_list").prepend(position);
					} else {
						$("#position_id_" + res.data[0].id).replaceWith(position);
					}
					$("#positionForm").trigger("reset");
					$("#ajax-blog-modal").modal("hide");
					$("#btn-save").html("Save Changes");
				},

				error: function (data) {
					console.log("Error:", data);
					$("#btn-save").html("Save Changes");
				},
			});
		},
	});
}
