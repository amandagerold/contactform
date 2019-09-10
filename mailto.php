<?php
// isset checks to see if user went straight to the php, rather than hitting submit
if(isset($_POST['submit'])) {

		// grabs the info from the form and makes them variables
		$to = "heyamanda@amandagerold.com"; // where I want the email sent
		$subject = "$name_field sent you a message."; // the subject line of the email
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$blue = $_POST['blue'];
		
		// text to go into thank you email after contact form is used
		$tysubject = "Thank you for visiting my portfolio"; // subject
		$tymessage = "Hello $name,\n\n Thank you for visiting my portfolio website! I hope you enjoyed what you found.\n\n I got your email through my contact form and I'll read it soon.\n You can expect a reply from me in a day or two.\n\n I hope you visit again in the future!\n\n Sincerely,\n Amanda Gerold\n www.amandagerold.com"; // email message
		$from = "heyamanda@amandagerold.com"; // from
		
		$array = array( // puts the info from the form into an arrary
			"name"=>$name,
			"email"=>$email,
			"message"=>$message,
			"blue"=>$blue
		);
		
		$pass = base64_encode(serialize($array)); // serializes the array
		
		//checks to see if the required fields are empty
		if($_POST['email'] == '' || $_POST['name'] == '' || $_POST['message'] == '' || $_POST['blue'] == ''){
			// if all fields are blank, return user to the contact form with $confirm set to 'error' and the serialized 'pass' in the url
			header( "Location: index.php?confirm=error&pass=$pass#contact" );
		}
		//if required fields have data, then send the form
		else {
			if($_POST['blue'] == "blue"){ 
			
				if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
					header( "Location: index.php?confirm=invalid&pass=$pass#contact" );
				}else{
					// formats the body of the email, with \n as a linebreak. \ before " makes the quotes show up.
					$body = "$name visited your website.\n\n $message";
					 
					//sends the form with the fields from, subject of the email, body of the email, and where the email is from, using the variables above
					mail($to, $subject, $body, "From: $_POST[email]");
					
					mail($email, $tysubject, $tymessage, "From: $from");
					
					// returns user to the index page with $confirm set to 'success'
					header( "Location: index.php?confirm=success#contact" );
					}
			}
				else {
					// returns user to the index page with $confirm set to 'wrong' when 'blue' is not the answer
					header( "Location: index.php?confirm=wrong&pass=$pass#contact" );
				}		
		}

} 
// if the user goes straight to the php without hitting submit, they get an error message
else {
	// returns user to the contact form with $confirm set to 'oops'
	header( "Location: index.php?confirm=oops#contact" );

}
?>
