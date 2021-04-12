<?php
/*
 * Template Name: Contact
 *
 * */

	if($_POST) :
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$company_name = $_POST['company_name'];
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
		$message = $_POST['message'];
		$hear = $_POST['hear'];
		$body = '<p><strong>Name:</strong> '. $first_name.' '. $last_name .'</p>';
		$body .= '<p><strong>Company:</strong> '. $company_name.'</p>';
		$body .= '<p><strong>Subject:</strong> '. $subject.'</p>';
		$body .= '<p><strong>Email:</strong> '. $email.'</p>';
		$body .= '<p><strong>Phone:</strong> '. $phone.'</p>';
		$body .= '<p><strong>Country:</strong> '. $country.'</p>';
		$body .= '<p><strong>Message:</strong> '. $message.'</p>';
		$body .= '<p><strong>How did you find about us?:</strong> '. $hear.'</p>';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$subject_email = 'New request <'.$email.'>';
		$to = get_option('admin_email');

		$admin_email = get_field('admin_email');

		if(defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE === 'india') {
			$to = $admin_email['india'];
		}else {
			$to = $admin_email['global'];
		}

		$to = (!$to)?get_option('admin_email'): $to;

		wp_mail($to, $subject_email, $body, $headers);
		$thank_page = get_field('thank_page', 'option');
		wp_redirect($thank_page);
	endif;
	get_header();
	if(defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE === 'india') {
		echo '<!--' . ICL_LANGUAGE_CODE . '-->';
	}
	while (have_posts()): the_post();
		$introduction = get_field('introduction');
?>
	<section class="section section-top contact-info waypoint-group" data-nav-effect="true" data-navigator='dark' data-navigator-up='dark'>
		<div class="container">
			<div class="section-heading">
				<h3 class="the-title text-primary text-style-3"><?php the_title(); ?></h3>
				<?php the_text($introduction, '<h4 class="the-title text-dusk text-style-4 mb-0">', '</h4>'); ?>
			</div>
			<div class="row">
				<?php
				if(have_rows('contacts')):
					while (have_rows('contacts')): the_row();
							$label = get_sub_field('label');
							$value = get_sub_field('description');
							
							if(strpos($value,'<p') < 1) {
								$value = '<p class="text-style-6">'.$value.'</p>';
							}else {
								$value = str_replace('<p', '<p class="text-style-6"', $value);
							}
							echo '<div class="col-lg-4">
									<div class="mb-md">';
									the_text($label, '<div class="text-style-9 text-primary mb-3">', '</div>');
									the_text($value);
							echo '										
									</div>
								</div>';
						
					endwhile;
				endif;
				?>
			</div>
		</div>
	</section>
	<section class="section section-background waypoint-group" data-nav-effect="true" data-navigator='white' data-navigator-up='dark'>
		<div class="container">
			<div class="section-block section-text-block-wide mb-0">
				<h3 class="the-title text-primary text-style-3"><?php _e('Drop us a line'); ?></h3>
				<div class="text-block-content">
					<form name="contact-form" method="post" id="contactform">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="first_name"><?php _e('First Name');  ?> <sup class="text-primary">*</sup>
								</label>
								<input class="form-control form-control-lg" type="text" id="first_name" name="first_name" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="last_name"><?php _e('Last Name');  ?> <sup class="text-primary">*</sup>
								</label>
								<input class="form-control form-control-lg" type="text" id="last_name" name="last_name" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="company_name"><?php _e('Company Name');  ?> <sup class="text-primary">*</sup>
								</label>
								<input class="form-control form-control-lg" type="text" id="company_name" name="company_name" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="email"><?php _e('Email address');  ?> <sup class="text-primary">*</sup>
								</label>
								<input class="form-control form-control-lg" type="email" id="email" name="email" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="phone"><?php _e('Contact number'); ?> <sup class="text-primary">*</sup>
								</label>
								<input class="form-control form-control-lg" type="text" id="phone" name="phone" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="subject"><?php _e('Subject'); ?> <sup class="text-primary">*</sup>
								</label>
								<select class="custom-select custom-select-lg" id="subject" name="subject" required>
									<option value="Product Enquiry">Product Enquiry</option>
									<option value="Technical Support">Technical Support</option>
									<option value="RYNAN Partnership">RYNAN Partnership</option>
									<option value="Feedback">Feedback</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="country"><?php _e('Country'); ?> <sup class="text-primary">*</sup>
								</label>
								<select class="custom-select custom-select-lg" id="country" name="country" required>
									<option value="">Select One</option>
									<option value="Afganistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antigua & Barbuda">Antigua & Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bonaire">Bonaire</option>
									<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
									<option value="Brunei">Brunei</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Canary Islands">Canary Islands</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Channel Islands">Channel Islands</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos Island">Cocos Island</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote DIvoire">Cote DIvoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Curaco">Curacao</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="East Timor">East Timor</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands">Falkland Islands</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="French Southern Ter">French Southern Ter</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Great Britain">Great Britain</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Hawaii">Hawaii</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="Indonesia">Indonesia</option>
									<option value="India">India</option>
									<option value="Iran">Iran</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Isle of Man">Isle of Man</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Korea North">Korea North</option>
									<option value="Korea Sout">Korea South</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Laos">Laos</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macau">Macau</option>
									<option value="Macedonia">Macedonia</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Malawi">Malawi</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Midway Islands">Midway Islands</option>
									<option value="Moldova">Moldova</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Nambia">Nambia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherland Antilles">Netherland Antilles</option>
									<option value="Netherlands">Netherlands (Holland, Europe)</option>
									<option value="Nevis">Nevis</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Niue">Niue</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau Island">Palau Island</option>
									<option value="Palestine">Palestine</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Phillipines">Philippines</option>
									<option value="Pitcairn Island">Pitcairn Island</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Republic of Montenegro">Republic of Montenegro</option>
									<option value="Republic of Serbia">Republic of Serbia</option>
									<option value="Reunion">Reunion</option>
									<option value="Romania">Romania</option>
									<option value="Russia">Russia</option>
									<option value="Rwanda">Rwanda</option>
									<option value="St Barthelemy">St Barthelemy</option>
									<option value="St Eustatius">St Eustatius</option>
									<option value="St Helena">St Helena</option>
									<option value="St Kitts-Nevis">St Kitts-Nevis</option>
									<option value="St Lucia">St Lucia</option>
									<option value="St Maarten">St Maarten</option>
									<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
									<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
									<option value="Saipan">Saipan</option>
									<option value="Samoa">Samoa</option>
									<option value="Samoa American">Samoa American</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome & Principe">Sao Tome & Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syria">Syria</option>
									<option value="Tahiti">Tahiti</option>
									<option value="Taiwan">Taiwan</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania">Tanzania</option>
									<option value="Thailand">Thailand</option>
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad & Tobago">Trinidad & Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Turks & Caicos Is">Turks & Caicos Is</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Erimates">United Arab Emirates</option>
									<option value="United States of America">United States of America</option>
									<option value="Uraguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Vatican City State">Vatican City State</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
									<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
									<option value="Wake Island">Wake Island</option>
									<option value="Wallis & Futana Is">Wallis & Futana Is</option>
									<option value="Yemen">Yemen</option>
									<option value="Zaire">Zaire</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>
							</div>
							<div class="form-group">
								<label for="hear"><?php _e('How did you find about us?'); ?> <sup class="text-primary">*</sup>
								</label>
								<select class="custom-select custom-select-lg" type="text" id="hear" name="hear" required>
									<option value="Facebook">Facebook</option>
									<option value="Google Search">Google Search</option>
									<option value="Google Ads">Google Ads</option>
									<option value="Word of Mouth">Word of Mouth</option>
									<option value="Tradeshow">Tradeshow</option>
									<option value="Linkedin">Linkedin</option>
									<option value="Youtube">Youtube</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="message"><?php _e('Your message'); ?> <sup class="text-primary">*</sup>
								</label>
								<textarea class="form-control form-control-lg" id="message" name="message" required></textarea>
							</div>
						</div>
						<div class="col-lg-6"></div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">&nbsp;</label>
								<div class="text-lg-right">
									<div data-callback="submitContactForm" data-size="invisible" class="g-recaptcha" data-sitekey="6Le3dEkaAAAAAILgzD619oOuewKXHDSvUSPTXCmn"></div>
									<button data-size="invisible" type="submit" class="btn btn-outline-primary btn-lg btn-wrapper">
										<span><?php _e('Submit'); ?></span>
									</button>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php
	endwhile;
	get_footer();
