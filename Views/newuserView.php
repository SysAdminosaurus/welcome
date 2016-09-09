<h1>Create New User/Contractor</h1>
<p>Complete the form the contact email in the form will be emailed with details on how to log into the system and reset their password.</p>
<?php if ($templateData->message) { echo "<p class=\"error\">" . $templateData->message . "</p>"; } ?>
<form method="post" action="" id="newuserform" name="newuserform">

  <fieldset>
    <legend>Company Details</legend>
    <label for="company_name">Company name:</label>
    <input type="text" name="company_name" id="company_name" REQUIRED value="<?php echo $templateData->companyinfo['company_name'];?>"/>
  </fieldset>

  <fieldset>
    <legend>Company Contact</legend>
    <label for="friendly_name">Contact Name:</label>
    <input type="text" name="friendly_name" id="friendly_name" REQUIRED/>
    <label for="email">Contact Email:</label>
    <input type="email" name="email" id="email" REQUIRED/>
  </fieldset>

  <button type="submit" name="submit" id="submit">Create New User</button>
</form>

<script type="text/javascript">
	$(function() {
		$("#newuserform").validate();
	 });
</script>
