<div class="l-shop">
  <h1 class="main-title">
    「<?php esd_title(['site_title'=>false]); ?>」の一覧
  </h1>
  <ul class="l-shop__list">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <li class="l-shop__item">
        <a class="l-shop__link" href="<?php the_permalink(); ?>">
          <div class="l-shop__img">
            <?php $main_img = get_field('shop_main_image'); ?>
            <img class="ofi" src="<?php echo $main_img['sizes']['medium']; ?>" alt="<?php echo $main_img['title']; ?>">
          </div>
          <div class="l-shop__info">
            <?php $dish = gt_get_main_term(get_the_ID(), 'dishes'); ?>
            <?php if ($dish) : ?>
              <span class="l-shop__infoCat <?php the_field('class', "dishes_" . $dish->term_id); ?>"><?php echo $dish->name; ?></span>
            <?php endif; ?>
            <h3 class="l-shop__infoTitle"><?php the_title(); ?></h3>
            <p class="l-shop__infoArea">
              <?php //$area = gt_get_main_term(get_the_ID(), 'area'); ?>
              <?php $areas = get_the_terms(get_the_ID(), 'area'); ?>
              <?php if ($areas) : foreach($areas as $area) : ?>
                <?php echo ($area->parent) ? '<i class="fas fa-map-marker-alt"></i>'.$area->name : ""; ?>
              <?php endforeach; endif; ?>
            </p>
          </div>
          <?php if(e('search_update', $_GET) == true) : ?>
          <form method="POST" id="updateform" action="<?php echo esc_url(home_url('entry-form')); ?>">
            <input type="hidden" name="request" value="update">
            <input type="hidden" name="main_post_id" value="<?php echo get_the_ID(); ?>">
            <button class="btn btn-m-red" type="submit"><span><i class="fas fa-edit"></i> 記事を更新する</span></button>
          </form>
          <?php endif; ?>
        </a>
      </li>
    <?php endwhile; else : ?>
      <h2>該当するお店がありません。</h2>
    <?php endif; ?>

  </ul>
  <!-- Pagination -->
  <?php if ( function_exists( 'pagination' ) ) :
      pagination( $wp_query->max_num_pages );
    endif; ?>
</div><!-- /l-shop -->
