```js

// Ajax method which call controller file
function updateApproval(values, idPractice) {
	jQuery.ajax({
		url: 'approval.php',
		type: 'POST',
		data: {
			values,
			idPractice
		},
		success: function(response) {
			// Executed when ajax call succeed
		}
	});
}
// Called directly when the file is run
jQuery(document).ready(function($) {

});

// Get html data attributes values on click of a DOM element
jQuery(document).on('click', '.modal', function() {
	var cmiName = jQuery(this).data('idUser');
	var idAttachment = jQuery(this).data('idCompany');
	executeFunction(idUser, idCompany);
});

// Toggle on/off an element
jQuery('#info-box').toggle();

// Onclick set true if false and false if true
jQuery(document).on('click', '#remember-me', function() {
    document.getElementById('remember-me').value = !document.getElementById('remember-me').value;
});
