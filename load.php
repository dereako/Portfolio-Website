<?php include 'connector.php'; 
$id = intval($_POST['proj']);
$list = intval($_POST['width']);
if ($list < 400) {
	$list = 400;
}
$getProject = mysql_query("SELECT * FROM `projects` WHERE id={$id} ORDER BY `id` ASC",$con) or die(mysql_error());
$proj = mysql_fetch_array($getProject);
$marginR = 20;
$threshold = 805;
$videos = array(13,14,21);
if ($list <= $threshold && in_array($id,$videos)) { $addin = " AND `type`='video'"; $lim = "LIMIT 1"; }
$getDims = mysql_query("SELECT max(width),min(height) FROM `slides` WHERE `project_id`={$proj['id']} {$addin}",$con);
$dims = mysql_fetch_array($getDims);

// figure out ideal dimensions
if ($list <= $threshold) {
	$targetW = $list-$marginR;
} else {
	$targetW = round($list*2/3);
}
if ($dims[0]>$targetW) {
	$scaler = $targetW/$dims[0];
} else {
	$scaler = 1;
}
$targetH = intval($dims[1]); ?>
<div class="project<?php if ($id==1) { echo ' chosen'; } else if (in_array($id,$videos)) { echo ' video'; } ?>" id="proj-<?=$id?>" data-label="<?=$proj['type']?>">
    <div class="title">
        <?php if (strlen($proj['url'])) { ?><a href="<?=$proj['url']?>" target="_blank"><?php } ?>
        <?=$proj['title']?>
        <?php if (strlen($proj['url'])) { ?></a><?php } ?>
    </div>
    <?php $getStats = mysql_query("SELECT SUM(width) as `tot`,COUNT(id) as `cnt` FROM `slides` WHERE `project_id`={$proj['id']} {$addin}",$con);
    $stats = mysql_fetch_array($getStats); ?>
    <div class="controls">
        <?php if ($stats['cnt']>1) { if ($list > $threshold || ($list <= $threshold && !in_array($id,$videos))) { ?><div class="left"><span class="slide_no">1</span><span class="faded"> / <?=$stats['cnt']?></span></div><?php } } ?>
        <a href="javascript:void(0);" onclick="if ($(this).hasClass('active')) { $('.what').removeClass('active'); $('.more').slideUp(); } else { $('.what').addClass('active'); $('.more').slideDown(); }" class="what right">?</a>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="viewer">
        <div class="hoverL"></div><div class="hoverR"></div>
        <div class="more">
            <?=$proj['desc']?><br /><br />
            <span class="bold">What I did:</span> <?=$proj['did'];?>
        </div>
        <div class="slider">
            <?php $getSlides = mysql_query("SELECT * FROM `slides` WHERE `project_id`={$proj['id']} {$addin} ORDER BY `id` ASC {$lim}",$con);
            while ($slide = mysql_fetch_array($getSlides)) {
				$h = round($targetH*$scaler);
				$w = round(($h*$slide['width']/$slide['height']));
				$total += $w + $marginR; ?>
                <div class="slide" style="width: <?=$w?>px; height: <?=$h?>px;">
                    <?php if ($slide['type']=='image') { ?>
                        <img src="work/<?php if ($list <= 450) { echo 'thumbs/'; } ?><?=$slide['id']?>.jpg" style="width: <?=$w?>px; height: <?=$h?>px; max-width: <?=$slide['width']?>px; max-height: <?=$slide['height']?>px;" alt="<?=$slide['caption']?>" title="<?=$slide['caption']?>" />
                    <?php } else if ($slide['type']=='video') { ?>
                        <iframe class="youtube" width="<?=$w?>" height="<?=$h?>" src="http://www.youtube.com/embed/<?=$slide['src']?>" frameborder="0" allowfullscreen></iframe>
                    <?php } else if ($slide['type']=='text') { ?>
                        <div class="words"><div class="inside"><h4><?=$slide['caption']?></h4><?=nl2br($slide['src']);?></div></div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$('#proj-<?=$id?> .slider').css('width','<?=$total?>px');
	var total = 0;
	if (mobilecheck()) {
		$("#proj-<?=$id?> .viewer").swipe({ 
			swipeStatus:swipe, 
			maxTimeThreshold:2000,
			threshold:200,
			triggerOnTouchEnd:false,
			allowPageScroll:"vertical"
		});
	}
	<?php if ($list > $threshold) { ?>
		$('#proj-<?=$id?> .words').each(function(){
			while ($(this).innerHeight() < <?=$h?>) {
				$(this).css('width',($(this).width()-1)+"px");
			}
			while ($(this).innerHeight() > <?=$h?>) {
				$(this).css('width',($(this).width()+1)+"px");
			}
			$(this).css({'position':'relative','height':'<?=$h?>px','font-size':$(this).css('font-size')});
			$(this).parent('.slide').css('width',$(this).width()+'px');
		});
	<?php } ?>
	widths<?=$id?> = $('#proj-<?=$id?> .slider').children('.slide').map(function() {
		var amnt = $(this).width()+<?=$marginR?>;
		total += amnt;
		return amnt;
	}).get();
	$('#proj-<?=$id?> .slider').css('width',total+'px');
	topList.push(Math.round($('#proj-<?=$id?>').position().top));
	heightList.push(<?=$h?>);
</script>