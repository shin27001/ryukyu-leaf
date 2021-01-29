<?php get_header(); ?>
<?php get_header('sub'); ?>
<div class="page">


<a href="https://mg.<?php echo $_SERVER['HTTP_HOST']; ?>/login?page=goto" class="btn btn-m-red">
申し込みはこちら
</a>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
      <p><?php the_content(); ?></p>
  <?php endwhile; endif; ?>
  
</div>
<?php get_footer(); ?>