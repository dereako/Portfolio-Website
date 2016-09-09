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