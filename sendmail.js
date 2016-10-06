/*!
 * SendMail jQuery Script
 * @license MIT licensed
 *
 * Copyright (C) 2016 c0degeek.pl - <Mateusz Kiliński>
 */

/**
 * @table of contents
 * --------------------------------
 *  01. UserForm Variables
 *  02. ClearButton Event
 *  03. Submit Event
 *  03.01. Submit ajax.succes Event
 *  03.02. Submit ajax.error Event
 * --------------------------------
 */

jQuery(document).ready(function($)
{

	// 01 ------------------------------------------------------------------------ UserForm Variables

	var scriptPath			= 'assets/SendMail/';			// Path to SendMail Script
	var form 				= $('#contact-form');			// Contact Form ID
	var formMessages 		= $('#form-messages');			// Response containder ID
	var formMsgTxt			= $('#form-messages p');		// Response text containder ID
	var clear_button		= $('#clear');					// Clear Button ID
	var inputClass			= $('.form-control');			// Input Fields Class
	var submitButton		= $('button');					// Submit Button ID
	var loaderContainer     = $('#loader');					// Loader Icon containder ID

	// --------------------------------------------------------------------------- end of 01

	// 02 ------------------------------------------------------------------------ ClearButton Event

	$(clear_button).click(function()
	{

		$(inputClass).val('');

	});

	// --------------------------------------------------------------------------- end of 02

	// 03 ------------------------------------------------------------------------ Submit Event

	$(form).submit(function(e)
	{

		e.preventDefault();
		var formData = $(form).serialize();

		$(submitButton).fadeOut('fast');
		$(loaderContainer).show('fast');

		$.ajax
		({

			type	: 'POST',
			url		: scriptPath + 'sendmail.php',
			data 	: formData

		})

		// 03.01 ------------------------------------------------------------------- Submit ajax.succes Event

		.done(function(response)
		{

			var msg = response;
			$(form).hide('fast');
			$(formMsgTxt).html(msg);
			$(inputClass).val('');
			$(formMessages).slideDown('fast');
			$(formMessages).removeClass('alert-danger');
			$(formMessages).addClass('alert-success');

		})

		// ------------------------------------------------------------------------- end of 03.01

		// 03.02 ------------------------------------------------------------------- Submit ajax.error Event

		.fail(function(jqXHR, exception)
		{

			$(submitButton).fadeIn('fast');
			$(loaderContainer).hide('fast');
			$(formMessages).slideDown('fast');
			$(formMessages).removeClass('alert-success');
			$(formMessages).addClass('alert-danger');

			var msg = '';

			if (jqXHR.status === 0) msg = 'Not connect.\n Verify Network.';
            else if (jqXHR.status == 404) msg = 'Requested page not found. [404]';
            else if (jqXHR.status == 500) msg = 'Internal Server Error [500]: \n' + jqXHR.responseText;
            else if (exception === 'parsererror') msg = 'Requested JSON parse failed.';
            else if (exception === 'timeout') msg = 'Time out error.';
            else if (exception === 'abort') msg = 'Ajax request aborted.';
            else msg = 'Uncaught Error.\n' + jqXHR.responseText;

			$(formMsgTxt).html(msg);

		});

		// ------------------------------------------------------------------------- end of 03.02

	});

	// --------------------------------------------------------------------------- end of 03

});
