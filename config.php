<?php
$CFG_Url= "http://swamyg.com/";
$base_url="/";
$data_path="/data/";
//$BASEDIR="/home/yiktkcom/public_html";

//turn off all error reporting
//error_reporting(0);
ini_set("mysql.trace_mode","Off");

//Globals
$globals=array();
$globals['year']='2008';
$globals['modules']=array('about'=>'about','projects'=>'projects','blog'=>'http://blog.swamyg.com','resume'=>'resume','find me here'=>'findme','links'=>'links','contact'=>'contact');
$globals['blog_link']='http://blog.swamyg.com';
?>