<h1>Forgot your password?</h1>
<?php
if ($templateData->message) { echo "<p>".$templateData->message."</p>"; }
if (!$templateData->message) { ?>
<p>Please enter the email address you have registered with the system, you will then receive a password reset email on that email address.</p>
<form action="" method="post" name="forgot" id="forgot">
  <fieldset>
    <legend>enter your email address</legend>
    <label for="email">email address</label>
    <input type="email" name="email" id="email" required="true">
  </fieldset>
  <button type="submit" name="reset" id="reset">Reset Password</button>
</form>
<script type="text/javascript">
	$(function() {
		$("#forgot").validate();
	 });
</script>
<?php } ?>
