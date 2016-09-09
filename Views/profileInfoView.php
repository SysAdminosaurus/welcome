<h1>Contractors Form</h1>
<p>Please complete the Contractors information sheet</p>
<form method="post" action="" id="contractorsform" name="contractorsform">

  <fieldset>
    <legend>Company Details</legend>
    <label for="company_name">Company name:</label>
    <input type="text" name="company_name" id="company_name" value="<?php echo $templateData->companyinfo['company_name'];?>" required="true" />
  </fieldset>

  <fieldset>
    <legend>Company Address and Contact</legend>
    <label for="companyaddress">Company Address:</label>
    <textarea rows="4" cols="50" name="companyaddress" id="companyaddress" required="true"><?php echo $templateData->companyinfo['company_address'];?></textarea>
    <label for="contactname">Contact Name:</label>
    <input type="text" name="contactname" id="contactname" value="<?php echo $templateData->companyinfo['contact_name'];?>" required="true" />
    <label for="contactposition">Contact Position:</label>
    <input type="text" name="contactposition" id="contactposition" value="<?php echo $templateData->companyinfo['contact_position'];?>" required="true" />
    <label for="contacttel">Contact Telephone Number:</label>
    <input type="text" name="contacttel" id="contacttel" value="<?php echo $templateData->companyinfo['contact_tel'];?>" required="true" />
    <label for="contactemail">Contact Email:</label>
    <input type="email" name="contactemail" id="contactemail" value="<?php echo $templateData->companyinfo['contact_email'];?>" required="true" />
  </fieldset>

  <fieldset>
    <legend>Scope of Work</legend>
    <label for="companyhealthandsafety">Who in your organisation is ultimately responsible for health &amp; safety?</label>
    <input type="text" name="companyhealthandsafety" id="companyhealthandsafety" value="<?php echo $templateData->companyinfo['company_HSO'];?>" required="true" />
    <label for="scope">Explain the scope of works/services or specific project to be undertaken on behalf of CLC:</label>
    <textarea rows="4" cols="50" name="scope" id="scope" required="true"><?php echo $templateData->companyinfo['company_scope'];?></textarea>
  </fieldset>

  <button type="submit" name="submit" id="submit">Update Details</button>

</form>

<script type="text/javascript">
	$(function() {
		$("#contractorsform").validate();
	 });
</script>
