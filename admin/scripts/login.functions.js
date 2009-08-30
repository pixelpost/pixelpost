/**
 * LOGIN FUNCTIONS
 *
 */
window.addEvent('domready', function(){
	var mySlide = new Fx.Slide('askforpass');
	mySlide.hide();
	
	$('toggle').addEvent('click', function(e){
		e = new Event(e);
		mySlide.toggle();
		e.stop();
	});
});