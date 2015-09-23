<?php
/*
Template Name: Home page
*/

?>

<?php get_header(); ?>

<section id="home-page">
	<div class="row">
		<div class="col-md-9">
			<article>
			<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

				$custom_args = array(
				    'post_type' => 'post',
				    'category_name' => 'news',
				    'posts_per_page' => 5,
				    'paged' => $paged
				  );

				$custom_query = new WP_Query( $custom_args ); 
			?>
			
			<?php if ( $custom_query->have_posts() ) : ?>
			<!-- the loop -->
		    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
		
			<div class="cell-main">
				<h3><?php the_title(); ?></h3>
				<p class="date-time"><em><?php the_time('l, F jS, Y'); ?></em></p>
				<p><?php the_content(); ?></p>
			</div>

			<?php endwhile; else: ?>
			    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
			<!-- pagination here -->
		    <?php
		      if (function_exists(custom_pagination)) {
		        custom_pagination($custom_query->max_num_pages,"",$paged);
		      }
		    ?>  
			</article>

			<?php wp_reset_postdata(); ?>
		</div>
		<aside class="col-md-3">
			<div class="cell-header">
				<?php echo print_wp_shopping_cart() ?>
				<?php 

				$custom_query = new WP_Query( 'p=165' ); 
				?>
				
				<?php if ( $custom_query->have_posts() ) : ?>
				<!-- the loop -->
			    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			    <h4><?php the_title(); ?></h4>
			    <?php the_content(); ?>

			    <?php endwhile; else: ?>
			    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>

			    <?php wp_reset_postdata(); ?>
			</div>

		</aside>	
		
	
	</div><!-- end row -->
</section>


<?php get_footer(); ?>