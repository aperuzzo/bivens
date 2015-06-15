
	
      <footer id="contact" class="row">
        <article id="form" class="col-sm-6">
        	<h3>contact john</h3>
			<form class="form-horizontal" method="post" id="contact_form" action="contact-form-handler.php">
				<div class="form-group">
				     <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"> 
				</div>
				<div class="form-group">		
					<input type="text" name="email" class="form-control" id="email" placeholder="Your Email">
				</div>
				<div class="form-group antispam">
					<input type="text" name="url" placeholder="please leave this space blank">
				</div>
				<div class="form-group">
					<textarea name="message" class="form-control" rows="4" id="message" placeholder="Your Message"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" id="submit" value="Submit" class="btn">
				</div>					 	
			</form> 
		</article>
		<article class="col-sm-6">
			<h3>follow john</h3>
			<p class="social"><a href="#">f</a> <a href="#">t</a> <a href="#">l</a> <a href="#">L</a></p>
			<!-- <div id="charlie-box">
				<img src="<?php echo bloginfo('url'); ?>/wp-content/themes/bivens/images/lil-charlie.jpg"
					alt="John Bivens drawing of Lil' Charlie" class="img-responsive" id="charlie">
				<img src="<?php echo bloginfo('url'); ?>/wp-content/themes/bivens/images/charlie-friends.jpg" 
					alt="John Bivens drawing of Lil' charlie and friends" class="img-responsive" id="friends">
			</div>
				-->
			<h4>all artwork &copy; John Bivens 2015</h4>
			<h5>site design by:</h5>
			<a href="http://anthonyperuzzo.com"><img src="<?php echo bloginfo('url'); ?>/wp-content/themes/bivens/images/tony-logo.svg"
						alt="Anthony Peruzzo logo" class="img-responsive ap-logo"></a>
		</article>
      </footer>
  	</div> <!-- /container -->

    

     <?php wp_footer(); ?>

  </body>
</html>
