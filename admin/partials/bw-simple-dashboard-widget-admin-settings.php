<?php

/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       https://bowo.io
* @since      2.1.0
*
* @package    Bw_Simple_Dashboard_Widget
* @subpackage Bw_Simple_Dashboard_Widget/admin/partials
*/
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap dash-widget-options">

	<form action="options.php" method="post">

		<?php

		settings_fields( 'bw_cdw' );

		do_settings_sections( 'bw_cdw' );

		submit_button( 'Save Settings' );

		?>

	</form>

</div>