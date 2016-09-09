<h1>Insurance Due View</h1>
<p>Companies with insurance due in the next 30 days or insurance that has expired.</p>

<table id="tablesorter" class="tablesorter">
  <thead>
    <tr>
      <th>Company Name</th>
      <th>Insurance expires</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($templateData->insurancedue as $value) { ?>
    <tr>
      <td><?php echo $value["company_name"] ?></td>
      <td><?php echo date("d/m/Y", strtotime($value["expires"])) ?></td>
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
