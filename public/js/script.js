$(function() {




	$(".quiz.disabled a").click(function(e) {
		e.preventDefault();
	});


	$("#upload_btn").on('click', function(e) {
		e.preventDefault();

		if($("#upload_btn").attr('class') != "btn btn-success save_image") {
			$("#image_file").trigger('click'); //  tarje3 3al event click
		}else {

			// for submit
			$("#form").submit();

		}
	});

	$("#image_file").on("change", function() {

		let image_value = $(this).val();

		$("#upload_btn").html("<i class='fas fa-cloud-upload-alt'></i> Save");
		$("#upload_btn").attr('class', 'btn btn-success save_image');
		$("#upload_btn").css('width', '100px');
	});


	// Form submit ajax

	$("#form").on('submit', function(e) {

		e.preventDefault();

		$.ajax({

			url: '/profile',
			type: 'POST',
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				$("#message").css('display' , 'block');
				$("#message").text(data.message);
				$("#uploaded_image").html(data.uploaded_image);
			},

		});

	});

	// user info submit form 
	$("#user_info_form").on('submit', function(e) {

		e.preventDefault();

		$.ajax({

			url: '/profile',
			type: 'POST',
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				$("#message").css('display' , 'block');
				$("#message").text(data.message);
				$("#errorMessage").css('display' , 'none');
			},
			error: function() {
				$("#errorMessage").css('display' , 'block');
				$("#message").css('display' , 'none');
			}
		});

	});


});