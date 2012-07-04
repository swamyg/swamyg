<?php
Class body
{
  var $output=NULL;
  function buildup($content)
  {
    $this->output.=$content;
  }
  function set($name,$value)
  {
     $this->vars[$name] = $value;
  
  }
  function fetch($file)
  {
   
        if (!empty($this->vars)) 
           {
			extract($this->vars);          // Extract the vars to local namespace
		}
    
    ob_start();
    include($file);
    $contents=ob_get_contents();
    ob_end_clean();
    return $contents;
  }
  function display()
  {
    return $this->output;
  }
  function clear()
  {
    $this->output=NULL;
  }
}
?>