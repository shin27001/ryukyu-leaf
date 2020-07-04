<?php
// pr($_POST);

$errors = array();

$errors = array_merge($errors, validate_field('contact_policy'));
$errors = array_merge($errors, validate_field('written_oath'));

$errors = array_merge($errors, validate_field('tanto_name'));
$errors = array_merge($errors, validate_field('tanto_mail'));
$errors = array_merge($errors, validate_field('tanto_tel'));
$errors = array_merge($errors, validate_field('zip_code'));
$errors = array_merge($errors, validate_field('address'));
$errors = array_merge($errors, validate_field('dishes', array('sanitize'=>false, 'taxonomy'=>true)));
$errors = array_merge($errors, validate_field('options', array('sanitize'=>false, 'taxonomy'=>true)));
$errors = array_merge($errors, validate_field('map_code', array('empty'=>true))); #
$errors = array_merge($errors, validate_field('menu'));
$errors = array_merge($errors, validate_field('tel_no'));
$errors = array_merge($errors, validate_field('hours'));
$errors = array_merge($errors, validate_field('parking'));
$errors = array_merge($errors, validate_field('holiday'));
$errors = array_merge($errors, validate_field('seats'));
$errors = array_merge($errors, validate_field('url', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('fb', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('tw', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('insta', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('line', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('payments', array('empty'=>true, 'sanitize'=>false)));#
$errors = array_merge($errors, validate_field('coronas', array('sanitize'=>false)));
$errors = array_merge($errors, validate_field('message', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('takeout_message', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('delivery_message', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('request_message', array('empty'=>true)));#
$errors = array_merge($errors, validate_field('coronas_other'));

global $validate_errors;
$validate_errors = $errors;
?>
<?php if($errors) : ?>
  <?php get_header(); ?>
  <?php get_header('sub'); ?>
    <div class="content-wrap">
      <div class="form-page__title">
        <h1 class="main-title">掲載依頼フォーム</h1>
        <p class="sub-text mb-2">下記のフォームにて内容をご入力のうえ、<span class="d-inline">「入力内容を確認する」ボタンを押してください。</span></p>
      </div>
      <div class="content-inner">
        <!-- Entry Form -->
        <?php get_template_part('tpl', 'form'); ?>
      </div>
    </div>
  <?php get_footer(); ?>
<?php elseif(empty($errors)): ?>
<?php get_template_part('page', 'entry-confirm'); ?>
<?php endif; ?>
