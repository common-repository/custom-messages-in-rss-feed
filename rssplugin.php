<?php
/* 
Plugin Name: Custom Message in RSS Feed
Plugin URI: https://www.keralpatel.com/adding-custom-messages-into-rss-feed/
Description: This Plugin allows you to insert custom messages at the start or the end of your blog entry in your RSS feed.
Author: Keral Patel
Version: 1.1
Author URI: https://www.keralpatel.com
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
add_action('admin_menu', 'crmif_rss_create_menu');

function crmif_rss_create_menu() {
	add_options_page('Custom Message In RSS Feed', 'Message In Rss Feed', 'administrator', __FILE__, 'crmif_rss_settings_page');
	add_action('admin_init', 'crmif_register_rsssettings');
}

function crmif_register_rsssettings() {
	register_setting('rss-settings', 'rss_custom_message');
	register_setting('rss-settings', 'rss_message_position');
}

function crmif_rss_settings_page() {
	$rss_custom_message = get_option('rss_custom_message');
	$rss_message_position = get_option('rss_message_position');
?>
<div class="wrap">
<h2>Custom RSS Message Settings</h2>
<p><cite>Custom RSS Message</cite> allows you to append or prepend any text or HTML in your feed.
<br />
You can even insert a small logo or icon of your blog to make your feeds look more beautiful.</p>
<form method="post" action="options.php">
<?php settings_fields( 'rss-settings' ); ?>
<table class="form-table">
<tr valign="top">
<th scope="row">Your Custom Message</th>
<td>
<input type="text" name="rss_custom_message" placeholder="CUSTOM MESSAGE HERE" value="<?php esc_html_e($rss_custom_message, 'plugin-slug'); ?>">
</td>
</tr>
<tr>
<td>Message Position in Feed</td>
<td>
At Start <input type="radio" name="rss_message_position" value="Start" <?php if ($rss_message_position == "Start") { echo "checked"; } ?>>
<br />
At the End <input type="radio" name="rss_message_position" value="End" <?php if ($rss_message_position == "End") { echo "checked"; } ?>>
</td>
</tr>
</table>
<p class="submit">
<input type="submit" name="submit-bpu" class="button-primary" value="Save Changes" />
</p>
</form>
</div>
<?php } ?>