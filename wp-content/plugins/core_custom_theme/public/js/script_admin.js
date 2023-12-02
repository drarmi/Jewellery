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
});