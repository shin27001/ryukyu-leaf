<?php get_header(); ?>
  <?php get_header('sub'); ?>
    <div class="content-wrap bg-gray">
      <div class="content-inner">
        <?php get_template_part('tpl', 'search'); ?>
        <?php get_template_part('tpl', 'shoplist'); ?>
      </div>
    </div>
  <?php get_footer('insta'); ?>
  <?php get_footer('sns'); ?>
  <?php get_footer('regist'); ?>
<?php get_footer(); ?>
