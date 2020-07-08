$(document).ready(function () {
	$("#admin_user").DataTable();
	/*  When user click add user button */
	$("#create-new-user").click(function () {
		$("#btn-save").val("create-user");
		$("#user_id").val("");
		$("#userForm").trigger("reset");
		$("#userCrudModal").html("Add New user");
		$("#ajax-user-modal").modal("show");
	});
	/* When click edit user */
	$("body").on("click", ".edit-user", function () {
		var user_id = $(this).data("id");
		$.ajax({
			type: "Post",
			url: $("meta[name='url']").attr("content") + "admin/user/get_by_id",
			data: {
				id: user_id,
			},
			dataType: "json",
			success: function (res) {
				if (res.success == true) {
					$("#title-error").hide();
					$("#blog_code-error").hide();
					$("#description-error").hide();
					$("#userCrudModal").html("Edit user");
					$("#btn-save").val("edit-user");
					$("#btn-save").html("Update user");
					$("#ajax-user-modal").modal("show");
					$("#user_id").val(res.data[0].id);
					$("#name").val(res.data[0].name);
					$("#email").val(res.data[0].email);
					$("#contact").val(res.data[0].contact);
					$("#password").val(res.data[0].password);
					$("#repassword").val(res.data[0].password);
					$("#before_img").val(res.data[0].picture);
				} else {
					alert("Something Went Wrong!");
				}
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	});

	$("body").on("click", ".delete-user", function () {
		var user_id = $(this).data("id");
		var before_img = $("#user_id_" + user_id)
			.children()
			.find("img")
			.attr("src");
		if (confirm("Are You sure want to delete !")) {
			$.ajax({
				type: "POST",
				url: $("meta[name='url']").attr("content") + "admin/user/delete",
				data: {
					id: user_id,
					picture: before_img,
				},
				dataType: "json",
				success: function (data) {
					if (data.status == true) {
						$("#user_id_" + user_id).remove();
						alert("User Deleted Successfully");
					} else {
						alert("Something Went Wrong!");
					}
				},
				error: function (data) {
					console.log("Error:", data);
				},
			});
		}
	});
});

if ($("#userForm").length > 0) {
	$("#userForm").validate({
		submitHandler: function (form) {
			var actionType = $("#btn-save").val();
			$("#btn-save").html("Sending..");
			var name = $("#name").val();
			var email = $("#email").val();
			var contact = $("#contact").val();
			var password = $("#password").val();
			var repassword = $("#repassword").val();
			var picture = $("#picture").prop("files")[0];
			var type = $("#type").val();
			var id = $("#user_id").val();
			var before_img = $("#before_img").val();
			var base_url =
				$("meta[name='url']").attr("content") + "admin/assets/img/users/";

			// Create an FormData object
			var data = new FormData();
			// If you want to add an extra field for the FormData

			data.append("name", name);
			data.append("email", email);
			data.append("contact", contact);
			data.append("password", password);
			data.append("repassword", repassword);
			data.append("picture", picture);

			data.append("type", type);
			data.append("id", id);
			data.append("bfore_picture", before_img);

			$.ajax({
				data: data,
				url: $("meta[name='url']").attr("content") + "admin/user/store",
				type: "POST",
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (res) {
					if (res.status == true) {
						var user =
							'<tr id="user_id_' +
							res.data[0].id +
							'"><td>' +
							res.data[0].id +
							"</td><td>" +
							res.data[0].name +
							"</td><td>" +
							res.data[0].email +
							"</td><td>" +
							res.data[0].contact +
							"</td><td>" +
							res.data[0].type +
							"</td><td> <img src='" +
							base_url +
							res.data[0].picture +
							"' alt='" +
							res.data[0].name +
							"'/></td>";

						user +=
							'<td><a href="javascript:void(0)" id="" data-id="' +
							res.data[0].id +
							'" class="btn btn-info edit-user">Edit</a><a href="javascript:void(0)" id="" data-id="' +
							res.data[0].id +
							'" class="btn btn-danger delete-user delete-user">Delete</a></td></tr>';

						if (actionType == "create-user") {
							$("#user_list").prepend(user);
						} else {
							$("#user_id_" + res.data[0].id).replaceWith(user);
						}

						$("#userForm").trigger("reset");
						$("#ajax-user-modal").modal("hide");
						$("#btn-save").html("Save Changes");
					} else {
						alert("Something Went Wrong");
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
