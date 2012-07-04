<?
/* CLASS mail 
 (c) yiktik.com */

 class mailer {
	  var $to;
	  var $msg;
	  var $headers;
	  var $subject;
	  var $fromaddress;

	 function mailer($to,$subject,$body,$fromaddress='yiktik@yiktik.com'){

		 $this->to=$to;
		 $this->subject=$subject;
		 $this->fromaddress=$fromaddress;

		 /*
		 $eol="\r\n";
		 $mime_boundary=md5(time());
		 # Common Headers
		 $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
		 $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
		 $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;    // these two to set reply address
		 $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
		 $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters

		 # Boundry for marking the split & Multitype Headers
		 $headers .= 'MIME-Version: 1.0'.$eol.$eol;
		 $headers .= "Content-Type: multipart/alternative; boundary=\"".$mime_boundary."\"".$eol.$eol;

		 # Open the first part of the mail
		 $msg = "--".$mime_boundary.$eol;
		 $htmlalt_mime_boundary = $mime_boundary."_htmlalt"; //we must define a different MIME boundary for this section

		 # Setup for text OR html -
		 $msg .= "Content-Type: multipart/alternative; boundary=\"".$htmlalt_mime_boundary."\"".$eol.$eol;
		 
		 # Text Version
		 $msg .= "--".$htmlalt_mime_boundary.$eol;
		 $msg .= "Content-Type: text/plain; charset=iso-8859-1".$eol;
		 $msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		 $msg .= strip_tags(str_replace("<br>", "\n", $body)).$eol.$eol;

		 /*# HTML Version
		 $msg .= "--".$htmlalt_mime_boundary.$eol;
		 $msg .= "Content-Type: text/html; charset=iso-8859-1".$eol;
		 $msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		 $msg .= $body.$eol.$eol;
		 
		 //close the html/plain text alternate portion
		 $msg .= "--".$htmlalt_mime_boundary."--".$eol.$eol;
		 
		 # Finished
		 $msg .= "--".$mime_boundary."--".$eol.$eol;  // finish with two eol's for better security. see Injection.
		 */
		 $this->msg=$body;
		 		 
	 }

	 function send() {

		 # SEND THE EMAIL
		// ini_set('sendmail_from',$this->fromaddress);  // the INI lines are to force the From Address to be used !
		$headers = "From: noreply@yiktik.com";
		$config = "noreply@yiktik.com";
		 $mail_sent = mail($this->to, $this->subject, $this->msg, $headers);
		// ini_restore('sendmail_from');
        return $mail_sent;
	 }

 }
?>