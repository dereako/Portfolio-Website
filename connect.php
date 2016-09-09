<?php include 'connector.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'head.php'; ?>
	<title>Derek Hall | Connect</title>
    <style type="text/css">
		.ig-b- { margin-top: 6px; display: inline-block; }
		.ig-b- img { visibility: hidden; }
		.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
		.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
		@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
			.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; }
		}
	</style>
</head>
<body>
	<div id="connect">
		<?php include 'nav.php'; ?>
        <div class="list">
        	<div class="container">
            	<div class="left">
                	<div class="box">
                    	<form method="post" action="email.php">
                            <h2>
                            	<?php if ($_GET['sent']==true) { ?>
									<span style="color: #ADDF35;">Your email was sent, thank you!</span>
                                <?php } else if (strlen($_GET['invalid'])) { ?>
                                	Email <span style="color: #f6253d;">NOT</span> sent! Invalid <span style="color: #f6253d;"><?=$_GET['invalid']?>!</span>
								<?php } else { ?>
	                            	Email Me
                                <?php } ?>
                            </h2><hr />
                            <textarea name="message" style="max-width: 310px; min-width: 310px; min-height: 80px; max-height: 298px;" placeholder="What's up?"><?php if (strlen($_GET['message'])) { echo urldecode($_GET['message']); } ?></textarea>
                            <input type="text" name="email" class="left" style="width: 216px;" placeholder="Your Email"<?php if (strlen($_GET['email'])) { ?> value="<?=urldecode($_GET['email']);?>"<?php } ?> />
                            <input type="submit" class="right" value="send" />
                            <div class="clear"></div>
                    	</form>
                	</div>
                    <div class="box">
                    	<h2>Find Me On</h2><hr />
                        <div class="linker" onclick="document.location.href='https://www.facebook.com/derekhalldesign';"><div class="disc fb"></div>Facebook</div>
                        <div class="linker" onclick="document.location.href='http://www.youtube.com/dereako';"><div class="disc yt"></div>YouTube</div>
                        <div class="linker" onclick="document.location.href='http://www.linkedin.com/profile/view?id=32971597';"><div class="disc li"></div>LinkedIn</div>
                        <div class="linker" onclick="document.location.href='https://foursquare.com/user/1145740';"><div class="disc fs"></div>FourSquare</div>
                        <div class="clear"></div>
                    </div>
                </div>
            	<div class="left grams">
                	<div class="upper box">
                    	<div class="left">
                        	<h2><a href="http://instagram.com/dereako">Instagrams</a></h2>
	                    	<h4><span class="roman">via</span> <a href="http://statigr.am/dereako">Statigram</a></h4>
                        </div>
                        <div class="right">
							<a href="http://instagram.com/dereako?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                	<iframe width='364' height='430' src='http://statigr.am/widget.php?choice=myfeed&username=dereako&show_infos=false&linking=statigram&width=364&height=482&mode=grid&layout_x=2&layout_y=2&padding=8&photo_border=false&background=333333&text=9E9E9E&widget_border=true&radius=5&border-color=444444&user_id=228499222&time=1365534825558' allowTransparency='true' frameborder='0' scrolling='no' style='border:none; overflow:hidden; width:364px; height:420px;'></iframe>
                    <div class="box bottom"></div>
                </div>
                <div class="left tweeter">
                	<a class="twitter-timeline" href="https://twitter.com/derekhalldesign" data-widget-id="325711694846361600">Tweets by @derekhalldesign</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
    <?php mysql_close($con); ?>
</body>
</html>