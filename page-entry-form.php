<?php get_header(); ?>
<?php get_header('sub'); ?>
<div class="content-wrap">
  <div class="form-page__title">
    <h1 class="main-title">掲載依頼フォーム</h1>
    <p class="sub-text mb-2">下記のフォームにて内容をご入力のうえ、<span class="d-inline">「入力内容を確認する」ボタンを押してください。</span></p>
  </div>
  <div class="content-inner">
    <div class="l-form">
      <form method="POST" id="registform" action="<?php echo esc_url(home_url('entry-regist')); ?>" enctype="multipart/form-data">
        <h2 class="l-fome__title">掲載内容</h2>
        <div class="l-form__radio">
          <span class="l-form__radio-btn">
            <label for="request-1">
              <input type="radio" name="request" value="regist" id="request-1" />
              <span class="l-form__radio-text">新規登録</span>
            </label>
          </span>
          <span class="l-form__radio-btn">
            <label for="request-2">
              <input type="radio" name="request" value="update" id="request-2" />
              <span class="l-form__radio-text">更新依頼</span>
            </label>
          </span>
        </div>
        <p class="sub-text">内容更新の場合は [更新] をお選びください。変更の必要のない項目は空のままでご入力ください。<br>その場合でも、ご担当者様情報、店名は必ず入力をお願いします。</p>

        <h2 class="l-fome__title">ご担当者様情報</h2>
        <!-- 担当者名 -->
        <dl>
          <dt><label class="l-form__label" for="tanto_name">ご担当者名 <span class="form-require">必須</span>
            </label></dt>
          <dd class="l-form__action"><input type="text" name="tanto_name" id="tanto_name" class="form-control" size="60" value="田中 太郎" placeholder="例: 田中 太郎" /></dd>
          <!-- メールアドレス -->
          <dt>
            <label class="l-form__label" for="tanto_mail">
              メールアドレス（半角英数字）<span class="form-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="email" name="tanto_mail" id="tanto_mail" class="mail" size="60" value="mail@example.com" placeholder="例：mail@example.com" data-conv-half-alphanumeric="true" />
          </dd>
          <!-- 担当tel -->
          <dt>
            <label class="l-form__label" for="tanto_tel">
              電話番号（ご担当者の連絡先・半角数字ハイフンなし）<span class="form-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="tanto_tel" id="tanto_tel" class="tel" size="60" maxlength="11" value="0980001111" placeholder="例：0980001111" />
          </dd>
        </dl>
        <h2 class="l-fome__title">店舗情報</h2>
        <!-- 店名 -->
        <dl>
          <dt>
            <label class="l-form__label" for="tel">
              店名 <span class="form-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="shop_name" id="shop_name" class="shop_name" size="60" maxlength="100" value="ちるぐゎー　北谷店" />
          </dd>
          <!-- 郵便番号 -->
          <dt>
            <label class="l-form__label" for="zip_code">
              郵便番号<span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="zip_code" id="zip_code" class="zip_code" size="10" maxlength="10" value="904-0001" placeholder="901-0001" />
          </dd>
          <!-- 住所 -->
          <dt>
            <label class="l-form__label" for="addres">
              住所<span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="addres" id="address" class="addres" size="60" maxlength="500" value="沖縄県北谷町桑江1-1-1" />
          </dd>
          <!-- エリア選択 -->
          <dt><label class="l-form__label" for="area">
              エリアを選択 <span class="form-require js-require">必須</span></label>
          </dt>
          <dd class="l-form__action">
            <div class="selectWrap">
              <select class="searchBody__select" name="area">
                <option value="" hidden>未選択</option>
                <?php $areas = term_hierarchy('area'); ?>
                <?php foreach ($areas as $key => $area) : ?>
                  <option value="<?php echo $area->slug; ?>"><?php echo $area->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </dd>
          <!-- ジャンル -->
          <dt>
            <label class="l-form__label" for="genre">
              ジャンルを選択（複数選択可） <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <div class="form-checkbox l-form__genre">
              <ul class="form-checkbox__list">
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="dishes[]" id="wa" value="wa" checked="checked">
                  <label class="form-checkbox__button" for="wa">和食</label>
                </li>
                <!-- <option value="wa">和食</option> -->
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="dishes[]" id="you" value="you" checked="checked">
                  <label class="form-checkbox__button" for="you">洋食</label>
                </li>
                <?php
                $args = array('taxonomy' => 'dishes', 'hide_empty' => false, 'orderby' => 'ID');
                $dishes = new WP_Term_Query($args);
                ?>
                <?php foreach ($dishes->terms as $key => $dish) : ?>
                  <li>
                    <input class="form-checkbox__button-input" type="checkbox" name="dishes[]" id="<?php echo $dish->slug; ?>" value="<?php echo $dish->slug; ?>">
                    <label class="form-checkbox__button" for="<?php echo $dish->slug; ?>"><?php echo $dish->name; ?></label>
                  </li>
                  <!-- <option value="<?php echo $dish->slug; ?>"><?php echo $dish->name; ?></option> -->
                <?php endforeach; ?>
              </ul>

            </div>
          </dd>
          <!-- 主なメニュー -->
          <dt>
            <label class="l-form__label" for="menu">
              主なメニュー（300文字以内） <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <textarea name="menu" id="menu" class="menu" cols="100" rows="5" placeholder="その他、キャンペーンやおすすめなどお知らせしたい情報があれば入力してください。（300文字以内）">ミックスそば
（大）830円（中）730円（小）530円</textarea>
          </dd>

          <!-- お店の電話番号 -->
          <dt>
            <label class="l-form__label" for="tel_no">
              電話番号 <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="tel_no" id="tel_no" class="shop_tel" size="60" maxlength="11" value="0980001111" placeholder="例：0980001111" />
          </dd>
          <!-- 営業時間 -->
          <dt>
            <label class="l-form__label" for="opening_hours">
              営業時間 <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="hours" id="hours" class="opening_hours" size="60" maxlength="500" value="月～金 12：00～14：00、18：00～24：00" />
          </dd>
          <!-- 駐車場 -->
          <dt>
            <label class="l-form__label" for="parking">
              駐車場 <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="parking" id="parking" class="shop_parking" size="60" maxlength="100" value="100台" />
          </dd>
          <!-- 定休日 -->
          <dt>
            <label class="l-form__label" for="holiday">
              定休日 <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="holiday" id="holiday" class="regular_holiday" size="60" maxlength="500" value="木曜日" />
          </dd>
          <!-- 席数 -->
          <dt>
            <label class="l-form__label" for="seats">
              席数 <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="seats" id="seats" class="seats" size="60" maxlength="500" value="100席、テーブル席、カウンター" />
          </dd>
          <!-- MAPコード -->
          <dt>
            <label class="l-form__label" for="map_code">
              MAPコード
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="map_code" id="map_code" class="map_code" size="60" maxlength="500" value="33 592 350*64" />
          </dd>
          <!-- 公式ホームページ（URL） -->
          <dt>
            <label class="l-form__label" for="url">
              公式ホームページ（URL）
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="url" id="url" class="home_page" size="60" maxlength="500" value="https://www.xxxxx.jp" />
          </dd>
          <!-- Facebookアカウント（URL） -->
          <dt>
            <label class="l-form__label" for="facebook">
              Facebookアカウント（URL）
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="fb" id="fb" class="facebook" size="60" maxlength="500" value="https://facebook.com/xxxxx" />
          </dd>
          <!-- Twitterアカウント（URL） -->
          <dt>
            <label class="l-form__label" for="tw">
              Twitterアカウント（URL）
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="tw" id="tw" class="twitter" size="60" maxlength="500" value="https://twitter.com/xxxxx" />
          </dd>
          <!-- Instagramアカウント（URL） -->
          <dt>
            <label class="l-form__label" for="instagram">
              Instagramアカウント（URL）
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="insta" id="insta" class="instagram" size="60" maxlength="500" value="https://instagram.com/xxxxx" />
          </dd>
          <!-- LINE公式アカウント（URL） -->
          <dt>
            <label class="l-form__label" for="line">
              LINE公式アカウント（URL）
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="text" name="line" id="line" class="line" size="60" maxlength="500" value="https://line.com/xxxxx" />
          </dd>
          <!-- 備考 -->
          <dt>
            <label class="l-form__label" for="message">
              お店からのメッセージ
            </label>
          </dt>
          <dd class="l-form__action">
            <textarea name="message" id="message" class="message" cols="100" rows="5" placeholder="その他、キャンペーンやおすすめなどお知らせしたい情報があれば入力してください。（300文字以内）">琉球LEAFをみて来店してくれた方にはドリンク1杯プレゼント！</textarea>
          </dd>
          <!-- こだわり -->
          <dt>
            <label class="l-form__label" for="genre">
              こだわり（複数選択可） <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <div class="form-checkbox">
              <ul class="form-checkbox__list">
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="options[]" id="takeout" value="takeout" checked="checked">
                  <label class="form-checkbox__button" for="takeout">テイクアウト可</label>
                </li>
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="options[]" id="delivery" value="delivery" checked="checked">
                  <label class="form-checkbox__button" for="delivery">デリバリー可</label>
                </li>

                <?php
                $args = array('taxonomy' => 'options', 'hide_empty' => false, 'orderby' => 'ID');
                $options = new WP_Term_Query($args);
                ?>
                <?php foreach ($options->terms as $key => $option) : ?>
                  <li>
                    <input class="form-checkbox__button-input" type="checkbox" name="options[]" id="<?php echo $option->slug; ?>" value="<?php echo $option->slug; ?>">
                    <label class="form-checkbox__button" for="<?php echo $option->slug; ?>"><?php echo $option->name; ?></label>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </dd>
          <!-- テイクアウト時間・メニュー -->
          <dt>
            <label class="l-form__label" for="takeout_message">
              テイクアウト時間・メニュー</span>
            </label>
            <p class="sub-text">テイクアウト可能な場合のみご入力ください</p>
          </dt>
          <dd class="l-form__action">
            <textarea name="takeout_message" id="takeout_message" class="takeout_message" cols="100" rows="4" placeholder="予約受付：15:00〜18:00&#013;&#010;受け渡し時間：15:00〜19:00">
                  予約受付：15:00〜18:00&#013;&#010;受け渡し時間：15:00〜19:00
                </textarea>
          </dd>
          <!-- デリバリー対応地域・受付時間 -->
          <dt>
            <label class="l-form__label" for="delivery_message">
              デリバリー対応地域・受付時間
            </label>
            <p class="sub-text">デリバリー対応可能な場合のみご入力ください</p>
          </dt>
          <dd class="l-form__action">
            <textarea name="delivery_message" id="delivery_message" class="delivery_message" cols="100" rows="4" placeholder="対応地域：宜野湾市内のみ（14:00までの注文に限ります）&#013;&#010;予約受付：15:00〜17:00（1時ほどお時間をいただきます。）">
                  対応地域：宜野湾市内のみ（14:00までの注文に限ります）&#013;&#010;予約受付：15:00〜17:00（1時ほどお時間をいただきます。）
                </textarea>
          </dd>
          <dt>
            <label class="l-form__label" for="credit">
              対応カードの種類について
            </label>
            <p class="sub-text">カード対応可能の場合のみご入力ください</p>
          </dt>
          <dd class="l-form__action">
            <!-- <textarea name="credit" id="credit" class="credit" cols="100" rows="4" placeholder="VISA MASTER"></textarea> -->
            <div class="form-checkbox">
              <ul class="form-checkbox__list">
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="payments[]" id="visa" value="visa" checked="checked">
                  <label class="form-checkbox__button" for="visa">VISA</label>
                </li>
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="payments[]" id="master" value="master" checked="checked">
                  <label class="form-checkbox__button" for="master">Master</label>
                </li>


                <?php
                $payments = get_field_object('payments', 29);
                ?>
                <?php foreach ($payments['choices'] as $key => $payment) : ?>
                  <li>
                    <input class="form-checkbox__button-input" type="checkbox" name="payments[]" id="<?php echo $key; ?>" value="<?php echo $key; ?>">
                    <label class="form-checkbox__button" for="<?php echo $key; ?>"><?php echo $payment; ?></label>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </dd>
          <!-- コロナ対策について -->
          <dt>
            <label class="l-form__label" for="genre">
              コロナ対策について（複数選択可） <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <div class="form-checkbox">
              <ul class="form-checkbox__list">
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="coronas[]" id="手指消毒液の設置" value="手指消毒液の設置" checked="checked">
                  <label class="form-checkbox__button" for="手指消毒液の設置">手指消毒液の設置</label>
                </li>
                <li>
                  <input class="form-checkbox__button-input" type="checkbox" name="coronas[]" id="換気" value="換気" checked="checked">
                  <label class="form-checkbox__button" for="換気">換気</label>
                </li>

                <?php
                $coronas = get_field_object('coronas', 29);
                ?>
                <?php foreach ($coronas['choices'] as $key => $corona) : ?>
                  <li>
                    <input class="form-checkbox__button-input" type="checkbox" name="coronas[]" id="<?php echo $key; ?>" value="<?php echo $corona; ?>">
                    <label class="form-checkbox__button" for="<?php echo $key; ?>"><?php echo $corona; ?></label>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </dd>
          <!-- その他の取り組み -->
          <dt>
            <label class="l-form__label" for="korona_taisaku">
              コロナ対策について（上記以外の取り組みなど） <span class="form-require js-require">必須</span>
            </label>
          </dt>
          <dd class="l-form__action">
            <textarea name="korona_taisaku" id="korona_taisaku" class="korona_taisaku" cols="100" rows="4" placeholder="その他コロナ対策に取り組んでいることがあればご入力ください（300文字以内）"></textarea>
          </dd>
        </dl>
        <h2 class="l-fome__title">掲載画像</h2>
        <p class="sub-text">店舗の写真やメニュー、その他掲載希望される画像を「ファイルを選択」を押してアップロードしてください。<br>
          ※画像は掲載時にサイズの調整や加工をさせていただく場合があります。<br>
          ※アップロードできる最大画像サイズは1ファイルにつき5MBまでとなります。</p>
        <dl>
          <dt>
            <label class="l-form__label" for="shop_main_image">
              店舗の写真やロゴ画像
            </label>
          </dt>
          <dd class="l-form__action">
            <input type="file" name="shop_main_image" id="shop_main_image" class="shop_image" />
            <!-- <span data-mwform-file-delete="shop_image" class="mwform-file-delete">&times;</span> -->
          </dd>

          <dt>
            <label class="l-form__label" for="shop_image1">
              掲載画像１
            </label>
            <p class="sub-text">外観や座席などその他掲載希望される画像</p>
          </dt>
          <dd class="l-form__action">
            <input type="file" name="shop_image1" id="shop_image1" class="shop_image1" />
            <!-- <span data-mwform-file-delete="shop_image1" class="mwform-file-delete">&times;</span> -->
          </dd>

          <dt>
            <label class="l-form__label" for="shop_image2">
              掲載画像２
            </label>
            <p class="sub-text">外観や座席などその他掲載希望される画像</p>
          </dt>
          <dd class="l-form__action">
            <input type="file" name="shop_image2" id="shop_image2" class="shop_image2" />
            <!-- <span data-mwform-file-delete="shop_image2" class="mwform-file-delete">&times;</span> -->
          </dd>

          <dt>
            <label class="l-form__label" for="shop_image3">
              掲載画像３
            </label>
            <p class="sub-text">料理やドリンクの写真その他掲載希望される画像</p>
          </dt>
          <dd class="l-form__action">
            <input type="file" name="shop_image3" id="shop_image3" class="shop_image3" />
            <!-- <span data-mwform-file-delete="shop_image3" class="mwform-file-delete">&times;</span> -->
          </dd>

          <dt>
            <label class="l-form__label" for="shop_image4">
              掲載画像４
            </label>
            <p class="sub-text">料理やドリンクの写真その他掲載希望される画像</p>
          </dt>
          <dd class="l-form__action">
            <input type="file" name="shop_image4" id="shop_image4" class="shop_image4" />
            <!-- <span data-mwform-file-delete="shop_image4" class="mwform-file-delete">&times;</span> -->
          </dd>

          <!-- <dt>
                <label class="l-form__label" for="shop_image5">
                  掲載画像５
                </label>
                <p class="sub-text">メニューやその他掲載希望される画像</p>
              </dt>
              <dd class="l-form__action">
                <input type="file" name="shop_image5" id="shop_image5" class="shop_image5" />
              </dd> -->

          <dt>
            <label class="l-form__label" for="request_message">
              当サイトへのその他のご要望や依頼
            </label>
          </dt>
          <dd class="l-form__action">
            <textarea name="request_message" id="request_message" class="request_message" cols="60" rows="10" placeholder="1,000文字以内で入力してください。"></textarea>
          </dd>
        </dl>

        <div class="l-form__option">
          <span class="l-form__option-wrap">
            <label for="contact_policy-1">
              <input type="checkbox" name="contact_policy[data][]" value="プライバシーポリシーに同意する" id="contact_policy-1" class="option_checkbox" />
              <span class="l-form__option-text">プライバシーポリシーに同意する</span>
            </label>
          </span>
          <input type="hidden" name="contact_policy[separator]" value="," />
          <input type="hidden" } />
          <div class="l-form__option-link-area">
            <a href="#" target="_blank" class="l-form__option-link"><i class="fas fa-external-link-alt"></i>
              プライバシーポリシー</a>
          </div>
        </div>

        <div class="l-form__option">
          <span class="l-form__option-wrap">
            <label for="written_oath-1">
              <input type="checkbox" name="written_oath[data][]" value="「反社会的勢力ではないことの誓約書」に同意する" id="written_oath-1" class="option_checkbox" />
              <span class="l-form__option-text">「反社会的勢力ではないことの誓約書」に同意する</span>
            </label>
          </span>
          <input type="hidden" name="written_oath[separator]" value="," />
          <input type="hidden" name="" value="" />
          <div class="l-form__option-link-area">
            <a href="#" target="_blank" class="l-form__option-link"><i class="fas fa-external-link-alt"></i>
              反社会的勢力ではないことの誓約書</a>
          </div>
        </div>
        <button class="btn btn-m-red" type="submit"><span><i class="fas fa-search"></i> 入力内容を確認する</span></button>
      </form>
    </div><!-- /l-form -->
  </div>
</div>
<?php get_footer(); ?>