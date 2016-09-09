<?php include 'connector.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'head.php';
	$getProjects = mysql_query("SELECT * FROM `projects` WHERE (SELECT COUNT(id) FROM `slides` WHERE project_id=projects.id)>0 ORDER BY (SELECT COUNT(id) FROM `slides` WHERE project_id=projects.id) DESC, `title` ASC",$con) or die(mysql_error()); ?>
	<title>Derek Hall | Work</title>
</head>
<body>
	<div id="work">
		<?php include 'nav.php'; ?>
        <div class="list">
        	<?php $cnt=0;
			while ($proj = mysql_fetch_array($getProjects)) { ?>
                <div class="project <?=$proj['variety'];?><?php if ($cnt==0) { echo ' chosen'; } ?>" data-label="<?=$proj['type']?>">
                    <div class="title">
						<?php if (strlen($proj['url'])) { ?><a href="<?=$proj['url']?>" target="_blank"><?php } ?>
						<?=$proj['title']?>
						<?php if (strlen($proj['url'])) { ?></a><?php } ?>
                    </div>
					<?php $getStats = mysql_query("SELECT SUM(width) as `tot`,COUNT(id) as `cnt` FROM `slides` WHERE `project_id`={$proj['id']}",$con);
                    $stats = mysql_fetch_array($getStats); ?>
                    <div class="controls">
                        <?php if ($stats['cnt']>1) { ?><div class="left"><span class="slide_no">1</span><span class="faded"> / <?=$stats['cnt']?></span></div><?php } ?>
                    	<a href="javascript:void(0);" onclick="$('.what').toggleClass('active'); $('.more').slideToggle();" class="what right">?</a>
                    	<div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="viewer">
                		<div class="hoverL"></div><div class="hoverR"></div>
                    	<div class="more">
                        	<?=$proj['desc']?><br /><br />
                            <span class="bold">What I did:</span> <?=$proj['did'];?>
                        </div>
                        <div class="slider" style="width: <?=$stats['tot'] + 20*$stats['cnt']?>px;">
                        	<?php $getSlides = mysql_query("SELECT * FROM `slides` WHERE `project_id`={$proj['id']} ORDER BY `id` ASC",$con);
							while ($slide = mysql_fetch_array($getSlides)) { ?>
                            	<div class="slide" style="width: <?=$slide['width']?>px; height: <?=$slide['height']?>px;">
									<?php if ($slide['type']=='image') { ?>
                                        <img src="work/<?=$slide['id']?>.jpg" width="<?=$slide['width']?>" height="<?=$slide['height']?>" alt="<?=$slide['caption']?>" title="<?=$slide['caption']?>" />
                                    <?php } else if ($slide['type']=='video') { ?>
                                        <iframe width="<?=$slide['width']?>" height="<?=$slide['height']?>" src="http://www.youtube.com/embed/<?=$slide['src']?>" frameborder="0" allowfullscreen></iframe>
                                    <?php } else if ($slide['type']=='text') { ?>
                                        <div class="words"><h4><?=$slide['caption']?></h4><?=nl2br($slide['src']);?></div>
                                    <?php } ?>
                            	</div>
							<?php } ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            	<?php $cnt++;
			} ?>
        </div>
		<script type="text/javascript">
			var done = true;
            var currently = 0;
			var speed = 300;
			var timer = "";
			var i = 1;
			
			function sizeUp() {
				topList = $('.project').map(function() {
					return $(this).position().top;
				}).get();
				heightList = $('.project').map(function() {
					return $(this).height();
				}).get();
			}
			
            function getCurrent() {
				var top = $(window).scrollTop() + $(window).height() + parseInt($('.list').css("padding-top"));
                for(var i=0; i<topList.length; i++) {
                    if(top > topList[i]+heightList[i] && ((topList[i+1] && top < topList[i+1]+heightList[i+1]) || !topList[i+1])) {
                        return i;
                    }
                }
            }
            
			function goTo(which) {
				if (done==true) {
					done = false;
					var newY = (topList[which] - parseInt($('.list').css("padding-top"))) +"px";
					$('html, body').animate({'scrollTop': newY}, 300,function() {
						currently = which;
						done = true;
					});
				}
			}
			
            $(window).scroll(function(e) {
                var checkIndex = getCurrent(); 
				if(checkIndex !== currently) {
					currently = checkIndex;
					$(".project").eq( currently ).addClass("chosen").siblings(".project").removeClass("chosen");
					var label = $(".project").eq( currently ).data('label');
					$('#label').html(label);
				}
            });
			
			function slide(dir) {
				if (done==true) {
					var anim = false;
					var slider = $(".project").eq( currently ).find('.slider');
					var oldX = parseInt(slider.css('marginLeft'));
					var slidesWide = slider.children('.slide').map(function() {
						return $(this).width() + parseInt($(this).css('marginRight'));
					}).get();
					var now = 0;
					var stack = 0;
					if (oldX!=0) {
						for (var i=1; i<slidesWide.length; i++) {
							stack -= slidesWide[i-1];
							if (stack >= oldX && oldX > stack - slidesWide[i]) {
								var now = i;
							}
						}
					}
					
					if (dir=='left') {
						var sWidth = slidesWide[now-1];
						var newX = oldX + sWidth;
						if (newX<=0) {
							now--;
							anim = true;
						}
					} else if (dir=='right') {
						var sWidth = slidesWide[now];
						var newX = oldX - sWidth;
						if (newX > slider.width()*-1) {
							now++;
							anim = true;
						}
					}
					if (anim==true) {
						$(".project").eq( currently ).find('.slide_no').html(now+1);
						done = false;
						slider.animate({'marginLeft': newX+"px"}, speed,function(){
							done = true;
						});
					}
				}
			}
			
			$('.hoverL').hover(function() {
				if ($(this).parent().parent('.project').hasClass('chosen')) {
					timer = setInterval(function() {
						if (speed > 20) { i++; speed -= 20*i; }
						slide('left');
					}, speed+100);
					slide('left');
				}
			},function() {
				window.clearInterval(timer);
				speed = 300;
				i = 1;
			});
			$('.hoverR').hover(function() {
				if ($(this).parent().parent('.project').hasClass('chosen')) {
					timer = setInterval(function() {
						if (speed > 20) { i++; speed -= 20*i; }
						slide('right');
					}, speed+100);
					slide('right');
				}
			},function() {
				window.clearInterval(timer);
				speed = 300;
				i = 1;
			});
			
			$(document).keydown(function (e) {
				var keyCode = e.keyCode || e.which,
					arrow = {left: 37, up: 38, right: 39, down: 40 };
				switch (keyCode) {
					case arrow.left:
						if (speed > 20) { speed -= 20; }
						slide('left');
					break;
					case arrow.up:
						if (currently > 0) { goTo(currently-1); } else { goTo(topList.length-1); }
						return false;
					break;
					case arrow.right:
						if (speed > 20) { speed -= 20; }
						slide('right');
					break;
					case arrow.down:
						if (currently < topList.length-1) { goTo(currently+1); } else { goTo(0); }
						return false;
					break;
				}
			});
			
			$(document).keyup(function (e) {
				var keyCode = e.keyCode || e.which,
					arrow = {left: 37, right: 39 };
				switch (keyCode) {
					case arrow.left:
						speed = 300;
					break;
					case arrow.right:
						speed = 300;
					break;
				}
			});
			
			sizeUp();
			$(window).resize(function() { sizeUp(); });
        </script>
	</div>
</body>
</html>