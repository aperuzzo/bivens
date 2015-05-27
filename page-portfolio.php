<?php
/*
Template Name: Portfolio Gallery
*/

?>

<?php get_header(); ?>

<div class="row">
  	<h1>Portfolio</h1>
</div><!-- end row -->
<div class="row">

  <?php

  $args = array( 
    'post_type' => 'post',
    'category_name' => 'portfolio',
    'posts_per_page' => 10 
    );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    
    echo '<div class="col-sm-4 thin-border">';
    echo '<h3>';
    echo the_title();
    echo '</h3>';
    echo '<a href="';
    echo the_permalink();
    echo '">';
    echo the_post_thumbnail();
    echo '</a>';
    echo '</div>';
  endwhile;
  ?>

</div><!-- end row -->  
<?php wp_reset_postdata(); ?>

  <div class="row">
  	<div class="col-sm-4">
  		<?php get_sidebar(); ?>	
  	</div>
  </div><!-- end row -->


<?php get_footer(); ?>