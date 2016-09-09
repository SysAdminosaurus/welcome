<h1>Admin Login</h1>
<form method="post" action="#" name="loginform" id="loginform">
  <fieldset>
    <legend>login form</legend>
    <?php if ($templateData->errorMessage) {
        echo "<div class=\"error\">" . $templateData->errorMessage . "</div>";
      } ?>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" alt="username" REQUIRED />
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" alt="password" REQUIRED/>
  </fieldset>
  <button type="submit" name="submit" id="submit">Login</button>
</form>
<script type="text/javascript">
	$(function() {
		$("#loginform").validate();
	 });
</script>
