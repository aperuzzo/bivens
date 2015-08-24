<?php 


	$errors = '';
	$myemail = 'anthony.peruzzo@gmail.com';//<-----Put Your email address here.
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
			//redirect to the 'thank you' page
			// $urlString = bloginfo('url');
			
			// header("Location:http://localhost:8888/second/thank-you/");
			// header("Location:{$urlString}/thank-you/");
			
			echo "<META http-equiv='refresh' content='0;URL=http://localhost:8888/second/thank-you/'>";
		
			
		}
	}
 

?>


<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
<h1>Thanks for your message</h1>


</body>
</html>