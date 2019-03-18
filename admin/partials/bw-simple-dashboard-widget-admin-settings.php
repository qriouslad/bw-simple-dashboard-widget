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

<table class="form-table">
	<tbody>
		<tr>
			<th scope="row">
				Custom Dashboard Widget
			</th>
			<td>
				<?php

				$title = get_option('bw_cdw_title');

				?>

				<input type="text" name="bw_cdw_title" value="<?php echo isset( $title ) ? esc_attr( $title ) : '' ?>">
				<p class="description">Title of the widget</p>
				<p>&nbsp;</p>

				<?php

				$content = get_option('bw_cdw_content');

				$args = array(
					'wpautop' => false,
				    'textarea_rows' => 15,
				    // 'teeny' => true,
				    // 'quicktags' => false,
				);

				wp_editor( $content, 'bw_cdw_content', $args );

				?>
				<p class="description">Content of the widget</p>

			</td>
		</tr>
	</tbody>
</table>