<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
/* 
Plugin Name: Custom Message in RSS Feed
Plugin URI: https://www.keralpatel.com/adding-custom-messages-into-rss-feed/
Description: This Plugin allows you to insert custom messages at the start or the end of your blog entry in your RSS feed.
Author: Keral Patel
Version: 1.1
Author URI: https://www.keralpatel.com
License: GPLv2 or later
*/

function crmif_customizerss($content) {
$rss_custom_message = get_option('rss_custom_message');
$rss_message_position = get_option('rss_message_position');
global $post;
if($rss_message_position == "Start")
{
$content = $rss_custom_message . " " . $content;
}
else
{
$content = $content . " " . $rss_custom_message;
}
return $content;
}
add_filter('the_excerpt_rss', 'crmif_customizerss');
add_filter('the_content_feed', 'crmif_customizerss');
include('rssplugin.php');
?>