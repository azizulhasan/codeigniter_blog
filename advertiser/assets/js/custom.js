jQuery(document).ready(function () {
	// if (!jQuery("#header_logo_upload_text").val()) {
	//     jQuery("#header_logo_remove").hide();
	// }

	// jQuery("#header_logo_remove").click(function (e) {
	//     e.preventDefault();
	//     jQuery("#header_logo_upload_text").val("");
	//     jQuery("#header_logo_remove").hide();
	//     jQuery("#change_pic").hide();
	// });

	jQuery("body").on("change", "#header_logo_upload_text", function (e) {
		e.preventDefault();
		var image = wp
			.media({
				title: "Upload Image",
				multiple: false,
			})
			.open()
			.on("select", function (e) {
				var uploaded_image = image.state().get("selection").first();
				//console.log(uploaded_image);
				var image_url = uploaded_image.toJSON().url;
				jQuery("#header_logo_upload_text").val(image_url);
				if (image_url) {
					jQuery("#header_logo_remove").show();
					jQuery("#change_pic").show();
					jQuery("#change_pic").attr("src", image_url);
				}
			});
	});
});
