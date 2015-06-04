<?php
/*
Template Name: Home page
*/

?>

<?php get_header(); ?>


<div class="row">
  <?php 

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	$custom_args = array(
	    'post_type' => 'post',
	    'category_name' => 'news',
	    'posts_per_page' => 10,
	    'paged' => $paged
	  );

	$custom_query = new WP_Query( $custom_args ); ?>

	<?php if ( $custom_query->have_posts() ) : ?>
	<!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    
	<article class="col-sm-8 pink-cell">
		<h3><?php the_title(); ?></h3>
		<p><?php the_content(); ?></p>
		<!-- optional button to link to full post (if needed)
		<a class="btn" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">
							More...
						</a>
		-->
	</article>
		
	

	
	
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  	<?php endif; ?>
</div>


<?php get_footer(); ?>