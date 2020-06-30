<?php get_header(); ?>
    <div class="index">
      <?php
      if ( have_posts() ) {
      	while ( have_posts() ) {
      		the_post();

          //the_content();
          the_title();
          echo "<br>";
      		//
      		// 投稿がここに表示される
      		//
      	} // end while
      } // end if
      ?>
    </div>
<?php get_footer(); ?>
