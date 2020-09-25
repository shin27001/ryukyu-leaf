<?php
    $args = array(
      'post_type' => 'shops',
      'orderby' => 'modified',
      'order'   => 'DESC',
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
                  <?php $dish = gt_get_main_term(get_the_ID(), 'dishes'); ?>
                  <?php if ($dish) : ?>
                    <span class="l-shop__infoCat <?php the_field('class', "dishes_" . $dish->term_id); ?>"><?php echo $dish->name; ?></span>
                  <?php endif; ?>
                  <h3 class="l-shop__infoTitle"><?php the_title(); ?></h3>
                  <p class="l-shop__infoArea">
                    <?php $area = gt_get_main_term(get_the_ID(), 'area'); ?>
                    <i class="fas fa-map-marker-alt"></i> <?php echo $area->name; ?>
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
