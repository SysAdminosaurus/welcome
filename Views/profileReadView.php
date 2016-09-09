<h1>Required Reading</h1>
<p>Please read the guidance below and confirm you have agreed to terms in each document.</p>
<p>If you have any questions please raise them with your CLC contact</p>
<table id="tablesorter" class="tablesorter">
  <thead>
    <tr>
      <th>Document to read</th>
      <th>Confirmation</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($templateData->documentlist as $value) { ?>
    <tr style="height: 3rem;">
      <td><?php echo "<a href=\"" . $value["document_href"] . "\" target=\"_new\">" . $value["document_name"] . "</a>"; ?></td>
      <td>
        <?php if (!$value["compliance"]) { ?>
          <a href="/profile/<?php echo $_SESSION['companyID'];?>/read/<?php echo $value["id"]; ?>" class="button">I Have Read</a>
        <?php } ?>
        <?php if ($value["compliance"]) { echo "agreed on " . date("d/m/Y H:i", strtotime(@$value["compliance"])); } ?>
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
