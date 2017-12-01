var api_project 	= 'api/project.php';

$(document).ready(function(){
	var project_id;
	var project_name;

	autosize($('textarea'));

	$dialogForm 		= $('#dialogForm');
	$btnClose 			= $dialogForm.children('.topic').children('.btn-close-dialog');
	$btnCreate 			= $('#btnCreate');
	$btnSubmit 			= $('#btnSubmit');
	$formProgress 		= $('#formProgress');
	$nameinput 			= $('#name');

	$dialogForm.ajaxForm({
        beforeSubmit: function(){
            $formProgress.fadeIn(100);
            $formProgress.width('0%');
            $btnSubmit.prop('disabled',true);
            $btnSubmit.addClass('loading');
            $btnSubmit.html('กำลังบันทึก');
        },
        uploadProgress: function(event,position,total,percentComplete) {
            var percent = percentComplete;
            percent = (percent * 80) / 100;
            $formProgress.animate({width:percent+'%'},100);
        },
        success: function() {
            $formProgress.animate({width:'90%'},300);
        },
        complete: function(xhr) {
        	$formProgress.animate({width:'100%'},300);
            console.log(xhr.responseText);
            console.log(xhr.responseJSON);

            setTimeout(function(){
            	location.reload();
            }, 1000);
        }
    });

	$btnCreate.click(function(){
		$dialogForm.addClass('open');
		$overlay.addClass('open');
	});

	$btnClose.click(function(){
		$dialogForm.removeClass('open');
		$overlay.removeClass('open');

		$('#project_id').val('');
	    $('#name').val('');
	    $('#desc').val('');
	    $('#url').val('');
	});

	$('.edit').click(function(e){
		e.stopPropagation();
		project_id 	= $(this).parent().attr('data-id');
		project_name = $(this).parent().children('.detail').children('h2').html();
		closeAllMenu();

		$submenu = $(this).children('.edit-menu');
		$submenu.show();
	});

	$('.edit').on('click','.btn-editor', function(e){

		$.ajax({
	        url         :api_project,
	        cache       :false,
	        dataType    :"json",
	        type        :"GET",
	        data:{
	            request 	:'get',
	            project_id	:project_id
	        },
	        error: function (request, status, error) {
	            console.log("Request Error",request.responseText);
	        }
	    }).done(function(data){
	    	console.log(data);
	    	
	    	$('#project_id').val(data.data.project_id);
	    	$('#name').val(data.data.project_name);
	    	$('#desc').val(data.data.project_description);

	    	$dialogForm.addClass('open');
	    	$overlay.addClass('open');
	    	closeAllMenu();
	    });

	});
	
	$('.btn-delete').click(function(){

		if(!confirm('คุณต้องการลบ "'+project_name+'"ใช่หรือไม่ ?')){ return false; }

		$.ajax({
			url         :api_project,
			cache       :false,
			dataType    :"json",
			type        :"POST",
			data:{
				request 	:'delete',
				project_id	:project_id
			},
			error: function (request, status, error) {
				console.log("Request Error",request.responseText);
			}
		}).done(function(data){
			console.log(data);
			location.reload();
		});
	});

	function closeAllMenu(){
		$('.edit-menu').hide();
	}

	$(document).click(function(e){
		if (!$(e.target).closest('.edit-menu').length || !$(e.target).closest('.category-menu').length){
			closeAllMenu();
		}
	});
});