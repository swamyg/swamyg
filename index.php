<?php
include_once('config.php');
#include_once('common.php');
//require_once('model/db.php');
//CREATE BODY OBJECT WHICH TAKES CARE OF CREATING THE VIEW (CONTENT BUILDING)
require_once('models/body.class.php');
$body=new body();

$body->set("base_url",$base_url);
$body->set('modules',$globals['modules']);
#$body->set("side_bar",$side_bar);

//echo $_REQUEST['module']."<br/>";
//CHECK FOR WHICH SECTION(module) TO LOAD AND LOAD ACCORDINGLY
if(isset($_REQUEST['module']))
{
 $script=$_REQUEST['module'];
 if(file_exists('controllers'.'/'.$_REQUEST['module'].'.php'))
   $script_name='controllers'.'/'.$_REQUEST['module'].'.php';
 else
	{
	  $_SESSION['error_page']=$_REQUEST['module'];
	  header('Location:'.$CFG_Url.'error');
	  exit;
	}
}
else
{ 
  
  $script="main";
  $script_name="controllers/main.php";

}

require_once($script_name);
//Process the BODY
$template=$script . '.tpl.php';
//echo $template;
$output=$body->fetch('views/'.$template);
echo $output;
?>

