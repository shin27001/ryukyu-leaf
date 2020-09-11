<div class="l-keyvisual">
  <div class="l-keyvisual__text">
    <h1><img src="<?php echo get_template_directory_uri(); ?>/images/home-logo.png" alt="<?php bloginfo('name'); ?>"></h1>
    <p class="l-keyvisual__read"><?php get_pref(); ?>ごはん旅は<br class="br-sp" />美味しいグルメをたっぷり楽しみたい方と
      <br>コロナ対策をしながら<br class="br-sp" />頑張っているお店を応援します！
    </p>
    <p class="l-keyvisual__read">グルメ好きなあなたと飲食店をつなぐ<br><?php get_pref(); ?>飲食店応援プロジェクト！</p>
    <div class="l-keyvisual__text-btnbox">
      <p class="l-keyvisual__link"><a href="<?php echo esc_url(home_url('shops')); ?>" class="btn btn-m-red"><i class="fas fa-list-ul"></i>
          飲食店一覧</a></p>
      <p class="l-keyvisual__link"><a href="<?php echo esc_url(home_url('entry')); ?>" class="btn btn-m-white"><i class="fas fa-edit"></i>
          新規店舗登録はこちら</a></p>
    </div>
  </div>
  <ul class="l-keyvisual__bg">
    <li class="l-keyvisual__slide">
      <img src="<?php echo get_template_directory_uri(); ?>/images/slide/slide-01.jpg" />
    </li>
    <li class="l-keyvisual__slide">
      <img src="<?php echo get_template_directory_uri(); ?>/images/slide/slide-02.jpg" />
    </li>
    <li class="l-keyvisual__slide">
      <img src="<?php echo get_template_directory_uri(); ?>/images/slide/slide-03.jpg" />
    </li>
    <li class="l-keyvisual__slide">
      <img src="<?php echo get_template_directory_uri(); ?>/images/slide/slide-04.jpg" />
    </li>
  </ul>
</div>
<!-- /l-keyvisual -->
