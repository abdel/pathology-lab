$(document).ready(function() {

	disableValues();
	disableResult();

	$('#name').keydown(function() {
		$('.loading').show();
	});

	$('#name').keyup(function() {
		var name = $('#name').val();

		if (name.length >= 3) {
			$.get(baseUrl+'/auth/patients', { name: name } ).done(function(names) {
				$('.names').html('');
			    $('.loading').hide();

				$(names).each(function(key, value) {
					$('.names').show();
					$('.names').append('<div class="name">' + value['name'] + '</div>');
				});

				$('.name').click(function() {
			    	$('#name').val($(this).text());
			    });
			});
		} else {
			$('.names').hide();
			$('.loading').hide();
		}
	});

	$('#name').blur(function() {
		$('.names').fadeOut(500);
		$('.loading').hide();
	});

	$('#type').on('change', function() {
		if ($('#type').val() == 'V')
		{
			$('#result-value').show();
			disableResult();
		}
		else
		{
			$('#result-value').hide();
			disableValues();
		}
	});

	$('#normal, #abnormal').on('input', function() {
		disableResult();
	});
		

	$('#dob').datetimepicker({
        viewMode: 'years',
        format: 'YYYY-MM-DD'
    });

	$('#collected_at').datetimepicker({
		viewMode: 'days',
		format: 'YYYY-MM-DD HH:mm:ss'
	});

	$('#received_at').datetimepicker({
		viewMode: 'days',
		format: 'YYYY-MM-DD HH:mm:ss'
	});

	function disableResult() {
		var normal = $('#normal');
		var abnormal = $('#abnormal');
		var flag = $('#flag');

		if ($('#type').val() == 'V') {
			$('#result-value').show();
			$('#units').attr('disabled', false);

			if (normal.val() != '') {
				abnormal.attr('disabled', true);
				flag.attr('disabled', true);
				flag.val('');
			} else if (abnormal.val() != '') {
				normal.attr('disabled', true);
				flag.attr('disabled', false);
			} else {
				normal.attr('disabled', false);
				abnormal.attr('disabled', false);
				flag.attr('disabled', false);
			}
		}
	}

	function disableValues() {
		var disabled = false;

		if ($('#type').val() != 'V')
		{
			disabled = true;

			$('#result-value').find('input').val('');
			$('#result-value').find('select').val('');
		}

		$('#units').attr('disabled', disabled);
		$('#normal').attr('disabled', disabled);
		$('#abnormal').attr('disabled', disabled);
		$('#flag').attr('disabled', disabled);

	}
});