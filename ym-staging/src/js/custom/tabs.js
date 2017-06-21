;(function (document, $) {
  /**
   * tabs
   *
   * @description The Tabs component.
   * @param {Object} options The options hash
   */
  let tabs = function (options) {
    let el = document.querySelector(options.el)
    let tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks)
    let tabContentContainers = el.querySelectorAll(options.tabContentContainers)
    let activeIndex = 0
    let initCalled = false

    /**
     * init
     *
     * @description Initializes the component by removing the no-js class from
     *   the component, and attaching event listeners to each of the nav items.
     *   Returns nothing.
     */
    let init = function () {
      if (!initCalled) {
        initCalled = true
        el.classList.remove('no-js')

        for (let i = 0; i < tabNavigationLinks.length; i++) {
          let link = tabNavigationLinks[i]
          handleClick(link, i)
        }
      }
    }

    /**
     * handleClick
     *
     * @description Handles click event listeners on each of the links in the
     *   tab navigation. Returns nothing.
     * @param {HTMLElement} link The link to listen for events on
     * @param {Number} index The index of that link
     */
    let handleClick = function (link, index) {
      link.addEventListener('click', function (e) {
        e.preventDefault()
        goToTab(index)
      })
    }

    /**
     * goToTab
     *
     * @description Goes to a specific tab based on index. Returns nothing.
     * @param {Number} index The index of the tab to go to
     */
    let goToTab = function (index) {
      if (index !== activeIndex && 0 <= index && index <= tabNavigationLinks.length) {
        tabNavigationLinks[activeIndex].classList.remove('is-active')
        tabNavigationLinks[index].classList.add('is-active')
        tabContentContainers[activeIndex].classList.remove('is-active')
        tabContentContainers[index].classList.add('is-active')
        activeIndex = index
      }
    }

    /**
     * Returns init and goToTab
     */
    return {
      init: init,
      goToTab: goToTab
    }
  }

  /**
   * Attach to global namespace
   */
  window.tabs = tabs
})(document, jQuery)
