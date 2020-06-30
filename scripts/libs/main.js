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

$(function () {
  $(".l-header__toggle").click(function () {
    $(this).toggleClass("active");
    $(".l-header__nav-list").toggleClass("open");
  });
});
