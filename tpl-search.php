<div class="l-searchBox">
  <h4 class="l-searchBox__title"><i class="fas fa-search"></i> お店を探す</h4>
  <div class="searchBody">
    <div class="searchBody__inner">
      <?php
        $slug = get_post_field('post_name', get_post());
        // $action = ($slug == 'entry-form') ? esc_url(home_url('entry-form/')) : esc_url(home_url());
      ?>
      <form method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>">
        <input type="hidden" name="post_type" value="shops">
        <?php echo !empty($_GET['search_update']) || ($slug == 'entry-form') ? '<input type="hidden" name="search_update" value="true">' : "" ; ?>
        <!-- <input type="hidden" name="update" value="<?php echo (!empty($_GET['update'])) ? $_GET['update'] : false; ?>"> -->
        <div class="searchBody__top">
          <dl class="searchBody__dl">
            <dt class="searchBody__dt"><i class="fas fa-search"></i> キーワードで検索</dt>
            <dd class="searchBody__dd">
              <input id="searchInput" name="s" class="searchBody__input" type="search" placeholder="キーワードで検索" value="<?php echo e('s'); ?>" autocomplete="off">
              <button class="searchBody__submit" type="submit"></button>
            </dd>
          </dl>
        </div>
        <div class="searchBody__btm">
          <div class="searchBody__btm-inner">
            <dl class="searchBody__dl">
              <dt class="searchBody__dt"><i class="fas fa-map-marker-alt"></i> エリアを選択</dt>
              <dd class="searchBody__dd">
                <div class="selectWrap">
                  <select class="searchBody__select" name="area">
                    <option value="">未選択</option>
                    <?php $areas = term_hierarchy('area'); ?>
                    <?php foreach ($areas as $key => $area) : ?>
                      <?php $checked = (e('area') == $area->slug) ? 'selected' : ""; ?>
                      <option value="<?php echo $area->slug; ?>" <?php echo $checked; ?>><?php echo $area->name; ?></option>
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
                    <option value="">未選択</option>
                    <?php $dishes = get_terms('dishes', array('hide_empty' => false, 'orderby' => 'ID')); ?>
                    <?php foreach ($dishes as $key => $dish) : ?>
                      <?php $checked = (e('dishes') == $dish->slug) ? 'selected' : ""; ?>
                      <option value="<?php echo $dish->slug; ?>" <?php echo $checked; ?>><?php echo $dish->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </dd>
            </dl>
          </div>
          <dl class="searchBody__dl">
            <dt class="searchBody__dt"><i class="far fa-check-circle"></i> こだわり<span class="small-text">（複数選択可）</span></dt>
            <dd class="searchBody__dd">
              <div class="form-checkbox">
                <ul class="form-checkbox__list">
                  <?php $options = get_terms('options', array('hide_empty' => false, 'orderby' => 'ID')); ?>
                  <?php foreach ($options as $option) : ?>
                    <?php
                      if (e('options')) {
                        foreach (e('options') as $val) {
                          if($option->slug == $val) {
                            $checked = 'checked="checked"';
                            break;
                          } else {
                            $checked = "";
                          }
                        }
                      }
                    ?>
                    <li>
                      <input class="form-checkbox__button-input" type="checkbox" name="options[]" id="<?php echo $option->slug; ?>" value="<?php echo $option->slug; ?>" <?php echo $checked; ?>>
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
            <a href="javascript:void(0);" class="btn btn-m-gray" id="formReset"><span><i class="fas fa-undo-alt"></i> 条件をクリア</span></a>
            <button class="btn btn-m-red" type="submit"><span><i class="fas fa-search"></i> この条件で検索</span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
