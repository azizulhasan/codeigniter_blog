$(document).ready(function () {
	$("#admin_category").DataTable();

	/*  When user click add user button */

	$("#create-new-category").click(function () {
		$("#btn-save").val("create-category");
		$("#btn-save").trigger("reset");
		$("#btn-save").html("Save Changes");
		$("#positon_id").val("");
		$("#categoryForm").trigger("reset");
		$("#categoryCrudModal").html("Add New category");
		$("#ajax-blog-modal").modal("show");
	});

	/* When click edit user */

	$("body").on("click", ".edit-category", function () {
		var positon_id = $(this).data("id");

		$.ajax({
			type: "Post",
			url: $("meta[name='url']").attr("content") + "admin/category/get_by_id",
			data: {
				id: positon_id,
			},
			dataType: "json",
			success: function (res) {
				if (res.success == true) {
					$("#title-error").hide();
					$("#blog_code-error").hide();
					$("#description-error").hide();
					$("#categoryCrudModal").html("Edit category");
					$("#btn-save").val("edit-category");
					$("#btn-save").html("Update category");
					$("#ajax-blog-modal").modal("show");
					$("#category_id").val(res.data[0].id);
					$("#category_name").val(res.data[0].category_name);
				}
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	});

	$("body").on("click", ".delete-category", function () {
		var positon_id = $(this).data("id");
		console.log(positon_id);
		if (confirm("Are You sure want to delete !")) {
			$.ajax({
				type: "POST",
				url: $("meta[name='url']").attr("content") + "admin/category/delete",
				data: {
					id: positon_id,
				},
				dataType: "json",
				success: function (data) {
					if (data.status == true) {
						$("#category_id_" + positon_id).remove();
					}
				},
				error: function (data) {
					console.log("Error:", data);
				},
			});
		}
	});
});

if ($("#categoryForm").length > 0) {
	$("#categoryForm").validate({
		submitHandler: function (form) {
			var actionType = $("#btn-save").val();
			$("#btn-save").html("Sending..");
			var category_name = $("#category_name").val();
			var id = $("#category_id").val();

			// Create an FormData object
			var data = new FormData();
			// If you want to add an extra field for the FormData

			data.append("category_name", category_name);

			if (id) {
				data.append("id", id);
			}

			$.ajax({
				data: data,
				url: $("meta[name='url']").attr("content") + "admin/category/store",
				type: "POST",
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (res) {
					console.log(res);
					console.log(res.data[0].category_name);
					var category =
						'<tr id="category_id_' +
						res.data[0].id +
						'"><td>' +
						res.data[0].id +
						"</td><td>" +
						res.data[0].category_name +
						"</td>";

					category +=
						'<td><a href="javascript:void(0)" id="" data-id="' +
						res.data[0].id +
						'" class="btn btn-info edit-category">Edit</a><a href="javascript:void(0)" id="" data-id="' +
						res.data[0].id +
						'" class="btn btn-danger delete-user delete-category">Delete</a></td></tr>';

					if (actionType == "create-category") {
						$("#category_list").prepend(category);
					} else {
						$("#category_id_" + res.data[0].id).replaceWith(category);
					}
					$("#categoryForm").trigger("reset");
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
