<?php include 'connector.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
	<title>Derek Hall | Connect</title>
    <style type="text/css">
		#statigram { overflow:hidden; width:364px; height:420px; pointer-events: none; }
		.ig-b- { margin-top: 6px; display: inline-block; }
		.ig-b- img { visibility: hidden; }
		.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
		.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
		@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
			.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; }
		}
		@media only screen and (max-width: 400px) {
			.insta-crop { height:420px; overflow: hidden; }
			#statigram { height: 100%; }
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
									<span class="success">Your email was sent, thank you!</span>
                                <?php } else if (strlen($_GET['invalid'])) { ?>
                                	Email <span class="error">NOT</span> sent! Invalid <span class="error"><?=$_GET['invalid']?>!</span>
								<?php } else { ?>
	                            	Email Me
                                <?php } ?>
                            </h2><hr />
                            <textarea name="message" id="msg" placeholder="What's up?"><?php if (strlen($_GET['message'])) { echo urldecode($_GET['message']); } ?></textarea>
                            <input type="email" name="email" id="email" placeholder="Your Email"<?php if (strlen($_GET['email'])) { ?> value="<?=urldecode($_GET['email']);?>"<?php } ?> />
                            <input type="submit" value="send" />
                            <div class="clear"></div>
                    	</form>
                	</div>
                    <div class="box">
                    	<h2>Find Me On</h2><hr />
                        <a href="https://www.facebook.com/derekhalldesign" target="external" class="linker"><div class="disc fb"></div>Facebook</a>
                        <a href="http://www.youtube.com/dereako" target="external" class="linker"><div class="disc yt"></div>YouTube</a>
                        <a href="http://www.linkedin.com/profile/view?id=32971597" target="external" class="linker"><div class="disc li"></div>LinkedIn</a>
                        <div class="clear"></div>
                    </div>
                </div>
            	<div class="left grams">
                	<div class="upper box">
                    	<div class="left">
                        	<h2><a href="http://instagram.com/dereako" target="external">Instagrams</a></h2>
	                    	<h4><span class="roman">via</span> <a href="http://statigr.am/dereako" target="external">Statigram</a></h4>
                        </div>
                        <div class="right">
							<a href="http://instagram.com/dereako?ref=badge" target="external" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="insta-crop">
	                	<iframe id="statigram" src="http://statigr.am/widget.php?choice=myfeed&amp;username=dereako&amp;show_infos=false&amp;linking=statigram&amp;width=364&amp;height=482&amp;mode=grid&amp;layout_x=2&amp;layout_y=2&amp;padding=8&amp;photo_border=false&amp;background=292F33&amp;text=9E9E9E&amp;widget_border=true&amp;radius=5&amp;border-color=3e474e&amp;user_id=228499222&amp;time=1365534825558"></iframe>
                    </div>
                    <div class="box bottom"></div>
                </div>
                <div class="left tweeter">
                	<a class="twitter-timeline" href="https://twitter.com/derekhalldesign" target="external" data-widget-id="325711694846361600">Tweets by @derekhalldesign</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
    <?php include 'foot.php'; ?>
</body>
</html>
