<?php get_header(); ?>
<section>
  <div class="row">
    
    <!-- adding an introduction to display an explanation of category content or bio -->
    <?php
    if (!is_paged()) {
      $args = array( 
        'post_type' => 'title',
        'category_name' => get_query_var('category_name') 
        );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
        echo '<div class="cell-header">';
        echo '<h2>';
        echo the_title();
        echo '</h2>';
        echo '<p>';
        echo the_content();
        echo '</p>';
        echo '</div>';
      endwhile;
    }
    ?>

    <div class="cell-comicpage"> 
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    
      <?php endwhile; ?>
      <!-- pagination -->
      <?php
          if (function_exists(custom_pagination)) {
            custom_pagination($custom_query->max_num_pages,"",$paged);
          }
      ?>
    </div>
    <div class="cell-comments">
      <!-- adding comments -->  
      <?php
      $wp_query->is_single = true;
      comments_template();
      $wp_query->is_single = false;
      ?>

      <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div>
    <div class="col-md-4 col-lg-5">
      
    </div>
  </div><!-- end row -->
  <?php wp_reset_postdata(); ?>

 
    
  
  
    

</section>
<?php get_footer(); ?>