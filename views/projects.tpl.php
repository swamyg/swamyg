<? require_once('common.php') ?>
  <div id="posts">
    <span class="blue heading">{projects}</span>
    <div class="post about">
	  <?
	    if($section_title!='*') {?>	      
	   <? 
	      switch($section_title) {	      
	      case 'slickrnot':
	        ?>
	        <span class="sub-heading magenta">slickrnot</span>
	        <p>
	           	SlickrNot grabs photos from Flickr.com using its Web-API and displays it for people to rate. 
			    The concept is similar to <a href="http://hotornot.com" class="normal">hotornot</a>.
			    Users can also explore the overall top rated and bottom rated flickr photos on this site<br/>
			    Slickrnot was our hack for the <a href="http://developer.yahoo.net/blog/archives/2007/10/results_of_the.html" class="normal">Yahoo Hackday '07</a> in Bangalore. It had some of the top coders from India and some famous hackers from Yahoo as well. Basically you are given 24 hours to come with up with neat
			    hack which uses any of Yahoo's serives such as Maps, search or pipes. We choose flickr as our tool. I've always wanted to rate pictures on flickr but wondered why the people at yahoo are so lazy to 
			    implement this. The team consisted of two of my friends, Satheesh and <a href="http://sprasanna.com" class="normal">Prasanna</a>, and myself. My job was to code the server side stuff in php using home brewed frameworks, take care of the business logic and assist with AJAX scripting, Satheesh took care of the API interactions and database code and Prasanna's job was
			    to build a kickass interface using Yahoo's YUI. After 20 hours of no sleep/non stop coding and several cans of redbull (courtesty yahoo) the job was done.
			    You can view the video of our presentation <a href="http://www.youtube.com/watch?v=ZO5_uiJnNlo" class="normal">here</a>, ours is hack #18, so you'll have to wait for sometime or you can just fastforward it.
			    I had hosted it on a free hosting service but that service was shut down pretty soon without any notice. I'll try to upload it here in the future.
	        </p>
	        <a href="<?echo $base_url?>projects" class="normal">back to projects</a>
	      <?  
	      break;
	      case 'edrum':
	      ?>
	        <span class="sub-heading magenta">edrum</span>
	        <p>
	           	Fueled by the urge to create something and by the fact that I couldn't afford a drumkit back then, I came up with a plan to make an electronic drum kit.
		        The idea was simple, make something similar to the famous Roland V drums, only much, much more cheaper. I had always been playing drums on my computer
		        using the keyboard as the input. One day, I ripped it apart, soldered some wires and went hunting for some metal plates. When I came back, I taped those 
		        wires to some metal plates and when these plates came in to contact, EUREKA! I heard the sound of the kick drum and I was happy, really really happy.<br/>
			    The basic plan was simple, use synthesizers like Cakewalk Pro or Garage Band (if your a mac junkie) which support MIDI Triggering from a normal computer keyboard as the input.
			    Ripoff an old keyboard and solder wires to the ends of the encoder chip. Now comes the part where you have to sit down and find out which two wires form what key combination when they are shorted.
			    So open up your favortie text editor with this modded keyboad connected. Now by trial and error find out the combinations just by shorting 1<sup>st</sup> wire with the rest and repeat it until you've
			    found out all the combinations. In my case, I configured Cakewalk to play a kick drum sound when triggered with a 'Q' from the keyboard, similarly an 'E' triggers a snare drum 
			    and '5' triggers a closed hi-hat and so on. So all I had to do was to find out the combinations for 9 different keys, which formed a basic rock drum kit. 			    
	        </p>
	        <img src="<?echo $base_url?>images/edrum.jpg" />
	        <br/><span class="bold blue">modded keyboard encoder chip</span>
	        <p>
		        Once this is done find some metal plates that can be used as triggers. Now lets say you want a snare drum? You know the two wires that triggers the snare sound. Tape the first (soldering is also fine) wire to top and the second to the bottom (or vice versa, doesnt' matter).
		        When these two plates come into contact it will trigger the key which Cakewalk (or garageband) will understand to be the trigger for a snare drum. But the job is just half done and now comes the hardest part. You have to include a spring action in between the plates to make sure they return 
		        to their original state of no contact when it is hit and released. I tried several ways to implement this with homemade springs, rubber etc but none of them really did the job well. Finally I gave up on it as it was consuming too much of my time.
		        I hope to revive this project sometime in the future once I have the appropriate materials to be used.
		    </p>
		    <a href="<?echo $base_url?>projects" class="normal">back to projects</a>
	      <?
	      break;
	      default:
	      ?>
	        <a href="http://yiktik.com" class="image"><img src="<?echo $base_url?>images/logos/yiktik.jpg"></a>
	        <p>		        
	           	<a href="http://yiktik.com" class="normal">Yiktik</a> is a social news bookmarking site. 
			    It is a simple tool that lets people submit stories which other people can rate.
			    While the highly rated stories appear on the buzzing page, the newly submitted ones are found on the recent page.<br/>
			    Yiktik started off as a side project with my friend Satheesh while I was working in Iflex. It was conceptualized by us on a november night in 2007 when we were pretty
			    drunk and began making fun of the so called web 2.0 me too sites. After that long discussion we came to the conclusion that there was something lacking for 
			    business and professional users of the web. Yes they had their linkedins and the techcrunches but never a platform for collaboratively sharing bookmarks, news or for that matter any information.
			    We decided that there was a serious need for such a website where a person could come to one single place and read the top stories of the day instead of scourging it from 20 different sites.
			    This would especially be helpful to a person who lacks the time to go to a lot of sites in the morning just to get the top headlines.
			    Yiktik runs on LAMP, for the not so geeky that is Php+Mysql on Apache server and linux OS. I quit my cozy job at Iflex to concentrate full time on yiktik and after 3 months of being jobless and a steadily decreasing bank balance
			    yiktik was launched on January 29th of 2008.
	        </p>
	        <center><img src="<?echo $base_url?>images/yiktik_screenshot.png" /></center>
	        <p>
		        Yiktik was created basically from scratch by us. I created the core frameworks from bottom-up and decided not to use any other already available ones like cakephp or symfony. We figured we wanted to be "personal" with the code
		        right from the begining and decided to skip the learning curve that these frameworks had with them. I still can't tell whether this is a good decision on the part of site architecture but it was a hell of a learning experience for me to start with
		        absolutely nothing. A lot of work went into query optimizations. The query execution time for a few queries have been reduced by more than a factor of 100. Front end wise we figured we needed to give an user the best possible interface.
		        A consensus was made to use as AJAX as possible without making the user scratch their heads wondering whether anything is happening or not. The challenges and experience we had building this site has been of phenomenal use to me, especially
		        in my present job at SlideShare.
		    </p>
		    <p>
			  The site is still <a href="http://yiktik.com" class="normal">live</a> and you have to register to post, rate or comment on stories. We are thinking of taking it in a new direction, so keep an eye on her in the coming days. Till then happy posting!
			</p>
			<a href="<?echo $base_url?>projects" class="normal">back to projects</a>
          <?
	      break;
          }
	  ?>	  
	  <?
	    }	      
	    else {	
	  ?>
      <span class="sub-heading magenta">yiktik</span>
      <p> 
	    Yiktik is a social new bookmarking site. 
	    It is a simple tool that lets people submit stories which other people can rate.
	    While the highly rated stories appear on the buzzing page, the newly submitted ones are found on the recent page...
	    <span class=""><a href="<?echo $base_url?>projects/yiktik" class="normal">more</a></span>
	  <p/>
      <span class="sub-heading magenta">slickRnot</span>
      <p>
	    SlickrNot grabs photos from Flickr.com using its Web-API and displays it for people to rate. 
	    The concept is very much similar to <a href="http://hotornot.com" class="normal">hotornot</a>.
	    Users can also explore the overall top rated and bottom rated flickr photos on this site...
	    <span class=""><a href="<?echo $base_url?>projects/slickrnot" class="normal">more</a></span>
      </p>
      <span class="sub-heading magenta">eDrum</span>
      <p>
 	    Fueled by the urge to create something and by the fact that I couldn't afford a drumkit back then, I came up with a plan to make an electronic drum kit.
        The idea was simple, make something similar to the famous Roland V drums, only much, much more inexpensive. I had always been playing drums on my computer
        using the keyboard as the input. One day, I ripped it apart, soldered some wires and went hunting for some metal plates. When I came back, I taped those 
        wires to the metal plates and when the plates came in to contact, EUREKA! I heard the sound of the kick drum and I was happy, really really happy. <span class=""><a href="<?echo $base_url?>projects/edrum" class="normal">Click</a></span> to find out more.
      </p><br/>
      <span class="sub-heading magenta">Academic Projects</span>
      <p>
 	    These are some of the projects I did when I was in <a href="http://annauniv.edu/ceg/" class="normal">college</a><br/><br/>
        <b>An Intelligent Shape Based Image Retrieval System Using Shape Matrix.</b><br/>
        This was my final year undergrad project. I've always been interested in image recognition for a long time since I feel is simply a challenge.
        We humans take things like recognizing simple shapes very easily, but I found extremly fascination when I had to teach a computer to recognize the same.
        This project is partly responsible for my initiating my interest in cognitive science. It was done in MAT Lab, the language of choice for singnal/image processing.
        I was responsible for coming up with the basic logic behind the implementation and coding. My peers helped me by researching on several topics related to using a shape matrix
        and by running numerous tests.<br/><br/>
        <b>TAM <=> TAB Conversion</b><br/>
        <a href="http://en.wikipedia.org/wiki/Tamil_language" class="normal">Tamil</a>, which happens to be my mother tounge, is a classical language. Its one of the oldest whose origin is shrouded in mysteries.
	    There have been reports that it originated some 20,000 years ago in the equally mysterious continent of <a href="http://en.wikipedia.org/wiki/Lemuria_(continent)" class="normal">Lemuria</a>. But we all know
        that's a big fat lie! So there are these two competing encoding schemes for Tamil and both are used extensively in various places. But this creates a major problem. Documents encoded using
        one scheme is not supported by softwares using the other scheme. To reign in some peace, I, on behalf of the language lab in the Department of Computer Science and Engineering wrote a program
        in Java which lets people convert between these two encoding schemes. No fancy interface, its just command line based program which takes in the name of file, the encoding scheme of it and the target 
        encoding scheme as the input and spits out the desired output as the same filename with a 1 appended to it. Neat and simple, yet amazingly fast.<br/><br/>
        <b>Space Shooters.</b><br/>
        Oh! I had so much fun coding this game. This was way back in my first year. Started as a simple project for my C++ lab to display use of graphics libraries but soon my urges to fiddle around took over me
        and the result was a fun shooting game. Since I'm a big nintendo/atari fan I decided to pay homage to those space alien shooting games with this. Back in the day, this was quite a hit in the dorms.        
      </p>
      <p>For information about more academic projects, please have a look at my <a href="<?echo $base_url;?>resume" class="normal">resume</a> (under Academic Projects)</p>
      <p><a href="<?echo $base_url;?>contact" class="normal">Contact</a> me if your interested in knowing more about any of these projects.</p>
      <? } ?>      
    </div>
  </div>
</body>
</html>