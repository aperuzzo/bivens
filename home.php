<?php get_header(); ?>

<div class="row">
  	<h1>Artists</h1>
</div><!-- end row -->
<div class="row">
  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	<div class="col-sm-4 thin-border">
	    <h3><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></h3>
	    <p><em><?php the_time('l, F jS, Y'); ?></em></p>
	</div>
	  
  	<?php endwhile; else: ?>
  		<p><?php _e('Sorry, there are no posts.'); ?></p>
    <?php endif; ?>
  	
</div><!-- end row -->  
  <div class="row">
  	<div class="col-sm-4">
  		<?php get_sidebar(); ?>	
  	</div>
  </div><!-- end row -->


<?php get_footer(); ?>