<?php get_header(); ?>
<section>
  <div class="row">
    

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <h1><?php the_title(); ?></h1> 
    <div class="col-md-8 col-lg-7 featured">
      <?php the_content(); ?>
    
      <?php endwhile; ?>
      <!-- pagination -->
      <?php
          if (function_exists(custom_pagination)) {
            custom_pagination($custom_query->max_num_pages,"",$paged);
          }
      ?>

      <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div>
    <div class="col-md-4 col-lg-5">
      <div class="cell-aside">
        <!-- adding an aside to display an explanation of category content or bio -->
        <?php

        $args = array( 
          'post_type' => 'title',
          'category_name' => get_query_var('category_name') 
          );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
          
          echo '<p>';
          echo the_content();
          echo '</p>';
        endwhile;
        ?>
      </div>
    </div>
  </div><!-- end row -->
  <?php wp_reset_postdata(); ?>

  <div class="row cell-comments">
    <!-- adding comments -->  
    <?php
    $wp_query->is_single = true;
    comments_template();
    $wp_query->is_single = false;
    ?>
  </div><!-- end row -->
    
  
  
    

</section>
<?php get_footer(); ?>