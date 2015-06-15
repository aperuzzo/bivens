<?php get_header(); ?>

  <section>
    
  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
  	  <div class="row cell-main">
        <div class="content-center">
	       <?php the_content(); ?>
         <?php
          if ( in_category( 2 ) || in_category( 3 )) {
            $name = get_the_category();
            echo '<a href="../../../../category/';
            echo $name[0]->slug;
            echo '">';
            echo 'Back to the ';
            echo $name[0]->name;
            echo ' page';
            echo '</a>';
          }
        ?>
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