		$('.correl_value').each(function(i, val) {
			var json = [{"min":-0.7,"max":0.7}];
			var el = $(val).children();
			el.each(function(i1, val1) {
				correl_value = $(val1).html();
				if(!isNaN(correl_value)) {
					
					if(correl_value < json[0].min) {
						$(val1).addClass('low');
					} else if(correl_value > json[0].max) {
						$(val1).addClass('high');
					} 
				}
			});
			
		});