const custom = {
	init: function () {
		console.log("INIT");
		custom.buttons();
	},
	buttons: function () {
		$("button#btnSubmitButton").on("click", custom.submitForm);
	},
	submitForm: function () {
		let form = new FormData($("form#frmLoadImages")[0]);
		/* 
		const _files = document.querySelectorAll('[type="file"]');

		_files.forEach((f, i) => {
			if ($(f)[0].files.length > 1) {
				// si es un input multi
				j = 0;
				while (j < $(f)[0].files.length) {
					form.append(`archivo_${i}_${j}`, $(f)[0][j]);
					j++;
				}
			} else {
				form.append(`archivo_${i}`, $(f)[0]);
			}
		}); */

		$.ajax({
			type: "POST",
			url: "/welcome/upload",
			data: form,
			contentType: false,
			processData: false,
			beforSend: function () {
				console.log("accion antes de enviar");
			},
			success: function (response) {
				console.log(response);
			},
			error: function (xhr) {
				console.log(xhr.statusText);
			},
		});
	},
};

$(document).ready(function () {
	custom.init();
});
