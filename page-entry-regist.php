<?php
  require_once(ABSPATH . 'wp-load.php');
  require_once('class/class-wp_post_helper.php');


  $_POST  = unserialize(base64_decode(e('post_all')));
  // $_FILES = unserialize(base64_decode(e('post_files')));

  // pr($_POST);

  $my_post = array();
  $my_post['post_title'] = stz($_POST['shop_name']);
  $my_post['post_content'] = stz($_POST['message']."yes");
  $my_post['post_author'] = 1;
  $my_post['post_status'] = 'publish';
  $my_post['post_type'] = 'shops';

  $post = new wp_post_helper($my_post);

  $post->add_field('field_5ef0603255a70', 1); //初期値は、1:掲載しない
  $post->validate_field('field_5efae5e7b749f', 'tanto_name');
  $post->validate_field('field_5efae60bb74a0', 'tanto_mail');
  $post->validate_field('field_5efae62cb74a1', 'tanto_tel');
  $post->validate_field('field_5ef05d1488e54', 'zip_code');
  $post->validate_field('field_5ef05d7888e55', 'address');
  $post->validate_field('field_5ef5761903868', 'map_code');
  $post->validate_field('field_5ef5780ad9565', 'menu');
  $post->validate_field('field_5ef05def55a69', 'tel_no');
  $post->validate_field('field_5ef05e1a55a6a', 'hours');
  $post->validate_field('field_5ef5754418b7b', 'parking');
  $post->validate_field('field_5ef05e3555a6b', 'holiday');
  $post->validate_field('field_5ef05e7255a6c', 'seats');
  $post->validate_field('field_5ef05f3655a6e', 'url');
  $post->validate_field('field_5ef6f6956bade', 'fb');
  $post->validate_field('field_5ef6f6df6badf', 'tw');
  $post->validate_field('field_5ef6f7066bae0', 'insta');
  $post->validate_field('field_5ef6f7486bae1', 'line');
  $post->validate_field('field_5ef061b39599f', 'payments', false);
  $post->validate_field('field_5ef6f12febcb3', 'coronas',  false);
  $post->validate_field('field_5ef57329b52a3', 'message');
  $post->validate_field('field_5ef709a391a29', 'takeout_message');
  $post->validate_field('field_5ef709d891a2a', 'delivery_message');
  $post->validate_field('field_5efad0d2748b7', 'request_message');
  $post->validate_field('field_5ef6f2eb9f16b', 'coronas_other');



  $post->add_terms('dishes',  $_POST['dishes']);
  $post->add_terms('options', $_POST['options']);


  if ($post->validate_errors) {
    pr($post->validate_errors);
  } else {
    $postid = $post->insert();
    echo "post-id -- ".$postid;
  }

  // 画像ファイル保存
  if (!empty($_POST['shop_main_image'])) {
    $attachment_id = $post->add_media2( 'shop_main_image');
    $post->add_field('field_5ef552f2c8a37', $attachment_id);
  }

  if (!empty($_POST['shop_image1'])) {
    $attachment_id = $post->add_media2('shop_image1');
    $row = array('shop_image' => $attachment_id);
    add_row('shop_images', $row, $postid );
  }
  if (!empty($_POST['shop_image2'])) {
    $attachment_id = $post->add_media2('shop_image2');
    $row = array('shop_image' => $attachment_id);
    add_row('shop_images', $row, $postid );
  }
  if (!empty($_POST['shop_image3'])) {
    $attachment_id = $post->add_media2('shop_image3');
    $row = array('shop_image' => $attachment_id);
    add_row('shop_images', $row, $postid );
  }
  if (!empty($_POST['shop_image4'])) {
    $attachment_id = $post->add_media2('shop_image4');
    $row = array('shop_image' => $attachment_id);
    add_row('shop_images', $row, $postid );
  }

  // echo "<h1>登録完了</h1>"

  header("Location: " . esc_url( home_url('entry-complete') ));



  // 画像ファイル保存
  // $filename = $_FILES['shop_main_image']['name'];
  // $wp_upload_dir = wp_upload_dir();
  // move_uploaded_file($_FILES['shop_main_image']['tmp_name'], $wp_upload_dir['basedir'].'/' . $filename);
  // $attachment_id = $post->add_media($wp_upload_dir['basedir'].'/' . $filename);
  // echo "attachment_id -- ".$attachment_id;
  // $post->add_field('field_5ef552f2c8a37', $attachment_id);

?>
