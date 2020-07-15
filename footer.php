      </main>
      <!-- <div id="backToTop">
        <a href="#header"><span class="text">一番上へ</span></a>
      </div> -->
      <footer class="l-footer">
        <p class="pagetop"><a href="#top-header">▲</a></p>
        <nav class="l-footer__nav">
          <ul class="l-footer__nav-list">
            <li class="l-footer__nav-item"><a href="<?php echo esc_url(home_url('admin')); ?>">運営者情報</a></a></li>
            <li class="l-footer__nav-item"><a href="<?php echo esc_url(home_url('privacy-policy')); ?>">プライバシーポリシー</a></a></li>
            <li class="l-footer__nav-item"><a href="<?php echo esc_url(home_url('contact')); ?>">お問い合わせ</a></a></li>
          </ul>
        </nav>
        <div class="l-footer__bottom">
          <p class="copyright">&copy;2020 Leaf Publications</p>
        </div>
      </footer>
      </div>

      <!-- Java script-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/scripts/vendors/slick.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/scripts/main.js?<?php echo date('Ymd-Hi'); ?>"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/scripts/libs/main-slider.js"></script>
      </body>

      </html>