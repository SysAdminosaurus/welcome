<nav>
  <ul>
  <?php if ($_SESSION) { ?>
      <?php if (!$_SESSION['admin']) { ?><li><a href="/profile/<?php echo $_SESSION['companyID']; ?>">Home</a></li><?php } ?>
      <?php if ($_SESSION['admin']) { ?><li><a href="/admin/overview/">Admin Home</a></li><?php } ?>
      <li><a href="/logout/">Logout</a></li>

  <?php } ?>
  <?php if (!$_SESSION) { ?>
    <li><a href="/login/">Login</a></li>
  <?php } ?>
</ul>
</nav>
