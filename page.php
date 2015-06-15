<?php get_header(); ?>

  <div class="row">
    <div class="col-md-8">
  		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	  
        <div class="cell-main">  
  	      <h1><?php the_title(); ?></h1>  
  	      <?php the_content(); ?>
         
  	  
  	      <?php endwhile; else: ?>
  	      <p><?php _e('Sorry, this page does not exist.'); ?></p>
  	    <?php endif; ?>
        </div>
  	 </div>
  	<aside class="col-md-4">
      <div class="cell-aside">
        <?php echo print_wp_shopping_cart() ?>
        <?php 

        $custom_query = new WP_Query( 'p=165' ); 
        ?>
        
        <?php if ( $custom_query->have_posts() ) : ?>
        <!-- the loop -->
          <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
          <h4><?php the_title(); ?></h4>
          <?php the_content(); ?>

          <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>

          <?php wp_reset_postdata(); ?>
      </div>

    </aside>
  </div><!-- end row -->

<?php get_footer(); ?>