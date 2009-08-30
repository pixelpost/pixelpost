/**
 * INFO FUNCTIONS
 *
 */
window.addEvent('domready', function(){
	
	var status = $('status');
	
	/*
	 * Path / Host Information accordion toggle
	 *
	 */
	var statusElement = status.hasClass('error'); //returns true otherwise false
	
	if(statusElement) {
		var infoToShow = 0;
		
		/*
		 * Close the status div
		 *
		 */
		$('closeBox').addEvent('click', function(e){
			
			var statusRoll = status.hasClass('roll'); //returns true otherwise false
			var statusFade = status.hasClass('fade'); //returns true otherwise false
			
			e = new Event(e);
			
			if(statusRoll){
				
				var statusSlide = new Fx.Slide('status').toggle().chain(
					function(){
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
						status.stop();
					}
				});
				
			}
			
			else
			{
				//e = new Event(e);
				status.dispose();
				//e.stop();
			}
			
			e.stop();

		});
	}
	else
	{
		var infoToShow = 1;
	}
	/**
	 * Path / Host Information Accordion
	 *
	 */
	var infoAccordion = new Accordion('h4.infoHeading', 'div.infoStart', {
		opacity: false,
		display: infoToShow,
		onActive: function(infoHeading, infoStart){
			infoHeading.setStyle('color', '#333');
			infoHeading.setStyle('cursor', 'default');
		},
		onBackground: function(infoHeading, infoStart){
			infoHeading.setStyle('color', '#6087ab');
			infoHeading.setStyle('cursor', 'pointer');
		}
	});
	/**
	 * Export Information Accordion
	 *
	 */
	var codeAccordion = new Accordion('h4.codeHeading', 'div.codeStart', {
		opacity: false,
		display: 1,
		onActive: function(codeHeading, codeStart){
			codeHeading.setStyle('color', '#333');
			codeHeading.setStyle('cursor', 'default');
		},
		onBackground: function(codeHeading, codeStart){
			codeHeading.setStyle('color', '#6087ab');
			codeHeading.setStyle('cursor', 'pointer');
		}
	});
	
});