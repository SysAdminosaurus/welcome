<h1>Supporting evidence</h1>
<p>As part of our Safeguarding process we need to ensure that we have taken appropriate measures to safeguard our students and therefore we require evidence of certain documentation.</p>
<p>For a full list of requirements please read our <a href="/Public/documents/evidenceRequired.pdf">Evidence requirments guidelines</a>.</p>

<a href="/profile/<?php echo $_SESSION['companyID'];?>/upload" class="button">Upload new document</a>

<table id="tablesorter" class="tablesorter">
  <thead>
    <tr>
      <th>Document Name</th>
      <th>Date Uploaded</th>
      <th>Expires</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($templateData->evidencelist as $value) { ?>
    <tr>
      <td><?php echo "<a href=\"" . $value["evidence_href"] . "\" target=\"_new\">" . $value["evidence_name"] . "</a>"; ?></td>
      <td><?php echo date("d/m/Y", strtotime(@$value["date_uploaded"])); ?></td>
      <td><?php echo date("d/m/Y", strtotime(@$value["expires"])); ?></td>
      <td>
        <form method="post" action="" name="remove_evidence">
          <button name="remove" type="submit" value="<?php echo $value["id"];?>">Remove</button>
        </form>
      </td>
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
