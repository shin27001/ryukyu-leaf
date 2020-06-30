<div class="l-searchBox">
  <h4 class="l-searchBox__title"><i class="fas fa-search"></i> お店を探す</h4>
  <div class="searchBody">
    <div class="searchBody__inner">
      <form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>">
        <input type="hidden" name="post_type" value="shops">
        <div class="searchBody__top">
          <dl class="searchBody__dl">
            <dt class="searchBody__dt">キーワードで検索</dt>
            <dd class="searchBody__dd">
              <input id="searchInput" name="s" class="searchBody__input" type="search" placeholder="キーワードで検索" value="" autocomplete="off">
              <button class="searchBody__submit" type="submit"></button>
            </dd>
          </dl>
        </div>
        <div class="searchBody__btm">
          <dl class="searchBody__dl">
            <dt class="searchBody__dt"><i class="fas fa-map-marker-alt"></i> エリアを選択</dt>
            <dd class="searchBody__dd">
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
          </dl>
          <dl class="searchBody__dl">
            <dt class="searchBody__dt"><i class="fas fa-utensils"></i> ジャンルを選択</dt>
            <dd class="searchBody__dd">
              <div class="selectWrap">
                <select class="searchBody__select" name="dishes">
                  <option value="" hidden>未選択</option>
                  <?php
                    $args = array('taxonomy' => 'dishes', 'hide_empty' => false, 'orderby' => 'ID');
                    $dishes = new WP_Term_Query($args);
                  ?>
                  <?php foreach ($dishes->terms as $key => $dish) : ?>
                    <option value="<?php echo $dish->slug; ?>"><?php echo $dish->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </dd>
          </dl>
          <dl class="searchBody__dl">
            <dt class="searchBody__dt"><i class="far fa-check-circle"></i> こだわり<span
                class="small-text">（複数選択可）</span></dt>
            <dd class="searchBody__dd">
              <div class="checkbox-Wrap">
                <ul class="checkbox-list">
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
          </dl>
        </div>
        <div class="searchBody__btn">
          <div class="searchBody__btnTop">
            <a href="javascript:void(0);" class="btn" id="formReset"><span><i class="fas fa-undo-alt"></i> 条件をクリア</span></a>
            <!-- <input type="reset" class="btn" id="formReset" value="<span><i class="fas fa-undo-alt¥"></i> 条件をクリア</span>"> -->
            <button class="btn btn-m-red" type="submit"><span><i class="fas fa-search"></i> この条件で検索</span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
