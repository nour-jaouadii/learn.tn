$(function() {

	$(".videos .video a").on('click', function() {
		// e.preventDefault();
        
        
        let link = $(this).attr('href'); // this tarje3 3al selector
        

        $(".modal div .modal-content .modal-body iframe").attr('src', link);
        
        // 7ot link fi west source
        
    });

    $(".quiz.disabled a").click(function(e) {

        e.preventDefault();

    });

});