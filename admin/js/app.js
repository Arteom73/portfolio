$(function() {
		

	$('.js-approve-button').on('click', function(e) {

		e.preventDefault();

		$.ajax({

			type: 'post',
			url: '/admin/ajax/reviews_approve.php',
			data: {
				id: Number($(this).closest('.js-approve-item').data('id'))
			},
			success: function(date) {
				alert(date);
			}

		})

	})

})
console.log('asd');