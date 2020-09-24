```js

// Create a dialog box and inject a view into it
var div = document.createElement('div');
jQuery(div).dialog({
    autoOpen: false,
    modal: true,
    height: 200,
    width: 400,
    resizable: false
});
jQuery(div).load('/components/approval.php', {idUser, idCompany});
jQuery(div).dialog('open');

// Close the dialog box
jQuery('#user-modal-' + idUser).dialog('close');
jQuery('#user-modal-' + idUser).remove();
