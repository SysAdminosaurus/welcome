<?php
// destroys session and returns you to login
session_destroy();
header('Location: /');
exit;
