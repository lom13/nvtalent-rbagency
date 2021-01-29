<?php 
$rb_agency_options_arr = get_option('rb_agency_options');
	$rb_agency_option_agencyname = $rb_agency_options_arr['rb_agency_option_agencyname'];
	$rb_agency_option_agencylogo = !empty($rb_agency_options_arr['rb_agency_option_agencylogo'])?$rb_agency_options_arr['rb_agency_option_agencylogo']:""; // get_bloginfo("url")."/wp-content/plugins/rb-agency/assets/img/logo_example.jpg"
	$rb_agency_option_adminprint_hidden = isset($rb_agency_options_arr['rb_agency_option_adminprint_hidden'])?$rb_agency_options_arr['rb_agency_option_adminprint_hidden']:0;
global $wpdb;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php bloginfo('name'); ?> | Print</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Robots" content="noindex, nofollow" />
	<link rel="stylesheet" type="text/css" media="screen, print" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />
	<script language="Javascript1.2">
		<!--
		function printpage() {
			window.print();
		}
		//-->
	</script>
	<style type="text/css">
		table td {
			border: 1px solid #e1e1e1;
			vertical-align: top;
		}
		.profile-print {
			position: relative;
		}
		.profile-print td {
			/*width: 50%;*/
		}.profile-print td .box {
			padding: 10px;
		}.profile-print .profile-pic {
			width: 30%;
			float: left;
		}.profile-print .profile-pic img {
			max-width: 100%;
			vertical-align: top;
		}.profile-print .info {
			width: 65%;
			float: left;
			word-wrap: break-word;
		}

		#print_logo {
			float: left;
			max-height: 100px;
			width: 50%;
		}
		#print_actions {
			float: right;
		}

		#fullpage table td {
			border: none;
		}
		#fullpage .box {
			height: 860px;
			overflow: hidden;
		}
		#fullpage #print_actions {
			top: 15px;
			right: 15px;
			z-index: 2;
			position: absolute;
		}
		#fullpage .name {
			font-size: 42px;
			margin-top: 15px;
			margin-bottom: 5px;
		}
		#fullpage .print_logo {
			/*width: 100%;
			text-align: center;
			margin-bottom: 15px;*/
		}
		#fullpage .print_logo img {
			max-height: 64px;
		}
		#fullpage td {
		}
		#fullpage .profile-pic {
			width: 55%;
			float: left;
			height: 628px;
			overflow: hidden;
		}
		#fullpage .info {
			width: 40%;
			float: right;
			font-size: x-large;
		}
		#fullpage .photos {
			clear: both;
			margin-top: 15px;
			overflow: hidden;
		}#fullpage .photos img {
			margin: 10px 10px 0 0;
			max-width: 129px;
		}

		#photos .profile-pic {
			width: 200px;
		}
	</style>
</head>

<?php
$layout_class = "";
if ($_GET['cD'] == "0") {
	$layout_class = "photos";
} elseif ($_GET['cD'] == "1") {
	$layout_class = "details";
} else {
	$layout_class = "fullpage";
}
?>
<body onload="printpage()" style="background: #fff;">
	<div id="<?php echo $layout_class; ?>">
		<?php if ($_GET['cD'] != 2) : ?>
		<div id="print_logo">
			<?php
			if (!empty($rb_agency_option_agencylogo)) {
				?><img src="<?php echo $rb_agency_option_agencylogo; ?>" title="<?php echo $rb_agency_option_agencyname; ?>" /><?php
			} else {
				echo "<h3>". $rb_agency_option_agencyname ."</h3>";
			}
			?>
		</div>
		<?php endif; ?>
			<div id="print_actions">
				<a href="#" onclick="printpage();">Print</a> | <a href="javascript:window.opener='x';window.close();">Close</a>
			</div>
			<div style="clear: both;"></div>
		<?php

		global $wpdb;
		$hasQuery = false;

		// Set Casting Cart Session
		if ($_GET['action'] == "quickPrint") {
			$hasQuery = true;
			extract($_SESSION);
			foreach($_SESSION as $key=>$value) {
				$$key = $value;
			}

			// Filter
			$filter = " WHERE profile.ProfileID = media.ProfileID AND media.ProfileMediaType = \"Image\" AND media.ProfileMediaPrimary = 1";
			if(isset($_GET['id']) && $_GET['id']){
				$filter .= " AND profile.ProfileID IN (".$_GET['id'].") "; 
			}
			// Name
			if ((isset($ProfileContactNameFirst) && !empty($ProfileContactNameFirst)) || isset($ProfileContactNameLast) && !empty($ProfileContactNameLast)){
				if (isset($ProfileContactNameFirst) && !empty($ProfileContactNameFirst)){
				$filter .= " AND profile.ProfileContactNameFirst='". $ProfileContactNameFirst ."'";
				}
				if (isset($ProfileContactNameLast) && !empty($ProfileContactNameLast)){
				$filter .= " AND profile.ProfileContactNameLast='". $ProfileContactNameLast ."'";
				}
			}
			// Location
			if (isset($ProfileLocationCity) && !empty($ProfileLocationCity)){
				$filter .= " AND profile.ProfileLocationCity='". $ProfileLocationCity ."'";
			}
			// Type
			if (isset($ProfileType) && !empty($ProfileType)){
				if ($ProfileType == "Model") {
					$selectedIsModel = " selected";
					$filter .= " AND profile.ProfileIsModel='1'";
				} elseif ($ProfileType == "Talent") {
					$selectedIsTalent = " selected";
					$filter .= " AND profile.ProfileIsTalent='1'";
				}
			}
			// Active
			if (isset($ProfileIsActive)){
				if ($ProfileIsActive == "1") {
					$selectedActive = "active";
					$filter .= " AND profile.ProfileIsActive=1";
				} elseif ($ProfileIsActive == "0") {
					$selectedActive = "inactive";
					$filter .= " AND profile.ProfileIsActive=0";
				}
			} else {
				$selectedActive = "";
			}
			// Gender
			if (isset($ProfileGender) && !empty($ProfileGender)){
				$filter .= " AND profile.ProfileGender='".$ProfileGender."'";
			} else {
				$ProfileGender = "";
			}
			// Race
			if (isset($ProfileStatEthnicity) && !empty($ProfileStatEthnicity)){
				$filter .= " AND profile.ProfileStatEthnicity='". $ProfileStatEthnicity ."'";
			}
			// Skin
			if (isset($ProfileStatSkinColor) && !empty($ProfileStatSkinColor)){
				$filter .= " AND profile.ProfileStatSkinColor='". $ProfileStatSkinColor ."'";
			}
			// Eye
			if (isset($ProfileStatEyeColor) && !empty($ProfileStatEyeColor)){
				$filter .= " AND profile.ProfileStatEyeColor='". $ProfileStatEyeColor ."'";
			}
			// Hair
			if (isset($ProfileStatHairColor) && !empty($ProfileStatHairColor)){
				$filter .= " AND profile.ProfileStatHairColor='". $ProfileStatHairColor ."'";
			}
			// Height
			if (isset($ProfileStatHeight_min) && !empty($ProfileStatHeight_min)){
				$filter .= " AND profile.ProfileStatHeight >= '". $ProfileStatHeight_min ."'";
			}
			if (isset($ProfileStatHeight_max) && !empty($ProfileStatHeight_max)){
				$filter .= " AND profile.ProfileStatHeight <= '". $ProfileStatHeight_max ."'";
			}
			// Weight
			if (isset($ProfileStatWeight_min) && !empty($ProfileStatWeight_min)){
				$filter .= " AND profile.ProfileStatWeight >= '". $ProfileStatWeight_min ."'";
			}
			if (isset($ProfileStatWeight_max) && !empty($ProfileStatWeight_max)){
				$filter .= " AND profile.ProfileStatWeight <= '". $ProfileStatWeight_max ."'";
			}
			// Bust/Chest
			if (isset($ProfileStatBust_min) && !empty($ProfileStatBust_min)){
				$filter .= " AND profile.ProfileStatBust >= '". $ProfileStatBust_min ."'";
			}
			if (isset($ProfileStatBust_max) && !empty($ProfileStatBust_max)){
				$filter .= " AND profile.ProfileStatBust <= '". $ProfileStatBust_max ."'";
			}
			// Waist
			if (isset($ProfileStatWaist_min) && !empty($ProfileStatWaist_min)){
				$filter .= " AND profile.ProfileStatWaist >= '". $ProfileStatWaist_min ."'";
			}
			if (isset($ProfileStatWaist_max) && !empty($ProfileStatWaist_max)){
				$filter .= " AND profile.ProfileStatWaist <= '". $ProfileStatWaist_max ."'";
			}
			// Hip
			if (isset($ProfileStatHip_min) && !empty($ProfileStatHip_min)){
				$filter .= " AND profile.ProfileStatHip >= '". $ProfileStatHip_min ."'";
			}
			if (isset($ProfileStatHip_max) && !empty($ProfileStatHip_max)){
				$filter .= " AND profile.ProfileStatHip <= '". $ProfileStatHip_max ."'";
			}
			// Age
			$timezone_offset = -10; // Hawaii Time
			$dateInMonth = gmdate('d', time() + $timezone_offset *60 *60);
			$format = 'Y-m-d';
			$date = gmdate($format, time() + $timezone_offset *60 *60);
			if (isset($ProfileDateBirth_min) && !empty($ProfileDateBirth_min)){
				$selectedYearMin = date($format, strtotime('-'. $ProfileDateBirth_min .' year'. $date));
				$filter .= " AND profile.ProfileDateBirth <= '$selectedYearMin'";
			}
			if (isset($ProfileDateBirth_max) && !empty($ProfileDateBirth_max)){
				$selectedYearMax = date($format, strtotime('-'. $ProfileDateBirth_max-1 .' year'. $date));
				$filter .= " AND profile.ProfileDateBirth >= '$selectedYearMax'";
			}

			// Filter Models Already in Cart
			if (isset($_SESSION['cartArray'])) {
				$cartArray = $_SESSION['cartArray'];
				$cartString = implode(",", $cartArray);
				$filter .=  " AND profile.ProfileID NOT IN (". $cartString .")";
			}

			// Show Cart
			$query = "SELECT * FROM ". table_agency_profile ." profile, ". table_agency_profile_media ." media $filter  GROUP BY  profile.ProfileID ORDER BY profile.ProfileContactDisplay ASC";
			$results = $wpdb->get_results($query,ARRAY_A);// or die ( __("Error, query failed", RBAGENCY_TEXTDOMAIN ));
			//$wpdb->show_errors();
			//$wpdb->print_error();
			$count =  count($results);
			if ($count < 1) {
				echo "There are currently no profiles in the casting cart.";
				$hasQuery = false;
			}

		// Call Casting Cart Session
		} elseif (($_GET['action'] == "castingCart") && (isset($_SESSION['cartArray']))) {
			$cartArray = $_SESSION['cartArray'];
			$cartString = implode(",", $cartArray);
			$hasQuery = true;


			// Show Cart
			$query = "SELECT * FROM ". table_agency_profile ." profile, ". table_agency_profile_media ." media WHERE profile.ProfileID = media.ProfileID AND media.ProfileMediaType = \"Image\" AND media.ProfileMediaPrimary = 1 AND profile.ProfileID IN (". $cartString .") ORDER BY profile.ProfileContactDisplay ASC";
			$results = $wpdb->get_results($query,ARRAY_A) or die ( __("Error, query failed", RBAGENCY_TEXTDOMAIN ));
			$count = count($results);

			if ($count < 1) {
				echo "There are currently no profiles in the casting cart.";
				$hasQuery = false;
			}
		} else {
			echo "<p>Nothing to display.  <a href=\"javascript:window.opener='x';window.close();\">Close</a></div></p>";
			$hasQuery = false;
		}

		if ($hasQuery) {
		echo "<table class=\"profile-print\">";

			$ii = 0;
			foreach($results as $data) {


				if($_GET['cD'] == "2") {
					echo "<tr>";
				} else {
					$ii++;
					if ($ii % 3 == 1) {
					echo "<tr>";
					}
				}

				echo "<td>";

				if (1 == 1) {

					echo "<div class=\"box\">";

					/*
					 * Option 0
					 */
					if ($_GET['cD'] == "0") {
						echo " <div class=\"profile-pic\"><img src=\"". RBAGENCY_UPLOADDIR ."". $data["ProfileGallery"] ."/". $data["ProfileMediaURL"] ."\" width=\"150\"/></div>\n";
					}


					/*
					 * Option 1
					 */
					if ($_GET['cD'] == "1") {

						echo " <div class=\"profile-pic\"><img src=\"". RBAGENCY_UPLOADDIR ."". $data["ProfileGallery"] ."/". $data["ProfileMediaURL"] ."\" /></div>\n";
						echo " <div class=\"info\">";

						$ProfileID = $data['ProfileID'];
						echo "	<h2 style=\"margin-top: 15px; \">". stripslashes($data['ProfileContactNameFirst']) ." ". stripslashes($data['ProfileContactNameLast']) . "</h2>"; 
						// Hide private information from print
						if ($rb_agency_option_adminprint_hidden == 1 && current_user_can('edit_pages')) {
							if (!empty($data['ProfileContactEmail'])) {
								echo "<div><strong>Email:</strong> ". $data['ProfileContactEmail'] ."</div>\n";
							}
							if (!empty($data['ProfileLocationStreet'])) {
								echo "<div><strong>Address:</strong> ". $data['ProfileLocationStreet'] ."</div>\n";
							}
							if (!empty($data['ProfileLocationCity']) || !empty($data['ProfileLocationState'])) {
								echo "<div><strong>Location:</strong> ". $data['ProfileLocationCity'] .", ". get_state_by_id($data['ProfileLocationState']) ." ". $data['ProfileLocationZip'] ."</div>\n";
							}
							if (!empty($data['ProfileLocationCountry'])) {
								echo "<div><strong>". __("Country", RBAGENCY_TEXTDOMAIN) .":</strong> ". rb_agency_getCountryTitle($data['ProfileLocationCountry']) ."</div>\n";
							}
							if (!empty($data['ProfileDateBirth'])) {
								echo "<div><strong>". __("Age", RBAGENCY_TEXTDOMAIN) .":</strong> ". rb_agency_get_age($data['ProfileDateBirth']) ."</div>\n";
							}
							if (!empty($data['ProfileDateBirth'])) {
								echo "<div><strong>". __("Birthdate", RBAGENCY_TEXTDOMAIN) .":</strong> ". $data['ProfileDateBirth'] ."</div>\n";
							}
							if (!empty($data['ProfileContactWebsite'])) {
								echo "<div><strong>". __("Website", RBAGENCY_TEXTDOMAIN) .":</strong> ". $data['ProfileContactWebsite'] ."</div>\n";
							}
							if (!empty($data['ProfileContactPhoneHome'])) {
								echo "<div><strong>". __("Phone Home", RBAGENCY_TEXTDOMAIN) .":</strong> ". $data['ProfileContactPhoneHome'] ."</div>\n";
							}
							if (!empty($data['ProfileContactPhoneCell'])) {
								echo "<div><strong>". __("Phone Cell", RBAGENCY_TEXTDOMAIN) .":</strong> ". $data['ProfileContactPhoneCell'] ."</div>\n";
							}
							if (!empty($data['ProfileContactPhoneWork'])) {
								echo "<div><strong>". __("Phone Work", RBAGENCY_TEXTDOMAIN) .":</strong> ". $data['ProfileContactPhoneWork'] ."</div>\n";
							}
						}
						/*
						//$resultsCustomPrivate =  $wpdb->get_results($wpdb->prepare("SELECT c.ProfileCustomID,c.ProfileCustomTitle, c.ProfileCustomOrder, c.ProfileCustomView, cx.ProfileCustomValue FROM ". table_agency_customfield_mux ." cx LEFT JOIN ". table_agency_customfields ." c ON c.ProfileCustomID = cx.ProfileCustomID WHERE c.ProfileCustomView = 0 AND cx.ProfileID = %d GROUP BY cx.ProfileCustomID ORDER BY c.ProfileCustomOrder DESC", $ProfileID ));
						//foreach  ($resultsCustomPrivate as $resultCustomPrivate) {
						//	echo "				<div><strong>". $resultCustomPrivate->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". $resultCustomPrivate->ProfileCustomValue ."</div>\n";
						//}
							 */
						//$resultsCustomPrivate =  $wpdb->get_results($wpdb->prepare("SELECT c.ProfileCustomID,c.ProfileCustomTitle, c.ProfileCustomOrder, c.ProfileCustomView, cx.ProfileCustomValue FROM ". table_agency_customfield_mux ." cx LEFT JOIN ". table_agency_customfields ." c ON c.ProfileCustomID = cx.ProfileCustomID WHERE c.ProfileCustomView = 0 AND cx.ProfileID = %d GROUP BY cx.ProfileCustomID ORDER BY c.ProfileCustomOrder DESC", $ProfileID ));
						//foreach  ($resultsCustomPrivate as $resultCustomPrivate) {
						//	echo "				<div><strong>". $resultCustomPrivate->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". $resultCustomPrivate->ProfileCustomValue ."</div>\n";
						//}
							/*$resultsCustomPrivate =  $wpdb->get_results($wpdb->prepare("SELECT c.ProfileCustomID,c.ProfileCustomTitle, c.ProfileCustomOrder, c.ProfileCustomView, cx.ProfileCustomValue FROM ". table_agency_customfield_mux ." cx LEFT JOIN ". table_agency_customfields ." c ON c.ProfileCustomID = cx.ProfileCustomID WHERE c.ProfileCustomView = 0 AND cx.ProfileID = %d GROUP BY cx.ProfileCustomID ORDER BY c.ProfileCustomOrder DESC", $ProfileID ));
							foreach  ($resultsCustomPrivate as $resultCustomPrivate) {
								if (!empty($resultCustomPrivate->ProfileCustomValue)) {
									echo "<div><strong>". $resultCustomPrivate->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". $resultCustomPrivate->ProfileCustomValue ."</div>\n";
								}
							}*/

						// Show Private Fields
						$resultsCustomPrivate =  $wpdb->get_results($wpdb->prepare("SELECT c.ProfileCustomID,c.ProfileCustomTitle, c.ProfileCustomOrder, c.ProfileCustomView, cx.ProfileCustomValue FROM ". table_agency_customfield_mux ." cx LEFT JOIN ". table_agency_customfields ." c ON c.ProfileCustomID = cx.ProfileCustomID WHERE c.ProfileCustomView = 1 AND cx.ProfileID = %d GROUP BY cx.ProfileCustomID ORDER BY c.ProfileCustomOrder DESC", $ProfileID ));
						foreach  ($resultsCustomPrivate as $resultCustomPrivatePrivate) {
							if(!empty($resultCustomPrivate->ProfileCustomValue ) || !empty($resultCustomPrivate->ProfileCustomDateValue )){
								if($resultCustomPrivate->ProfileCustomType == 10){
									echo "<div><strong>". $resultCustomPrivate->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". date("F d, Y",strtotime(stripcslashes($resultCustomPrivate->ProfileCustomDateValue))) ."</div>\n";
								} else {
									echo "<div><strong>". $resultCustomPrivate->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". stripcslashes($resultCustomPrivate->ProfileCustomValue) ."</div>\n";
								}
							}
						}

						// Show Custom Fields
						$resultsCustom = $wpdb->get_results($wpdb->prepare("SELECT c.ProfileCustomID,c.ProfileCustomTitle, c.ProfileCustomOrder, c.ProfileCustomView, cx.ProfileCustomValue,cx.ProfileCustomDateValue, c.ProfileCustomType FROM ". table_agency_customfield_mux ." cx LEFT JOIN ". table_agency_customfields ." c ON c.ProfileCustomID = cx.ProfileCustomID WHERE c.ProfileCustomView = 0 AND cx.ProfileID = %d GROUP BY cx.ProfileCustomID ORDER BY c.ProfileCustomOrder ASC",$ProfileID ));
						foreach  ($resultsCustom as $resultCustom) {
							if(!empty($resultCustom->ProfileCustomValue ) || !empty($resultCustom->ProfileCustomDateValue )){
								if($resultCustom->ProfileCustomType == 10){
									echo "<div><strong>". $resultCustom->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". date("F d, Y",strtotime(stripcslashes($resultCustom->ProfileCustomDateValue))) ."</div>\n";
								} else {
									echo "<div><strong>". $resultCustom->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". stripcslashes($resultCustom->ProfileCustomValue) ."</div>\n";
								}
							}
						}

					}// End Private Fields


					/*
					 * Option 2 "Quick Print - One Profile per Page"
					 */
					$profile_image = "";
					if ($_GET['cD'] == "2") {

						echo "<div class=\"print_logo\">";
							if(!empty($rb_agency_option_agencylogo)) {
								echo "<img src=\"". $rb_agency_option_agencylogo."\" title=\"". $rb_agency_option_agencyname."\" />";
							} else {
								echo "<h3>". $rb_agency_option_agencyname ."</h3>";
							}
						echo "</div>";

						$ProfileID = $data['ProfileID'];
						$profile_image = basename($data["ProfileMediaURL"]);
						echo "	<h2 class=\"name\">". stripslashes($data['ProfileContactNameFirst']) ." ". stripslashes($data['ProfileContactNameLast']) . "</h2>"; 

						echo " <div class=\"profile-pic\">";

						$image_path = RBAGENCY_UPLOADDIR . $data["ProfileGallery"] ."/". $data['ProfileMediaURL'];
						$bfi_params = array(
							'crop'=>true,
							'height'=>475
						);
						$image_src = bfi_thumb( $image_path, $bfi_params );

						//echo "<img src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=". RBAGENCY_UPLOADDIR ."". $data["ProfileGallery"] ."/". $data["ProfileMediaURL"] ."&h=475\" />";
						echo "<img src=\"". $image_src."\" />\n";
						echo "<br>";
						echo "<div class=\"photos\" >";
							$order = isset( $rb_agency_options_arr['rb_agency_option_galleryorder'])?$rb_agency_options_arr['rb_agency_option_galleryorder']:0;
							$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID, "Image", 99, true);
							$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
							$countImg = $wpdb->num_rows;

							$i = 0;
							foreach($resultsImg as $dataImg ){
								if ($i < 4) {
									$image_path = RBAGENCY_UPLOADDIR . $dataImg["ProfileGallery"] ."/". $dataImg['ProfileMediaURL'];

									if($dataImg['ProfileMediaPrimary'] != 1){
										//echo $dataImg['ProfileMediaURL']."<br>";
										//echo "<img src=\"".$image_src ."\" />\n";
										if($countImg <= 4){
											$imgSize = '&h=120';
										} elseif($countImg > 4){
											$imgSize = '&h=128';
											$width = "width='60'";
										}

										echo "<img ".$width." src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=".RBAGENCY_UPLOADDIR . $data["ProfileGallery"] ."/". $dataImg['ProfileMediaURL'] .$imgSize."\" />\n\n\n";
									}
									//echo "<img src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=".RBAGENCY_UPLOADDIR . $data["ProfileGallery"] ."/". $dataImg['ProfileMediaURL'] ."&h=150\" />\n";
								}
								$i++;
							}
						echo "</div>";
						echo "</div>\n";
						echo " <div class=\"info\">";

							$ProfileID = $data['ProfileID'];
							//echo "	<h2 style=\"margin-top: 15px; \">". stripslashes($data['ProfileContactNameFirst']) ." ". stripslashes($data['ProfileContactNameLast']) . "</h2>"; 

							if (!empty($data['ProfileDateBirth'])) {
								echo "<div><strong>". __("Age", RBAGENCY_TEXTDOMAIN) .":</strong> ". rb_agency_get_age($data['ProfileDateBirth']) ."</div>\n";
							}

							if (!empty($data['ProfileType'])) {
								echo "<div><strong>". __("Classification", RBAGENCY_TEXTDOMAIN) .":</strong> ". retrieve_title($data['ProfileType']) ."</div>\n";
							}

							if (!empty($data['ProfileGender'])) {
								if(RBAgency_Common::profile_meta_gendertitle($data['ProfileGender'])){
									echo "<div><strong>". __("Gender", RBAGENCY_TEXTDOMAIN) .":</strong> ".rb_agency_getGenderTitle($data['ProfileGender'])."</div>\n";
								} else {
									echo "<div><strong>". __("Gender", RBAGENCY_TEXTDOMAIN) .":</strong> --</div>\n";
								}
							}

							// Show Custom Fields
							$resultsCustom = $wpdb->get_results($wpdb->prepare("SELECT c.ProfileCustomID,c.ProfileCustomTitle, c.ProfileCustomOrder, c.ProfileCustomView, cx.ProfileCustomValue,cx.ProfileCustomDateValue, c.ProfileCustomType FROM ". table_agency_customfield_mux ." cx LEFT JOIN ". table_agency_customfields ." c ON c.ProfileCustomID = cx.ProfileCustomID WHERE c.ProfileCustomView = 0 AND cx.ProfileID = %d GROUP BY cx.ProfileCustomID ORDER BY c.ProfileCustomOrder ASC",$ProfileID ));
							foreach  ($resultsCustom as $resultCustom) {
								if(!empty($resultCustom->ProfileCustomValue ) || !empty($resultCustom->ProfileCustomDateValue )){
									if($resultCustom->ProfileCustomType == 10){
										echo "<div><strong>". $resultCustom->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". date("F d, Y",strtotime(stripcslashes($resultCustom->ProfileCustomDateValue))) ."</div>\n";
									} else {
										echo "<div><strong>". $resultCustom->ProfileCustomTitle ."<span class=\"divider\">:</span></strong> ". stripcslashes($resultCustom->ProfileCustomValue) ."</div>\n";
									}
								}
							}

						echo "</div>";
						echo "<div style=\"clear:both\"></div>";
						echo "<p style=\"text-align: center;\">Property of ".$rb_agency_option_agencyname.". All rights reserved.</p>";
					}


						echo " </div>";
						echo " <div style=\"clear: both; text-align: center;\">\n";
					} else {
						echo "	<h2 style=\"text-align: center; margin-top: 30px; \">". stripslashes($data['ProfileContactNameFirst']) ." ". stripslashes($data['ProfileContactNameLast'])  . "</h2>"; 
					}

					echo " </div>";
				}// elseif (layout style is another value......) {

				echo "</td>";

				if($_GET['cD'] == "2") {
					echo "<tr>";
				} else {
					if( $ii % 3==0){
						echo "</tr>";
					}
				}

			}
			echo "<div style=\"clear: both;\"></div>";
		echo "</table>";

		?>
	</div> <!-- #print_wrapper -->
</body>
</html>
