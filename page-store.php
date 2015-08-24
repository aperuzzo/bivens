<?php
/*
Template Name: Store 
*/

?>

<?php get_header(); ?>
<section>

  <div class="row">
    	<h1>Store</h1>
  </div><!-- end row -->
  <div class="row">
    <div class="col-md-3 col-md-push-9 cell-aside">
      <?php echo print_wp_shopping_cart() ?>
      <h4>prints, sketchbooks, original art are all available on this page. 
        click links for more info or to add an item to your cart.</h4>
    </div>
    <div class="col-md-9">

      <?php

      $args = array( 
        'post_type' => 'post', 
        'posts_per_page' => 10,
        'cat' => 9 
        );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
        
        $name = get_the_category();
        
        echo '<div class="col-md-6 col-md-pull-4 thumb-store">';
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
    </div>
    

  </div><!-- end row -->  
  <?php wp_reset_postdata(); ?>

</section>


<?php get_footer(); ?>