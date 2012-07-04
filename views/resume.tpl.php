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
	  <div class="right"><? if ($section_title!='print') { ?>download as <a href="<?echo $base_url?>files/Swamy_resume_Nov2010.pdf" class="normal">.pdf</a><? } ?></div><br/><br/>
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
			<i>Class of 2011 (Spring); Masters in Software Engineering</i><br/>
			<div class="break"></div>
			<b>College of Engineering, Guindy - Anna University, Chennai, India</b><br/>
			<i>2002 to 2006; Bachelor of Technology in Information Technology</i><br/>
			<i>Graduated with 'First Class' Honors.</i>
			<div class="break"></div>		
			<b>D.A.V Higher Secondry School, Chennai, India</b><br/>
			<i>2002; Higher Secondry Certificate</i><br/>
			<i>Percentage : 97.25</i>
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
        <i>Sep '10 to Present</i><br/>
        <div class='just'>
          <?echo $manilla_html;?> is an online bill and finance management portal operating under the banner of the Hearst Corporation. My role as an intern in this company is to implement new features across the site, ranging from engineering the front-end user interface with JQuery and HTML/CSS to the back-end web extraction process. Manilla practices Agile and Extreme Programming paradigms with a strong stress on Pair Programming. I have learnt a good deal about these practices which I find to be more productive than the average startup environment. Being a very Test Driven company, I constantly write RSpec tests, using Factory Girl, Celerity and other testing technologies to check for the integrity of the application. I use Photoshop primarily to convert the mockups into fresh looking HTML. We currently use Rails3 and work over a stack of Ruby Enterprise Edition(REE). The company is also keen on moving towards the use of HTML5.
        </div>
        <div class="break"></div>
		  <b>Ruby on Rails Engineering Intern at Zendesk, San Francisco</b><br/>
  	  <i>Jun '10 to Aug '10</i><br/>
			<div class='just'>
				At <?echo $zendesk_html;?>, I worked for 3 months as a ruby intern helping them in areas such as widget development, general bug fixing and pairing with developers to create new features. I was primarily involved in developing the LogMeIn widget for them and also working on areas such as billing and the front-end. I had a great learning experience in getting to know more about Test Driven Development using tools such as Shoulda, Mocha and RSpec.
			</div>
  	  <div class="break"></div>	
			<b>Web Developer at SlideShare, New Delhi, India</b><br/>
			<i>Mar '08 to May '09</i><br/>
			<div class='just'>
				Worked as a web developer at <?echo $slideshare_html;?>. Slideshare is a presentation media sharing website which is dubbed as the "youtube of powerpoints". 
				Being a dynamic start-up and due to the small size of the team I've had my foot in areas such as application programming, front end engineering and widgets development.
				I gained hands on working knowledge on <span class='thicker'>ruby and rails</span>. I also gained good amount of experience with jQuery, in this period, to make the user interface more intuitive and pleasurable for the users. I'm was primarily involved in building new features and fix existing bugs on the site but nonetheless was also invovled in ground-up ranging from brain storming and implementing algorithms and database schemas for projects such as slideshare channels, contests and categories. Slideshare provided me with an excellent platform to use and further my skills in web development and also learn from the best of programmers in India.			
			</div>
			<div class="break"></div>		
			<b>Lead Developer for Yiktik</b><br/>
			<i>Dec '07 to Mar '08</i><br/>
			<div class='just'>
				I Developed <?echo $yiktik_html;?> from scratch running on <span class='thicker'>LAMP</span> architecture. 
				Developed a rich User Interface complete with <span class='thicker'>fancy AJAX</span> controls having an elegant <span class='thicker'>CSS</span> grid based design. 
				The core of the system consists of a scalable design based on a simple yet fast in-house built framework (no ORMs etc). I was in charge of all the aspects of the web app. 
				Had a good learning experience on fine tuning <span class='thicker'>PHP</span> and <span class='thicker'>optimizing SQL</span> queries. 
				Also gained knowledge about industry standards and developmental practices.						
			</div>
			<div class="break"></div>		
			<b>Software Developer a Iflex Solutions, Chennai</b><br/>
			<i>Oct '06 to Dec '07</i><br/>
			<div class='just'>
				I worked for more than a year on several projects for Citigroup and other major corporations, at Iflex, delivering them industry standard scalable web sites using enterprise softwares and tools. 
				Worked on <span class='thicker'>J2EE</span> and other java technologies using frameworks such as <span class='thicker'>STRUTS</span> and <span class='thicker'>Spring</span>. Also used database abstraction technologies like <span class='thicker'>Hibernate</span> on a back-end running MS-SQL Server.				
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
			<span class="sub-heading bold">Achievements</span><br/>
			<div class="push-left">
			<b>Participated in Yahoo Hack Day '07, Bangalore</b><br/>		
			<div class='just'>
				Developed a photo rating site called SlickRNot! at Yahoo Hack Day, Bangalore, which received good reviews from judges for its impressive interface and use of Web-APIs from flickr. 
				The application obtains photos from Flickr via its API which would then be rated by users. Wrote the core entirely in PHP and used MySQL at the backend. 
				Gained knowledge about APIs and RESTful Web Services. All this was done in less than 24 hours at a stretch.			
			</div>
			<div class="break"></div>		
			<b>Developer/Designer for Various Microsites</b><br/>
			<div class='just'>
				Worked on several microsite in my under graduate years. Developed various websites to college departments, cultural events and other occasions using PHP/MySQL and J2EE.
				I was in charge of both design and development. Used tools like Photoshop, GIMP and Paint.NET to create graphics ranging from simple badges, banners and buttons to simple Flash animations.						
			</div>
			<div class="break"></div>				
			</div>
		</p>		
		<div class="bigbreak"></div>	
		<? if ($section_title=='print') { ?>
	  <? } ?>		 
		<p>
			<span class="sub-heading bold">Areas of Interest</span><br/>
			<div class="push-left">
			  Web Development and Related Technologies.<br/>
			  Database Optimization.<br/>
			  Social Enterprise Software.<br/>
			  Social Computing.<br/>
			  Computer networks and Security.<br/>			  			  
			</div>
		</p>
		<div class="bigbreak"></div>
		<p>
			<span class="sub-heading bold">Academic Projects</span><br/>
			<div class="push-left">
			<b>Novella</b><br/>		
			  Swamynathan G, Mayuresh H, Shalin Shroff : <i>An online book collaboration engine.</i><br/>
			  <div class='just'>
  			  An web application written completely in Ruby on Rails using HAML for templating and jQuery as the primary javascript framework. This application allows its members to collaboratively author a book/novel, wherein each user can add one or more chapters to an existing novel or create one of their own and invite their friends to work on it. Also features several social interactions such as commenting, reviews and ratings. Has been released on <a href="http://github.com/swamyg/Novella" class="normal">Github</a> for further development.
  		</div>
			<div class="break"></div>
			<b>H.E.M.S</b><br/>		
			Swamynathan G : <i>Highway Emissions Management System</i><br/>
			<div class='just'>
    	  The Highway Emissions Monitoring System (HEMS) is a set of distributed EJB components that are designed to collect, monitor and analyse emission data from everyday traffic on California roadways. The approach is to divide the system into sub-systems or components which communicate with each other through RMI using a pre-defined interface, thus creating a framework for distributed computing. The outputted KML file is viewable on Google Maps (or Earth) and indicates the distribution of various pollutants across 3 important highways near the city of San Jose. (Code available upon request).
    	</div>    	  
			<div class="break"></div>		
			<b>Final Year Under Graduate Thesis</b><br/>		
			  Swamynathan G, Ashok Kumar T, Padmanaban R : <i>An Intelligent Shape Based Image Recognition System Using Shape Matrix</i><br/>
			  <div class='just'>
			  A program, written entirely in MAT Lab, which could recognize simple polygons such as rectangle, square and shapes such as circle and semi-circle. Using a Shape Matrix the efficieny of the program was increased by as much as 30%.
			 </div> 
			<div class="break"></div>
			<? if ($section_title=='print') { ?>
	  <? } ?>
			<b>TAM TAB Converter</b><br/>
			<div class='just'>
			  	I, on behalf of the language lab in the Department of Computer Science and Engineering developed a program
		        in Java using which a user can convert between two popular encoding schemes for the Tamil language, namely, TAM and TAB. It is a command line based program.
			</div>
			<div class="break"></div>
			<b>Other projects</b><br/>
			<div class='just'>
			  <i>Music Shop : </i>A small online music shop offering latest CDs, modeled after Amazon.com, was developed using J2EE for the Web Technology course during my under graduate final year in college.<br/>
			  <i>Hospital Management System : </i> Developed for DBMS course using Oracle 8i as backend and Visual Basic on the front end.<br/>
			  <i>Bandwidth Analyzer : </i> A small program written in C++ for Computer Networks course to analyze upload and download traffic.<br/>
			  <i>Space Shooters</i> : Shooting game developed in C++ for the  Object Oriented Programming Lab.<br/>
			  <i>eDrum : </i> Developed an electronic drumkit from modified old computer keyboard circuits.
			</div>
			<div class="break"></div>				
			</div>
		</p>		
		<div class="bigbreak"></div>		
		<? if ($section_title=='print') { ?>
			<div class="bigbreak"></div>
			<p>
				<span class="sub-heading bold">References</span><br/>
				<div class="push-left">
				  1. Adrian McDermott, VP of Engineering at Zendesk Inc - adrian@zendesk.com<br/>
				  2. Andres Camacho, VP of Engineering at Manilla Inc - andres@manilla.com<br/>
				  3. Andy Yeung, Supervisor at College of Business, SJSU - yeung_a@cob.sjsu.edu
				</div>
			</p>
			<p>
				<span class="sub-heading bold">Citations</span><br/>
				<div class="push-left">
				  1. Slideshare - http://www.slideshare.net<br/>
				  2. Yiktik - http://www.yiktik.com<br/>
				  3. Zendesk - http://www.zendesk.com<br/>
				  4. Manilla - http://www.manilla.com
				</div>
			</p>
			</div>
		<? } else { ?>
		</div>
	  <hr/>
	  <span class="right">download as <a href="<?echo $base_url?>files/Swamy_resume_Nov2010.pdf" class="normal">.pdf</a>
	 <? } ?>
    </div>
  </div>
</body>
</html>
