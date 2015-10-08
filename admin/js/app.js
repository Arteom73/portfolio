$(function() {
		
	// Ajax approve/disprove reviews
	$(document).on('click', '.js-approve-button', function(e) {

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

	});

	// Ajax edit review
	$(document).on('click', '.js-edit-button', function(e) {

		e.preventDefault();

		$.ajax({

			type: 'post',
			url: '/admin/ajax/reviews_form.php',
			data: {
				id: Number($(this).closest('.js-approve-item').data('id'))
			},
			dataType: 'json',
			success: function(date) {
				if (date.result == 1) {
					doModal('', 'Review edit', date.html, 'updateReview('+date.id+')', 'asd');
				} else {
					alert('Error!');
				}
			}

		});

	});


	function doModal(placementId, heading, formContent, strSubmitFunc, btnText) {
	    html =  '<div id="dynamic-modal" class="modal fade in" style="display:none;">';
	    html += '<div class="modal-dialog">';
	    html += '<div class="modal-content">';
	    html += '<div class="modal-header">';
	    html += '<a class="close" data-dismiss="modal">×</a>';
	    html += '<h4>'+heading+'</h4>'
	    html += '</div>';
	    html += '<div class="modal-body">';
	    html += formContent;
	    html += '</div>';
	    html += '<div class="modal-footer">';
	    if (btnText) {
	        html += '<span class="btn btn-success"';
	        html += ' onClick="'+strSubmitFunc+'">'+btnText;
	        html += '</span>';
	    }
	    html += '<span class="btn" data-dismiss="modal">Close</span>';
	    html += '</div>';
	    html += '</div>';
	    html += '</div>';
	    html += '</div>';
	    $(html).appendTo($('body'));
	    $("#dynamic-modal").modal();
	    $("#dynamic-modal").on('hidden.bs.modal', function (e) {
			$(this).remove();
		});
	}
})

var updateReview = function(id) {

	$.ajax({
		type: 'post',
		url: '/admin/ajax/reviews_update.php',
		data: $('#reviewUpdate').serialize() + '&id='+id,
		dataType: 'json',
		success: function(date) {
			alert(date.message);
			if (date.result == 1) {
				$("#dynamic-modal").modal('hide');
				$('#review-'+id).html(date.html);
			}
		}
	})

}