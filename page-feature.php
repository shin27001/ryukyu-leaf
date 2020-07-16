<?php
/*
Template Name: feature
*/
?>

<?php get_header(); ?>

<main class="main-container feature">
  <div class="feature-visual">
    <div class="feature-visual__img">
      <img src="<?php echo get_template_directory_uri(); ?>/images/feature/main-sp.jpg" alt="GO!HAN旅 グルメ好きなあなたと飲食店をつなぐ飲食店応援プロジェクト" class="pc-none">
      <img src="<?php echo get_template_directory_uri(); ?>/images/feature/main-pc.jpg" alt="GO!HAN旅 グルメ好きなあなたと飲食店をつなぐ飲食店応援プロジェクト" class="sp-none">
    </div>
  </div>
  <!-- /feature-visual -->
  <div class="content-wrap go-read">
    <div class="content-inner">
      <div class="go-read__text-btnbox">
        <p class="go-read__link"><a href="https://gohan-tabi.com/kyoto/" class="btn">
            京都版<span>はこちら</span> <i class="fas fa-arrow-right"></i></a></p>
        <p class="go-read__link"><a href="https://gohan-tabi.com/okinawa/" class="btn">
            沖縄版<span>はこちら</span> <i class="fas fa-arrow-right"></i></a></p>
      </div>
      <div class="go-read__text">
        <h2 class="main-title">GO!HAN旅は<span class="d-inline">飲食店のコロナ対策状況が</span><br class="br-pc"><span class="d-inline">ー目でわかる</span><span class="d-inline">飲食店検索サイトです。</span></h2>
        <p>
          京都の出版社Leafは、同じく日本屈指の観光都市として<br class="br-pc">コロナウィルスにより大きな影響を受けている沖縄と共に<br class="br-pc">飲食店とお客さんをつなぐ架け橋となりたい、という想いで<br class="br-pc">グルメサイト「GO!HAN旅」を立ち上げました！
        </p>
        <p>
          各飲食店では、安心してお客さんにご利用いただけるよう<br class="br-pc">懸命に対策をしながら営業をされています。<br class="br-pc">その対策状況を確認できる場を作ることで、<br class="br-pc">おいしいごはんを楽しみたいけどコロナ対策状況が心配で<br class="br-pc">なかなか踏み出せない…という方との架け橋になればと思います。
        </p>
        <p>京都・沖縄の街を「食べる」ことで元気にしましょう！</p>
      </div>
    </div>
  </div>
  <div class="content-wrap go-feature">
    <div class="content-inner">
      <h2><img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-face.svg" alt="おうちごはんを楽しみたい方も"> GO!HAN旅の特徴</h2>
      <div class="page-anchor">
        <ul class="page-anchor__box">
          <li class="page-anchor__list"><a href="#to-users"><i class="fas fa-caret-down"></i> ご利用の方へ</a></li>
          <li class="page-anchor__list"><a href="#to-shop"><i class="fas fa-caret-down"></i> 飲食店の方へ</a></li>
        </ul>
      </div>
      <div id="to-users" class="users-box">
        <h3>ご利用の方へ</h3>
        <div class="to-users__box">
          <div class="to-users__list">
            <div class="to-users__fuki">
              <img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-01.svg" alt="おうちごはんを楽しみたい方も">
              <h4>おうちごはんを<br>楽しみたい方も</h4>
            </div>
            <div class="to-users__text-box">
              <p class="to-users__read">
                テイクアウトや<br>デリバリーができる<br>お店を検索！
              </p>
              <p>こだわり検索では、テイクアウトやデリバリーの検索もできるので、お店に行くのはちょっと…という方にもおすすめです！</p>
            </div>
          </div>
          <div class="to-users__list">
            <div class="to-users__fuki">
              <img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-02.svg" alt="イートインで楽しみたい方も">
              <h4>イートインで<br>楽しみたい方も</h4>
            </div>
            <div class="to-users__text-box">
              <p class="to-users__read">
                飲食店の<br>コロナ対策情報を<br>確認できる！
              </p>
              <p>お店の詳細ページでは、飲食店がどんなコロナ対策を行っているかを確認することができます！</p>
            </div>
          </div>
          <div class="to-users__list">
            <div class="to-users__fuki">
              <img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-03.svg" alt="お友達と楽しみたい方も">
              <h4>お友達と<br>楽しみたい方も</h4>
            </div>
            <div class="to-users__text-box">
              <p class="to-users__read">
                お店のページから<br>電話予約！<br>お友達にもシェア
              </p>
              <p>詳細ページには地図やお店の電話番号、営業時間等が表示してあります。シェアボタンから、お友達にも簡単シェアOK！</p>
            </div>
          </div>
        </div>
      </div>
      <div id="to-shop" class="users-box">
        <h3>飲食店の方へ</h3>
        <div class="to-users__box">
          <div class="to-users__list">
            <div class="to-users__fuki">
              <img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-04.svg" alt="コロナ対策をアピール">
              <h4>コロナ対策を<br>アピール！</h4>
            </div>
            <div class="to-users__text-box">
              <p>お店のコロナ対策状況や、テイクアウト、デリバリー情報などをアピールすることができます。</p>
            </div>
          </div>
          <div class="to-users__list">
            <div class="to-users__fuki">
              <img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-05.svg" alt="入力フォームから掲載登録！">
              <h4>入力フォームから<br>掲載登録！</h4>
            </div>
            <div class="to-users__text-box">
              <p>写真などを準備するだけで、登録フォームから掲載登録ができます！</p>
            </div>
          </div>
          <div class="to-users__list">
            <div class="to-users__fuki">
              <img src="<?php echo get_template_directory_uri(); ?>/images/feature/icon-06.svg" alt="掲載料は無料">
              <h4>掲載料は<br>無料!</h4>
            </div>
            <div class="to-users__text-box">
              <p>飲食店の皆様を応援するべく、掲載料は無料です！お気軽に登録してください。</p>
            </div>
          </div>
        </div>
      </div>
      <div class="to-shop__text">
        <p>GO!HAN旅は、コロナ対策をしながら営業している飲食店を応援するため、<br class="br-pc">このサイトを立ち上げました！</p>
        <p>こんな時だからこそ、お客様に安心して楽しんでもらえる環境があるという事を知ってもらい、<br class="br-pc">
          更にお店のファンが増えたらいいなと思っています。</p>
        <p>無料で掲載できますので、ご賛同いただけましたら以下のフォームよりご登録ください。<br>
          弊社にて内容を確認後、掲載させていただきます。</p>
      </div>
      <div class="go-read__text-btnbox">
        <p class="go-read__link"><a href="https://gohan-tabi.com/kyoto/" class="btn">
            京都版<span>はこちら</span> <i class="fas fa-arrow-right"></i></a></p>
        <p class="go-read__link"><a href="https://gohan-tabi.com/okinawa/" class="btn">
            沖縄版<span>はこちら</span> <i class="fas fa-arrow-right"></i></a></p>
      </div>
    </div>
  </div>

  <div class="l-insta">
    <div class="l-insta__inner">
      <div class="l-insta__cont">
        <h2 class="l-insta__title"><i class="fab fa-instagram symbol"></i><br>INSTAGRAMに投稿して<br class="br-sp">お気に入りのお店を応援しよう！</h2>
        <p class="l-insta__read">美味しかったお店や<br class="br-sp">
          応援したいお店をシェアして広めよう！<br>
          <span>#<?php get_pref(); ?>GO!HAN旅 </span>をつけて<br>
          INSTAGRAMに投稿してくださいね！</p>
        <!-- <p class="btn-wrap"><a href="#" class="btn btn-m-blue"><span class="bold-text">#<?php get_pref(); ?>GO!HAN旅
            </span>の投稿をみる</a> -->
        </p>
      </div>
    </div>
  </div>
  <!-- /l-insta -->
  <?php get_footer('sns'); ?>
  <!-- /mod_share -->
</main>

<?php get_footer(); ?>