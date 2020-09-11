<?php get_header(); ?>
    <?php
        $url = parse_url('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        list($dummy1, $pref, $taxonomy, $param, $dummy2) = explode("/", $url['path']);
        $args = array(
          'post_type' => 'shops',
          'orderby' => 'rand',
          'tax_query' => array(
                  array(
                      'taxonomy' => $taxonomy,
                      'terms' => array( $param ),
                      'field' => 'slug',
                  )
                )
        );
        query_posts($args);
    ?>
    <div class="content-wrap">
      <div class="content-inner">
        <?php get_template_part('tpl', 'shoplist'); ?>
      </div>
    </div>
    <?php wp_reset_query(); ?>
<?php get_footer(); ?>
