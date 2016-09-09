<h1>Overview</h1>
<p>Listed are all Contactors in the system, with controls to View as them, Chase them, or sign off documentation.</p>
<h3>Admin Controls</h3>
<p><a href="/admin/reports" class="button">View Reports</a></p>
<p><a href="/admin/newuser" class="button">New Contractor</a></p>
<h3>Contractors</h3>
<?php foreach($templateData->listofcompanies as $value) { ?>
  <div class="companycontrols">
      <form method="post" action="" name="controls">
        <input type="hidden" name="companyID" value="<?php echo $value["id"]; ?>" />
        <h3><?php echo $value["company_name"]; ?></h3>
        <button type="submit" value="review" name="review">Review</button>
        <button type="submit" value="chase" name="chase">Chase</button>
        <button type="submit" value="signoff" name="signoff">Sign Off</button>
      </form>
  </div>
<?php } ?>
