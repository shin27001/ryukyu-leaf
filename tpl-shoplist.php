<div class="l-shop">
  <h1 class="l-shop__title">
    検索結果
  </h1>
  <ul class="l-shop__list">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="l-shop__item">
        <a class="l-shop__link" href="<?php the_permalink(); ?>">
          <div class="l-shop__img">
            <?php $main_img = get_field('shop_main_image'); ?>
            <img class="ofi" src="<?php echo $main_img['sizes']['medium']; ?>" alt="<?php echo $main_img['title']; ?>">
          </div>
          <div class="l-shop__info">
            <?php $dishes = get_the_terms( get_the_ID(), 'dishes' ); ?>
            <?php if ( $dishes ) : ?>
              <span class="l-shop__infoCat <?php the_field('class', "dishes_".$dishes[0]->term_id); ?>"><?php echo $dishes[0]->name; ?></span>
            <?php endif; ?>
            <h3 class="l-shop__infoTitle"><?php the_title(); ?></h3>
            <p class="l-shop__infoArea">
              <?php $areas = get_the_terms( get_the_ID(), 'area' ); ?>
              <?php if ( $areas ) : foreach ($areas as $key => $area) : ?>
                <i class="fas fa-map-marker-alt"></i><?php echo $area->name; ?>
              <?php endforeach; endif; ?>
            </p>
          </div>
        </a>
      </li>
    <?php endwhile; else: ?>
    <?php endif; ?>

  </ul>
</div><!-- /l-shop -->
