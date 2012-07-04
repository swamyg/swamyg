<?php
Class Registry
{
  var $vars;
  function set($name,$value)
  {
    $this->vars[$name]=$value;
  }
  function get($name)
  {
    return $this->vars[$name];
  }
}
?>