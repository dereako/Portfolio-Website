<?php include 'connector.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'head.php'; ?>
	<title>Derek Hall | About</title>
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
                        <strong>Education</strong>
                        <div class="blurb">
                            <a href="http://www.rit.edu/">Rochester Institute of Technology</a> in Rochester, NY<br />
                            BFA: New Media Design <span class="sep">|</span> Concentrations: Philosophy, Art History<br />
                            Attended: 2004 – 2008 <span class="sep">|</span> GPA: 3.8 (Highest Honors)
                        </div>
                    </div>
                    
                    <div class="portion">
                        <strong>Employment</strong>
                        <div class="blurb">
                            <a href="http://www.pearsestreet.com/">Pearse Street</a> in Salem, MA<br />
                            Senior Front-End Developer 2008 – present
                        </div>
                        <div class="blurb">
                            <a href="http://www.dyerpr.com/">Dyer Associates</a> in Winthrop, ME<br />
                            Graphic Designer 2006 – 2008
                        </div>
                    </div>
                    
                    <div class="portion">
                        <strong>Technical Abilities</strong>
                        <div class="blurb">
                            PHP, HTML5, CSS3, jQuery, JavaScript, ActionScript<br />
                            Photoshop, Illustrator, InDesign, After Effects, Flash<br />
                            Mac, Windows, Word, Excel, Cinema 4D, Final Cut Pro
                        </div>
                    </div>
                    
                    <div class="portion">
                        <strong>Artistic Skills</strong>
                        <div class="blurb">
                            Graphic Design, Animation, Sequential Art, Painting, Concepting
                        </div>
                    </div>
                    
                    <div class="portion">
                        <strong>Personal</strong><br />
                        I married my best friend, and we have the most adorable little girl imaginable
                    </div>
            	</div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
    <?php mysql_close($con); ?>
</body>
</html>