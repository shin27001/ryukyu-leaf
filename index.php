<?php get_header(); ?>
    <?php
        $args = array(
          'post_type' => 'shops',
        );
        query_posts($args);
    ?>
    <div class="content-wrap">
      <div class="content-inner">
        <?php get_template_part('tpl', 'shoplist'); ?>
      </div>
    </div>
<?php get_footer(); ?>
