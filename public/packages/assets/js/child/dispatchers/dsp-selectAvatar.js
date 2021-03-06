$(function(){

	// show avatars
	selectAvatarController.getAvatars();

	// show styles
	var interval;

    $("#sela-cardAvatar").on('click','.sela-click',function(){

		selectAvatarController.setAvatar($(this).data("avatarid"));
		selectAvatarController.setName($(this).data("name"));
		selectAvatarController.getStyles();
		interval = setInterval(function(){
			$("#sela-btnOptions").trigger('click');
		},2000);

		$("#sela-titleStyle").text("Estilos de "+$(this).data("name"));
    });

	$('.sela-click').click(function(){

	});

	// avatar selected
	$("#sela-btnOptions").click(function(){
		$("#sela-styles a.sela-divClick").on('click', function(){
			selectAvatarController.setStyleID($(this).data("styleid"));
			$('.sela-border').removeClass('sela-content-selected');
			$('.sela-border').addClass('sela-content');
			$(this).children('div').removeClass('sela-content');
			$(this).children('div').addClass('sela-content-selected');
			$('#sela-btnSelection').attr("disabled",false);
			clearInterval(interval);
		});
	});

	$("#sela-btnSelection").click(function(){
		selectAvatarController.alertConfirm();
	});

});
