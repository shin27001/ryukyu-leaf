jQuery(function ($) {
  $(".l-searchBox__title").on("click", function () {
    $(this).next().slideToggle(200);
    $(this).toggleClass("open");
  });
});

// 詳細ページのスライダー
$(".l-info__slid-thum").slick({
  arrows: false,
  asNavFor: ".l-info__slid-nav",
  fade: true,
  adaptiveHeight: false,
});
$(".l-info__slid-nav").slick({
  asNavFor: ".l-info__slid-thum",
  focusOnSelect: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  adaptiveHeight: false,
  pauseOnFocus: false,
  arrows: false,
});

(function ($) {
  $(function () {
    var $header = $("#top-header");
    // Nav Fixed
    $(window).scroll(function () {
      if ($(window).scrollTop() > 350) {
        $header.addClass("fixed");
      } else {
        $header.removeClass("fixed");
      }
    });
    // Nav Toggle Button
    $(".mobile__toggle").click(function () {
      $header.toggleClass("open");
    });
  });
})(jQuery);

$(document).ready(function () {
  var pagetop = $(".pagetop");
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      pagetop.fadeIn();
    } else {
      pagetop.fadeOut();
    }
  });
  pagetop.click(function () {
    $("body, html").animate({ scrollTop: 0 }, 500);
    return false;
  });
});

$("input[name='request']").click(function () {
  if ($(this).val() == 'update') {
    $('.searchOff').fadeIn(1000);
    $('#registform').fadeOut(1000);
    $("input[name='update']").val(true);
    $("input[type='hidden'][name='request']").val('update');
  } else if($(this).val() == 'regist') {
    $('.searchOff').fadeOut(1000);
    $('#registform').fadeIn(1000);
    $("input[name='update']").val(false);
    $("input[type='hidden'][name='request']").val('regist');
  }
});

$("#clipboard").click(function () {
  $("body").append("<textarea id=\"copyTarget\" style=\"position:absolute; left:-9999px; top:0px;\" readonly=\"readonly\">" +location.href+ "</textarea>");
  $("#copyTarget").select();
  document.execCommand('copy');
});

$('#entry-submit').click(function(){
  $('form').submit();
});
