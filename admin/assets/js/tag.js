$(document).ready(function () {
	$("#admin_tag").DataTable();

	/*  When user click add user button */

	$("#create-new-tag").click(function () {
		$("#btn-save").val("create-tag");
		$("#btn-save").trigger("reset");
		$("#btn-save").html("Save Changes");
		$("#positon_id").val("");
		$("#tagForm").trigger("reset");
		$("#tagCrudModal").html("Add New Tag");
		$("#ajax-blog-modal").modal("show");
	});

	/* When click edit user */

	$("body").on("click", ".edit-tag", function () {
		var positon_id = $(this).data("id");

		$.ajax({
			type: "Post",
			url: $("meta[name='url']").attr("content") + "admin/tag/get_by_id",
			data: {
				id: positon_id,
			},
			dataType: "json",
			success: function (res) {
				if (res.success == true) {
					$("#title-error").hide();
					$("#blog_code-error").hide();
					$("#description-error").hide();
					$("#tagCrudModal").html("Edit Tag");
					$("#btn-save").val("edit-tag");
					$("#btn-save").html("Update Tag");
					$("#ajax-blog-modal").modal("show");
					$("#tag_id").val(res.data[0].id);
					$("#tag_name").val(res.data[0].tag_name);
				}
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	});

	$("body").on("click", ".delete-tag", function () {
		var positon_id = $(this).data("id");
		console.log(positon_id);
		if (confirm("Are You sure want to delete !")) {
			$.ajax({
				type: "POST",
				url: $("meta[name='url']").attr("content") + "admin/tag/delete",
				data: {
					id: positon_id,
				},
				dataType: "json",
				success: function (data) {
					if (data.status == true) {
						$("#tag_id_" + positon_id).remove();
					}
				},
				error: function (data) {
					console.log("Error:", data);
				},
			});
		}
	});
});

if ($("#tagForm").length > 0) {
	$("#tagForm").validate({
		submitHandler: function (form) {
			var actionType = $("#btn-save").val();
			$("#btn-save").html("Sending..");
			var tag_name = $("#tag_name").val();
			var category_id = $("#category_id").val();
			var id = $("#tag_id").val();

			// Create an FormData object
			var data = new FormData();
			// If you want to add an extra field for the FormData

			data.append("tag_name", tag_name);
			data.append("category_id", category_id);

			if (id) {
				data.append("id", id);
			}

			$.ajax({
				data: data,
				url: $("meta[name='url']").attr("content") + "admin/tag/store",
				type: "POST",
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (res) {
					if (res.status == true) {
						var tag =
							'<tr id="tag_id_' +
							res.data[0].id +
							'"><td>' +
							res.data[0].id +
							"</td><td>" +
							res.data[0].tag_name +
							"</td><td>" +
							res.data[0].category_name +
							"</td>";

						tag +=
							'<td><a href="javascript:void(0)" id="" data-id="' +
							res.data[0].id +
							'" class="btn btn-info edit-tag">Edit</a><a href="javascript:void(0)" id="" data-id="' +
							res.data[0].id +
							'" class="btn btn-danger delete-user delete-tag">Delete</a></td></tr>';

						if (actionType == "create-tag") {
							$("#tag_list").prepend(tag);
						} else {
							$("#tag_id_" + res.data[0].id).replaceWith(tag);
						}
						$("#tagForm").trigger("reset");
						$("#ajax-blog-modal").modal("hide");
						$("#btn-save").html("Save Changes");
					} else {
						alert("Something Went Wrong!");
					}
				},

				error: function (data) {
					console.log("Error:", data);
					$("#btn-save").html("Save Changes");
				},
			});
		},
	});
}
