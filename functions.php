<?php

# アイキャッチ画像を有効にする。
//add_theme_support('post-thumbnails');


function pr($arg) {
  if (!empty($arg)) {
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
  }
}

# タイトルを取得
function esd_title( $arg=array('echo'=>true) ) {
  if (is_home()) {
    $title = "Home";
  } elseif(is_search()) {
    $title = get_search_query()."の検索結果";
  } elseif(is_category()) {
    $title = get_cat_name( get_query_var('cat') );
  } elseif(is_archive()) {
    $title = get_the_archive_title();
  } else {
    $title = the_title_attribute(array('echo'=>false));
  }

  if ($arg['echo']) {
    echo $title;
  } else {
    return $title;
  }
}

function pagination($pages = '', $range = 2, $show_only = true)
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
function term_hierarchy($taxonomy) {
  $term_hierarchy = array();
  $args = array('taxonomy' => $taxonomy, 'hide_empty' => false, 'parent' => false, 'orderby' => 'ID');
  $taxonomies = new WP_Term_Query($args);

  foreach ($taxonomies->terms as $key => $term) {
    $term_hierarchy[] = $term;
    $args = array('taxonomy' => $taxonomy, 'hide_empty' => false, 'parent' => $term->term_id);
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

# 入力文字をサニタイズする
function stz($str) {
  return sanitize_text_field($str);
}

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
