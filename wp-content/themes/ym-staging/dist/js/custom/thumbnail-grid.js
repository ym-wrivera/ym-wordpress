'use strict';

;(function (document, $) {
  var $preview = $('#team-grid-preview'),
      $gall = $('#team-grid'),
      $li = $gall.find('li'),
      $img = $preview.find('img'),
      $alt1 = $preview.find('h1'),
      $alt2 = $preview.find('h5'),
      $bio = $preview.find('.entry-content'),
      $close = $preview.find('.close'),
      $full = $('<li />', { 'class': 'full', html: $preview });

  $li.attr('data-src', function (i, v) {
    $(this).css({ backgroundImage: 'url(' + v + ')' });
  }).on('click', function (evt) {
    var $el = $(this),
        d = $el.data(),
        $clone = $full.clone();

    $el.toggleClass('active').siblings().removeClass('active');
    $preview.hide();
    $full.after($clone);
    $clone.find('>div').slideUp(function () {
      $clone.remove();
    });

    if (!$el.hasClass('active')) return;

    $img.attr('src', d.src);
    $alt1.text(d.title);
    $alt2.text(d.job);
    $bio.text(d.bio);

    $li.filter(function (i, el) {
      return el.getBoundingClientRect().top < evt.clientY;
    }).last().after($full);

    $preview.slideDown();

    $close.on('click', function () {
      $preview.hide('slow');
      $li.removeClass('active');
    });
  });

  $(window).on('resize', function () {
    $full.remove();
    $li.removeClass('active');
  });
})(document, jQuery);