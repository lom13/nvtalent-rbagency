<!--sort option values-->
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery( "#editfield_add_more_options_1" ).sortable();
	jQuery( "#editfield_add_more_options_2" ).sortable();
});
</script>
<style type="text/css">
	#wpfooter{
		position: relative !important;
	}
</style>
<?php

global $wpdb;

// Include Admin Menu
	include (RBAGENCY_PLUGIN_DIR ."view/partial/admin-menu.php");

// Get Current Page
	if(!isset($_REQUEST['ConfigID']) && empty($_REQUEST['ConfigID'])){
		$ConfigID = 0;
	} else {
		$ConfigID = $_REQUEST['ConfigID']; 
	}

	// Get State to be deleted
	if(!isset($_REQUEST['delstate']) && empty($_REQUEST['delstate'])){
		$delState = 0;
	} else {
		$delState = $_REQUEST['delstate']; 
	}

/*
 * Display Appropriate Page
 */
	switch ($ConfigID) {
		// Overview
		case 0:
			echo "<h1>Settings &raquo; Overview</h1>";
			//return RBAgency_AdminSettings::Overview();
			break;

		// Settings
		case 1:
			echo "<h1>Settings &raquo; Configuration</h1>";
			//return RBAgency_AdminSettings::Configuration();
			break;

		// Style
		case 2:
			echo "<h1>Settings &raquo; Style</h1>";
			//return RBAgency_AdminSettings::Style();
			break;

		// Data: Gender
		case 3:
			echo "<h1>Settings &raquo; Data &raquo; Gender</h1>";
			//return RBAgency_AdminSettings::DataGender();
			break;

		// Data: Profile Types
		case 4:
			echo "<h1>Settings &raquo; Data &raquo; Profile Types</h1>";
			//return RBAgency_AdminSettings::DataProfileType();
			break;

		// Data: Custom Fields
		case 5:
			echo "<h1>Settings &raquo; Data &raquo; Custom Fields</h1><br />";
			//return RBAgency_AdminSettings::DataCustomFields();
			break;

		// Data: Media Types
		case 6:
			echo "<h1>Settings &raquo; Data &raquo; Media Types</h1>";
			//return RBAgency_AdminSettings::DataMediaType();
			break;

		// Data: Media Types
		case 12:
			echo "<h1>Settings &raquo; Subscription</h1>";
			//return RBAgency_AdminSettings::Uninstall();
			break;


		// Data: Media Types
		case 99:
			echo "<h1>Settings &raquo; Uninstall</h1>";
			//return RBAgency_AdminSettings::Uninstall();
			break;

	}



if ($ConfigID == 0) {
?>
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h3><?php echo __("Configuration", RBAGENCY_TEXTDOMAIN ) ?>:</h3>
					<ul>
						<li><a href="?page=<?php echo $_GET["page"]; ?>&ConfigID=1"><strong><?php _e("Settings", RBAGENCY_TEXTDOMAIN); ?></strong></a> - <?php _e("Access this area to manage all of the core settings including layout types, privacy settings and more", RBAGENCY_TEXTDOMAIN); ?></li>
						<li><a href="?page=<?php echo $_GET["page"]; ?>&ConfigID=2"><strong><?php _e("Style", RBAGENCY_TEXTDOMAIN); ?></strong></a> - <?php _e("Access this area to manage all of the core settings including layout types, privacy settings and more", RBAGENCY_TEXTDOMAIN); ?></li>
					</ul>
				</div>

				<div class="welcome-panel-column" style="margin-left: 50px;">
					<h3><?php echo __("Diagnostics", RBAGENCY_TEXTDOMAIN ) ?>:</h3>
						<?php
						//echo "No Diagnostic has been run.  Please run now.";
						// Diagnostic Tests
						//require_once(WP_PLUGIN_DIR . "/" . basename(dirname(__FILE__)) . "/diagnostic.php");

						// TODO: Add Diagnostic
						?>
				</div>

			</div>
		</div>
	</div>


<?php

//*************************************************************************************************** //
/*
 * Overview Page
 */

	// Core Settings
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Configuration", RBAGENCY_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("The following settings modify the core RB Agency settings.", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Features", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=1\" title=\"". __("Settings", RBAGENCY_TEXTDOMAIN) . "\">". __("Settings", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Access this area to manage all of the core settings including layout types, privacy settings and more", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Style", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=2\" title=\"". __("Style", RBAGENCY_TEXTDOMAIN) . "\">". __("Style", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage the stylesheet (CSS) controlling the category and profile layouts", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "</div>\n";
	echo "<hr />\n";

	if(function_exists('rb_agency_interact_menu')){
	// RB Agency Interact Settings
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Interactive Settings", RBAGENCY_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("These settings modify the behavior of the RB Agency Interactive plugin.", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Interactive Settings", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=11\" title=\"". __("Interactive Settings", RBAGENCY_TEXTDOMAIN) . "\">". __("Settings", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Access this area to manage all of the core settings including layout types, privacy settings and more", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";

	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Subscription Rates", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=12\" title=\"". __("Subscription Rates", RBAGENCY_TEXTDOMAIN) . "\">". __("Subscription Rates", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage the subscription rate tiers and descriptions", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";

	echo "</div>\n";
	echo "<hr />\n";
	}
	// Drop Down Fields
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Customize Profile Fields", RBAGENCY_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("You have full control over all drop downs and ability to add new custom fields of your own.", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Profile Categories", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=4\" title=\"". __("Profile Categories", RBAGENCY_TEXTDOMAIN) . "\">". __("Profile Categories", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Choose custom category types to classify profiles", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Custom Fields", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=5\" title=\"". __("Custom Fields", RBAGENCY_TEXTDOMAIN) . "\">". __("Custom Fields", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Add public and private custom fields", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Gender", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=3\" title=\"". __("Gender", RBAGENCY_TEXTDOMAIN) . "\">". __("Gender", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage preset Gender choices", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Media Categories", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=6\" title=\"". __("Media Categories", RBAGENCY_TEXTDOMAIN) . "\">". __("Media Categories", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage your media categories", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <h3>". __("Locations", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
	echo "      <a class=\"button-primary\" href=\"?page=". $_GET["page"] ."&ConfigID=7\" title=\"". __("Locations", RBAGENCY_TEXTDOMAIN) . "\">". __("Locations", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "      <p>". __("Manage your Locations", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    </div>\n";
	echo "</div>\n";
	echo "<hr />\n";

	// Uninstall
	echo "<div class=\"boxlinkgroup\">\n";
	echo "  <h2>". __("Uninstall", RBAGENCY_TEXTDOMAIN) . "</h2>\n";
	echo "  <p>". __("Uninstall RB Agency software and completely remove all data", RBAGENCY_TEXTDOMAIN) . "</p>\n";
	echo "    <div class=\"boxlink\">\n";
	echo "      <a class=\"button-secondary\" href=\"?page=". $_GET["page"] ."&ConfigID=99\" title=\"". __("Uninstall", RBAGENCY_TEXTDOMAIN) . "\">". __("Uninstall", RBAGENCY_TEXTDOMAIN) . "</a><br />\n";
	echo "    </div>\n";
	echo "</div>\n";

}
elseif ($ConfigID == 1) {
//*************************************************************************************************** //
/*
 * Manage Settings
 */

	/*
	 * Declare Values
	 */
		// Get Group
		$rb_agency_options_arr = get_option('rb_agency_options');

		// Set Default Values
		$rb_agency_value_agencyname = isset($rb_agency_options_arr['rb_agency_option_agencyname'])?$rb_agency_options_arr['rb_agency_option_agencyname']:0;
			if (empty($rb_agency_value_agencyname)) {$rb_agency_value_agencyname = get_bloginfo('name'); }
		$rb_agency_value_agencyemail = isset($rb_agency_options_arr['rb_agency_option_agencyemail'])?$rb_agency_options_arr['rb_agency_option_agencyemail']:"";
			if (empty($rb_agency_value_agencyemail)) {$rb_agency_value_agencyemail = get_bloginfo('admin_email'); }
		$rb_agency_value_maxwidth = isset($rb_agency_options_arr['rb_agency_option_agencyimagemaxwidth'])?$rb_agency_options_arr['rb_agency_option_agencyimagemaxwidth']:0;
			if (empty($rb_agency_value_maxwidth)) {$rb_agency_value_maxwidth = "1000"; }
		$rb_agency_value_maxheight = isset($rb_agency_options_arr['rb_agency_option_agencyimagemaxheight'])?$rb_agency_options_arr['rb_agency_option_agencyimagemaxheight']:0;
			if (empty($rb_agency_value_maxheight)) {$rb_agency_value_maxheight = "800"; }
			$rb_agency_value_profilethumbwidth = isset($rb_agency_options_arr['rb_agency_option_agencyprofilethumbwidth'])?$rb_agency_options_arr['rb_agency_option_agencyprofilethumbwidth']:0;
			if (empty($rb_agency_value_profilethumbwidth)) {$rb_agency_value_profilethumbwidth = "180"; }
		$rb_agency_value_profilethumbheight = isset($rb_agency_options_arr['rb_agency_option_agencyprofilethumbheight'])?$rb_agency_options_arr['rb_agency_option_agencyprofilethumbheight']:0;
			if (empty($rb_agency_value_profilethumbheight)) {$rb_agency_value_profilethumbheight = "230"; }
		$rb_agency_option_profile_thumb_caption = isset($rb_agency_options_arr['rb_agency_option_profile_thumb_caption'])?$rb_agency_options_arr['rb_agency_option_profile_thumb_caption']:0;
			if (empty($rb_agency_option_profile_thumb_caption)) {$rb_agency_option_profile_thumb_caption = 0; }			
		$rb_agency_option_locationcountry = isset($rb_agency_options_arr['rb_agency_option_locationcountry'])?$rb_agency_options_arr['rb_agency_option_locationcountry']:0;
			if (empty($rb_agency_option_locationcountry)) {$rb_agency_option_locationcountry = "US"; }
		$rb_agency_option_profilelist_perpage = isset($rb_agency_options_arr['rb_agency_option_profilelist_perpage'])?$rb_agency_options_arr['rb_agency_option_profilelist_perpage']:0;
			if (empty($rb_agency_option_profilelist_perpage)) {$rb_agency_option_profilelist_perpage = "20"; }
		$rb_agency_option_profilelist_showprofiletypeslinks = isset($rb_agency_options_arr['rb_agency_option_profilelist_showprofiletypeslinks'])?$rb_agency_options_arr['rb_agency_option_profilelist_showprofiletypeslinks']:0;
			if (empty($rb_agency_option_profilelist_showprofiletypeslinks)) {$rb_agency_option_profilelist_showprofiletypeslinks = 0; }
		$rb_agency_option_layoutprofilelist_perrow = isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0;
			if (empty($rb_agency_option_layoutprofilelist_perrow)) {$rb_agency_option_layoutprofilelist_perrow = "5"; }
		$rb_agency_option_layoutprofilelist_favcartdisp = isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartdisp'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartdisp']:0;
			if (empty($rb_agency_option_layoutprofilelist_favcartdisp)) {$rb_agency_option_layoutprofilelist_favcartdisp = "0"; }
			$rb_agency_option_layoutprofilelist_favcartfx = isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx']:0;
			if (empty($rb_agency_option_layoutprofilelist_favcartfx)) {$rb_agency_option_layoutprofilelist_favcartfx = "0"; }
		$rb_agency_option_persearch = isset($rb_agency_options_arr['rb_agency_option_persearch'])?$rb_agency_options_arr['rb_agency_option_persearch']:0;
			if (empty($rb_agency_option_persearch)) {$rb_agency_option_persearch = "100"; }
		$rb_agency_option_showcontactpage = isset($rb_agency_options_arr['rb_agency_option_showcontactpage'])?$rb_agency_options_arr['rb_agency_option_showcontactpage']:0;
			if (empty($rb_agency_option_showcontactpage)) {$rb_agency_option_showcontactpage = "0"; }
		$rb_agency_option_profilelist_favorite = isset($rb_agency_options_arr['rb_agency_option_profilelist_favorite']) ?$rb_agency_options_arr['rb_agency_option_profilelist_favorite']:0;
			if (empty($rb_agency_option_profilelist_favorite)) {$rb_agency_option_profilelist_favorite = "1"; }
		$rb_agency_option_profilelist_castingcart = isset($rb_agency_options_arr['rb_agency_option_profilelist_castingcart'])?$rb_agency_options_arr['rb_agency_option_profilelist_castingcart']:0;
			if (empty($rb_agency_option_profilelist_castingcart)) {$rb_agency_option_profilelist_castingcart = "1"; }
		$rb_agency_option_privacy = isset($rb_agency_options_arr['rb_agency_option_privacy'])?$rb_agency_options_arr['rb_agency_option_privacy']:0;
			if (empty($rb_agency_option_privacy)) {$rb_agency_option_privacy = "0"; }
		// Profile Search Options
		$rb_agency_option_formshow_location = isset($rb_agency_options_arr['rb_agency_option_formshow_location']) ?$rb_agency_options_arr['rb_agency_option_formshow_location']:0;
			if (empty($rb_agency_option_formshow_location)) {$rb_agency_option_formshow_location = "1"; }
		$rb_agency_option_formshow_name = isset($rb_agency_options_arr['rb_agency_option_formshow_name']) ?$rb_agency_options_arr['rb_agency_option_formshow_name']:0;
			if (empty($rb_agency_option_formshow_name)) {$rb_agency_option_formshow_name = "1"; }
		$rb_agency_option_formshow_type = isset($rb_agency_options_arr['rb_agency_option_formshow_type'])?$rb_agency_options_arr['rb_agency_option_formshow_type']:0;
			if (empty($rb_agency_option_formshow_type)) {$rb_agency_option_formshow_type = "1"; }
		$rb_agency_option_formshow_gender = isset($rb_agency_options_arr['rb_agency_option_formshow_gender']) ? $rb_agency_options_arr['rb_agency_option_formshow_gender']:0;
			if (empty($rb_agency_option_formshow_gender)) {$rb_agency_option_formshow_gender = "1"; }
		$rb_agency_option_formshow_age = isset($rb_agency_options_arr['rb_agency_option_formshow_age'])?$rb_agency_options_arr['rb_agency_option_formshow_age']:0;
			if (empty($rb_agency_option_formshow_age)) {$rb_agency_option_formshow_age = "1"; }
		$rb_agency_option_form_clearvalues = isset($rb_agency_options_arr['rb_agency_option_form_clearvalues'])?$rb_agency_options_arr['rb_agency_option_form_clearvalues']:0;
			if (empty($rb_agency_option_form_clearvalues)) {$rb_agency_option_form_clearvalues = 0; }

		$rb_agency_option_adminprint_hidden = isset($rb_agency_options_arr['rb_agency_option_adminprint_hidden'])?$rb_agency_options_arr['rb_agency_option_adminprint_hidden']:0;
			if (empty($rb_agency_option_adminprint_hidden)) {$rb_agency_option_adminprint_hidden = 0; }




		$rb_agency_option_image_compression = isset($rb_agency_options_arr['rb_agency_option_image_compression'])?$rb_agency_options_arr['rb_agency_option_image_compression']:0;
			if (empty($rb_agency_option_image_compression)) {$rb_agency_option_image_compression = 100; }

		$rb_agency_option_formshow_displayname = isset($rb_agency_options_arr['rb_agency_option_formshow_displayname'])?$rb_agency_options_arr['rb_agency_option_formshow_displayname']:0;
			if (empty($rb_agency_option_formshow_displayname)) {$rb_agency_option_formshow_displayname = "1"; }

		$rb_agency_option_formshow_birthdate = isset($rb_agency_options_arr['rb_agency_option_formshow_birthdate'])?$rb_agency_options_arr['rb_agency_option_formshow_birthdate']:0;
			if (empty($rb_agency_option_formshow_birthdate)) {$rb_agency_option_formshow_birthdate = "1"; }

		$rb_agency_option_form_sidebar = isset($rb_agency_options_arr['rb_agency_option_form_sidebar'])?$rb_agency_options_arr['rb_agency_option_form_sidebar']:0;
			if (empty($rb_agency_option_form_sidebar)) {$rb_agency_option_form_sidebar = "1"; }

		$rb_agency_option_profilenaming = isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0;
			if (empty($rb_agency_option_profilenaming)) {$rb_agency_option_profilenaming = "0"; }
		//
		$rb_agency_option_profilelist_sidebar = isset($rb_agency_options_arr['rb_agency_option_profilelist_sidebar'])?$rb_agency_options_arr['rb_agency_option_profilelist_sidebar']:0;
			if (empty($rb_agency_option_profilelist_sidebar)) {$rb_agency_option_profilelist_sidebar = "0"; }
		// EasyTxt
		$rb_agency_value_easytxtkey = isset($rb_agency_options_arr['rb_agency_option_agency_easytxtkey'])?$rb_agency_options_arr['rb_agency_option_agency_easytxtkey']:0;
			if (empty($rb_agency_value_easytxtkey)) {$rb_agency_value_easytxtkey = ""; }
		$rb_agency_value_easytxtsecret = isset($rb_agency_options_arr['rb_agency_option_agency_easytxtsecret'])?$rb_agency_options_arr['rb_agency_option_agency_easytxtsecret']:0;
			if (empty($rb_agency_value_easytxtsecret)) {$rb_agency_value_easytxtsecret = ""; }
		$rb_agency_value_easytxturl = isset($rb_agency_options_arr['rb_agency_option_agency_easytxturl'])?$rb_agency_options_arr['rb_agency_option_agency_easytxturl']:0;
			if (empty($rb_agency_value_easytxturl)) {$rb_agency_value_easytxturl = ""; }

		// Terms of Conditions
		$rb_agency_option_model_toc = isset($rb_agency_options_arr['rb_agency_option_agency_model_toc'])?$rb_agency_options_arr['rb_agency_option_agency_model_toc']:"";
			if (empty($rb_agency_option_model_toc)) {$rb_agency_option_model_toc = "/models-terms-of-conditions"; }
		$rb_agency_option_casting_toc = isset($rb_agency_options_arr['rb_agency_option_agency_casting_toc'])?$rb_agency_options_arr['rb_agency_option_agency_casting_toc']:"";
			if (empty($rb_agency_option_casting_toc)) {$rb_agency_option_casting_toc = "/casting-terms-of-conditions"; }
		//Sort by Date
		$rb_agency_option_profilelist_sortbydate = isset($rb_agency_options_arr['rb_agency_option_agency_profilelist_sortbydate'])?$rb_agency_options_arr['rb_agency_option_agency_profilelist_sortbydate']:"";
			if (empty($rb_agency_option_profilelist_sortbydate)) {$rb_agency_option_profilelist_sortbydate = 0; }
		// Hide advanced search button
		$rb_agency_option_formhide_advancedsearch_button = isset($rb_agency_options_arr['rb_agency_option_formhide_advancedsearch_button'])?$rb_agency_options_arr['rb_agency_option_formhide_advancedsearch_button']:0;

		$rb_agency_option_inactive_profile_on_update = isset($rb_agency_options_arr['rb_agency_option_inactive_profile_on_update'])? $rb_agency_options_arr['rb_agency_option_inactive_profile_on_update']:0;
		
		//Auto-send notification when due date or contract reached
		//$rb_agency_option_notify_due_date = isset($rb_agency_options_arr['rb_agency_option_notify_due_date'])? $rb_agency_options_arr['rb_agency_option_notify_due_date']:0;



	/*
	 * Form
	 */
		echo "<form method=\"post\" action=\"options.php\">\n";
		settings_fields( 'rb-agency-settings-group' ); 
		echo "<table class=\"form-table\">\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Website Details', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Agency Name', RBAGENCY_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencyname]\" value=\"". $rb_agency_value_agencyname ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Agency Email', RBAGENCY_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencyemail]\" value=\"". $rb_agency_value_agencyemail ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Path to Logo', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencylogo]\" value=\"". (isset($rb_agency_options_arr['rb_agency_option_agencylogo'])?$rb_agency_options_arr['rb_agency_option_agencylogo']:"") ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Header Email', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agencyheader]\" value=\"". (isset($rb_agency_options_arr['rb_agency_option_agencyheader'])?$rb_agency_options_arr['rb_agency_option_agencyheader']:"") ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Show Fields', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		//echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_showsocial]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_showsocial'], 1,false)."/> Extended Social Profiles<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_advertise]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_advertise'])?$rb_agency_options_arr['rb_agency_option_advertise']:0, 1,false)."/> Remove Updates on Dashboard<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		if(function_exists('rb_agency_interact_menu')){
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Default Profile Status', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_inactive_profile_on_update]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_inactive_profile_on_update'])?$rb_agency_options_arr['rb_agency_option_inactive_profile_on_update']:0, 1,false)."/> Change the status to \"pending approval\" whenever a profile is updated<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		}
		if ( class_exists("RBAgencyCasting") ) {
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Send email to Models/Talents', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_allowsendemail]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_allowsendemail'])?$rb_agency_options_arr['rb_agency_option_allowsendemail']:0, 1,false)."/> allow casting agent to contact talent directly<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_allowsendemail]\" value=\"2\" ".checked(isset($rb_agency_options_arr['rb_agency_option_allowsendemail'])?$rb_agency_options_arr['rb_agency_option_allowsendemail']:0, 2,false)."/> only admin can send Job invites<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		}
		if ( is_plugin_active( 'rb-agency-interact/rb-agency-interact.php' ) ) {

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Models/Profiles Terms of Conditions Link', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_agency_model_toc]\" value=\"". (isset($rb_agency_options_arr['rb_agency_option_model_toc'])?$rb_agency_options_arr['rb_agency_option_model_toc']:$rb_agency_option_model_toc) ."\" /></td>\n";
		echo " </tr>\n";
		}

		if ( class_exists("RBAgencyCasting") ) {

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Casting Terms of Conditions Link', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_casting_toc]\" value=\"". (isset($rb_agency_options_arr['rb_agency_option_casting_toc'])?$rb_agency_options_arr['rb_agency_option_casting_toc']:$rb_agency_option_casting_toc) ."\" /></td>\n";
		echo " </tr>\n";

		}
		/*
		 * Agency Internationalization
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Internationalization', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Default Country', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_locationcountry]\">\n";
					$country_array = RBAgency_Common::data_country();
					foreach ($country_array AS $country_code => $country_name) {
		echo "       <option value=\"". $country_code ."\" ". selected($country_code, $rb_agency_option_locationcountry,false) ."> ". $country_name ."</option>\n";
					}
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Server Timezone', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_locationtimezone]\">\n";
			$rb_locationtimezone = isset($rb_agency_options_arr['rb_agency_option_locationtimezone']) ? $rb_agency_options_arr['rb_agency_option_locationtimezone']:"";
		echo "       <option value=\"+12\" ". selected($rb_locationtimezone, "+12",false) ."> UTC+12</option>\n";
		echo "       <option value=\"+11\" ". selected($rb_locationtimezone, "+11",false) ."> UTC+11</option>\n";
		echo "       <option value=\"+10\" ". selected($rb_locationtimezone, "+10",false) ."> UTC+10</option>\n";
		echo "       <option value=\"+9\" ". selected($rb_locationtimezone, "+9",false) ."> UTC+9</option>\n";
		echo "       <option value=\"+8\" ". selected($rb_locationtimezone, "+8",false) ."> UTC+8</option>\n";
		echo "       <option value=\"+7\" ". selected($rb_locationtimezone, "+7",false) ."> UTC+7</option>\n";
		echo "       <option value=\"+6\" ". selected($rb_locationtimezone, "+6",false) ."> UTC+6</option>\n";
		echo "       <option value=\"+5\" ". selected($rb_locationtimezone, "+5",false) ."> UTC+5</option>\n";
		echo "       <option value=\"+4\" ". selected($rb_locationtimezone, "+4",false) ."> UTC+4</option>\n";
		echo "       <option value=\"+3\" ". selected($rb_locationtimezone, "+3",false) ."> UTC+3</option>\n";
		echo "       <option value=\"+2\" ". selected($rb_locationtimezone, "+2",false) ."> UTC+2</option>\n";
		echo "       <option value=\"+1\" ". selected($rb_locationtimezone, "+1",false) ."> UTC+1</option>\n";
		echo "       <option value=\"0\"  ". selected($rb_locationtimezone, "0",false) ."> UTC 0</option>\n";
		echo "       <option value=\"-1\" ". selected($rb_locationtimezone, "-1",false) ."> UTC-1</option>\n";
		echo "       <option value=\"-2\" ". selected($rb_locationtimezone, "-2",false) ."> UTC-2</option>\n";
		echo "       <option value=\"-3\" ". selected($rb_locationtimezone, "-3",false) ."> UTC-3</option>\n";
		echo "       <option value=\"-4\" ". selected($rb_locationtimezone, "-4",false) ."> UTC-4</option>\n";
		echo "       <option value=\"-5\" ". selected($rb_locationtimezone, "-5",false) ."> UTC-5</option>\n";
		echo "       <option value=\"-6\" ". selected($rb_locationtimezone, "-6",false) ."> UTC-6</option>\n";
		echo "       <option value=\"-7\" ". selected($rb_locationtimezone, "-7",false) ."> UTC-7</option>\n";
		echo "       <option value=\"-8\" ". selected($rb_locationtimezone, "-8",false) ."> UTC-8</option>\n";
		echo "       <option value=\"-9\" ". selected($rb_locationtimezone, "-9",false) ."> UTC-9</option>\n";
		echo "       <option value=\"-10\" ". selected($rb_locationtimezone, "-10",false) ."> UTC-10</option>\n";
		echo "       <option value=\"-11\" ". selected($rb_locationtimezone, "-11",false) ."> UTC-11</option>\n";
		echo "       <option value=\"-12\" ". selected($rb_locationtimezone, "-12",false) ."> UTC-12</option>\n";
		echo "     </select> (<a href=\"http://www.worldtimezone.com/index24.php\" target=\"_blank\">Find</a>)\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Unit Type', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_unittype]\">\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_unittype'])?$rb_agency_options_arr['rb_agency_option_unittype']:0, 1,false) ."> ". __("Imperial", RBAGENCY_TEXTDOMAIN) ." (ft/in/lb)</option>\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_unittype'])?$rb_agency_options_arr['rb_agency_option_unittype']:0, 0,false) ."> ". __("Metric", RBAGENCY_TEXTDOMAIN) ." (cm/kg)</option>\n";
		echo "     </select>\n";
		echo "    <input type=\"hidden\" name=\"rb_agency_options[rb_agency_option_old_unittype]\" value=\"".(isset($rb_agency_options_arr['rb_agency_option_old_unittype']) && $rb_agency_options_arr['rb_agency_option_old_unittype']==$rb_agency_options_arr['rb_agency_option_unittype']?$rb_agency_options_arr['rb_agency_option_old_unittype']:$rb_agency_options_arr['rb_agency_option_unittype'])."\" />";
		echo "   </td>\n";
		echo " </tr>\n";
		/*
		 * Profile Display
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Profile List Options', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Display Options', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_count]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_count'])?$rb_agency_options_arr['rb_agency_option_profilelist_count']:0, 1,false)."/> ". __("Show Model Count", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_showprofiletypeslinks]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_showprofiletypeslinks'])?$rb_agency_options_arr['rb_agency_option_profilelist_showprofiletypeslinks']:0, 1,false)."/> ". __("Show Profile Types Links", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_sortby]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_sortby'])?$rb_agency_options_arr['rb_agency_option_profilelist_sortby']:0, 1,false)."/> ". __("Show Sort Options", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_expanddetails]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_expanddetails'])?$rb_agency_options_arr['rb_agency_option_profilelist_expanddetails']:0, 1,false)."/> ". __("Expanded Model Details", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_expanddetails_year]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_year'])?$rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_year']:0, 1,false)."/> ". __("Show Age(Year)", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_expanddetails_month]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_month'])?$rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_month']:0, 1,false)."/> ". __("Show Age(Month)", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_expanddetails_day]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_day'])?$rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_day']:0, 1,false)."/> ". __("Show Age(Day)", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_expanddetails_state]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_state'])?$rb_agency_options_arr['rb_agency_option_profilelist_expanddetails_state']:0, 1,false)."/> ". __("Show State", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_email_search_result]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_email_search_result'])?$rb_agency_options_arr['rb_agency_option_formshow_email_search_result']:0, 1,false)."/> Show Email Address in Search Results<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_contact_search_result]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_contact_search_result'])?$rb_agency_options_arr['rb_agency_option_formshow_contact_search_result']:0, 1,false)."/> Show Contact Number in Search Results<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_email_listing]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_email_listing'])?$rb_agency_options_arr['rb_agency_option_formshow_email_listing']:0, 1,false)."/> Show Email Address in Listing<br />\n";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_contact_listing]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_contact_listing'])?$rb_agency_options_arr['rb_agency_option_formshow_contact_listing']:0, 1,false)."/> Show Contact Number in Listing<br />\n";

		if ( class_exists("RBAgencyCasting") ) {
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_favorite]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_favorite'])?$rb_agency_options_arr['rb_agency_option_profilelist_favorite']:0, 1,false)."/> ". __("Enable Model Favorites", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		}

		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_sidebar]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_sidebar'])?$rb_agency_options_arr['rb_agency_option_profilelist_sidebar']:0, 1,false)."/> ". __("Show Sidebar", RBAGENCY_TEXTDOMAIN) ."<br />\n";

		if ( class_exists("RBAgencyCasting") ) {
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_castingcart]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_castingcart'])?$rb_agency_options_arr['rb_agency_option_profilelist_castingcart']:0, 1,false)."/> ". __("Show Casting Cart", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		}

		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_thumbsslide]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_thumbsslide'])?$rb_agency_options_arr['rb_agency_option_profilelist_thumbsslide']:0, 1,false)."/> ". __("Show Thumbs Slide", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		//echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_bday]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_bday'])?$rb_agency_options_arr['rb_agency_option_profilelist_bday']:0, 1,false)."/> ". __("Show Birthday With Months", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_printpdf]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_printpdf'])?$rb_agency_options_arr['rb_agency_option_profilelist_printpdf']:0, 1,false)."/> ". __("Show Print and Download PDF Link", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		if(function_exists('rb_agency_interact_menu')){
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_subscription]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_subscription'])?$rb_agency_options_arr['rb_agency_option_profilelist_subscription']:"", 1,false)."/> ". __("Show Manage Your Subscription", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		}
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_showsocial]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_showsocial'])?$rb_agency_options_arr['rb_agency_option_showsocial']:0, 1,false)."/> ". __("Show Social Buttons", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_showcountrycode]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_showcountrycode'])?$rb_agency_options_arr['rb_agency_option_showcountrycode']:0, 1,false)."/> ". __("Show Country as Code", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_showstatecode]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_showstatecode'])?$rb_agency_options_arr['rb_agency_option_showstatecode']:0, 1,false)."/> ". __("Show as State Code", RBAGENCY_TEXTDOMAIN) ."<br />\n";		
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profilelist_sortbydate]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profilelist_sortbydate'])?$rb_agency_options_arr['rb_agency_option_profilelist_sortbydate']:0, 1,false)."/> ". __("Sort by Date", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profiles Per Page', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_profilelist_perpage]\" value=\"". $rb_agency_option_profilelist_perpage ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profiles Per Row', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofilelist_perrow]\">\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 1,false) ."> ". __("1", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 2,false) ."> ". __("2", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 3,false) ."> ". __("3", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"4\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 4,false) ."> ". __("4", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"5\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 5,false) ."> ". __("5", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"6\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 6,false) ."> ". __("6", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"7\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 7,false) ."> ". __("7", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"8\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 8,false) ."> ". __("8", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"9\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 9,false) ."> ". __("9", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"10\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_perrow']:0, 10,false) ."> ". __("10", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile List Style', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofilenamepos]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilenamepos'])?$rb_agency_options_arr['rb_agency_option_layoutprofilenamepos']:0, 0,false) ."> ". __("Name Under Image", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilenamepos'])?$rb_agency_options_arr['rb_agency_option_layoutprofilenamepos']:0, 1,false) ."> ". __("Name Over Image", RBAGENCY_TEXTDOMAIN) ."</option>\n";				
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilenamepos'])?$rb_agency_options_arr['rb_agency_option_layoutprofilenamepos']:0, 2,false) ."> ". __("Name Under Image with Color", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile List Layout', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofilelistlayout]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelistlayout'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelistlayout']:0, 0,false) ."> ". __("Default", RBAGENCY_TEXTDOMAIN) ."</option>\n";		
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelistlayout'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelistlayout']:0, 1,false) ."> ". __("Voiceover (no image)", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		if ( class_exists("RBAgencyCasting") ) {
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Favorite and Casting Display', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofilelist_favcartdisp]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartdisp'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartdisp']:0, 0,false) ."> ". __("Default", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartdisp'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartdisp']:0, 1,false) ."> ". __("Image Overlay", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "	</td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Favorite and Casting Effect', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofilelist_favcartfx]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx']:0, 0,false) ."> ". __("No effect", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx']:0, 1,false) ."> ". __("Fade", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx'])?$rb_agency_options_arr['rb_agency_option_layoutprofilelist_favcartfx']:0, 2,false) ."> ". __("Slide", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "	</td>\n";
		echo " </tr>\n";
		}

		/*
		 * Profile Search
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Profile Search Options', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Maximum Records Returned', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agency_options[rb_agency_option_persearch]\" value=\"". $rb_agency_option_persearch ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Search Fields', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_name]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_name'])?$rb_agency_options_arr['rb_agency_option_formshow_name']:0, 1,false)."/> Show Name Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_type]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_type'])?$rb_agency_options_arr['rb_agency_option_formshow_type']:0, 1,false)."/> Show Type Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_location]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_location'])?$rb_agency_options_arr['rb_agency_option_formshow_location']:0, 1,false)."/> Show Location Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_gender]\" value=\"1\" ".checked( isset($rb_agency_options_arr['rb_agency_option_formshow_gender'])?$rb_agency_options_arr['rb_agency_option_formshow_gender']:0, 1,false)."/> Show Gender Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_age]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_age'])?$rb_agency_options_arr['rb_agency_option_formshow_age']:0, 1,false)."/> Show Age Search Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_displayname]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_displayname'])?$rb_agency_options_arr['rb_agency_option_formshow_displayname']:0, 1,false)."/> Show Display Name<br />\n";
		//echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_form_sidebar]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_form_sidebar'])?$rb_agency_options_arr['rb_agency_option_form_sidebar']:0, 1,false)."/> Add search form sidebar on search result(front-end only)<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formshow_birthdate]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formshow_birthdate'])?$rb_agency_options_arr['rb_agency_option_formshow_birthdate']:0, 1,false)."/> Show Birthdate Fields<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_formhide_advancedsearch_button]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_formhide_advancedsearch_button'])?$rb_agency_options_arr['rb_agency_option_formhide_advancedsearch_button']:0, 1,false)."/> Hide Advanced Search button in Basic form &amp; search result<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_form_clearvalues]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_form_clearvalues'])?$rb_agency_options_arr['rb_agency_option_form_clearvalues']:0, 1,false)."/> Do not retain search values in searches<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";


		/*
		 * Admin Casting Cart
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Admin Casting Cart Options', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Admin Printing', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_adminprint_hidden]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_adminprint_hidden'])?$rb_agency_options_arr['rb_agency_option_adminprint_hidden']:0, 1,false)."/> Show Hidden Contact Details in Quick Print<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		/*
		 *  Auto-send notification when due date or contract reached (send it to admin and agency )
		 */
		//echo " <tr valign=\"top\">\n";
		//echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Notifications', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		//echo " </tr>\n";
		//echo " <tr valign=\"top\">\n";
		//echo "   <th scope=\"row\">". __('Notify admin when due date reached', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		//echo "   <td>\n";
		//echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_notify_due_date]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_notify_due_date'])?$rb_agency_options_arr['rb_agency_option_notify_due_date']:0, 1,false)."/> This will notify the admin when an expecting model reached her due date. <br />\n";
		//echo "   </td>\n";
		//echo " </tr>\n";
		
		/*
		 * Image Handling
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Image Handling', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Resize Images', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
				_e('Maximum Width', RBAGENCY_TEXTDOMAIN); echo ": <input name=\"rb_agency_options[rb_agency_option_agencyimagemaxwidth]\" value=\"". $rb_agency_value_maxwidth ."\" style=\"width: 80px;\" /><br />\n";
				_e('Maximum Height', RBAGENCY_TEXTDOMAIN); echo ": <input name=\"rb_agency_options[rb_agency_option_agencyimagemaxheight]\" value=\"". $rb_agency_value_maxheight ."\" style=\"width: 80px;\" />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Thumbnails', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
				_e('Width', RBAGENCY_TEXTDOMAIN); echo ": <input name=\"rb_agency_options[rb_agency_option_agencyprofilethumbwidth]\" value=\"". $rb_agency_value_profilethumbwidth ."\" style=\"width: 80px;\" /><br />\n";
				_e('Height', RBAGENCY_TEXTDOMAIN); echo ": <input name=\"rb_agency_options[rb_agency_option_agencyprofilethumbheight]\" value=\"". $rb_agency_value_profilethumbheight ."\" style=\"width: 80px;\" />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Image Compression', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
		echo "     <select name=\"rb_agency_options[rb_agency_option_image_compression]\">\n";
		echo "       <option value=\"100\" ". selected(isset($rb_agency_options_arr['rb_agency_option_image_compression'])?$rb_agency_options_arr['rb_agency_option_image_compression']:0, 100,false) ."> ". __("Maximum Quality", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"85\" ". selected(isset($rb_agency_options_arr['rb_agency_option_image_compression'])?$rb_agency_options_arr['rb_agency_option_image_compression']:0, 85,false) ."> ". __("Very High Quality", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"70\" ". selected(isset($rb_agency_options_arr['rb_agency_option_image_compression'])?$rb_agency_options_arr['rb_agency_option_image_compression']:0, 70,false) ."> ". __("High Quality", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"55\" ". selected(isset($rb_agency_options_arr['rb_agency_option_image_compression'])?$rb_agency_options_arr['rb_agency_option_image_compression']:0, 55,false) ."> ". __("Medium Quality", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"40\" ". selected(isset($rb_agency_options_arr['rb_agency_option_image_compression'])?$rb_agency_options_arr['rb_agency_option_image_compression']:0, 40,false) ."> ". __("Low Quality", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Thumbnails Caption', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_profile_thumb_caption]\" value=\"1\" ".checked(isset($rb_agency_options_arr['rb_agency_option_profile_thumb_caption'])?$rb_agency_options_arr['rb_agency_option_profile_thumb_caption']:0, 1,false)."/> Show Image Caption<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		/*
		 * Profile View
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Profile View Options', RBAGENCY_TEXTDOMAIN) ."</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile View Mode', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofileviewmode]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofileviewmode'])?$rb_agency_options_arr['rb_agency_option_layoutprofileviewmode']:0, 0,false) ."> ". __("Default", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofileviewmode'])?$rb_agency_options_arr['rb_agency_option_layoutprofileviewmode']:0, 1,false) ."> ". __("Pop up", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofileviewmode'])?$rb_agency_options_arr['rb_agency_option_layoutprofileviewmode']:0, 2,false) ."> ". __("Slide Down Panel", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";		
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Privacy Settings', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_privacy]\">\n";
		//echo "       <option value=\"2\" ". selected($rb_agency_option_privacy, 2,false) ."> ". __("Must be logged to view model list and profile information", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected($rb_agency_option_privacy, 1,false) ."> ". __("Model list public. Must be logged to view profile information", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected($rb_agency_option_privacy, 0,false) ."> ". __("Model list and profile information public", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected($rb_agency_option_privacy, 3,false) ."> ". __('Must be logged in to view model list, profile information, and search forms.', RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected($rb_agency_option_privacy, 2,false) ."> ". __('Must be logged in to view Profile Listing and Search', RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Name Format', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_profilenaming]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0, 0,false) ."> ". __("First Last", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0, 1,false) ."> ". __("First L", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"4\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0, 4,false) ."> ". __("First", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"5\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0, 5,false) ."> ". __("Last", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0, 2,false) ."> ". __("Display Name", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilenaming'])?$rb_agency_options_arr['rb_agency_option_profilenaming']:0, 3,false) ."> ". __("Auto Generated Record ID", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Layout Style', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_layoutprofile]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 0,false) ."> ". __("Layout 00 - Profile View with Thumbnails", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 1,false) ."> ". __("Layout 01 - Profile View with Thumbnails and Primary Image", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 2,false) ."> ". __("Layout 02 - Profile View with Scrolling Thumbnails and Primary Image", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 3,false) ."> ". __("Layout 03 - Extended Profile View", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"4\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 4,false) ."> ". __("Layout 04 - Direct Contact Layout (NOTE: Includes Phone Number of Model)", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"5\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 5,false) ."> ". __("Layout 05 - Fun Animated Gallery", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"6\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 6,false) ."> ". __("Layout 06 - Profile View with Big Images & Scrolling Thumbnails", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"7\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 7,false) ."> ". __("Layout 07 - Profile View with Big Images, Scrolling Thumbnails & Video Player Embed", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"8\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 8,false) ."> ". __("Layout 08 - Booklet", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"9\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 9,false) ."> ". __("Layout 09 - Large Scroller", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"10\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 10,false) ."> ". __("Layout 10 - Profile View with Thumbnails, Primary Image & Video Player Embed", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"11\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, 11,false) ."> ". __("Layout 11 - Profile View with Thumbnails, Primary Image, Print Photos & Print Polaroids", RBAGENCY_TEXTDOMAIN) ."</option>\n";
			$x=12;
			while($x<=15) {
				if (file_exists(RBAGENCY_PLUGIN_DIR .'view/layout/'. sprintf("%02s", $x) .'/include-profile.php')) {
				echo "       <option value=\"". $x ."\" ". selected(isset($rb_agency_options_arr['rb_agency_option_layoutprofile'])?$rb_agency_options_arr['rb_agency_option_layoutprofile']:0, $x,false) ."> ". __("Layout ", RBAGENCY_TEXTDOMAIN). $x ."</option>\n";
				}
				$x++;
			}
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Image Gallery Type', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_gallerytype]\">\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_gallerytype'])?$rb_agency_options_arr['rb_agency_option_gallerytype']:0, 1,false) ."> ". __("Slimbox2", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_gallerytype'])?$rb_agency_options_arr['rb_agency_option_gallerytype']:0, 0,false) ."> ". __("No Gallery", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Image Gallery Sort Order', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_galleryorder]\">\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_galleryorder'])?$rb_agency_options_arr['rb_agency_option_galleryorder']:0, 1,false) ."> ". __("Show most recently uploaded first", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agency_options_arr['rb_agency_option_galleryorder'])?$rb_agency_options_arr['rb_agency_option_galleryorder']:0, 0,false) ."> ". __("Show chronological order", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Profile Media Links', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agency_options[rb_agency_option_profilemedia_links]\">\n";
		//echo "       <option value=\"1\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilemedia_links'])?$rb_agency_options_arr['rb_agency_option_profilemedia_links']:0, 1,false) ."> ". __("Open in a new tab", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilemedia_links'])?$rb_agency_options_arr['rb_agency_option_profilemedia_links']:0, 2,false) ."> ". __("Open in a new window", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected(isset($rb_agency_options_arr['rb_agency_option_profilemedia_links'])?$rb_agency_options_arr['rb_agency_option_profilemedia_links']:0, 3,false) ."> ". __("Force Download", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";

		/*
		 * EasyText API
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('EasyTxt Integration', RBAGENCY_TEXTDOMAIN) ."</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('URL', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
				echo "<input name=\"rb_agency_options[rb_agency_option_agency_easytxturl]\" value=\"". $rb_agency_value_easytxturl ."\" style=\"width: 180px;\" />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('API Key', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
				echo "<input name=\"rb_agency_options[rb_agency_option_agency_easytxtkey]\" value=\"". $rb_agency_value_easytxtkey ."\" style=\"width: 180px;\" />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('API Secret', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>";
				echo "<input name=\"rb_agency_options[rb_agency_option_agency_easytxtsecret]\" value=\"". $rb_agency_value_easytxtsecret ."\" style=\"width: 180px;\" />\n";
		echo "   </td>\n";
		echo " </tr>\n";


		include_once (RBAGENCY_PLUGIN_DIR ."view/admin-sidebutton.php");

		
		
		
		//Commented by @Gaurav as We will be creating this as a separate plugin
		// Member Contact form link
		/*echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Profile Contact Options', RBAGENCY_TEXTDOMAIN) ."</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Contact Page Settings', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_showcontactpage]\" value=\"2\" ".checked($rb_agency_option_showcontactpage, 2,false)."/>Disable Contact<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_showcontactpage]\" value=\"1\" ".checked($rb_agency_option_showcontactpage, 1,false)."/>Email to both the model and the site owner<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agency_options[rb_agency_option_showcontactpage]\" value=\"0\" ".checked($rb_agency_option_showcontactpage, "0",false)."/>Only email to the site owner, not to the model<br/>\n";
		echo "   </td>\n";
		echo " </tr>\n";*/
		// comment by @Gaurav ends



		/*############# hide Profile Custom Fields Options - FOR THE MEAN TIME######################
		// Profile Custom Fields Options
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Profile Custom Fields Options', RBAGENCY_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Show Custom Fields on', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_profilepage]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_profilepage'], 1,false)."/> ". __("Profile Page", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_searchpage]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_searchpage'], 1,false)."/> ". __("Search Results Page", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_loggedin_all]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_loggedin_all'], 1,false)."/> ". __("User must be Logged In to see It", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"checkbox\" name=\"rb_agency_options[rb_agency_option_customfield_loggedin_admin]\" value=\"1\" ".checked($rb_agency_options_arr['rb_agency_option_customfield_loggedin_admin'], 1,false)."/> ". __("User must be an Admin to see It", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		##### HIDE */

		echo "</table>\n";
		echo "<input type=\"submit\" class=\"button-primary\" value=\"". __('Save Changes') ."\" />\n";
		echo "<input type=\"hidden\" name=\"rb_agency_options[rb_agency_options_showtooltip]\" value=\"1\"/>";
		echo "</form>\n";



}
elseif ($ConfigID == 11) {
//*************************************************************************************************** //
/*
 * Manage Settings
 */

	/*
	 * Form
	 */

	$rb_agencyinteract_options_arr = get_option('rb_agencyinteract_options');

	$rb_agencyinteract_option_redirect_custom_login = isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login']) ?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login']:0;



	echo "<h3>". __("Interactive Settings", RBAGENCY_TEXTDOMAIN) . "</h3>\n";
		echo "<form method=\"post\" action=\"options.php\">\n";
		settings_fields( 'rb-agencyinteract-settings-group' ); 

		echo "<table class=\"form-table\">\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Database Version', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"\" value=\"". RBAGENCY_interact_VERSION ."\" disabled /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Display', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profilemanage_sidebar]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_profilemanage_sidebar'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_profilemanage_sidebar']:0, 1,false)."/> ". __("Show Sidebar on Member Management/Login Pages", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">&nbsp;</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profilemanage_toolbar]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_profilemanage_toolbar'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_profilemanage_toolbar']:0, 1,false)."/> ". __("Hide Toolbar on All Pages", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";



	/*
	 * Interact Settings
	 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Login Settings (Model/Talent)', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Redirect for Login', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_custom_login]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login']:"", 1,false)."/> ". __("Do Not Override Login Screen", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_custom_login]\" value=\"0\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login']:"", 0,false)."/> ". __("Redirect to /profile-login/", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_custom_login]\" value=\"2\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_custom_login']:"", 2,false)."/> ". __("Redirect to homepage", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Redirect first time users', RBAGENCY_interact_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_first_time]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_first_time'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_first_time']:"", 1,false)."/> ". __("Redirect to /profile-member/account/", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_first_time]\" value=\"0\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_first_time'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_first_time']:"", 0,false)."/> ". __("Redirect to custom( e.g. /welcome/ ):", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "		<input type=\"text\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_first_time_url]\" value=\"".(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_first_time_url'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_first_time_url']:"")."\"/>	";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Redirect users after login(excluding new users)', RBAGENCY_interact_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_afterlogin]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin']:"", 1,false)."/> ". __("Redirect to /profile-member/account/(default)", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_afterlogin]\" value=\"0\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin']:"", 0,false)."/> ". __("Redirect to custom( e.g. /welcome/ ):", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "		<input type=\"text\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_afterlogin_url]\" value=\"".(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_url'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_url']:"")."\"/>	";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Switch Sidebar', RBAGENCY_interact_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_switch_sidebar]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar']:"", 1,false)."/> ". __("Use default interact sidebar", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_switch_sidebar]\" value=\"0\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar']:"", 0,false)."/> ". __("Use theme widget sidebar", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";



	/*
	 * Interact Settings - Casting Agent
	 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Login Settings (Casting Agent)', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Redirect users after login', RBAGENCY_interact_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_afterlogin_agent]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_agent'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_agent']:"", 1,false)."/> ". __("Redirect to /casting-dashboard/(default)", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_afterlogin_agent]\" value=\"0\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_agent'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_agent']:"", 0,false)."/> ". __("Redirect to custom( e.g. /welcome/ ):", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "		<input type=\"text\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_redirect_afterlogin_agent_url]\" value=\"".(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_agent_url'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_redirect_afterlogin_agent_url']:"")."\"/>	";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Switch Sidebar', RBAGENCY_interact_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_switch_sidebar_agent]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar_agent'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar_agent']:"", 1,false)."/> ". __("Use default interact sidebar", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_switch_sidebar_agent]\" value=\"0\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar_agent'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_switch_sidebar_agent']:"", 0,false)."/> ". __("Use theme widget sidebar", RBAGENCY_interact_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";


		
		
		
		
		
		
		
		
		

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Registration Process (Model/ Talent)', RBAGENCY_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
			echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Email Confirmation', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerconfirm]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm']:"", 0,false) ."> ". __("Password Auto-Generated (sent via email)", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm']:"", 1,false) ."> ". __("Password Self-Generated", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		//echo "       <option value=\"2\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerconfirm']:"", 2,false) ."> ". __("Username & Password Auto-Generated (sent via email)", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Show User Registration when creating Profiles', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_useraccountcreation]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation']:0, 0,false) ."> ". __("Show Username field (if email confirmation is set to \"password auto-generated\")", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation']:0, 1,false) ."> ". __("Show Username & Password fields (if email confirmation is set to \"password self-generated\")", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		//echo "       <option value=\"2\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_useraccountcreation']:0, 2,false) ."> ". __("Do Not Show Username & Password fields (if email confirmation is set to \"username & password auto-generated\")", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('New Profile Registration', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerallow]\" value=\"1\" ".checked((int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallow'], 1,false)."/> Users may register profiles (uncheck to prevent self registration)<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		/*
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Enable registration of Agent/Producer', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerallowAgentProducer]\">\n";
		echo "       <option value=\"1\" ". ((isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallowAgentProducer'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallowAgentProducer']:0) == 1 ? 'selected="selected"':'') ."> ". __("Show", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". ((isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallowAgentProducer'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerallowAgentProducer']:0) == 0 ? 'selected="selected"':'') ."> ". __("Hide", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		 */
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Delete Options', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profiledeletion]\" value=\"1\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_profiledeletion'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_profiledeletion']:0, 1,false)."/> ". __("No", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profiledeletion]\" value=\"2\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_profiledeletion'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_profiledeletion']:0, 2,false)."/> ". __("Yes (Allow users to permanently delete their profile)", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "     <input type=\"radio\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_profiledeletion]\" value=\"3\" ".checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_profiledeletion'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_profiledeletion']:0, 3,false)."/> ". __("Archive Only (Allow users to hide their profile)", RBAGENCY_TEXTDOMAIN) ."<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";


		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('New Profile Approval', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_registerapproval]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerapproval'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerapproval']:"", 0,false) ."> ". __("Manually Approved", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_registerapproval'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_registerapproval']:"", 1,false) ."> ". __("Automatically Approved", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Default State For Registered Users', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_option_default_registered_users]\">\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users']:"", 1,false) ."> ". __("Active", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"4\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users']:"", 4,false) ."> ". __("Active - Not Visible On Website", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users']:"", 0,false) ."> ". __("Inactive", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users']:"", 2,false) ."> ". __("Archive", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_default_registered_users']:"", 3,false) ."> ". __("Pending Approval", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";

		
		
		
		
		
		
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Registration Process (Casting Agent)', RBAGENCY_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('New Profile Approval', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_casting_option_registerapproval]\">\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_registerapproval'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_registerapproval']:"", 0,false) ."> ". __("Manually Approved", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_registerapproval'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_registerapproval']:"", 1,false) ."> ". __("Automatically Approved", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";

		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Default State For Registered Users', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <select name=\"rb_agencyinteract_options[rb_agencyinteract_casting_option_default_registered_users]\">\n";
		echo "       <option value=\"1\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users']:"", 1,false) ."> ". __("Active", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"0\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users']:"", 0,false) ."> ". __("Inactive", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"2\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users']:"", 2,false) ."> ". __("Archive", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "       <option value=\"3\" ". selected(isset($rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_casting_option_default_registered_users']:"", 3,false) ."> ". __("Pending Approval", RBAGENCY_TEXTDOMAIN) ."</option>\n";
		echo "     </select>\n";
		echo "   </td>\n";
		echo " </tr>\n";
		
		
		
		
		
		
		
		
		
		
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h3>". __('Membership Subscription', RBAGENCY_TEXTDOMAIN); echo "</h3></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Notifications', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td>\n";
		echo "     <input type=\"checkbox\" name=\"rb_agencyinteract_options[rb_agencyinteract_option_subscribeupsell]\" value=\"1\" "; checked(isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribeupsell'])?(int)$rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribeupsell']:"", 1,false); echo "/> Display Upsell Messages for Subscription)<br />\n";
		echo "   </td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Embed Overview Page ID', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agencyinteract_options[rb_agencyinteract_option_overviewpagedetails]\" value=\"". (isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_overviewpagedetails'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_overviewpagedetails']:"") ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Embed Registration Page ID', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agencyinteract_options[rb_agencyinteract_option_subscribepagedetails]\" value=\"". (isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribepagedetails'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribepagedetails']:"") ."\" /></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('PayPal Email Address', RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "   <td><input name=\"rb_agencyinteract_options[rb_agencyinteract_option_subscribepaypalemail]\" value=\"". (isset($rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribepaypalemail'])?$rb_agencyinteract_options_arr['rb_agencyinteract_option_subscribepaypalemail']:"") ."\" /></td>\n";
		echo " </tr>\n";
		echo "</table>\n";
		echo "<input type=\"submit\" class=\"button-primary\" value=\"". __('Save Changes') ."\" />\n";

		echo "</form>\n";



}
elseif ($ConfigID == 12) {
//*************************************************************************************************** //
/*
 * TODO REMOVE
 */


	/** Identify Labels **/
	define("LabelPlural", __("Subscription Tiers", RBAGENCY_TEXTDOMAIN));
	define("LabelSingular", __("Subscription Tier", RBAGENCY_TEXTDOMAIN));
  /* Initial Registration [RESPOND TO POST] ***********/ 
  if ( isset($_POST['action']) ) {
		$SubscriptionRateID 	= $_POST['SubscriptionRateID'];
		$SubscriptionRateTitle 	= $_POST['SubscriptionRateTitle'];
		$SubscriptionRateType 	= $_POST['SubscriptionRateType'];
		$SubscriptionRateText 	= $_POST['SubscriptionRateText'];
		$SubscriptionRatePrice 	= $_POST['SubscriptionRatePrice'];
		$SubscriptionRateTerm 	= $_POST['SubscriptionRateTerm'];
		// Error checking
		$error = "";
		$have_error = false;
		if(trim($SubscriptionRateTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}
		$action = $_POST['action'];
		switch($action) {

		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {

				// Create Record
				$insert = "INSERT INTO " . table_agencyinteract_subscription_rates . " (SubscriptionRateTitle,SubscriptionRateType,SubscriptionRateText,SubscriptionRatePrice,SubscriptionRateTerm) VALUES ('" . esc_sql($SubscriptionRateTitle) . "','" . esc_sql($SubscriptionRateType) . "','" . esc_sql($SubscriptionRateText) . "','" . esc_sql($SubscriptionRatePrice) . "','" . esc_sql($SubscriptionRateTerm) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;

				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>added</strong> successfully! You may now %s Load Information to the record", RBAGENCY_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
			}
		break;

		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				$update = "UPDATE " . table_agencyinteract_subscription_rates . " 
							SET 
								SubscriptionRateTitle='" . esc_sql($SubscriptionRateTitle) . "',
								SubscriptionRateType='" . esc_sql($SubscriptionRateType) . "',
								SubscriptionRateText='" . esc_sql($SubscriptionRateText) . "',
								SubscriptionRatePrice='" . esc_sql($SubscriptionRatePrice) . "',
								SubscriptionRateTerm='" . esc_sql($SubscriptionRateTerm) . "' 
							WHERE SubscriptionRateID='$SubscriptionRateID'";
				$updated = $wpdb->query($update);
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>updated</strong> successfully", RBAGENCY_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"); 
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $SubscriptionRateID) {
				if (is_numeric($SubscriptionRateID)) {
				// Verify Record
				$queryDelete = "SELECT SubscriptionRateID, SubscriptionRateTitle FROM ". table_agencyinteract_subscription_rates ." WHERE SubscriptionRateID =  \"". $SubscriptionRateID ."\"";
				$resultsDelete = $wpdb->get_results($queryDelete,ARRAY_A);
				foreach($resultsDelete as $dataDelete) {

					// Remove Record
					$delete = "DELETE FROM " . table_agencyinteract_subscription_rates . " WHERE SubscriptionRateID = \"". $SubscriptionRateID ."\"";
					$results = $wpdb->query($delete);

					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['SubscriptionRateTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

				}// while
				}// it was numeric
			}// for each
		break;

		}// Switch

  }// Action Post
  elseif (isset($_GET['action']) && $_GET['action'] == "deleteRecord") {

	$SubscriptionRateID = $_GET['SubscriptionRateID'];
		if (is_numeric($SubscriptionRateID)) {
		// Verify Record
		$queryDelete = "SELECT SubscriptionRateID, SubscriptionRateTitle FROM ". table_agencyinteract_subscription_rates ." WHERE SubscriptionRateID =  \"". $SubscriptionRateID ."\"";
		$resultsDelete =  $wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);
		foreach ($resultsDelete as $dataDelete) {

			// Remove Record
			$delete = "DELETE FROM " . table_agencyinteract_subscription_rates . " WHERE SubscriptionRateID = \"". $SubscriptionRateID ."\"";
			$results = $wpdb->query($delete);

			echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['SubscriptionRateTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

		}// is there record?
		}// it was numeric
  }
  elseif (isset($_GET['action']) && $_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$SubscriptionRateID = $_GET['SubscriptionRateID'];

		if ( $SubscriptionRateID > 0) {
			$query = "SELECT * FROM " . table_agencyinteract_subscription_rates . " WHERE SubscriptionRateID='$SubscriptionRateID'";
			$results =  $wpdb->get_results($wpdb->prepare($query ), ARRAY_A);
			$count =  $wpdb->num_rows;
			foreach($results as $data ) {
				$SubscriptionRateID		=$data['SubscriptionRateID'];
				$SubscriptionRateTitle	=stripslashes($data['SubscriptionRateTitle']);
				$SubscriptionRateType	=$data['SubscriptionRateType'];
				$SubscriptionRateText	=$data['SubscriptionRateText'];
				$SubscriptionRatePrice	=$data['SubscriptionRatePrice'];
				$SubscriptionRateTerm	=$data['SubscriptionRateTerm'];
			}

			echo "<h3 class=\"title\">". sprintf(__("Edit %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."</h3>\n";
			echo "<p>". sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></p>\n";

		} else {

			$SubscriptionRateID		= 0;
			$SubscriptionRateTitle	="";
			$SubscriptionRateType	="";
			$SubscriptionRateText	="";
			$SubscriptionRatePrice	= 0;
			$SubscriptionRateTerm	= 1;


			echo "<h3>". sprintf(__("Create New  %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>\n";
			echo "<p>". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></p>\n";
		}// Has Subscription rate or not
  }// Edit record

	echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page'] ."&ConfigID=". $ConfigID) ."\">\n";
	echo "<table class=\"form-table\">\n";
	echo "<tbody>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Title", RBAGENCY_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"SubscriptionRateTitle\" name=\"SubscriptionRateTitle\" value=\"". (isset($SubscriptionRateTitle)?$SubscriptionRateTitle:"") ."\" /></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Type", RBAGENCY_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><select id=\"SubscriptionRateType\" name=\"SubscriptionRateType\">\n";
	echo "				<option value=\"0\"". selected(0, $SubscriptionRateType) .">Standard</option>\n";
	echo "          </select></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Text", RBAGENCY_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><textarea id=\"SubscriptionRateText\" name=\"SubscriptionRateText\">". (isset($SubscriptionRateText)?$SubscriptionRateText:"") ."</textarea></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Package Rate", RBAGENCY_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><input type=\"text\" id=\"SubscriptionRatePrice\" name=\"SubscriptionRatePrice\" value=\"". (isset($SubscriptionRatePrice)?$SubscriptionRatePrice:"") ."\" /></td>\n";
	echo "    </tr>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Subscription Duration", RBAGENCY_TEXTDOMAIN) ." *:</th>\n";
	echo "        <td><select id=\"SubscriptionRateTerm\" name=\"SubscriptionRateTerm\">\n";
	echo "				<option value=\"1\"". selected(1, $SubscriptionRateTerm) .">1 Month</option>\n";
	echo "				<option value=\"2\"". selected(2, $SubscriptionRateTerm) .">2 Months</option>\n";
	echo "				<option value=\"3\"". selected(3, $SubscriptionRateTerm) .">3 Months</option>\n";
	echo "				<option value=\"6\"". selected(6, $SubscriptionRateTerm) .">6 Months</option>\n";
	echo "				<option value=\"12\"". selected(12, $SubscriptionRateTerm) .">1 Year</option>\n";
	echo "				<option value=\"24\"". selected(24, $SubscriptionRateTerm) .">2 Years</option>\n";
	echo "				<option value=\"36\"". selected(36, $SubscriptionRateTerm) .">3 Years</option>\n";
	echo "          </select></td>\n";
	echo "    </tr>\n";
	echo "  </tbody>\n";
	echo "</table>\n";
	if ( isset($SubscriptionRateID) && $SubscriptionRateID > 0) {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"SubscriptionRateID\" value=\"". $SubscriptionRateID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} else {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	}
	echo "</form>\n";

	echo "  <h3 class=\"title\">". __("All Records", RBAGENCY_TEXTDOMAIN) ."</h3>\n";

		/******** Sort Order ************/
		$sort = "";
		if (isset($_GET['sort']) && !empty($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		else {
			$sort = "SubscriptionRatePrice, SubscriptionRateTitle";
		}

		/******** Direction ************/
		$dir = "";
		if (isset($_GET['dir']) && !empty($_GET['dir'])){
			$dir = $_GET['dir'];
			if ($dir == "desc" || !isset($dir) || empty($dir)){
				$sortDirection = "asc";
				} else {
				$sortDirection = "desc";
			}
		} else {
				$sortDirection = "desc";
				$dir = "asc";
		}

		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=rb_agency_settings&ConfigID=12") ."\">\n";
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRateTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRateType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Type", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRatePrice&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Rate/Term", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=SubscriptionRateText&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Text", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Type", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Rate/Term", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Price", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		echo "<tbody>\n";

		$query = "SELECT * FROM ". table_agencyinteract_subscription_rates ." ORDER BY $sort $dir";
		$results =  $wpdb->get_results($query, ARRAY_A);
		$count = $wpdb->num_rows;
		foreach ($results as $data) {
				$SubscriptionRateID	=$data['SubscriptionRateID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $SubscriptionRateID ."\" name=\"". $SubscriptionRateID ."\" value=\"". $SubscriptionRateID ."\" /></th>\n";
		echo "        <td class=\"column\">". stripslashes($data['SubscriptionRateTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;SubscriptionRateID=". $SubscriptionRateID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Edit", RBAGENCY_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=deleteRecord&amp;SubscriptionRateID=". $SubscriptionRateID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, RBAGENCY_TEXTDOMAIN) . ".\'". __("Cancel", RBAGENCY_TEXTDOMAIN) . "\' ". __("to stop", RBAGENCY_TEXTDOMAIN) . ", \'". __("OK", RBAGENCY_TEXTDOMAIN) . "\' ". __("to delete", RBAGENCY_TEXTDOMAIN) . ".') ) {return true;}return false;\" title=\"". __("Delete this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Delete", RBAGENCY_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </td>\n";
		echo "        <td class=\"column\">"; if ($data['SubscriptionRateType'] == 0) {echo "Standard"; }echo "</td>\n";
		echo "        <td class=\"column\">$". $data['SubscriptionRatePrice'] ." / ". $data['SubscriptionRateTerm'] ." Month Term</td>\n";
		echo "        <td class=\"column\">". $data['SubscriptionRateText'] ."</td>\n";
		echo "    </tr>\n";
		}
		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"5\"><p>". __("There aren't any records loaded yet", RBAGENCY_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", RBAGENCY_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";

		echo "</form>\n";




}
elseif ($ConfigID == 2) {
//*************************************************************************************************** //
/*
 * Manage Style
 */
		

		// Get Group
		$rb_agency_options_arr = get_option('rb_agency_layout_options');
		
		// Set Default Values
		$rb_agency_value_stylesheet = $rb_agency_options_arr['rb_agency_value_stylesheet'];
			// Open File & Get Base Style if not exists
			if (!isset($rb_agency_value_stylesheet) || empty($rb_agency_value_stylesheet)) {

				if (file_exists(RBAGENCY_PLUGIN_DIR ."assets/css/style.css")) {
					// Use Custom
					$rb_agency_stylesheet = RBAGENCY_PLUGIN_DIR ."assets/css/style.css";
				} else { // Use Base
					$rb_agency_stylesheet = RBAGENCY_PLUGIN_DIR ."assets/css/style_base.css";
				}

				// Open File
				$rb_agency_stylesheet_file = fopen($rb_agency_stylesheet,"r") or exit("Unable to open file to read!");

				// Initialize Stgring
				$rb_agency_stylesheet_string = "";

				// Get all lines from css file
				while(!feof($rb_agency_stylesheet_file)) {
					$rb_agency_stylesheet_string .= fgets($rb_agency_stylesheet_file);
				}

				// Close File
				fclose($rb_agency_stylesheet_file);

				$rb_agency_value_stylesheet = $rb_agency_stylesheet_string;
			}
		$rb_agency_value_styleheader = $rb_agency_options_arr['rb_agency_option_styleheader'];
		$rb_agency_value_stylefooter = $rb_agency_options_arr['rb_agency_option_stylefooter'];

		/*
		 * Form
		 */
		echo "<form method=\"post\" action=\"options.php\">\n";
		settings_fields( 'rb-agency-settings-layout-group' ); 
		echo "<table class=\"form-table\">\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Stylesheet', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Header', RBAGENCY_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><textarea style=\"width: 80%; height: 500px;\" name=\"rb_agency_layout_options[rb_agency_value_stylesheet]\">". $rb_agency_value_stylesheet ."</textarea></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\" colspan=\"2\"><h2>". __('Extra HTML', RBAGENCY_TEXTDOMAIN); echo "</h2></th>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Header', RBAGENCY_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><textarea name=\"rb_agency_layout_options[rb_agency_option_styleheader]\">". $rb_agency_value_styleheader ."</textarea></td>\n";
		echo " </tr>\n";
		echo " <tr valign=\"top\">\n";
		echo "   <th scope=\"row\">". __('Footer', RBAGENCY_TEXTDOMAIN); echo "</th>\n";
		echo "   <td><textarea name=\"rb_agency_layout_options[rb_agency_option_stylefooter]\">". $rb_agency_value_stylefooter ."</textarea></td>\n";
		echo " </tr>\n";
		echo "</table>\n";
		echo "<input type=\"submit\" name=\"save_css\" class=\"button-primary\" value=\"". __('Save Changes') ."\" />\n";
		echo "<input type=\"hidden\" name=\"rb_agency_layout_options[rb_agency_options_showtooltip]\" value=\"1\"/>";
		echo "</form>\n";





}
elseif ($ConfigID == 3) {
//*************************************************************************************************** //
/*
 * Manage Style
 */

	// Identify Labels
	define("LabelPlural", __("Gender Types", RBAGENCY_TEXTDOMAIN));
	define("LabelSingular", __("Gender Type", RBAGENCY_TEXTDOMAIN));

	/*
	 * Save Record
	 */
	if ( isset($_POST['action']) ) {

		$GenderID = $_POST['GenderID'];
		$GenderTitle = $_POST['GenderTitle'];

		// Error checking
		$error = "";
		$have_error = false;
		if(trim($GenderTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}

		$action = $_POST['action'];
		switch($action) {

		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				// Create Record
				$insert = "INSERT INTO " . table_agency_data_gender . " (GenderTitle) VALUES ('" . esc_sql($GenderTitle) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;

				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>added</strong> successfully! You may now %s Load Information to the record", RBAGENCY_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
			}
		break;

		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				$update = "UPDATE " . table_agency_data_gender . " 
							SET 
								GenderTitle='" . esc_sql($GenderTitle) . "'
							WHERE GenderID='$GenderID'";
				$updated = $wpdb->query($update);
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>updated</strong> successfully", RBAGENCY_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"); 
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $GenderID) {
				if (is_numeric($GenderID)) {
				// Verify Record
				$queryDelete = "SELECT GenderID, GenderTitle FROM ". table_agency_data_gender ." WHERE GenderID =  \"". $GenderID ."\"";
				$resultsDelete = $wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);
				foreach ($resultsDelete as $dataDelete) {
					// Remove Record
					$delete = "DELETE FROM " . table_agency_data_gender . " WHERE GenderID = \"". $GenderID ."\"";
					$results = $wpdb->query($delete);

					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['GenderTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

				}// while
				}// it was numeric
			}// for each
		break;

		}// Switch


	} elseif (isset($_GET['action']) && $_GET['action'] == "deleteRecord") {
	// Delete Record

		$GenderID = $_GET['GenderID'];
		if (is_numeric($GenderID)) {
			// Verify Record
			$queryDelete = "SELECT GenderID, GenderTitle FROM ". table_agency_data_gender ." WHERE GenderID =  %d ";
			$resultsDelete = $wpdb->get_results($wpdb->prepare($queryDelete, $GenderID ), ARRAY_A);
			foreach ($resultsDelete as $dataDelete) {

				// Remove Record
				$delete = "DELETE FROM " . table_agency_data_gender . " WHERE GenderID = %d";
				$results = $wpdb->query($wpdb->prepare($delete,$GenderID));

				echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['GenderTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

			}// is there record?
		}// it was numeric

	/*
	 * Edit Record
	 */
	} elseif (isset($_GET['action']) && $_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$GenderID = $_GET['GenderID'];

		if ( $GenderID > 0) {
			$query = "SELECT * FROM " . table_agency_data_gender . " WHERE GenderID='%s'";
			$results = $wpdb->get_results($wpdb->prepare($query,$GenderID), ARRAY_A);
			$count = $wpdb->num_rows;
			foreach ($results as $data) {
				$GenderID =$data['GenderID'];
				$GenderTitle =stripslashes($data['GenderTitle']);
			}

			echo "<h3 class=\"title\">". sprintf(__("Edit %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."</h3>\n";
			echo "<p>". sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></p>\n";
		}

	/*
	 * Create New
	 */
	} else {

			$GenderID = 0;
			$GenderTitle ="";
			$GenderTag ="";

			echo "<h3>". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural)."</h3>";
			/// ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>\n";
			echo "<p>". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></p>\n";
	}


	/*
	 * Input Data
	 */

	echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	echo "<table class=\"form-table\">\n";
	echo "<tbody>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Title", RBAGENCY_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"GenderTitle\" name=\"GenderTitle\" value=\"". $GenderTitle ."\" /></td>\n";
	echo "    </tr>\n";
	echo "  </tbody>\n";
	echo "</table>\n";
	if ( $GenderID > 0) {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"GenderID\" value=\"". $GenderID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} else {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	}
	echo "</form>\n";

	echo "  <h3 class=\"title\">". __("All Records", RBAGENCY_TEXTDOMAIN) ."</h3>\n";

	/******** Sort Order ************/
	$sort = "";
	if (isset($_GET['sort']) && !empty($_GET['sort'])){
		$sort = $_GET['sort'];
	}
	else {
		$sort = "GenderTitle";
	}

	/******** Direction ************/
	$dir = "";
	if (isset($_GET['dir']) && !empty($_GET['dir'])){
		$dir = $_GET['dir'];
		if ($dir == "desc" || !isset($dir) || empty($dir)){
			$sortDirection = "asc";
			} else {
			$sortDirection = "desc";
		}
	} else {
			$sortDirection = "desc";
			$dir = "asc";
	}

	echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
	echo "<thead>\n";
	echo "    <tr class=\"thead\">\n";
	echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
	echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=GenderTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
	echo "    </tr>\n";
	echo "</thead>\n";
	echo "<tfoot>\n";
	echo "    <tr class=\"thead\">\n";
	echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
	echo "        <th class=\"column\" scope=\"col\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</th>\n";
	echo "    </tr>\n";
	echo "</tfoot>\n";
	echo "<tbody>\n";

	$query = "SELECT * FROM ". table_agency_data_gender ." ORDER BY $sort $dir";
	$results =$wpdb->get_results($query, ARRAY_A);
	$count = $wpdb->num_rows;
	foreach ($results as $data) {
			$GenderID	=$data['GenderID'];


	echo "    <tr>\n";
	echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $GenderID ."\" name=\"". $GenderID ."\" value=\"". $GenderID ."\" /></th>\n";
	echo "        <td class=\"column\">". stripslashes($data['GenderTitle']) ."\n";
	echo "          <div class=\"row-actions\">\n";
	echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;GenderID=". $GenderID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Edit", RBAGENCY_TEXTDOMAIN) . "</a> | </span>\n";
	echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=deleteRecord&amp;GenderID=". $GenderID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, RBAGENCY_TEXTDOMAIN) . ".\'". __("Cancel", RBAGENCY_TEXTDOMAIN) . "\' ". __("to stop", RBAGENCY_TEXTDOMAIN) . ", \'". __("OK", RBAGENCY_TEXTDOMAIN) . "\' ". __("to delete", RBAGENCY_TEXTDOMAIN) . ".') ) {return true;}return false;\" title=\"". __("Delete this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Delete", RBAGENCY_TEXTDOMAIN) . "</a> </span>\n";
	echo "          </div>\n";
	echo "        </td>\n";
	echo "    </tr>\n";
	}
	if ($count < 1) {
	echo "    <tr>\n";
	echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
	echo "        <td class=\"column\" colspan=\"3\"><p>". __("There aren't any records loaded yet", RBAGENCY_TEXTDOMAIN) . "!</p></td>\n";
	echo "    </tr>\n";
	}
	echo "</tbody>\n";
	echo "</table>\n";
	echo "<p class=\"submit\">\n";
	echo "    <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
	echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", RBAGENCY_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
	echo "</p>\n";

	echo "</form>\n";



} elseif ($ConfigID == 4) {
// *************************************************************************************************** //
// Setup Profile Categories
	/** Identify Labels **/
	define("LabelPlural", __("Profile Types", RBAGENCY_TEXTDOMAIN));
	define("LabelSingular", __("Profile Type", RBAGENCY_TEXTDOMAIN));
  /* Initial Registration [RESPOND TO POST] ***********/ 
  if ( isset($_POST['action']) ) {

		$DataTypeID 	= $_POST['DataTypeID'];
		$DataTypeTitle 	= $_POST['DataTypeTitle'];
		$DataTypeTag 	= $_POST['DataTypeTag'];
		$DataTypeOldTitle = $_POST["oldTitle"];
			if (empty($DataTypeTag)) {$DataTypeTag = RBAgency_Common::format_stripchars($DataTypeTitle); }
		// Error checking
		$error = "";
		$have_error = false;
		if(trim($DataTypeTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}
		$action = $_POST['action'];
		switch($action) {

		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {

				// Create Record
				$insert = "INSERT INTO " . table_agency_data_type . " (DataTypeTitle,DataTypeTag) VALUES ('" . esc_sql($DataTypeTitle) . "','" . esc_sql($DataTypeTag) . "')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;

				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>added</strong> successfully! You may now %s Load Information to the record", RBAGENCY_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
			}
		break;

		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
			} else {
				$update = "UPDATE " . table_agency_data_type . " 
							SET 
								DataTypeTitle='" . esc_sql($DataTypeTitle) . "',
								DataTypeTag='" . esc_sql($DataTypeTag) . "' 
							WHERE DataTypeID='$DataTypeID'";
				$updated = $wpdb->query($update);

				$update_customfields = "SELECT * FROM ". table_agency_customfields_types ." WHERE FIND_IN_SET('".esc_sql($DataTypeOldTitle)."', ProfileCustomTypes) > 0;";
				$result =  $wpdb->get_results($update_customfields,ARRAY_A);
					$total = count($result);

				foreach($result as $d){
						$ptype = $d["ProfileCustomTypes"];
						$nptype = str_replace($DataTypeOldTitle, $DataTypeTitle, $ptype);
						$wpdb->query("UPDATE ". table_agency_customfields_types ."  SET ProfileCustomTypes='".$nptype."' WHERE ProfileCustomID='".$d["ProfileCustomID"]."'");
				}

				echo "Updated $total custom fields assigned to this Profile Type<br/>";
				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>updated</strong> successfully", RBAGENCY_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"); 
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $DataTypeID) {
				if (is_numeric($DataTypeID)) {
				// Verify Record
				$queryDelete = "SELECT DataTypeID, DataTypeTitle FROM ". table_agency_data_type ." WHERE DataTypeID =  \"". $DataTypeID ."\"";
				$resultsDelete =$wpdb->get_results($wpdb->prepare($queryDelete), ARRAY_A);

				foreach ($resultsDelete as $dataDelete) {
					// Remove Record
					$delete = "DELETE FROM " . table_agency_data_type . " WHERE DataTypeID = \"". $DataTypeID ."\"";
					$results = $wpdb->query($delete);

					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['DataTypeTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

				}// while
				}// it was numeric
			}// for each
		break;

		}// Switch

  }// Action Post
  elseif (isset($_GET['action']) && $_GET['action'] == "deleteRecord") {

	$DataTypeID = $_GET['DataTypeID'];
		if (is_numeric($DataTypeID)) {
		// Verify Record
		$queryDelete = "SELECT DataTypeID, DataTypeTitle FROM ". table_agency_data_type ." WHERE DataTypeID =  '%s'";
		$resultsDelete = $wpdb->get_results($wpdb->prepare($queryDelete,$DataTypeID), ARRAY_A);
		foreach ($resultsDelete as $dataDelete) {

			// Remove Record
			$delete = "DELETE FROM " . table_agency_data_type . " WHERE DataTypeID = '%s'";
			$results = $wpdb->query($wpdb->prepare($delete,$DataTypeID));

			echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['DataTypeTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

		}// is there record?
		}// it was numeric
  }
  elseif (isset($_GET['action']) && $_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$DataTypeID = $_GET['DataTypeID'];

		if ( $DataTypeID > 0) {
			$query = "SELECT * FROM " . table_agency_data_type . " WHERE DataTypeID='%s'";
			$results = $wpdb->get_results($wpdb->prepare($query,$DataTypeID), ARRAY_A);
			$count = $wpdb->num_rows;
			foreach ($results as $data) {
				$DataTypeID		=$data['DataTypeID'];
				$DataTypeTitle	=stripslashes($data['DataTypeTitle']);
				$DataTypeTitle = str_replace(' ', '_', $DataTypeTitle);
				$DataTypeTag	=$data['DataTypeTag'];
			}

			echo "<h3 class=\"title\">". sprintf(__("Edit %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."</h3>\n";
			echo "<p>". sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></p>\n";
		}
  } else {

			$DataTypeID		= 0;
			$DataTypeTitle	="";
			$DataTypeTag	="";

			echo "<h3>". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>\n";
			echo "<p>". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></p>\n";
  }
	echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	echo "<table class=\"form-table\">\n";
	echo "<tbody>\n";
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Title", RBAGENCY_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"DataTypeTitle\" name=\"DataTypeTitle\" value=\"". $DataTypeTitle ."\" /></td>\n";
	echo "    </tr>\n";
	if ( $DataTypeID > 0) {
	echo "    <tr valign=\"top\">\n";
	echo "        <th scope=\"row\">". __("Slug", RBAGENCY_TEXTDOMAIN) .":</th>\n";
	echo "        <td><input type=\"text\" id=\"DataTypeTag\" name=\"DataTypeTag\" value=\"". $DataTypeTag ."\" /></td>\n";
	echo "    </tr>\n";
	}
	echo "  </tbody>\n";
	echo "</table>\n";
	if ( $DataTypeID > 0) {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"DataTypeID\" value=\"". $DataTypeID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"oldTitle\" value=\"".$DataTypeTitle."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	} else {
	echo "<p class=\"submit\">\n";
	echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
	echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
	echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
	echo "</p>\n";
	}
	echo "</form>\n";

	echo "  <h3 class=\"title\">". __("All Records", RBAGENCY_TEXTDOMAIN) ."</h3>\n";

		/******** Sort Order ************/
		$sort = "";
		if (isset($_GET['sort']) && !empty($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		else {
			$sort = "DataTypeTitle";
		}

		/******** Direction ************/
		$dir = "";
		if (isset($_GET['dir']) && !empty($_GET['dir'])){
			$dir = $_GET['dir'];
			if ($dir == "desc" || !isset($dir) || empty($dir)){
				$sortDirection = "asc";
				} else {
				$sortDirection = "desc";
			}
		} else {
				$sortDirection = "desc";
				$dir = "asc";
		}

		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=DataTypeTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=DataTypeTag&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Slug", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Slug", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		echo "<tbody>\n";

		$query = "SELECT * FROM ". table_agency_data_type ." ORDER BY $sort $dir";
		$results = $wpdb->get_results($query, ARRAY_A);
		$count = $wpdb->num_rows;
		foreach ($results as $data) {
			$DataTypeID	=$data['DataTypeID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $DataTypeID ."\" name=\"". $DataTypeID ."\" value=\"". $DataTypeID ."\" /></th>\n";
		echo "        <td class=\"column\">". stripslashes($data['DataTypeTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;DataTypeID=". $DataTypeID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Edit", RBAGENCY_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=deleteRecord&amp;DataTypeID=". $DataTypeID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, RBAGENCY_TEXTDOMAIN) . ".\'". __("Cancel", RBAGENCY_TEXTDOMAIN) . "\' ". __("to stop", RBAGENCY_TEXTDOMAIN) . ", \'". __("OK", RBAGENCY_TEXTDOMAIN) . "\' ". __("to delete", RBAGENCY_TEXTDOMAIN) . ".') ) {return true;}return false;\" title=\"". __("Delete this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Delete", RBAGENCY_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </td>\n";
		echo "        <td class=\"column\">". $data['DataTypeTag'] ."</td>\n";
		echo "    </tr>\n";
		}
		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"3\"><p>". __("There aren't any records loaded yet", RBAGENCY_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", RBAGENCY_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";

		echo "</form>\n";
}	// End

elseif ($ConfigID == 7){

global $wpdb;
echo "<div class=\"wrap\">\n";
echo "  <h3 class=\"title\">". __("Define Country", RBAGENCY_TEXTDOMAIN) ."</h3>\n";
if(isset($_POST['country_add'])) {
	$CountryTitle  = $_POST['CountryTitle'];
	$CountryCode  = $_POST['CountryCode'];
	// Error checking
	$error = "";
	$have_error = false;
	if(trim($CountryTitle) == ""){
		$error .= "<b><i>". __("Country title is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	if(trim($CountryCode) == ""){
		$error .= "<b><i>". __("Country code is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}

	if($have_error){
		echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating country, please ensure you have filled out all required fields", 		RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
	}
	else {

		$wpdb->insert( 
		table_agency_data_country, 
		array( 
		'CountryTitle' => $CountryTitle,
		'CountryCode' => $CountryCode 
		) 
		);
		echo '<span class="msg">You have added new entry for country</span>';
	}
}
if(isset($_POST["editaction"])){
	if($_POST["editaction"]=="1"){
		$CountryTitle  = $_POST['title'];
		$CountryCode  = $_POST['code'];
		$CountryID  = $_POST['id'];
		$wpdb->update( 
			table_agency_data_country, 
			array( 
			'CountryTitle' => $CountryTitle,
			'CountryCode' => $CountryCode 
			),
			array( 
			'CountryID' => $CountryID,
			) 
		);
	}
	if($_POST["editaction"]=="2"){
		$StateTitle  = $_POST['title'];
		$StateCode  = $_POST['code'];
		$StateID  = $_POST['id'];
		$wpdb->update( 
			table_agency_data_state, 
			array( 
			'StateTitle' => $StateTitle,
			'StateCode' => $StateCode 
			),
			array( 
			'StateID' => $StateID,
			) 
		);
	}

	}
 ?>
<form method="post" name="add_country" id="add_country" action="<?php echo admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7"; ?>">
<input type="hidden" value="addCountry" name="action">
<div class="country_added">
<div class="error"></div>
<div class="country_txt"><span>Country Title</span></div>
<div class="country_in"><input type="text" name="CountryTitle" id="CountryTitle" size="27" value="<?php echo (isset($_POST["CountryTitle"])?$_POST["CountryTitle"]:"");?>">
<div class="country_txt"><span>Country Code</span></div>
<div class="country_in"><input type="text" name="CountryCode" id="CountryCode" size="27" value="<?php echo (isset($_POST["CountryCode"])?$_POST["CountryCode"]:"");?>">
</div>
<div class="country_ro"><input type="submit" class="button-primary" name="country_add" value="Add"></div>
</div>
</form>
<?php 
// Get Country to be deleted
	if(!isset($_REQUEST['delcountry']) && empty($_REQUEST['delcountry'])){
		$delCountry = 0;
	} else {
	$delCountry = $_REQUEST['delcountry']; 
	// Remove Records from country and states
	$deleteCountry = "DELETE FROM " . table_agency_data_country . " WHERE CountryID = \"". $delCountry ."\"";
	$resultsCountry = $wpdb->query($deleteCountry);
	$deleteState= "DELETE FROM " . table_agency_data_state . " WHERE CountryID = \"". $delCountry ."\"";
	$resultsState = $wpdb->query($deleteState);
	echo '<span class="msg">Country has been deleted successfully</span>';
	}
echo '<div class="msg"></div>';
$location=admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7";
echo '<input type="hidden" name="url" id="url" value='.$location.'/>';
echo '<table><tr>';
echo '<th>'.__("Country Title", RBAGENCY_TEXTDOMAIN).'</th>';
echo '<th>'.__("Country Code", RBAGENCY_TEXTDOMAIN).'</th>';
echo '<th>'.__("Action", RBAGENCY_TEXTDOMAIN).'</th>';

echo '</tr>';
$myrows = $wpdb->get_results( "SELECT * FROM ".table_agency_data_country." ORDER BY CountryTitle ASC" );

foreach($myrows as $result) {
echo '<tr>';
echo '<td class="countryTitle" >'.$result->CountryTitle.'</td>';
echo '<td class="countryCode">'.$result->CountryCode.'</td>';
echo '<td>'.__('<a id="country'.$result->CountryID.'" class='.$location.' href="javascript:void(0)" onclick="editCountry(this.id);">Edit&nbsp;</a>'.
'<a href="'.admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7&delcountry=".$result->CountryID.'" 
onclick="javascript: return confirm(\'Are you sure?\')">|&nbsp;Delete</a>', RBAGENCY_TEXTDOMAIN).'</td>';
echo '</tr>';
}
echo '</table>';

echo "  <h3 class=\"title\">". __("Insert State", RBAGENCY_TEXTDOMAIN) ."</h3>\n";
if(isset($_POST['state_add'])) {
	$CountryID  = $_POST['CountryID'];
	$StateTitle  = $_POST['StateTitle'];
	$StateCode  = $_POST['StateCode'];

	// Error checking
	$error = "";
	$have_error = false;
	if(trim($CountryID) == "-1"){
		$error .= "<b><i>". __("Please select country", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	if(trim($StateTitle) == ""){
		$error .= "<b><i>". __("State title is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}
	if(trim($StateCode) == ""){
		$error .= "<b><i>". __("State code is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
		$have_error = true;
	}

	if($have_error){
		echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating state, please ensure you have filled out all required fields", 		RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
	}
	else {
		$wpdb->insert( 
		table_agency_data_state, 
		array( 
		'CountryID' => $CountryID,
		'StateTitle' => $StateTitle, 
		'StateCode' => $StateCode 
		) 
		);
		echo '<span class="msg">You have added new entry for states</span>';
	}
}



 ?>
<form method="post">
<div class="country_added">
<div class="country_txt"><span>Select Country</span></div>
<div class="country_in"><select name="CountryID" ><option value="-1">Select Country</option><?php 
foreach($myrows as $result) {
 ?>
<option <?php if(isset($_POST['CountryID']) && $_POST['CountryID']==$result->CountryID){ ?>selected="selected"<?php }?> value="<?php echo (isset($result->CountryID)?$result->CountryID:""); ?>"><?php echo (isset($result->CountryTitle)?$result->CountryTitle:""); ?></option>
<?php }?>
</select></div>
<div class="country_txt" style="width:6%;"><span>State Name</span></div>
<div class="country_in"><input type="text" name="StateTitle" value="<?php echo (isset($_POST['StateTitle'])?$_POST['StateTitle']:"");?>" size="27">
<div class="country_txt" style="width:6%;"><span>Code</span></div>
<div class="country_in"><input type="text" name="StateCode" value="<?php echo (isset($_POST['StateCode'])?$_POST['StateCode']:"");?>" size="27">
</div>
<div class="country_ro"><input type="submit" name="state_add" class="button-primary" value="Add"></div>
</div>
</form>
<div class="clear"></div>


<?php
// Get Country to be deleted
	if(!isset($_REQUEST['delstate']) && empty($_REQUEST['delstate'])){
		$delState = 0;
	} else {
		$delState = $_REQUEST['delstate']; 
		// Remove Record
		$deleteState = "DELETE FROM " . table_agency_data_state . " WHERE StateID = \"". $delState ."\"";
		$results = $wpdb->query($deleteState);

		echo '<span class="msg">State has been deleted successfully</span>';
	}
echo '<table>';
$getCountry = $wpdb->get_results( "SELECT * FROM ".table_agency_data_country." ORDER BY CountryTitle ASC" );
foreach($getCountry as $countryRs) {
	echo '<tr><td><h3>'.$countryRs->CountryTitle.'</h3></td></tr>';
	echo '<tr>';
	echo '<th style="text-align:left;">'.__("State Title", RBAGENCY_TEXTDOMAIN).'</th>';
	echo '<th style="text-align:left;">'.__("State Code", RBAGENCY_TEXTDOMAIN).'</th>';
	echo '<th style="text-align:left;">'.__("Action", RBAGENCY_TEXTDOMAIN).'</th>';
	echo '</tr>';
	echo '<tr>';
	$getStates = $wpdb->get_results( "SELECT * FROM ".table_agency_data_state." WHERE CountryID='$countryRs->CountryID' ORDER BY StateTitle ASC" );
	foreach($getStates as $result) {
		echo '<td class="StateTitle">'.$result->StateTitle.'</td>';
		echo '<td class="StateCode">'.$result->StateCode.'</td>';
		echo '<td>'.__('<a id="state'.$result->StateID.'" class='.$location.' href="javascript:void(0)" onclick="editState(this.id);">Edit&nbsp;</a>'.
		'<a href="'.admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=7&delstate=".$result->StateID.'" 
		onclick="javascript: return confirm(\'Are you sure?\')">|&nbsp;Delete</a>', RBAGENCY_TEXTDOMAIN).'</td>';
		echo '</tr>';
	}
}
echo '</table>';
?>
</div>
<?php }


// *************************************************************************************************** //
// Setup Custom Fields




elseif ($ConfigID == 5) {

echo "<div id=\"custom-fields\">";
	/** Identify Labels **/
	define("LabelPlural", __("Custom Fields", RBAGENCY_TEXTDOMAIN));
	define("LabelSingular", __("Custom Field", RBAGENCY_TEXTDOMAIN));
	$rb_agency_options_arr = get_option('rb_agency_options');
	$rb_agency_option_unittype  = $rb_agency_options_arr['rb_agency_option_unittype'];

	?>

		<style type="text/css">
		.widefat td{
			vertical-align: top !important;
		}
		ul#editfield_add_more_options_1 li {
			border-left: 1px dotted #ccc;
			padding-left: 10px;
			border-bottom: 1px solid #F1F1F1;
		}
		</style>
  
	<?php
	//restore preset
	if(isset($_GET['restore']) && ($_GET['restore'] == 'RestorePreset')){
			//delete initial values ProfileCustomID 1 to 18
				$presets = "'ethnicity','skin tone','hair color','eye color','height','weight','shirt','waist','hips','shoe size','suit','inseam','dress','bust','union','experience','language','booking'";	
				//$delete = "DELETE FROM " . table_agency_customfields . " WHERE LOWER(ProfileCustomTitle) IN(".$presets.")";
				$delete = "DELETE FROM " . table_agency_customfields ;
				$wpdb->query($delete);

				$delete_types = "DELETE FROM " . table_agency_customfields_types ;
				$wpdb->query($delete_types);
				//repopulate
				$data_custom_exists = $wpdb->get_var( $wpdb->prepare( "SELECT ProfileCustomTitle FROM " . table_agency_customfields . " WHERE ProfileCustomTitle = %s", 'Ethnicity' ) );
        
				if ( !$data_custom_exists ) {
						// Assume the rest dont exist either
			//junjavier :edit started

                    $insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (1, 'Ethnicity', 	3, '|African American|Caucasian|American Indian|East Indian|Eurasian|Filipino|Hispanic/Latino|Asian|Chinese|Japanese|Korean|Polynesian|Other|Mixed|', 0, 1, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)"); 
                   	$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (2, 'Skin Tone', 	3, '|Fair|Medium|Dark|', 0, 2, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");  
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (3, 'Hair Color', 	3, '|Blonde|Black|Brown|Dark Brown|Light Brown|Red|Strawberry|Auburn|', 0, 3, 0, 1, 1,0, 0,0, 1, 0, 0, 0, 0)");   
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (4, 'Eye Color', 	3, '|Blue|Brown|Hazel|Green|Black|', 0, 4, 0, 1, 1,0, 0,0, 1, 0, 0, 0, 0)"); 
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (5, 'Height', 		7, '3', 0, 5, 0, 1, 1,0, 0, 0, 1, 0, 0, 0, 0)");                    
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (6, 'Weight', 		7, '2', 0, 6, 0, 1, 1,0, 0, 0, 1, 0, 0, 0, 0)");
                   	
                   	$GenderFemales1 = $wpdb->get_results("SELECT * FROM ".table_agency_data_gender." WHERE GenderTitle = 'Female'",ARRAY_A);
                   	foreach($GenderFemales1 as $GenderFemale1){
                   		$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (7, 'Bust', 		7, '1', 0, 7, ".$GenderFemale1['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)");
                   		$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(8, 'Bra Cup Size', 3, '|AA|A|B|C|CC|D|DD|E|F|FF|G|GG|H|HH|I|J|JJ|K|KK|L|LL|M|N|', 0, 8, ".$GenderFemale1['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)");
                   	}
                   	                    
            		$GenderMales1 = $wpdb->get_results("SELECT * FROM ".table_agency_data_gender." WHERE GenderTitle = 'Male'",ARRAY_A);
                   	foreach($GenderMales1 as $GenderMale1){                      
           				$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (9, 'Chest', 		7, '1', 0, 9, ".$GenderMale1['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)");                        
					}
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (10, 'Waist', 		7, '1', 0, 10, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");
            		
            		$GenderFemales2 = $wpdb->get_results("SELECT * FROM ".table_agency_data_gender." WHERE GenderTitle = 'Female'",ARRAY_A);
                   	foreach($GenderFemales2 as $GenderFemale2){
                   		$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (11, 'Hips', 		7, '1', 0, 11, ".$GenderFemale2['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)"); 
                   	}

            		$GenderMales2 = $wpdb->get_results("SELECT * FROM ".table_agency_data_gender." WHERE GenderTitle = 'Male'",ARRAY_A);
                   	foreach($GenderMales2 as $GenderMale2){                      
           				$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(12, 'Inseam', 		7, '1', 0, 12, ".$GenderMale2['GenderID'].", 1, 1,0, 0, 0, 1, 0, 0, 0, 0)");
           				$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES (13, 'Shirt Size', 3, '|2XS|XS|S|M|L|XL|2XL|3XL', 0, 13, ".$GenderMale2['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)");                     
						$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(14, 'Suit Size', 3, '|36S|37S|38S|39S|40S|41S|42S|43S|44S|45S|46S|36R|38R|40R|42R|44R|46R|48R|50R|52R|54R|40L|42L|44L|46L|48L|50L|52L|54L|', 0, 14, ".$GenderMale2['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)");
					}                   
					
        			                       
        			$GenderFemales3 = $wpdb->get_results("SELECT * FROM ".table_agency_data_gender." WHERE GenderTitle = 'Female'",ARRAY_A);
                   	foreach($GenderFemales3 as $GenderFemale3){
                   		$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(15, 'Dress Size', 	3, '|2|4|6|8|10|12|14|16|18|', 0, 15, ".$GenderFemale3['GenderID'].", 1, 1,0,0, 0, 1, 0, 0, 0, 0)"); 
                   	}

        			$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(16, 'Shoe Size', 	7, '1', 0, 16, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");                    
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(17, 'Expertise', 	9, '|Modeling|Acting|Singing|Dancing|', 0, 17, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");   
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(18, 'Experience', 	4, '', 0, 18, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");                      
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(19, 'Language', 	1, '', 0, 19, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");	                    
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(20, 'Union', 		3, '|SAG|AFTRA|ELIG|SAG-AFTRA|SAG-ELIG|NON-UNION|', 0, 20, 0, 1, 1,0, 0,0, 1, 0, 0, 0, 0)");        
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(21, 'Best Way to Contact You', 6, '|Email|Phone|Email & Phone|', 0, 21, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");                      
                    $insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(22, 'Contract Date', 	10, '', 0, 22, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");  
					$insert = $wpdb->query("INSERT INTO " . table_agency_customfields . " VALUES(23, 'Visa Number', 	1, '', 1, 23, 0, 1, 1,0,0, 0, 1, 0, 0, 0, 0)");   
			//junjavier : edit end                    
             		$results = $wpdb->query($insert);


             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (1 , 1 , 'Ethnicity', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (2 , 2 , 'Skin Tone', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (3 , 3 , 'Hair Color', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (4 , 4 , 'Eye Color', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (5 , 5 , 'Height', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (6 , 6 , 'Weight', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (7 , 7 , 'Bust', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (8 , 8 , 'Bra Cup Size', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (9 , 9 , 'Chest', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (10 , 10 , 'Waist', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (11 , 11 , 'Hips', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (12 , 12 , 'Inseam', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (13 , 13 , 'Shirt Size', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (14 , 14 , 'Suit Size', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (15 , 15 , 'Dress Size', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (16 , 16 , 'Shoe Size', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (17 , 17 , 'Expertise', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (18 , 18 , 'Experience', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (19 , 19 , 'Language', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (20 , 20 , 'Union', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (21 , 21 , 'Best Way to Contact You', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (22 , 22 , 'Contract Date', 'Model,Talent')");
             		$insert_types = $wpdb->query("INSERT INTO ".table_agency_customfields_types. " VALUES (23 , 23 , 'Visa Number', 'Model,Talent')");
					$results_types = $wpdb->query($insert_types);

				}

		echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>Restored.</strong> successfully restored custom fields preset values!", RBAGENCY_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". (isset($lastid)?$lastid:0) ."\">") .".</a></p><p>".(isset($error)?$error:"")."</p></div>"); 

	}

	/* Initial Registration [RESPOND TO POST] ***********/ 
	if ( isset($_POST['action']) ) {

		$ProfileCustomID			= isset($_POST['ProfileCustomID'])?$_POST['ProfileCustomID']:"";
		$ProfileCustomTitle			= isset($_POST['ProfileCustomTitle'])?$_POST['ProfileCustomTitle']:"";
		$ProfileCustomType			= isset($_POST['ProfileCustomType']) ?$_POST['ProfileCustomType']:"";
		$ProfileCustomOptions 		= isset($_POST['ProfileCustomOptions'])?$_POST['ProfileCustomOptions']:"";
		$ProfileCustomView 			= (int)$_POST['ProfileCustomView'];
		$ProfileCustomOrder 		= (int)$_POST['ProfileCustomOrder'];
		$ProfileCustomShowGender	= (int)$_POST['ProfileCustomShowGender'];
		$ProfileCustomShowProfile  	= isset($_POST['ProfileCustomShowProfile'])?(int)$_POST['ProfileCustomShowProfile']:0;

		$ProfileCustomShowSearch  	= isset($_POST['ProfileCustomShowSearch']) ? (int)$_POST['ProfileCustomShowSearch'] : 0;
		$ProfileCustomShowLogged  	= isset($_POST['ProfileCustomShowLogged'])?(int)$_POST['ProfileCustomShowLogged']:0;
		$ProfileCustomShowRegistration= isset($_POST['ProfileCustomShowRegistration'])?(int)$_POST['ProfileCustomShowRegistration']:0;
		$ProfileCustomShowSearchSimple= isset($_POST['ProfileCustomShowSearchSimple'])?(int)$_POST['ProfileCustomShowSearchSimple']:0;
		$ProfileCustomShowAdmin   	= isset($_POST['ProfileCustomShowAdmin'])?(int)$_POST['ProfileCustomShowAdmin']:0;
		$ProfileCustomPrivacy   	= isset($_POST['ProfileCustomPrivacy'])?(int)$_POST['ProfileCustomPrivacy']:0;

		//use for filter
		$ProfileCustomShowFilter   	= isset($_POST['ProfileCustomShowFilter'])?(int)$_POST['ProfileCustomShowFilter']:0;

		$ProfileCustomShowCastingJob = isset($_POST['ProfileCustomShowCastingJob'])?(int)$_POST['ProfileCustomShowCastingJob']: 0;
		$ProfileCustomShowCastingRegister = isset($_POST['ProfileCustomShowCastingRegister'])?(int)$_POST['ProfileCustomShowCastingRegister']:0;
		$ProfileCustomShowCastingManager = isset($_POST['ProfileCustomShowCastingManager'])?(int)$_POST['ProfileCustomShowCastingManager']:0;
		//$ProfileCustomNotifyAdmin = isset($_POST['ProfileCustomNotifyAdmin'])?(int)$_POST['ProfileCustomNotifyAdmin']:0;

		/*
		 * Set profile types here
		 */

		$get_types = "SELECT * FROM ". table_agency_data_type;
		$result = $wpdb->get_results($get_types,ARRAY_A);
		foreach ($result as $typ){
			$t = trim($typ['DataTypeTitle']);
			$t = str_replace(' ', '_', $t);
			$name = 'ProfileType' . $t; 
			$$name = (int) $_POST['ProfileType' . $t]; 
		}

		//adjustment in making the visibility fields into a checkbox
		if($ProfileCustomPrivacy==3){
			$ProfileCustomShowLogged = "0";
			$ProfileCustomShowAdmin  = "0";
		} elseif($ProfileCustomPrivacy==2){
			$ProfileCustomShowLogged = "0";
			$ProfileCustomShowAdmin  = "1";
		} else {
			$ProfileCustomShowLogged = "1";
			$ProfileCustomShowAdmin  = "0";
		}

		$error = "";
		if($ProfileCustomType == 1){ //Text
			//...
		} elseif ($ProfileCustomType == 3 || $ProfileCustomType == 9){ //Dropdown || Multi-Select
			$label_option ="";
			$option = "";
			$label_option2 = "";
			$option2 = "";
			if(!empty($_POST["option"]) && isset($_POST["option"])){
				foreach($_POST["option"] as $key => $val){
					if(!empty($val)){
						$option .= stripslashes($val)."|";
					}
				}
				$label_option = "".(isset($_POST["option_label"])?$_POST["option_label"]:"")."|".$option;//
			}
			if(!empty($_POST["option2"]) && isset($_POST["option2"])){
				foreach($_POST["option2"] as $key2 => $val2){
					if(!empty($val2)){
						$option2 .= stripslashes($val2)."|";
					}
				}
				$label_option2 = ":".$_POST["option_label2"]."|".$option2;//
			}
			$ProfileCustomOptions = $label_option.$label_option2; 
		} elseif($ProfileCustomType == 4){ //TextArea
			$ProfileCustomOptions = $_POST["ProfileCustomOptions"];
		} elseif($ProfileCustomType == 5){ //Checkbox
			$pos = 0;
			foreach($_POST["option"] as $key => $val){
				if(!empty($_POST["option"]) && $_POST["option"] !=""  && !empty($val)){
					$pos++;
					if($pos!= count($_POST["option"])){
						$ProfileCustomOptions .= stripslashes($val)."|";
					} else {
						$ProfileCustomOptions .= stripslashes($val);
					}
				}
			}
		} elseif($ProfileCustomType == 6){ //RadioButton
			$pos = 0;
				foreach($_POST["option"] as $key => $val){
				if(!empty($_POST["option"])  && $_POST["option"] !="" && !empty($val)){
					$pos++;
					if($pos!= count($_POST["option"])){
						$ProfileCustomOptions .= $val."|";
					} else {
						$ProfileCustomOptions .= $val;
					}
				}
			}
		} elseif($ProfileCustomType == 7){ //Metric & Imperial
			$ProfileCustomOptions = $_POST["ProfileUnitType"];
		}/*elseif ($ProfileCustomType == 8){ //Dropdown
			$label_option ="";
			$option = "";
			$label_option2 = "";
			$option2 = "";
			if(!empty($_POST["multiple"]) && isset($_POST["multiple"])){
				foreach($_POST["multiple"] as $key => $val){
					if(!empty($val)){
						$option .= $val."|";
					}
				}
				$label_option = "".$_POST["option_label"]."|".$option;//
			}
			if(!empty($_POST["option2"]) && isset($_POST["option2"])){
				foreach($_POST["option2"] as $key2 => $val2){
					if(!empty($val2)){
						$option2 .= $val2."|";
					}
				}
				$label_option2 = ":".$_POST["option_label2"]."|".$option2;//
			}
			$ProfileCustomOptions = $label_option.$label_option2; 
		}*/
		// Error checking

		$have_error = false;
		if(trim($ProfileCustomTitle) == ""){
			$error .= "<b><i>". __(LabelSingular ." name is required", RBAGENCY_TEXTDOMAIN) . ".</i></b><br>";
			$have_error = true;
		}
		$action = $_POST['action'];
		switch($action) {

		// Add
		case 'addRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
				echo "<h3 style=\"width:350px;\">". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	";
				echo " <div class=\"postbox\">";
				echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN)." *</strong></span></h3>";
				echo " <div class=\"inside\"> ";
			} else {

				// Create Record
				$insert = "INSERT INTO " . table_agency_customfields . " (ProfileCustomTitle,ProfileCustomType,ProfileCustomOptions,ProfileCustomView,ProfileCustomOrder,ProfileCustomShowGender,ProfileCustomShowProfile,ProfileCustomShowSearch,ProfileCustomShowFilter,ProfileCustomShowLogged,ProfileCustomShowAdmin,ProfileCustomShowRegistration, ProfileCustomShowSearchSimple,ProfileCustomShowCastingJob,ProfileCustomShowCastingRegister,ProfileCustomShowCastingManager) VALUES ('" . esc_sql($ProfileCustomTitle) . "','" . esc_sql($ProfileCustomType) . "','" . esc_sql($ProfileCustomOptions) . "','" . esc_sql($ProfileCustomView) . "','" . esc_sql($ProfileCustomOrder ) . "','" . esc_sql($ProfileCustomShowGender ) . "','" . esc_sql($ProfileCustomShowProfile ) . "','" . esc_sql($ProfileCustomShowSearch) ."','".esc_sql($ProfileCustomShowFilter) ."' , '". esc_sql($ProfileCustomShowLogged ) . "','" . esc_sql($ProfileCustomShowAdmin) . "','" . esc_sql($ProfileCustomShowRegistration). "','" . esc_sql($ProfileCustomShowSearchSimple) . "','". esc_sql($ProfileCustomShowCastingJob)."','". esc_sql($ProfileCustomShowCastingRegister)."','". esc_sql($ProfileCustomShowCastingManager)."')";
				$results = $wpdb->query($insert);
				$lastid = $wpdb->insert_id;

				$ProfileCustomNotifyAdmin = isset($_POST['ProfileCustomNotifyAdmin']) ? 1 : 0;
				add_option("ProfileCustomNotifyAdmin_".$lastid,$ProfileCustomNotifyAdmin);
				//add_option("rb_agency_ProfileCustomShowCastingJob_".$lastid, $ProfileCustomShowCastingJob);
				//add_option("rb_agency_ProfileCustomShowCastingRegister_".$lastid, $ProfileCustomShowCastingJob);

				/*
				 * Add to Custom Client
				 * if the Profile Custom Client is
				 * Selected
				 */

				$Types = "";

				/*
				 * Set Types Here for each Custom fields.
				 */
				$get_types = "SELECT * FROM ". table_agency_data_type;

				$result = $wpdb->get_results($get_types,ARRAY_A);

				foreach($result as $typ){
					$profiletyp = 'ProfileType' . trim($typ['DataTypeTitle']);
					$profiletyp = str_replace(' ', '_', $profiletyp);
					if($_POST[$profiletyp]) {$Types .= str_replace(' ', '_',trim($typ['DataTypeTitle'])) . "," ; }
				}

				$Types = rtrim($Types, ",");

				if($Types != "" or !empty($Types)){

							$check_sql = "SELECT ProfileCustomTypesID FROM " . table_agency_customfields_types . 
							" WHERE ProfileCustomID = " . $lastid; 

							$check_results = $wpdb->get_results($check_sql,ARRAY_A);

							$count_check = count($check_results);

							if($count_check == 0){
								//create record in Custom Clients
								$insert_client = "INSERT INTO " . table_agency_customfields_types . 
								" (ProfileCustomID,ProfileCustomTitle,ProfileCustomTypes) 
								VALUES (" . $lastid . ",'" 
											. esc_sql($ProfileCustomTitle) . "','" 
											. $Types . "')";

								$results_client = $wpdb->query($insert_client);
							} else {
								//update if already existing 
								$update = "UPDATE " . table_agency_customfields_types . " 
											SET 
											ProfileCustomTypes='" . $Types . "' 
											WHERE ProfileCustomID = ".$lastid;
								$updated = $wpdb->query($update);
							}

				}

				echo ("<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>added</strong> successfully! You may now %s Load Information to the record", RBAGENCY_TEXTDOMAIN), LabelSingular, "<a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&LoginTypeID=". $lastid ."\">") .".</a></p><p>".$error."</p></div>"); 
				echo "<h3 style=\"width:350px;\">". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	";
				echo " <div class=\"postbox\">";
				echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN)." *</strong></span></h3>";
				echo " <div class=\"inside\"> ";
			}
		break;

		// Manage
		case 'editRecord':
			if($have_error){
				echo ("<div id=\"message\" class=\"error\"><p>". sprintf(__("Error creating %s, please ensure you have filled out all required fields", RBAGENCY_TEXTDOMAIN), LabelPlural) .".</p><p>".$error."</p></div>"); 
				echo "<h3 style=\"width:350px;\">". sprintf(__("Edit %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."</h3>
						<div class=\"postbox\">";
				echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></span></h3>";
				echo" <div class=\"inside\"> ";
			} else {
				
				$update = "UPDATE " . table_agency_customfields . " 
							SET 
								ProfileCustomTitle='" . esc_sql($ProfileCustomTitle) . "',
								ProfileCustomType='" . esc_sql($ProfileCustomType) . "',
								ProfileCustomOptions='" . esc_sql($ProfileCustomOptions) . "',
								ProfileCustomView=" . esc_sql($ProfileCustomView) . ", 
								ProfileCustomOrder=" . esc_sql($ProfileCustomOrder) . " ,
								ProfileCustomShowGender=" . esc_sql($ProfileCustomShowGender) . ",
								ProfileCustomShowProfile=" . esc_sql($ProfileCustomShowProfile) . " ,
								ProfileCustomShowSearch=" . esc_sql($ProfileCustomShowSearch) . " ,
								ProfileCustomShowFilter=" . esc_sql($ProfileCustomShowFilter) . " ,
								ProfileCustomShowLogged=" . esc_sql($ProfileCustomShowLogged) . " ,
								ProfileCustomShowRegistration=" . esc_sql($ProfileCustomShowRegistration) . " ,
								ProfileCustomShowSearchSimple=" . esc_sql($ProfileCustomShowSearchSimple) . " ,
								ProfileCustomShowAdmin=" . esc_sql($ProfileCustomShowAdmin) . " ,
								ProfileCustomShowCastingJob=" . esc_sql($ProfileCustomShowCastingJob) . " ,
								ProfileCustomShowCastingRegister=" . esc_sql($ProfileCustomShowCastingRegister) . " ,
								ProfileCustomShowCastingManager=" . esc_sql($ProfileCustomShowCastingManager) . " 


							WHERE ProfileCustomID='$ProfileCustomID'";
				$updated = $wpdb->query($update);
				
				$ProfileCustomNotifyAdmin = isset($_POST['ProfileCustomNotifyAdmin']) ? 1 : 0;
				update_option("ProfileCustomNotifyAdmin_".$ProfileCustomID,$ProfileCustomNotifyAdmin);

				//$upd_casting_job = update_option("rb_agency_ProfileCustomShowCastingJob_".$ProfileCustomID, $ProfileCustomShowCastingJob);
				//$upd_casting_register = update_option("rb_agency_ProfileCustomShowCastingRegister_".$ProfileCustomID, $ProfileCustomShowCastingRegister);
				
				//add_option("rb_agency_ProfileCustomShowCastingJob_".$ProfileCustomID, $ProfileCustomShowCastingJob);
				//add_option("rb_agency_ProfileCustomShowCastingRegister_".$ProfileCustomID, $ProfileCustomShowCastingRegister);
				
				/*
				 * Check if There is Custom client
				 * to be updated
				 */

				$Types = "";

				/*
				 * Set Types Here for each Custom fields.
				 */ 
				$get_types = "SELECT * FROM ". table_agency_data_type;

				$result = $wpdb->get_results($get_types,ARRAY_A);

				foreach ($result as $typ){
					$t = 'ProfileType' . trim($typ['DataTypeTitle']);$t = str_replace(' ', '_', $t);
					$n = trim($typ['DataTypeTitle']);
					$n = str_replace(' ', '_', $n);
					if($$t) {
						$$n = true;
						$Types .= str_replace(' ', '_',trim($typ['DataTypeTitle'])) . "," ; 
					} else {
						$$n = false;
					}
				}

				$Types = rtrim($Types, ",");

				if($Types != "" or !empty($Types)){

							$check_sql = "SELECT ProfileCustomTypesID FROM " . table_agency_customfields_types . 
							" WHERE ProfileCustomID = " . $ProfileCustomID; 
							$check_results = $wpdb->get_results($check_sql,ARRAY_A);
							$count_check = count($check_results);
							if($count_check <= 0){
								//create record in Custom Clients
								$insert_client = "INSERT INTO " . table_agency_customfields_types . 
								" (ProfileCustomID,ProfileCustomTitle,ProfileCustomTypes) 
								VALUES (" . $ProfileCustomID . ",'" 
											. esc_sql($ProfileCustomTitle) . "','" 
											. $Types . "')";
								$results_client = $wpdb->query($insert_client);
							} else {
								//update if already existing 
								$update = "UPDATE " . table_agency_customfields_types . " 
											SET 
											ProfileCustomTypes='" . $Types . "' 
											WHERE ProfileCustomID = ".$ProfileCustomID;
								$updated = $wpdb->query($update);
							}

				} else {

						/*
						 * Delete if there is no selections
						 */
						$delete = "DELETE FROM " . table_agency_customfields_types . " 
									WHERE ProfileCustomID = ".$ProfileCustomID;
						$deleted = $wpdb->query($delete);
				}


				echo "<div id=\"message\" class=\"updated\"><p>". sprintf(__("%s <strong>updated</strong> successfully", RBAGENCY_TEXTDOMAIN), LabelSingular) ."!</p><p>".$error."</p></div>"; 
						echo "<h3 style=\"width:350px;\">". sprintf(__("Edit %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;</h3>
						<div class=\"postbox\">";
				echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></span></h3>";
				echo" <div class=\"inside\"> ";
			}
		break;
		// Delete bulk
		case 'deleteRecord':
			foreach($_POST as $ProfileCustomID) {
				if (is_numeric($ProfileCustomID)) {
				// Verify Record
				$queryDelete = "SELECT ProfileCustomID, ProfileCustomTitle FROM ". table_agency_customfields ." WHERE ProfileCustomID =  \"". $ProfileCustomID ."\"";
				$resultsDelete = $wpdb->get_results($queryDelete,ARRAY_A);
				foreach ($resultsDelete as $dataDelete) {

					// Remove Record
					$delete = "DELETE FROM " . table_agency_customfields . " WHERE ProfileCustomID = \"". $ProfileCustomID ."\"";
					$results = $wpdb->query($delete);

					// Rmove from Custom Types
					$delete_sql = "DELETE FROM " . table_agency_customfields_types . 
					" WHERE ProfileCustomID='$ProfileCustomID'";
					$deleted = $wpdb->query($delete_sql);

					echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['ProfileCustomTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";

				}// while
				}// it was numeric
			}// for each
					echo "<h3 style=\"width:350px;\">". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>	";
					echo " <div class=\"postbox\">";
					echo"<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN)." *</strong></span></h3>";
					echo " <div class=\"inside\"> ";
		break;

		}// Switch

}// Action Post
elseif (isset($_GET["deleteRecord"])) {

	$ProfileCustomID = $_GET['ProfileCustomID'];
	if (is_numeric($ProfileCustomID)) {
		// Verify Record
		$queryDelete = "SELECT ProfileCustomID, ProfileCustomTitle FROM ". table_agency_customfields ." WHERE ProfileCustomID =  \"". $ProfileCustomID ."\"";
		$resultsDelete = $wpdb->get_results($queryDelete,ARRAY_A);
		foreach($resultsDelete as $dataDelete) {

			// Remove Record
			$delete = "DELETE FROM " . table_agency_customfields . " WHERE ProfileCustomID = \"". $ProfileCustomID ."\"";
			$results = $wpdb->query($delete);

			// Rmove from Custom Types
			$delete_sql = "DELETE FROM " . table_agency_customfields_types . 
			" WHERE ProfileCustomID='$ProfileCustomID'";
			$deleted = $wpdb->query($delete_sql) or die($wpdb->print_error());

			echo "<div id=\"message\" class=\"updated\"><p>". __(LabelSingular ." <strong>". $dataDelete['ProfileCustomTitle'] ."</strong> deleted successfully", RBAGENCY_TEXTDOMAIN) ."!</p></div>\n";
			echo "<h3 style=\"width:350px;\">". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a></h3>
			<div class=\"postbox\">
			<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >".sprintf(__("Fill in the form below to add a new record %s", RBAGENCY_TEXTDOMAIN), LabelPlural) .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN)." *</strong></span></h3>
			<div class=\"inside\"> ";

		}// is there record?
	}// it was numeric
}
elseif (isset($_GET['action']) && $_GET['action'] == "editRecord") {
		$action = $_GET['action'];
		$ProfileCustomID = $_GET['ProfileCustomID'];

		if ( $ProfileCustomID > 0) {
			$query = "SELECT * FROM " . table_agency_customfields . " WHERE ProfileCustomID='$ProfileCustomID'";
			$results = $wpdb->get_results($query,ARRAY_A);
			$count = count($results);
			foreach($results as $data) {
				$ProfileCustomID			=	$data['ProfileCustomID'];
				$ProfileCustomTitle			=	stripslashes($data['ProfileCustomTitle']);
				$ProfileCustomType			=	$data['ProfileCustomType'];
				$ProfileCustomOptions		=	stripslashes($data['ProfileCustomOptions']);
				$ProfileCustomView			=	$data['ProfileCustomView'];
				$ProfileCustomOrder			=	$data['ProfileCustomOrder'];
				$ProfileCustomShowGender	=	$data['ProfileCustomShowGender'];
				$ProfileCustomShowProfile	=	$data['ProfileCustomShowProfile'];
				$ProfileCustomShowSearch	=	$data['ProfileCustomShowSearch'];
				$ProfileCustomShowLogged	=	$data['ProfileCustomShowLogged'];
				$ProfileCustomShowRegistration=	$data['ProfileCustomShowRegistration'];
				$ProfileCustomShowSearchSimple=	$data['ProfileCustomShowSearchSimple'];
				$ProfileCustomShowAdmin		=	$data['ProfileCustomShowAdmin'];
				$ProfileCustomShowCastingJob		=	$data['ProfileCustomShowCastingJob'];
				$ProfileCustomShowCastingRegister		=	$data['ProfileCustomShowCastingRegister'];
				$ProfileCustomShowCastingManager		=	$data['ProfileCustomShowCastingManager'];
				//$ProfileCustomNotifyAdmin		=	$data['ProfileCustomNotifyAdmin'];
			}

		echo "<h3 style=\"width:350px;\">". sprintf(__("Edit %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."&nbsp;&nbsp;&nbsp;&nbsp;<a class='button-secondary' href='?page=rb_agency_settings&ConfigID=5'>Add New Custom Field</a></h3>
				<div class=\"postbox\">";
		echo "<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></span></h3>";
		echo "<div class=\"inside\"> ";

		}

	} else {

			$ProfileCustomID				= 0;
			$ProfileCustomTitle				= "";
			$ProfileCustomType				= "";
			$ProfileCustomOptions			= "";
			$ProfileCustomView				= 0;
			$ProfileCustomOrder				= 0;
			$ProfileCustomShowGender		= 0;
			$ProfileCustomShowProfile		= 0;
			$ProfileCustomShowSearch		= 0;
			$ProfileCustomShowSearchSimple	= 0;
			$ProfileCustomShowLogged		= 0;
			$ProfileCustomShowRegistration	= 0;
			$ProfileCustomShowAdmin			= 0;
			$ProfileCustomShowCastingJob	= 0;
			$ProfileCustomShowCastingRegister= 0;
			$ProfileCustomShowCastingManager= 0;
			//$ProfileCustomNotifyAdmin		= 0;
			echo "\n";
		echo " 
		<div class=\"postbox \">
		<!--	<h3 class=\"hndle\" style=\"margin:10px;font-size:11px;\"><span >". __("Make changes in the form below to edit a ", RBAGENCY_TEXTDOMAIN) ." ". LabelSingular .". <strong>". __("Required fields are marked", RBAGENCY_TEXTDOMAIN) ." *</strong></span></h3>
		-->
		<div class=\"inside\"> ";
		if(isset($_GET["action"]) !== "editRecord"){
			echo "<h3 class=\"hndle\" style=\"margin-top:-0px;\">". sprintf(__("Create New %s", RBAGENCY_TEXTDOMAIN), LabelPlural) ."</h3>";
		}
	}
	if(isset($_GET["action"]) == "editRecord"){
		echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&ProfileCustomID=".$_GET["ProfileCustomID"]."&ConfigID=".$_GET["ConfigID"]."\">\n";
	} else {
		echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."\">\n";
	}
	echo "<div id=\"new-customfields\" class=\"rbform\">\n";
		if(!isset($_GET["action"])){ // Create new Field
			echo "
						<div class=\"rbfield rbselect rbsingle\">
							<label>Type*:</label>
							<div>";
								if($rb_agency_options_arr['rb_agency_option_unittype']==1){
										echo"	<select class=\"objtype\" name=\"ProfileCustomType\" id=\"1\">";
								} else {
									echo"	<select class=\"objtype\" name=\"ProfileCustomType\" id=\"0\">";
								}
								echo"<option value=\"\">---</option>
									<option value=\"1\">Single Line Text</option>
									<!--<option value=\"2\">Min/Max textfield</option>-->
									<option value=\"3\">Dropdown</option>
									<option value=\"4\">Textbox</option>
									<option value=\"5\">Checkbox</option>
									<option value=\"6\">Radio Button</option>
									<option value=\"11\">Link</option>";
									if($rb_agency_options_arr['rb_agency_option_unittype']==1){
										echo"     <option value=\"7\" id=\"1\">Imperial (ft/in/lb)</option>";
									} else {
										echo"     <option value=\"7\" id=\"0\">Metric (cm/kg)</option>";
									}
									echo "<option value=\"9\">Dropdown (Multi-Select)</option>";
									echo "<option value=\"10\">Date</option>";
			echo"				</select>";
			echo "			</div>
						</div>
						<div class=\"rbfield rbradio rbmulti\">
							<label>Visibility*:</label>
							<div>
								<div><label><input type=\"radio\" name=\"ProfileCustomView\" value=\"0\" checked=\"checked\" /> <strong>". __("Public", RBAGENCY_TEXTDOMAIN) ."</strong></label><br/><small>". __("Visible on Profile & Search, Profile Management, Admin CRM", RBAGENCY_TEXTDOMAIN) ."</small></div>
								<div><label><input type=\"radio\" name=\"ProfileCustomView\" value=\"1\" /> <strong>". __("Private", RBAGENCY_TEXTDOMAIN) ."</strong></label><br/><small>". __("Visible in Profile Management & Admin CRM", RBAGENCY_TEXTDOMAIN) ."</small></div>
								<div><label><input type=\"radio\" name=\"ProfileCustomView\" value=\"2\" /> <strong>". __("Restricted", RBAGENCY_TEXTDOMAIN) ."</strong></label><br/><small>". __("Only visible in Admin CRM", RBAGENCY_TEXTDOMAIN) ."</small></div>
							</div>
						</div>
						<div class=\"rbfield rbcheckbox rbmulti\">
							<label>Custom Views:</label>
							<div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowRegistration\" value=\"1\" /> Show on Registration Form</label></div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowSearch\" value=\"1\"  checked=\"checked\" /> Show on Search Form (Advanced)</label></div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowSearchSimple\" value=\"1\" /> Show on Search Form (Simple)</label></div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowProfile\" value=\"1\" checked=\"checked\" /> Show on Profile Manager</label></div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowCastingJob\" value=\"1\" /> Show on Casting Job</label></div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowCastingRegister\" value=\"1\" /> Show on Casting Registration</label></div>
								<div><label><input type=\"checkbox\" name=\"ProfileCustomShowCastingManager\" value=\"1\" /> Show on Casting Manager</label></div>
							</div>
						</div>
						<div class=\"rbfield rbselect rbsingle\">
							<label>Use as sort filter:</label>
							<div><input type='checkbox' name=\"ProfileCustomShowFilter\" value=\"1\" /> Click to enable</div>
						</div>
						<div class=\"rbfield rbselect rbsingle\">
							<label>Gender*:</label>
							<div>";
							$query = "SELECT GenderID, GenderTitle FROM " .  table_agency_data_gender . " GROUP BY GenderTitle ";
							echo "<select name=\"ProfileCustomShowGender\">";
							echo "<option value=\"\">All Gender</option>";
							$queryShowGender = $wpdb->get_results($query,ARRAY_A);
								foreach($queryShowGender as $dataShowGender){
									if(isset($data1["ProfileCustomShowGender"])){
										echo "<option value=\"".$dataShowGender["GenderID"]."\" selected=\"selected\">".$dataShowGender["GenderTitle"]."</option>";
									} else {
										echo "<option value=\"".$dataShowGender["GenderID"]."\">".$dataShowGender["GenderTitle"]."</option>";
									}
								}
							echo "</select>";
							echo "</div>
						</div>
						<div class=\"rbfield rbcheckbox rbmulti\">
							<label>Profile Type:</label>
							<div>";
							/*
							 * get the proper fields on
							 * profile types here
							 */

							$get_types = "SELECT * FROM ". table_agency_data_type;

							$result = $wpdb->get_results($get_types,ARRAY_A);

							foreach( $result as $typ){
								echo "<div><label>";
											$t = trim(str_replace(' ','_',$typ['DataTypeTitle']));
											$checked = 'checked="checked"';            
											echo '<input type="checkbox" name="ProfileType'.$t.'" value="1" ' . 
												$checked . '  />&nbsp;'.
												trim($typ['DataTypeTitle'])
												.'&nbsp;<br/>';
								echo "</label></div>";
							}
						echo		"</div>
						</div>
						<div class=\"rbfield rbselect rbsingle\">
							<label>Custom Order:</label>
							<div>
							<input type=\"text\" name=\"ProfileCustomOrder\" value=\"0\" />
							</div>
						</div>";

			echo "<div id=\"objtype_customize\">\n";
		echo "</div>\n";

		} else { //Edit/Update Field
					$query1 = "SELECT * FROM ". table_agency_customfields ." WHERE ProfileCustomID = ".$_GET["ProfileCustomID"];
					$results1 = $wpdb->get_results($query1,ARRAY_A);
					$count1 = count($results1);
					$pos = 0;
					
					foreach($results1 as $data1) {

						//get record from Clients to edit
						$select_sql = "Select  * FROM " . table_agency_customfields_types . 
						" WHERE ProfileCustomID= " . $data1["ProfileCustomID"];

						$select_sql = $wpdb->get_results($select_sql,ARRAY_A);// or die($wpdb->print_error());

						$fetch_type = current($select_sql);

						$array_type = explode(",",$fetch_type['ProfileCustomTypes']);

						$a = array();

						foreach($array_type as $t_arr){
							$$t_arr = true;
						}

						$pos ++;
							$query2 = "SELECT * FROM ". table_agency_customfield_mux ." WHERE ProfileCustomID=".$data1["ProfileCustomID"]." AND ProfileID=".(isset($ProfileID)?$ProfileID:0)."";
							$results2 = $wpdb->get_results($query2,ARRAY_A);

									echo "<div class=\"rbfield rbselect rbsingle\">
											<label>Type*:</label>
											<div>
												<select class=\"objtype\" name=\"ProfileCustomType\">
												<option value=\"\">---</option>
												<option value=\"1\" ". ($data1["ProfileCustomType"] == 1 ? 'selected=\"selected\"':'').">Single Line Text</option>

												<option value=\"3\" ". ($data1["ProfileCustomType"] == 3 ? 'selected=\"selected\"':'').">Dropdown</option>
												<option value=\"4\" ". ($data1["ProfileCustomType"] == 4 ? 'selected=\"selected\"':'').">Textbox</option>
												<option value=\"5\" ". ($data1["ProfileCustomType"] == 5 ? 'selected=\"selected\"':'').">Checkbox</option>
												<option value=\"6\" ". ($data1["ProfileCustomType"] == 6 ? 'selected=\"selected\"':'').">Radio Button</option>";
												if($rb_agency_options_arr['rb_agency_option_unittype']==1){
													echo"     <option value=\"7\" ". ($data1["ProfileCustomType"] == 7 ? 'selected=\"selected\"':'').">Imperial (ft/in/lb)</option>";
												} else {
													echo"     <option value=\"7\" ". ($data1["ProfileCustomType"] == 7 ? 'selected=\"selected\"':'').">Metric (cm/kg)</option>";
												}
											echo "	<option value=\"9\" ". ($data1["ProfileCustomType"] == 9? 'selected=\"selected\"':'').">Dropdown (Multi-Select)</option>";;
											echo "	<option value=\"10\" ". ($data1["ProfileCustomType"] == 10? 'selected=\"selected\"':'').">Date</option>";
											echo "	<option value=\"11\" ". ($data1["ProfileCustomType"] == 11? 'selected=\"selected\"':'').">Link</option>";
											echo "</select>
											</div>
										</div>";
										//	<a href=\"javascript:;\"  style=\"font-size:12px;color:#069;". ($data1["ProfileCustomType"] == 3 ? '':'display:none;')."\" class=\"add_more_object\" id=\"add_more_object_show\">add another dropdown list to compare(min/max)</a>

										echo "  <div class=\"rbfield rbradio rbmulti\">
												<label>Visibility*:</label>
												<div>
													<div><label><input type=\"radio\" name=\"ProfileCustomView\" value=\"0\" ". ($data1["ProfileCustomView"] == 0 ? 'checked=\"checked\"':'')." /> <strong>". __("Public", RBAGENCY_TEXTDOMAIN) ."</strong><br/></label><small>". __("Visible on Registration, Profile Management, Admin CRM", RBAGENCY_TEXTDOMAIN) ."</small></div>
													<div><label><input type=\"radio\" name=\"ProfileCustomView\" value=\"1\" ". ($data1["ProfileCustomView"] == 1 ? 'checked=\"checked\"':'')." /> <strong>". __("Private", RBAGENCY_TEXTDOMAIN) ."</strong><br/></label><small>". __("Visible in Registration, Profile Management & Admin CRM", RBAGENCY_TEXTDOMAIN) ."</small></div>
													<div><label><input type=\"radio\" name=\"ProfileCustomView\" value=\"2\" ". ($data1["ProfileCustomView"] == 2 ? 'checked=\"checked\"':'')." /> <strong>". __("Restricted", RBAGENCY_TEXTDOMAIN) ."</strong><br/></label><small>". __("Only visible in Admin CRM", RBAGENCY_TEXTDOMAIN) ."</small></div>
												</div>

												</div>
												<div class=\"rbfield rbcheckbox rbmulti\">
													<label>Custom View*:</label>
													<div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowRegistration\" value=\"1\" ". ($data1['ProfileCustomShowRegistration'] == 1 ? 'checked=\"checked\"':'')." /> Show on Registration Form</label></div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowSearch\" value=\"1\" ". ($data1["ProfileCustomShowSearch"] == 1 ? 'checked=\"checked\"':'')." /> Show on Search Form (Advanced)</label></div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowSearchSimple\" value=\"1\" ". ($data1["ProfileCustomShowSearchSimple"] == 1 ? 'checked=\"checked\"':'')." /> Show on Search Form (Simple)</label></div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowProfile\" value=\"1\" ". ($data1["ProfileCustomShowProfile"] == 1 ? 'checked=\"checked\"':'')." /> Show on Profile View</label></div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowCastingJob\" value=\"1\" ". ($data1["ProfileCustomShowCastingJob"] == 1 ? 'checked=\"checked\"':'')."/> Show on Casting Job</label></div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowCastingRegister\" value=\"1\" ". ($data1["ProfileCustomShowCastingRegister"] == 1 ? 'checked=\"checked\"':'')."/> Show on Casting Registration</label></div>
														<div><label><input type=\"checkbox\" name=\"ProfileCustomShowCastingManager\" value=\"1\" ". ($data1["ProfileCustomShowCastingManager"] == 1 ? 'checked=\"checked\"':'')."/> Show on Casting Manager</label></div>
													</div>
												</div>
												<div class=\"rbfield rbselect rbsingle\">
													<label>Use as sort filter:</label>
													<div><input type='checkbox' name=\"ProfileCustomShowFilter\" value=\"1\" ". ($data1['ProfileCustomShowFilter'] == 1 ? 'checked=\"checked\"':'')."/> Click to enable</div>
												</div>
												<div class=\"rbfield rbselect rbsingle\">
													<label>Gender*:</label>
													<div>";

													$query= "SELECT GenderID, GenderTitle FROM " .  table_agency_data_gender . " GROUP BY GenderTitle ";
													echo "<select name=\"ProfileCustomShowGender\">";
													echo "<option value=\"\">All Gender</option>";
													$queryShowGender = $wpdb->get_results($query,ARRAY_A);
														foreach($queryShowGender as $dataShowGender){

																echo "<option value=\"".$dataShowGender["GenderID"]."\" ". selected($data1["ProfileCustomShowGender"],$dataShowGender["GenderID"],false).">".$dataShowGender["GenderTitle"]."</option>";

														}
													echo "</select>";

												echo "
													</div>
												</div>

											<div class=\"rbfield rbcheckbox rbmulti\">
													<label>Profile Type:</label>
													<div>";

											/*
											 * get the proper fields on
											 * profile types here
											 */
											$ProfileCustomID = $_GET['ProfileCustomID'];

											//get custom types
											$_sql = "SELECT ProfileCustomTypes FROM " . table_agency_customfields_types . 
												" WHERE ProfileCustomID = $ProfileCustomID";
											$x = $wpdb->get_row($_sql);// or die($wpdb->print_error());

											if(strpos($x->ProfileCustomTypes,",") > -1){
													$rTypes = explode(",",$x->ProfileCustomTypes);
											} else {
													$rTypes = $x->ProfileCustomTypes;
											}

											$get_types = "SELECT * FROM ". table_agency_data_type;

											$result = $wpdb->get_results($get_types,ARRAY_A);

											foreach( $result as $typ){
												$t = trim(str_replace(' ','_',$typ['DataTypeTitle']));
												$checked = '';
												if(is_array($rTypes)){
													if(in_array($t,$rTypes)){
															$checked = 'checked="checked"';
													}
												} else {
													if($t == $rTypes){
															$checked = 'checked="checked"';
													}
												}

												echo '<input type="checkbox" name="ProfileType'.$t.'" value="1" ' . 
														$checked . '  />&nbsp;'.
														trim($typ['DataTypeTitle'])
														.'&nbsp;<br/>';
											}

											echo "	</div>
											</div>

												<div class=\"rbfield rbtext rbsingle\">
													<label>Custom Order*:</label>
													<div>
														<input type=\"text\" name=\"ProfileCustomOrder\"  value=\"".$data1["ProfileCustomOrder"]."\"/>
													</div>
												</div>";
								echo "<div id=\"obj_edit\" class=\"".$data1["ProfileCustomType"]."\">";

								if($data1["ProfileCustomType"] == 1){ // text
									echo "<div class=\"rbfield rbtext rbsingle\">";
									$data1["ProfileCustomTitle"] = str_replace("'",'',$data1["ProfileCustomTitle"]);
									$data1["ProfileCustomTitle"] = str_replace("_"," ",stripcslashes($data1["ProfileCustomTitle"]));
									echo "	<label>Title:</label>
											<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
										</div>";
									echo "
										<div class=\"rbfield rbtext rbsingle\">
											<label>Value*:</label>
											<div><input type=\"text\" name=\"ProfileCustomOptions\" value=\"". $data1["ProfileCustomOptions"] ."\" /></div>
										</div>";

								} elseif($data1['ProfileCustomType'] == 11){
									echo "<div class=\"rbfield rbtext rbsingle\">";
									echo "
											<label>Title*:</label>
											<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
										</div>";
									echo "
											<div class=\"rbfield rbtext rbsingle\">
												<label>Value*:</label>
												<div><input type=\"text\" name=\"ProfileCustomOptions\" value=\"". $data1["ProfileCustomOptions"] ."\" /></div>
											</div>";



								} elseif($data1["ProfileCustomType"] == 3 || $data1["ProfileCustomType"] == 9){ // Dropdown || Multi-Select
									$data1["ProfileCustomTitle"] = str_replace("'",'',$data1["ProfileCustomTitle"]);
									$data1["ProfileCustomTitle"] = str_replace("_"," ",stripcslashes($data1["ProfileCustomTitle"]));
									echo "<div class=\"rbfield rbselect rbsingle\">
											<label>Title:</label>
											<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
										</div>";
											@list($option1,$option2) = @explode(":",$data1['ProfileCustomOptions']);

											$data1 = explode("|",$option1);
											$data2 = explode("|",$option2);
									echo "<ul id=\"editfield_add_more_options_12\">";
										$pos = 0;
										foreach($data1 as $val1){

											if($val1 != end($data1) && $val1 != $data1[0]){
											$pos++;
											echo "<li class=\"rbfield rbtext rbsingle\"><label>Option:</label>";
											echo "	<div class=\"option\"><input type=\"text\"  value=\"".htmlspecialchars($val1)."\" name=\"option[]\"/><a href='javascript:;' class='del_opt' title='Delete Option' style='color:red; text-decoration:none'>&nbsp;[ - ]</a><br></div>";
											echo "</li>";
											}
										}
									echo '</ul>';
									//echo "<div  id=\"editfield_add_more_options_1\"></div>";
									echo "<div class=\"rbfield rbsingle\"><a href=\"javascript:;\" id=\"addmoreoption_1\" class=\"add-more-option\">add more option[+]</a></div>";

											if(!empty($data2) && !empty($option2)){
												echo "<div class=\"rbfield rbsingle\"><label>Label:</label><div><input type=\"text\" name=\"option_label2\" value=\"".current($data2)."\" /><br/></div></div>";
												$pos2 = 0;
											echo '<div id="editfield_add_more_options_1">';
												foreach($data2 as $val2){
													echo "<div class=\"rbfield rbtext rbsingle\">";
													if($val2 != end($data2) && $val2 !=  $data2[0]){
														$pos2++;
														echo "<label>Option:</label><div><input type=\"text\" value=\"".$val2."\"  name=\"option2[]\"/></div>";
													if($pos2==1){
														echo "<input type=\"checkbox\" ".(end($data2)=="yes" ? "checked=\"checked\"":"")." name=\"option_default_2\"/><span style=\"font-size:11px;\">(set as selected)</span>";
														echo "<a href=\"javascript:;\" id=\"addmoreoption_2\" class=\"add-more-option\">add more option[+]</a>";
														}
													}
													echo '</div>';
												}
												echo '</div>';
											}

											echo "<script type=\"text/javascript\">jQuery(document).ready(function(){jQuery( '#editfield_add_more_options_12' ).sortable();});</script>";
											echo "<div  id=\"editfield_add_more_options_2\"></div><br/>";

								} elseif($data1["ProfileCustomType"] == 4){ //textbox
										$array_customOptions_values = explode("|",$data1['ProfileCustomOptions']);
										$data1["ProfileCustomTitle"] = str_replace("'",'',$data1["ProfileCustomTitle"]);
										$data1["ProfileCustomTitle"] = str_replace("_"," ",stripcslashes($data1["ProfileCustomTitle"]));
										echo "<div class=\"rbfield rbtext rbsingle\">
												<label>Title:</label>
												<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
											</div>";
										echo "<div class=\"rbfield rbtextarea rbsingle\">
												<label>Value*:</label>
												<div><textarea name=\"ProfileCustomOptions\"> ". $data1["ProfileCustomOptions"] ."</textarea></div>
											</div>";

								} elseif($data1["ProfileCustomType"] == 5){ //checkbox

										$array_customOptions_values = explode("|",$data1['ProfileCustomOptions']);
										$pos =0;
										$data1["ProfileCustomTitle"] = str_replace("'",'',$data1["ProfileCustomTitle"]);
										$data1["ProfileCustomTitle"] = str_replace("_"," ",stripcslashes($data1["ProfileCustomTitle"]));
										echo "<div class=\"rbfield rbtext rbsingle\">
											<label>Title:</label>
											<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
											</div>";
										echo "
											<ul id=\"editfield_add_more_options_12\">
														";
										foreach($array_customOptions_values as  $val){
											echo" <li class=\"rbfield rbtext rbsingle\"><label>Option:</label>";
											echo "	<div class=\"option\"><input type=\"text\" name=\"option[]\" value=\"". htmlspecialchars($val)."\" /><a href='javascript:;' class='del_cboxopt' title='Delete Option' style='color:red; text-decoration:none'>&nbsp;[ - ]</a></div>";
											echo "</li>";
										}
										echo "</ul>";
										//echo "<div id=\"addcheckbox_field_12\"></div>";
										//echo "<br/><a href=\"javascript:;\"  id=\"addmoreoption_1\">add more option[+]</a>";
										//echo "<div  id=\"editfield_add_more_options_12\"><ul style=\"list-style:none;\"></ul></div><br/>";
										echo "<div class=\"rbfield rbsingle\"><a href=\"javascript:;\" id=\"addmoreoption_1\" class=\"add-more-option\">add more option[+]</a></div>";
										//echo "<a href=\"javascript:void(0);\" style=\"font-size:12px;color:#069;text-decoration:underline;cursor:pointer;text-align:right;\" onclick=\"add_more_checkbox_field(12);\" >add more[+]</a>";
										echo "<script type=\"text/javascript\">jQuery(document).ready(function(){jQuery( '#editfield_add_more_options_12' ).sortable();});</script>";

								} elseif($data1["ProfileCustomType"] == 6){ //radio button
									$array_customOptions_values = explode("|",$data1['ProfileCustomOptions']);
									$pos =0;
									$data1["ProfileCustomTitle"] = str_replace("'",'',$data1["ProfileCustomTitle"]);
									$data1["ProfileCustomTitle"] = str_replace("_"," ",stripcslashes($data1["ProfileCustomTitle"]));
									echo "<div class=\"rbfield rbtext rbsingle\">
											<label>Title:</label>
											<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
										</div>";
									echo "<ul id=\"editfield_add_more_options_12\" style=\"list-style:none;\">";
										foreach($array_customOptions_values as  $val){
											if(!empty($val)){
												$pos++;
												//echo"&nbsp;Value:<input type=\"text\" name=\"label[]\" value=\"". $val."\" />";
												echo" <li class=\"rbfield rbtext rbsingle\"><label>Option:</label> <div class=\"option\"><input type=\"text\" name=\"option[]\" value=\"". htmlspecialchars($val)."\" /><a href='javascript:;' class='del_cboxopt' title='Delete Option' style='color:red; text-decoration:none'>&nbsp;[ - ]</a><div></li>";
											}
								}

										echo "</ul>";
										//echo "<div id=\"addcheckbox_field_1\"></div>";
										//echo"<a href=\"javascript:void(0);\" style=\"font-size:12px;color:#069;text-decoration:underline;cursor:pointer;text-align:right;\" onclick=\"add_more_checkbox_field(1);\" >add more[+]</a>";
										//echo "<div  id=\"editfield_add_more_options_12\"><ul style=\"list-style:none;\"></ul></div><br/>";
										echo "<div class=\"rbfield rbsingle\"><a href=\"javascript:;\" id=\"addmoreoption_1\" class=\"add-more-option\">add more option[+]</a></div>";
										echo "<script type=\"text/javascript\">jQuery(document).ready(function(){jQuery( '#editfield_add_more_options_12' ).sortable();});</script>";
								} elseif ($data1["ProfileCustomType"] == 7) { ///metric/imperials
										echo "<div class=\"rbfield rbtext rbsingle\"><label>Title*:</label><div><input type='text' name='ProfileCustomTitle' value=\"".$data1["ProfileCustomTitle"]."\"/></div></div>";
										if ($rb_agency_options_arr['rb_agency_option_unittype']==0) { //  Metric (cm/kg)
											echo "<div class=\"rbfield rbtext rbmulti\"><label></label>";
											echo "<div><div><label><input type='radio' name='ProfileUnitType' value='1'  ".checked($data1["ProfileCustomOptions"],1,false)."/>cm</label></div></div>";
											echo "<div><div><label><input type='radio' name='ProfileUnitType' value='2'  ".checked($data1["ProfileCustomOptions"],2,false)."/>kg</label></div></div>";
											echo "</div>";
							
										} elseif ($rb_agency_options_arr['rb_agency_option_unittype']==1) { //  Imperial (in/lb)
											echo "<div class=\"rbfield rbradio rbmulti\"><label></label>";
											echo "<div><div><label><input type='radio' name='ProfileUnitType' value='1' ".checked($data1["ProfileCustomOptions"],1,false)." />Inches</label></div>";
											echo "<div><label><input type='radio' name='ProfileUnitType' value='2' ".checked($data1["ProfileCustomOptions"],2,false)."/>Pounds</label></div>";
											echo "<div><label><input type='radio' name='ProfileUnitType' value='3' ".checked($data1["ProfileCustomOptions"],3,false)."/>Feet/Inches</label></div></div>";
											echo "</div>";
										}

								} else if($data1["ProfileCustomType"] == 10){ // text
									$data1["ProfileCustomTitle"] = str_replace("'",'',$data1["ProfileCustomTitle"]);
									$data1["ProfileCustomTitle"] = str_replace("_"," ",stripcslashes($data1["ProfileCustomTitle"]));
									echo "<div class=\"rbfield rbtext rbsingle\">
											<label>Title:</label>
											<div><input type=\"text\" name=\"ProfileCustomTitle\" value=\"".$data1["ProfileCustomTitle"]."\"/></div>
											</div>";
											$NofityAdmin = get_option("ProfileCustomNotifyAdmin_".$data1['ProfileCustomID']);
											$NotifyAdminSelected = is_numeric($NofityAdmin) && $NofityAdmin == 1 ? "checked" : "";
									echo "<div class=\"rbfield rbtext rbsingle\">
											<label>&nbsp;</label>
											<div><input type=\"checkbox\" name=\"ProfileCustomNotifyAdmin\" value=\"1\"  ".$NotifyAdminSelected."><span style=\"font-size:11px;\">Notify the admin when user reached expiry date.</span></div>
											</div>";
									
										
									
								}

					
					}//endwhile
					echo "</div><!-- #obj_edit -->";
		}

			if ( $ProfileCustomID > 0) {
			echo "<p class=\"submit rbfield\">\n";
			echo "     <input type=\"hidden\" name=\"ProfileCustomID\" value=\"". $ProfileCustomID ."\" />\n";
			echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
			echo "     <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";
			echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Update Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
			echo "</p>\n";
			} else {
			echo "<p class=\"submit rbfield\">\n";
			echo "     <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";
			echo "     <input type=\"hidden\" name=\"ConfigID\" value=\"". $ConfigID ."\" />\n";
			echo "     <input type=\"submit\" name=\"submit\" value=\"". __("Create Record", RBAGENCY_TEXTDOMAIN) ."\" class=\"button-primary\" />\n";
			echo "</p>\n";
			}
			echo "</form>\n";
	?>
			</div>
</div><!-- .inside -->
</div><!-- .postbox -->
<div class="all-custom_fields">
<style type="text/css">
	#rb-cfield tr td {
		border-bottom: 2px dotted #ccc;
	}
</style>
	<?php

	echo "  <h3 class=\"title\">". __("All Records", RBAGENCY_TEXTDOMAIN) ."</h3>\n";
	echo " <span>Select a custom field to record.</span>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;<a style=\"float: right;margin-top: -20px;\" class='button-secondary' href='?page=rb_agency_settings&ConfigID=5&restore=RestorePreset'>Restore Preset Custom Fields</a>";
		/******** Sort Order ************/
		$sort = "";
		if (isset($_GET['sort']) && !empty($_GET['sort'])){
			$sort = $_GET['sort'];
		}
		else {
			$sort = "ProfileCustomOrder";
		}

		/******** Direction ************/
		$dir = "";
		if (isset($_GET['dir']) && !empty($_GET['dir'])){
			$dir = $_GET['dir'];
			if ($dir == "desc" || !isset($dir) || empty($dir)){
				$sortDirection = "asc";
			} else {
				$sortDirection = "desc";
			}
		} else {
			$sortDirection = "desc";
			$dir = "asc";
		}

		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=5\">\n";
		echo "<table id=\"rb-cfield\" cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Type", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomOptions&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Options", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Visibility", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Custom Order", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Gender", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Custom View", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=ProfileCustomView&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Profile Type", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";
		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Type", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Options", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Visibility", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Custom Order", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Gender", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Custom View", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Profile Type", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";
		echo "<tbody>\n";

		$query = "SELECT main.*, 
					a.ProfileCustomTypes
					FROM ". table_agency_customfields ." main
					LEFT JOIN ". table_agency_customfields_types ." a 
					ON a.ProfileCustomID = main.ProfileCustomID 
					ORDER BY $sort $dir";

		$results = $wpdb->get_results($query,ARRAY_A) or die ( __($wpdb->print_error(), RBAGENCY_TEXTDOMAIN ));
		$count = count($results);

		$rb_agency_options_arr = get_option('rb_agency_options');
		$rb_agency_option_unittype  = $rb_agency_options_arr['rb_agency_option_unittype'];

		foreach ($results as $data) {
			$ProfileCustomID	=$data['ProfileCustomID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $ProfileCustomID ."\" name=\"". $ProfileCustomID ."\" value=\"". $ProfileCustomID ."\" /></th>\n";
		echo "        <td class=\"column\">".  str_replace("'",'',stripslashes($data['ProfileCustomTitle'])) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;ProfileCustomID=". $ProfileCustomID ."&amp;ConfigID=". $ConfigID ."\" title=\"". __("Edit this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Edit", RBAGENCY_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;deleteRecord&amp;ProfileCustomID=". $ProfileCustomID ."&amp;ConfigID=". $ConfigID ."\"  onclick=\"if ( confirm('". __("You are about to delete this ". LabelSingular, RBAGENCY_TEXTDOMAIN) . ".\'". __("Cancel", RBAGENCY_TEXTDOMAIN) . "\' ". __("to stop", RBAGENCY_TEXTDOMAIN) . ", \'". __("OK", RBAGENCY_TEXTDOMAIN) . "\' ". __("to delete", RBAGENCY_TEXTDOMAIN) . ".') ) {return true;}return false;\" title=\"". __("Delete this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Delete", RBAGENCY_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </td>\n";
		echo "        <td class=\"column\">"; if ($data['ProfileCustomType'] == 1){echo "Text"; } elseif($data['ProfileCustomType'] == 11){echo "Link"; } elseif ($data['ProfileCustomType'] == 2 ){echo "Search Layout"; } elseif ($data['ProfileCustomType'] == 5) {echo "Checkbox"; } elseif ($data['ProfileCustomType'] == 6) {echo "Radio"; } elseif ($data['ProfileCustomType'] == 3) {echo "Dropdown"; } elseif ($data['ProfileCustomType'] == 4) {echo "Textarea"; } elseif ($data['ProfileCustomType'] == 9) {echo "Dropdown(Multi-Select)"; } elseif ($data['ProfileCustomType'] == 7) {if($rb_agency_options_arr['rb_agency_option_unittype']==1){if($data['ProfileCustomOptions']==1){echo "Imperial(in)";} elseif($data['ProfileCustomOptions']==2){echo "Imperial(lb)";} elseif($data['ProfileCustomOptions']==3){echo "Imperial(in/ft)";}} else {if($data['ProfileCustomOptions']==2){echo "Metric(cm)";} elseif($data['ProfileCustomOptions']==2){echo "Metric(kg)";} elseif($data['ProfileCustomOptions']==3){echo "Imperial(in/ft)";}}} elseif ($data['ProfileCustomType'] == 10 ){echo "Date"; }echo "</td>\n";


				$measurements_label = "";

			if ($data['ProfileCustomType'] == 7) { //measurements field type
						if($rb_agency_option_unittype ==0){ // 0 = Metrics(ft/kg)
						if($data['ProfileCustomOptions'] == 1){

								$measurements_label  ="cm";
						} elseif($data['ProfileCustomOptions'] == 2){

							$measurements_label  ="Kg";
						} elseif($data['ProfileCustomOptions'] == 3){
							$measurements_label  ="Feet/Inches";
						}
					} elseif($rb_agency_option_unittype ==1){ //1 = Imperial(in/lb)
						if($data['ProfileCustomOptions'] == 1){
							$measurements_label  ="Inches";

						} elseif($data['ProfileCustomOptions'] == 2){

							$measurements_label  ="Pounds";
						} elseif($data['ProfileCustomOptions'] == 3){
							$measurements_label  ="(Feet/Inches)";
						}
					}

			}
		if($data['ProfileCustomType'] == 7 ) {echo " <td class=\"column\">".$measurements_label."</td>\n"; } else {echo "        <td class=\"column\">".str_replace("|",",",$data['ProfileCustomOptions'])."</td>\n"; }
		echo "        <td class=\"column\">"; if ($data['ProfileCustomView'] == 0) {echo "Public"; } elseif ($data['ProfileCustomView'] == 1) {echo "Private"; } elseif ($data['ProfileCustomView'] == 2) {echo "Custom"; }echo "</td>\n";
		echo "        <td class=\"column\">".$data['ProfileCustomOrder']."</td>\n";
		$queryGender = $wpdb->get_results("SELECT GenderID, GenderTitle FROM ".table_agency_data_gender." WHERE GenderID=".$data['ProfileCustomShowGender']."",ARRAY_A); 
		$fetchGender = current($queryGender);
		$countGender = count($queryGender);
		if($countGender > 0){
			echo "        <td class=\"column\">".$fetchGender["GenderTitle"]."</td>\n";
		} else {
			echo "        <td class=\"column\">All Gender</td>\n";
		}

		$custom_views="";
		if($data["ProfileCustomShowRegistration"]==1){
			$custom_views ="Registration<br/>";
		}
		if($data["ProfileCustomShowSearch"]==1){
			$custom_views .="Advanced<br/>";
		}
		if($data["ProfileCustomShowSearchSimple"]==1){
			$custom_views .="Simple<br/>";
		}
		if($data["ProfileCustomShowProfile"]==1){
			$custom_views .="Profile";
		}

		echo "        <td class=\"column\">".$custom_views."</td>\n";
		echo "        <td class=\"column\">".str_replace(",","<br/>",str_replace('_',' ',$data["ProfileCustomTypes"]))."</td>\n";

		echo "    </tr>\n";
		}
		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"5\"><p>". __("There aren't any records loaded yet", RBAGENCY_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", RBAGENCY_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";

		echo "</form>\n";
echo "</div>";
echo "</div><!-- #custom-fields -->";




} elseif ($ConfigID == 6){
	if (isset($_POST["action"])) {
	// Edit Record
		switch(@$_POST["action"]){
		case "editRecord":
			$wpdb->query("UPDATE ".table_agency_data_media." SET MediaCategoryTitle = '".$_POST["MediaCategoryTitle"]."',MediaCategoryGender = '".$_POST["MediaCategoryGender"]."',MediaCategoryOrder = '".$_POST["MediaCategoryOrder"]."',MediaCategoryFileType = '".$_POST["MediaCategoryFileType"]."',MediaCategoryLinkType = '".$_POST["MediaCategoryLinkType"]."' WHERE  MediaCategoryID = ".$_GET["MediaCategoryID"]." ");
				echo ("<div id=\"message\" class=\"updated\"><p>". __("<strong>Updated</strong> successfully!", RBAGENCY_TEXTDOMAIN)."</p></div>"); 
			break;
		// Add Record
		case "addRecord":
			$wpdb->query("INSERT INTO ".table_agency_data_media." (MediaCategoryID,MediaCategoryTitle,MediaCategoryGender,MediaCategoryOrder,MediaCategoryLinkType,MediaCategoryFileType) VALUES('','".$_POST["MediaCategoryTitle"]."','".$_POST["MediaCategoryGender"]."','".$_POST["MediaCategoryOrder"]."','".$_POST["MediaCategoryLinkType"]."','".$_POST["MediaCategoryFileType"]."') ");
			break;
		}
	}

	// Delete Record
	if(isset($_POST["action"])=="deleteRecord"  || isset($_GET["deleteRecord"])){
		if(isset($_GET["deleteRecord"])){
			$wpdb->query("DELETE FROM ". table_agency_data_media ." WHERE MediaCategoryID = '".$_GET["MediaCategoryID"]."'");
		}
		if(isset($_POST["MediaCategoryID"])){
			foreach($_POST["MediaCategoryID"] as $id){
				$wpdb->query("DELETE FROM ". table_agency_data_media ." WHERE MediaCategoryID = '".$id."'");
			}
		}
	}

	$arr_media_category_fileType = array(
			"jpg",
			"png",
			"pdf",
			"doc",
			"mp3",
			"mp4",
			"avi",
			"wmv",
			"3gp"
		);
	$arr_media_category_linkType = array(
			"link",
			"button",
			"embed"
	);

 echo "<div>\n";
			// Add new Record
		if(isset($_GET["action"]) =="editRecord"){

		echo "  <h3 class=\"title\">". __("Edit Record", RBAGENCY_TEXTDOMAIN) ."</h3>\n";

		$query = "SELECT * FROM ". table_agency_data_media ." WHERE MediaCategoryID='%s'";
		$data = $wpdb->get_row($wpdb->prepare($query,$_GET["MediaCategoryID"]),ARRAY_A,0 );
		$count =$wpdb->num_rows;

		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&action=editRecord&ConfigID=6&MediaCategoryID=".$_GET["MediaCategoryID"]."\">\n";
		} else {
			echo "  <h3 class=\"title\">". __("Add New Record", RBAGENCY_TEXTDOMAIN) ."</h3>\n";
			echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=6\">\n";
		}

		echo "<table>";
		echo "<tr>";
		echo "<td>Label:</td><td><input type=\"text\" name=\"MediaCategoryTitle\" value=\"".(isset($data["MediaCategoryTitle"])?$data["MediaCategoryTitle"]:"")."\" style=\"width:500px;\" /></td>\n";
		echo "</tr>";

		echo "<tr>";
		echo "<td>File Type:</td>";
		echo "<td>";
		echo "<select name='MediaCategoryFileType'>";
		echo "<option value=\"\">-Choose-</option>";

		foreach ($arr_media_category_fileType as $key) {
			echo "<option value=\"".$key."\" ".selected($key,isset($data["MediaCategoryFileType"])?$data["MediaCategoryFileType"]:0).">".$key."</option>";
		}

		echo "</select>";
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>Link Type:</td>";
		echo "<td>";
		echo "<select name='MediaCategoryLinkType'>";
			echo "<option value=\"\">-Choose-</option>";

		foreach ($arr_media_category_linkType as $key) {
			echo "<option value=\"".$key."\"  ".selected($key,isset($data["MediaCategoryLinkType"])?$data["MediaCategoryLinkType"]:0).">".$key."</option>";
		}
		echo "</select>";
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Gender:</td><td>\n";
		$query= "SELECT GenderID, GenderTitle FROM " .  table_agency_data_gender . " GROUP BY GenderTitle ";
					echo "<select name=\"MediaCategoryGender\">";
					echo "<option value=\"\">All Gender</option>";
					$queryShowGender = $wpdb->get_results($query, ARRAY_A);
					foreach( $queryShowGender as $dataShowGender ){
						echo "<option value=\"".$dataShowGender["GenderID"]."\" ". selected(isset($data["MediaCategoryGender"])?$data["MediaCategoryGender"]:0 ,$dataShowGender["GenderID"],false).">".$dataShowGender["GenderTitle"]."</option>";
					}
					echo "</select>";
					echo "<br/>";
		echo "</td>";
		echo "</tr>";
		echo "<td>Order:</td><td><input type=\"text\" name=\"MediaCategoryOrder\" value=\"".(0+(isset($data["MediaCategoryOrder"])?$data["MediaCategoryOrder"]:0))."\" /></td>\n";
		echo "<tr>";
		echo "<td>";
		echo "<p class=\"submit\">\n";
		if(isset($_GET["action"]) =="editRecord"){
			echo "    <input type=\"hidden\" name=\"action\" value=\"editRecord\" />\n";

		} else {
			echo "    <input type=\"hidden\" name=\"action\" value=\"addRecord\" />\n";

		}
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Submit", RBAGENCY_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";
		echo "</td>";
		echo "<tr>";
		echo "<table>";
		echo "</form>\n";
		// All Records
		echo "  <h3 class=\"title\">". __("All Records", RBAGENCY_TEXTDOMAIN) ."</h3>\n";

				/******** Sort Order ************/
				$sort = "";
				if (isset($_GET['sort']) && !empty($_GET['sort'])){
					$sort = $_GET['sort'];
				}
				else {
					$sort = "MediaCategoryOrder";
				}

				/******** Direction ************/
				$dir = "";
				if (isset($_GET['dir']) && !empty($_GET['dir'])){
					$dir = $_GET['dir'];
					if ($dir == "desc" || !isset($dir) || empty($dir)){
						$sortDirection = "asc";
						} else {
						$sortDirection = "desc";
					}
				} else {
						$sortDirection = "desc";
						$dir = "asc";
				}

		echo "<form method=\"post\" action=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;ConfigID=6\">\n";
		echo "<table cellspacing=\"0\" class=\"widefat fixed\">\n";
		echo "<thead>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\"manage-column column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=MediaCategoryTitle&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=MediaCategoryFileType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("File Type", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=MediaCategoryLinkType&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Link Type", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=MediaCategoryGender&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Gender", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "        <th class=\"column\" scope=\"col\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&sort=MediaCategoryOrder&dir=". $sortDirection ."&ConfigID=". $ConfigID ."\">". __("Order", RBAGENCY_TEXTDOMAIN) ."</a></th>\n";
		echo "    </tr>\n";
		echo "</thead>\n";

		echo "<tfoot>\n";
		echo "    <tr class=\"thead\">\n";
		echo "        <th class=\" columnmanage-column cb check-column\" id=\"cb\" scope=\"col\"><input type=\"checkbox\"/></th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Title", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("File Type", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Link Type", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Gender", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "        <th class=\"column\" scope=\"col\">". __("Order", RBAGENCY_TEXTDOMAIN) ."</th>\n";
		echo "    </tr>\n";
		echo "</tfoot>\n";

		echo "<tbody>\n";

		$query = "SELECT * FROM ". table_agency_data_media ." ORDER BY $sort $dir";
		$results = $wpdb->get_results($query, ARRAY_A);
		$count = $wpdb->num_rows;
		foreach ($results as $data) {
			$MediaCategoryID	=$data['MediaCategoryID'];
		echo "    <tr>\n";
		echo "        <th class=\"check-column\" scope=\"row\"><input type=\"checkbox\" class=\"administrator\" id=\"". $MediaCategoryID ."\" name=\"MediaCategoryID[]\" value=\"". $MediaCategoryID ."\" /></th>\n";
		echo "        <th class=\"column\">". stripslashes($data['MediaCategoryTitle']) ."\n";
		echo "          <div class=\"row-actions\">\n";
		echo "            <span class=\"edit\"><a href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;action=editRecord&amp;MediaCategoryID=". $MediaCategoryID."&amp;ConfigID=6\" title=\"". __("Edit this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Edit", RBAGENCY_TEXTDOMAIN) . "</a> | </span>\n";
		echo "            <span class=\"delete\"><a class=\"submitdelete\" href=\"". admin_url("admin.php?page=". $_GET['page']) ."&amp;deleteRecord&amp;MediaCategoryID=". $MediaCategoryID ."&amp;ConfigID=6\"  onclick=\"if ( confirm('". __("You are about to delete this ", RBAGENCY_TEXTDOMAIN) . ".\'". __("Cancel", RBAGENCY_TEXTDOMAIN) . "\' ". __("to stop", RBAGENCY_TEXTDOMAIN) . ", \'". __("OK", RBAGENCY_TEXTDOMAIN) . "\' ". __("to delete", RBAGENCY_TEXTDOMAIN) . ".') ) {return true;}return false;\" title=\"". __("Delete this Record", RBAGENCY_TEXTDOMAIN) . "\">". __("Delete", RBAGENCY_TEXTDOMAIN) . "</a> </span>\n";
		echo "          </div>\n";
		echo "        </th>\n";
		echo "        <th class=\"column\">". stripslashes($data['MediaCategoryFileType']) ."</th>\n";
		echo "        <th class=\"column\">". stripslashes($data['MediaCategoryLinkType']) ."</th>\n";

		$queryGender = "SELECT GenderID, GenderTitle FROM ".table_agency_data_gender." WHERE GenderID='%s'"; 
		$fetchGender = $wpdb->get_row($wpdb->prepare( $queryGender,$data['MediaCategoryGender']),ARRAY_A,0 	);
		$countGender = $wpdb->num_rows;
		if($countGender > 0){
			echo "        <th class=\"column\">".$fetchGender["GenderTitle"]."</th>\n";
		} else {
			echo "        <th class=\"column\">All Gender</th>\n";
		}
		echo "        <th class=\"column\">"; echo $data["MediaCategoryOrder"]; echo "</th>\n";
		echo "    </tr>\n";
		}

		if ($count < 1) {
		echo "    <tr>\n";
		echo "        <td class=\"check-column\" scope=\"row\"></th>\n";
		echo "        <td class=\"column\" colspan=\"5\"><p>". __("There aren't any records loaded yet", RBAGENCY_TEXTDOMAIN) . "!</p></td>\n";
		echo "    </tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
		echo "<p class=\"submit\">\n";
		echo "    <input type=\"hidden\" name=\"action\" value=\"deleteRecord\" />\n";
		echo "    <input type=\"submit\" name=\"submit\" value=\"". __("Delete", RBAGENCY_TEXTDOMAIN) . "\" class=\"button-primary\" />\n";
		echo "</p>\n";

		echo "</form>\n";
 
 echo "</div>\n";






}

//manage counrty and states
elseif ($ConfigID == 99) {

	if ($_REQUEST['action'] == "uninstall") {
		echo "	<h3>Uninstalling...</h3>\n";
		return RBAgency_Admin::uninstall();
	} else {
		// Show Confirmation
		echo "	<h3>Uninstall</h3>\n";
		echo "	<div>Are you sure you want to uninstall?</div>\n";
		echo "	<div><a href=\"?page=". $_GET["page"] ."&ConfigID=99&action=uninstall\">Yes! Uninstall</a></div>\n";

	}
}	// End
echo "</div>\n";
?>
