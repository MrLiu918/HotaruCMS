<?php 

/* ******* ADMIN TEMPLATE ************************************************************************** 
 * Theme name: admin_default
 * Template name: plugins.php
 * Template author: Nick Ramsay
 * Version: 0.1
 * License:
 *
 *   This file is part of Hotaru CMS (http://www.hotarucms.org/).
 *
 *   Hotaru CMS is free software: you can redistribute it and/or modify it under the terms of the 
 *   GNU General Public License as published by the Free Software Foundation, either version 3 of 
 *   the License, or (at your option) any later version.
 *
 *   Hotaru CMS is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 *   even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License along with Hotaru CMS. If not, 
 *   see http://www.gnu.org/licenses/.
 *   
 *   Copyright (C) 2009 Hotaru CMS - http://www.hotarucms.org/
 *
 **************************************************************************************************** */

global $hotaru, $plugin, $lang; // don't remove
$the_plugins = $plugin->get_plugins(); // don't remove
$the_plugins = sksort($the_plugins, "order", "int", true);	// sorts plugins by "order"
?>

<p class="breadcrumbs">
	<a href="<?php echo baseurl; ?>"><?php echo site_name?></a> 
	&raquo; <a href="<?php echo url(array(), 'admin'); ?>"><?php echo $lang["admin_theme_main_admin_cp"]?></a> 
	&raquo; <?php echo $lang["admin_theme_plugins"]; ?>
</p>
	
<?php $hotaru->show_message(); ?>

<div id="plugin_list">

<?php $plugin->check_actions('plugins_top'); ?>

<table>

<tr class='plugins_table_installed'><td colspan=6><?php echo $lang["admin_theme_plugins_installed"]; ?></td></tr>
<tr class='plugins_table_headers'>
<td><?php echo $lang["admin_theme_plugins_active"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_switch"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_plugin"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_install"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_order"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_details"]; ?></td>
</tr>

<?php
	$alt = 0;
	foreach($the_plugins as $plug) {
		$alt++;
		if($plug['location'] == 'database') {		
			echo "<tr id='plugins_tr' class='plugins_table_row_" . $alt % 2 . "'>\n";
			echo "<td class='plugins_active'>" . $plug['active'] . "</td>\n";
			echo "<td class='plugins_status'>" . $plug['status'] . "</td>\n";
			echo "<td class='plugins_name'>" . $plug['name'] . " " . $plug['version'] . "</td>\n";
			echo "<td class='plugins_install'>" . $plug['install'] . "</td>\n";
			echo "<td class='plugins_order'>" . $plug['order_output'] . "</td>\n";
			echo "<td class='plugins_details'><a class='plugin_drop_down' href='#'><img src='" . baseurl . "custom/admin_themes/" . admin_theme . "images/info.png'></a></td>\n";
			echo "</tr>\n";
			echo "<tr id='plugins_tr_details' style='display:none;'><td colspan=5 class='plugin_description'>";
			echo "<b>" . $lang["admin_theme_plugins_description"] . ":</b> " . $plug['description'] . "<br />";
			echo "<b>" . $lang["admin_theme_plugins_requires"] . ":</b> ";
			$requires = "";
			foreach($plug['requires'] as $key=>$value) {
				$requires .= $key . " " . $value . ", ";
			}
			if($requires != "") { echo rstrtrim($requires, ", "); } else { echo $lang["admin_theme_plugins_no_plugins"]; }
			echo "</td>";
			echo "<td class='plugin_description_close'><a class='plugin_hide_details' href='#'>";
			echo $lang["admin_theme_plugins_close"] . "</a></td></tr>\n";
		}
	}
?>
</table>

<table>	
<tr><td colspan=5>&nbsp;</td></tr>
<tr class='plugins_table_not_installed'><td colspan=6><?php echo $lang["admin_theme_plugins_not_installed"]; ?></td></tr>
<tr class='plugins_table_headers'>
<td><?php echo $lang["admin_theme_plugins_active"]; ?></td>
<td colspan=2><?php echo $lang["admin_theme_plugins_plugin"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_requires"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_install"]; ?></td>
<td><?php echo $lang["admin_theme_plugins_details"]; ?></td>
</tr>

<?php
	$alt = 0;
	foreach($the_plugins as $plug) {
		$alt++;
		if($plug['location'] == 'folder') {		
			echo "<tr id='plugins_tr' class='plugins_table_row_" . $alt % 2 . "'>\n";
			echo "<td class='plugins_active'>" . $plug['active'] . "</td>\n";
			echo "<td class='plugins_name' colspan=2>" . $plug['name'] . " " . $plug['version'] . "</td>\n";
			echo "<td class='plugins_requires'>";
			foreach($plug['requires'] as $key=>$value) {
				echo $key . " " . $value . "<br />";
			}
			echo "</td>\n";
			echo "<td class='plugins_install'>" . $plug['install'] . "</td>\n";
			echo "<td class='plugins_details'><a class='plugin_drop_down' href='#'><img src='" . baseurl . "custom/admin_themes/" . admin_theme . "images/info.png'></a></td>\n";
			echo "</tr>\n";
			echo "<tr id='plugins_tr_details' style='display:none;'><td colspan=5 class='plugin_description'>";
			echo "<b>" . $lang["admin_theme_plugins_description"] . ":</b> " . $plug['description'] . "</td>";
			echo "<td class='plugin_description_close'><a class='plugin_hide_details' href='#'>";
			echo $lang["admin_theme_plugins_close"] . "</a></td></tr>\n";
		}
	}

?>
</table>
</div>
<div class="clear"></div>
<div id="plugin_management_notice" class="info_box gray_box" style="margin-top: 2.0em";>
	<p class="info_header"><?php echo $lang["admin_theme_plugins_guide"]?></p>
	<?php $plugin->check_actions('plugins_guide_top'); ?>
	&raquo; <?php echo $lang["admin_theme_plugins_guide1"]?><br />
	&raquo; <?php echo $lang["admin_theme_plugins_guide2"]?><br />
	&raquo; <?php echo $lang["admin_theme_plugins_guide3"]?><br />
	<?php $plugin->check_actions('plugins_guide_bottom'); ?>
</div>


<?php $plugin->check_actions('plugins_bottom'); ?>