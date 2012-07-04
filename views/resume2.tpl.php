<? 
   if ($section_title!='print') {
   require_once('common.php') ?>
  <div id="posts">
    <span class="blue heading">{resume}</span><br/>
<? } else { ?>
<head>
  <link rel=stylesheet href="<?echo $base_url?>styles/main.css" type="text/css">
</head>
<body>
  <div style="margin-left:1em;">
<? }?>
    <? if ($section_title !='print') { ?>
      <div class="post about">
    <? } else { ?>
      <div style="width:99%">
    <? } ?>
    <p>
	  <span class="right">	   
	  <div class="right">
	    <span class="sub-heading"><b>http://swamyg.com</b></span>
	  </div>
	  <br/><br/>
	  <? if ($section_title!='print') { ?>
	  <img src='<?echo $base_url ?>images/my_gmail.png'/>
	  <? } else { ?>	 
	  <span class="sub-heading bold">swamyg84@gmail.com</span>
	  <? } ?>
	  </span>
	<p/>
	<p>
		<span class="heading">
		<b>Swamynathan Gopalsamy</b><br/> </span>
		<span class="sub-heading">
		San Francisco, California<br/>
		(408)-849-8132
		</span>
		<hr/>
	</p>
	<div class="break"></div>
	<div class="push-left">
		<p>
			<span class="sub-heading bold">Education</span><br/>			
			<div class="push-left">
  			<b>San Jose State University, California</b><br/>
  			<i>Class of 2011; Masters in Software Engineering</i><br/>
  			<div class="break"></div>
  			<b>College of Engineering, Guindy - Anna University, Chennai, India</b><br/>
  			<i>2002 to 2006; Bachelor of Technology in Information Technology</i><br/>
  			<i>Graduated with 'First Class' Honors.</i>
  		</div>			
		</p>
		<div class="bigbreak"></div>
		<p>		 
			<span class="sub-heading bold">Work Experience</span><br/>
			<div class="push-left">
			  <b>Sofware Engineer at Manilla, San Francisco</b><br/>
        <i>Jan '11 to Present</i><br/>
        <div class='just'>
          Presently continuing as a Full-Time employee at Manilla.
        </div>
        <div class="break"></div>
			  <b>Sofware Engineer Intern at Manilla, San Francisco</b><br/>
        <i>Sep '10 to Dec '10</i><br/>
        <div class='just'>
          <?echo $manilla_html;?> is an online bill and finance management portal operating under the banner of the Hearst Corporation. My role as an intern in this company is to implement new features across the site, ranging from engineering the front-end user interface with JQuery and HTML/CSS to the back-end web extraction process. Manilla practices Agile and Extreme Programming paradigms with a strong stress on Pair Programming. I have learnt a good deal about these practices which I find to be more productive than the average startup environment. Being a very Test Driven company, I constantly write RSpec tests, using Factory Girl, Celerity and other testing technologies to check for the integrity of the application. I use Photoshop primarily to convert the mockups into fresh looking HTML. We currently use Rails3 and work over a stack of Ruby Enterprise Edition(REE). The company is also keen on moving towards the use of HTML5.
        </div>
        <div class="break"></div>
    	  <b>Ruby on Rails Engineering Intern at Zendesk, San Francisco</b><br/>
    	  <i>Jun '10 to Aug '10</i><br/>
  			<div class='just'>
  				At <?echo $zendesk_html;?>, I worked for 3 months as a ruby intern helping them in the areas of widget development, general bug fixing and pairing with developers to develop new features. I was primarily involved in developing the LogMeIn widget for them and also working on areas such as billing and front-end. I had a great learning experience in getting to know more Test Driven Development using tools such as Shoulda, Mocha and RSpec.
  			</div>
    	  <div class="break"></div>	
  			<b>Web Developer at SlideShare, Delhi</b><br/>
  			<i>Mar '08 to May '09</i><br/>
  			<div class='just'>
  				Worked as a web developer at <?echo $slideshare_html;?>. Slideshare is a presentation media sharing running on ruby on rails. I was involed in both application programming and front end engineering. My primary role was to implement new features and fix existing bugs on the site. I designed and implemented Categories, Contests and Channels while working there.
  			</div>
  			<div class="break"></div>		
  			<b>Lead Developer for Yiktik</b><br/>
  			<i>Dec '07 to Mar '08</i><br/>
  			<div class='just'>
  				I developed Yiktik, a news bookmarking site, from scratch using <span class='thicker'>LAMP</span> architecture. I was in charge of both the application development and the UI design and coding. Also gained first hand experience on optimizing SQL queries.								
  			</div>
  			<div class="break"></div>		
  			<b>Software Developer a Iflex Solutions, Chennai</b><br/>
  			<i>Oct '06 to Dec '07</i><br/>
  			<div class='just'>
  				I worked for more than a year on several projects for Citigroup at Iflex, delivering them industry standard scalable web applications using J2EE. Used java frameworks such as STRUTS and Spring. Also used database abstraction technologies like Hibernate on a back-end running MS-SQL Server.
  			</div>
			</div>
		</p>
		<div class="bigbreak"></div>
		<p>
			<span class="sub-heading bold">Skills</span><br/>
			<div class="push-left">
			  <table border=0 class='just'>			   
  			  <tr><td width=36% valign='top'><b>Web Technologies</b></td><td>Ruby on Rails, PHP, J2EE, Javascript, HTML, CSS</td></tr>
          <tr><td valign='top'><b>Frameworks & Technologies</td><td>Prototype, JQuery, Scriptaculous, HAML, Shoulda, RSpec, Mocha, Spring, STRUTS, CakePHP, Hibernate, DWR</td></tr>
  			  <tr><td valign='top'><b>Programming Languages</b></td><td>C/C++, Java, VC++, Visual Basic, MAT Lab</td></tr>
  			  <tr><td valign='top'><b>Database Technologies<b></td><td>MySQL, Oracle 8i, SQL Server and Microsoft Access</td></tr>
  			  <tr><td valign='top'><b>Operating Systems</b></td><td> Mac, Unix/Linux, Windows NT</td></tr>
  			  <tr><td valign='top'><b>Technical Tools</b></td><td>Apache Server, Tomcat, Weblogic, Mercury Mail, Subversion Version Control (SVN), Git, Microsoft Visual Source Safe (VSS)</td></tr>
  			</table>			  
			</div>
		</p>
		<div class="bigbreak"></div>		
		<p>
			<span class="sub-heading bold">Other Experience</span><br/>
			<div class="push-left">
			<b>Participated in Yahoo Hack Day '07, Bangalore</b><br/>		
			<div class='just'>
				Developed a photo rating site called SlickRNot! in less than 24 hours at Yahoo Hack Day, Bangalore, which received good reviews from judges for its impressive interface and use of Web-APIs. The application was written in PHP.
			</div>
			<div class="break"></div>		
			<b>Developer/Designer for Various Microsites</b><br/>
			<div class='just'>
				Developed various websites to college departments, cultural events and other occasions using PHP/MySQL and J2EE.
				I was in charge of both design and development. Used tools like Photoshop, GIMP and Paint.NET to create graphics ranging from simple badges, banners and buttons to simple Flash animations.						
			</div>
			<div class="break"></div>				
			</div>
		</p>
		<div class="bigbreak"></div>
		<p>
			<span class="sub-heading bold">Academic Projects</span><br/>
			<div class="push-left">
  			<b>Novella</b><br/>		
  			  Swamynathan G, Mayuresh H, Shalin Shroff : <i>An online book collaboration engine.</i><br/>
  			  <div class='just'>
    			  Novella is collaborative novel writing site written completely in Ruby on Rails using HAML for templating and jQuery as the primary javascript framework. Also features several social interactions such as commenting, reviews and ratings. Has been released on Github for further development.
    		</div>
  			<div class="break"></div>
  			<b>H.E.M.S</b><br/>		
  			Swamynathan G : <i>Highway Emissions Management System</i><br/>
  			<div class='just'>
      	  HEMS is a set of EJB components which collect and analyse emission details from traffic data. The final results are viewable in Google Maps (or Earth) and indicates the distribution of various pollutants across 3 important highways near the city of San Jose.
      	</div>    	  
  			<div class="break"></div>		
  			<b>Final Year Under Graduate Thesis</b><br/>		
  			  Swamynathan G, Ashok Kumar T, Padmanaban R : <i>An Intelligent Shape Based Image Recognition System Using Shape Matrix</i><br/>
  			<div class='just'>
  			  A program, written entirely in MAT Lab, which could recognize simple polygons such as rectangle, square and shapes such as circle and semi-circle. Using a Shape Matrix the efficieny of the program was increased by as much as 30%.
  		  </div> 						
			</div>
		</p>
  </div>
</body>
</html>
