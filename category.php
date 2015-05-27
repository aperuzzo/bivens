<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
      <div class="row">
        <h1><?php the_title(); ?></h1> 
        <p><em><?php the_time('l, F jS, Y'); ?></em></p> 
        <?php the_content(); ?>
      
          <?php endwhile; ?>
          <!-- pagination -->
          <?php
              if (function_exists(custom_pagination)) {
                custom_pagination($custom_query->max_num_pages,"",$paged);
              }
          ?>
        <!-- adding comments -->  
        <?php
        $wp_query->is_single = true;
        comments_template();
        $wp_query->is_single = false;
        ?>
      </div><!-- end row -->
        
    
  <?php else : ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
  
<!-- adding an aside to display an explanation of category content or bio -->
  <div class="row">

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
    <?php wp_reset_postdata(); ?>
  </div><!-- end row --> 


<?php get_footer(); ?>