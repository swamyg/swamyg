<?
  $body->set('module_title','projects');
  if(isset($_GET['section']))
    $body->set('section_title',$_GET['section']);
  else
    $body->set('section_title','*'); 
?>