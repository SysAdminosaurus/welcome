<h1>Login</h1>
<p>Welcome to CLC <?php echo CODENAME ?>.</p>
<p>Please login with the details provided via email.</p>
<p>If you have any questions please contact the <a href="mailto:fisherd@cheltladiescollege.org">Health &amp; Safety manager</a></p>
<form method="post" action="#" name="loginform" id="loginform">
  <fieldset>
    <legend>login form</legend>
    <?php if ($templateData->errorMessage) {
        echo "<div class=\"error\">" . $templateData->errorMessage . "</div>";
      } ?>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" alt="email" required="true" />
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" alt="password" required="true" />
  </fieldset>
      <button type="submit" name="submit" id="submit">Login</button>
      <p>
        <a href="/forgot/" title="forgotten your password?">Forgotten your password?</a>
      </p>
</form>
<script type="text/javascript">
	$(function() {
		$("#loginform").validate();
	 });
</script>
