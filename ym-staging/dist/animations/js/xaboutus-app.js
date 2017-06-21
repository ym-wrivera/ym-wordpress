// Adds scroll animation to SVG sprinkles on home page.
(function($) {
    'use strict'
    $(window).load(function() {
        var count = 0
        var svgClass = 'replaced-svg'
        // Check to see if class has been added to svgs after embed complete
        var pathCheck = window.setInterval(function() {
                var svg = document.getElementsByClassName(svgClass)
                if (svg.length > 0) {
                    window.clearInterval(pathCheck)
                    runAnimation()
                } else {
                    count = count + 100
                    console.log(count + 'Not Found')
                    if (count > 3000) {
                        console.log(svgClass + ' was not found on this page.')
                        window.clearInterval(pathCheck)
                        return
                    }
                }
            },
            100)

        function runAnimation() {
            // var iconContainer = $('.svg-animated-icon-container')
            // var iconContainerLink = $('.svg-animated-icon-container figure > a')
            var iconsContainer = '.svg-animated-icons-container'
            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animation for Icon-1

            tl.fromTo('#flagpole', 2, {
                    y: 0

                }, {
                    y: -10

                }, 1).to('#cloud', 2, {
                    y: 10

                }, 1)
                /* kite */
                .to('#bow', 2, {
                    transformOrigin: '50% 50%',
                    rotation: -15

                }, 1).to('#body', 2, {
                    transformOrigin: '20% 100%',
                    rotation: 10

                }, 1)
                /* robot */
                .to('#power-group', 2, {
                    y: -10

                }, 1)

            // Create the Scene and trigger when visible
            var scene = new ScrollMagic.Scene({
                    triggerElement: iconsContainer,
                    triggerHook: .4,
                    duration: '30%'
                }).setTween(tl)

                /* DEBUG this is for debugging only - comment out on production */
                .addIndicators({
                    name: 'loop'
                }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })
})(jQuery)
