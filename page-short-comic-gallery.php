<?php
/*
Template Name: Short Comic Gallery
*/

?>

<?php get_header(); ?>
<section>

  <div class="row">
    	<h1>Comics</h1>
  </div><!-- end row -->
  <div class="row">

    <?php

    $args = array( 
      'post_type' => 'title', 
      'cat' => -7 
      );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
      
      $name = get_the_category();
      
      echo '<div class="col-md-4 col-sm-6">';
      echo '<div class="thumb">';
      echo '<a href="../category/';
      echo $name[0]->slug;
      echo '">';
      echo '<p class="center-img">';
      echo the_post_thumbnail();
      echo '</p>';
      echo '</a>';
      echo '<a href="../category/';
      echo $name[0]->slug;
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