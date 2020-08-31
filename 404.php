<?php get_header(); ?>
<?php get_header('sub'); ?>
<div class="content-wrap">
  <div class="content-inner">
    <h2>404 Not Found（ページが見つかりませんでした）</h2>
    <p>指定された以下のページは存在しないか、または移動した可能性があります。</p>
    <p class="error_url">URL ：<span><?php echo get_pagenum_link(); ?></span></p>
    <p>現在表示する記事がありません。よろしければ、検索ボックスにお探しのコンテンツに該当するキーワードを入力して下さい。</p>

    <p class="mt-20 mb-20"><a href="<?php echo home_url(); ?>"><i class="fas fa-external-link-alt"></i> トップページへ</a></p>

    <!-- Search Form -->
    <?php get_template_part('tpl', 'search'); ?>
    <!-- ShopList New -->
    <?php get_template_part('tpl', 'shoplistnew'); ?>
  </div>
</div>
<?php get_footer(); ?>