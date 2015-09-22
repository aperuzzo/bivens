<?php
/*
Template Name: Portfolio Gallery
*/

?>

<?php get_header(); ?>

<section>
  <div class="row">
      <div>
        <h1>Portfolio</h1>
      </div>
  </div>
 
  <div class="row">
    <?php

    $args = array( 
      'post_type' => 'post',
      'category_name' => 'portfolio'
      );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
      
      echo '<div class="col-md-4 col-sm-6 col-lg-3">';
      echo '<div class="thumb">';
      echo '<a href="';
      echo the_permalink();
      echo '">';
      echo '<p class="center-img">';
      echo the_post_thumbnail();
      echo '</p>';
      echo '</a>';
      echo '<a href="';
      echo the_permalink();
      echo '">';
      echo '<h4>';
      echo the_title();
      echo '</h4>';
      echo '</a>';
      echo '</div>';
      echo '</div>';
    endwhile;
    ?>
    

  </div><!-- end row -->  
  <?php wp_reset_postdata(); ?>

</section>


<?php get_footer(); ?>