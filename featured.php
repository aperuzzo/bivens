<?php
/*
Template Name: Featured 
*/

?>

<?php get_header(); ?>
<section>
  <div class="row">
    <!-- adding intro section to 1st page of pagination -->
    <?php
    if (!is_paged()) {
      $args = array( 
        'post_type' => 'title',
        'category_name' => 'featured'
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

    <!-- calling for featured comic content -->
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
    <div class="cell-comicpage">
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
    <div class="cell-comments">     
      <?php
      $wp_query->is_single = true;
      comments_template();
      $wp_query->is_single = false;
      ?>
      
    </div>
                 
    <?php wp_reset_postdata(); ?>
     
  </div><!-- end row -->
  
  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</section>


<?php get_footer(); ?>