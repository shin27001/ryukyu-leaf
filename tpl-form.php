<?php
if (e('post_all')) {
  # 修正
  $data = unserialize(base64_decode(e('post_all')));
  // pr($data);
} elseif ($_POST) {
  # 更新依頼
  $data = $_POST;
} else {

  # 新規登録
  // $p = 'YTozMDp7czoxMDoidGFudG9fbmFtZSI7czoxMzoi55Sw5LitIOWkqumDjiI7czoxMDoidGFudG9fbWFpbCI7czoxNjoibWFpbEBleGFtcGxlLmNvbSI7czo5OiJ0YW50b190ZWwiO3M6MTA6IjA5ODAwMDExMTEiO3M6OToic2hvcF9uYW1lIjtzOjI3OiLjgaHjgovjgZDjgo7jg7zjgIDljJfosLflupciO3M6ODoiemlwX2NvZGUiO3M6ODoiOTA0LTAwMDEiO3M6NzoiYWRkcmVzcyI7czoyOToi5rKW57iE55yM5YyX6LC355S65qGR5rGfMS0xLTEiO3M6NDoiYXJlYSI7czo2OiJrZW5jaG8iO3M6NjoiZGlzaGVzIjthOjI6e2k6MDtzOjI6IndhIjtpOjE7czozOiJ5b3UiO31zOjQ6Im1lbnUiO3M6NjU6IuODn+ODg+OCr+OCueOBneOBsA0K77yI5aSn77yJODMw5YaG77yI5Lit77yJNzMw5YaG77yI5bCP77yJNTMw5YaGIjtzOjY6InRlbF9ubyI7czoxMDoiMDk4MDAwMTExMSI7czo1OiJob3VycyI7czo0Nzoi5pyI772e6YeRIDEy77yaMDDvvZ4xNO+8mjAw44CBMTjvvJowMO+9njI077yaMDAiO3M6NzoicGFya2luZyI7czo2OiIxMDDlj7AiO3M6NzoiaG9saWRheSI7czo5OiLmnKjmm5zml6UiO3M6NToic2VhdHMiO3M6NDI6IjEwMOW4reOAgeODhuODvOODluODq+W4reOAgeOCq+OCpuODs+OCv+ODvCI7czo4OiJtYXBfY29kZSI7czoxMzoiMzMgNTkyIDM1MCo2NCI7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vd3d3Lnh4eHh4LmpwIjtzOjI6ImZiIjtzOjI2OiJodHRwczovL2ZhY2Vib29rLmNvbS94eHh4eCI7czoyOiJ0dyI7czoyNToiaHR0cHM6Ly90d2l0dGVyLmNvbS94eHh4eCI7czo1OiJpbnN0YSI7czoyNzoiaHR0cHM6Ly9pbnN0YWdyYW0uY29tL3h4eHh4IjtzOjQ6ImxpbmUiO3M6MjI6Imh0dHBzOi8vbGluZS5jb20veHh4eHgiO3M6NzoibWVzc2FnZSI7czo4Mzoi55CJ55CDTEVBRuOCkuOBv+OBpuadpeW6l+OBl+OBpuOBj+OCjOOBn+aWueOBq+OBr+ODieODquODs+OCrzHmna/jg5fjg6zjgrzjg7Pjg4jvvIEiO3M6Nzoib3B0aW9ucyI7YToyOntpOjA7czo3OiJ0YWtlb3V0IjtpOjE7czo4OiJkZWxpdmVyeSI7fXM6MTU6InRha2VvdXRfbWVzc2FnZSI7czoxMDA6IiAgICAgICAgICAgICAgICAgIOS6iOe0hOWPl+S7mO+8mjE1OjAw44CcMTg6MDANCuWPl+OBkea4oeOBl+aZgumWk++8mjE1OjAw44CcMTk6MDANCiAgICAgICAgICAgICAgICAiO3M6MTY6ImRlbGl2ZXJ5X21lc3NhZ2UiO3M6MTkyOiIgICAgICAgICAgICAgICAgICDlr77lv5zlnLDln5/vvJrlrpzph47mub7luILlhoXjga7jgb/vvIgxNDowMOOBvuOBp+OBruazqOaWh+OBq+mZkOOCiuOBvuOBme+8iQ0K5LqI57SE5Y+X5LuY77yaMTU6MDDjgJwxNzowMO+8iDHmmYLjgbvjganjgYrmmYLplpPjgpLjgYTjgZ/jgaDjgY3jgb7jgZnjgILvvIkNCiAgICAgICAgICAgICAgICAiO3M6NzoiY29yb25hcyI7YToyOntpOjA7czoxOiIwIjtpOjE7czoxOiIxIjt9czoxMzoiY29yb25hc19vdGhlciI7czo4Nzoi44Gd44Gu5LuW44Kz44Ot44OK5a++562W44Gr5Y+W44KK57WE44KT44Gn44GE44KL44GT44Go44GM44GC44KM44Gw44GU5YWl5Yqb44GP44Gg44GV44GEIjtzOjc6InlvdXR1YmUiO3M6MDoiIjtzOjE1OiJyZXF1ZXN0X21lc3NhZ2UiO3M6MTQ0OiLlvZPjgrXjgqTjg4jjgbjjga7jgZ3jga7ku5bjga7jgZTopoHmnJvjgoTkvp3poLzlvZPjgrXjgqTjg4jjgbjjga7jgZ3jga7ku5bjga7jgZTopoHmnJvjgoTkvp3poLzlvZPjgrXjgqTjg4jjgbjjga7jgZ3jga7ku5bjga7jgZTopoHmnJvjgoTkvp3poLwiO3M6MTQ6ImNvbnRhY3RfcG9saWN5IjtzOjQ6InRydWUiO3M6MTI6IndyaXR0ZW5fb2F0aCI7czo0OiJ0cnVlIjt9';
  // $data = unserialize(base64_decode($p));
  // $data = array_merge(array('request' => 'regist'), $data);

  $data = array('request' => 'regist'); #初期化

}
$checked = ""; #初期化

global $validate_errors;
$error = $validate_errors;
?>
<?php if (e('request', $data) != 'update') : ?>
  <h2 class="l-form__title">掲載内容</h2>
  <div class="l-form__radio">
    <span class="l-form__radio-btn">
      <label for="request-1">
        <?php $checked = (e('request', $data) == 'regist') || empty(e('request', $data)) ? 'checked="checked"' : ""; ?>
        <input type="radio" name="request" value="regist" id="request-1" <?php echo $checked; ?>>
        <span class="l-form__radio-text">新規登録</span>
      </label>
    </span>
    <span class="l-form__radio-btn">
      <label for="request-2">
        <?php $checked = e('request', $data) == 'update' ? 'checked="checked"' : ""; ?>
        <input type="radio" name="request" value="update" id="request-2" <?php echo $checked; ?>>
        <span class="l-form__radio-text">更新依頼</span>
      </label>
    </span>
  </div>
  <p class="sub-text">内容更新の場合は [更新] をお選びください。変更の必要のない項目は空のままでご入力ください。<br>その場合でも、ご担当者様情報は必ず入力をお願いします。</p>
<?php endif; ?>
<!-- Search Form -->
<div class="searchOff">
  <?php get_template_part('tpl', 'search'); ?>
</div>
<form method="POST" id="registform" action="<?php echo esc_url(home_url('entry-validation')); ?>" enctype="multipart/form-data">
  <input type="hidden" name="request" value="<?php echo (e('request', $data) != 'update') ? 'regist' : 'update'; ?>">
  <?php
    $gohan_token = base64_encode(openssl_random_pseudo_bytes(32));
    $_SESSION['gohan_token'] = $gohan_token;
  ?>
  <input type="hidden" name="gohan_token" value="<?php echo $gohan_token; ?>">
  <?php echo (e('main_post_id', $data)) ? '<input type="hidden" name="main_post_id" value="' . e('main_post_id', $data) . '">' : ''; ?>
  <div class="l-form">
    <?php if(e('request', $data) == 'update') : ?><p class="sub-text entry-form-font-md">変更したい箇所のみご入力ください。</p><?php endif; ?>
    <h2 class="l-form__title">ご担当者様情報</h2>
    <!-- 担当者名 -->
    <dl>
      <dt><label class="l-form__label" for="tanto_name">ご担当者名 <span class="form-require">必須</span>
        </label></dt>
      <dd class="l-form__action">
        <input type="text" name="tanto_name" id="tanto_name" class="form-control" size="60" value="<?php echo e('tanto_name', $data); ?>" placeholder="例: 田中 太郎" />
        <?php if (e('tanto_name', $error)) : ?><div class="validate-text"><?php echo err_disp(e('tanto_name', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- メールアドレス -->
      <dt>
        <label class="l-form__label" for="tanto_mail">
          メールアドレス（半角英数字）
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="email" name="tanto_mail" id="tanto_mail" class="mail" size="60" value="<?php echo e('tanto_mail', $data); ?>" placeholder="例：mail@example.com" data-conv-half-alphanumeric="true" />
        <?php if (e('tanto_mail', $error)) : ?><div class="validate-text"><?php echo err_disp(e('tanto_mail', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 担当tel -->
      <dt>
        <label class="l-form__label" for="tanto_tel">
          電話番号（ご担当者の連絡先・半角数字ハイフンあり）<span class="form-require">必須</span>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="tanto_tel" id="tanto_tel" class="tel" size="60" maxlength="15" value="<?php echo e('tanto_tel', $data); ?>" placeholder="例：090-1234-5678" />
        <?php if (e('tanto_tel', $error)) : ?><div class="validate-text"><?php echo err_disp(e('tanto_tel', $error)); ?></div><?php endif; ?>
      </dd>
    </dl>
    <dt>
      <label class="l-form__label" for="tanto_tel">
        FAX番号（ご担当者の連絡先・半角数字ハイフンあり）
      </label>
    </dt>
    <dd class="l-form__action">
      <input type="text" name="tanto_fax" id="tanto_tel" class="tel" size="60" maxlength="15" value="<?php echo e('tanto_fax', $data); ?>" placeholder="例：03-1234-5678" />
      <?php if (e('tanto_fax', $error)) : ?><div class="validate-text"><?php echo err_disp(e('tanto_fax', $error)); ?></div><?php endif; ?>
    </dd>
    </dl>
    <h2 class="l-form__title">店舗情報</h2>
    <!-- 店名 -->
    <dl>
      <dt>
        <label class="l-form__label" for="shop_name">
          店名 <span class="form-require">必須</span>
        </label>
      </dt>
      <dd class="l-form__action">
        <?php if(e('request', $data) == 'update') :
          # 更新する店舗名を取得
          $update_post = get_post(e('main_post_id', $data));
        ?>
          <input type="text" name="shop_name" id="shop_name" class="shop_name" size="60" maxlength="100" value="<?php echo (e('shop_name', $data)) ? e('shop_name', $data) : $update_post->post_title; ?>" />
        <?php else : ?>
          <input type="text" name="shop_name" id="shop_name" class="shop_name" size="60" maxlength="100" value="<?php echo e('shop_name', $data); ?>" />
        <?php endif; ?>
        <?php if (e('shop_name', $error)) : ?><div class="validate-text"><?php echo err_disp(e('shop_name', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 店舗詳細 -->
      <dt>
        <label class="l-form__label" for="menu">
          店舗詳細（300文字以内） <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <textarea name="detail" id="detail" class="detail" cols="100" rows="5" placeholder="お店のPRポイントや雰囲気などお知らせしたい情報があれば入力してください。（300文字以内）"><?php echo e('detail', $data); ?></textarea>
        <?php if (e('detail', $error)) : ?><div class="validate-text"><?php echo err_disp(e('detail', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 郵便番号 -->
      <dt>
        <label class="l-form__label" for="zip_code">
          郵便番号 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="zip_code" id="zip_code" class="zip_code" size="10" maxlength="10" value="<?php echo e('zip_code', $data); ?>" placeholder="901-0001" />
        <?php if (e('zip_code', $error)) : ?><div class="validate-text"><?php echo err_disp(e('zip_code', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 住所 -->
      <dt>
        <label class="l-form__label" for="address">
          住所 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="address" id="address" class="address" size="60" maxlength="500" value="<?php echo e('address', $data); ?>" />
        <?php if (e('address', $error)) : ?><div class="validate-text"><?php echo err_disp(e('address', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- エリア選択 -->
      <dt>
        <label class="l-form__label" for="area">
          エリアを選択 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <div class="selectWrap">
          <select class="searchBody__select" name="area">
            <option value="">未選択</option>
            <?php $areas = term_hierarchy('area', true); ?>
            <?php foreach ($areas as $key => $area) : ?>
              <?php $checked = (e('area', $data) == $area->slug) ? 'selected' : ""; ?>
              <option value="<?php echo $area->slug; ?>" <?php echo $checked ?>><?php echo $area->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php if (e('area', $error)) : ?><div class="validate-text"><?php echo err_disp(e('area', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- ジャンル -->
      <dt>
        <label class="l-form__label" for="genre">
          ジャンルを選択（複数選択可） <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
        <?php if(e('request', $data) == 'update') : ?><p class="sub-text">※こちらの項目を変更する場合、該当項目すべてを、改めてご選択下さい。</p><?php endif; ?>
      </dt>
      <dd class="l-form__action">
        <div class="form-checkbox l-form__genre">
          <ul class="form-checkbox__list">
            <?php
            $args = array('taxonomy' => 'dishes', 'hide_empty' => false, 'orderby' => 'ID');
            $dishes = new WP_Term_Query($args);
            ?>
            <?php foreach ($dishes->terms as $key => $dish) : ?>
              <?php if (e('dishes', $data)) : foreach (e('dishes', $data) as $value) : ?>
                  <?php if (trim($dish->slug) == trim($value)) {
                    $checked = 'checked="checked"';
                    break;
                  } else {
                    $checked = "";
                  }; ?>
              <?php endforeach; endif; ?>
              <li>
                <input class="form-checkbox__button-input" type="checkbox" name="dishes[]" id="<?php echo $dish->slug; ?>" value="<?php echo $dish->slug; ?>" <?php echo $checked; ?>>
                <label class="form-checkbox__button" for="<?php echo $dish->slug; ?>"><?php echo $dish->name; ?></label>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php if (e('dishes', $error)) : ?><div class="validate-text"><?php echo err_disp(e('dishes', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 主なメニュー -->
      <dt>
        <label class="l-form__label" for="menu">
          主なメニュー（300文字以内） <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <textarea name="menu" id="menu" class="menu" cols="100" rows="5" placeholder="その他、キャンペーンやおすすめなどお知らせしたい情報があれば入力してください。（300文字以内）"><?php echo e('menu', $data); ?></textarea>
        <?php if (e('menu', $error)) : ?><div class="validate-text"><?php echo err_disp(e('menu', $error)); ?></div><?php endif; ?>
      </dd>

      <!-- お店の電話番号 -->
      <dt>
        <label class="l-form__label" for="tel_no">
          電話番号（半角数字ハイフンあり）<?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="tel_no" id="tel_no" class="shop_tel" size="60" maxlength="15" value="<?php echo e('tel_no', $data); ?>" placeholder="例：090-1234-5678" />
        <?php if (e('tel_no', $error)) : ?><div class="validate-text"><?php echo err_disp(e('tel_no', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 営業時間 -->
      <dt>
        <label class="l-form__label" for="opening_hours">
          営業時間 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="hours" id="hours" class="opening_hours" size="60" maxlength="500" value="<?php echo e('hours', $data); ?>" placeholder="月～金 12：00～14：00、18：00～24：00" />
        <?php if (e('hours', $error)) : ?><div class="validate-text"><?php echo err_disp(e('hours', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 定休日 -->
      <dt>
        <label class="l-form__label" for="holiday">
          定休日 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="holiday" id="holiday" class="regular_holiday" size="60" maxlength="500" value="<?php echo e('holiday', $data); ?>" />
        <?php if (e('holiday', $error)) : ?><div class="validate-text"><?php echo err_disp(e('holiday', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 駐車場 -->
      <dt>
        <label class="l-form__label" for="parking">
          駐車場 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="parking" id="parking" class="shop_parking" size="60" maxlength="100" value="<?php echo e('parking', $data); ?>" />
        <?php if (e('parking', $error)) : ?><div class="validate-text"><?php echo err_disp(e('parking', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- 席数 -->
      <dt>
        <label class="l-form__label" for="seats">
          席数 <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="seats" id="seats" class="seats" size="60" maxlength="500" value="<?php echo e('seats', $data); ?>" placeholder="100席、テーブル席、カウンター" />
        <?php if (e('seats', $error)) : ?><div class="validate-text"><?php echo err_disp(e('seats', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- マップコード -->
      <dt>
        <label class="l-form__label" for="map_code">
        <img src="<?php echo get_template_directory_uri(); ?>/images/mc_long.gif" width="50px" style="vertical-align: middle;">マップコード
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="map_code" id="map_code" class="map_code" size="60" maxlength="500" value="<?php echo e('map_code', $data); ?>" placeholder="33 592 350*64" />
      </dd>
      <!-- 公式ホームページ（URL） -->
      <dt>
        <label class="l-form__label" for="url">
          公式ホームページ（URL）
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="url" id="url" class="home_page" size="60" maxlength="500" value="<?php echo e('url', $data); ?>" placeholder="https://www.xxxxx.jp" />
      </dd>
      <!-- Facebookアカウント（URL） -->
      <dt>
        <label class="l-form__label" for="facebook">
          Facebookアカウント（URL）
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="fb" id="fb" class="facebook" size="60" maxlength="500" value="<?php echo e('fb', $data); ?>" />
      </dd>
      <!-- Twitterアカウント（URL） -->
      <dt>
        <label class="l-form__label" for="tw">
          Twitterアカウント（URL）
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="tw" id="tw" class="twitter" size="60" maxlength="500" value="<?php echo e('tw', $data); ?>" />
      </dd>
      <!-- Instagramアカウント（URL） -->
      <dt>
        <label class="l-form__label" for="instagram">
          Instagramアカウント（URL）
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="insta" id="insta" class="instagram" size="60" maxlength="500" value="<?php echo e('insta', $data); ?>" />
      </dd>
      <!-- LINE公式アカウント（URL） -->
      <dt>
        <label class="l-form__label" for="line">
          LINE公式アカウント（URL）
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="line" id="line" class="line" size="60" maxlength="500" value="<?php echo e('line', $data); ?>" />
      </dd>
      <!-- 備考 -->
      <dt>
        <label class="l-form__label" for="message">
          お店からのメッセージ
        </label>
      </dt>
      <dd class="l-form__action">
        <textarea name="message" id="message" class="message" cols="100" rows="5" placeholder="その他、キャンペーンやおすすめなどお知らせしたい情報があれば入力してください。例：GO!HAN旅をみて来店してくれた方にはドリンク1杯プレゼント！（300文字以内）"><?php echo e('message', $data); ?></textarea>
      </dd>
      <?php if (e('message', $error)) : ?><div class="validate-text"><?php echo err_disp(e('message', $error)); ?></div><?php endif; ?>
      <!-- こだわり -->
      <dt>
        <label class="l-form__label" for="genre">
          こだわり（複数選択可） <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
        <?php if(e('request', $data) == 'update') : ?><p class="sub-text">※こちらの項目を変更する場合、該当項目すべてを、改めてご選択下さい。</p><?php endif; ?>
      </dt>
      <dd class="l-form__action">
        <div class="form-checkbox">
          <ul class="form-checkbox__list">
            <?php
            $args = array('taxonomy' => 'options', 'hide_empty' => false, 'orderby' => 'ID');
            $options = new WP_Term_Query($args);
            ?>
            <?php foreach ($options->terms as $key => $option) : ?>
              <?php if (e('options', $data)) : foreach (e('options', $data) as $value) : ?>
                  <?php if (trim($option->slug) == trim($value)) {
                    $checked = 'checked="checked"';
                    break;
                  } else {
                    $checked = "";
                  }; ?>
              <?php endforeach;
              endif; ?>
              <li>
                <input class="form-checkbox__button-input" type="checkbox" name="options[]" id="<?php echo $option->slug; ?>-form" value="<?php echo $option->slug; ?>" <?php echo $checked; ?>>
                <label class="form-checkbox__button" for="<?php echo $option->slug; ?>-form"><?php echo $option->name; ?></label>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php if (e('options', $error)) : ?><div class="validate-text"><?php echo err_disp(e('options', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- テイクアウト時間・メニュー -->
      <dt>
        <label class="l-form__label" for="takeout_message">
          テイクアウト時間・メニュー
        </label>
        <p class="sub-text">テイクアウト可能な場合のみご入力ください</p>
      </dt>
      <dd class="l-form__action">
        <textarea name="takeout_message" id="takeout_message" class="takeout_message" cols="100" rows="4" placeholder="予約受付：15:00〜18:00&#013;&#010;受け渡し時間：15:00〜19:00"><?php echo e('takeout_message', $data); ?></textarea>
      </dd>
      <?php if (e('takeout_message', $error)) : ?><div class="validate-text"><?php echo err_disp(e('takeout_message', $error)); ?></div><?php endif; ?>
      <!-- デリバリー対応地域・受付時間 -->
      <dt>
        <label class="l-form__label" for="delivery_message">
          デリバリー対応地域・受付時間
        </label>
        <p class="sub-text">デリバリー対応可能な場合のみご入力ください</p>
      </dt>
      <dd class="l-form__action">
        <textarea name="delivery_message" id="delivery_message" class="delivery_message" cols="100" rows="4" placeholder="対応地域：宜野湾市内のみ（14:00までの注文に限ります）&#013;&#010;予約受付：10:00〜17:00"><?php echo e('delivery_message', $data); ?></textarea>
      </dd>
      <?php if (e('delivery_message', $error)) : ?><div class="validate-text"><?php echo err_disp(e('delivery_message', $error)); ?></div><?php endif; ?>
      <dt>
        <label class="l-form__label" for="credit">
          対応カードの種類について
        </label>
        <p class="sub-text">カード対応可能の場合のみご入力ください</p>
      </dt>
      <dd class="l-form__action">
        <!-- <textarea name="credit" id="credit" class="credit" cols="100" rows="4" placeholder="VISA MASTER"></textarea> -->
        <div class="form-checkbox p-1">
          <ul class="form-checkbox__list">
            <?php $payments = get_field_object('payments', choices_id()); ?>
            <?php foreach ($payments['choices'] as $key => $payment) : ?>
              <?php if (e('payments', $data)) : foreach (e('payments', $data) as $value) : ?>
                  <?php if (trim($key) == trim($value)) {
                    $checked = 'checked="checked"';
                    break;
                  } else {
                    $checked = "";
                  }; ?>
              <?php endforeach;
              endif; ?>
              <li>
                <input class="form-checkbox__button-input" type="checkbox" name="payments[]" id="<?php echo $payment; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?>>
                <label class="form-checkbox__button" for="<?php echo $payment; ?>"><?php echo $payment; ?></label>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </dd>
      <dd class="l-form__action">
        <p class="sub-text">上記以外のお支払い方法ある場合はご入力ください</p>
        <textarea name="payments_other" id="payments_other" class="payments_other" cols="100" rows="4" placeholder="その他、現金以外のお支払い方法があればご入力ください（300文字以内）"><?php echo e('payments_other', $data); ?></textarea>
        <?php if (e('payments_other', $error)) : ?><div class="validate-text"><?php echo err_disp(e('payments_other', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- コロナ対策について -->
      <dt>
        <label class="l-form__label" for="genre">
          コロナ対策について（複数選択可） <?php if (e('request', $data) == 'regist') : ?><span class="form-require js-require">必須</span><?php endif; ?>
        </label>
        <?php if(e('request', $data) == 'update') : ?><p class="sub-text">※こちらの項目を変更する場合、該当項目すべてを、改めてご選択下さい。</p><?php endif; ?>
      </dt>
      <dd class="l-form__action">
        <div class="form-checkbox">
          <ul class="form-checkbox__list">
            <?php
            $coronas = get_field_object('coronas', choices_id());
            ?>
            <?php foreach ($coronas['choices'] as $key => $corona) : ?>
              <?php if (e('coronas', $data)) : foreach (e('coronas', $data) as $value) : ?>
                  <?php if (trim($key) == trim($value)) {
                    $checked = 'checked="checked"';
                    break;
                  } else {
                    $checked = "";
                  }; ?>
              <?php endforeach;
              endif; ?>
              <li>
                <input class="form-checkbox__button-input" type="checkbox" name="coronas[]" id="<?php echo $corona; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?>>
                <label class="form-checkbox__button" for="<?php echo $corona; ?>"><?php echo $corona; ?></label>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php if (e('coronas', $error)) : ?><div class="validate-text"><?php echo err_disp(e('coronas', $error)); ?></div><?php endif; ?>
      </dd>
      <!-- その他の取り組み -->
      <dt>
        <label class="l-form__label" for="coronas_other">
          コロナ対策について（上記以外の取り組みなど）
        </label>
      </dt>
      <dd class="l-form__action">
        <textarea name="coronas_other" id="coronas_other" class="coronas_other" cols="100" rows="4" placeholder="その他コロナ対策に取り組んでいることがあればご入力ください（300文字以内）"><?php echo e('coronas_other', $data); ?></textarea>
        <?php if (e('coronas_other', $error)) : ?><div class="validate-text"><?php echo err_disp(e('coronas_other', $error)); ?></div><?php endif; ?>
      </dd>
    </dl>
    <h2 class="l-form__title">掲載動画</h2>
    <p class="sub-text">店舗の動画をUPすることができます。YOUTUBEのURLを入力してください。<br>
      ※YOUTUBEにアップロードしてある動画のみになります。</p>
    <dl>
      <dt>
        <label class="l-form__label" for="shop_main_image">
          掲載動画
        </label>
      </dt>
      <dd class="l-form__action">
        <input type="text" name="youtube" id="youtube" class="youtube" size="60" maxlength="500" value="<?php echo e('youtube', $data); ?>" />
      </dd>
    </dl>
    <h2 class="l-form__title">掲載画像</h2>
    <p class="sub-text">店舗の写真やメニュー、その他掲載希望される画像を「ファイルを選択」を押してアップロードしてください。<br>
      ※画像は掲載時にサイズの調整や加工をさせていただく場合があります。<br>
      ※アップロードできる最大画像サイズは1ファイルにつき5MBまでとなります。</p>
    <dl>
      <dt>
        <label class="l-form__label" for="shop_main_image">
          メイン写真
        </label>
      </dt>
      <dd class="l-form__action p-1">
        <input type="file" name="shop_main_image" id="shop_main_image" class="shop_image" />
        <!-- <span data-mwform-file-delete="shop_image" class="mwform-file-delete">&times;</span> -->
      </dd>

      <dt>
        <label class="l-form__label" for="shop_image1">
          掲載画像１
        </label>
        <p class="sub-text">料理やドリンクの写真その他掲載希望される画像</p>
      </dt>
      <dd class="l-form__action p-1">
        <input type="file" name="shop_image1" id="shop_image1" class="shop_image1" />
        <!-- <span data-mwform-file-delete="shop_image1" class="mwform-file-delete">&times;</span> -->
      </dd>

      <dt>
        <label class="l-form__label" for="shop_image2">
          掲載画像２
        </label>
        <p class="sub-text">料理やドリンクの写真その他掲載希望される画像</p>
      </dt>
      <dd class="l-form__action p-1">
        <input type="file" name="shop_image2" id="shop_image2" class="shop_image2" />
        <!-- <span data-mwform-file-delete="shop_image2" class="mwform-file-delete">&times;</span> -->
      </dd>

      <dt>
        <label class="l-form__label" for="shop_image3">
          掲載画像３
        </label>
        <p class="sub-text">外観や座席などその他掲載希望される画像</p>
      </dt>
      <dd class="l-form__action p-1">
        <input type="file" name="shop_image3" id="shop_image3" class="shop_image3" />
        <!-- <span data-mwform-file-delete="shop_image3" class="mwform-file-delete">&times;</span> -->
      </dd>

      <dt>
        <label class="l-form__label" for="shop_image4">
          掲載画像４
        </label>
        <p class="sub-text">外観や座席などその他掲載希望される画像</p>
      </dt>
      <dd class="l-form__action p-1">
        <input type="file" name="shop_image4" id="shop_image4" class="shop_image4" />
        <!-- <span data-mwform-file-delete="shop_image4" class="mwform-file-delete">&times;</span> -->
      </dd>
      <dt>
        <label class="l-form__label" for="request_message">
          当サイトへのその他のご要望や依頼
        </label>
      </dt>
      <dd class="l-form__action">
        <textarea name="request_message" id="request_message" class="request_message" cols="60" rows="10" placeholder="1,000文字以内で入力してください。"><?php echo e('request_message', $data); ?></textarea>
      </dd>
      <?php if (e('request_message', $error)) : ?><div class="validate-text"><?php echo err_disp(e('request_message', $error)); ?></div><?php endif; ?>
    </dl>

    <div class="l-form__option">
      <span class="l-form__option-wrap">
        <label for="contact_policy-1">
          <?php $checked = (e('contact_policy', $data)) ? 'checked="checked"' : ""; ?>
          <input type="checkbox" name="contact_policy" value="true" id="contact_policy-1" class="option_checkbox" <?php echo $checked; ?>>
          <span class="l-form__option-text">プライバシーポリシーに同意する</span>
        </label>
      </span>
      <div class="l-form__option-link-area">
        <a href="<?php echo esc_url(home_url('privacy-policy')); ?>" target="_blank" class="l-form__option-link"><i class="fas fa-external-link-alt"></i>
          プライバシーポリシー</a>
      </div>
      <?php if (e('contact_policy', $error)) : ?><div class="validate-text"><?php echo err_disp(e('contact_policy', $error)); ?></div><?php endif; ?>
    </div>

    <div class="l-form__option">
      <span class="l-form__option-wrap">
        <label for="written_oath-1">
          <?php $checked = (e('written_oath', $data)) ? 'checked="checked"' : ""; ?>
          <input type="checkbox" name="written_oath" value="true" id="written_oath-1" class="option_checkbox" <?php echo $checked; ?>>
          <span class="l-form__option-text">「反社会的勢力ではないことの誓約書」に同意する</span>
        </label>
      </span>
      <div class="l-form__option-link-area">
        <a href="<?php echo esc_url(home_url('oath')); ?>" target="_blank" class="l-form__option-link"><i class="fas fa-external-link-alt"></i>
          反社会的勢力ではないことの誓約書</a>
      </div>
      <?php if (e('written_oath', $error)) : ?><div class="validate-text"><?php echo err_disp(e('written_oath', $error)); ?></div><?php endif; ?>
    </div>
    <div class="btn-wrap">
      <button class="btn btn-m-red" type="button" id="entry-submit"><span><i class="fas fa-search"></i> 入力内容を確認する</span></button>
    </div>
  </div><!-- /l-form -->
</form>