var App = (function($) {
  "use strict";

  function isHeightMore(height) {
    if(document.documentElement.clientHeight > height) {
      return true;
    } else {
      return false;
    }
  }

  function isWidthLess(width) {
    if(window.innerWidth < width) {
      return true;
    } else {
      return false;
    }
  }

  function isWidthMore(width) {
    if(window.innerWidth > width) {
      return true;
    } else {
      return false;
    }
  }

  /* Windows Phone 8 viewport issue */
  function ieViewport() {
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
      var msViewportStyle = document.createElement("style");
      msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
      document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
    }
  }

    /* Float labels */
    function floatLabels() {
      var input = $('.form__input'),
          label = $('.form__label');
      
      input.each(function() {

        var that = $(this);

        that.keyup(function() {
          that.prev().addClass('typing');

          if(that.val().length === 0) {
            that.prev().removeClass('typing');
          }
        });
      });
    }

  return {
      ieViewport: ieViewport,
      floatLabels: floatLabels
  };

})(jQuery);

App.ieViewport();
App.floatLabels();
console.log('pavelsuraba.com - Welcome fellow developers!');
