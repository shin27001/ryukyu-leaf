<?php
// Array
// (
//     [tanto_name] => 田中 太郎
//     [tanto_mail] => mail@example.com
//     [tanto_tel] => 0980001111
//     [shop_name] => ちるぐゎー　北谷店
//     [addres] => 沖縄県北谷町桑江1-1-1
//     [menu] => ミックスそば（大）830円（中）730円（小）530円
//     [tel_no] => 0980001111
//     [hours] => 月～金 12：00～14：00、18：00～24：00
//     [parking] => 100台
//     [holiday] => 木曜日
//     [seats] => 100席、テーブル席、カウンター
//     [url] => https://www.xxxxx.jp
//     [fb] => https://facebook.com/xxxxx
//     [tw] => https://twitter.com/xxxxx
//     [insta] => https://instagram.com/xxxxx
//     [line] => https://line.com/xxxxx
//     [message] => 琉球LEAFをみて来店してくれた方にはドリンク1杯プレゼント！
//     [takeout_message] =>                   予約受付：15:00〜18:00受け渡し時間：15:00〜19:00
//     [delivery_message] =>                   対応地域：宜野湾市内のみ（14:00までの注文に限ります）予約受付：15:00〜17:00（1時ほどお時間をいただきます。）
//     [korona_taisaku] =>
//     [shop_image] =>
//     [shop_image1] =>
//     [shop_image2] =>
//     [shop_image3] =>
//     [shop_image4] =>
//     [request_message] =>
//     [contact_policy] => Array
//         (
//             [separator] => ,
//         )
//
//     [written_oath] => Array
//         (
//             [separator] => ,
//         )
//
// )

  require_once(ABSPATH . 'wp-load.php');
  require_once('class/class-wp_post_helper.php');

  echo ABSPATH;

  // pr($_GET);

  // echo serialize(json_encode($_GET['coronas']));
  // echo "<br>";
  // echo serialize($_GET['coronas']);
  // echo "<br>";
  // echo serialize(stz($_GET['coronas']));
  // echo $_GET['coronas'];
  // pr($_FILES);
  // return;

  $my_post = array();
  $my_post['post_title'] = stz($_POST['shop_name']);
  $my_post['post_content'] = stz($_POST['message']."yes");
  $my_post['post_author'] = 1;
  $my_post['post_status'] = 'publish';
  $my_post['post_type'] = 'shops';

  $post = new wp_post_helper($my_post);

  $post->add_field('field_5ef0603255a70', 1); //初期値は、1:掲載しない
  $post->validate_field('field_5ef700d603622', 'tanto_name');
  $post->validate_field('field_5ef7010103623', 'tanto_mail');
  $post->validate_field('field_5ef7014403624', 'tanto_tel');
  $post->validate_field('field_5ef05d1488e54', 'zip_code');
  $post->validate_field('field_5ef05d7888e55', 'addres');
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

  $post->add_terms('dishes',  $_POST['dishes']);
  $post->add_terms('options', $_POST['options']);


  // $post->add_field('', stz($_GET['']));
  // $post->add_field('field_5ef700d603622', stz($_GET['tanto_name']));
  // if(!empty($_GET['payments'])) $post->add_field('field_5ef061b39599f', $_GET['payments']);
  // if(!empty($_GET['coronas']))  $post->add_field('field_5ef6f12febcb3', $_GET['coronas']);

  if ($post->validate_errors) {
    pr($post->validate_errors);
  } else {
    $postid = $post->insert();
    echo "post-id -- ".$postid;
  }

  $post->add_media2('field_5ef552f2c8a37', 'shop_main_image');

  // 画像ファイル保存
  // $filename = $_FILES['shop_main_image']['name'];
  // $wp_upload_dir = wp_upload_dir();
  // move_uploaded_file($_FILES['shop_main_image']['tmp_name'], $wp_upload_dir['basedir'].'/' . $filename);
  // $attachment_id = $post->add_media($wp_upload_dir['basedir'].'/' . $filename);
  // echo "attachment_id -- ".$attachment_id;
  // $post->add_field('field_5ef552f2c8a37', $attachment_id);

?>
