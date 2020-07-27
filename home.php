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
      // 'posts_per_page' => 12,
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
                        <?php echo ($area->parent) ? '<i class="fas fa-map-marker-alt"></i>' . $area->name : ""; ?>
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
      <!-- Pagination -->
      <?php //if ( function_exists( 'pagination' ) ) :
      // $GLOBALS['wp_query']->max_num_pages = $query->max_num_pages;
      // $max_num_pages = $query->max_num_pages;
      // pagination( $max_num_pages );
      // wp_reset_postdata();
      //endif; 
      ?>
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
        <span>#<?php get_pref(); ?>GOHAN旅 </span>をつけて<br>
        INSTAGRAMに投稿してくださいね！</p>
      <p class="btn-wrap"><a href="#" class="btn btn-m-blue"><span class="bold-text">#<?php get_pref(); ?>GOHAN旅
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

<?php get_footer('sns'); ?>
<!-- /mod_share -->
<?php get_footer('regist'); ?>

<?php get_footer(); ?>