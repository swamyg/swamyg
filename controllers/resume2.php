<?
  $body->set('module_title','resume');
  $body->set('section_title','');  
  if(isset($_GET['section']) && $_GET['section']=='print') {	
    $body->set('section_title','print');
    $body->set('slideshare_html','Slideshare');
	  $body->set('yiktik_html','Yiktik');
	  $body->set('zendesk_html','Zendesk');
	  $body->set('manilla_html','Manilla');    
  } else {
	  $body->set('slideshare_html','<a href="http://slideshare.net" class="normal">Slideshare</a>');
    $body->set('yiktik_html','<a href="http://yiktik.com" class="normal">Yiktik</a>');
    $body->set('zendesk_html','<a href="http://www.zendesk.com" class="normal">Zendesk</a>');
    $body->set('manilla_html','<a href="http://www.manilla.com" class="normal">Manilla</a>');
  }
?>
