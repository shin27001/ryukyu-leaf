<?php get_header(); ?>
<?php get_header('sub'); ?>
<div class="content-wrap">
  <div class="form-page__title">
    <h1 class="main-title">入力内容の確認</h1>
    <p class="sub-text mb-2">下記のフォームにて内容をご入力をご確認のうえ、<span class="d-inline">「送信する」ボタンを押してください。</span></p>
  </div>
  <div class="content-inner">
    <div class="l-form">
      <h2 class="l-fome__title">掲載内容</h2>
      <table class="l-info__table">
        <tr>
          <th>掲載内容</th>
          <td><?php echo e('request') == 'update' ? '更新依頼' : '新規登録'; ?></td>
        </tr>
      </table>
      <h2 class="l-fome__title">ご担当者様情報</h2>
      <table class="l-info__table">
        <tr>
          <th>ご担当者様情報</th>
          <td><?php stz(e('tanto_name'), true); ?></td>
        </tr>
        <tr>
          <th>メールアドレス<span class="small-text">（半角英数字）</span></th>
          <td><?php stz(e('tanto_mail'), true); ?></td>
        </tr>
        <tr>
          <th>店名</th>
          <td><?php stz(e('shop_name'), true); ?></td>
        </tr>
        <tr>
          <th>店舗詳細</th>
          <td><?php stz(e('detail'), true); ?></td>
        </tr>
        <tr>
          <th>電話番号<span class="small-text">（ご連絡先・半角数字ハイフンなし） </span></th>
          <td><?php stz(e('tanto_tel'), true); ?></td>
        </tr>
        <tr>
          <th>FAX番号<span class="small-text">（FAX番号・半角数字ハイフンなし） </span></th>
          <td><?php stz(e('tanto_fax'), true); ?></td>
        </tr>
      </table>


      <h2 class="l-fome__title">店舗情報</h2>
      <table class="l-info__table">
        <tr>
          <th>店名</th>
          <td><?php stz(e('shop_name'), true); ?></td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td><?php stz(e('zip_code'), true); ?></td>
        </tr>
        <tr>
          <th>住所</th>
          <td><?php stz(e('address'), true); ?></td>
        </tr>
        <tr>
          <th>ジャンルを選択</th>
          <td>
            <?php if (e('dishes')) : foreach (e('dishes') as $key => $value) : ?>
                <?php echo get_term_by('slug', $value, 'dishes')->name . "／"; ?>
            <?php endforeach;
            endif; ?>
          </td>
        </tr>
        <tr>
          <th>主なメニュー<span class="small-text">（300文字以内）</span></th>
          <td><?php stz(e('menu'), true); ?></td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td><?php stz(e('tel_no'), true); ?></td>
        </tr>
        <tr>
          <th>営業時間</th>
          <td><?php stz(e('hours'), true); ?></td>
        </tr>
        <tr>
          <th>駐車場</th>
          <td><?php stz(e('parking'), true); ?></td>
        </tr>
        <tr>
          <th>定休日</th>
          <td><?php stz(e('holiday'), true); ?></td>
        </tr>
        <tr>
          <th>席数</th>
          <td><?php stz(e('seats'), true); ?></td>
        </tr>
        <tr>
          <th>公式ホームページ（URL）</th>
          <td><?php stz(e('url'), true); ?></td>
        </tr>
        <tr>
          <th>Facebookアカウント（URL）</th>
          <td><?php stz(e('fb'), true); ?></td>
        </tr>
        <tr>
          <th>Twitterアカウント（URL）</th>
          <td><?php stz(e('tw'), true); ?></td>
        </tr>
        <tr>
          <th>Instagramアカウント（URL）</th>
          <td><?php stz(e('insta'), true); ?></td>
        </tr>
        <tr>
          <th>LINE公式アカウント（URL）</th>
          <td><?php stz(e('line'), true); ?></td>
        </tr>
        <tr>
          <th>備考</th>
          <td></td>
        </tr>
        <tr>
          <th>こだわり<span class="small-text">（複数選択可）</span></th>
          <td>
            <?php if (e('options')) : foreach (e('options') as $key => $value) : ?>
                <?php echo get_term_by('slug', $value, 'options')->name . "／"; ?>
            <?php endforeach;
            endif; ?>
          </td>
        </tr>
        <tr>
          <th>テイクアウト時間・メニュー</th>
          <td><?php stz(e('takeout_message'), true); ?></td>
        </tr>
        <tr>
          <th>デリバリー対応地域・受付時間</th>
          <td><?php stz(e('delivery_message'), true); ?></td>
        </tr>
        <tr>
          <th>対応カードの種類について</th>
          <td>
            <?php $payments = get_field_object('payments', choices_id()); ?>
            <?php if (e('payments')) : foreach (e('payments') as $value) : ?>
                <?php
                foreach ($payments['choices'] as $key => $payment) {
                  if ($value == $key) echo $payment . "／";
                }
                ?>
            <?php endforeach;
            endif; ?>
          </td>
        </tr>
        <tr>
          <th>現金以外のお支払い方法について<span class="small-text">（上記以外の電子マネーなど）</span></th>
          <td><?php stz(e('payments_other'), true); ?></td>
        </tr>
        <tr>
          <th>コロナ対策について<span class="small-text">（複数選択可）</span></th>
          <td>
            <?php $coronas = get_field_object('coronas', choices_id()); ?>
            <?php if (e('coronas')) : foreach (e('coronas') as $value) : ?>
                <?php
                foreach ($coronas['choices'] as $key => $corona) {
                  if ($value == $key) echo $corona . "／";
                }
                ?>
            <?php endforeach;
            endif; ?>
          </td>
        </tr>
        <tr>
          <th>コロナ対策について<span class="small-text">（上記以外の取り組みなど）</span></th>
          <td><?php stz(e('coronas_other'), true); ?></td>
        </tr>
      </table>
      <?php
      // pr($_FILES);
      ?>
      <h2 class="l-fome__title">掲載動画</h2>
      <table class="l-info__table">
        <tr>
          <th>掲載動画</th>
          <td>
            <?php echo createvideotag(e('youtube')); ?>
          </td>
        </tr>
      </table>

      <h2 class="l-fome__title">掲載画像</h2>
      <table class="l-info__table">
        <tr>
          <th>店舗の写真やロゴ画像</th>
          <td>
            <?php if ($_FILES['shop_main_image']['name']) : ?>
              <?php $img['shop_main_image'] = tmp_img('shop_main_image'); ?>
              <img src="<?php echo get_tmp_img_dir() . $img['shop_main_image']; ?>" width="300px" alt="">
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>掲載画像１<span class="small-text">（外観や座席などその他掲載希望される画像）</span></th>
          <td>
            <?php if ($_FILES['shop_image1']['name']) : ?>
              <?php $img['shop_image1'] = tmp_img('shop_image1'); ?>
              <img src="<?php echo get_tmp_img_dir() . $img['shop_image1']; ?>" width="300px" alt="">
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>掲載画像2<span class="small-text">（外観や座席などその他掲載希望される画像）</span></th>
          <td>
            <?php if ($_FILES['shop_image2']['name']) : ?>
              <?php $img['shop_image2'] = tmp_img('shop_image2'); ?>
              <img src="<?php echo get_tmp_img_dir() . $img['shop_image2']; ?>" width="300px" alt="">
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>掲載画像3<span class="small-text">（料理やドリンクの写真その他掲載希望される画像）</span></th>
          <td>
            <?php if ($_FILES['shop_image3']['name']) : ?>
              <?php $img['shop_image3'] = tmp_img('shop_image3'); ?>
              <img src="<?php echo get_tmp_img_dir() . $img['shop_image3']; ?>" width="300px" alt="">
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>掲載画像4<span class="small-text">（料理やドリンクの写真その他掲載希望される画像）</span></th>
          <td>
            <?php if ($_FILES['shop_image4']['name']) : ?>
              <?php $img['shop_image4'] = tmp_img('shop_image4'); ?>
              <img src="<?php echo get_tmp_img_dir() . $img['shop_image4']; ?>" width="300px" alt="">
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>当サイトへのその他のご要望や依頼</th>
          <td><?php stz(e('request_message'), true); ?></td>
        </tr>
      </table>

      <?php $_POST = (!empty($img)) ? array_merge($_POST, $img) : $_POST; ?>
      <div class="submit__btn">
        <div class="submit__btnTop">
          <div class="l-form__button-back">
            <form method="POST" id="registform" action="<?php echo esc_url(home_url('entry-form')); ?>" enctype="multipart/form-data">
              <input type="hidden" name="request" value="<?php echo e('request', $_POST); ?>">
              <input type="hidden" name="post_all" value='<?php echo base64_encode(serialize($_POST)); ?>'>
              <input type="submit" name="submitBack" value="戻る" class="btn btn-m-gray">
            </form>
          </div>
          <div class="l-form__button-submit">
            <form method="POST" id="registform" action="<?php echo esc_url(home_url('entry-regist')); ?>" enctype="multipart/form-data">
              <input type="hidden" name="post_all" value="<?php echo base64_encode(serialize($_POST)); ?>">
              <input type="submit" name="submitSend" value="送信する" class="btn btn-m-red">
            </form>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
<?php get_footer(); ?>