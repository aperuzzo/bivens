<?php get_header(); ?>

<div class="jumbotron row">
<h1>Hello, world!</h1>
This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.

<a class="btn btn-primary btn-large">Learn more »</a>
</div>
<div class="row">
  <?php 

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	$custom_args = array(
	    'post_type' => 'post',
	    'category_name' => 'news',
	    'posts_per_page' => 3,
	    'paged' => $paged
	  );

	$custom_query = new WP_Query( $custom_args ); ?>

	<?php if ( $custom_query->have_posts() ) : ?>
	<!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    
    <article>
			<div class="col-sm-4">
				<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">
					<h3><?php the_title(); ?></h3>
				</a>
				<p><?php the_excerpt(); ?></p>
				<a class="btn btn-primary btn-large" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">
					More...
				</a>
			</div>
		
	</article>

	
	
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  	<?php endif; ?>
</div>


<?php get_footer(); ?>