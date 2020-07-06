<?php get_header(); ?>
<?php get_header('home'); ?>
<div class="content-wrap">
  <div class="content-inner">
    <div class="l-alert">
      <h2><i class="fas fa-exclamation-triangle symbol"></i><br>新型コロナウイルス<br>感染症対策に<span class="d-inline">関するお願い</span></h2>
      <p class="font-sm">
        発熱または咳の症状がある方やご体調のすぐれない方、感染者または感染が疑われる方との濃厚接触があった方は来店をご遠慮ください。<br>来店時は消毒液の利用や手洗い、食事中以外のマスク着用など、店舗からの要請にご協力頂きますようお願いいたします。</p>
    </div>
    <!-- /l-alert -->

    <!-- Search Form -->
    <?php get_template_part('tpl', 'search'); ?>

    <?php
    $args = array(
      'post_type' => 'shops',
      'posts_per_page' => 12,
      // 's' => 'コザ',
      // 'tax_query' => array(
      //         array(
      //             'taxonomy' => 'area',
      //             'field' => 'slug',
      //             'terms' => array( 'naha', 'shuri' ),
      //         ),
      //         array(
      //             'taxonomy' => 'dishes',
      //             'field' => 'slug',
      //             'terms' => 'japanese',
      //         ),
      //     ),
    );

    $query = new WP_Query($args);
    ?>


    <div class="l-shop">
      <h2 class="main-title">
        <i class="fas fa-bullhorn c-red"></i> 新着店舗
      </h2>

      <ul class="l-shop__list">
        <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li class="l-shop__item">
              <a class="l-shop__link" href="<?php the_permalink(); ?>">
                <div class="l-shop__img">
                  <?php $main_img = get_field('shop_main_image'); ?>
                  <img class="ofi" src="<?php echo $main_img['sizes']['medium']; ?>" alt="<?php echo $main_img['title']; ?>">
                </div>
                <div class="l-shop__info">
                  <?php $dishes = get_the_terms(get_the_ID(), 'dishes'); ?>
                  <?php if ($dishes) : ?>
                    <span class="l-shop__infoCat <?php the_field('class', "dishes_" . $dishes[0]->term_id); ?>"><?php echo $dishes[0]->name; ?></span>
                  <?php endif; ?>
                  <h3 class="l-shop__infoTitle"><?php the_title(); ?></h3>
                  <p class="l-shop__infoArea">
                    <?php $areas = get_the_terms(get_the_ID(), 'area'); ?>
                    <?php if ($areas) : foreach ($areas as $key => $area) : ?>
                        <i class="fas fa-map-marker-alt"></i><?php echo $area->name; ?>
                    <?php endforeach;
                    endif; ?>
                  </p>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata(); ?>
      </ul>
    </div>
    <!-- /l-shop -->
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
      <p class="btn-wrap"><a href="#" class="btn btn-m-blue"><span class="bold-text">#<?php get_pref(); ?>GO!HAN旅
          </span>の投稿をみる</a>
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

<div class="mod_share">
  <h3 class="mod_share__title">この情報を共有する</h3>
  <ul class="mod_share__list">
    <li class="mod_share__item twitter"><a href="#" class="link" target="_blank">
        <p class="txt"><i class="fab fa-twitter symbol"></i><br>Twitterで<br>シェア</p>
      </a></li>
    <li class="mod_share__item facebook"><a href="#" class="link" target="_blank">
        <p class="txt"><i class="fab fa-facebook symbol"></i><br>Facebookで<br>シェア</p>
      </a></li>
    <li class="mod_share__item line"><a href="#" class="link">
        <p class="txt"><i class="fab fa-line symbol"></i><br>LINEで<br>送る</p>
      </a></li>
    <li class="mod_share__item copy">
      <div class="link" id="clipboard">
        <p class="txt"><i class="far fa-copy symbol"></i><br>URLを<br>コピー</p>
      </div>
    </li>
  </ul>
</div>
<!-- /mod_share -->
<div class="owner">
  <div class="owner__inner">
    <h2 class="owner__title">飲食店の皆様へ</h2>
    <p class="owner__read"><?php get_pref(); ?>GO!HAN旅は、コロナ対策をしながら営業を再開した飲食店を応援したいと思い、<span class="d-inline">このサイトを立ち上げました！</span><br>
      こんな時だからこそ、お客様にゆっくりグルメを楽しんでもらえる環境があるという事を知ってもらい、<span class="d-inline">更にお店のファンが増えたらいいなと思っています。</span><br>
      無料で掲載できますので、<span class="d-inline">ご賛同いただけましたら以下のフォームよりご連絡ください。</span></p>
    <p class="btn-wrap"><a href="<?php echo esc_url(home_url('entry-form')); ?>" class="btn btn-m-white"><i class="fas fa-edit"></i> 新規店舗登録はこちら</a></p>
  </div>
</div>
<?php get_footer(); ?>
