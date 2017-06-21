/**
 * Fixed Header/Logo swap
 */
(function (document, $) {

   function debounce (func, wait = 5, immediate = true) {
    let timeout
    return function () {
      let context = this
      let args = arguments
      let later = function () {
        timeout = null
        if (!immediate) func.apply(context, args)
      }
      let callNow = immediate && !timeout

      clearTimeout(timeout)
      timeout = setTimeout(later, wait)
      if (callNow) func.apply(context, args)
    }
   }

  function fixHeader () {
    const adminBar = document.querySelector('#wpadminbar')
    const beforeHeader = document.querySelector('.before-header')
    const header = document.querySelector('.site-header')

    let topOfBeforeHeader = beforeHeader.clientHeight
    let headerHeight = header.clientHeight

    if ('undefined' !== typeof (adminBar) && null != adminBar) {
      header.style.top = `${adminBar.clientHeight}px`
    }

    document.body.classList.add('fixed-header')
    document.body.style.paddingTop = `${headerHeight}px`

    if (window.scrollY <= topOfBeforeHeader) {
      document.body.classList.remove('fixed-header')
      document.body.style.paddingTop = 0
    }
  }

  window.addEventListener('scroll', fixHeader)

})(document, jQuery)

