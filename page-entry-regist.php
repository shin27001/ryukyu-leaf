<?php
  require_once(ABSPATH . 'wp-load.php');
  require_once('class/class-wp_post_helper.php');

  if (e('post_all')) {
    $_POST  = unserialize(base64_decode(e('post_all')));
  }
  // $_FILES = unserialize(base64_decode(e('post_files')));

//   pr($_POST);
// return;

  $my_post = array();
  $my_post['post_title'] = stz($_POST['shop_name']);
  $my_post['post_content'] = stz($_POST['message']);
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
  $post->validate_field('field_5ef5761903868', 'map_code', false); #
  $post->validate_field('field_5ef5780ad9565', 'menu');
  $post->validate_field('field_5ef05def55a69', 'tel_no');
  $post->validate_field('field_5ef05e1a55a6a', 'hours');
  $post->validate_field('field_5ef5754418b7b', 'parking');
  $post->validate_field('field_5ef05e3555a6b', 'holiday');
  $post->validate_field('field_5ef05e7255a6c', 'seats');
  $post->validate_field('field_5ef05f3655a6e', 'url', false);#
  $post->validate_field('field_5ef6f6956bade', 'fb', false);#
  $post->validate_field('field_5ef6f6df6badf', 'tw', false);#
  $post->validate_field('field_5ef6f7066bae0', 'insta', false);#
  $post->validate_field('field_5ef6f7486bae1', 'line', false);#
  $post->validate_field('field_5ef061b39599f', 'payments', false, false);#
  $post->validate_field('field_5ef6f12febcb3', 'coronas', true, false);
  $post->validate_field('field_5ef57329b52a3', 'message', false);#
  $post->validate_field('field_5ef709a391a29', 'takeout_message', false);#
  $post->validate_field('field_5ef709d891a2a', 'delivery_message', false);#
  $post->validate_field('field_5efad0d2748b7', 'request_message', false);#
  $post->validate_field('field_5ef6f2eb9f16b', 'coronas_other', false); # 必須だが一時回避



  $post->add_terms('dishes',  $_POST['dishes']);
  $post->add_terms('options', $_POST['options']);


  if (empty($post->validate_errors)) {
    $postid = $post->insert();
    // echo "post-id -- ".$postid;

    $_POST['confirm'] = "";

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
  } else {
    global $validate_errors;
    $validate_errors = $post->validate_errors;
  }


  // echo "<h1>登録完了</h1>"

  //header("Location: " . esc_url( home_url('entry-complete') ));



  // 画像ファイル保存
  // $filename = $_FILES['shop_main_image']['name'];
  // $wp_upload_dir = wp_upload_dir();
  // move_uploaded_file($_FILES['shop_main_image']['tmp_name'], $wp_upload_dir['basedir'].'/' . $filename);
  // $attachment_id = $post->add_media($wp_upload_dir['basedir'].'/' . $filename);
  // echo "attachment_id -- ".$attachment_id;
  // $post->add_field('field_5ef552f2c8a37', $attachment_id);

?>
<?php if (!empty($validate_errors)) : ?>
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
<?php elseif(empty($validate_errors) && !empty(e('confirm'))): ?>
  <?php include('page-entry-confirm.php'); ?>
<?php else: ?>
  <?php get_header(); ?>
  <div class="content-wrap">
    <div class="form-page__title complete">
      <h1 class="c-red main-title">登録フォーム<span class="d-inline">入力完了</span></h1>
      <p class="sub-text mb-2">掲載登録を受け付けました。<br>この度はご登録いただきまして、<span class="d-inline">誠にありがとうございます。</span><br>
        ご入力いただきました内容を確認後、<span class="d-inline">WEBの方にUPいたします。</span><br>不備などあった場合、ご連絡させていただくことがありますので<span
          class="d-inline">ご了承ください。</span><br>掲載までもう少々お待ちくださいませ。</p>

      <p class="btn-wrap"><a href="<?php echo esc_url(home_url()); ?>" class="btn btn-m-white"><i class="fas fa-undo-alt"></i> HOMEへ戻る</a>
      </p>
    </div>
  </div>
  <?php get_footer(); ?>
<?php endif; ?>
