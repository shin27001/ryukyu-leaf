<?php
  require_once(ABSPATH . 'wp-load.php');
  require_once('class/class-wp_post_helper.php');

  if (e('post_all')) {
    $_POST  = unserialize(base64_decode(e('post_all')));
  }


//   pr($_POST);
// exit;

  $my_post = array();
  $my_post['post_title'] = stz($_POST['shop_name']);
  $my_post['post_content'] = stz($_POST['message']);
  $my_post['post_author'] = 1;
  $my_post['post_status'] = 'pending';
  $my_post['post_type'] = e('update') ? 'shop_update' : 'shops';

  $post = new wp_post_helper($my_post);

  if (!e('update')) {
    $post->add_field('field_5ef0603255a70', 1); //初期値は、1:掲載しない
  }
  $post->insert_field('field_5efae5e7b749f', 'tanto_name');
  $post->insert_field('field_5efae60bb74a0', 'tanto_mail');
  $post->insert_field('field_5efae62cb74a1', 'tanto_tel');
  $post->insert_field('field_5ef05d1488e54', 'zip_code');
  $post->insert_field('field_5ef05d7888e55', 'address');
  $post->insert_field('field_5ef5761903868', 'map_code'); #
  $post->insert_field('field_5ef5780ad9565', 'menu');
  $post->insert_field('field_5ef05def55a69', 'tel_no');
  $post->insert_field('field_5ef05e1a55a6a', 'hours');
  $post->insert_field('field_5ef5754418b7b', 'parking');
  $post->insert_field('field_5ef05e3555a6b', 'holiday');
  $post->insert_field('field_5ef05e7255a6c', 'seats');
  $post->insert_field('field_5ef57a045001d', 'youtube'); #
  $post->insert_field('field_5ef05f3655a6e', 'url');#
  $post->insert_field('field_5ef6f6956bade', 'fb');#
  $post->insert_field('field_5ef6f6df6badf', 'tw');#
  $post->insert_field('field_5ef6f7066bae0', 'insta');#
  $post->insert_field('field_5ef6f7486bae1', 'line');#
  $post->insert_field('field_5ef061b39599f', 'payments', false);#
  $post->insert_field('field_5ef6f12febcb3', 'coronas', false);
  $post->insert_field('field_5ef57329b52a3', 'message');#
  $post->insert_field('field_5ef709a391a29', 'takeout_message');#
  $post->insert_field('field_5ef709d891a2a', 'delivery_message');#
  $post->insert_field('field_5efad0d2748b7', 'request_message');#
  $post->insert_field('field_5ef6f2eb9f16b', 'coronas_other'); #

  // $a = e('update') ? $post->insert_field('field_5f051683d37f5', 'main_post_id') : false;
  if(!empty($_POST['update'])) { $post->insert_field('field_5f051683d37f5', 'main_post_id'); }

  #エリアの親ターム取得
  if(!empty($_POST['area'])) {
    $term = get_term_by('slug', $_POST['area'], 'area');
    $parent_term = get_term($term->parent);

    $post->insert_terms('area',  false);
    $_POST['area'] = $parent_term->slug;
    $post->insert_terms('area',  false);
  }

  $post->insert_terms('dishes',  false);
  $post->insert_terms('options', false);


  // 投稿し、post_idを取得
  $postid = e('update') ? $post->update() : $post->insert();
  // echo "post-id -- ".$postid;



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

  $subject = e('update') ? '[更新依頼]' : '[新規登録]';
  $subject .= stz($_POST['shop_name']);
  $message = get_bloginfo('title')."から下記依頼がありました。\n\n管理画面を確認して下さい。\n".$subject;
  wp_mail( get_mail(), $subject, $message);

  // 画像ファイル保存
  // $filename = $_FILES['shop_main_image']['name'];
  // $wp_upload_dir = wp_upload_dir();
  // move_uploaded_file($_FILES['shop_main_image']['tmp_name'], $wp_upload_dir['basedir'].'/' . $filename);
  // $attachment_id = $post->add_media($wp_upload_dir['basedir'].'/' . $filename);
  // echo "attachment_id -- ".$attachment_id;
  // $post->add_field('field_5ef552f2c8a37', $attachment_id);

  header('Location: '.esc_url(home_url('entry-complete')));
  exit;
?>
