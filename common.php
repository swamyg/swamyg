<?
$side_bar='<body>
<div id="sidebar">			
  <div id="title">
    <h1><a href="'.$base_url.'">swamyg</a></h1>
  </div>
  <div id="about">
     <p>';
     if(isset($_GET['module']))
	   $side_bar.='<a href="'.$base_url.'">home</a><br/>';
	 foreach($modules as $name=>$url){
	  if(isset($_GET['module']) && $_GET['module']==$url)
	    $classActive='active';
	  else
	    $classActive='';
	  if($name=='blog')
	    $side_bar.='<a href="http://blog.swamyg.com">blog</a><br/>';
	  else
        $side_bar.='<a href="'.$base_url.$url.'" class="'.$classActive.'">'.$name.'</a><br/>';
	 }	
    $side_bar.='</p>
    <div id="description" style="width:317px;" height="280px;"><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
    <p id="credits">based on the <a href="http://whitespacetheme.tumblr.com/">Theme</a> by <a href="http://heather-rivers.com/">Heather Rivers</a>
    </p>
  </div>
</div>';

$header='<html>
    <head>
        <title>Being swamyg / '.$module_title.' / '.$section_title.'</title>
        <link rel="shortcut icon" href="{Favicon}">
        <link rel="alternate" type="application/rss+xml" href="/rss">
        <link rel=stylesheet href="'.$base_url.'styles/main.css" type="text/css">
        <meta name="verify-v1" content="kRpoUWYUSdO+Rcw9yKCzwNyUPgqasHyhujMFLVKNfW8=" />

<!--[if IE]>
<style type="text/css">
div#sidebar {position:absolute;}
</style>
<![endif]-->

</head>';

echo $header;
echo $side_bar;
?>
