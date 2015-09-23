<?php get_header(); ?>

  <section>
    
  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
  	  <div class="row cell-main">
        <div class="content-center">
         
        <!-- displays shopping cart only for "STORE" category --> 
        <?php 
          if (in_category( 9 )) {
            echo print_wp_shopping_cart(); 
          } 
        ?>
	      <?php the_content(); ?>
       </div>  
      </div><!-- end row -->
	    <?php endwhile; else: ?>
	      <p><?php _e('Sorry, this page does not exist.'); ?></p>
	    <?php endif; ?>
      <div class="row">
      <div class="cell-main">
        <?php comments_template(); ?>
      </div>
      </div><!--end row -->
  	
</section>

<?php get_footer(); ?>