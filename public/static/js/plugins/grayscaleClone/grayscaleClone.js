/*
    jQuery Grayscale Clone Plugin
    Author: Carlos Roberto Gomes Junior (carlos.rberto@gmail.com)
    
    Description:
    Clone an image element and return a clone converted to grayscale
    
    Usage:
    
    $('img').grayscaleClone({
        'callback' : function(clone, img) {
            // do something
        }
    })
*/

(function($) {
    function imageToGrayScale(element, preload, afterConvertCallback) {
        var imagePath = element.attr('src');
        var clone = $(element).clone();
        var hasCanvas = !! document.createElement('canvas').getContext;

        function preloadImage (url, callback) {
            var img = new Image();
            $(img).bind('load', callback);
            $(img).attr('src', url);
        }

        function grayscale(src){
            var canvas = document.createElement('canvas');
        	var ctx = canvas.getContext('2d');
        	var imgObj = new Image();
        	imgObj.src = src;
        	canvas.width = imgObj.width;
        	canvas.height = imgObj.height; 
        	ctx.drawImage(imgObj, 0, 0); 
        	var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
        	for(var y = 0; y < imgPixels.height; y++){
        		for(var x = 0; x < imgPixels.width; x++){
                    var i = (y * 4) * imgPixels.width + x * 4;
        			var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
        			imgPixels.data[i] = avg; 
        			imgPixels.data[i + 1] = avg; 
        			imgPixels.data[i + 2] = avg;
        		}
        	}
        	ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
            ctx.rotate(2*Math.PI/5);
            
        	return canvas.toDataURL();
        }

        function cloneToGrayScale(){
            if ( hasCanvas ) {
                clone.attr('src', grayscale( imagePath ) );
            } else {
                clone[0].style.filter = 'progid:DXImageTransform.Microsoft.BasicImage(grayScale=1)';
            }
            return clone;
        }

        if ( preload ) {
            preloadImage(imagePath, function() {
                if ( typeof afterConvertCallback === 'function' ) {
                    afterConvertCallback(cloneToGrayScale(), element);
                };
            });
        } else {
            if ( typeof afterConvertCallback === 'function' ) {
                afterConvertCallback(cloneToGrayScale(), element);
            };
        }

    }
    
    // plugin code
    $.fn.grayscaleClone = function(options) {
        
        var settings = $.extend( {
          'preload'         : true,
          'callback' : null // function(clone, original) { //do something }
        }, options);
        
        return this.each(function(options) {
            imageToGrayScale($(this), settings.preload, settings.callback);
        });
    }
})(jQuery);