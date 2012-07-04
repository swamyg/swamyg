<?php
class page
{
	var $page_count; //we'll find it.. dont need to supply
	var $posts_count;
	var $posts_per_page;
	var $current_page;//we'll find it.. dont need to supply
	var $previous_page;//we'll find it.. dont need to supply
	var	$next_page;
	var $page_link;
	var $show_by_recent;
	var $page_string;
	var $clean_URL;
	function page($posts_count,$posts_per_page,$current_page,$page_link,$clean_URL=1,$show_by_recent=0)
	{
	   $this->posts_count=$posts_count;
	   $this->posts_per_page=$posts_per_page;
       $this->current_page=$current_page;
	   $this->page_link=$page_link;
	   $this->clean_URL=$clean_URL;
	   $this->show_by_recent=$show_by_recent;
	  /*echo "8888888888 $this->page_count $this->posts_count $this->posts_per_page $this->current_page $this->page_link $this->show_by_recent";*/
	  $this->page_count=ceil($posts_count/$posts_per_page);
	}
	function generate()
	{
		$page_link=$this->page_link;
	    //echo "<br>$page_count *** $posts_count dsdfsf<br>";
	    $this->page_string="<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
	   if ($this->current_page==1||!isset($this->current_page))
	   {
	    $this->page_string.="<tr><td><span style=\"font: bold 75% Tahoma,sans-serif;color:#CCCCCC;margin:0em 0em 0em 0.75em\">< Previous </span></td><td></td>";
		$this->current_page=1;
	   }
	   else
	   {
			   $this->previous_page=$this->current_page-1;
			   //$page_link=$base_url."news/".$news_section;
			   if($this->show_by_recent)
				$page_link.="/recent";
			   if($this->clean_URL)
			      $page_link.="/page".$this->previous_page; // /page1...page45 etc
			   else
				  $page_link.="&page=".$this->previous_page;
			   $this->page_string.="<tr><td><a style=\"font: bold 75% Tahoma,sans-serif;margin:0em 0em 0em 0.75em\" href=$page_link>< Previous</a></td ><td></td>";
	   }
	   $first_displayed=0; // if they're not used then the first and last are displayed multiple times.
	   $last_displayed=0;
	   for($i=1;$i<=$this->page_count;$i++)
		  {
		   $page_link=$this->page_link; //everytime page_link should be reset;
		    if($this->current_page-$i>2&&!$first_displayed)
			 {
				$first_displayed=1;
                //$page_link=$base_url."news/".$news_section;
				if($this->show_by_recent)
					$page_link.="/recent";
				if($this->clean_URL)
				   $page_link.="/page1";
				else
                   $page_link.="&page=1";
				$this->page_string.="<td class=\"page_num\"><a href=\"".$page_link."\">1</a></td><td class=\"page_num\">...</td>";
			 }
			 elseif($i-$this->current_page>5&&!$last_displayed) // page numbers till 5 only after that last page should
			 {
                $last_displayed=1;
				//$page_link=$base_url."news/".$news_section;
				if($this->show_by_recent)
					$page_link.="/recent";
				if($this->clean_URL)
				  $page_link.="/page".$this->page_count;
				else
				  $page_link.="&page=".$this->page_count;
				$this->page_string.="<td class=\"page_num\">...</td> <td class=\"page_num\"><a href=\"".$page_link."\">".$this->page_count."</a></td>";
			 }
			 elseif($i==$this->current_page)
			 {
				//$page_link=$base_url."news/".$news_section;
				if($this->show_by_recent)
					$page_link.="/recent";
				if($this->clean_URL)
				  $page_link.="/page".$i;
				else
				  $page_link.="&page=".$i;
				$this->page_string.="<td class=\"current_page\">$i</td>";
			 }
			 elseif(!$last_displayed)// if not used last is displayed multiple times but without '...'
			 {
			   if($this->current_page-$i>2)
				  continue;
			   //$page_link=$base_url."news/".$news_section;
			   if($this->show_by_recent)
					$page_link.="/recent";
			   if($this->clean_URL)
			     $page_link.="/page".$i;
			   else
				 $page_link.="&page=".$i;
	          $this->page_string.="<td class=\"page_num\"><a href=\"".$page_link."\">".$i."</a></td>";
			 }
		  } //end of FOR loop
		  $page_link=$this->page_link; //everytime page_link should be reset;
		  if($this->current_page==$this->page_count)
		    $this->page_string.="<td><span style=\"font: bold 75% Tahoma,sans-serif;color:#CCCCCC;margin:0em 0em 0em 0.75em\">Next ></span></td>";
	     else
		   {  
			   $this->next_page=$this->current_page+1;
			  // $page_link=$base_url."news/".$news_section;
			   if($this->show_by_recent)
				$page_link.="/recent";
			   if($this->clean_URL)
			     $page_link.="/page".$this->next_page;
			   else
                 $page_link.="&page=".$this->next_page;
			   $this->page_string.="<td><a style=\"font: bold 75% Tahoma,sans-serif;margin:0em 0em 0em 0.75em\" href= $page_link>Next ></a></td >";
		   }
        $this->page_string.="</tr></table>";
		return  $this->page_string;
	}  
}
?>