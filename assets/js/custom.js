$(document).ready(function () {
	///////////////////////////////
	// subscribe blog
	//////////////////////////////

	$("#subscribe_form").click(function () {
		var subs_email = $("#exampleInputEmail1").val();
		var subs_phone = $("#exampleInputnumber1").val();

		//Create an FormData object
		var data = new FormData();
		// If you want to add an extra field for the FormData
		data.append("email", subs_email);
		data.append("contact", subs_phone);

		$.ajax({
			data: data,
			url: $("meta[name='url']").attr("content") + "subscribe/store",
			type: "POST",
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (res) {
				$("#subscribe_blog").modal("hide");

				alert(
					"Thank You For Subscribing to our blog. We send you an Email to : " +
						res.data[0].email +
						" please check your email."
				);
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	});

	// $("#front_logout").on("click", function () {
	// 	curr = $(location).attr("href");
	// 	console.log(curr.substr(-2));

	// 	$.ajax({
	// 		data: [{ url: "post" }],
	// 		url: $("meta[name='url']").attr("content") + "logout",
	// 		type: "POST",
	// 		processData: false,
	// 		contentType: false,
	// 		dataType: "json",
	// 		success: function (res) {
	// 			console.log(res.status);
	// 			if (res.status == 1) {
	// 				$("#login_nav").hide();
	// 				location.reload(true);
	// 			}
	// 		},
	// 		error: function (data) {
	// 			console.log("Error:", data);
	// 		},
	// 	});
	// });

	window.fbAsyncInit = function () {
		FB.init({
			appId: "272839410446482",
			xfbml: true,
			version: "v7.0",
		});
		FB.AppEvents.logPageView();
	};

	(function (d, s, id) {
		var js,
			fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {
			return;
		}
		js = d.createElement(s);
		js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	})(document, "script", "facebook-jssdk");

	function checkLoginState() {
		FB.getLoginStatus(function (response) {
			statusChangeCallback(response);
		});
	}

	// {
	//     status: 'connected',
	//     authResponse: {
	//         accessToken: '...',
	//         expiresIn:'...',
	//         signedRequest:'...',
	//         userID:'...'
	//     }
	// }
});
