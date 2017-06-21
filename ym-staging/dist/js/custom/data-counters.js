'use strict';

/**
 * Number Counters for /partials/data-content-block.php
 */
(function (document, $, undefined) {
  var forEach = function forEach(collection, callback, scope) {
    if ('[object Object]' === Object.prototype.toString.call(collection)) {
      for (var prop in collection) {
        if (Object.prototype.hasOwnProperty.call(collection, prop)) {
          callback.call(scope, collection[prop], prop, collection);
        }
      }
    } else {
      for (var i = 0, len = collection.length; i < len; i++) {
        callback.call(scope, collection[i], i, collection);
      }
    }
  };

  /**
   * countUp.js v1.7.1 | https://inorganik.github.io/countUp.js
   *
   * @type {{startCount}}
   */
  var countUpAnimation = function () {

    var easingFn = function easingFn(t, b, c, d) {
      var ts = (t /= d) * t;
      var tc = ts * t;
      return b + c * (tc + -3 * ts + 3 * t);
    };

    var options = {
      useEasing: true,
      easingFn: easingFn,
      useGrouping: true,
      separator: '',
      decimal: '',
      prefix: '',
      suffix: ''
    };

    var startCount = function startCount(counters) {
      counters = document.querySelectorAll('.amount');

      forEach(counters, function (value, index) {
        var endValue = value.innerText;

        if (endValue.length) {
          var queueCountAnimation = new CountUp(value, 0, endValue, 0, 2 / 2, options);
          queueCountAnimation.start(function () {
            queueCountAnimation.update(endValue);
          });
        }
      });
    };

    return {
      startCount: startCount
    };
  }();

  /**
   * Instantiate startCount() when stats container is close by.
   * @link https://github.com/imakewebthings/waypoints
   * @type {Element}
   */
  var stats = document.querySelector('.fc-statistics');

  var waypoint = new Waypoint({
    element: stats,
    handler: startCountUpAnimation,
    offset: 'bottom-in-view'
  });

  function startCountUpAnimation(scrollDirection) {
    if ('up' === scrollDirection || 'down' === scrollDirection) {
      countUpAnimation.startCount();
    }
  }
})(document, jQuery);