<?php
class tag
{
	var $tags;
	var $db;
	function tag($db)
	{
         $this->db=$db;
	}
	function getTags($limit=10)
    {
       $query = "SELECT SYMBOL AS tag, pick_total AS quantity FROM picks ORDER BY SYMBOL ASC LIMIT 0,$limit";
       $this->db->dbexec($query);
       while ($row = $this->db->getRow()) 
           $tags[$row['tag']] = $row['quantity'];
       $max_size = 400; // max font size in %
       $min_size = 100; // min font size in %
       $max_qty = max(array_values($tags));
       $min_qty = min(array_values($tags));
       $spread = $max_qty - $min_qty;
       if (0 == $spread)
	   { // we don't want to divide by zero
	        $spread = 1;
       }
       $step = ($max_size - $min_size)/($spread);
       foreach ($tags as $key => $value)
	   {
          $size = $min_size + (($value - $min_qty) * $step);
	      $tags[$key]=$size;
        }
		return $tags;
      }

	  function getNewsTags($tag)
      {
		if($tag)
		 {
         }
	    else
		 {
		   $query = "SELECT tag AS tag,count AS quantity FROM tags ORDER BY RAND() LIMIT 0,30";
		   $this->db->dbexec($query);
		   while ($row = $this->db->getRow()) 
			   $tags[$row['tag']] = $row['quantity'];
		   $max_size = 300; // max font size in %
		   $min_size = 100; // min font size in %
		   $max_qty = max(array_values($tags));
		   $min_qty = min(array_values($tags));
		   $spread = $max_qty - $min_qty;
		   if (0 == $spread)
		   { // we don't want to divide by zero
				$spread = 1;
		   }
		   $step = ($max_size - $min_size)/($spread);
		   foreach ($tags as $key => $value)
		   {
			  $size = $min_size + (($value - $min_qty) * $step);
			  $tags[$key]=$size;
			}
			return $tags;
         }
	  }//end of getNewsTags
}
?>