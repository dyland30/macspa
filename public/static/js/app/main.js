// App Namespace
var MacSpa = {};

// Browswer detect
MacSpa.device = {
    isTouch: navigator.userAgent.match(/iPhone|iPod|iPad|Android/i) ? true : false,
    has3d: 'WebKitCSSMatrix' in window && 'm11' in new WebKitCSSMatrix(),
    browser : (function() {
        this.tests = {};
        this.tests.is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
        this.tests.is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
        this.tests.is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
        this.tests.is_safari = navigator.userAgent.indexOf("Safari") > -1;
        this.tests.is_Opera = navigator.userAgent.indexOf("Presto") > -1;  
        if ((this.tests.is_chrome)&&(this.tests.is_safari)) {this.tests.is_safari=false;}
        return this.tests;
    })()
};


// Funções uteis
MacSpa.utils = {};

// pré-carregamento de imagens
MacSpa.utils.preloadImage = function(url, complete) {
    if ( MacSpa.utils.preloadImage.cache[url] ) {
        complete.call(null);
        return;
    }
    var img = new Image();
    img.onload = function() {
        complete.call(null);
        MacSpa.utils.preloadImage.cache[url] = true;
    };
    img.src = url;
};

MacSpa.utils.preloadImage.cache = {};

// pré-carregamento de várias imagens
MacSpa.utils.preloadImages = function(urls, complete, i) {
    if ( !urls || urls.length === 0 ) {
        throw new Error("Um array era esperado");
    }    
    i = i || 0;
    var url = urls[i];    
    if ( ! url ) {
        complete.call(this, i);
        return;
    }
    MacSpa.utils.preloadImage(urls[i], function() {
        MacSpa.utils.preloadImages(urls, complete, i+1);
    });
};

// Calculo a proproção da imagem passada no parametro [url], retornando no callback [complete]
MacSpa.utils.getImageAspectRatio = function(url, complete) {
    var cachedValue = MacSpa.utils.getImageAspectRatio.cache[url];
    if ( cachedValue ) {
        complete.call(null, cachedValue);
        return;
    }
    var img = new Image(), aspectRatio;
    img.onload = function() {
        aspectRatio = img.width/img.height;
        complete.call(null, aspectRatio);
        MacSpa.utils.getImageAspectRatio.cache[url] = aspectRatio;
    };
    img.src = url;
};

MacSpa.utils.getImageAspectRatio.cache = {};

MacSpa.utils.translate = function() {
    this.supportTransform = MacSpa.device.browser.is_safari || $.browser.mozilla || $.browser.opera;
    this.animProp = 'left'; // property to animate, left, translate
    this.animProp2 = 'top'; // property to animate, top, translate
    this.propStart = ''; // propStart star translate(), translate3d
    this.propEnd = 'px';
    
    
    // animation style detection    
    if ( MacSpa.device.browser.is_safari ) {
        this.animProp = '-webkit-transform';

        if ( MacSpa.device.has3d ) {
            // this.propStart = 'translate3d(';
            // this.propEnd = ', 0)';
            this.propStart = 'translate(';
            this.propEnd = ')';            
        } else {
            this.propStart = 'translate(';
            this.propEnd = ')';   
        }
    } else if ( $.browser.mozilla ) {
        this.animProp = 'MozTransform';
        this.propStart = 'translate(';
        this.propEnd = ')';        
    } else if ( $.browser.opera ) {
        this.animProp = 'oTransform';
        this.propStart = 'translate(';
        this.propEnd = ')';
    }
};

MacSpa.utils.translate.prototype.set = function(el, x, y) {
    if ( this.supportTransform ) {
        el.style[this.animProp] = this.propStart + x + 'px, ' + y + 'px' + this.propEnd;
    }  else {
        el.style[this.animProp] = this.propStart + x + this.propEnd;
        el.style[this.animProp2] = this.propStart + y + this.propEnd;
    }
};

MacSpa.utils.oldBrowsers = function() {
    this.overlay = $('<div>', {
        css : {
            'background' : '#000',
            'opacity' : 0.8,
            'position' : 'fixed',
            'width' : '100%',
            'height' : '100%',
            'z-index' : '10000'
        }
    });
    
    this.message = $('<div>', {
        css : {
            'background' : '#fff',
            'position' : 'fixed',
            'top' : '40%',
            'left' : '50%',
            'margin-left' : '-250px',
            'width' : '480px',
            'padding' : '10px',
            'z-index' : '10001',
            'color' : '#000',
            'text-align' : 'center',
            'font-size' : '16px'
        },
        html : 'Su navegador parece ser muy antiguo <br> Algunos recursos no funcionaran correctamente! <br><a href="#" id="destroy-message">Continuar</a> <br><br> <a href="http://www.updateyourbrowser.net/pt/" target="_blank">Como atualizar su navegador?</a>'
    });
    
    $('body').append(this.overlay);
    $('body').append(this.message);
    $("#destroy-message").bind('click', $.proxy(this.destroy, this));
};

MacSpa.utils.oldBrowsers.prototype.destroy = function(event) {
    event.preventDefault();
    this.overlay.remove();
    this.message.remove();
};

MacSpa.pages = {
    'home' :                            { 'url' : 'home/',                      'id' : '#page-acercadenosotros' },
    'acercadenosotros' :                { 'url' : 'acercadenosotros/',          'id' : '#page-acercadenosotros' },
    'galeria' :                         { 'url' : 'galeria/',                   'id' : '#page-galeria' },
    'promociones' :                     { 'url' : 'promociones/',               'id' : '#page-promociones' },
    'macsalon_fotos' :                  { 'url' : 'macsalon/fotos/',            'id' : '#page-macsalon-fotos' },
    'macsalon_servicios' :              { 'url' : 'macsalon/servicios/',        'id' : '#page-macsalon-servicios' },
    'macsalon_equipo' :                 { 'url' : 'macsalon/equipo/',           'id' : '#page-macsalon-equipo' },
    'macspa_fotos' :                    { 'url' : 'macspa/fotos/',              'id' : '#page-macspa-fotos' },
    'macspa_servicios' :                { 'url' : 'macspa/servicios/',          'id' : '#page-macspa-servicios' },
    'macspa_equipo' :                   { 'url' : 'macspa/equipo/',             'id' : '#page-macspa-equipo' },
    'eventos' :                         { 'url' : 'blend/eventos/',             'id' : '#page-eventos' },
    'preagendamento' :                  { 'url' : 'pre-agendamento/',           'id' : '#page-preagendamento' }
};

// Router de la aplicacion
MacSpa.Router = Backbone.Router.extend({
    
    initialize: function(){
        this.createRoutes();
    },
    
    createRoutes: function(){
        var currentPage, page;
        for( page in MacSpa.pages){
            currentPage = MacSpa.pages[page];
            this.route(currentPage.url, page, this[page]);
        }
    },

    home: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.home.url);
        MacSpa.macSpaApp.openPageHome(MacSpa.pages.acercadenosotros.id);
    },
    
    
    acercadenosotros: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.acercadenosotros.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.acercadenosotros.id);
    },
    
    galeria: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.galeria.url);
        MacSpa.macSpaApp.openPageGaleria(MacSpa.pages.galeria.id);
    },
    
    macsalon_fotos: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.macsalon_fotos.url);
        MacSpa.macSpaApp.openPageFotos(MacSpa.pages.macsalon_fotos.id);
    },
    macspa_fotos: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.macspa_fotos.url);
        MacSpa.macSpaApp.openPageFotos(MacSpa.pages.macspa_fotos.id);
    },
    
    macsalon_servicios: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.macsalon_servicios.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.macsalon_servicios.id);
    },
    macspa_servicios: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.macspa_servicios.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.macspa_servicios.id);
    },
    
    macsalon_equipo: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.macsalon_equipo.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.macsalon_equipo.id);
    },

    macspa_equipo: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.macspa_equipo.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.macspa_equipo.id);
    },
    promociones: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.promociones.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.promociones.id);
    },

    eventos: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.eventos.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.eventos.id);
    },
    
    preagendamento: function(){
        MacSpa.macSpaApp.activateItemMenu(MacSpa.pages.preagendamento.url);
        MacSpa.macSpaApp.openPage(MacSpa.pages.preagendamento.id);
    }
    
});

MacSpa.App = Backbone.View.extend({
    
    el: 'body',
    
    events: {
        'click .page-link' : 'linkHandler'
    },
    
    initialize: function(){
        _.bindAll(this, ['resize']);
        
        this.skipPageAnimation = true;
        this.body = $('body');
        this.pages = $('.page');
        this.currentPage = $();
        this.windowWidth = $(window).width();
        
        // CSS translate
        this.translate = new MacSpa.utils.translate();
        
        // hide all pages
        this.hidePages();
        
        // usando smartresize no lugar do evento resize
        $(window).on('throttledresize', this.resize);
        
    },
    
    // modifições necessárias quando o browser for redimensionado
    resize: function(){
        this.resizeBackground();
        this.windowWidth = $(window).width();
        // this.hidePages();
        this.resizeVisiblePageScrollbars();
        
        // redimensiona galeria de fotos
        if ( this.currentPage.is("#page-fotos") ) {
            MacSpa.fotosMacSpa.resizeImageContainer();
            MacSpa.fotosMacSpa.updatePagination();
        } else if ( this.currentPage.is("#page-galeria") ) {
            MacSpa.fotosGaleria.resizeImageContainer();
            MacSpa.fotosGaleria.updatePagination();            
        }
        
        if ( this.currentPage.is("#page-preagendamento") ) {
            MacSpa.form.resizeTextarea();
        }
    },
    
    getImageAspectRatio: MacSpa.utils.getImageAspectRatio,
    
    // redimensiona o background de acordo com as proporções da janela
    resizeBackground: function(){
        var win = $(window),
            image = $('.background', this.currentPage),
            winWidth = win.width(),
            winHeight = win.height(),
            aspectRatio = winWidth/winHeight;
        
        this.getImageAspectRatio(image.attr('src'), function(imgAspectRatio) {
            if ( aspectRatio < imgAspectRatio ) {
                image.removeClass('full-width').addClass('full-height');
            } else if ( aspectRatio > imgAspectRatio ) {
                image.removeClass('full-height').addClass('full-width');
            } 
        });      
    },
    
    resizeVisiblePageScrollbars: function(){
        var self = this;
        $('.scroll', this.currentPage).each(function() {
            
            var scroll = $(this),
                extra,
                scrollAPI = scroll.data('jsp');
            
            if ( !scrollAPI ) {
                // scrollbars
                scroll.jScrollPane({ verticalGutter: 10, hideFocus: true });
                scrollAPI = scroll.data('jsp');
            }
            
            if ( scroll.parents('.form-options-content').length ) {
                extra = 150;
            } else {
                extra = 118;
            }
			if ( self.currentPage.is("#page-preagendamento") ) {
				extra = 85;	
			}
			
            var maxHeight = parseFloat(scroll.css('max-height'));
            var contentHeight = scroll.offset().top + maxHeight + extra;
            var diff = contentHeight-$(window).height();
            
            scroll.height(maxHeight-diff);
            scrollAPI.reinitialise();
            
            if ( self.currentPage.is("#page-preagendamento") ) {
                MacSpa.form.resizeTextarea();
            }
            
        });              
    },
    
    hidePages: function(){
        var self = this;
        this.pages.not(self.currentPage).hide();
    },
    
    hidePage: function(page, animate, complete){
        this.translate.set(page[0], -$(window).width(), 0);
    },
    
    // chama o método associada a url no Router
    linkHandler: function(event){
        event.preventDefault();
        var url = $(event.currentTarget).attr('href');
        MacSpa.router.navigate(url, {'trigger': true});
    },
    
    preloadBackgrounds: function(page, complete){
        var self = this, backgrounds, backgroundsEl = $('.background', page);
        
        if ( page.data('background-complete') ) {
            complete.call(this);
        }
        
        backgrounds = $.map(backgroundsEl, function(item) { return $(item).data('src'); });
        
        MacSpa.utils.preloadImages(backgrounds, function() {
            backgroundsEl.each(function() { $(this).attr('src', $(this).data('src')); });
            page.data('background-complete', true);
            complete.call(self);
        });
        
    },
    
    // animacion de pagina
    animatePage: function(el, outEl){
        var leftVal, textConceitoVisible;
        MacSpa.preloader.hide();
        
        if ( this.skipPageAnimation ) {
            this.skipPageAnimation = false;
            // this.translate.set(el[0], 0, 0);
            el.css('opacity', 1);
            $('.wrapper-slide', el).css({ left: '0%'});
            return;
        }
        
        if ( outEl.attr('id').match(/page-acercadenosotros/) ) {
            // texto de conceito
            leftVal = parseFloat($('.page-acercadenosotros-slide', outEl).css('left'), 10);
            textConceitoVisible = leftVal && leftVal <= 0;
        }
        
        if ( textConceitoVisible ) {
            el.stop().fadeTo(500, 1, function() {
                $('.wrapper-slide', el).stop().animate({ left: '0%'}, 1000, 'easeOutExpo');
            });            
        } else {
            $('.wrapper-slide', outEl).stop().animate({'left':'100%'}, 800, 'easeInExpo', function() {   
                setTimeout(function() {
                    el.stop().fadeTo(500, 1, function() {
                        $('.wrapper-slide', el).stop().animate({ left: '0%'}, 1000, 'easeOutExpo');
                    }); 
                }, 300);
            });
        }        
    },
    
    activateItemMenu: function(url){
        $('.linkAtivo').removeClass('linkAtivo');
        
        if(url != 'home/'){
            $('a[href="#'+url+'"]').parent().addClass('linkAtivo');
            if($('a[href="#'+url+'"]').parent().parent().hasClass('fade')){
                $('a[href="#'+url+'"]').parent().parent().parent().addClass('linkAtivo');    
            }    
        }
    },
    
    openPage: function(id){
        var self = this,
            nextPage = $(id),
            currentPage = this.currentPage,
            pages = this.pages,
            otherPages = pages.not(nextPage).not(currentPage);
            otherPages.hide().css({'z-index' : 1});
            
        currentPage.css({'z-index' : 2});
        // this.translate.set(nextPage[0], -self.windowWidth, 0);
        this.currentPage = nextPage;
        nextPage.css({'z-index':3}).show().css('opacity', 0);
        $('.wrapper-slide', nextPage).css('left', '-100%');
        
        if ( MacSpa.map.isOpen ) {
            MacSpa.map.hideMap(null, function() {
                self.preAnimatePage(nextPage, currentPage);
            });
        } else {
            self.preAnimatePage(nextPage, currentPage);
        }
    },
    
    preAnimatePage: function(nextPage, currentPage){
        var self = this;
        MacSpa.preloader.show();
        self.preloadBackgrounds(nextPage, function() {
            self.resizeBackground();
            self.resizeVisiblePageScrollbars();
            MacSpa.preloader.hide();
            setTimeout(function() {
                self.animatePage( nextPage, currentPage );
            }, 300);
        });
    },
    
    openPageFotos: function( id ){
        MacSpa.fotosMacSpa.fastCloseGallery();
        MacSpa.fotosMacSpa.updatePagination();
        this.openPage( id );
    },

    openPageGaleria: function( id ){
        MacSpa.fotosGaleria.fastCloseGallery();
        MacSpa.fotosGaleria.updatePagination();
        this.openPage( id );
    },
        
    openPageHome: function( id ){
        
        if ( MacSpa.map.isOpen ) {
            MacSpa.map.hideMap();
        }
        
        var isPageOpen = id.match( this.currentPage.attr('id') );
        if ( !isPageOpen || !this.currentPage.attr('id') ) {
            this.openPage(id);
        }
        
        $('.page-acercadenosotros-slide').stop().animate({'left': '-100%'}, 1500, 'easeOutExpo');
        $('#page-acercadenosotros .background').stop().animate({'margin-right': '0%'}, 1500, 'easeOutExpo');
    },
    
    openPageAcercadenosotros: function( id ){
        
        if ( MacSpa.map.isOpen ) {
            MacSpa.map.hideMap();
        }
        
        var isPageOpen = id.match( this.currentPage.attr('id') );
        
        if ( !isPageOpen || !this.currentPage.attr('id') ) {
            this.openPage(id);
        }
        
        $('.page-acercadenosotros-slide').stop().animate({'left': '0%'}, 1500, 'easeOutExpo');
        $('#page-acercadenosotros .background').stop().delay(300).animate({'margin-right': '-20%'}, 1500, 'easeOutExpo');
    }
});

MacSpa.Fotos = Backbone.View.extend({
    
   initialize: function(){
       this.started = false;       
       this.context = this.options.context;
       this.index = 0;
       this.source = $('.image-list li', this.context);
       this.current = this.source.eq(0);
       this.image = $('.gallery-image', this.context);
       this.closeButton = $('.gallery-close', this.context);
       this.nextButton = $('.next', this.context);
       this.prevButton = $('.prev', this.context);
       $('.total', this.context).text(this.source.length);
       this.prevButton.bind('click', $.proxy(this.prevHandler, this));       
       this.nextButton.bind('click', $.proxy(this.nextHandler, this));
       this.closeButton.bind('click', $.proxy(this.closeGallery, this));
       this.options.menuButton.bind('click', $.proxy(this.closeGallery, this));
       this.source.bind('click', $.proxy(this.thumbClick, this));
       this.lastNumRows = null;
       this.isOpen = false;
       
        $('img', this.source).each(function(index) {
            var img = $(this);
            $(this).grayscaleClone({
                'callback' : function(clone) {
                    clone.addClass('img-bw');
                    img.parent().append(clone);
                }
            });
        });
        
        // paginación
        this.updatePagination();
   },
   
   start: function(){
       if ( !this.started ) {
           this.started = true;
           this.openImage(this.current, 'up');
           this.isOpen = true;
       }
   },
   
   thumbClick: function(event){
       event.preventDefault();
       var li = $(event.currentTarget), self = this;
       
       if ( $('a', li).attr('href') == '#' ) {
           return;
       }
              
       this.current = li;
       this.isOpen = true;
       
       if( $('.bw', self.context).length ) {
           $('.bw', self.context).fadeIn(700).promise().done(function() {
               $('.normal', self.context).hide();
               $('.gallery-container', self.context).fadeIn(function() {
                   self.openImage(li);
               });
           });
       } else {
           $('.wrapper', this.context).fadeOut(function() {
               $('.gallery-container', self.context).fadeIn(function() {
                   self.openImage(li);
               });
           });
       }
   },
   
   resizeImageContainer: function(){
       var self = this;
       $('.gallery-container', this.context).width($('.gallery-image', self.context).eq(0).width());
   },
   
   paginate: function(numRows){
       if ( numRows <= 0 ) {
           numRows = 1;
       }
       $('.page_navigation', this.context).empty();       
       this.context.pajinate({
           items_per_page : 4*numRows,
           show_first_last: false,
           item_container_id : '.image-list',
           nav_panel_id : '.page_navigation',
           nav_label_prev: '',
           nav_label_next: ''
       });       
       $('.previous_link', this.context).hide();
       $('.next_link', this.context).hide();
       $('.ellipse', this.context).show();
       if ( $('.page_link', this.context).length > 1 ) {
            $('.page_link', this.context).show();
       }
       $('.page_navigation', this.context).css('margin-left', -( $('.page_link', this.context).length * 15 )/2 );
   },
   
   updatePagination: function(){
       var posY = $(window).height() - 480;
       var numRows = Math.ceil(posY/128);
       if ( this.lastNumRows != numRows ) {
           this.lastNumRows = numRows;
           this.paginate(numRows);
       }
   },
   
   openImage: function(li, d){
       var index = this.source.index(li), text, self = this, url = $('a', li).attr('href'), cloneStart, imageEnd, cloneEnd;
       $('.current', this.context).text(index+1);
       text = $('img', li).data('credito');
       $('.gallery-creditos p', this.context).text(text ? text : '');
       
       if ( d == 'next' ) {
           cloneStart = '100%';
           imageEnd = '-100%';
           cloneEnd = '0%';
       } else if ( d == 'prev' ) {
            cloneStart = '-100%';
            imageEnd = '100%';
            cloneEnd = '0%';
       }
       MacSpa.preloader.show('gallery');
       MacSpa.utils.preloadImage(url, function() {
           MacSpa.preloader.hide();
           var image = $('.gallery-image', self.context).eq(0);
           
           if ( !d ) {
               image.css('opacity', 0);
               image.attr('src', url);
               image.stop().animate({'opacity':1}, 500);
               setTimeout(function() {
                   $('.gallery-container', this.context).css({'width' : image.width()});
               }, 100);
               return;
           }
           
           var clone = image.clone();
           clone.attr('src', url);
           image.after(clone);
           clone.css('left', cloneStart);
           $.when( image.animate({'left': imageEnd}, 800, 'easeInOutExpo'), clone.animate({'left': cloneEnd}, 800, 'easeInOutExpo') ).done(function() {
              clone.prevAll('img').remove();
              $('.gallery-container', this.context).stop().animate({'width' : clone.width()}, 400);
           });
       });
   },
   
   closeGallery: function(event){
       
       if ( event ) {
           event.preventDefault();
       }
       
       if ( !this.isOpen ) {
           return;
       }
       
       var self = this;
       this.started = false;
       this.isOpen = false;
       
       if ( $('.bw', this.context).length ) {
           $('.gallery-container', this.context).fadeOut(function() {
               $('.normal', this.context).show();
               $('.bw', this.context).fadeOut(700);
               // remove a imagem atual
               $('.gallery-image', self.context).eq(0).attr('src', 'static/images/global/pixel.gif');
           });
       } else {
           $('.gallery-container', self.context).fadeOut(function() {
                $('.wrapper', this.context).fadeIn();
                // remove a imagem atual
                $('.gallery-image', self.context).eq(0).attr('src', 'static/images/global/pixel.gif');
           });
       }
   },
   
   fastCloseGallery: function(){
       this.isOpen = false;
       if ( $('.bw', this.context).length ) {
           $('.gallery-container', this.context).hide();
           $('.normal', this.context).show();
           $('.bw', this.context).hide();
       } else {
           $('.gallery-container', this.context).hide();           
           $('.wrapper', this.context).show();
       }
       $('.gallery-image', self.context).eq(0).attr('src', 'static/images/global/pixel.gif');
   },
   
   nextHandler: function(event){
       event.preventDefault();
       this.getNext();
   },
   
   prevHandler: function(event){
       event.preventDefault();
       this.getPrev();
   },
   
   getNext: function(){
       if ( $('.gallery-image', this.context).is(':animated') ) {
           return;
       }
       var next = this.current.nextAll().filter(function() {
           var href = $( 'a', $(this) ).attr('href');
           return href && href != '#';
       }).eq(0);
       
       if ( next.length ) {
           this.current = next;
       } else {
           this.current = this.source.first();
       }
       this.openImage(this.current, 'next');
   },
   
   getPrev: function(){
       if ( $('.gallery-image', this.context).is(':animated') ) {
           return;
       }
       
       var prev = this.current.prevAll().filter(function() {
              var href = $( 'a', $(this) ).attr('href');
              return href && href != '#';
       }).eq(0);
          
       if ( prev.length ) {
           this.current = prev;
       } else {
           this.current = this.source.last();
       }
       this.openImage(this.current, 'prev');
   }
   
});

MacSpa.Map = Backbone.View.extend({
    initialize: function(){
        this.container = $('#page-map');
        this.mapContainer = $('#map-canvas');
        this.closeButton = $('#map-close');
        this.openButton = $("#open-map");
        
        this.openButton.bind('click', $.proxy(this.showMap, this));
        this.closeButton.bind('click', $.proxy(this.hideMap, this));
        
        this.mapInitialized = false;
        this.isOpen = false;
        this.initMap();
    },
    
    codeAddress: function(addr, callback) {
        this.geocoder.geocode( { 'address': addr}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0].geometry.location);
            } else {
                alert( "Geocode was not successful for the following reason: " + status );
            }
        });
    },
    
    initMap: function(){
        var self = this;
        
        this.destination = "M Gallagher De Parks 289, San Miguel, Lima,  Peru";
        this.geocoder = new google.maps.Geocoder();
        this.icon = new google.maps.MarkerImage( 'static/images/map/pin.png');
        this.mapOptions = {
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        this.map = new google.maps.Map(this.mapContainer[0], this.mapOptions);

        this.marker = new google.maps.Marker({
            map: this.map,
            icon : this.icon
        });
        
        this.codeAddress(this.destination, function(latlng) {
            self.marker.setPosition(latlng);
            self.map.setCenter(latlng);


        });
        
        this.mapInitialized = true;
        
    },
    
    showMap: function(event){
        if ( event ) {
            event.preventDefault();
        }
        this.openButton.fadeOut(100);
        if ( $.browser.msie ) {
            $('#pages').stop().animate({'top' : '-15%'}, 1000, 'easeOutExpo');
            this.closeButton.stop().animate({'opacity': 1}, 600);
            this.container.stop().animate({'bottom' : '0%'}, 900, 'easeOutExpo');
            $('.wrapper').not('.wrapper-logo').fadeTo(400, 0);
            $('.gallery-container').fadeTo(400, 0);
        } else {
            this.container.addClass('show');
            $('body').addClass('show-map');
        }
        this.isOpen = true;
    },
    
    hideMap: function(event, callback){
        
        if ( event ) {
            event.preventDefault();
        }
        var self = this;
        this.openButton.delay(600).fadeIn(300);
        if ( $.browser.msie ) {
            $('#pages').stop().animate({'top' : '0%'}, 1000, 'easeOutExpo');
            this.closeButton.stop().animate({'opacity': 0}, 600);
            this.container.stop().animate({'bottom' : '-60%'}, 900, 'easeOutExpo');
            $('.wrapper').not('.wrapper-logo').fadeTo(400, 1);
            $('.gallery-container').fadeTo(400, 1);            
        } else {
            this.container.removeClass('show');
            $('body').removeClass('show-map');
        }
        setTimeout(function() {
            if ( callback ) {
                callback.call(self);
            }
            self.isOpen = false;
        }, 1000);
    }
});

MacSpa.Form = Backbone.View.extend({
    initialize: function(){
        this.servicosContainer = $("#form-options-servicos");
        this.profissionaisContainer = $("#form-options-profissionais");
        this.buttonServicos = $("#button-servicos");
        this.buttonProfissionais = $("#button-profissionais");
        this.textarea = $('#comentario');
        
        this.buttonCloseServicos = $('.voltar', this.servicosContainer);
        this.buttonOkServicos = $('.ok', this.servicosContainer);
        
        this.buttonCloseProfissionais = $('.voltar', this.profissionaisContainer);
        this.buttonOkProfissionais = $('.ok', this.profissionaisContainer);
        
        //this.buttonEnviaFormulario = $('.button_enviar');
        
        this.buttonServicos.bind('click', $.proxy(this.showServicos, this));
        this.buttonCloseServicos.bind('click', $.proxy(this.hideServicos, this));
        this.buttonOkServicos.bind('click', $.proxy(this.selectServicos, this));
        
        this.buttonProfissionais.bind('click', $.proxy(this.showProfissioanis, this));
        this.buttonCloseProfissionais.bind('click', $.proxy(this.hideProfissionais, this));
        this.buttonOkProfissionais.bind('click', $.proxy(this.selectProfissionais, this));
        
        this.initWidgets();
    },
    
    initWidgets: function(){
        // buttons
        $('input[type="checkbox"]').button();
        
        // mascaras
        $('.form-row .data').mask("( 99 / 99 / 9999 )");
        $('.form-row .hora').mask("( 99:99 )");
        
        // datepicker
        Date.format = '( dd / mm / yyyy )';
        $('#datepicker-1, #datepicker-2').datePicker({
            createButton: false,
            verticalOffset: 38,
            horizontalOffset: -141,
            displayClose: true
        }).bind('dpClosed', function(event) {
            $(this).prev().removeClass('active');
        });
        
        $('.show-calendar').bind('click', function(event) {
            event.preventDefault();
            $(this).addClass('active');
            $(this).next().dpDisplay();
        });
    },
    
    resetCalendar: function(){
        var now = new Date(), m = now.getMonth(), y = now.getFullYear();
        $('#datepicker-1, #datepicker-2').dpSetDisplayedMonth(m, y);
    },
    
    resizeTextarea: function(){
        this.textarea.css("height", $('.scroll-form').height() - 220 );
    },
    
    selectProfissionais: function(event){
        var profissionais = $.map( $('#form-options-profissionais input:checked'), function(el){
            return $('label[for="'+$(el).attr('id')+'"]').text();
        }).join(', ');
        $('#profissionais-selecionados').val(profissionais);
        this.hideProfissionais(event);
    },
    
    selectServicos: function(event){
        var servicos = $.map( $('#form-options-servicos input:checked'), function(el){
            return $('label[for="'+$(el).attr('id')+'"]').text();
        }).join(', ');
        $('#servicos-selecionados').val(servicos);
        this.hideServicos(event);
    },
    
    showServicos: function(event){
        event.preventDefault();
        this.servicosContainer.stop().animate({'right': '0%'}, 600, 'easeOutExpo');
    },
    
    hideServicos: function(event){
        event.preventDefault(); 
        this.servicosContainer.stop().animate({'right': '-100%'}, 1000, 'easeOutExpo');       
    },
    
    showProfissioanis: function(event){
        event.preventDefault();
        this.profissionaisContainer.stop().animate({'right': '0%'}, 600, 'easeOutExpo');
    },
    
    hideProfissionais: function(event){
        event.preventDefault(); 
        this.profissionaisContainer.stop().animate({'right': '-100%'}, 1000, 'easeOutExpo');       
    }
});

MacSpa.Preloader = Backbone.View.extend({
    
    initialize: function(){
        var cl = new CanvasLoader('blend-preloader');
		cl.setColor('#bbbbbb'); // default is '#000000'
		cl.setShape('roundRect'); // default is 'oval'
		cl.setDiameter(32); // default is 40
		cl.setDensity(12); // default is 40
		cl.setRange(1); // default is 1.3
		cl.setSpeed(1); // default is 2
		cl.show(); // Hidden by default
    },
    
    el: '#blend-preloader',
    
    show: function(local){
        
        var target;
        if ( local == 'gallery' ) {
            target = $('.gallery-container', MacSpa.macSpaApp.currentPage);            
        } else {
            target = $('body');            
        }
        this.$el.appendTo(target);
        this.$el.show();
    },
    
    hide: function(){
        this.$el.hide();
    }
});

MacSpa.init = function() {
    MacSpa.router = new MacSpa.Router();
    MacSpa.preloader  = new MacSpa.Preloader();
    MacSpa.macSpaApp = new MacSpa.App();
    MacSpa.map = new MacSpa.Map();
    MacSpa.fotosMacSpa = new MacSpa.Fotos({ context: $('#page-macsalon-fotos'), menuButton: $('.page-link-fotos') });
    MacSpa.fotosMacSpa = new MacSpa.Fotos({ context: $('#page-macspa-fotos'), menuButton: $('.page-link-fotos') });
    MacSpa.fotosGaleria = new MacSpa.Fotos({ context: $('#page-galeria'), menuButton: $('.page-link-galeria') });
    MacSpa.form = new MacSpa.Form();
    Backbone.history.start();
    
    if ( !location.hash ) {
        MacSpa.router.navigate('home/', { trigger: true });
    }
    
    // old browsers message
    if ( $.browser.msie && $.browser.version <= 7 ) {
        new MacSpa.utils.oldBrowsers();
    }
};

$(function() {
    MacSpa.init();
});