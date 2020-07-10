<?php get_header(); ?>
<div class="content-wrap">
  <div class="form-page__title">
    <h1 class="main-title">掲載依頼フォーム</h1>
    <p class="sub-text mb-2">下記のフォームにて内容をご入力のうえ、<span class="d-inline">「入力内容を確認する」ボタンを押してください。</span></p>
  </div>
  <div class="content-inner">
    <?php get_template_part('tpl', 'form'); ?>
    <!-- Entry Form -->
    <?php //if(!empty($_POST['update'])) ($_POST['update']) ? get_template_part('tpl', 'shoplist') : get_template_part('tpl', 'form'); ?>
    <?php //if((empty($_POST['update'])) || ($_POST['update'] == false)) : ?>
    <?php //elseif($_POST['update'] == true) : ?>
      <?php //get_template_part('tpl', 'shoplist'); ?>
    <?php //endif; ?>
  </div>
</div>
<?php get_footer(); ?>
