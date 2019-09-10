<?
	$pass = unserialize(base64_decode($_GET['pass']));
	//print_r($pass);
?>

<h2><span id="contactme"></span>Contact Me</h2>
<div id="buttons">
	<ul>
    	<li><a href="mailto:heyamanda@amandagerold.com" ><img src="http://www.amandagerold.com/wp-content/themes/customtheme/images/email.jpg" alt="Email" title="Email" /> Email</a></li>
        <li><a href="Amanda Gerold.vcf"><img src="http://www.amandagerold.com/wp-content/themes/customtheme/images/vcard.jpg" alt="vCard" title="vCard" /> vCard</a></li>
        <li><a href="http://twitter.com/amandagerold" target="_blank" ><img src="http://www.amandagerold.com/wp-content/themes/customtheme/images/twitter.jpg" alt="Twitter" title="Twitter" /> Twitter</a></li>
        <li><a href="http://www.linkedin.com/in/amandagerold" target="_blank" ><img src="http://www.amandagerold.com/wp-content/themes/customtheme/images/linkedin.jpg" alt="LinkedIn" title="LinkedIn" /> LinkedIn</a></li>
        <li><a href="http://www.facebook.com/album.php?profile=1&id=1552025168#!/profile.php?id=1552025168" target="_blank" ><img src="http://www.amandagerold.com/wp-content/themes/customtheme/images/facebook.jpg" alt="Facebook" title="Facebook" /> Facebook</a></li>
    </ul>
</div>

<div id="form">

	<form method="post" action="mailto.php">
    
    <fieldset>
        <ul>
            <li><label for="name">Name:</label>
            <input id="name" type="text" name="name" value="<? echo $pass['name']; ?>" /></li>
               
            <li><label for="email">Email:</label>
            <input id="email" type="text" name="email" value="<? echo $pass['email']; ?>" /></li>
               
            <li><label for="message">Message:</label>
            <textarea id="message" name="message" rows="2" cols="2"><? echo $pass['message']; ?></textarea></li>
            
            <li><label for="blue">Type the word <strong>Blue</strong> into this box:</label>
            <input id="blue" type="text" name="blue" value="<? echo $pass['blue']; ?>" /></li>
        </ul>
    </fieldset>
    
    <fieldset class="submit">
    	* Please fill out all fields <input class="submit" type="submit" value="Submit" name="submit" /> 
    </fieldset>
    
</form>
</div>

<div id="echo">
<? 
// set my error messages
$error = "<h5>Oops!</h5>Please fill in all the blanks."; // if any fields are blank

$success = "<h4>Thank you!</h4> I'll return your email soon."; // if the form is sent successfully

$oops = "<h5>Sorry, this isn't that kind of form.</h5>Please fill in the blanks and try again."; // if they try to go to the mailto file directly

$wrong = "<h5>Oops!</h5>The correct answer is Blue.<br/> Please try again."; // if they don't answer 'blue'

$invalid = "<h5>Oops!</h5>Please enter a valid email address."; // if the email is invalid

// checks which message the mailto file returned in $confirm and echo's the right error message
if($_GET[confirm] == error) {
	
	echo $error;
	
} else if($_GET[confirm] == success) {
	
	echo $success;
	
} else if($_GET[confirm] == oops) {
	
	echo $oops;
	
} else if($_GET[confirm] == wrong) {
	
	echo $wrong;
	
} else if($_GET[confirm] == invalid) {
	
	echo $invalid;
	
} else echo null; // if none of the messages are returned, then set the error message to blank

?></div>

