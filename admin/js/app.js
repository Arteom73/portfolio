$(function() {
		
	// Ajax approve/disprove reviews
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

	});

	// Ajax edit review
	$('.js-edit-button').on('click', function(e) {

		e.preventDefault();

		$.ajax({

			type: 'post',
			url: '/admin/ajax/reviews_edit.php',
			data: {
				id: Number($(this).closest('.js-approve-item').data('id'))
			},
			success: function(date) {
				doModal('asd','asd','asd');
			}

		})

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
	    html += '<p>';
	    html += formContent;
	    html += '</div>';
	    html += '<div class="modal-footer">';
	    if (btnText!='') {
	        html += '<span class="btn btn-success"';
	        html += ' onClick="'+strSubmitFunc+'">'+btnText;
	        html += '</span>';
	    }
	    html += '<span class="btn" data-dismiss="modal">x</span>'; // close button
	    html += '</div>';  // footer
	    html += '</div>';  // modalWindow
	    html += '</div>';  // modalWindow
	    html += '</div>';  // modalWindow
	    $(html).appendTo($('body'));
	    $("#dynamic-modal").modal();
	    $("#dynamic-modal").on('hidden.bs.modal', function (e) {
			$(this).remove();
		});
	}
})