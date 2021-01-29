<?php get_header(); ?>
<?php get_header('home'); ?>
<div class="content-wrap">
  <div class="content-inner">
    <?php //if(file_exists(get_theme_file_path('/images/shop/kocotoro_leaf.png'))) : ?>
      <!-- banner -->
      <!-- <div class="l-banner mb-20">
        <a href="https://www.pref.kyoto.jp/kikikanri/coronakinkyurenraku.html" target="blank"><img src="<?php echo get_template_directory_uri(); ?>/images/shop/kocotoro_leaf.png" alt="京都府新型コロナウィルス緊急連絡サービス"></a>
      </div> -->
    <?php //endif; ?>   
    <!-- <div class="l-alert">
      <h2><i class="fas fa-exclamation-triangle symbol"></i><br>新型コロナウイルス<br>感染症対策に<span class="d-inline">関するお願い</span></h2>
      <p class="font-sm">
        発熱または咳の症状がある方やご体調のすぐれない方、感染者または感染が疑われる方との濃厚接触があった方は来店をご遠慮ください。<br>来店時は消毒液の利用や手洗い、食事中以外のマスク着用など、店舗からの要請にご協力頂きますようお願いいたします。</p>
    </div> -->
    <!-- /l-alert -->

    <!-- Search Form -->
    <?php get_template_part('tpl', 'search'); ?>

    <!-- ShopList New -->
    <?php get_template_part('tpl', 'shoplistnew'); ?>

    <div class="btn-wrap"><a href="<?php echo esc_url(home_url('shops')); ?>" class="btn btn-m-red"><i class="fas fa-list-ul"></i>
        飲食店一覧</a></div>
  </div>
</div>

<div class="l-insta">
  <div class="l-insta__inner">
    <div class="l-insta__cont">
      <h2 class="l-insta__title"><i class="fab fa-instagram symbol"></i><br>INSTAGRAMに投稿して<br class="br-sp">お気に入りのお店を応援しよう！</h2>
      <p class="l-insta__read">美味しかったお店や<br class="br-sp">
        応援したいお店をシェアして広めよう！<br>
        <span>#<?php get_pref(); ?>gohan旅 </span>をつけて<br>
        INSTAGRAMに投稿してくださいね！</p>
      <p class="btn-wrap-insta">
        <a href="https://www.instagram.com/explore/tags/gohan旅/?hl=ja" class="btn btn-m-blue">
          <span class="bold-text"><?php get_pref(); ?>GOHAN旅</span>の投稿をみる
        </a>
      </p>
    </div>
  </div>
</div>
<!-- /l-insta -->
<!-- <div class="l-special">
  <h2 class="main-title"><span class="c-red"><i class="fas fa-bookmark"></i></span> おすすめ特集</h2>
  <div class="l-special__list">
    <div class="l-special__item">
      <a class="l-special__link" href="#">
        <div class="l-special__photo">
          <img src="<?php echo get_template_directory_uri(); ?>/images/shop/img-01.jpg" alt="xxx">
        </div>
        <div class="l-special__text">
          <h3 class="l-special__shop">北谷 ZHYVAGO COFFEE WORKS</h3>
          <p class="l-special__read">このテキストはダミーです。このテキストはダミーです。30文字…</p>
          <p class="l-special__const"><i class="fas fa-pencil-alt"></i> 山田 花子</p>
        </div>
      </a>
    </div>


    <div class="l-special__item">
      <a class="l-special__link" href="#">
        <div class="l-special__photo">
          <img src="<?php echo get_template_directory_uri(); ?>/images/shop/img-02.jpg" alt="xxx">
        </div>
        <div class="l-special__text">
          <h3 class="l-special__shop">宜野湾 ブリコルール</h3>
          <p class="l-special__read">ハンバーガーが美味しいテキストテキストテキスト…</p>
          <p class="l-special__const"><i class="fas fa-pencil-alt"></i> 山田 花子</p>
        </div>
      </a>
    </div>

    <div class="l-special__item">
      <a class="l-special__link" href="#">
        <div class="l-special__photo">
          <img src="<?php echo get_template_directory_uri(); ?>/images/shop/img-03.jpg" alt="xxx">
        </div>
        <div class="l-special__text">
          <h3 class="l-special__shop">北谷 ZHYVAGO COFFEE WORKS</h3>
          <p class="l-special__read">このテキストはダミーです。このテキストはダミーです。30文字…</p>
          <p class="l-special__const"><i class="fas fa-pencil-alt"></i> 山田 花子</p>
        </div>
      </a>
    </div>

    <div class="l-special__item">
      <a class="l-special__link" href="#">
        <div class="l-special__photo">
          <img src="<?php echo get_template_directory_uri(); ?>/images/shop/img-04.jpg" alt="xxx">
        </div>
        <div class="l-special__text">
          <h3 class="l-special__shop">那覇 ジャッキーステーキ</h3>
          <p class="l-special__read">このテキストはダミーですこのテキストはダミーです…</p>
          <p class="l-special__const"><i class="fas fa-pencil-alt"></i> 山田 花子</p>
        </div>
      </a>
    </div>

  </div>
  <p class="btn-wrap"><a href="#" class="btn btn-m-white"><i class="far fa-newspaper"></i> 記事一覧を見る</a></p>
</div> -->
<!-- /l-special -->

<?php get_footer('sns'); ?>
<!-- /mod_share -->
<?php get_footer('regist'); ?>

<?php get_footer(); ?>