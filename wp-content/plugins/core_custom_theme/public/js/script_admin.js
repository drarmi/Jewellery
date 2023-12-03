jQuery(function ($) {
	$('.upload_image_button').click(function () {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		wp.media.editor.send.attachment = function (props, attachment) {
			$(button).prev().val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
		};
		wp.media.editor.open(button);
		return false;
	});



	function handleImageInputChange(imageInput, previewImage) {
		var imageUrl = $(imageInput).val();

		if (imageUrl) {
			$(previewImage).attr("src", imageUrl).removeClass("hidden");
		} else {
			$(previewImage).addClass("hidden");
		}
	}

	handleImageInputChange("#image_offer1", "#image_offer1_preview");
	handleImageInputChange("#image1", "#image1_preview");
	handleImageInputChange("#image2", "#image2_preview");

	$("#image_offer1").on("change", function () {
		handleImageInputChange("#image_offer1", "#image_offer1_preview");
	});

	$("#image1").on("change", function () {
		handleImageInputChange("#image1", "#image1_preview");
	});

	$("#image2").on("change", function () {
		handleImageInputChange("#image2", "#image2_preview");
	});

	$(".upload_image_button[data-target='image_offer1']").on("click", function () {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);

		wp.media.editor.send.attachment = function (props, attachment) {
			$("#image_offer1").val(attachment.url).trigger("change");
			wp.media.editor.send.attachment = send_attachment_bkp;
		};

		wp.media.editor.open(button);
		return false;
	});

	$(".upload_image_button[data-target='image1']").on("click", function () {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);

		wp.media.editor.send.attachment = function (props, attachment) {
			$("#image1").val(attachment.url).trigger("change");
			wp.media.editor.send.attachment = send_attachment_bkp;
		};

		wp.media.editor.open(button);
		return false;
	});

	$(".upload_image_button[data-target='image2']").on("click", function () {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);

		wp.media.editor.send.attachment = function (props, attachment) {
			$("#image2").val(attachment.url).trigger("change");
			wp.media.editor.send.attachment = send_attachment_bkp;
		};

		wp.media.editor.open(button);
		return false;
	});






	var customImageFrame;

	$('#custom_image_picker').on('click', function (e) {
		e.preventDefault();

		if (customImageFrame) {
			customImageFrame.open();
			return;
		}

		customImageFrame = wp.media.frames.customImageFrame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		customImageFrame.on('select', function () {
			var attachment = customImageFrame.state().get('selection').first().toJSON();
			$('#custom_image_url').val(attachment.url);
			$('#custom_image_preview').html('<img src="' + attachment.url + '" style="max-width: 100%;" />');
		});

		customImageFrame.open();
	});

	if ($("#custom_image_url").val()) {
		$("#custom_image_preview").html('<img src="' + $("#custom_image_url").val() + '" style="max-width: 100%;">')
	}


	$('.upload_image_button').click(function (e) {
		e.preventDefault();

		var customUploader = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		customUploader.on('select', function () {
			var attachment = customUploader.state().get('selection').first().toJSON();
			$('#logo_foote').val(attachment.url);
			$('img[alt="banner"]').attr('src', attachment.url);
		});

		customUploader.open();
	});

});