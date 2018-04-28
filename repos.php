<?php
function wp_swift_get_repos() {
  return array(
    "wp-swift-acf-social-media-profiles" => array(
      "title" => "WP Swift: ACF Social Media Profiles",
      "description" => "Add social media profiles",
      "url" => "https://github.com/wp-swift-wordpress-plugins/wp-swift-acf-social-media-profiles",
      "thickbox" => array(
        "id" => "id-acf-social-media-profiles",
        "content" => '<pre class="prettyprint">
&lt;?php if (function_exists("get_social_media")): ?&gt;
  &lt;?php $social_media_links = get_social_media(); ?&gt;

  &lt;?php if ( count($social_media_links) ) : ?&gt;         
      &lt;ul class=&quot;menu&quot;&gt;
        &lt;?php foreach ($social_media_links as $key =&gt; $link): 
        ?&gt;&lt;li&gt;&lt;a href=&quot;&lt;?php echo $link["link"]; ?&gt;&quot; class=&quot;icon-link&quot; target=&quot;_blank&quot;&gt;
              &lt;i class=&quot;fa &lt;?php echo $link["icon"]." ". $link["slug"]; ?&gt;&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;
              &lt;span class=&quot;hide&quot;&gt;Social Media Link &lt;?php echo $link["name"]; ?&gt;&lt;/span&gt;
            &lt;/a&gt;&lt;/li&gt;&lt;?php 
          endforeach ?&gt;
      &lt;/ul&gt;
  &lt;?php endif; ?&gt; 

&lt;?php endif ?&gt;
</pre>
<h5>SASS Varibales</h5>
<pre class="prettyprint">
$twitter: #00aced;
$facebook: #3b5998;
$linkedin: #007bb6;
$youtube: #bb0000;
$google-plus: #dd4b39;
</pre>',
        "link" => "Details",
      ),
    ),    
    "wp-swift-acf-starter-widget" => array(
      "title" => "WP Swift: ACF Starter Widget",
      "description" => "A starter widget for creating widgets using Advanced Custom Fields.",
      "thickbox" => array(
        "id" => "my-content-id",
        "content" => "This is a developer only plugin.",
        "link" => "Details",
      ),
    ),
    "wp-swift-faq-cpt" => array(
      "title" => "WP Swift: FAQ CPT",
      "description" => "WordPress custom post type for frequently asked questions.",
    ),  
    "wp-swift-contact-widget" => array(
      "title" => "WP Swift: Footer Contact Widget",
      "description" => "Placeholder widget for contact details",
    ),
    "wp-swift-form-builder-2" => array(
      "title" => "WP Swift: Form Builder 2",
      "description" => "Create and manage frontend forms with ease.",
    ),  
    "wp-swift-prevent-empty-search" => array(
      "title" => "WP Swift: Prevent WordPress Empty Search",
      "description" => "Prevent users doing an empty WordPress search.",
      "url" => "https://github.com/wp-swift-wordpress-plugins/wp-swift-prevent-empty-search",
      "thickbox" => array(
        "id" => "my-content-id",
        "content" => "This is a developer only plugin.",
        "link" => "Details",
      ),      
    ),
    "wp-swift-svg-support" => array(
      "title" => "WP Swift: SVG Support",
      "description" => "Add Scaleable Vector Graphics (SVG) Upload Support into WordPress.",
    ),  
    "wp-swift-google-map" => array(
      "title" => "WP Swift: ACF Google Map",
      "description" => "This will allow users set a location on a google map via an ACF interface and show the map using a shortcode.",
    ),            
  );                        
}