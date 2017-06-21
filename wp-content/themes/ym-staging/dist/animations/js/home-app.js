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

            var sprinkle1 = '.sprinkle-1'
            var sprinkle2 = '.sprinkle-2'
            var sprinkle3 = '.sprinkle-3'
            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()
            var tl = new TimelineMax({
                repeat: -1
            })
            // Create Animation
            tl.to(sprinkle1, 10, {
                rotation: 360,
                transformOrigin: '50% 40%',
                ease: Linear.easeNone
            }).to(sprinkle2, 10, {
                rotation: -360,
                transformOrigin: '30% 30%',
                ease: Linear.easeNone
            }, 1).to(sprinkle3, 10, {
                rotation: 360,
                transformOrigin: '40% 40%',
                ease: Linear.easeNone
            }, 2)

            // Create the Scene and trigger when visible
            var scene = new ScrollMagic.Scene({
                    triggerElement: '#membership',
                    triggerHook: .5,
                    // offset: 0
                    duration: '70%'
                    // offset: '100%'
                }).setTween(tl)

                /* DEBUG this is for debugging only - comment out on production */
                // add indicators (requires plugin)
                // .addIndicators({
                //     name: "loop"
                // })
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }
    })
})(jQuery)
