/**
 * If radiobutton is checked, return true, else false
 *
 */
function isChecked(el)
{
	return (el.getProperty('checked') == true) ? true : false;
}

window.addEvent('domready', function()
{
	var status = $('status');
	
	if(status)
	{
		var statusElement = status.hasClass('ok','fade'); //returns true otherwise false
		
		if(statusElement){
				
			status.set('tween', {duration: 5000,fps: 30,
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
	
		/*
		 * Close the status div
		 *
		 */
		$('closeBox').addEvent('click', function(e){
		
			var statusRoll = status.hasClass('roll'); //returns true otherwise false
			var statusFade = status.hasClass('fade'); //returns true otherwise false
		
			e = new Event(e);
		
			if(statusRoll)
			{
				var statusSlide = new Fx.Slide('status').toggle().chain(
					function() {
						status.parentNode.set('styles', { 
						'display': 'none'
					});
				});
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
						status.dispose();
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
	
	/**
	 * Toggle specific date settings
	 *
	 */
	var specDate = $('specificdate');
	var specDateWrapper = $('show_specificdate');
	
	var specificdate = new Fx.Slide(specDateWrapper).hide();
	
	specDate.addEvent('click', function()
	{
		if (isChecked(specDate))
		{
			specificdate.slideIn();
		}
	});
			
	[$('exifdate') , $('postdayaft') , $('postnow')].each(function(item, index)
	{
		item.addEvent('click', function()
		{
			if (isChecked(item))
			{
				if (specificdate.open)
				{
					specificdate.slideOut();
				}
			}
		});
	});
});