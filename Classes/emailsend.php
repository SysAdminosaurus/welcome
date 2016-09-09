<?php

class emailsend {

  public function email_user($to, $title, $message)
  {
    $from = "noreply@cheltladiescollege.org";
  	$headers = "From:" . $from . "\r\n";
  	$headers .= "Reply-To:" . $from . "\r\n";
  	$headers .= "MIME-Version: 1.0" . "\r\n";
  	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
  	$headers .= "X-Mailer: PHP/" . phpversion();
  	$msgto = $to;
  	$msgtitle = $title;
  	$msgheaders = $headers;
  	$message = wordwrap($message, 70, "\r\n");
  	$msgbody = $message;
  	mail($msgto, $msgtitle, $msgbody, $msgheaders);
  }

}
