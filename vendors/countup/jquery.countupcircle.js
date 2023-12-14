(function ($) {
    
    $.fn.CountUpCircle = function(options){

    	var self = this;
	
	    /**
	    * DEFAULT OPTIONS
	    *
	    * Description
	    *
	    * @param 
	    **/

		var settings = $.extend({
			duration: 1000, //ms
			opacity_anim: false,
			step_divider: 0.1
		}, options);

		var toCount = parseFloat(this.html());
		// var toCount = toCounter.toFixed(2);

		var i 	 		 = 0;
		var step 		 = settings.duration / (toCount / settings.step_divider);
		var procent_step = 1/(toCount / settings.step_divider);

		var displayNumber = function() {
			i=i+settings.step_divider;
			self.html(i.toFixed(2));
			if (settings.opacity_anim){
				self.css({'opacity':procent_step*i});
			}
			if (i < toCount - settings.step_divider) {
				setTimeout(displayNumber, step);
			}
			else{
				setTimeout(set_endpoint, step);
			}
		};
		
		var set_endpoint = function () {
			self.html(toCount+" Kg");
		}

		displayNumber();
	}

}(jQuery));
