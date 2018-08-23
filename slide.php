<div class="slide" style="width: <?=$slide['width']?>px; height: <?=$slide['height']?>px;">
    <?php if ($slide['type']=='image') { ?>
        <img src="work/<?=$slide['id']?>.jpg" width="<?=$slide['width']?>" height="<?=$slide['height']?>" alt="<?=$slide['caption']?>" title="<?=$slide['caption']?>" />
    <?php } else if ($slide['type']=='video') { ?>
        <iframe width="<?=$slide['width']?>" height="<?=$slide['height']?>" src="https://www.youtube.com/embed/<?=$slide['src']?>" frameborder="0" allowfullscreen></iframe>
    <?php } else if ($slide['type']=='text') { ?>
        <div class="words"><h4><?=$slide['caption']?></h4><?=nl2br($slide['src']);?></div>
    <?php } ?>
</div>
