<?php
function wp_swift_thickbox( $repo ) {
	$title = $repo["title"];
	$description = $repo["description"];
	$id = $repo["thickbox"]["id"];
	$content = $repo["thickbox"]["content"];
	$link = 'Details';
	if (isset($repo["thickbox"]["link"])) {
		$link = $repo["thickbox"]["link"];
	}
	$width = 600;
	$height = 550;
	
	?>
	<div id="<?php echo $id ?>" style="display:none;">
		<h3><?php echo $title ?></h3>
		<p><?php echo $description ?></p>
		<hr>
	    <p><?php echo $content ?></p>
	</div>
	&#x7c; <a href="#TB_inline?width=<?php echo $width ?>&height=<?php echo $height ?>&inlineId=<?php echo $id ?>" class="thickbox"><?php echo $link ?></a>
	<?php
}