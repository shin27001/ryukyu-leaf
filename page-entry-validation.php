<?php
// pr($_POST);
// return;

$errors = array();

$errors = array_merge($errors, validate_field('contact_policy', array('acf-field'=>false)));
$errors = array_merge($errors, validate_field('written_oath', array('acf-field'=>false)));


if (e('update', $_GET)) {
  $errors = array_merge($errors, validate_field('shop_name', array('acf-field'=>false)));
  $errors = array_merge($errors, validate_field('tanto_name'));
  $errors = array_merge($errors, validate_field('tanto_tel'));
  // $errors = array_merge($errors, validate_field('tanto_mail'));
  // $errors = array_merge($errors, validate_field('tanto_fax'));
} else {
  $errors = array_merge($errors, validate_field('shop_name', array('acf-field'=>false)));
  $errors = array_merge($errors, validate_field('tanto_name'));
  $errors = array_merge($errors, validate_field('tanto_tel'));
  // $errors = array_merge($errors, validate_field('tanto_mail'));
  // $errors = array_merge($errors, validate_field('tanto_fax'));
  $errors = array_merge($errors, validate_field('zip_code'));
  $errors = array_merge($errors, validate_field('address'));
  $errors = array_merge($errors, validate_field('area', array('acf-field'=>false)));
  $errors = array_merge($errors, validate_field('dishes', array('sanitize'=>false, 'acf-field'=>false)));
  $errors = array_merge($errors, validate_field('options', array('sanitize'=>false, 'acf-field'=>false)));
  $errors = array_merge($errors, validate_field('map_code', array('empty'=>true))); #
  $errors = array_merge($errors, validate_field('menu'));
  $errors = array_merge($errors, validate_field('tel_no'));
  $errors = array_merge($errors, validate_field('hours'));
  $errors = array_merge($errors, validate_field('parking'));
  $errors = array_merge($errors, validate_field('holiday'));
  $errors = array_merge($errors, validate_field('seats'));
  $errors = array_merge($errors, validate_field('youtube', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('url', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('fb', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('tw', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('insta', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('line', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('payments', array('empty'=>true, 'sanitize'=>false)));#
  $errors = array_merge($errors, validate_field('payments_other', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('coronas', array('sanitize'=>false)));
  $errors = array_merge($errors, validate_field('message', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('takeout_message', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('delivery_message', array('empty'=>true)));#
  $errors = array_merge($errors, validate_field('request_message', array('empty'=>true)));#
  // $errors = array_merge($errors, validate_field('coronas_other'));#
}


global $validate_errors;
$validate_errors = $errors;
?>
<?php if($errors) : ?>
  <?php get_template_part('page', 'entry-form'); ?>
<?php elseif(empty($errors)): ?>
  <?php get_template_part('page', 'entry-confirm'); ?>
<?php endif; ?>
