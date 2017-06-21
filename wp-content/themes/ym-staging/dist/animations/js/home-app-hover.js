// Adds hover animation to SVG icons on home page.
(function ($) {
  'use strict'
  $(window).load(function () {
    var count = 0
    var svgClass = 'replaced-svg'
    // Check to see if class has been added to svgs after embed complete

    var pathCheck = window.setInterval(function () {
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

    function runAnimation () {

      /* Start the careers */

      var careersContainer = $('#careers-container')
      //  var careersContainerLink = $('#card-container:first-child figure > a')
      var clips = '#clips'
      var tl1 = new TimelineMax()

      // Create Animation for 0.5s
      careersContainer.hover(
        function () {
          tl1.to(clips, 0.2, {
            x: 0,
            y: -50
          })

        },
        function () {
          tl1.to(clips, 0.2, {
            x: 0,
            y: 0
          })
        }
      )

      // careersContainerLink.click(function () {
      //   careersContainer.unbind('mouseenter mouseleave')
      //   tl1.kill()
      // })

      /* Start the learning animation */

      var learnContainer = $('#learning-container')
      //    var learnContainerLink = $('#card-container:nth-child(2) figure > a')
      var tassle = '#tassle'
      var tl2 = new TimelineMax()

      // Create Animation for 0.5s
      learnContainer.hover(
        function () {
          tl2.to(tassle, 0.2, {
            transformOrigin: '0% 0%',
            rotation: 8
          }).to(tassle, 0.2, {
            transformOrigin: '0% 0%',
            rotation: -8
          })

        },
        function () {
          tl2.to(tassle, 0.2, {
            transformOrigin: '0% 0%',
            rotation: 0,
            ease: Power0.easeOut
          })
        }
      )

      // learnContainerLink.click(function () {
      //   learnContainer.unbind('mouseenter mouseleave')
      //   tl2.kill()
      // })

      /* Start the membership animation */

      var membershipContainer = $('#membership-container')
      //    var membershipContainerLink = $('#card-container:nth-child(3) figure > a')
      var animateMembershipElement = '#big-circle'
      var tl3 = new TimelineMax()

      // Create Animation for 0.5s
      membershipContainer.hover(
        function () {
          tl3.to(animateMembershipElement, 0.2, {
            transformOrigin: '50% 50%',
            rotation: 200,
          })

        },
        function () {
          tl3.to(animateMembershipElement, 0.2, {
            transformOrigin: '50% 50%',
            rotation: 0,
            ease: Power0.easeOut
          })
        }
      )

      // membershipContainerLink.click(function () {
      //   membershipContainer.unbind('mouseenter mouseleave')
      //   tl3.kill()
      // })

      /* Start the media animation */

      var mediaContainer = $('#media-container')
      //    var mediaContainerLink = $('#card-container:last-child figure > a')
      var animateMediaElement = '#solids'
      var tl4 = new TimelineMax()

      // Create Animation for 0.5s
      mediaContainer.hover(
        function () {
          tl4.to(animateMediaElement, 0.3, {
            fill: '#C1CE20',
            repeat: 2
          })

        },
        function () {
          tl4.to(animateMediaElement, 0.1, {
            fill: '#fff',
            ease: Power0.easeOut
          })
        }
      )

      // mediaContainerLink.click(function () {
      //   mediaContainer.unbind('mouseenter mouseleave')
      //   tl4.kill()
      // })

    }
  })
})(jQuery)
