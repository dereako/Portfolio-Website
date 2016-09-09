<?php include 'connector.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'head.php';
	// $getProjects = mysql_query("SELECT * FROM `projects` WHERE (SELECT COUNT(id) FROM `slides` WHERE project_id=projects.id)>0 ORDER BY (SELECT COUNT(id) FROM `slides` WHERE project_id=projects.id) DESC, `title` ASC",$con) or die(mysql_error()); ?>
	<title>Derek Hall | Work</title>
	<script type="text/javascript" src="js/javascript.js"></script>
</head>
<body>
	<div id="work">
		<?php include 'nav.php'; ?>
        <div class="list">
        	<div class="container">
        	<?php /* $cnt=0;
			while ($proj = mysql_fetch_array($getProjects)) {
				include 'project.php';
				$cnt++;
			} */ ?>
            </div>
           	<div class="loading"><div class="gif"></div><div class="msg">Loading&hellip;</div></div>
           	<div class="backtop" onclick="scrollTo(0,0);">Back to Top</div>
        </div>
	</div>
    <?php mysql_close($con); ?>
</body>
</html>