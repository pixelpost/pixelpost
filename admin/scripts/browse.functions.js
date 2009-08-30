/**
 * If checkbox is checked, return true, else false
 *
 */
function checkornot(box)
{ 
	return (box.checked == true) ? true : false;
}

function pagination_listener(ev)
{
	e = new Event(ev);
	if(e.key == 'enter')
	{
		e.stop();
		window.location = '?page=' + $('pagination_value').value + '';
	}
}

window.addEvent('domready', function(){
	/**
	 * Toggle filter settings
	 *
	 */
	var filter = new Fx.Slide('filter', {
		onComplete: function(){
			if(filter.open){
				$('show_filter').addClass('active');
			}else{
				$('show_filter').removeClass('active');
			}
		}
	}).hide();
	
	$('show_filter').addEvent('click', function(e){
		e = new Event(e);
		filter.toggle();
		e.stop();
	});
	
	/**
	 * Toggle mass category/tag edit settings
	 *
	 */
	var massedit = new Fx.Slide('massedit', {
		onComplete: function(){
			if(massedit.open){
				$('show_massedit').addClass('active');
			}else{
				$('show_massedit').removeClass('active');
			}
		}
	}).hide();
		
	$('show_massedit').addEvent('click', function(e){
		e = new Event(e);
		massedit.toggle();
		e.stop();
	});
	
	/**
	 * Add/Remove class of checked checkbox
	 *
	 */
	$$('input[type=checkbox]').addEvent('click', function(){
		if (checkornot(this)) 
		{
			this.getParent().addClass('checked');
		} 
		else
		{
			this.getParent().removeClass('checked');
		}
	});
	
	/**
	 * Toggle hidden image infoinformation
	 *
	 */
	$$('.imagewrapper').each(function(container){
		
		/**
		 * Show / Hide a containers hidden information
		 *
		 */
		var toggleInfo = new Fx.Slide(container.getElement('.toggle'), {
			onComplete: function(){
				if(toggleInfo.open)
				{
					container.getElement("a.toggleinfo").set('text', '[Hide More Info]');
				}
				else
				{
					container.getElement("a.toggleinfo").set('text', '[Show More Info]');
				}
			}
		}).hide();
		
		container.getElement("a.toggleinfo").addEvent("click", function(e){
			e = new Event(e);
			toggleInfo.toggle();
			e.stop();
		});
		
		/**
		 * Show / Hide ALL hidden information
		 *
		 */
		var toggleAllInfo = new Fx.Slide(container.getElement('.toggle'), {
			onComplete: function(){
				if(toggleAllInfo.open)
				{
					$("show_allinfo").set('text', 'Hide All Info');
					$('show_allinfo').addClass('active');
					container.getElement("a.toggleinfo").set('text', '[Hide More Info]');
				}
				else
				{
					$("show_allinfo").set('text', 'Show All Info');
					$('show_allinfo').removeClass('active');
					container.getElement("a.toggleinfo").set('text', '[Show More Info]');
				}
			}
		});
		
		$("show_allinfo").addEvent("click", function(e){
			e = new Event(e);
			toggleAllInfo.toggle();
			e.stop();
		});
		
	});
	
	/**
	 * Check / Uncheck All event
	 *
	 */
	$('checkall').addEvent("click", function(e){
		e = new Event(e);
		$$('.imgchkbox').each(function(el)
		{
			if(checkornot(el))
			{
				el.checked = false;
				el.getParent().removeClass('checked');
			} 
			else
			{
				el.checked = true;
				el.getParent().addClass('checked');
			}
		});
		e.stop();
	});
	
});