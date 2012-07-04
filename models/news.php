<?php
/*Class for NEWS*/
Class news
{
 var $promote_level		= "0";
 var $records_to_page	= "5";
 var $db;
  function news($db)
	  {
		$this->db		= $db;
		//$this->user		= new userManage($this->db);
	  }
  function getIDfromLink($link)
	{
	  $query="SELECT ID from posts where link ='".$link."'";
	  $this->db->dbexec($query);
	  $row=$this->db->getRow();
	  return $row['ID'];
	}
  function getStoryData($link='',$page='',$promoted=1,$cat='',$posts_per_page=8,$visitor)
	  {	    	   
		$sql="SELECT SQL_CALC_FOUND_ROWS  
       p.title
     , p.link
     , p.content
     , p.date_posted
     , p.category
     , p.url
     , p.submitted_user_id
     , p.ID
     , p.tags
	 , p.vote_count
	 , (
	     SELECT user_id
		 FROM users
		 WHERE users.ID=p.submitted_user_id
	  ) AS user_name
     , (
	     SELECT cat_title
		 FROM post_cats 
		 WHERE post_cats.ID = p.category
       ) AS cat_title
	 , ( 
	     SELECT url
		 FROM post_cats 
		 WHERE post_cats.ID = p.category
	   ) AS cat_url	 
	 , (
	     SELECT COUNT( * ) 
		 FROM post_comments 
		 WHERE post_id = p.ID
	   ) AS comment_count
	 , (
	     SELECT rating
		 FROM post_ratings AS pr
		 WHERE pr.post_id = p.ID
	    ) AS rating 
	  , (
	       SELECT ((pr.rating * p.vote_count)/(".time()."-p.date_posted))
		   FROM post_ratings pr WHERE pr.post_id = p.ID
		 ) AS buzz ";

	  if(!$visitor)
		$sql.=",(
	              SELECT user_rating 
	              FROM post_votes 
			      WHERE post_id = p.ID AND user_id = '".$_SESSION['user_id']."'
				 ) AS my_rating ";
     $sql.="FROM posts AS p ";
	  /*LEFT OUTER JOIN post_cats AS pc ON pc.ID = p.category 
	  LEFT OUTER JOIN users AS u ON u.user_id = p.submitted_user_id 
	  LEFT OUTER JOIN post_ratings AS pr ON pr.post_id = p.ID";*/
	/*if(!$visitor)
		$sql.=" LEFT OUTER JOIN user_rating ur ON ur.user_id ='".$_SESSION['user_id']."' AND ur.post_id = p.ID"; //gets the rating the current user (session) has given to this particualr post*/ 
	if(!empty($cat))
		$sql.=" WHERE p.category='".$cat."'";
	if(!empty($link)){$post_id=$this->getIDfromLink($link);$sql.=" AND p.ID='$post_id'";	}
	else{
	      if($promoted){
			 if(!empty($cat))
		         $sql.=" AND (".time()."-p.date_posted)>3600 ORDER BY buzz DESC";
			 else
				 $sql.=" WHERE (".time()."-p.date_posted)>3600 ORDER BY buzz DESC";
		  }
	      else
		     $sql.=" ORDER BY p.date_posted DESC";
	}
    //$sql.=" ORDER BY p.date_posted DESC";
	if($page!="0"){ $page--; $sql.=" LIMIT ".($page*$posts_per_page).",".$posts_per_page;}
		
		//echo "SQL: ".$sql."<br/>";
		$this->db->dbexec($sql);
		while($rows=$this->db->getRow())
		{
			$results[]=$rows;
		}
		return $results;
	}
	function rateNews($post_id,$rating,$registry){
		$user_id=$_SESSION['user_id'];
		$query="SELECT pr.rating,count(distinct pv.ID) as vote_count from post_ratings pr LEFT JOIN post_votes pv on pv.post_id=pr.post_id WHERE pr.post_id='".$post_id."' group by pr.rating";
		$this->db->dbexec($query);
		$row=$this->db->getRow();
		$product=$row['rating']*$row['vote_count'];
		$row['vote_count']++;
		$avg=@number_format((($product+$rating)/$row['vote_count']),1);
		$query="UPDATE post_ratings SET rating='".$avg."' WHERE post_id='".$post_id."'";
			$this->db->dbexec($query);
		$query="INSERT INTO post_votes (post_id,user_id,date_voted,user_rating) values ('".$post_id."','".$user_id."','".time()."','".$rating."')";
			$this->db->dbexec($query);
		$query="UPDATE posts SET vote_count=vote_count+1 WHERE ID='".$post_id."'";
			$this->db->dbexec($query);
		$registry->set("vote_count",$row['vote_count']);
		$registry->set("rating",$avg);
		//push the post ID in the $_SESSION['voted_posts']
		array_push($_SESSION['voted_posts'],$post_id);

	}
	function unvote($post_id,$registry){
		$user_id=$_SESSION['user_id'];
		$query="SELECT 
		        pr.rating
				, count(distinct pv.ID) as vote_count
				,(
				   SELECT user_rating from post_votes
				   WHERE post_id='".$post_id."' AND user_id='".$user_id."'
				  ) AS user_rating 
				FROM post_ratings pr 
				LEFT JOIN post_votes pv on pv.post_id=pr.post_id 				
				WHERE pr.post_id='".$post_id."'
				GROUP BY pr.rating";
		$this->db->dbexec($query);
		$row=$this->db->getRow();
		$product=$row['rating']*$row['vote_count'];
		$user_rating=$row['user_rating'];
		$row['vote_count']--;
		$avg=@number_format((($product-$user_rating)/$row['vote_count']),1);
		$query="UPDATE post_ratings SET rating='".$avg."' WHERE post_id='".$post_id."'";
			$this->db->dbexec($query);
		$query="DELETE FROM post_votes WHERE post_id='".$post_id."' AND user_id='".$user_id."'";
			$this->db->dbexec($query);
		$query="UPDATE posts SET vote_count=vote_count-1 WHERE ID='".$post_id."'";
			$this->db->dbexec($query);
		$registry->set("vote_count",$row['vote_count']);
		$registry->set("rating",$avg);
		//push the post ID in the $_SESSION['unvoted']
		$_SESSION['voted_posts']=array_diff($_SESSION['voted_posts'],array($post_id));
	}
	 function getUserNews($userid,$page=1,$show_by='submitted',$posts_per_page,$visitor=0,$notcount=1)
	  {
		$sql="SELECT ";
		if($notcount)
			$sql.="SQL_CALC_FOUND_ROWS ";
		$sql.="p.title,
		      p.link,
			  p.content,
			  p.date_posted,
			  p.category,
			  p.url,
			  p.submitted_user_id,
			  p.ID,
			  p.tags
			  ,(
			     SELECT user_id
				 FROM users 
				 WHERE users.ID=p.submitted_user_id
				) AS user_name
			  , (
	              SELECT cat_title
		          FROM post_cats 
		          WHERE post_cats.ID = p.category
                ) AS cat_title
			  , ( 
	              SELECT url
		          FROM post_cats 
		          WHERE post_cats.ID = p.category
	            ) AS cat_url
			  , (
	              SELECT COUNT( * ) 
                  FROM post_votes 
		          WHERE post_id = p.ID
		         ) AS vote_count
			   , (
	               SELECT COUNT( * ) 
		           FROM post_comments 
		           WHERE post_id = p.ID 
	             ) AS comment_count			
			    ,(
	               SELECT rating
		           FROM post_ratings AS pr
		           WHERE pr.post_id = p.ID
	              ) AS rating
				,(
	               SELECT user_rating 
	               FROM post_votes 
			       WHERE post_id = p.ID AND user_id = '".$userid."'
				 ) AS user_rating ";
		  if(!$visitor){
		     $sql.=",(
	               SELECT user_rating
	               FROM post_votes 
			       WHERE post_id = p.ID AND user_id = '".$_SESSION['user_id']."'
				 ) AS my_rating ";
		  }
		  $sql.="from  posts p";
		  /*if(!strcmp($show_by,"voted"))
			$sql.=" INNER JOIN post_votes user_pv ON user_pv.post_id=p.ID";
		  elseif(!strcmp($show_by,"comments"))
		    $sql.=" INNER JOIN post_comments user_com ON user_com.post_id=p.ID";
		$sql.=" left join post_cats pc on pc.ID=p.category left join users u on u.user_id=p.submitted_user_id LEFT OUTER JOIN post_votes pv ON pv.post_id=p.ID LEFT OUTER JOIN post_comments pcom on pcom.post_id=p.ID left join post_ratings pr ON pr.post_id=p.ID";
		$sql.=" LEFT JOIN user_rating usr_rating ON usr_rating.user_id ='".$userid."' AND usr_rating.post_id = p.ID";
		if(!$visitor)
		  $sql.=" LEFT JOIN user_rating ur ON ur.user_id ='".$_SESSION['user_id']."' AND ur.post_id = p.ID"; //gets the rating the current user (session) has given to this particualr post

		//$sql.="and pv.post_id=p.ID";*/
		if(!strcmp($show_by,"voted")) {
           $sql.=" JOIN post_votes pv ON pv.post_id=p.ID 
		           WHERE  p.submitted_user_id!='".$userid."' 
				   AND pv.user_id='".$userid."'";
		   $sql.=" GROUP BY p.title,p.link,p.content,p.date_posted,p.category,p.url,p.submitted_user_id,p.ID";
	       $sql.=" ORDER BY pv.date_voted DESC";
		}
		
		elseif(!strcmp($show_by,"comments")){
		   $sql.=" JOIN post_comments pcom ON pcom.post_id=p.ID
		           WHERE pcom.user_id='".$userid."'";
		   $sql.=" GROUP BY p.title,p.link,p.content,p.date_posted,p.category,p.url,p.submitted_user_id,p.ID";
	       $sql.=" ORDER BY pcom.date_posted DESC";
		}
		else {
		   $sql.=" where p.submitted_user_id='$userid'";
		   $sql.=" group by p.title,p.link,p.content,p.date_posted,p.category,p.url,p.submitted_user_id,p.ID";
	       $sql.=" order by p.date_posted DESC";
		}
		if($notcount){
		if($page!="0"){ $page--; $sql.=" LIMIT ".($page*$posts_per_page).",".$posts_per_page;}
		}
		//echo "SQL: ".$sql."<br/>";
		$this->db->dbexec($sql);
		while($rows=$this->db->getRow())
		{			
			if(!strcmp($show_by,"comments")&&$notcount)
				$rows['user_comments']=$this->getUserComments($userid,$rows['ID']);
			$results[]=$rows;
		}
		return $results;
		
	}
	function getComments($link){
		$post_id=$this->getIDfromLink($link);
		$sql="SELECT 
		         pcom.content
				 ,pcom.user_id
				 ,pcom.post_id
				 ,pcom.date_posted
				 ,pcom.ID
				 ,u.user_id AS user_name 
				 FROM post_comments pcom LEFT JOIN users u ON u.ID=pcom.user_id 
				 WHERE pcom.post_id='".$post_id."' 
				 ORDER BY date_posted ASC";
		$this->db->dbexec($sql);
		while($rows=$this->db->getRow())
		{
			$results[]=$rows;
		}
		return $results;
	}
	function getUserComments($user_id,$post_id){
		//include_once('db.php');
		$db2=clone $this->db;
		$sql="SELECT 
		        pcom.content
				,pcom.user_id
				,pcom.post_id
				,pcom.date_posted
				,pcom.ID
				,u.user_id AS user_name 
		      FROM post_comments pcom
			  LEFT JOIN users u ON u.ID=pcom.user_id
			  WHERE pcom.post_id='".$post_id."' AND pcom.user_id='".$user_id."'";
			  //echo $sql;
		$db2->dbexec($sql);
		while($rows=$db2->getRow())
		{
			$results[]=$rows;
		}
		return $results;
	}
	function insertComment($comment,$post_id,$user_id,$comments_last_recived){
		$sql="INSERT INTO post_comments(content,post_id,user_id,date_posted) values ('$comment','$post_id','$user_id',".time().")";
		$this->db->dbexec($sql);
		$sql="SELECT 
		        pcom.content
		        ,pcom.user_id
				,pcom.post_id
				,pcom.date_posted
				,pcom.ID
				,u.user_id AS user_name 
		      FROM post_comments pcom LEFT JOIN users u ON pcom.user_id=u.ID
			  WHERE pcom.post_id='".$post_id."' AND pcom.date_posted > '".$comments_last_recived."'";
	    //echo $sql;
		$this->db->dbexec($sql);
		while($comment=$this->db->getRow())
			$comments[]=$comment;
				return $comments;
	}
	function search($search,$page,$sortby="votes",$byTag=0,$posts_per_page=8,$visitor)
	{
		$sql="SELECT SQL_CALC_FOUND_ROWS 
		p.title
		,p.link
		,p.content
		,p.date_posted
		,p.category
		,p.url
		,p.submitted_user_id
		,p.ID
		,p.tags
		,(
	      SELECT user_id
		  FROM users
		  WHERE users.ID=p.submitted_user_id
	     ) AS user_name
		,       (
	              SELECT cat_title
		          FROM post_cats 
		          WHERE post_cats.ID = p.category
                ) AS cat_title
			  , ( 
	              SELECT url
		          FROM post_cats 
		          WHERE post_cats.ID = p.category
	            ) AS cat_url
			  , (
	              SELECT COUNT( * ) 
                  FROM post_votes 
		          WHERE post_id = p.ID
		         ) AS vote_count
			   , (
	               SELECT COUNT( * ) 
		           FROM post_comments 
		           WHERE post_id = p.ID 
	             ) AS comment_count			
			    ,(
	               SELECT rating
		           FROM post_ratings AS pr
		           WHERE pr.post_id = p.ID
	              ) AS rating";				
		  if(!$visitor){
		     $sql.=",(
	               SELECT user_rating 
	               FROM post_votes 
			       WHERE post_id = p.ID AND user_id = '".$_SESSION['user_id']."'
				 ) AS my_rating ";
		  }
		  $sql.=" from  posts p";
				
		if($byTag)
           $sql.=" WHERE p.tags LIKE '%".$search."%'";
		else
		   $sql.=" WHERE p.title LIKE '%$search%'";
		$sql.=" group by p.title,p.link,p.content,p.date_posted,p.category,p.url,p.submitted_user_id,p.ID";
		switch(strtolower($sortby))
	    {
		   case "newest first":
               $sql.=" ORDER BY p.date_posted DESC";
			   break;
		   case "oldest first":
			   $sql.=" ORDER BY p.date_posted ASC";
			   break;
		   default:
			   $sql.=" ORDER BY vote_count desc";
			   break;
	    }
		$page--; // the limit should start from 0
		$sql.=" LIMIT ".($page*$posts_per_page).",".$posts_per_page;
		//echo $sql;
		$this->db->dbexec($sql);
		while($rows=$this->db->getRow())
		{
			$results[]=$rows;
		}
		return $results;
	}  
	function getNewsCategories()
	{
		$query="SELECT cat_title,url from post_cats";
		$this->db->dbexec($query);
		while($rows=$this->db->getRow())
			$categories[]=$rows;
		return $categories;
	}
}
?>
