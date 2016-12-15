<?php

$ftsf_contact_settings = get_option('ftsf_contact_settings');
$field1 = isset($ftsf_contact_settings['ftsf_company_name_field']) ? $ftsf_contact_settings['ftsf_company_name_field'] : '';
$field2 = isset($ftsf_contact_settings['ftsf_contact_name_field']) ? $ftsf_contact_settings['ftsf_contact_name_field'] : '';
$field3 = isset($ftsf_contact_settings['ftsf_contact_email_field']) ? $ftsf_contact_settings['ftsf_contact_email_field'] : '';
$field4 = isset($ftsf_contact_settings['ftsf_contact_mobile_field']) ? $ftsf_contact_settings['ftsf_contact_mobile_field'] : '';
$field5 = isset($ftsf_contact_settings['ftsf_contact_skype_field']) ? $ftsf_contact_settings['ftsf_contact_skype_field'] : '';
$field6 = isset($ftsf_contact_settings['ftsf_contact_address_field']) ? $ftsf_contact_settings['ftsf_contact_address_field'] : '';
$field7 = isset($ftsf_contact_settings['ftsf_contact_facebook_field']) ? $ftsf_contact_settings['ftsf_contact_facebook_field'] : '';
$field8 = isset($ftsf_contact_settings['ftsf_contact_twitter_field']) ? $ftsf_contact_settings['ftsf_contact_twitter_field'] : '';
$field9 = isset($ftsf_contact_settings['ftsf_contact_google_field']) ? $ftsf_contact_settings['ftsf_contact_google_field'] : '';
$field0 = isset($ftsf_contact_settings['ftsf_contact_linkedin_field']) ? $ftsf_contact_settings['ftsf_contact_linkedin_field'] : '';
?>


   <?php if(($field1 != '' && $field1 == __('enabled', 'ftsf')) || 
            ($field2 != '' && $field2 == __('enabled', 'ftsf')) || 
            ($field3 != '' && $field3 == __('enabled', 'ftsf')) || 
            ($field4 != '' && $field4 == __('enabled', 'ftsf')) || 
            ($field5 != '' && $field5 == __('enabled', 'ftsf')) || 
            ($field6 != '' && $field6 == __('enabled', 'ftsf')) || 
            ($field7 != '' && $field7 == __('enabled', 'ftsf')) || 
            ($field8 != '' && $field8 == __('enabled', 'ftsf')) || 
            ($field9 != '' && $field9 == __('enabled', 'ftsf')) || 
            ($field0 != '' && $field0 == __('enabled', 'ftsf'))) { ?>

            	<!-- Just showing how it should look may be; Should be linked with js & css @Lungelo + @nathaan -->
				<section id="mySidenav" class="sidenav">
				    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				    <div class="contact-section">
				        <div class="contact-content">
				        <p class="contact-title">Contact us</p>
				        <form>
				            <div>
					            <?php if($field1 != '' && $field1 == __('enabled', 'ftsf')) { ?>
					            <!-- Check if admin has allowed a particular field if yes display it else not shown to user -->
					               	<div>
					                    <label>
					                    	<?php
					                    	/* Check what value the Admin would like to be displayed
					                    	 * as label and display it else display the default
					                    	 */ 
					                    	if($field1 != ''){ echo ($field1); }   
					                    	else { echo ('User Name'); }
					                    	?>
					                    </label>
					                    <input type="text" >
					                </div>
					            <?php } ?>


					            <?php if($field2 != '' && $field2 == __('enabled', 'ftsf')) { ?>
					            <!-- Check if admin has allowed a particular field if yes display it else not shown to user -->
					               	<div>
					                    <label>
					                    	<?php
					                    	/* Check what value the Admin would like to be displayed
					                    	 * as label and display it else display the default
					                    	 */ 
					                    	if($field2 != ''){ echo ($field2); }   
					                    	else { echo ('Company'); }
					                    	?>
					                    </label>
					                    <input type="text" >
					                </div>
					            <?php } ?>


					            <?php if($field3 != '' && $field3 == __('enabled', 'ftsf')) { ?>
					            <!-- Check if admin has allowed a particular field if yes display it else not shown to user -->
					               	<div>
					                    <label>
					                    	<?php
					                    	/* Check what value the Admin would like to be displayed
					                    	 * as label and display it else display the default
					                    	 */ 
					                    	if($field3 != ''){ echo ($field3); }   
					                    	else { echo ('E-mail'); }
					                    	?>
					                    </label>
					                    <input type="text" >
					                </div>
					            <?php } ?>


					            <?php if($field4 != '' && $field4 == __('enabled', 'ftsf')) { ?>
					            <!-- Check if admin has allowed a particular field if yes display it else not shown to user -->
					               	<div>
					                    <label>
					                    	<?php
					                    	/* Check what value the Admin would like to be displayed
					                    	 * as label and display it else display the default
					                    	 */ 
					                    	if($field4 != ''){ echo ($field4); }   
					                    	else { echo ('Mobile'); }
					                    	?>
					                    </label>
					                    <input type="text" >
					                </div>
					            <?php } ?>


					            <?php if($field5 != '' && $field5 == __('enabled', 'ftsf')) { ?>
					            <!-- Check if admin has allowed a particular field if yes display it else not shown to user -->
					               	<div>
					                    <label>
					                    	<?php
					                    	/* Check what value the Admin would like to be displayed
					                    	 * as label and display it else display the default
					                    	 */ 
					                    	if($field5 != ''){ echo ($field5); }   
					                    	else { echo ('Skype'); }
					                    	?>
					                    </label>
					                    <input type="text" >
					                </div>
					            <?php } ?>


					            <?php if($field6 != '' && $field6 == __('enabled', 'ftsf')) { ?>
					            <!-- Check if admin has allowed a particular field if yes display it else not shown to user -->
					               	<div>
					                    <label>
					                    	<?php
					                    	/* Check what value the Admin would like to be displayed
					                    	 * as label and display it else display the default
					                    	 */ 
					                    	if($field6 != ''){ echo ($field6); }   
					                    	else { echo ('Comments'); }
					                    	?>
					                    </label>
					                    <input type="text" >
					                </div>
					            <?php } ?>
				            </div>
				            <input type="submit" value="send">
				            </form>
				        </div>
				    </div> 
				</section>

	<?php } ?>