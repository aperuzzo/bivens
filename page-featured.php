<?php
/*
Template Name: Featured Comic
*/

?>

<?php get_header(); ?>


<section>
  <div class="row">
    <?php 

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $custom_args = array(
        'post_type' => 'post',
        'category_name' => 'featured',
        'posts_per_page' => 1,
        'order' => 'ASC',
        'paged' => $paged
      );

    $custom_query = new WP_Query( $custom_args ); ?>
    <?php if ( $custom_query->have_posts() ) : ?>
        <!-- the loop -->
      
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
         
            <div class="col-md-8 col-lg-7 featured">
                <div class="featured-cell">
                <?php the_content(); ?>

                <?php endwhile; ?>
                <!-- end of the loop -->
                <!-- pagination here -->
                <?php
                  if (function_exists(custom_pagination)) {
                    custom_pagination($custom_query->max_num_pages,"",$paged);
                  }
                ?>
              </div>
            </div>
           
        <?php wp_reset_postdata(); ?>
    <div class="col-md-4 col-lg-5">
      <div class="cell-aside">
        <?php

        $args = array( 
          'post_type' => 'title',
          'category_name' => 'featured'
          );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
          echo '<h2>';
          echo the_title();
          echo '</h2>';
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
     <?php
    $wp_query->is_single = true;
    comments_template();
    $wp_query->is_single = false;
    ?>
  </div>


    <?php else:  ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</section>


<?php get_footer(); ?>