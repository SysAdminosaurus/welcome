<h1>Reset your password</h1>
<p>Please use the reset code provided via email to set the password for your account.</p>
<p>Enter your reset code, and two matching passwords, your account password will then be changed to this new password, and you can continue to login.</p>

<?php if ($templateData->formError) { echo "<p class=\"error\">" . $templateData->formError . "</p>"; } ?>

<form action="" method="post" id="formReset" name="formReset">
  <fieldset>
    <legend>Reset Password</legend>
    <label for="token">Reset Code:</label>
    <input type="text" name="token" id="token" required="true">
    <label for="password1">New Password</label>
    <input type="password" name="newpassword" id="newpassword" required="true">
    <label for="password2">Confirm Password</label>
    <input type="password" name="confirmpassword" id="confirmpassword" required="true">
  </fieldset>
  <button type="submit" name="reset" id="reset">Reset Password</button>
</form>
<script type="text/javascript">
	$(function() {
		$("#formReset").validate();
	 });
</script>
