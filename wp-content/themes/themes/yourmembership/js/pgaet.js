//Pardot to GA iFrame Event Tracking
  (function(window) {
     addEvent(window, 'message', function(message) {
	// The message.data value is arbitrary and can be customized

  //Demo Requests
      if (message.data === 'formSubmissionGlobalFlyOut' && message.origin === 'http://go.yourmembership.com') {
		    ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'Global Fly-Out'
          });
      }
      if (message.data === 'formSubmissionMobileEvents' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'Mobile Events App'
          });
      }
      if (message.data === 'formSubmissionYMmembership' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'YM Membership'
          });
      }
      if (message.data === 'formSubmissionYMmedia' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'YM Media'
          });
      }
      if (message.data === 'formSubmissionYMlearning' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'YM Learning'
          });
      }
      if (message.data === 'formSubmissionYMcareers' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'YM Careers'
          });
      }
      if (message.data === 'formSubmissionYMpartners' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'Partners'
          });
      }
      if (message.data === 'formSubmissionYMgeneraldemo' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'General Demo'
          });
      }
      if (message.data === 'formSubmissionEmailDemo' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'Email Marketing Informz'
          });
      }
      if (message.data === 'formSubmissionDesignServices' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Demo Request',
          eventLabel: 'Design Services'
          });
      }
      if (message.data === 'formSubmissionGeneralContact' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'General Contact',
          eventLabel: 'Contact Us'
          });
      }

  //Blog Subscription
      if (message.data === 'formSubmissionBlogSub' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Form',
          eventAction: 'Blog Subscription',
          eventLabel: 'Subscribe to blog posts'
          });
      }

  //Content Downloads
      if (message.data === 'contentDLNonDueRev' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Downloads',
          eventAction: 'PDF',
          eventLabel: 'The Ultimate Guide to Non-Dues Revenue: The Ten Best Ideas'
          });
      }
      if (message.data === 'contentDLEvntMgmt' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Downloads',
          eventAction: 'PDF',
          eventLabel: 'The Ultimate Guide to Association Event Management'
          });
      }
      if (message.data === 'contentDLAssMgmtTrends' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Downloads',
          eventAction: 'PDF',
          eventLabel: 'The Essential Guide to 2015 Association Management Trends'
          });
      }
      if (message.data === 'contentDLCommSofGuide' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Downloads',
          eventAction: 'PDF',
          eventLabel: '2016 Online Community Software Guide'
          });
      }
      if (message.data === 'contentDLEduProgHealth' && message.origin === 'http://go.yourmembership.com') {
        ga('create', 'UA-398613-1', 'auto');
        ga('send', {
          hitType: 'event',
          eventCategory: 'Downloads',
          eventAction: 'PDF',
          eventLabel: 'How Health Is Your Educational Program'
          });
      }      
 

    });
 
    // Cross-browser event listener
    function addEvent(el, evt, fn) {
      if (el.addEventListener) {
        el.addEventListener(evt, fn);
      } else if (el.attachEvent) {
        el.attachEvent('on' + evt, function(evt) {
          fn.call(el, evt);
        });
      } else if (typeof el['on' + evt] === 'undefined' || el['on' + evt] === null) {
        el['on' + evt] = function(evt) {
          fn.call(el, evt);
        };
      }
    }
 
  })(window);