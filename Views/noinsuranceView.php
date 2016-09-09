<h1>No Insurance View</h1>
<p>List of Companies showing if proof of insurance has been uploaded to their account.</p>

<table id="tablesorter" class="tablesorter">
  <thead>
    <tr>
      <th>Company Name</th>
      <th>Insurance Uploaded</th>
      <th>Conformant</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($templateData->companylist as $value) { ?>
    <tr>
      <td><?php echo $value["company_name"] ?></td>
      <td><?php echo $value["insurance"] ?></td>
      <td><?php echo isset($value["approved"]) ? date("d/m/Y", strtotime($value["approved"])) : "Non Conformant"; ?></td>
    </tr>
<?php } ?>
  </tbody>
</table>
<script>
  // activate table sorting jquery library
  $(document).ready(function() {
    $("#tablesorter").tablesorter();
  });
</script>
