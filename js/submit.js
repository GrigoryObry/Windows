		$(document).ready(function(){
		    $('[data-toggle="popover"]').popover({
		    	html: 'true',
		    });
		    $('[data-toggle="popover"]').on('show.bs.popover', function() {
		    	$('.popover').popover('hide');
		    });
		});


		$('#baseform').on('submit',function(event){
			event.preventDefault();
			var form = $(this);
			$.ajax({
				url:'/add_offer.php',
				type:'POST',
				data:$(form).serialize(),
				datatype:'JSON',
				success:function (status) {
					alert('Ваш заказ принят в обработку');
				},
				fail:function($status){
					alert('Произошла ошибка, возможно введены некорректные данные');
				}
			});
		});