LANDR = (function() {
  
  var LANDR = {},
      ua = navigator.userAgent,
      viewport = document.querySelector && document.querySelector('meta[name="viewport"]');

  LANDR.version = '0.1';

  LANDR.get = function(el) {
    return document.getElementById(el);
  }

  LANDR.init = function(id) {
    var elem = LANDR.get(id);
    if (elem) LANDR[id](elem);
  }

  LANDR.gallery = function() {
    
    var gallerySwipe = new Swipe(LANDR.get('gallery-slider'), {
      callback: function(e, pos) {
        var posElem = LANDR.get('gallery-slider-pos'),
            bullets = posElem.getElementsByTagName('em');
        var i = bullets.length;
        while (i--) {
          bullets[i].className = ' ';
        }
        bullets[pos].className = 'active';
      }
    });

    return gallerySwipe;

  }

  LANDR.feed = function() {
    
    var feedSwipe = new Swipe(LANDR.get('feed-slider'), {
      callback: function(e, pos) {
        var posElem = LANDR.get('feed-slider-pos'),
            bullets = posElem.getElementsByTagName('em');
        var i = bullets.length;
        while (i--) {
          bullets[i].className = ' ';
        }
        bullets[pos].className = 'active';
      }
    });

    LANDR.get('feed-prev').onclick = function(e) { 
      e.preventDefault();
      feedSwipe.prev();
    };

    LANDR.get('feed-next').onclick = function(e) { 
      e.preventDefault();
      feedSwipe.next();
    };

    return feedSwipe;
    
  }

  LANDR.twitter = function() {
    
    var twitterSwipe = new Swipe(LANDR.get('twitter-slider'), {
      callback: function(e, pos) {
        var posElem = LANDR.get('twitter-slider-pos'),
            bullets = posElem.getElementsByTagName('em');
        var i = bullets.length;
        while (i--) {
          bullets[i].className = ' ';
        }
        bullets[pos].className = 'active';
      }
    });

    return twitterSwipe;
    
  }

  LANDR.facebook = function() {
    
    var fbLike = LANDR.get('facebook-like');
    fbLike.src = fbLike.getAttribute('data-src');
    
  }

  LANDR.hours = function(elem) {
    
    elem.onclick = function() {

      var className = this.className,
          today = LANDR.get('hours-today'),
          week = LANDR.get('hours-week');

      if (className == 'today') {
        today.style.display = 'none';
        week.style.display = 'block';
        this.className = 'week';
      }

      else {
        week.style.display = 'none';
        today.style.display = 'block';
        this.className = 'today';
      }

    }
    
  }

  LANDR.contact = function(elem) {
    
    var contact = elem,
        inputs = contact.getElementsByTagName('input'),
        textareas = contact.getElementsByTagName('textarea'); 

    for (var i = inputs.length-1 ; i > -1; i--) {
      inputs[i].onfocus = contactFocus;
      inputs[i].onblur = contactBlur;
    }
    for (var i = textareas.length-1 ; i > -1; i--) {
      textareas[i].onfocus = contactFocus;
      textareas[i].onblur = contactBlur;
    }
    function contactFocus() {
      this.className = 'hasInput';
      this.parentNode.parentNode.className = 'focus';
    }
    function contactBlur() {
      if (!this.value.length) this.className = '';
      this.parentNode.parentNode.className = '';
    }
    
  }
  
  
  // Fix for iPhone viewport scale bug 
  // http://www.blog.highub.com/mobile-2/a-fix-for-iphone-viewport-scale-bug/
  LANDR.scaleFix = (function () {

    if (viewport && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
      
      viewport.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";

      document.addEventListener("gesturestart", function() {

        viewport.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";

      }, false);

    }

  })();


  // Hide URL Bar for iOS and Android by Scott Jehl
  // https://gist.github.com/1183357
  LANDR.hideUrlBar = (function() {
    
    var win = window,
        doc = win.document;

    // If there's a hash, or addEventListener is undefined, stop here
    if ( !location.hash || !win.addEventListener ) {

      //scroll to 1
      window.scrollTo( 0, 1 );
      var scrollTop = 1,

      //reset to 0 on bodyready, if needed
      bodycheck = setInterval(function(){
        if( doc.body ){
          clearInterval( bodycheck );
          scrollTop = "scrollTop" in doc.body ? doc.body.scrollTop : 1;
          win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
        } 
      }, 15 );

      if (win.addEventListener) {
        win.addEventListener("load", function(){
          setTimeout(function(){
            //reset to hide addr bar at onload
            win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
          }, 0);
        }, false );
      }
    }

  })();


  LANDR.init('facebook');
  LANDR.init('hours');
  LANDR.init('contact');

  Modernizr.load({
    test: Modernizr.csstransforms,
    yep: 'http://mobile.nexersys.com/swipe.001.min.js',
    complete: function() {
      LANDR.init('gallery');
      LANDR.init('feed');
      LANDR.init('twitter');
    }
  });

  return LANDR;

})();