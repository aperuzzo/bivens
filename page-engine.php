<?php
/*
Template Name: Dark Engine
*/

?>

<?php get_header(); ?>



<?php 

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$custom_args = array(
    'post_type' => 'post',
    'category_name' => 'dark-engine',
    'posts_per_page' => 1,
    'order' => 'ASC',
    'paged' => $paged
  );

$custom_query = new WP_Query( $custom_args ); ?>

<?php if ( $custom_query->have_posts() ) : ?>
<div class="row">
    <!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
      <article>
        <h3><?php the_title(); ?></h3>
        <div>
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
    <!-- end of the loop -->
</div>
<div class="row">
    <!-- pagination here -->
    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>
  </div>
  <div class="row">
    <?php comments_template(); ?>
  </div>

  <div class="row">

  <?php

  $args = array( 
    'post_type' => 'title',
    'category_name' => 'dark-engine'
    );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    
    echo '<p>';
    echo the_content();
    echo '</p>';
  endwhile;
  ?>
</div><!-- end row --> 

  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

    


<?php get_footer(); ?>