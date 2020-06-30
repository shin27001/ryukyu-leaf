<?php acf_form_head(); ?>
<?php get_header(); ?>
<div class="page">


  <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="hidden" name="post_type" value="shops">
    <input type="text" name="area" value="pref">
    <input type="text" name="dishes" value="">

    <input type="search" class="hidden-search-field" name="s" value="<?php echo get_search_query(); ?>" />
    　<input type="submit" value="検索する">
  </form>

  <?php
  // $args = array(
  //     'meta_key'  => 'payments',      // フィールド名は抜粋に入っているため、キーワード検索で良い
  //     'post_type' => 'acf-field',
  // );
  // $acf_fields = get_posts( $args )[0];
  // print_r($acf_fields);

  // acf_form(array(
  //     "post_id" => "new_post",
  //     "post_title" => true,
  //     "post_content" => true,
  //     "updated_message" => "投稿を作成しました！"
  // ));

  // $acf_fields = get_post( 109 );
  // // $acf_fields = get_post( 17 );
  // print_r($acf_fields);
  //
  // var_dump(unserialize($acf_fields->post_content));
  // var_dump(json_decode($acf_fields->post_content));
  // print_r($acf_fields->post_content);


  // $week = get_field_object('payments');
  // echo '<pre>';
  // var_dump($week);
  // echo '</pre>';
  ?>


</div>
<?php get_footer(); ?>