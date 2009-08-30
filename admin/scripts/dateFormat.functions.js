/**
 * Date Format AJAX Request
 *
 */
window.addEvent('domready', function(){
	
	$('new_dateformat').addEvent('keyup', function(e){
		request_dateformat(e);
	});
	
	$('previewDTF').addEvent('click', function(e){
		request_dateformat(e);
	});

});

function request_dateformat(e){
	
	var dateFormat = $('new_dateformat').value;
	
	e = new Event(e).stop();
	
	new Request({
		method: 'get',
		url: 'assets/ajax_request.php',
		onSuccess: function(responseHTML){
			$('dtf_preview').set('html', responseHTML);
		}
	}).send('format='+dateFormat+'&request=dateformat');
	
}