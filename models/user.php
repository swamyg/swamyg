<?php
/* user_id=Current User's ID , $userid=User id of who's profile current user viewing*/
class user
{
  var $name;
  var $db;
  function user($db){
  $this->db=$db;
  }
  
function registerUser($user_id,$email,$md5){
	$query="INSERT INTO users(user_id,email,password,weight,joined) values ('".$user_id."','".$email."','".$md5."','1.0',".time().")";
	$this->db->dbexec($query);
	return;
}

//used to initialise the user when registering first	
function userInitiate($user_id){
		//initialise stats table, the profile views, news voted etv are automatically initialsed to 0
		$query_stats="INSERT INTO stats(user_id) values ('".$user_id."')";
		$this->db->dbexec($query_stats); 
}
function getUserName($user_id){
	$query="SELECT user_id from users where ID='".$user_id."'";
    $this->db->dbexec($query);
    $user_details=$this->db->getRow();
  return $user_details['user_id'];
}
function getUserID($user_name){
	$query="SELECT ID from users where user_id='".$user_name."'";
    $this->db->dbexec($query);
	//echo $query."<br/>";
    $user_details=$this->db->getRow();
  return $user_details['ID'];
}

/*function getDetails($user_id)
{
  $query="SELECT * from users where user_id='$user_id'";
  $this->db->dbexec($query);
    $user_details=$this->db->getRow();
  return $user_details;
  
}*/
function userExists($user_name){
	$query="SELECT user_id from users where user_id='".$user_name."'";
	$this->db->dbexec($query);
	$user_exists=$this->db->getRow();
	if(!empty($user_exists))
		return 1;
	else
	    return 0;
}
function resetPassword($user_name,$key=0,$md5=0) {
	if($md5){
		$user_ID=$this->getUserID($user_name);
		$sql="SELECT * from reset WHERE user_id='".$user_ID."' AND `key`='".$key."'";
		$this->db->dbexec($sql);
		  $row=$this->db->getRow();
		if(empty($row)){
			return 0;
		}
		else {
			  $sql="UPDATE users SET password='".$md5."' WHERE ID='".$user_ID."'";
			  $this->db->dbexec($sql);
			  $sql="DELETE FROM reset WHERE ID='".$row['ID']."'";
			  $this->db->dbexec($sql);
			  return 1;
		 }
	}
	else{
		  $query="SELECT email from users where user_id='".$user_name."'";
		  $this->db->dbexec($query);
		  $email=$this->db->getRow();
		  $email=$email['email'];
		  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
			  return 0;
		  else{
			  include('form.php');
			  $form=new form();
			  $key=$form->getRandString(16,16);
			  $user_ID=$this->getUserID($user_name);
			  $sql="SELECT * from reset WHERE user_id='".$user_ID."'";
			  $this->db->dbexec($sql);
			  $row=$this->db->getRow();
				  if(empty($row['key'])){
					  $sql="INSERT INTO reset (`key`,`user_id`,`time`) values('".$key."','".$user_ID."','".time()."')";
			  }
			  else {
				  $sql="UPDATE reset SET `key`='".$key."' WHERE `user_id`='".$user_ID."'";
			  }
			  //echo $sql.'<br/>';
			  //echo $key.'<br/>';
			  $this->db->dbexec($sql);
			  $body="You (username:".$user_name.") or someone  has sent a request to reset your yiktik password\n Click on this link to complete the procedure\n";
			  include('config.php');
			  $body.=$CFG_Url."login/reset?username=".$user_name."&key=".$key;
			  $body.="\n If you did not request the reset or if you dont want to reset the password, please igonore this mail.\n";
			  include('mailer.php');
				  $mailer=new mailer($email,"password reset",$body);
			  $mailer->send();
			  return 1;
		  }
	}
}
function generateAvatarPath($userid,$data_path,$base_url,$user_section=1)
{
	if($user_section)
	{
		$query="SELECT avatar,user_id as user_name from users where ID='".$userid."'";
	    $this->db->dbexec($query);
	    $avatarArr=$this->db->getRow();
        $avatar=$avatarArr['avatar'];
		$user_name=$avatarArr['user_name'];
	}	
	else {
	   $avatar=$_SESSION['avatar'];
	   $user_name=$_SESSION['user_name'];
	}
	if($avatar)
	   $avatar_path=$data_path.substr($user_name,0,3)."/".$user_name."/primary.jpg";
	else
		$avatar_path=$base_url."view/css/images/nopic.png";

	return $avatar_path;
		
}
function getProfileDetails($userid)
{
  $query="SELECT * from user_profile WHERE user_profile.user_id='".$userid."'";
  $this->db->dbexec($query);
  $user_profile_details=$this->db->getRow();
  return $user_profile_details;
}
function getAllDetails($userid)
{
	$user_details=$this->getDetails($userid);
	$user_profile_details=$this->getProfileDetails($userid);
	if(!is_array($user_profile_details))
		$user_profile_details=array();
	$user_all_details=array_merge($user_profile_details,$user_details);
	return $user_all_details;
}
function getStats($userid)
{
	//$query="SELECT (SELECT profile_views FROM stats WHERE user_id='".$userid."') as profile_views, (SELECT COUNT(ID) FROM posts WHERE submitted_user_id='".$userid."') as news_submitted,(SELECT COUNT(ID) FROM post_votes WHERE user_id='".$userid."') as news_voted,(SELECT count(ID) FROM post_comments WHERE user_id='".$userid."') as news_comments, (SELECT joined FROM users WHERE user_id='".$userid."') as joined";
	$query="SELECT (SELECT profile_views FROM stats WHERE user_id='".$userid."') as profile_views, (SELECT COUNT(ID) FROM posts WHERE submitted_user_id='".$userid."') as news_submitted,(SELECT COUNT(pv.ID) FROM post_votes pv LEFT JOIN posts p ON pv.post_id=p.ID WHERE pv.user_id='".$userid."' AND p.submitted_user_id!='".$userid."') as news_voted,(SELECT count(ID) FROM post_comments WHERE user_id='".$userid."') as news_comments, (SELECT joined FROM users WHERE ID='".$userid."') as joined";
	
	//echo $query."<br/>";	
	$this->db->dbexec($query);
    $user_stats=$this->db->getRow();
	return $user_stats;
}
/*function getAvatarPath($userid,$data_path,$base_url,$exists) // here user could be self or any other
{
	if($exists)
	  $target_path = $data_path.substr($userid,0,1)."/".$userid."/primary.jpg";
	else
	  $target_path = $base_url."view/css/images/nopic.png";
	return $target_path;
}*/
function search($search_user,$page=1,$results_per_page=5)
{
   //echo $page." ** <br/>";
   $pageNum=$page;
   $user_matches=array();
   $match=array();
   $db2=clone $this->db;
   $query="SELECT SQL_CALC_FOUND_ROWS u.ID,u.user_id AS user_name, u.avatar from users u WHERE u.user_id LIKE '%".$search_user."%'";
   if($page!="0"){ $page--; $query.=" LIMIT ".($page*$results_per_page).",$results_per_page";}
   //echo $query;
   $this->db->dbexec($query);
   //$run_once=1; // to run the found rows() function to get the total number of search results   
   $user_stats=new user($db2);
   while($row=$this->db->getRow())
	{	   
	   if(!empty($row)){
		if($pageNum!=0)
		    $stats=$user_stats->getStats($row['ID']);
		//$row['stats']=$this->getStats($row['user_id']);
		$match['stats']=$stats;
		$match['user_name']=$row['user_name'];
		$match['avatar']=$row['avatar'];
		$user_matches[]=$match;
	   }
	}
   return $user_matches;
}
function liveProfileUpdate($field,$value){
	$query="UPDATE user_profile SET $field='".$value."' WHERE user_id='".$_SESSION['user_id']."'";
	$this->db->dbexec($query);
}

function getTopContributors(){
	$topContributors=array();
	$query="SELECT u.user_id AS user_name , COUNT( p.ID ) AS news_submitted 
	         FROM posts AS p
			 LEFT JOIN users u ON u.ID=p.submitted_user_id
			 GROUP BY p.submitted_user_id 
			 ORDER BY news_submitted DESC 
			 LIMIT 10";
	$this->db->dbexec($query);
	//echo $query;
	while($row=$this->db->getRow())
		$topContributors[]=$row;
	return $topContributors;
}
function getJustJoined(){
	$justJoined=array();
	$query="SELECT user_id AS user_name,joined from users ORDER BY joined DESC LIMIT 0,10";
	$this->db->dbexec($query);
	while($row=$this->db->getRow())
		$justJoined[]=$row;
	return $justJoined;
}

  function getName($user_id)
  {
    $query="Select first_name from users where user_id='$user_id'";
    $this->db->dbexec($query);
    $namearr=$this->db->getRow();
    return $namearr[first_name];
  }//END OF GETNAME()
     
  function updateStats($type,$userid=null)
	{
      if($userid==null)
		  $userid=$_SESSION['user_id'];	 
	  switch($type)
		{
		  case "PROFILE_VISITED":
			{
			  $query_upate="UPDATE stats SET profile_views=profile_views+1 WHERE user_id='".$userid."'";
              break;
			}
		  case "STOCK_PICKED":
			{
			  $query_upate="UPDATE stats SET pick_count=pick_count+1 WHERE user_id='$userid'";
              break;
			}
		  case "NEWS_SUBMITTED":
			{
			  $query_upate="UPDATE stats SET news_submitted=news_submitted+1 WHERE user_id='$userid'";
              break;
			}
		  case "NEWS_VOTED":
			{
			  $query_upate="UPDATE stats SET news_voted=news_voted+1 WHERE user_id='$userid'";
              break;
			}
		  }
          $this->db->dbexec($query_upate);
	}
  function checkLogin($user_id,$password,&$registry)
  {
     $query="SELECT user_id from users where user_id='$user_id'";
     $this->db->dbexec($query);
     $user_details=$this->db->getRow();
     if(empty($user_details[user_id]))
           $registry->set('login_error',"user_id");
     else
     {
        $query="SELECT user_id,level from users where user_id='$user_id' AND password='".md5($password)."'";
        $this->db->dbexec($query);
        $user_details=$this->db->getRow();
        if(empty($user_details[user_id]))
         	$registry->set('login_error',"password");
		elseif(!strcmp($user_details['level'],"disabled"))
			$registry->set('login_error',"disabled");
        } 
     
  }//END OF CheckLogin()
  function getVotedNewsID($userid)
  {
     $query="SELECT post_id from post_votes where user_id='$userid'";
	 $this->db->dbexec($query);
	 $postid_arr=array(0=>0);
	 while($postid=$this->db->getRow())
		 $postid_arr[]=$postid['post_id'];	 
     return $postid_arr;
  }
  function login($user_id,$password,$cookie_present,$setcookie,$registry)
  {
   $md5=($cookie_present)?$password:md5($password);
   $query="SELECT * from users where user_id='$user_id' AND password='$md5'";
   $this->db->dbexec($query);
   $user_details=$this->db->getRow();
   //print_r($user_details);
   if (empty($user_details))
       $registry->set('login',"Failed");
   else
   {
     $_SESSION['user_id']=$user_details['ID'];
	 $_SESSION['user_name']=$user_details['user_id'];
     $_SESSION['first_name']=$user_details['first_name'];
	 $_SESSION['last_name']=$user_details['last_name'];
     $_SESSION['email']=$user_details['email'];
     $_SESSION['md5']=$user_details['password'];
     $_SESSION['weight']=$user_details['weight'];
     $_SESSION['avatar']=$user_details['avatar'];
	 $_SESSION['level']=$user_details['level'];
	 //echo $_SESSION['level'];
     $_SESSION['recent_comments']=array(0=>0); //error occurs if not initialised
	 //$_SESSION['stock_comments']=array(0=>0);
	 $_SESSION['unvoted']=array(0=>0); //error occurs if not initialised
	 $_SESSION['voted_posts']=$this->getVotedNewsID($_SESSION['user_id']);
     if($setcookie)
	   {
		 setcookie("user_id",$user_id,time()+3600*24*14);
		 setcookie("md5",$md5,time()+3600*24*14);
	   }
     $registry->set('login',"Success");
   }
  }//END OF LOGIN
}//CLASS
?>