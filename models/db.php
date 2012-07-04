<?php
class db
{
 var $dblink;
 var $db;
 var $res;
 function db($dbhost,$dbuser,$dbpass)
 {
   $this->dblink = (mysql_connect($dbhost,$dbuser,$dbpass));
   
 }
 function dbselect($dbname)
 {
   mysql_select_db($dbname,$this->dblink);
   return $this->db;
 }
 function dbexec($sql_query)
 {
   $this->res=mysql_query($sql_query,$this->dblink) or die(mysql_error());
   //return $this->res;
 }
 function getRow () 
 {
    if ($row=mysql_fetch_array($this->res,MYSQL_ASSOC) )
	  return $row;
	else
       return false;
 }
 function recordExists($query)
 {
   $this->res=mysql_query($query,$this->dblink);
   $data=@mysql_fetch_array($this->res);
   if(empty($data))
     return 0;  //IF record doesn't exist, then return 0
   else
    return 1; // else return 1
 }
}
