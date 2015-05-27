<?php
/*
Template Name: Comic Page
*/

?>

<?php get_header(); ?>

<div class="row">
    <h1><?php echo $_GET['test']; ?></h1>
</div><!-- end row -->
<div class="row">
  <?php


  $args = array( 'post_type' => 'comicpage');
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    $name = get_post_custom_values('name');
    $nameString = $name[0];
    if ($nameString == $_GET['test']):
      $nameMatch = true;
    else:
      $nameMatch = false;
    endif;
    if ($nameMatch):
      echo '<div class="col-sm-4 thin-border">';
      echo '<a href="';
      echo the_permalink();
      echo '">';
      echo the_post_thumbnail();
      echo '</a>';
      echo '</div>';
    endif;
  endwhile;



  ?>
  <!--
  <?php query_posts('category_name'); ?>

  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	<div class="col-sm-4 thin-border">
	    <h3><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></h3>
	    <p><em><?php the_time('l, F jS, Y'); ?></em></p>
	</div>
	  
  	<?php endwhile; else: ?>
  		<p><?php _e('Sorry, there are no posts.'); ?></p>
    <?php endif; ?>

  -->
  	
</div><!-- end row -->  
  <div class="row">
  	<div class="col-sm-4">
      <?php


  $args = array( 'post_type' => 'artist' );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    $name = get_post_custom_values('name');
    $nameString = $name[0];
    if ($nameString == $_GET['test']):
      $nameMatch = true;
    else:
      $nameMatch = false;
    endif;
    if ($nameMatch):
      echo '<div class="col-sm-4 thin-border">';
      echo the_content();
      echo '</div>';
    endif;
  endwhile;



  ?>
  	</div>
  </div><!-- end row -->


<?php get_footer(); ?>