<?php

function drawPageJS($msg) {
?>
<head>
 <link rel="stylesheet"  href="layout.css"> 

</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
			session_start();
}
include 'basis/db.php';
$JsUSEName = $_SESSION['Usename'];

	if (!isset($_SESSION['usertype']) ){
			Header('Location:login.php?msg=Please sign in below.');
	}	
	else if ($_SESSION['usertype']=='jobseeker'){
?>
	<div class ="loginmsg">
<?php
	if (isset($_GET['msg'])) {
				echo $_GET['msg'];
				echo "<BR/>";
			}
?>
</div>
<?php			
	
			if (mysqli_connect_errno()) {
					echo "Connect failed: " . mysqli_connect_error();
					exit();
			}
			$mysqliJS = new mysqli($dbServer,$dbUser,$dbPass,$db);
			$sql_people="SELECT `fname`, `lname`, `email`, `phone`, `dob`, `street`, `city`, `state`, `postal`, `country` FROM people WHERE people.username='$JsUSEName'";
			
			
			$sqlc1= "SELECT name FROM companies"; 
			$sqledu= "SELECT name FROM `education_facilities`";
			$sqledu2= "SELECT name FROM `education_facilities`";
			
			
			$resultc1 = $mysqliJS->query($sqlc1);
			$resultEDU = $mysqliJS->query($sqledu);
			$resultEDU2 = $mysqliJS->query($sqledu2);
			
				
			$Pinfo = $mysqliJS->query($sql_people);
			while($person =$Pinfo->fetch_assoc()){;
?>
		<form method="post" action="comfrimJS.php" >
		<div class="content">
		<p class="h2">Personal Information of <?php echo $JsUSEName?> </p>
		First Name  <input type="text" name="JseFirstname" class="text_field" value="<?=$person['fname']?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Last Name<input type="text" name="JseLastname" class="text_field" value="<?=$person['lname']?>">
		<br><br>
		Email Address <input type ="text" name="JseAddress" Placeholder ="abch@efd.email.com" class="text_field" value="<?=$person['email']?>"?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Phone Number  <input type ="tel" name="JseNumber" class="text_field"  value="<?=$person['phone']?>">
		<br><br>
		Date of birth  <input type ="date" name="JseDOB" class="text_field"  value="<?=$person['dob']?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Street  <input type ="text" name="JseStreet" class="text_field" value="<?=$person['street']?>" >
		<br><br>
		City  <input type ="text" name="JseCity" class="text_field"  value="<?=$person['city']?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		State  <select name= "eCstate" id="JseState" class="text_field"  value="<?=$person['state']?>" >
				  <option value="" selected="">State</option>
				  <option value="Alabama">Alabama</option>
				  <option value="Alaska">Alaska</option>
				  <option value="Arizona">Arizona</option>
				  <option value="Arkansas">Arkansas</option>
				  <option value="California">California</option>
				  <option value="Colorado">Colorado</option>
				  <option value="Connecticut">Connecticut</option>
				  <option value="Delaware">Delaware</option>
				  <option value="District Of Columbia">District Of Columbia</option>
				  <option value="Florida">Florida</option>
				  <option value="Georgia">Georgia</option>
				  <option value="Hawaii">Hawaii</option>
				  <option value="Idaho">Idaho</option>
				  <option value="Illinois">Illinois</option>
				  <option value="Indiana">Indiana</option>
				  <option value="Iowa">Iowa</option>
				  <option value="Kansas">Kansas</option>
				  <option value="Kentucky">Kentucky</option>
				  <option value="Louisiana">Louisiana</option>
				  <option value="Maine">Maine</option>
				  <option value="Maryland">Maryland</option>
				  <option value="Massachusetts">Massachusetts</option>
				  <option value="Michigan">Michigan</option>
				  <option value="Minnesota">Minnesota</option>
				  <option value="Mississippi">Mississippi</option>
				  <option value="Missouri">Missouri</option>
				  <option value="Montana">Montana</option>
				  <option value="Nebraska">Nebraska</option>
				  <option value="Nevada">Nevada</option>
				  <option value="New Hampshire">New Hampshire</option>
				  <option value="New Jersey">New Jersey</option>
				  <option value="New Mexico">New Mexico</option>
				  <option value="New York">New York</option>
				  <option value="North Carolina">North Carolina</option>
				  <option value="North Dakota">North Dakota</option>
				  <option value="Ohio">Ohio</option>
				  <option value="Oklahoma">Oklahoma</option>
				  <option value="Oregon">Oregon</option>
				  <option value="Pennsylvania">Pennsylvania</option>
				  <option value="Rhode Island">Rhode Island</option>
				  <option value="South Carolina">South Carolina</option>
				  <option value="South Dakota">South Dakota</option>
				  <option value="Tennessee">Tennessee</option>
				  <option value="Texas">Texas</option>
				  <option value="Utah">Utah</option>
				  <option value="Vermont">Vermont</option>
				  <option value="Virginia">Virginia</option>
				  <option value="Washington">Washington</option>
				  <option value="West Virginia">West Virginia</option>
				  <option value="Wisconsin">Wisconsin</option>
				  <option value="Wyoming">Wyoming</option>
				</select>
					
		<br><br>
		ZipCode  <input type ="text" name="JseZipcode" class="text_field"  value="<?=$person['postal']?>" >
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Country<select name= "JseCcountry" id="country" class="text_field"  value="<?=$person['country']?>"  >
						
						<option value="Afghanistan">Afghanistan</option>
						<option value="Åland Islands">Åland Islands</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antarctica">Antarctica</option>
						<option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
						<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Bouvet Island">Bouvet Island</option>
						<option value="Brazil">Brazil</option>
						<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
						<option value="Brunei Darussalam">Brunei Darussalam</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Cape Verde">Cape Verde</option>
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China">China</option>
						<option value="Christmas Island">Christmas Island</option>
						<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
						<option value="Colombia">Colombia</option>
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote D'ivoire">Cote D'ivoire</option>
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic">Czech Republic</option>
						<option value="Denmark">Denmark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="French Guiana">French Guiana</option>
						<option value="French Polynesia">French Polynesia</option>
						<option value="French Southern Territories">French Southern Territories</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea">Guinea</option>
						<option value="Guinea-bissau">Guinea-bissau</option>
						<option value="Guyana">Guyana</option>
						<option value="Haiti">Haiti</option>
						<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
						<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="Iceland">Iceland</option>
						<option value="India">India</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option value="Iraq">Iraq</option>
						<option value="Ireland">Ireland</option>
						<option value="Isle of Man">Isle of Man</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
						<option value="Korea, Republic of">Korea, Republic of</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Macao">Macao</option>
						<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mayotte">Mayotte</option>
						<option value="Mexico">Mexico</option>
						<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
						<option value="Moldova, Republic of">Moldova, Republic of</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>
						<option value="Montenegro">Montenegro</option>
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru">Nauru</option>
						<option value="Nepal">Nepal</option>
						<option value="Netherlands">Netherlands</option>
						<option value="Netherlands Antilles">Netherlands Antilles</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norfolk Island">Norfolk Island</option>
						<option value="Northern Mariana Islands">Northern Mariana Islands</option>
						<option value="Norway">Norway</option>
						<option value="Oman">Oman</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau">Palau</option>
						<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea">Papua New Guinea</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines">Philippines</option>
						<option value="Pitcairn">Pitcairn</option>
						<option value="Poland">Poland</option>
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Qatar">Qatar</option>
						<option value="Reunion">Reunion</option>
						<option value="Romania">Romania</option>
						<option value="Russian Federation">Russian Federation</option>
						<option value="Rwanda">Rwanda</option>
						<option value="Saint Helena">Saint Helena</option>
						<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
						<option value="Saint Lucia">Saint Lucia</option>
						<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
						<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
						<option value="Samoa">Samoa</option>
						<option value="San Marino">San Marino</option>
						<option value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>
						<option value="Serbia">Serbia</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>
						<option value="Somalia">Somalia</option>
						<option value="South Africa">South Africa</option>
						<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="Sudan">Sudan</option>
						<option value="Suriname">Suriname</option>
						<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syrian Arab Republic">Syrian Arab Republic</option>
						<option value="Taiwan, Province of China">Taiwan, Province of China</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
						<option value="Thailand">Thailand</option>
						<option value="Timor-leste">Timor-leste</option>
						<option value="Togo">Togo</option>
						<option value="Tokelau">Tokelau</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad and Tobago">Trinidad and Tobago</option>
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Uganda">Uganda</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States">United States</option>
						<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Viet Nam">Viet Nam</option>
						<option value="Virgin Islands, British">Virgin Islands, British</option>
						<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
						<option value="Wallis and Futuna">Wallis and Futuna</option>
						<option value="Western Sahara">Western Sahara</option>
						<option value="Yemen">Yemen</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
					</select>	
		


		<p class="h2">Educational Background of <?php echo $JsUSEName?> </p>
		<?php
			}
			$getEdu = "SELECT `areaofstudy`, `degree`, `start_date`, `end_date`, `gpa`, `ed_facility_name`, `ed_facility_city` FROM `education` WHERE education.jobseeker ='$JsUSEName'";
			
			$Edu_res=$mysqliJS->query($getEdu);
			if(mysqli_num_rows($Edu_res) != 0){
				$JSedu_no = mysqli_num_rows($Edu_res);
				for($i=0;$i<$JSedu_no;$i++){
				$Edu_info = $Edu_res->fetch_row();
			
			
?>
				<p class="eduold"> Education History</p>
				<form method="post" action="comfrimJS.php">
				<b><span class ="list" > Institutional Name: </b> </b><?php echo $Edu_info[5] ?> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b> Institutional City: </b> <?php echo $Edu_info[6] ?> 
				<br><BR>
				<b>Area of Study: </b>  <?php echo $Edu_info[0] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Degree:</b> <?php echo $Edu_info[1] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>GPA:</b>  <?php echo $Edu_info[4] ?> 
				<br><br>
				<b>First date: </b>  <?php echo $Edu_info[2] ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Last date: </b>  <?php echo $Edu_info[3] ?>
				<br>
				<input type ="hidden" name="AofS" value="<?=$Edu_info[0]?>" >
				<input type ="hidden" name="JSdegree" value="<?=$Edu_info[1]?>" >


				<input type="hidden" name="action" value="delEdu">	
				<input type="Submit" value="Delete" class ="button button1">		
				</form>
		<?php 	}

			}
		?>
		
		
		<p class="eduhead">Add Education 1</p>
		Institutional Name<select  name = "EDUname1" class="text_field" value="<?=filter_input(INPUT_POST, 'EDUname1')?>" />
		<?php 	if (mysqli_num_rows($resultEDU) != 0) {
			?>
				<option value="" selected disabled hidden>SELECT</option>
		<?php
					$noresultEDU = mysqli_num_rows($resultEDU);
					for ($i=0;$i<$noresultEDU;$i++) {
						$rowEDU = mysqli_fetch_array($resultEDU);
						$namedEDU = $rowEDU["name"];
					?>
						
						<option value=<?php echo $namedEDU?>> <?php echo $namedEDU ?></option>;
						
					<?php
					}
				}
					?>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Area of Study<input type ="text" name="EDUArea1" class="text_field" value ="<?=filter_input(INPUT_POST, 'EDUArea1')?>" ><br><br>
		Degree<select  name = "EDUdegree1" class="text_field"  <?=filter_input(INPUT_POST, 'EDUdegree1')?> />
		<option value="None">None</option>
		<option value="High School">High School</option>
		<option value="Bachelors">Bachelors</option>
		<option value="Associates">Associates</option>
		<option value="Masters">Masters</option>
		<option value="Doctorate">Doctorate</option>
		
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		GPA <input type ="text" name="EDUGPA1" class="text_field"  value ="<?=filter_input(INPUT_POST, 'EDUGPA1')?>" > <br><br>
		First date <input type ="date" name="EDUFdate1" class="text_field"  value ="<?=filter_input(INPUT_POST, 'EDUFdate1')?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Last date <input type ="date" name="EDULdate1" class="text_field"  value ="<?=filter_input(INPUT_POST, 'EDULdate1')?>"><br><br>

		<hr><p class="eduhead">Add Education 2</p>
		Institutional Name<select  name = "eduname" class="text_field"   value ="<?=filter_input(INPUT_POST, 'eduname')?>" />
		<?php 	if (mysqli_num_rows($resultEDU2) != 0) {
			?>
				<option value="" selected disabled hidden>SELECT</option>'; 
		<?php
					$noresultEDU2 = mysqli_num_rows($resultEDU2);
					for ($i=0;$i<$noresultEDU2;$i++) {
						$rowEDU2 = mysqli_fetch_array($resultEDU2);
						$namedEDU2 = $rowEDU2["name"];
					?>
						
						<option value=<?php echo $namedEDU2?>> <?php echo $namedEDU2 ?></option>;
						
					<?php
					}
				}
					?>
				</select>		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Area of Study<input type ="text" name="eduArea" class="text_field" <?=filter_input(INPUT_POST, 'eduArea')?> ><br><br>
		Degree<select  name = "edudegree" class="text_field"  <?=filter_input(INPUT_POST, 'edudegree')?> />
		<option value="None">None</option>
		<option value="High School">High School</option>
		<option value="Bachelors">Bachelors</option>
		<option value="Associates">Associates</option>
		<option value="Masters">Masters</option>
		<option value="Doctorate">Doctorate</option>
		
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		GPA <input type ="text" name="eduGPA" class="text_field" <?=filter_input(INPUT_POST, 'eduGPA')?> > <br><br>
		First date <input type ="date" name="eduFdate" class="text_field" <?=filter_input(INPUT_POST, 'eduFdate')?>>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Last date <input type ="date" name="eduLdate" class="text_field" <?=filter_input(INPUT_POST, 'eduLdate')?> ><br><br>

		<hr>

		<?php
			
			$getSkill="SELECT `name`, `certification_date` FROM `skills_certifications` WHERE skills_certifications.jobseeker ='$JsUSEName'";
			
			$Skill_res=$mysqliJS->query($getSkill);
			$JSskill_no = mysqli_num_rows($Skill_res);
			if(!($JSskill_no == 0)){
				
				//$JSskill_no = mysqli_num_rows($Skill_res);
						for($i=0;$i<$JSskill_no;$i++){
				$Skill_info = mysqli_fetch_array($Skill_res);
			
			
			
?>
	
			<p class="eduold"> Skill History</p>
			<form method="post" action="comfrimJS.php">
			<b> Certification name:</b> &nbsp;&nbsp;&nbsp;<?php echo $Skill_info[0] ?> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b> Certification date:</b> &nbsp;&nbsp;&nbsp;<?php echo $Skill_info[1] ?> 
			<br>
			<input type ="hidden" name="SKilname" value="<?=$Skill_info[0]?>" >

			
			<input type="hidden" name="action" value="delSkill">	
			<input type="Submit" value="Delete" class ="button button1">				
		</form>
		<?php 	}

			}
			?>			
		<p class="eduhead">Add Specialized Training/Certifications</p>
		Institutional Name<input type ="text" name="SpecialName" class="text_field">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Cerificate date <input type ="date" name="SpecialDate" class="text_field">
		
		
		<p class="h2">Employment History of <?php echo $JsUSEName?> </p>
		<?php
			
			$getJob = "SELECT `company`, `start_date`, `end_date`, `position`, `supervisor_fname`, `supervisor_lname`, `supervisor_email`, `supervisor_phone` FROM `job_history` WHERE  job_history.jobseeker ='$JsUSEName'";
			
			$JOb_res=$mysqliJS->query($getJob);
			if(mysqli_num_rows($JOb_res) != 0){
				$JSjob_no = mysqli_num_rows($JOb_res);
				for($i=0;$i<$JSjob_no;$i++){
				$Job_info = $JOb_res->fetch_row();
			
		
?>
				<p class="eduold"> Past Employment</p>
				<form method="post" action="comfrimJS.php">
				<b><span class ="list" > Company Name: </b> </b><?php echo $Job_info[0] ?> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Position: </b> <?php echo $Job_info[3] ?> 
				<br><BR>
				<b>First date: </b>  <?php echo $Job_info[1] ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Last date: </b>  <?php echo $Job_info[2] ?>
				<BR><br>
				<b>Supervisor First Name: </b>  <?php echo $Job_info[4] ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Supervisor Last Name: </b>  <?php echo $Job_info[5] ?>
				<bR><br>
				<b>Supervisor Email: </b>  <?php echo $Job_info[6] ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Supervisor Phone: </b>  <?php echo $Job_info[7] ?>
				
				<input type ="hidden" name="JobCName" value="<?=$Job_info[0]?>" >
				<input type ="hidden" name="Job_day1" value="<?=$Job_info[1]?>" >
				
				<input type="hidden" name="action" value="delJob">	
				<input type="Submit" value="Delete" class ="button button1">

						
				</form>
		<?php 	}

			}
		?>
		<p class="eduhead">Add Previous Employment </p>

		Start Date <input type ="date" name="EmDate" class="text_field"  <?=filter_input(INPUT_POST, 'EmDate')?> > 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		End Date<input type ="date" name="EmDate2" class="text_field"  <?=filter_input(INPUT_POST, 'EmDate2')?> ><br><br>
		Company name <select  name = "EmCname" class="text_field"  <?=filter_input(INPUT_POST, 'EmCname')?>   />
		<?php 	if (mysqli_num_rows($resultc1) != 0) {
			?>
				<option value="" selected disabled hidden>SELECT</option>; 
		
					<?php
					$noresult1 = mysqli_num_rows($resultc1);
					//echo"</BR>";
					echo $noresult1;
					for ($i=0;$i<$noresult1;$i++) {
						$row1 = mysqli_fetch_array($resultc1);
						$name1= $row1["name"];
						//echo $name1;
						//echo"</BR>";
						?>	
							<option value=<?php echo $name1?>> <?php echo $name1?></option>;
							
						<?php				
					}
				

					}	
				
					?>
				</select>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Previous Postion <input type ="text" name="EmPPostq"class="text_field" <?=filter_input(INPUT_POST, 'EmPPostq')?>>
		<br><br>
		Supervisor First Name <input type="text" name="EmSupFnameq" class="text_field" <?=filter_input(INPUT_POST, 'EmSupFnameq')?> >
		Supervisor Last Name <input type="text" name="EmSupLname" class="text_field" <?=filter_input(INPUT_POST, 'EmSupLname')?> >
		<br><br>
		Supervisor's Number <input type ="tel" name="EmSupNoq" class="text_field" <?=filter_input(INPUT_POST, 'EmSupNoq')?> >
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Supervisor's email <input type ="text" name="EmSupmailq" Placeholder="abch@efd.email.com" class="text_field" <?=filter_input(INPUT_POST, 'EmSupmailq')?> >


		<br><bR>
		<span class = "exit"><b> <a href="menu.php" > Return to menu</a><b></span>
		<br>
		
			<a href="logout.php" class="button button1">Log Out</a>
			<input type="Submit"  name="action" value="Edit" class ="button button1">
		</form>
		

<?php
$Pinfo->free();
$mysqliJS->close();
}

else {
	Header('Location:login.php?msg=You are not a jobseeker.');
}	
}

?>
</div>
</body>