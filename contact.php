<?php
// isset checks to see if user went straight to the php, rather than hitting submit
if(isset($_POST['submit'])) {

		// grabs the info from the form and makes them variables
		$to = "heyamanda@amandagerold.com";
		$subject = "$name_field sent you a message.";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$blue = $_POST['blue'];
		
		//checks to see if the required fields are empty
		if($_POST['email'] == '' || $_POST['name'] == '' || $_POST['message'] == '' || $_POST['blue'] == ''){
			//if fields are empty, return to the index with the error message
			$confirm = "Please fill in all required fields.";
			header( "Location: index.php?confirm=$confirm#form" );
		}
		//if required fields have data, then send the form
		else {
		 	// formats the body of the email, with \n as a linebreak. \ before " makes the quotes show up.
			$body = "$name visited your website.\n\n $message";
			 // returns user to the index page with a sucess message
			$confirm = "Thank you!\n I'll return your email soon.";
			//sends the form with the fields from, subject of the email, body of the email, and where the email is from, using the variables above
			mail($to, $subject, $body, "From: $_POST[email]");
			
			header( "Location: index.php?confirm=$confirm#contact" );
		}

} 
// if the user goes straight to the php without hitting submit, they get an error message
else {

	$confirm = "Sorry, this isn't that kind of form.\n Please fill in the blanks and try again.";
	header( "Location: index.php?confirm=$confirm#contact" );

}
?>
