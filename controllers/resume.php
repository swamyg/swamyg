<?
  $body->set('module_title','resume');
  $body->set('section_title','');
  if(isset($_GET['ver']) && $_GET['ver']=='short') {	
    $body->set('ver','short');
    $body->set('slideshare_html','Slideshare<sup>1</sup>');
	  $body->set('yiktik_html','website<sup>2</sup>');    
  } 
  if(isset($_GET['section']) && $_GET['section']=='print') {	
    $body->set('section_title','print');
    $body->set('slideshare_html','Slideshare<sup>1</sup>');
	  $body->set('yiktik_html','Yiktik<sup>2</sup>');
	  $body->set('zendesk_html','Zendesk<sup>3</sup>');
	  $body->set('manilla_html','Manilla<sup>4</sup>');    
  } else {
	  $body->set('slideshare_html','<a href="http://slideshare.net" class="normal">Slideshare</a>');
    $body->set('yiktik_html','<a href="http://yiktik.com" class="normal">Yiktik</a>');	
    $body->set('zendesk_html','<a href="http://www.zendesk.com" class="normal">Zendesk</a>');
    $body->set('manilla_html','<a href="http://www.manilla.com" class="normal">Manilla</a>');
  }
?>
