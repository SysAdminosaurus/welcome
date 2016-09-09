<h1>Approve Company</h1>
<p>Please review the uploaded company evidence, when reviwed the company can be marked as "Conformant" by clicking "I Agree"</p>

<?php if ($templateData->message) { echo "<p class=\"error\">" . $templateData->message . "</p>"; } ?>

<form action="" method="post" name="agree" id="agree">
    <button type="submit" name="submit" id="submit">I Agree</button>
</form>
