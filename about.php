<?php include 'connector.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
	<title>Derek Hall | About</title>
</head>
<body>
	<div id="about">
		<?php include 'nav.php'; ?>
        <div class="list">
        	<div class="container">
                <div class="aboutme">
                    <h1>Hi, I'm Derek</h1>
                    I like to design, animate, and create.
                </div>
            	<div class="portrait" title="Self Portrait">
	                <img src="img/portrait_pixel.jpg" alt="Pixel Self Portrait" class="port3" />
	                <img src="img/portrait_cartoon.jpg" alt="Cartoon Self Portrait" class="port2" />
	                <img src="img/portrait_pastel.jpg" alt="Pastel Self Portrait" class="port1" />
                </div>
                <div class="aboutme">
                    <div class="portion">
                        <div class="bold">Education</div>
                        <div class="blurb">
                            <a href="http://www.rit.edu/" target="external">Rochester Institute of Technology</a> in Rochester, NY<br />
                            BFA: New Media Design <span class="sep">|</span> Concentrations: Philosophy, Art History<br />
                            Attended: 2004 – 2008 <span class="sep">|</span> GPA: 3.8 (Highest Honors)
                        </div>
                    </div>
                    
                    <div class="portion">
                        <div class="bold">Employment</div>
                        <div class="blurb">
                            <a href="http://www.pearsestreet.com/" target="external">Pearse Street</a> in Salem, MA<br />
                            Senior Front-End Developer 2008 – July 2015
                        </div>
                        <div class="blurb">
                            <a href="http://www.dyerpr.com/" target="external">Dyer Associates</a> in Winthrop, ME<br />
                            Graphic Designer 2006 – 2008
                        </div>
                    </div>
                    
                    <div class="portion">
                        <div class="bold">Technical Abilities</div>
                        <div class="blurb">
                            PHP, HTML5, CSS3, jQuery, JavaScript, ActionScript<br />
                            Photoshop, Illustrator, InDesign, After Effects, Flash<br />
                            Mac, Windows, Word, Excel, Cinema 4D, Final Cut Pro
                        </div>
                    </div>
                    
                    <div class="portion">
                        <div class="bold">Artistic Skills</div>
                        <div class="blurb">
                            Graphic Design, Animation, Sequential Art, Painting, Concepting
                        </div>
                    </div>
                    
                    <div class="portion">
                        <div class="bold">Personal</div>
                        I married my best friend, and we have two incredibly cute children
                    </div>
            	</div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
    <?php include 'foot.php'; ?>
    <script type="text/javascript">
		var cur = 1;
		var portSpeed = 4000;
		var fadeSpeed = 500;
		var changer;
		
		function changePort() {
			next = cur + 1;
			other = cur - 1;
			if (next>3) { next = 1; }
			$('.port'+next).css({'opacity': 1, 'z-index': 2});
			$('.port'+cur).css('z-index',3).animate({'opacity': 0}, fadeSpeed, function(){ $('.port'+cur).css('z-index',1); });
			cur = next;
		}
		$(document).ready(function() {
			$('.portrait img').hover(function() {
				clearInterval(changer);
			},function() {
				changer = setInterval('changePort()',portSpeed);
			});
			
			changer = setInterval('changePort()',portSpeed);
		});
	</script>
</body>
</html>
