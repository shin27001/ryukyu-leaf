<?php get_header(); ?>
    <div class="page">

      <?php
      require_once('/vagrant/rlf/public_html/wp-load.php');
      require_once(ABSPATH . 'wp-admin/includes/image.php');

      print_r($_FILES);

        if(!empty($_POST['shop-nameあああ'])) {

          $my_post = array();
          $my_post['post_title'] = $_POST['shop-name'];
          $my_post['post_content'] = "本文";
          $my_post['post_author'] = 1;
          $my_post['post_status'] = 'publish';
          $my_post['post_type'] = 'post';


          $post_id = wp_insert_post($my_post);

          add_post_meta($post_id, 'tel_no', $_POST['tel_no']);
          add_post_meta($post_id, '_tel_no', 'field_5ef05def55a69');
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
          $filetype = wp_check_filetype( basename( $filename ), null );

          $attachment = array(
          	'guid'           => $wp_upload_dir['basedir'].'/' . $filename,
          	'post_mime_type' => $filetype['type'],
          	'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
          	'post_content'   => '',
          	'post_status'    => 'inherit'
          );

          // 添付ファイルを追加。
          $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );

          // // 添付ファイルのメタデータを生成し、データベースを更新。
          $attach_data = wp_generate_attachment_metadata( $attach_id, $wp_upload_dir['basedir'].'/' . $filename );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          echo "attach_id -- ".$attach_id.";";
          print_r($attach_data);

          $field_key = "field_5ef2c011413da";
          $value = array(
              array(
                "shop_image"   => $attach_id,
                "shop_image_title"   => "画像タイトル",
              )
          );
          update_field( $field_key, $value, $post_id );


          // add_post_meta($post_id, 'shop_images_0_shop_image', $attach_id);
          // add_post_meta($post_id, '_shop_images_0_shop_image', 'field_5ef2c039413db');
          //
          // add_post_meta($post_id, 'shop_images', 1);
          // add_post_meta($post_id, '_shop_images', 'field_5ef2c011413da');

echo "end--";
        }


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
          <label for="exampleInputPassword1">画像1</label>
          <input name="img01[]" type="file" class="form-control" id="exampleInputFile1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">画像2</label>
          <input name="img01[]" type="file" class="form-control" id="exampleInputFile1">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


    </div>
<?php get_footer(); ?>
