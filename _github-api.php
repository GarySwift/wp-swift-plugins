<?php

$api = new Github\Api;
$username = 'wp-swift-wordpress-plugins';
$responses = array();

$repos = array(
	array( 
		"title" => "WP Swift: ACF Starter Widget",
		"slug" => "wp-swift-acf-starter-widget"
		"desciption" => ""
	),
	array( 
		"title" => "WP Swift: FAQ CPT",
		"slug" => "wp-swift-faq-cpt"
		"desciption" => ""
	),
	array( 
		"title" => "WP Swift: Footer Contact Widget",
		"slug" => "wp-swift-contact-widget"
		"desciption" => ""
	),
	array( 
		"title" => "WP Swift: Form Builder",
		"slug" => "wp-swift-form-builder-2"
		"desciption" => ""
	),
	array( 
		"title" => "WP Swift: Prevent WordPress Empty Search",
		"slug" => "wp-swift-prevent-empty-search"
		"desciption" => ""
	),
);

foreach ($repos as $key => $repo) {
	$response = $api->get('/repos/'.$username.'/'.$repo["slug"]);
	$responses[$repo["title"]] = $api->decode($response);
}	

foreach ($responses as $key => $response): ?>
 	<?php if ( isset($response->description) && isset($response->html_url) ): ?>
 		<h3><?php echo $key ?></h3>
 		<p><?php echo $response->description ?></p>
		<form method="post" name="wp-swift-git-repo-form" action="<?php echo $action; ?>">
			<input type="hidden" name="wp-swift-git-repo" value="<?php echo $response->name ?>">
			<input type="submit" value="Install">
			
		</form>
		<a href="<?php echo $response->html_url ?>" target="_blank">Read More</a> 	

 		<hr>
 	<?php endif ?>
 <?php 
endforeach;