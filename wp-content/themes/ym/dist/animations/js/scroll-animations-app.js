/**
 * Testing for Jackie to make sure she can deploy code!!!!
 *
 * Thanks for all of your help Jackie! If you ever need anything don't
 * hesitate to ask. You can delete if you want to.
 */
(function($) {
    'use strict'
    // Adds scroll animation to About Us page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animation for Icon-1
            //
            //

            // paper-airplane
            tl1.to('#paper-airplane #plane, #paper-airplane #air', 1, {
                    x: -5,
                    y: 5
                }, 1).to('#paper-airplane #plane', 2, {
                    x: 15,
                    y: -15
                }, 2)
                .to('#paper-airplane #air', 1, {
                    autoAlpha: 1
                }, 3)

            // flag
            tl2.fromTo('#flag #flagpole', 2, {
                y: 0

            }, {
                y: -10

            }, 1).to('#flag #cloud', 2, {
                y: 10

            }, 1)


            /* flight */
            // tl2.to('#flight #bow', 2, {
            //     transformOrigin: '50% 50%',
            //     rotation: -15
            //
            // }, 1).to('#flight #body', 2, {
            //     transformOrigin: '20% 100%',
            //     rotation: 10
            //
            // }, 1)
            /* robot */
            tl3.to('#robot #power-group', 2, {
                y: -10

            }, 1)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#paper-airplane',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#flag',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#robot',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

        }

    })
    // Adds scroll animation to Ad Media Overview Page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // megaphone
            tl1.fromTo('#megaphone #body', 2, {
                rotation: 0,
                transformOrigin: "100% 100%"

            }, {
                rotation: -10,
                y: -10,
                transformOrigin: "100% 100%"

            }, 1).fromTo('#megaphone #noise', 2, {
                rotation: 0,
                transformOrigin: "100% 100%"

            }, {
                rotation: -10,
                y: -10,
                transformOrigin: "100% 100%",
                autoAlpha: 1

            }, 2)



            // growmoney
            tl2.to('#growmoney #left-leaf', 2, {

                    rotation: -10,
                    transformOrigin: "100% 100%"


                }, 1)
                .to('#growmoney #right-leaf', 2, {
                    rotation: 10,
                    y: 4,
                    x: 4,
                    transformOrigin: "100% 0%"
                }, 1)

                // growmoney
                .to('#growmoney #pedals', .5, {
                    autoAlpha: 1
                }, 1)
                .to('#growmoney #pedals', 1, {
                    autoAlpha: 0
                }, 2)
                .to('#growmoney #pedals', .5, {
                    autoAlpha: 1
                }, 3)






            // delivermoney
            tl3.to('#delivermoney-icon', 3, {
                    x: 45

                }, 1).to('#delivermoney #top-money', 1, {
                    x: 2,
                    y: -2,
                    rotation: 5,
                    scale: 1,
                    transformOrigin: "50% 50%"
                }, 2).to('#delivermoney #top-money', 1, {
                    rotation: 12,
                    transformOrigin: "50% 50%"
                }, 3)
                .to('#delivermoney #top-money', 1, {
                    x: 0,
                    y: 0,
                    rotation: 0,
                    scale: 1,
                    transformOrigin: "50% 50%"
                }, 4)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#megaphone',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#growmoney',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#delivermoney',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to AMS Overview Page
    //
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // botany
            tl1.to('#botany #stem', 2, {

                    y: -6

                }, 1).to('#botany #right_leaf', 2, {
                    y: -6


                }, 1).to('#botany #left-leaf', 2, {
                    y: -6

                }, 1)


                .to('#botany #right_leaf', 2, {
                    scale: 1.4,
                    x: 0
                }, 1).to('#botany #left-leaf', 2, {
                    scale: 1.4,
                    x: -5
                }, 1)


                .to('#botany #lower-bubble', 2, {
                    x: 0,
                    y: -12,
                    scale: .8

                }, 1).to('#botany #upper-bubble', 2, {
                    x: 2,
                    y: 12,
                    scale: 1.4


                }, 1).to('#botany #right-bubble', 2, {
                    x: -2,
                    y: -5,
                    scale: 1.2

                }, 1)


            // cupcake
            tl2.to('#cupcake #cherry', 2, {

                y: 12,
                transformOrigin: "center",
                rotation: -40,

            }, 1).to('#cupcake #new-frosting', 2, {
                autoAlpha: 1


            }, 2).to('#cupcake #splash', 2, {
                autoAlpha: 1
            }, 2)


            tl3.set('#plug #panel', {
                fill: '#fff'
            })

            // plug
            tl3.to('#plug #top-plug', 2, {
                x: -7.9,
                y: 7.9


            }, 1).to('#plug #lower-plug', 2, {
                x: 7.9,
                y: -7.9
            }, 2).to('#plug #click', 2, {
                autoAlpha: 1
            }, 2)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#botany',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#cupcake',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#plug',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })
    // Adds scroll animation to AMS Social Page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // desk-bell
            tl1.to('#desk-bell #whole-finger', 2, {

                y: 10

            }, 1).to('#desk-bell #ding', 2, {
                y: 5


            }, 2).to('#desk-bell #noise', 2, {
                autoAlpha: 1

            }, 2)





            // diamond
            tl2.to('#diamond #diamond-body', 2, {
                y: -12
            }, 1).to('#diamond #shine', 2, {
                y: -12
            }, 1).to('#diamond #shine', 2, {
                scale: 1.2,
                x: -7
            }, 2).to('#diamond #shine #one', .1, {
                autoAlpha: 0
            }, 3).to('#diamond #shine #one', .3, {
                autoAlpha: 1
            }, 4).to('#diamond #shine #two', .1, {
                autoAlpha: 0
            }, 4).to('#diamond #shine #two', .3, {
                autoAlpha: 1
            }, 5).to('#diamond #shine #three', .1, {
                autoAlpha: 0
            }, 3).to('#diamond #shine #three', .3, {
                autoAlpha: 1
            }, 4).to('#diamond #shine #four', .1, {
                autoAlpha: 0
            }, 4).to('#diamond #shine #four', .3, {
                autoAlpha: 1
            }, 5).to('#diamond #shine #five', .1, {
                autoAlpha: 0
            }, 3).to('#diamond #shine #five', .3, {
                autoAlpha: 1
            }, 4)


            // paper-airplane
            tl3.to('#paper-airplane #plane, #paper-airplane #air', 1, {
                    x: -5,
                    y: 5
                }, 1).to('#paper-airplane #plane', 2, {
                    x: 15,
                    y: -15
                }, 2)
                .to('#paper-airplane #air', 1, {
                    autoAlpha: 1
                }, 3)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#desk-bell',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#diamond',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#paper-airplane',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to Careers Overview Page
    //
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 2,
                smoothChildTiming: true,
                yoyo: false,
                ease: Power4.easeInOut

            })
            // Create Animations
            // funnel
            tl1.to('#funnel #left-drip', 2, {
                y: 19



            }, 1).to('#funnel #right-drip', 2, {
                y: 6



            }, 1).to('#funnel #center-drip', 2, {

                y: 50


            }, 1)


            // kite
            tl2.to('#kite #body', 2, {
                x: -2,
                y: -12

            }, 1).to('#kite #body', 2, {
                transformOrigin: '40% 100%',
                rotation: 10

            }, 2).to('#kite #body', 1, {
                transformOrigin: '40% 100%',
                rotation: -10

            }, 3).to('#kite #body', 1, {
                transformOrigin: '40% 100%',
                rotation: 0

            }, 4)


            // piggy-bank
            tl3.to('#piggy-bank #big-coin', .6, {
                x: 5,
                y: -5
            }, 1).to('#piggy-bank #big-coin', 3.4, {
                x: 8,
                y: 50
            }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#funnel',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#kite',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#piggy-bank',
                    triggerHook: .4,
                    offset: 0,
                    reverse: true,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to Career Event Services Page
    //
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // glasses
            tl1.to('#glasses #dashes', 1, {

                autoAlpha: 1,
                repeat: 4

            }, 1)


            // magnet
            tl2.to('#magnet #bolt', 2, {
                scale: 1.1,
                x: -3,
                y: 3

            }, 1).to('#magnet #energy', 2, {
                autoAlpha: 1

            }, 2)


            // trafficlight
            tl3.to('#trafficlight #upper-lights', 2, {
                autoAlpha: 0
            }, 1).to('#trafficlight #lower-lights', 2, {
                autoAlpha: 1
            }, 2)


            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#glasses',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#magnet',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#trafficlight',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to Design Services Page
    //

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // billboard
            tl1.to('#billboard #right-poly', 2, {
                x: -4,
                y: 4



            }, 1).to('#billboard #second-row', 2, {
                autoAlpha: 1



            }, 2).to('#billboard #third-row', 2, {

                autoAlpha: 1


            }, 3)


            // balloon
            tl2.to('#balloon #top-balloon', 2, {
                    y: -6

                }, 1).to('#balloon #top-dashes', 2, {
                    x: -15,
                    y: -5

                }, 1)
                .to('#balloon #top-cloud', 2, {
                    x: -45,
                    y: 1
                }, 1).to('#balloon #lower-cloud', 2, {
                    y: 5

                }, 1).to('#balloon #body', 2, {
                    y: 3

                }, 1)


            // jumpinphone
            tl3.to('#jumpinphone #legs', 2, {
                    x: 20,
                    y: 0,
                    transformOrigin: '0% 70%',
                    rotation: -45
                }, 1)
                .to('#jumpinphone #top-star', 2, {
                    autoAlpha: 1
                }, 2).to('#jumpinphone #middle-star', 2, {
                    autoAlpha: 1

                }, 2).to('#jumpinphone #lower-star', 2, {
                    autoAlpha: 1

                }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#billboard',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#balloon',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#jumpinphone',
                    triggerHook: .4,
                    offset: 0,
                    reverse: true,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })
    // Adds scroll animation to Event Management Page
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // bomb
            tl1.to('#bomb #wick', 2, {
                rotation: -60,
                transformOrigin: "50% 50%",
                x: -15,
                y: 10


            }, 1)


            // rocket
            tl2.to('#ferriswheel #wheel', 2, {

                rotation: 180,
                transformOrigin: "50% 50%"


            }, 1)


            // lightning
            tl3.to('#kite #body', 2, {
                x: -2,
                y: -12

            }, 1).to('#kite #body', 2, {
                transformOrigin: '40% 100%',
                rotation: 10

            }, 2).to('#kite #body', 1, {
                transformOrigin: '40% 100%',
                rotation: -10

            }, 3).to('#kite #body', 1, {
                transformOrigin: '40% 100%',
                rotation: 0

            }, 4)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#bomb',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#ferriswheel',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#kite',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)


        }

    })



    // Adds scroll animation to LMS Overview Page
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // high fives
            tl1.fromTo('#highfives #left-hand', 2, {
                    rotation: 0,
                    transformOrigin: "100% 100%"

                }, {
                    rotation: 20,
                    y: 10,
                    transformOrigin: "100% 100%"

                }, 1).fromTo('#highfives #right-hand', 2, {
                    rotation: 0,
                    transformOrigin: "100% 100%"

                }, {
                    rotation: -20,
                    y: -10,
                    transformOrigin: "100% 100%"

                }, 1)
                .to('#highfives #noise', 0, {
                    autoAlpha: 1

                }, 2)


            // rocket
            tl2.to('#rocket #aircraft', .1, {
                    rotation: 3,
                    transformOrigin: '50% 50%',
                    ease: Quad.easeInOut
                }, 1)
                .to('#rocket #aircraft', .1, {
                    repeat: 2,
                    rotation: -3,
                    transformOrigin: '50% 50%',
                    yoyo: true,
                    delay: .1,
                    ease: Quad.easeInOut
                }, 1)
                .to('#rocket #aircraft', .1, {
                    rotation: 0,
                    transformOrigin: '50% 50%',
                    delay: .1 * 4
                }, 1)
                .to('#rocket #aircraft', 3.8, {
                    x: 12,
                    y: -12,
                    delay: .5
                }, 2)


                .to('#rocket #fire', 3.8, {
                    x: 12,
                    y: -12,
                    autoAlpha: 1

                }, 2)



            // lightning
            tl3.to('#lightning #blast-small', 1, {
                autoAlpha: 0

            }, 1).to('#lightning #blast-big', 1, {
                autoAlpha: 1
            }, 2)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#highfives',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#rocket',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#lightning',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to LMS Content Development Page

    $(window).load(function() {
        var count = 0
        var svgClass = 'replaced-svg'
        // Check to see if class has been added to svgs after embed complete
        var pathCheck = window.setInterval(function() {
                var svg = document.getElementsByClassName(svgClass)
                if (svg.length > 0) {
                    window.clearInterval(pathCheck)
                    runAnimation2()
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

        function runAnimation2() {
            // var iconContainer = $('.svg-animated-icon-container')
            // var iconContainerLink = $('.svg-animated-icon-container figure > a')

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // engage
            tl1.to('#engage #girl', 2, {
                y: 14


            }, 1)


            // educationallearning
            tl2.to('#educationallearning #cap', 2, {

                y: 12

            }, 1).to('#educationallearning #tassel', 2, {
                y: 12


            }, 1).to('#educationallearning #tassel', 1, {
                transformOrigin: "50% 0%",
                rotation: 8,
                repeat: 3,
                yoyo: true

            }, 2).to('#educationallearning #tassel', 1, {
                transformOrigin: "50% 0%",
                rotation: -8,
                repeat: 3,
                yoyo: true

            }, 2)


            // contentlife
            tl3.to('#contentlife #wolf', .3, {
                autoAlpha: 1

            }, 1).to('#contentlife #dolphin', 2, {
                autoAlpha: 1
            }, 2).to('#contentlife #wolf', 2, {
                autoAlpha: 0
            }, 2)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#engage',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#educationallearning',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#contentlife',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })


    // Adds scroll animation to Marketing Page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // gavel
            tl1.to('#gavel #down-gavel', 2, {
                rotation: 32,
                transformOrigin: "50% 50%",
                x: 5,
                y: 5,
                repeat: 1
            }, 1).to('#gavel #upper-spark, #gavel #lower-spark, #gavel #noise', 2, {
                autoAlpha: 1,
                repeat: 1
            }, 2)


            // spraypaint
            tl2.to('#spraypaint #can', 2, {

                rotation: 25,
                transformOrigin: "50% 50%"

            }, 1).to('#spraypaint #paint', 2, {

                autoAlpha: 1
            }, 2)


            // windmill
            tl3.to('#windmill #body', 2, {
                rotation: -90,
                transformOrigin: "50% 50%"

            }, 1)

            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#gavel',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#spraypaint',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#windmill',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to Mobile event app Page
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl4 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            // Create Animations
            // clock
            tl1.to('#clock #big-hand', 2, {
                rotation: 507,
                transformOrigin: "10% 0%",
            }, 1).to('#clock #little-hand', 2, {
                rotation: 85,
                transformOrigin: "100% 90%",
            }, 1)


            // hands
            tl2.to('#hands #lower-girl', 4, {

                x: 11

            }, 1).to('#hands #upper-girl', 4, {

                x: -10

            }, 1).to('#hands #right-guy', 4, {

                y: -10

            }, 1).to('#hands #left-guy', 4, {

                y: 11

            }, 1)


            // plattercoins
            tl3.to('#plattercoins #cover', 2, {
                rotation: -35,
                transformOrigin: "0% 50%",
                x: -10,
                y: 4

            }, 1)


            // sneaker
            tl4.to('#sneaker #shoe', 4, {
                x: 30

            }, 1).to('#sneaker #stars, #sneaker #dashes', 4, {
                autoAlpha: 1

            }, 1)



            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#clock',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#hands',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#plattercoins',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)


            var scene4 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#sneaker',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl4)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to WWS Alumni Page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })

            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })


            // Create Animations
            // liftweight
            tl1.to('#liftweight #weights', 2, {
                y: -15
            }, 1)
            // rocketlaunch
            tl2.to('#rocketlaunch #ship', .1, {
                    rotation: 3,
                    transformOrigin: '50% 50%',
                    ease: Quad.easeInOut
                }, 1)
                .to('#rocketlaunch #ship', .1, {
                    repeat: 2,
                    rotation: -3,
                    transformOrigin: '50% 50%',
                    yoyo: true,
                    delay: .1,
                    ease: Quad.easeInOut
                }, 1)
                .to('#rocketlaunch #ship', .1, {
                    rotation: 0,
                    transformOrigin: '50% 50%',
                    delay: .1 * 4
                }, 1)
                .to('#rocketlaunch #ship', 3.8, {
                    x: 12,
                    y: -12,
                    delay: .5
                }, 2)


                .to('#rocketlaunch #panel_1_', 3.8, {
                    // x: 12,
                    // y: -12,
                    autoAlpha: 0

                }, 2).to('#rocketlaunch #turbo', 3.8, {
                    // x: 12,
                    // y: -12,
                    autoAlpha: 1

                }, 2)

            tl3.fromTo('#highfives #left-hand', 2, {
                    rotation: 0,
                    transformOrigin: "100% 100%"

                }, {
                    rotation: 20,
                    y: 10,
                    transformOrigin: "100% 100%"

                }, 1).fromTo('#highfives #right-hand', 2, {
                    rotation: 0,
                    transformOrigin: "100% 100%"

                }, {
                    rotation: -20,
                    y: -10,
                    transformOrigin: "100% 100%"

                }, 1)
                .to('#highfives #noise', 0, {
                    autoAlpha: 1

                }, 2)


            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#liftweight',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#rocketlaunch',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#highfives',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl3)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

        }

    })

    // Adds scroll animation to WWW AMC Page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 2,
                smoothChildTiming: true,
                yoyo: false,
                ease: Power4.easeInOut

            })
            // Create Animations

            /* flight */
            tl1.to('#flight #bow', 2, {
                transformOrigin: '50% 50%',
                rotation: -15

            }, 1).to('#flight #body', 2, {
                transformOrigin: '20% 100%',
                rotation: 10

            }, 1)

            // magnet
            tl2.to('#magnet #bolt', 2, {
                scale: 1.1,
                x: -3,
                y: 3

            }, 1).to('#magnet #energy', 2, {
                autoAlpha: 1

            }, 2)



            // piggy-bank
            tl3.to('#piggy-bank #big-coin', .6, {
                x: 5,
                y: -5
            }, 1).to('#piggy-bank #big-coin', 3.4, {
                x: 8,
                y: 50
            }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#flight',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#magnet',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#piggy-bank',
                    triggerHook: .4,
                    offset: 0,
                    reverse: true,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })
    // Adds scroll animation to WWS Chambers of Commerce Page
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: false,
                yoyo: false,
                ease: Power4.easeInOut

            })
            // Create Animations
            // liftweight
            tl1.to('#liftweight #weights', 2, {
                y: -15



            }, 1)


            // piggy-bank
            tl2.to('#piggy-bank #big-coin', .6, {
                x: 5,
                y: -5
            }, 1).to('#piggy-bank #big-coin', 3.4, {
                x: 8,
                y: 50
            }, 2)


            // rocketlaunch
            tl3.to('#rocketlaunch #ship', .1, {
                    rotation: 3,
                    transformOrigin: '50% 50%',
                    ease: Quad.easeInOut
                }, 1)
                .to('#rocketlaunch #ship', .1, {
                    repeat: 2,
                    rotation: -3,
                    transformOrigin: '50% 50%',
                    yoyo: true,
                    delay: .1,
                    ease: Quad.easeInOut
                }, 1)
                .to('#rocketlaunch #ship', .1, {
                    rotation: 0,
                    transformOrigin: '50% 50%',
                    delay: .1 * 4
                }, 1)
                .to('#rocketlaunch #ship', 3.8, {
                    x: 12,
                    y: -12,
                    delay: .5
                }, 2)


                .to('#rocketlaunch #panel_1_', 3.8, {
                    // x: 12,
                    // y: -12,
                    autoAlpha: 0

                }, 2).to('#rocketlaunch #turbo', 3.8, {
                    // x: 12,
                    // y: -12,
                    autoAlpha: 1

                }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#liftweight',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#piggy-bank',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#rocketlaunch',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to WWS Non Profits Page

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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 2,
                smoothChildTiming: true,
                yoyo: false,
                ease: Power4.easeInOut

            })
            // Create Animations
            // liftweight
            tl1.to('#liftweight #weights', 2, {
                y: -15
            }, 1)

            // nurture
            tl2.to('#nurture #growth', 2, {
                    x: 0,
                    y: -9

                }, 1)
                .to('#nurture #buds', 2, {
                    autoAlpha: 1
                }, 2)

            // piggy-bank
            tl3.to('#piggy-bank #big-coin', .6, {
                x: 5,
                y: -5
            }, 1).to('#piggy-bank #big-coin', 3.4, {
                x: 8,
                y: 50
            }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#liftweight',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#nurture',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#piggy-bank',
                    triggerHook: .4,
                    offset: 0,
                    reverse: true,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to Professional Associations Page
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 2,
                smoothChildTiming: true,
                yoyo: false,
                ease: Power4.easeInOut

            })
            // Create Animations

            // magnet
            tl1.to('#magnet #bolt', 2, {
                scale: 1.1,
                x: -3,
                y: 3

            }, 1).to('#magnet #energy', 2, {
                autoAlpha: 1

            }, 2)

            // nurture
            tl2.to('#nurture #growth', 2, {
                    x: 0,
                    y: -6

                }, 1)
                .to('#nurture #buds', 2, {
                    autoAlpha: 1
                }, 2)

            // piggy-bank
            tl3.to('#piggy-bank #big-coin', .6, {
                x: 5,
                y: -5
            }, 1).to('#piggy-bank #big-coin', 3.4, {
                x: 8,
                y: 50
            }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#magnet',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#nurture',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#piggy-bank',
                    triggerHook: .4,
                    offset: 0,
                    reverse: true,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

    // Adds scroll animation to WWS Trade Associations Page
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

            // Init ScrollMagic Controller
            var controller = new ScrollMagic.Controller()

            var tl1 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl2 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: true,
                yoyo: true,
                ease: Power4.easeInOut

            })
            var tl3 = new TimelineMax({
                repeat: 0,
                smoothChildTiming: false,
                yoyo: false,
                ease: Power4.easeInOut

            })
            // Create Animations
            // liftweight
            tl1.to('#liftweight #weights', 4, {
                y: -15



            }, 1)

            // liftweight
            tl2.to('#lightbulb #lights', 4, {
                autoAlpha: 1


            }, 1)



            // piggy-bank
            tl3.to('#piggy-bank #big-coin', .6, {
                x: 5,
                y: -5
            }, 1).to('#piggy-bank #big-coin', 3.4, {
                x: 8,
                y: 50
            }, 2)




            // Create the Scene and trigger when visible
            //
            var scene1 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#liftweight',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl1)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene2 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container  svg#lightbulb',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                .setTween(tl2)

                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)

            var scene3 = new ScrollMagic.Scene({
                    triggerElement: '.animated-icon-container svg#piggy-bank',
                    triggerHook: .4,
                    offset: 0,
                    duration: '20%'
                })
                // .on("end", function(e) {
                //     tl3.reverse();
                // })
                // .on("start", function(e) {
                //     tl3.play();
                // })
                .setTween(tl3)


                /* DEBUG this is for debugging only - comment out on production */
                // .addIndicators({
                //     name: 'loop'
                // }) // add indicators (requires plugin)
                /* End Debug -----------------------------------------------------------------*/
                .addTo(controller)
        }

    })

})(jQuery)
