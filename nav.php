<div id="bar">
	<div id="logo"><img src="/img/logo.png" alt="Derek Hall" /></div>
    <div id="label">new media designer</div>
    <div id="nav">
        <nav>
            <div class="work section<?php if (strpos($_SERVER['SCRIPT_NAME'],'index.php')) { echo ' on'; } ?>" onclick="document.location.href='/index.php';">
            	<div class="text">work</div><div class="color"></div>
            </div>
            <div class="about section<?php if (strpos($_SERVER['SCRIPT_NAME'],'about.php')) { echo ' on'; } ?>" onclick="document.location.href='/about.php';">
            	<div class="text">about</div><div class="color"></div>
            </div>
            <div class="connect section<?php if (strpos($_SERVER['SCRIPT_NAME'],'connect.php')) { echo ' on'; } ?>" onclick="document.location.href='/connect.php';">
            	<div class="text">connect</div><div class="color"></div>
            </div>
        </nav>
	</div>
    <div id="tweets">
        <a class="twitter-timeline" height="460" href="https://twitter.com/derekhalldesign" data-widget-id="264444616831533056">Tweets by @derekhalldesign</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>