<?php get_header(); ?>
    <div class="page">

      <?php
        require_once('/vagrant/rlf/public_html/wp-load.php');
        require_once('class-wp_post_helper.php');

        if(!empty($_POST['shop-name'])) {

          $my_post = array();
          $my_post['post_title'] = $_POST['shop-name'];
          $my_post['post_content'] = "本文";
          $my_post['post_author'] = 1;
          $my_post['post_status'] = 'publish';
          $my_post['post_type'] = 'post';

          $post = new wp_post_helper($my_post);

          // $post_id = wp_insert_post($my_post);

          // add_post_meta($post_id, 'tel_no', $_POST['tel_no']);
          // add_post_meta($post_id, '_tel_no', 'field_5ef05def55a69');
          // print_r($_FILES);


          // $post = get_post($post_id);



          // $filename はアップロード用ディレクトリにあるファイルのパス。
          // $filename = 'http://rlf.local/wp-content/uploads/26964809521_69bb06a61a_c.jpg';
          $filename = $_FILES['img01']['name'];

          // アップロード用ディレクトリのパスを取得。
          $wp_upload_dir = wp_upload_dir();
          print_r($wp_upload_dir);
          move_uploaded_file($_FILES['img01']['tmp_name'], $wp_upload_dir['basedir'].'/' . $filename);
echo "start--";
          $aaa = $post->add_media(
              $wp_upload_dir['basedir'].'/' . $filename,  // メディアファイルの絶対パス
              'タイトル', // メディアの「タイトル」
              '説明',   // メディアの「説明」
              'キャプション',   // メディアの「キャプション」
              true    // true (アイキャッチ画像にする) or false (アイキャッチ画像にしない)
          );

          print_r($aaa);

          $post->add_field(
              'field_xxxxxxxxxxxxx',	// キー
              'field_val'			// バリュー
          );

          $post->insert();
          unset($post);
echo "end--";
        }

   //      Array
   // (
   //     [img01] => Array
   //         (
   //             [name] => AdobeStock_318303525.jpeg
   //             [type] => image/jpeg
   //             [tmp_name] => /tmp/phpCkWaCJ
   //             [error] => 0
   //             [size] => 2578608
   //         )
   //
   // )

   // filetype -- Array ( [ext] => jpg [type] => image/jpeg )

   // Array
   // (
   //     [path] => /vagrant/rlf/public_html/wp-content/uploads
   //     [url] => http://rlf.local/wp-content/uploads
   //     [subdir] =>
   //     [basedir] => /vagrant/rlf/public_html/wp-content/uploads
   //     [baseurl] => http://rlf.local/wp-content/uploads
   //     [error] =>
   // )

        // $post = get_post(46);
        //
        //
        //
        // // $filename はアップロード用ディレクトリにあるファイルのパス。
        // // $filename = 'http://rlf.local/wp-content/uploads/26964809521_69bb06a61a_c.jpg';
        // $filename = $_FILES['img01']['name'];
        //
        // // アップロード用ディレクトリのパスを取得。
        // $wp_upload_dir = wp_upload_dir();
        // print_r($wp_upload_dir);
        // move_uploaded_file($_FILES['img01']['tmp_name'], $wp_upload_dir['basedir'].'/' . $filename);
        // //
        // // この添付ファイルを紐付ける親投稿の ID。
        // // $parent_post_id = 31;
        //
        // $post->add_media(
        //     $wp_upload_dir['basedir'].'/' . $filename,  // メディアファイルの絶対パス
        //     'タイトル', // メディアの「タイトル」
        //     '説明',   // メディアの「説明」
        //     'キャプション',   // メディアの「キャプション」
        //     true    // true (アイキャッチ画像にする) or false (アイキャッチ画像にしない)
        // );
        //
        // $post->insert();

        // // ファイルの種類をチェックする。これを 'post_mime_type' に使う。
        // $filetype = wp_check_filetype( basename( $filename ), null );
        //
        // echo "filetype -- ";
        // print_r($filetype);
        //
        // // 添付ファイル用の投稿データの配列を準備。
        // $attachment = array(
        // 	'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
        // 	'post_mime_type' => $filetype['type'],
        // 	'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
        // 	'post_content'   => '',
        // 	'post_status'    => 'inherit'
        // );
        //
        // // 添付ファイルを追加。
        // $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
        //
        // // wp_generate_attachment_metadata() の実行に必要なので下記ファイルを含める。
        // require_once( ABSPATH . 'wp-admin/includes/image.php' );
        //
        // // 添付ファイルのメタデータを生成し、データベースを更新。
        // $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
        // wp_update_attachment_metadata( $attach_id, $attach_data );

        // アイキャッチ画像にする。
        // set_post_thumbnail( $parent_post_id, $attach_id );


      ?>

      <form action="./" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">店舗名</label>
          <input name="shop-name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="○○亭">
          <small id="emailHelp" class="form-text text-muted">&nbsp;</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">電話番号</label>
          <input name="tel_no" type="text" class="form-control" id="exampleInputPassword1" placeholder="098-000-0000">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">電話番号</label>
          <input name="img01" type="file" class="form-control" id="exampleInputFile1">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


    </div>
<?php get_footer(); ?>
