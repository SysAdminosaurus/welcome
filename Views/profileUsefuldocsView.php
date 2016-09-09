<h1>College Documents</h1>
<p>The following documents and links have been provided to contractors as general reference tools while on site.</p>
<ul>
  <?php foreach($templateData->documentlist as $value) { echo "<li><a href=\"" . $value["document_href"] . "\">" . $value["document_name"] . "</a></li>"; } ?>
</ul>
