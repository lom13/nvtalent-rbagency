<?php
/*
Title:  Print Photos & Print Polaroids
Author: RB Plugin
Text:   Profile View with Thumbnails, Primary Image, Print Photos & Print Polaroids
*/

/*
 * Insert Javascript into Head
 */
	wp_register_style( 'rblayout-style', RBAGENCY_PLUGIN_URL .'view/layout/01/css/style.css' );
	wp_enqueue_style( 'rblayout-style' );
/*
 * Layout 
 */

$profileURLString = get_query_var('target'); //$_REQUEST["profile"];
$urlexploade = explode("/", $profileURLString);

if (isset($urlexploade[1])){
	$subview = $urlexploade[1];
} else {
	$subview = "";
}


# rb_agency_option_galleryorder
$rb_agency_options_arr = get_option('rb_agency_options');
	$order = isset($rb_agency_options_arr['rb_agency_option_galleryorder'])?$rb_agency_options_arr['rb_agency_option_galleryorder']:0;
$rb_agency_option_unittype = isset($rb_agency_options_arr['rb_agency_option_unittype'])?$rb_agency_options_arr['rb_agency_option_unittype']:0;


echo "	<div id=\"rbprofile\">\n";
echo "		<div id=\"rblayout-one\" class=\"rblayout\">\n";
echo "			<div class=\"rbcol-12 rbcolumn\">\n";
echo "				<header class=\"entry-header\">";
echo "					<h1 class=\"entry-title\">". $ProfileContactDisplay ."</h1>";
echo "				</header>";
echo "			</div>\n"; // .rbcol-12
echo "			<div class=\"rbcol-4 rbcolumn\">\n";
echo "				<div id=\"profile-picture\"  class=\"lightbox-enabled\">\n";

						// images
						$queryImg = "SELECT * FROM ". table_agency_profile_media ." media WHERE ProfileID = %d AND ProfileMediaType = \"Image\" AND ProfileMediaPrimary = 1 LIMIT 1";
						$resultsImg = $wpdb->get_results($wpdb->prepare($queryImg, $ProfileID),ARRAY_A);
						$countImg = $wpdb->num_rows;

						foreach($resultsImg as $dataImg){
							echo "<a href=\"". RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."\" rel=\"lightbox-profile". $ProfileID ."\"><img src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=".RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."&w=400\" /></a>\n";
						}
						if($countImg == 0){
							echo "<img src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=". get_bloginfo("url")."/wp-content/plugins/rb-agency/assets/demo-data/Placeholder.jpg&w=400&h=450&a=t\" alt=\"\">\n";
						}

echo "				</div>\n"; // #profile-picture
echo "				<div id=\"soundcloud\">";

						$querySC = "SELECT * FROM ". table_agency_profile_media ." media WHERE ProfileID = %d AND ProfileMediaType = \"SoundCloud\" ORDER BY $orderBy";
						$resultsSC = $wpdb->get_results($wpdb->prepare($querySC, $ProfileID),ARRAY_A);
						$countSC = $wpdb->num_rows;

						if($countSC > 0){
							echo "<h3>SoundCloud</h3>";
							foreach($resultsSC as $dataSC){
								echo RBAgency_Common::rb_agency_embed_soundcloud($dataSC['ProfileMediaURL']);
							}
						}

echo "				</div>";
echo "			</div>\n"; // .rbcol-4

echo "			<div class=\"rbcol-5 rbcolumn\">\n";
echo "				<div id=\"profile-info\">\n";
echo "					<div id=\"stats\">\n";
echo "						<ul>\n";
								if(!empty($ProfileAge)){
									echo "<li class=\"rb_gender\" id=\"rb_age\"><strong>". __("Age", RBAGENCY_TEXTDOMAIN). "<span>:</span></strong> ". __($ProfileAge, RBAGENCY_TEXTDOMAIN). "</li>\n";
								}

								if(!empty($ProfileGender)){
									$fetchGenderData = $wpdb->get_row($wpdb->prepare("SELECT GenderID, GenderTitle FROM ".table_agency_data_gender." WHERE GenderID=%d", $ProfileGender),ARRAY_A,0);
									echo "<li class=\"rb_gender\" id=\"rb_gender\"><strong>". __("Gender", RBAGENCY_TEXTDOMAIN). "<span>:</span></strong> ". __($fetchGenderData["GenderTitle"], RBAGENCY_TEXTDOMAIN). "</li>\n";
								}

								if(!empty($ProfileStatHeight)){
										echo "<li class=\"rb_height\" id=\"rb_height\"><strong>". __("Height", RBAGENCY_TEXTDOMAIN). "<span>:</span></strong> ".rb_get_height($ProfileStatHeight)."</li>\n";
								}

								if(!empty($ProfileStatWeight)){
									if ($rb_agency_option_unittype == 0){ // Metric
										echo "<li class=\"rb_weight\" id=\"rb_weight\"><strong>". __("Weight", RBAGENCY_TEXTDOMAIN). "<span>:</span></strong> ". $ProfileStatWeight ." ". __("kg", RBAGENCY_TEXTDOMAIN). "</li>\n";
									} else { // Imperial
										echo "<li class=\"rb_weight\" id=\"rb_weight\"><strong>". __("Weight", RBAGENCY_TEXTDOMAIN). "<span>:</span></strong> ". $ProfileStatWeight ." ". __("lb", RBAGENCY_TEXTDOMAIN). "</li>\n";
									}
								}

                           		// Insert Custom Fields
								rb_agency_getProfileCustomFields($ProfileID, $ProfileGender);

echo "						</ul>\n"; // Close Stats ul
echo "					</div>\n"; // #stats

echo "				</div>\n"; // #profile-info
echo "			</div>\n";// .rbcol-5

echo "			<div class=\"rbcol-3 rbcolumn\">\n";

					/*
					 * Include Action Icons
					 */
					include (plugin_dir_path(dirname(__FILE__)) .'/partial/include-profile-actions.php');

echo "			</div>\n";// .rbcol-3

echo "			<div class=\"rbcol-12 rbcolumn\">\n";

			          if($subview == ""){
echo "					<div id=\"photos\" class=\"lightbox-enabled profile-photos\">\n";

							// images
							//$queryImg = "SELECT * FROM ". table_agency_profile_media ." media WHERE ProfileID = %d AND ProfileMediaType IN(\"Image\")  AND ProfileMediaPrimary = 0 ORDER BY $orderBy";
							$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID,"Image");
							$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
							$countImg = $wpdb->num_rows;
							foreach($resultsImg as $dataImg ){
									echo "<div class=\"photo\"><a href=\"". RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."\" rel=\"lightbox-profile". $ProfileID ."\"><img src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=".RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."&h=150\" /></a></div>\n";
							}

echo "					</div>\n"; // #photos
					}

					if($subview == "images"){ //show all images page  //MODS 2012-11-28 ?>
						<div id="print-photos" class="profile-photos">
							<script>  //JS to higlight selected images 
								function selectImg(mid){
								//document.getElementById('selected_image').value=mid+"|"+document.getElementById('selected_image').value;

									if(document.getElementById("p" + mid).value == 1){
										img = document.getElementById(mid);
										img.style.filter       = "alpha(opacity=100)";
										img.style.MozOpacity   = "100";
										img.style.opacity      = "100";
										img.style.KhtmlOpacity = "100";
										document.getElementById("p"+mid).value = 0;
									} else {
										document.getElementById("p"+mid).value = 1;
										img = document.getElementById(mid);
										img.style.filter       = "alpha(opacity=25)";
										img.style.MozOpacity   = "0.25";
										img.style.opacity      = "0.25";
										img.style.KhtmlOpacity = "0.25";
									}
								}

								function validateAllImageForm()	{

									if(!jQuery(".allImageCheck").is(":checked")){
										alert("Please select atleast one photo!");
										return false;
									}
									return true;
								}
							</script>

							<p class="allimages_text"><?php echo __("Please select photos to print. Maximum is 100 photos only", RBAGENCY_TEXTDOMAIN)?><br /></p><br />
							<form action="../print-images/" method="post" id="allimageform" onsubmit="return validateAllImageForm()">
								<input type="hidden" id="selected_image" name="selected_image" />

								<?php
								$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID,"Image");
								$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
								$countImg = $wpdb->num_rows;

								foreach($resultsImg as $dataImg ){
									echo '<div class="photo print-photo">';
									echo '	<a class="allimages_print" href="javascript:void(0)" onClick="selectImg('.$dataImg["ProfileMediaID"].')">';
									echo "	<img src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=".RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."&h=150\" alt=\"". $ProfileContactDisplay ."\" /></a>";
									echo "	<div class=\"print-action\"><input class=\"allImageCheck\" type=\"checkbox\" name=\"pdf_image_id[]\" value=\"".$dataImg['ProfileMediaID']."\"><input type='hidden'  name='".$dataImg["ProfileMediaID"]."' id='p".$dataImg["ProfileMediaID"]."'></div>";
									echo "</div>";
								}
								?>

								<br clear="all" />
								<input type="submit" value="Next, Select Print Format" onclick='jQuery("#allimageform").attr("action","../print-images/");'/> or 
								<input type="submit" value="Next, Select PDF Format" onclick='jQuery("#allimageform").attr("action","../print-pdf/");' />
							</form>
						</div><!-- allimages_div-->

					<?php

					} elseif($subview == "polaroids"){ //show all polaroids page  //MODS 2012-11-28 ?>

						<div id="polariods" class="profile-photos">
							<script>  //JS to higlight selected images 
								function selectImg(mid){
									//document.getElementById('selected_image').value=mid+"|"+document.getElementById('selected_image').value;

									if(document.getElementById("p"+mid).value == 1){
										img = document.getElementById(mid);
										img.style.filter       = "alpha(opacity=100)";
										img.style.MozOpacity   = "100";
										img.style.opacity      = "100";
										img.style.KhtmlOpacity = "100";
										document.getElementById("p"+mid).value = 0;
									} else {
										document.getElementById("p"+mid).value = 1;
										img = document.getElementById(mid);
										img.style.filter       = "alpha(opacity=25)";
										img.style.MozOpacity   = "0.25";
										img.style.opacity      = "0.25";
										img.style.KhtmlOpacity = "0.25";
									}
								}
							</script>
							<?php 

							$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID,"Polaroid");
							$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
							$countImg = $wpdb->num_rows;

							if($countImg>0){ ?>
							<form action="../print-polaroids/" method="post" id="allimageform">
								<input type="hidden" id="selected_image" name="selected_image" />

								<?php  
								foreach($resultsImg as $dataImg ){
									echo '<div class="photo">';
									echo '	<a href="'. RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] .'" rel="lightbox-mygallery" class="allimages_print" href="javascript:void(0)">'; // onClick="selectImg('.$dataImg["ProfileMediaID"].')"
									echo "	<img id='".$dataImg["ProfileMediaID"]."' src=\"". get_bloginfo("url")."/wp-content/plugins/rb-agency/ext/timthumb.php?src=".RBAGENCY_UPLOADDIR . $ProfileGallery ."/". $dataImg['ProfileMediaURL'] ."&h=150\" alt='' class='allimages_thumbs' /></a><input type='hidden'  name='".$dataImg["ProfileMediaID"]."' id='p".$dataImg["ProfileMediaID"]."'>\n";
									echo '</div>';
								}
								?> <br clear="all" />

								<!--	<input type="submit" value="Next, Select Print Format" />-->
							</form>

							<?php
							} else { ?>
								<p>Sorry, there is no available polaroid images for this profile.</p>
							<?php
							}
							?>
						</div><!-- allimages_div-->

					<?php

					} else if ($subview == "print-polaroids"){ //show print options

						if(isset($_POST["print_type"])){
							include_once(RBAGENCY_PLUGIN_DIR."theme/pdf-profile.php");
						}

						$queryImg = rb_agency_option_galleryorder_query($orderBy ,$ProfileID,"Polaroid");
						$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
						$countImg = $wpdb->num_rows;

						foreach($resultsImg as $dataImg ){
							if($_POST[$dataImg['ProfileMediaID']] == 1){
								$selected .= "<input type='hidden' value='1' name='".$dataImg['ProfileMediaID']."'>";
								$withSelected = 1;
							}
								$lasID = $dataImg['ProfileMediaID']; //make sure it will display picture even nothing weere selected
						}
						if($withSelected != 1){
							$selected = "<input type='hidden' value='1' name='".$lasID."'>";
						}?>

						<div class="print_options">
							<span class="allimages_text">Select Print Format</span><br /><br />
						</div> 

						<form action="" method="post" target="_blank">
							<?php echo $selected;?>
							<input type="hidden" name="print_type" value="<?php echo $subview;?>" />
							<!-- display options-->

							<div id="polaroids" class="rbcol-8 rbcolumn">

								<div class="rbcol-6 rbcolumn">
									<input type="radio" value="11" name="print_option" checked="checked" /><h3>Four Polaroids Per Page</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-four-per-page.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<div class="rbcol-6 rbcolumn">
									<input type="radio" value="12" name="print_option" /><h3>One Polaroid Per Page</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-one-per-page.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

							</div><!-- polariod -->

							<center>
								<!--<input style="" type="radio" value="5" name="print_option" />&nbsp;Print Division Headshots<br />    -->
								<input type="submit" value="Print Polaroids" name="print_all_images" />
								<input type="submit" value="Download PDF Polaroids" name="pdf_all_images" />
							</center>
						</form>

					<?php

					} else if($subview == "print-pdf"){

						if(isset($_POST["print_type"])){
							include_once(RBAGENCY_PLUGIN_DIR."theme/pdf-profile.php");
						}

						$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID,"Image");
						$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
						$countImg = $wpdb->num_rows;
						$withSelected = 0;
						$selected = "";

						foreach($resultsImg as $dataImg ){

							if(isset($_POST[$dataImg['ProfileMediaID']]) && $_POST[$dataImg['ProfileMediaID']] == 1){
								$selected .= "<input type='hidden' value='1' name='".$dataImg['ProfileMediaID']."'>";
								$withSelected = 1;
							}
							$lasID = $dataImg['ProfileMediaID']; //make sure it will display picture even nothing weere selected
						}

						if($withSelected != 1){
							$selected = "<input type='hidden' value='1' name='".$lasID."'>";
						}?>

						<div class="print_options">
							<span class="allimages_text">Select Print Format</span><br /><br />
						</div> 

						<form action="" method="post">
							<?php echo $selected;?>
							<input type="hidden" name="print_type" value="<?php echo $subview;?>" />
							<!-- display options-->

							<div id="polaroids" class="rbcol-8 rbcolumn">
								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="1" name="print_option" checked="checked" /> Print Large Photos</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-large-photo-with-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="3" name="print_option" /> Print Medium Size Photos</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-medium-photo-with-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->


								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="1-1" name="print_option" /> Print Large Photos Without Model Info</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-large-photo-without-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="3-1" name="print_option" /> Print Medium Size Photos Without Model Info</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-medium-photo-without-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<?php

								if(isset($_POST['pdf_image_id']) && !empty($_POST['pdf_image_id'])){
									if(is_array($_POST['pdf_image_id'])){
										$pdf_image_id = implode(',',$_POST['pdf_image_id']);
									} else {
										$pdf_image_id = $_POST['pdf_image_id'];
									}
								?>
									<input type="hidden" name="pdf_image_id" value="<?php echo($pdf_image_id);?>" />
								<?php
								}
								?>
							</div><!-- polariod -->
							<center>
								<!--<input style="" type="radio" value="5" name="print_option" />&nbsp;Print Division Headshots<br />    -->
								<input type="submit" value="Download PDF" name="pdf_all_images" />
							</center>
						</form>

					<?php
					} else if($subview == "print-images"){ //show print options

						$queryImg = rb_agency_option_galleryorder_query($order ,$ProfileID,"Image");
						$resultsImg = $wpdb->get_results($queryImg,ARRAY_A);
						$countImg = $wpdb->num_rows;
						$withSelected = 0;

						foreach($resultsImg as $dataImg ){
							if(isset($_POST[$dataImg['ProfileMediaID']]) && $_POST[$dataImg['ProfileMediaID']] == 1){
							$selected .= "<input type='hidden' value='1' name='".$dataImg['ProfileMediaID']."'>";
							$withSelected = 1;
							}
							$lasID=$dataImg['ProfileMediaID']; //make sure it will display picture even nothing weere selected
						}

						if($withSelected != 1){$selected = "<input type='hidden' value='1' name='".$lasID."'>"; }
						?>

						<div class="print_options">
							<span class="allimages_text">Select Print Format</span><br /><br />
						</div> 

						<form action="" method="post" target="_blank">
							<?php echo $selected;?>
							<input type="hidden" name="print_type" value="<?php echo $subview;?>" />
							<!-- display options-->

							<div id="polaroids" class="rbcol-8 rbcolumn">
								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="1" name="print_option" checked="checked" /> Print Large Photos</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-large-photo-with-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="3" name="print_option" /> Print Medium Size Photos</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-medium-photo-with-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->


								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="1-1" name="print_option" /> Print Large Photos Without Model Info</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-large-photo-without-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<div class="rbcol-6 rbcolumn">
									<h3><input type="radio" value="3-1" name="print_option" /> Print Medium Size Photos Without Model Info</h3>
									<div class="polaroid">
										<img src="<?php echo get_bloginfo("url");?>/wp-content/plugins/rb-agency/view/layout/06/images/polariod-medium-photo-without-model-info.png" alt="" />
									</div><!-- polariod -->
								</div><!-- .six .rbcolumn -->

								<?php
									if(isset($_POST['pdf_image_id'])){
										$pdf_image_id = implode(',',$_POST['pdf_image_id']);
								?>
									<input type="hidden" name="pdf_image_id" value="<?php echo($pdf_image_id);?>" />
								<?php
									}
								?>


							</div><!-- polariod -->
							<center>
								<!--<input style="" type="radio" value="5" name="print_option" />&nbsp;Print Division Headshots<br />    -->
								<input type="submit" value="Print Pictures" name="print_all_images" />&nbsp;
							</center>
						</form>
					<?php
					}

echo "				<div class=\"rbclear\"></div>\n"; // Clear All
echo "			</div>\n"; // .rbcol-12

echo "			<div class=\"rbclear\"></div>\n"; // Clear All
echo "		</div>\n";// Close Profile Layout
echo "	</div>\n";// Close Profile
echo "	<div class=\"rbclear\"></div>\n"; // Clear All