<h1>Insurance &amp; other evidence File Upload</h1>
<p>Use the form to attach your proof of evidence or other files, please note the maximum file size and allowed file types, if you have any questions please raise them with your CLC contact.</p>
<form method="post" action="" id="fileupload" name="fileupload" enctype="multipart/form-data">
  <fieldset>
    <legend>Evidence Details</legend>
    <label for="evidence_name">Document Name</label>
    <input type="text" name="evidence_name" id="evidence_name" REQUIRED/>
    <label for="evidence_type">Document Type</label>
    <select id="evidence_type" name="evidence_type" REQUIRED>
      <option value="" SELECTED>Please Select</option>
      <?php foreach ($templateData->evidence_type_list as $value) { ?>
        <option value="<?php echo $value["id"];?>" ><?php echo $value["evidence_name"];?></option>
      <?php }; ?>
    </select>
    <label for="expires">Expires</label>
    <link rel="stylesheet" href="/public/css/daterangepicker.min.css">
    <script type="text/javascript" src="/public/javascript/moment.js"></script>
    <script type="text/javascript" src="/public/javascript/jquery.daterangepicker.min.js"></script>
    <input id="expires" name="expires" size="60" value="" REQUIRED>
    <script type="text/javascript">
    $('#expires').dateRangePicker({
    startOfWeek: 'monday',
    format: 'YYYY-MM-DD',
    autoClose: true,
    singleDate : true,
    singleMonth: true
    });
    </script>
  </fieldset>
  <fieldset>
    <legend>Upload File</legend>
    <label>Attachment</label>
    <p class="note">Maximum files size 2mb, Types allowed (pdf, word, jpg, png)</p>
    <input type="file" name="attachment" accept="application/pdf,application/msword,image/*" style="background-color: transparent;" id="attachment" REQUIRED>
  </fieldset>
  <button type="submit" name="submit" id="submit">Upload File</button>
</form>
<script type="text/javascript">
	$(function() {
		$("#fileupload").validate();
	 });
</script>
