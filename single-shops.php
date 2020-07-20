<?php get_header(); ?>
<?php get_header('sub'); ?>
<div class="content-wrap">
  <div class="content-inner">

    <!-- Search Form -->
    <?php get_template_part('tpl', 'search'); ?>

    <div class="l-info">
      <div class="l-info__main">
        <div class="l-info__top">
          <ul class="l-info__cate">
            <?php $dishes = get_the_terms(get_the_ID(), 'dishes'); ?>
            <?php if ($dishes) : foreach ($dishes as $dish) : ?>
                <li class="l-info__cate-list <?php the_field('class', "dishes_" . $dish->term_id); ?>"><?php echo $dish->name; ?></li>
            <?php endforeach;
            endif; ?>
          </ul>
          <h1 class="l-info__name"><?php echo $post->post_title; ?></h1>
          <p class="l-info__area">
            <?php $areas = get_the_terms($post->ID, 'area'); ?>
            <?php if ($areas) : foreach ($areas as $area) : ?>
                <?php echo ($area->parent) ? '<i class="fas fa-map-marker-alt"></i> ' . $area->name : ""; ?>
                <!-- <i class="fas fa-map-marker-alt"></i><?php echo $area->name; ?> -->
            <?php endforeach;
            endif; ?>
          </p>
          <p class="l-info__kodawari">
            <i class="far fa-check-circle"></i>
            <?php $options = get_the_terms($post->ID, 'options'); ?>
            <?php if ($options) : foreach ($options as $option) : ?>
                <?php echo $option->name . "/"; ?>
            <?php endforeach;
            endif; ?>
          </p>
          <div class="l-tel-pc">
            <p class="l-tel-pc__title">ご予約・ご注文はこちらから</p>
            <div class="btn-wrap">
              <a href="tel:<?php the_field('tel_no'); ?>" class="btn btn-m-red"><i class="fas fa-phone-alt"></i> <?php the_field('tel_no'); ?></a>
            </div>
            <?php //echo $_SERVER['HTTP_HOST']; echo get_auth(); ?>
            <!-- <a href="http://mg.rlf.local/favorite/<?php echo (strpos(ABSPATH, 'okinawa')) ? "okinawa" : "kyoto"; ?>/<?php echo $post->ID; ?>/<?php echo $post->post_name; ?>" onClick="return false;">お気に入りに追加</a> -->
          </div>
          <!-- /l-tel-pc -->
        </div>
        <!-- /l-info__top -->

        <?php $shop_images = ""; ?>
        <?php if (have_rows('shop_images')) : while (have_rows('shop_images')) : the_row(); ?>
            <?php
            $shop_img = get_sub_field('shop_image');
            $title = (get_sub_field('shop_image_title')) ? get_sub_field('shop_image_title') : $shop_img['title'];
            $shop_images .= '<li><img src="' . $shop_img['sizes']['large'] . '" alt="' . $title . '"></li>' . "¥n";
            ?>
        <?php endwhile;
        endif; ?>
        <div class="l-info__slide">
          <ul class="l-info__slid-thum">
            <?php echo $shop_images; ?>
          </ul>
          <ul class="l-info__slid-nav">
            <?php echo $shop_images; ?>
          </ul>
        </div>
        <!-- /l-info__img -->
      </div>
      <!-- /l-info__main -->
      <div class="l-info__korona">
        <h2><span class="marker">新型コロナウイルス<br class="br-sp">感染症拡大防止に関して</span></h2>
        <div class="l-info__korona-wrap">
          <div class="l-info__korona-box">
            <p class="l-info__korona-sub">［ 基本の取り組み ］</p>
            <ul class="l-info__korona-list">
              <?php $coronas =  get_field('coronas'); ?>
              <?php if ($coronas) : foreach ($coronas as $corona) : ?>
                  <li><?php echo $corona['label']; ?></li>
              <?php endforeach;
              endif; ?>
            </ul>
          </div>
          <!-- /l-info__korona-box -->
          <div class="l-info__korona-box">
            <p class="l-info__korona-sub">［ その他の取り組み ］</p>
            <p class="l-info__korona-comme"><?php the_field('coronas_other'); ?></p>
          </div>
          <!-- /l-info__korona-box -->
        </div>
        <!-- /l-info__korona-wrap -->
      </div>
      <!-- /l-info__korona -->
      <?php if (get_field('messages')) : ?>
        <div class="l-info__message">
          <h2 class="l-info__h2title"><i class="fas fa-user c-red"></i> お店からのメッセージ</h2>
          <p class="l-info__message-text"><?php the_field('messages'); ?></p>
        </div>
      <?php endif; ?>
      <!-- /l-info__message -->

      <div class="l-info__basic">
        <h2 class="l-info__h2title"><i class="fas fa-store c-red"></i> 店舗基本情報</h2>
        <?php if (get_field('youtube')) : ?>
          <div class="l-info__video"><?php echo wp_oembed_get(get_field('youtube')); ?></div>
        <?php endif; ?>
        <table class="l-info__table">
          <tr>
            <th>店名</th>
            <td><?php the_title(); ?></td>
          </tr>
          <tr>
            <th>住所</th>
            <td>〒<?php the_field('zip_code'); ?>　<?php the_field('address'); ?><br>
              <div class="mapbtn"><a href="https://maps.google.co.jp/maps/search/<?php the_field('address'); ?>" class="btn btn-m-red" target="blank">Google Mapへ</a></div>
            </td>
          </tr>
          <?php if (get_field('map_code')) : ?>
            <tr>
              <th>MAPコード<span class="small-text">（※カーナビに番号をいれると地図が表示されます）</span></th>
              <td><?php the_field('map_code'); ?></td>
            </tr>
          <?php endif; ?>
          <tr>
            <th>駐車場</th>
            <td><?php the_field('parking'); ?></td>
          </tr>
          <tr>
            <th>主なメニュー</th>
            <td><?php the_field('menu'); ?></td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td><a href="tel:<?php the_field('tel_no'); ?>"><?php the_field('tel_no'); ?></a></td>
          </tr>
          <tr>
            <th>営業時間</th>
            <td><?php the_field('hours'); ?></td>
          </tr>
          <tr>
            <th>定休日</th>
            <td><?php the_field('holiday'); ?></td>
          </tr>
          <tr>
            <th>席数</th>
            <td><?php the_field('seats'); ?></td>
          </tr>
          <?php if (get_field('takeout_message')) : ?>
            <tr>
              <th>テイクアウト時間・メニュー</th>
              <td><?php the_field('takeout_message'); ?></td>
            </tr>
          <?php endif; ?>
          <?php if (get_field('delivery_message')) : ?>
            <tr>
              <th>デリバリー対応地域・受付時間</th>
              <td><?php the_field('delivery_message'); ?></td>
            </tr>
          <?php endif; ?>
          <?php if (get_field('url')) : ?>
            <tr>
              <th>公式HP</th>
              <td><?php the_field('url'); ?></td>
            </tr>
          <?php endif; ?>
          <?php if ((!empty(get_field('insta'))) || (!empty(get_field('fb'))) || (!empty(get_field('tw'))) || (!empty(get_field('line')))) : ?>
            <tr>
              <th>SNS</th>
              <td class="sns-link">
                <?php if (get_field('insta')) : ?><a href="<?php the_field('insta'); ?>" target="blank"><i class="fab fa-instagram"></i> Instagramはこちら</a><?php endif; ?>
                <?php if (get_field('fb')) : ?><a href="<?php the_field('fb'); ?>" target="blank"><i class="fab fa-facebook"></i> facebookはこちら</a><?php endif; ?>
                <?php if (get_field('tw')) : ?><a href="<?php the_field('tw'); ?>" target="blank"><i class="fab fa-twitter"></i> Twitterはこちら</a><?php endif; ?>
                <?php if (get_field('line')) : ?><a href="<?php the_field('line'); ?>" target="blank"><i class="fab fa-line"></i> Lineはこちら</a><?php endif; ?>
              </td>
            </tr>
          <?php endif; ?>
          <?php if (get_field('payments')) : ?>
            <tr>
              <th>現金以外のお支払い方法</th>
              <td>
                <?php $payments = get_field('payments'); ?>
                <?php if ($payments) : foreach ($payments as $payment) : ?>
                    <?php echo $payment['label'] . "/"; ?>
                <?php endforeach;
                endif; ?>
              </td>
            </tr>
          <?php endif; ?>
          <?php if (get_field('payments_other')) : ?>
            <tr>
              <th>その他のお支払い方法</th>
              <td>
                <?php the_field('payments_other'); ?>
              </td>
            </tr>
          <?php endif; ?>
          <tr class="last">
            <th>こだわり</th>
            <td>
              <?php $options = get_the_terms($post->ID, 'options'); ?>
              <?php if ($options) : foreach ($options as $key => $option) : ?>
                  <?php echo $option->name . "/"; ?>
              <?php endforeach;
              endif; ?>
            </td>
          </tr>
        </table>
        <!-- /l-info__table -->
      </div>
      <!-- /l-info__basic -->
    </div>
    <!-- /content-inner -->

    <div class="l-tel">
      <p class="l-tel__title">ご予約・ご注文はこちらから</p>
      <div class="btn-wrap">
        <a href="tel:<?php the_field('tel_no'); ?>" class="btn"><i class="fas fa-phone-alt"></i> <?php the_field('tel_no'); ?></a>
      </div>
    </div>
    <!-- /l-tel -->
  </div>
</div>
<?php get_footer('sns'); ?>
<?php get_footer('regist'); ?>
<?php get_footer(); ?>