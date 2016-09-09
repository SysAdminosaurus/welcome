<h1>Type View</h1>
<p>Listing all Contractors grouped by their listed type, and if they are conformant</p>

<table id="tablesorter" class="tablesorter">
  <thead>
    <tr>
      <th>Company Name</th>
      <th>Type</th>
      <th>Conformant</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($templateData->listofcompanies as $value) { ?>
    <tr>
      <td><?php echo $value["company_name"] ?></td>
      <td><?php echo $value["type_name"] ?></td>
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
