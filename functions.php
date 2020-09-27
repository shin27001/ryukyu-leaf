<?php
# アイキャッチ画像を有効にする。
//add_theme_support('post-thumbnails');

//ACFの選択肢を取得する post-id
function choices_id() { return 29; }
//画像ファイルの一時保存先を取得する
function get_tmp_img_dir() { return "wp-content/tmp_imgs/"; }

function get_pref($echo = true) {
  $pref = (strpos(ABSPATH, 'okinawa')) ? "沖縄" : "京都";
  if ($echo) { echo $pref; } else { return $pref; }
  return;
}

function get_mail() {
  return (strpos(ABSPATH, 'okinawa')) ? "info_okinawa@gohan-tabi.com" : "gohantabi_kyoto@leafkyoto.co.jp";
}

function get_userinfo() {
  if(empty($_COOKIE['user_info'])) return;
  return json_decode(stripcslashes($_COOKIE['user_info']), true);
}

// バリデーションエラーのグローバル変数
$validate_errors = array();

function pr($arg) {
  if (!empty($arg)) {
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
  }
}

function get_auth() {
  echo "auth";
  $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
  $url = $protocol.'mg.'.$_SERVER['HTTP_HOST'].'/favorite/auth';
  // $url = "https://www.yahoo.co.jp";
  // $url = "https://mg.rlf.local/api/data";
  echo $url;
  $option = [
    CURLOPT_RETURNTRANSFER => true, //文字列として返す
    CURLOPT_TIMEOUT        => 3, // タイムアウト時間
  ];

  $ch = curl_init($url);
  curl_setopt_array($ch, $option);
//pr($ch);

  $json    = curl_exec($ch);
  $info    = curl_getinfo($ch);
  $errorNo = curl_errno($ch);
  echo "json--";
  pr($json);
    // OK以外はエラーなので空白配列を返す
  if ($errorNo !== CURLE_OK) {
      // 詳しくエラーハンドリングしたい場合はerrorNoで確認
      // タイムアウトの場合はCURLE_OPERATION_TIMEDOUT
      return [];
  }

  // 200以外のステータスコードは失敗とみなし空配列を返す
  if ($info['http_code'] !== 200) {
      return [];
  }
    // 文字列から変換
  $jsonArray = json_decode($json, true);

  return $jsonArray;

  echo empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
  $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
  echo $protocol.'mg.'.$_SERVER['HTTP_HOST'].'/favorite/auth/';
  echo "xxx--".stz(file_get_contents($protocol.'mg.'.$_SERVER['HTTP_HOST'].'/favorite/auth/'));
  return file_get_contents($protocol.'mg.'.$_SERVER['HTTP_HOST'].'/favorite/auth/');
}

// function gt_get_main_term($postid, $taxonomy) {
//   if (class_exists('WPSEO_Primary_Term')) {
//     $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $postid);
//     $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
//     $term = get_term($wpseo_primary_term);
//     return (is_wp_error( $term )) ? get_the_terms($postid, $taxonomy)[0] : $term;
//   }
// }
function gt_get_main_term($postid, $taxonomy) {
  $term = [];
  
  $terms = get_the_terms($postid, $taxonomy);
  if (empty($terms)) { return; }

  if (class_exists('WPSEO_Primary_Term')) {
    $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $postid);
    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
    $term = get_term($wpseo_primary_term);
    //メインのタクソノミーが無い場合
    if(!is_wp_error($term)) {
      return $term; 
    } else {
      foreach ($terms as $key => $trm) {
        if($trm->parent) {
          return $trm;
        }
      }
      return $terms[0]; 
    }
  }
  return $term;
}

function get_protocol() {
  return empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
}
// function set_cookie() {
//   // echo $_SERVER['HTTP_HOST'];
//   $url = get_protocol().$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//   setcookie('redirect_url', $url,time()+60*60*24*7, "/", '.'.$_SERVER['HTTP_HOST']);
// }

// function sql_dump($query) {
//     var_dump($query);
//     return $query;
// }
// add_filter('query', 'sql_dump');

# タイトルを取得
function esd_title($args=array()) {
  $args = array_merge(['echo'=>true, 'site_title'=>true], $args);

  $title = ""; #初期化
  if (is_home()) {
    $title = "";
  } elseif(is_search()) {
    // pr($_GET);
    // $title = get_search_query()."の検索結果";
    $keyword = (!empty($_GET['s'])) ? "(キーワード)".$_GET['s'] : "";
    $area = get_term_by('slug', $_GET['area'], 'area');
    $area = ($area) ? "(エリア)".$area->name : "";
    $dish = get_term_by('slug', $_GET['dishes'], 'dishes');
    $dish = ($dish) ? "(ジャンル)".$dish->name : "";
    $options = "";
    if (isset($_GET['options'])) {
      $options = "(こだわり)";
      foreach ($_GET['options'] as $slug) {
        $options .= get_term_by('slug', $slug, 'options')->name.",";
      }
      $options = substr($options, 0, -1);
    }
    $title = $keyword." ".$area." ".$dish." ".$options;
  } elseif(is_category()) {
    $title = get_cat_name( get_query_var('cat') );
  } elseif(is_archive()) {
    $title = str_replace('アーカイブ:', '', get_the_archive_title());
  } else {
    $title = the_title_attribute(array('echo'=>false));
  }

  if ($title) {
    $title .= ($args['site_title']) ? " | ".get_bloginfo('name') : "";
  } else {
    $title .= ($args['site_title']) ? get_bloginfo('name') : "";
  }

  if ($args['echo']) {
    echo $title;
  } else {
    return $title;
  }
}

function get_og($field) {
  $og = ['image'=>'', 'description'=>''];
  if (is_single()) {
    $og['image'] = get_field('shop_main_image')['url'];
    $og['description'] = wp_strip_all_tags((get_post()->post_content) ? get_post()->post_content : get_field('messages'), true);
    // $og['description'] = preg_replace('/\n|\r|\r\n/', '', (get_post()->post_content) ? get_post()->post_content : get_field('messages'));
    // $og['description'] = get_field('messages');
  } else {
    $og['image'] = get_template_directory_uri()."/images/ogp.jpg";
    $og['description'] = get_bloginfo('description');
  }
  return $og[$field];
}

function pagination($pages = '', $range = 2, $show_only = false)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }
    if ( $show_only && $pages == 1 ) {
       // １ページのみで表示設定が true の時
       echo '<nav><ul class="pagination-classic"><li class="active"><span class="btn btn-java">1</span></li></ul></nav>';
       return;
     }
     // echo "<h1>ccccc</h1>";

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
      echo '<nav><ul class="pagination-classic">';
      //Prev：現在のページ値が１より大きい場合は表示

      if($paged > 1) echo '<li><a class="btn btn-java" href="'.get_pagenum_link($paged - 1).'">＜</a></li>';
      // if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

      for ($i=1; $i <= $pages; $i++)
      {
         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
         {
            //三項演算子での条件分岐
            echo ($paged == $i)? '<li class="active"><span class="btn btn-java">'.$i.'</span></li>':'<li><a class="btn btn-java" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
         }
      }
      //Next：総ページ数より現在のページ値が小さい場合は表示
      if ($paged < $pages) echo '<li><a class="btn btn-java" href="'.get_pagenum_link($paged + 1).'">＞</a></li>';
      echo "</ul>\n";
      echo "</nav>\n";
     }
}

// 固定ページではビジュアルエディタを使用しない
function disable_visual_editor_in_page(){
	global $typenow;
	if( $typenow == 'page' ){
		add_filter('user_can_richedit', 'disable_visual_editor_filter');
	}
}
function disable_visual_editor_filter(){
	return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );


# カスタムタクソノミーの階層構造を維持する
function term_hierarchy($taxonomy, $parent = true) {
  #get_terms & get_term_children で代用可？

  $term_hierarchy = array(); #初期化

  $args = array('taxonomy' => $taxonomy, 'hide_empty' => false, 'parent' => false, 'orderby' => 'ID');
  $taxonomies = new WP_Term_Query($args);
  foreach ($taxonomies->terms as $key => $term) {
    if($parent) { $term_hierarchy[] = $term; }
    $args = array('taxonomy' => $taxonomy, 'hide_empty' => false, 'parent' => $term->term_id, 'orderby' => 'ID');
    $terms = new WP_Term_Query($args);
    foreach ($terms->terms as $key => $term_child) {
      $term_hierarchy[] = $term_child;
    }
  }
  return $term_hierarchy;
}

# カスタムタクソノミーをソートする
function get_ordered_terms( $id = 0, $taxonomy = 'category', $orderby = 'term_id', $order = 'DESC' ) {
    $terms = get_the_terms( $id, $taxonomy );
    if ( $terms ) {
        $ordered = array();
        foreach ( $terms as $term ) {
            if ( isset( $term->$orderby ) ) {
              // $ordered[$term->$orderby] = $term;
              $ordered[] = $term;
            }
        }
        if ( strtoupper( $order ) == 'DESC' ) {
            $func = 'krsort';
        } else {
            $func = 'ksort';
        }
        $func( $ordered );
        return $ordered;
    }
}

function e($field, $array = array()) {
  if(!empty($_POST) && empty($array))    { $array = $_POST; }
  elseif(!empty($_GET) && empty($array)) { $array = $_GET; }
  return !empty($array[$field]) ? $array[$field] : false;
}

# 入力文字をサニタイズする
function stz($str, $echo = false) {
  if ($echo) {
    echo sanitize_text_field($str);
    return;
  }
  return sanitize_text_field($str);
}

// バリデーション
function validate_field($field_name, $args = array()) {
  $args = array_merge(array('empty'=>false, 'word'=>false, 'word_count'=>300, 'sanitize'=>true, 'acf-field'=>true), $args);
  $errors = array();#初期化

  if (!is_array($args)) { return false; }
  $value = (!empty($_POST[$field_name])) ? $_POST[$field_name] : false;

  //サニタイズ
  $value = ($args['sanitize']) ? sanitize_text_field($value) : $value;

  // 必須チェック
  if (!$args['empty']) {
    if(!$value) {
      if (!$args['acf-field']) {
        switch ($field_name) {
          case 'shop_name':
            $errors[$field_name][] = "「店名」が入力されていません。";
            break;
          case 'detail':
            $errors[$field_name][] = "「店名詳細」が入力されていません。";
            break;
          case 'area':
            $errors[$field_name][] = "「エリア」が選択されていません。";
            break;
          case 'dishes':
            $errors[$field_name][] = "「料理ジャンル」が選択されていません。";
            break;
          case 'options':
            $errors[$field_name][] = "「こだわり」が選択されていません。";
            break;
          case 'contact_policy':
            $errors[$field_name][] = "「プライバシーポリシーに同意する」が選択されていません。";
            break;
          case 'written_oath':
            $errors[$field_name][] = "「反社会的勢力ではないことの誓約書に同意する」が選択されていません。";
            break;
        }
      } else {
        $params = array(
            's'  => $field_name, // フィールド名は抜粋に入っているため、キーワード検索で良い
            'exact' => true, //タイトル／投稿の全体から正確なキーワードで検索するか デフォルト値はfalse
            'post_type' => 'acf-field',
        );
        $acf_field = get_posts( $params )[0];
        $errors[$field_name][] = "「".$acf_field->post_title."」が入力されていません。";
      }
    }
  }

  //文字数チェック
  if ($args['word']) {
  // if (is_numeric($args['word_count'])) {
    if($value) {
      if($args['word_count'] < mb_strlen($value, 'UTF-8')) {
        $errors[$field_name][] ="文字数が制限(".$args['word_count']."文字)を超えています。(文字数：".mb_strlen($value, 'UTF-8')."文字)";
      }
    }
  }
  return $errors;
}

function err_disp($param = array()) {
  foreach ($param as $key => $value) {
    echo "<p>".$value."</p>";
  }
}

function tmp_img($field_key) {
  $img = $_FILES[$field_key];
  $tmp = ABSPATH.'wp-content/tmp_imgs';
  if(!file_exists($tmp)) { mkdir($tmp, 0777); }
  move_uploaded_file($img['tmp_name'], $tmp.'/'.$img['name']);
  return $img['name'];
  // return home_url('wp-content/tmp_imgs').'/'.$img['name'];
}

/**
 * youtubeのURLから埋め込みタグを生成する
 *
 * @param   string $param youtubeのURL
 * @return  string        埋め込みタグ
 */
function createvideotag($param)
{
    //とりあえずURLがyoutubeのURLであるかをチェック
    if(preg_match('#https?://www.youtube.com/.*#i',$param,$matches)){
        //parse_urlでhttps://www.youtube.com/watch以下のパラメータを取得
        $parse_url = parse_url($param);
        // 動画IDを取得
        if (preg_match('#v=([-\w]{11})#i', $parse_url['query'], $v_matches)) {
            $video_id = $v_matches[1];
        } else {
            // 万が一動画のIDの存在しないURLだった場合は埋め込みコードを生成しない。
            return false;
        }
        $v_param = '';
        // パラメータにt=XXmXXsがあった時の埋め込みコード用パラメータ設定
        // t=〜〜の部分を抽出する正規表現は記述を誤るとlist=〜〜の部分を抽出してしまうので注意
        if (preg_match('#t=([0-9ms]+)#i', $parse_url['query'], $t_maches)) {
            $time = 0;
            if (preg_match('#(\d+)m#i', $t_maches[1], $minute)) {
                // iframeでは正の整数のみ有効なのでt=XXmXXsとなっている場合は整形する必要がある。
                $time = $minute[1]*60;
            }
            if (preg_match('#(\d+)s#i', $t_maches[1], $second)) {
                $time = $time+$second[1];
            }
            if (!preg_match('#(\d+)m#i', $t_maches[1]) && !preg_match('#(\d+)s#i', $t_maches[1])) {
                // t=(整数)の場合はそのままの値をセット ※秒数になる
                $time = $t_maches[1];
            }
            $v_param .= '?start=' . $time;
        }
        // パラメータにlist=XXXXがあった時の埋め込みコード用パラメータ設定
        if (preg_match('#list=([-\w]+)#i', $parse_url['query'], $l_maches)) {
            if (!empty($v_param)) {
                // $v_paramが既にセットされていたらそれに続ける
                $v_param .= '&list=' . $l_maches[1];
            } else {
                // $v_paramが既にセットされていなかったら先頭のパラメータとしてセット
                $v_param .= '?list=' . $l_maches[1];
            }
        }
        // 埋め込みコードを返す
        // (関連動画を非表示)
        return '<iframe src="https://www.youtube.com/embed/' . $video_id . $v_param . '?loop=1&playlist='.$video_id.'" frameborder="0" allowfullscreen></iframe>';
        // return '<iframe width="600" height="338" src="https://www.youtube.com/embed/' . $video_id . $v_param . '" frameborder="0" allowfullscreen></iframe>';
    }
    // パラメータが不正(youtubeのURLではない)ときは埋め込みコードを生成しない。
    return false;
}

function get_youtube_id($param) {
  if(!preg_match('#https?://www.youtube.com/.*#i',$param,$matches)){
    return false;
  }

  //parse_urlでhttps://www.youtube.com/watch以下のパラメータを取得
  $parse_url = parse_url($param);
  // 動画IDを取得
  if (preg_match('#v=([-\w]{11})#i', $parse_url['query'], $v_matches)) {
    return $v_matches[1];
  }
  // 万が一動画のIDの存在しないURLだった場合は埋め込みコードを生成しない。
  return false;

}


#店舗（カスタム投稿）メニュー追加
function init_custom_post_shops() {
    # カスタム投稿
    $labels = array(
    	'name' => '店舗',
    	'singular_name' => '店舗',
    	'add_new' => '新しい店舗',
    	'add_new_item' => '新しい店舗を追加',
    	'edit_item' => '店舗を編集',
    	'new_item' => '新しい店舗を追加',
    	'search_items' => '店舗を検索',
    	'view_item' => '店舗を表示',
    );
    $args = array(
    	'labels' => $labels,
    	'publicly_queryable' => true,
    	'capability_type' => 'post',
    	'public' => true,
      'exclude_from_search' => true,
    	'rewrite' => true,
    	'has_archive' => true,
    	'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' ),
    	//'register_meta_box_cb' => 'meta_box_cb_tool',
    	'taxonomies' => array( 'area', 'dishes' ),
    	'show_ui' => true,
    	'menu_position' => 5,
    );
    register_post_type( 'shops', $args );
    // flush_rewrite_rules( false );

    register_taxonomy(
        'area',
        'shops',
        array(
            'hierarchical' => true,
            'label' => 'エリア',
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'singular_label' => 'エリア'
        )
    );
    register_taxonomy(
        'dishes',
        'shops',
        array(
            'hierarchical' => true,
            'label' => '料理ジャンル',
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'singular_label' => '料理ジャンル'
        )
    );
    register_taxonomy(
        'options',
        'shops',
        array(
            'hierarchical' => true,
            'label' => 'こだわり',
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'singular_label' => 'こだわり'
        )
    );

}
add_action('init', 'init_custom_post_shops');

#店舗（カスタム投稿）メニュー追加
function init_custom_post_shop_update() {
    # カスタム投稿
    $labels = array(
    	'name' => '更新依頼',
    	'singular_name' => '更新依頼',
    	'add_new' => '新しい更新依頼',
    	'add_new_item' => '新しい更新依頼を追加',
    	'edit_item' => '更新依頼を編集',
    	'new_item' => '新しい更新依頼を追加',
    	'search_items' => '更新依頼を検索',
    	'view_item' => '更新依頼を表示',
    );
    $args = array(
    	'labels' => $labels,
    	'publicly_queryable' => true,
    	'capability_type' => 'post',
    	'public' => true,
      'exclude_from_search' => true,
    	'rewrite' => true,
    	'has_archive' => true,
    	'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' ),
    	//'register_meta_box_cb' => 'meta_box_cb_tool',
    	'taxonomies' => array( 'area', 'dishes', 'options' ),
    	'show_ui' => true,
    	'menu_position' => 5,
    );
    register_post_type( 'shop_update', $args );

}
add_action('init', 'init_custom_post_shop_update');


##################################
#
# 更新依頼メニュー追加
#
##################################
function shop_update($id, $post) {
    // error_log(date('Y/m/d H:i:s'));
    // error_log( print_r( $post, true ) );
    // echo '<script>console.log("remove_action -- '.__LINE__.'")</script>';

    #############################
    #
    # 更新依頼以外の処理は、停止する。
    # ユーザ新規店舗登録も停止。
    #############################
    if ($post->post_type != 'shop_update') {
      # 更新依頼じゃない場合、終了
      return;
    }
    if (($post->post_type == 'shop_update') && $post->post_status == 'pending') {
      # 更新依頼でも、外部店舗登録フォームの場合、終了
      return;
    }

    # 無限ループを回避する為、フックを一度外す
    if ($post->post_type == 'shop_update' && $post->post_status == 'publish') {
      remove_action( 'save_post', 'shop_update' );
    }

    # 更新データ取得
    $update_fields = get_fields($id);

    # メインの店舗IDを取得し、更新除外フィールドを消す
    $main_post_id = trim($update_fields['main_post_id']);
    foreach (['del_flg', 'main_post_id'] as $value) {
        unset($update_fields[$value]);
    }

    # 投稿を更新する
    $my_post = array(
      'ID'           => $main_post_id,
      'post_title'   => $post->post_title,
      'post_content' => $post->post_content,
    );
    wp_update_post($my_post);

    # タクソノミーの更新
    $areas = get_the_terms($id,'area');
    if(!empty($areas)) {
      foreach ($areas as $key => $area) {
        $new_areas[] =$area->term_id;
      }
      wp_set_object_terms($main_post_id, $new_areas, 'area');
    }
    $dishes = get_the_terms($id,'dishes');
    if(!empty($dishes)) {
      foreach ($dishes as $key => $dishe) {
        $new_dishes[] =$dishe->term_id;
      }
      wp_set_object_terms($main_post_id, $new_dishes, 'dishes');
    }
    $options = get_the_terms($id,'options');
    if(!empty($options)) {
      foreach ($options as $key => $option) {
        $new_options[] =$option->term_id;
      }
      wp_set_object_terms($main_post_id, $new_options, 'options');
    }
    
    # カスタムフィールドの更新
    $ar = array();
    foreach ($update_fields as $key => $value) {
      if(!empty($value)) {
        if((in_array($key, ['payments', 'coronas']))) {
          foreach ($value as $k => $val) {
            $ar[] = $val['value'];
          }
          $value = $ar;
        }
        update_field($key, $value, $main_post_id);
      }
    }

// exit;
    return;
}
add_action('save_post', 'shop_update', 10, 3 );
// add_action('publish_shop_update', 'shop_update', 10, 3 );


function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyChamewuHdX5HFMSEPcxIyBF1bE2N0GHV8';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
?>
