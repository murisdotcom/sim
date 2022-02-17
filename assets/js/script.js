$(function () {
	$('.tombolAddMenu').on('click', function () {
		$('#newMenuModalLabel').html('Add New Menu');
		$('.modal-footer button[type=submit]').html('Add');
	});

	$('.tampilModalEdit').on('click', function () {
		$('#newMenuModalLabel').html('Edit Menu');
		$('.modal-footer button[type=submit]').html('Edit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/siap-login/menu/getedit',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#menu').val(data.menu);
			}
		});

	});

});
