/**
 * Number Counters for /partials/data-content-block.php
 */
(function (document, $, undefined) {
  let forEach = function (collection, callback, scope) {
    if ('[object Object]' === Object.prototype.toString.call(collection)) {
      for (let prop in collection) {
        if (Object.prototype.hasOwnProperty.call(collection, prop)) {
          callback.call(scope, collection[prop], prop, collection)
        }
      }
    } else {
      for (let i = 0, len = collection.length; i < len; i++) {
        callback.call(scope, collection[i], i, collection)
      }
    }
  }

  /**
   * countUp.js v1.7.1 | https://inorganik.github.io/countUp.js
   *
   * @type {{startCount}}
   */
  const countUpAnimation = (function () {

    const easingFn = function (t, b, c, d) {
      let ts = (t /= d) * t
      let tc = ts * t
      return b + c * (tc + -3 * ts + 3 * t)
    }

    const options = {
      useEasing: true,
      easingFn: easingFn,
      useGrouping: true,
      separator: '',
      decimal: '',
      prefix: '',
      suffix: ''
    }

    const startCount = function (counters) {
      counters = document.querySelectorAll('.amount')

      forEach(counters, (value, index) => {
        let endValue = value.innerText

        if (endValue.length) {
          let queueCountAnimation = new CountUp(value, 0, endValue, 0, 2 / 2, options)
          queueCountAnimation.start(function () {
            queueCountAnimation.update(endValue)
          })
        }

      })
    }

    return {
      startCount: startCount
    }
  })()

  /**
   * Instantiate startCount() when stats container is close by.
   * @link https://github.com/imakewebthings/waypoints
   * @type {Element}
   */
  const stats = document.querySelector('.fc-statistics')

  const waypoint = new Waypoint({
    element: stats,
    handler: startCountUpAnimation,
    offset: 'bottom-in-view'
  })

  function startCountUpAnimation (scrollDirection) {
    if ('up' === scrollDirection || 'down' === scrollDirection) {
      countUpAnimation.startCount()
    }
  }
})(document, jQuery)

