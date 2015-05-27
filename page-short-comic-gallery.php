<?php
/*
Template Name: Short Comic Gallery
*/

?>

<?php get_header(); ?>

<div class="row">
  	<h1>Comics</h1>
</div><!-- end row -->
<div class="row">

  <?php

  $args = array( 
    'post_type' => 'title', 
    'posts_per_page' => 10 
    );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    
    $name = get_the_category();
    
    echo '<div class="col-sm-4 thin-border">';
    echo '<h3>';
    echo the_title();
    echo '</h3>';
    echo '<a href="../category/';
    echo $name[0]->slug;
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