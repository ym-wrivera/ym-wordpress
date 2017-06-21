'use strict';

/**
 * Fixed Header/Logo swap
 */
(function (document, $) {

  function debounce(func) {
    var wait = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 5;
    var immediate = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;

    var timeout = void 0;
    return function () {
      var context = this;
      var args = arguments;
      var later = function later() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;

      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  function fixHeader() {
    var adminBar = document.querySelector('#wpadminbar');
    var beforeHeader = document.querySelector('.before-header');
    var header = document.querySelector('.site-header');

    var topOfBeforeHeader = beforeHeader.clientHeight;
    var headerHeight = header.clientHeight;

    if ('undefined' !== typeof adminBar && null != adminBar) {
      header.style.top = adminBar.clientHeight + 'px';
    }

    document.body.classList.add('fixed-header');
    document.body.style.paddingTop = headerHeight + 'px';

    if (window.scrollY <= topOfBeforeHeader) {
      document.body.classList.remove('fixed-header');
      document.body.style.paddingTop = 0;
    }
  }

  window.addEventListener('scroll', fixHeader);
})(document, jQuery);