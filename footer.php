
      <footer id="contact" class="row">
        <article id="form" class="col-sm-6">
        	<h3>contact john</h3>

			<?
				$errors = '';
				$myemail = 'bivens.john@gmail.com';//<-----Put Your email address here.
				if(empty($_POST['name'])  || 
				   empty($_POST['email']) || 
				   empty($_POST['message']))
				{
				    $errors .= "\n Error: all fields are required";
				}

				$name = $_POST['name']; 
				$email_address = $_POST['email']; 
				$message = $_POST['message']; 

				if (!preg_match(
				"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
				$email_address))
				{
				    $errors .= "\n Error: Invalid email address";
				}

				if( empty($errors)) 
				{
					// if the url field is empty 
					if(isset($_POST['url']) && $_POST['url'] == ''){
						//then send email 
				
						$to = $myemail; 
						$email_subject = "Contact form submission: $name";
						$email_body = "You have received a new message. ".
						" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
						
						$headers = "From: $myemail\n"; 
						$headers .= "Reply-To: $email_address";
						
						mail($to,$email_subject,$email_body,$headers);

						echo "<META http-equiv='refresh' content='0;URL=http://localhost:8888/second/thank-you/'>";

				} 
					} 
			?>

			<form class="form-horizontal" method="post" id="contact_form" action="">
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
			<p class="social"><a href="https://www.facebook.com/ArtOfJohnThomasBivens?ref=nf">b</a> 
				<a href="http://johnbivens.tumblr.com/">z</a> <a href="https://instagram.com/bivensjohn/">x</a> 
				<a href="https://twitter.com/John_Bivens">a</a></p>
			
			<h4>all artwork &copy; John Bivens 2015</h4>
			<h5>site design by: <a href="http://anthonyperuzzo.com" target="_blank">Anthony Peruzzo</a></h5>
			
		</article>
      </footer>
  	</div> <!-- /container -->

    

    <?php wp_footer(); ?>
  </body>
</html>
