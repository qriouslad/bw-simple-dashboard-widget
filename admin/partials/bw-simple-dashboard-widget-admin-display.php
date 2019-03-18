<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Bw_Simple_Dashboard_Widget
 * @subpackage Bw_Simple_Dashboard_Widget/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php

$content = get_option('bw_cdw_content');

echo $content;

?>