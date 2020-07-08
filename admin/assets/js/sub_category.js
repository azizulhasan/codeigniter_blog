$(document).ready(function () {
	$("#admin_sub_category").DataTable();

	/*  When user click add user button */

	$("#create-new-sub_category").click(function () {
		$("#btn-save").val("create-sub_category");
		$("#btn-save").trigger("reset");
		$("#btn-save").html("Save Changes");
		$("#positon_id").val("");
		$("#sub_categoryForm").trigger("reset");
		$("#sub_categoryCrudModal").html("Add New Sub Category");
		$("#ajax-blog-modal").modal("show");
	});

	/* When click edit user */

	$("body").on("click", ".edit-sub_category", function () {
		var positon_id = $(this).data("id");

		$.ajax({
			type: "Post",
			url:
				$("meta[name='url']").attr("content") + "admin/sub_category/get_by_id",
			data: {
				id: positon_id,
			},
			dataType: "json",
			success: function (res) {
				if (res.success == true) {
					$("#title-error").hide();
					$("#blog_code-error").hide();
					$("#description-error").hide();
					$("#sub_categoryCrudModal").html("Edit Sub Category");
					$("#btn-save").val("edit-sub_category");
					$("#btn-save").html("Update Sub Category");
					$("#ajax-blog-modal").modal("show");
					$("#sub_category_id").val(res.data[0].id);
					$("#sub_category_name").val(res.data[0].sub_category_name);
				}
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	});

	$("body").on("click", ".delete-sub_category", function () {
		var positon_id = $(this).data("id");
		console.log(positon_id);
		if (confirm("Are You sure want to delete !")) {
			$.ajax({
				type: "POST",
				url:
					$("meta[name='url']").attr("content") + "admin/sub_category/delete",
				data: {
					id: positon_id,
				},
				dataType: "json",
				success: function (data) {
					if (data.status == true) {
						$("#sub_category_id_" + positon_id).remove();
					}
				},
				error: function (data) {
					console.log("Error:", data);
				},
			});
		}
	});
});

if ($("#sub_categoryForm").length > 0) {
	$("#sub_categoryForm").validate({
		submitHandler: function (form) {
			var actionType = $("#btn-save").val();
			$("#btn-save").html("Sending..");
			var sub_category_name = $("#sub_category_name").val();
			var category_id = $("#category_id").val();
			var id = $("#sub_category_id").val();

			// Create an FormData object
			var data = new FormData();
			// If you want to add an extra field for the FormData

			data.append("sub_category_name", sub_category_name);
			data.append("category_id", category_id);

			if (id) {
				data.append("id", id);
			}

			$.ajax({
				data: data,
				url: $("meta[name='url']").attr("content") + "admin/sub_category/store",
				type: "POST",
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (res) {
					if (res.status == true) {
						var sub_category =
							'<tr id="sub_category_id_' +
							res.data[0].id +
							'"><td>' +
							res.data[0].id +
							"</td><td>" +
							res.data[0].sub_category_name +
							"</td><td>" +
							res.data[0].category_name +
							"</td>";

						sub_category +=
							'<td><a href="javascript:void(0)" id="" data-id="' +
							res.data[0].id +
							'" class="btn btn-info edit-sub_category">Edit</a><a href="javascript:void(0)" id="" data-id="' +
							res.data[0].id +
							'" class="btn btn-danger delete-user delete-sub_category">Delete</a></td></tr>';

						if (actionType == "create-sub_category") {
							$("#sub_category_list").prepend(sub_category);
						} else {
							$("#sub_category_id_" + res.data[0].id).replaceWith(sub_category);
						}
						$("#sub_categoryForm").trigger("reset");
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
