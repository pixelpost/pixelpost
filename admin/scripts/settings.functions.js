/**
 * Show an element if the correct parameters are met.
 * Otherwise hide the element.
 *
 * element	- element that triggers event
 * toggle	- element to show/hide
 * val		- value to check against
 *
 */
function showHide(element,toggle,val)
{
	if(element.value == val)
	{
		toggle.slideIn();
	}
	else
	{
		if(toggle.open)
		{
			toggle.slideOut();
		}
	}
}

function checkUncheckAll(theElement)
{
	var theForm = theElement.form, z = 0;
	for(z = 0; z < theForm.length; z++)
	{
		if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall' && !theForm[z].disabled)
		{
			theForm[z].checked = theElement.checked;
		}
	}
}

window.addEvent('domready', function(){
	var status = $('status');
	var closebox = $('closeBox');
		
	if(closebox)
	{
		closebox.addEvent('click', function(e)
		{
			var statusRoll = status.hasClass('roll'); //returns true otherwise false
			var statusFade = status.hasClass('fade'); //returns true otherwise false

			e = new Event(e);

			if(statusRoll)
			{
				var statusSlide = new Fx.Slide('status').toggle().chain(
					function(){
						status.parentNode.set('styles', {
							'display': 'none'
						});
						// will set a cookie for the current session only
						var advWarnCookie = Cookie.set('pp_adv_warning', 'hide_warning');//, {duration: 31});
					}
				);
			}
			else if(statusFade)
			{
				status.set('tween', {duration: 2000,fps: 25,
					onComplete: function() {
						status.dispose();
					}
				});
				status.fade('out',{
					onComplete: function() {
						status.stop();
					}
				});
			}
			else
			{
				status.dispose();
			}
			
			e.stop();
			
		});
	}
	
	var htaccess_toggle = $('htaccess_toggle');
	
	if(htaccess_toggle)
	{
		var htaccessSlide = new Fx.Slide('htaccess').hide();
		
		htaccess_toggle.addEvent('click', function(e){
			e = new Event(e);
			htaccessSlide.toggle();
			e.stop();
		});
	}
	
	/**
	 * Toggle external feed div (Options : General)
	 *
	 */
	var feed_discovery = $('feed_discovery');
	if(feed_discovery)
	{
		var ext_feed_discovery = new Fx.Slide('ext_feed_discovery').hide();
		feed_discovery.addEvent('click', function(e){
			e = new Event(e);
			showHide(feed_discovery,ext_feed_discovery,'E');
			e.stop();
		});
	}
	
	/**
	 * Toggle external feed div (Options : Template)
	 *
	 */
	var catformat = $('catformat');
	if(catformat)
	{
		var customcatformat = new Fx.Slide('customcatformat').hide();
		catformat.addEvent('click', function(e){
			e = new Event(e);
			showHide(catformat,customcatformat,'custom');
			e.stop();
		});
	}
	
});