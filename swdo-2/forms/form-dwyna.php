		<!-- Page Header -->
		<?php include 'form-header.php'; ?>
		
		<!-- Set service_id -->
		<?php $service_id = '7'; ?>
		
		<!-- Error Handling -->
		<?php include 'error/error-handling-3.php'; ?>
		
		<!-- Service Error Handling -->
		<?php include 'error/error-handling-dwyna.php'; ?>
		
		<!-- Variables for family composition -->
		<?php include 'variables-fam.php'; ?>
				
		<!-- SQL Insert file -->
		<?php if ($countErr == 1 OR $countErrs == 1) { echo ""; } else { include '../action/insert_dwyna.php'; } ?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Welfare of Disadvantaged Woman, Youth and other Needy Adult</h4>
              </div>
			  
			  <div class="title_right"> <!-- Display Time && Date -->
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<h4>
				  <span id='time'></span> <!-- JS Active Time -->
                  <?php date_default_timezone_set("Asia/Manila"); echo " | " . date("M d,Y") . "<br>"; ?> <!-- Display Current Date -->
				</h4>
                </div>
              </div>
			  
            </div>
			
            <div class="clearfix"></div>

            <div class="x_panel">
              <div class="x_title">
                <h2><b>New Intake Sheet</b></h2>				  
				
                <div class="clearfix"></div>
				
              </div>
              <div class="x_content">

			  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <!-- Hidden values -->
                <div class="row">

				<p style="font-weight: bold;" >I. Identifying Information</p>
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
				    <label for="name">First Name * :</label>
                    <input type="text" name="firstname" placeholder="First Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $firstname;?>"  >
					<span class="error"> <?php echo $firstnameErr;?></span>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Middle Name * :</label>
					<input type="text" name="middlename" placeholder="Middle Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $middlename;?>"  >
					<span class="error"> <?php echo $middlenameErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Last Name * :</label>
					<input type="text" name="lastname" placeholder="Last Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $lastname;?>"  >
					<span class="error"> <?php echo $lastnameErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="sex">Sex * :</label>
						<select class="select2_single form-control" name="sex" tabindex="-1"  >
                            <option></option>
							<option value="Male" <?php if ($sex == 'Male') { echo 'selected'; } ?> >Male</option>
							<option value="Female" <?php if ($sex == 'Female') { echo 'selected'; } ?> >Female</option>
						</select>
						<span class="error"> <?php echo $sexErr;?></span>
                  </div>
				  
				  <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                    <label for="age">Age * :</label>
					<p style="font-weight: bold; font-size: 16px; text-align: center;" id="resultBday" ></p>
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="bday">Date of Birth * :</label>
					<div class='input-group date' type="date" id='myDatepicker2'>
                            <input type='text' class="form-control" name="bday" id="bday" value="<?php if (empty($bday)) { echo "".date("m/d/y").""; } else { echo date('m/d/y', strtotime($bday)); } ?>" onblur="submitBday()" onkeyup="submitBday()"   />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						<span class="error"> <?php echo $bdayErr;?></span>
                  </div>
				  
				  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                    <label for="bplace">Birthplace * :</label>
					<input type="text" name="bplace" placeholder="Birthplace" class="form-control" maxlength="50" onkeypress="return validateKeyStrokess(event)" value="<?php echo $bplace;?>"   >
					<span class="error"> <?php echo $bplaceErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="civil">Civil Status * :</label>
                      <p  >
                        Single:
                        <input type="radio" class="flat" name="civil" value="Single" <?php if ($civil == 'Single') { echo 'checked'; }?> /> 
						Married:
                        <input type="radio" class="flat" name="civil" value="Married"  <?php if ($civil == 'Married') { echo 'checked'; }?> /> 
						Other:
                        <input type="radio" class="flat" name="civil" value="Other" <?php if ($civil == 'Other') { echo 'checked'; }?> />
                      </p>
					  <span class="error"> <?php echo $civilErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="religion">Religion :</label>
					<input type="text" name="religion" placeholder="Religion" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $religion;?>"  >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="tel">Telephone :</label>
					<input type="text" name="tel" placeholder="999-99-99" class="form-control" data-inputmask="'mask': '999-99-99'" maxlength="30" value="<?php if (empty($telephone)) { echo ""; } else { echo $telephone; } ?>"  >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="contactno">Contact No. :</label>
					<input type="text" name="contactno" placeholder="0999-999-9999" class="form-control" data-inputmask="'mask': '9999-999-9999'" maxlength="30" value="<?php if (empty($contactno)) { echo ""; } else { echo $contactno; } ?>"  >
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="preadd">Present Address * :</label>
					<input type="text" name="preadd" placeholder="Present Address" class="form-control" maxlength="50" value="<?php echo $preadd;?>"  >
					<p><i>No./ Building / Street / City/Municipality / District/Province / Region</i></p>
					<span class="error"> <?php echo $preaddErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="barangay">Barangay * :</label>
						<select class="select2_single form-control" name="barangay" tabindex="-1"  >
                            <option></option>
							<option value="Baras" <?php if($barangay == 'Baras') { echo 'selected'; } else { echo ''; } ?> >Baras</option>
							<option value="Del Rosario" <?php if($barangay == 'Del Rosario') { echo 'selected'; } else { echo ''; } ?>  >Del Rosario</option>
							<option value="Dinaga" <?php if($barangay == 'Dinaga') { echo 'selected'; } else { echo ''; } ?> >Dinaga</option>
							<option value="Fundado" <?php if($barangay == 'Fundado') { echo 'selected'; } else { echo ''; } ?>  >Fundado</option>
							<option value="Haring" <?php if($barangay == 'Haring') { echo 'selected'; } else { echo ''; } ?> >Haring</option>
							<option value="Iquin" <?php if($barangay == 'Iquin') { echo 'selected'; } else { echo ''; } ?> >Iquin</option>
							<option value="Linaga" <?php if($barangay == 'Linaga') { echo 'selected'; } else { echo ''; } ?> >Linaga</option>
							<option value="Mangayawan" <?php if($barangay == 'Mangayawan') { echo 'selected'; } else { echo ''; } ?> >Mangayawan</option>
							<option value="Palo" <?php if($barangay == 'Palo') { echo 'selected'; } else { echo ''; } ?> >Palo</option>
							<option value="Pangpang" <?php if($barangay == 'Pangpang') { echo 'selected'; } else { echo ''; } ?> >Pangpang</option>
							<option value="Poro" <?php if($barangay == 'Poro') { echo 'selected'; } else { echo ''; } ?> >Poro</option>
							<option value="San Agustin" <?php if($barangay == 'San Agustin') { echo 'selected'; } else { echo ''; } ?> >San Agustin</option>
							<option value="San Francisco" <?php if($barangay == 'San Francisco') { echo 'selected'; } else { echo ''; } ?>  >San Francisco</option>
							<option value="San Jose East" <?php if($barangay == 'San Jose East') { echo 'selected'; } else { echo ''; } ?> >San Jose East</option>
							<option value="San Jose West" <?php if($barangay == 'San Jose West') { echo 'selected'; } else { echo ''; } ?> >San Jose West</option>
							<option value="San Juan" <?php if($barangay == 'San Juan') { echo 'selected'; } else { echo ''; } ?> >San Juan</option>
							<option value="San Nicolas" <?php if($barangay == 'San Nicolas') { echo 'selected'; } else { echo ''; } ?> >San Nicolas</option>
							<option value="San Roque" <?php if($barangay == 'San Roque') { echo 'selected'; } else { echo ''; } ?> >San Roque</option>
							<option value="San Vicente" <?php if($barangay == 'San Vicente') { echo 'selected'; } else { echo ''; } ?> >San Vicente</option>
							<option value="Santa Cruz" <?php if($barangay == 'Santa Cruz') { echo 'selected'; } else { echo ''; } ?> >Santa Cruz</option>
							<option value="Santa Teresita" <?php if($barangay == 'Santa Teresita') { echo 'selected'; } else { echo ''; } ?> >Santa Teresita</option>
							<option value="Sua" <?php if($barangay == 'Sua') { echo 'selected'; } else { echo ''; } ?> >Sua</option>
							<option value="Talidtid" <?php if($barangay == 'Talidtid') { echo 'selected'; } else { echo ''; } ?> >Talidtid</option>
							<option value="Tibgao" <?php if($barangay == 'Tibgao') { echo 'selected'; } else { echo ''; } ?> >Tibgao</option>
						</select>
						<span class="error"> <?php echo $barangayErr;?></span>
                  </div>
				  
				  <div class="col-md-8 col-sm-4 col-xs-12 form-group">
                    <label for="proadd">Provincial Address * :</label>
					<input type="text" name="proadd" placeholder="Provincial Address" value="Camarines Sur" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $proadd;?>"   >
					<span class="error"> <?php echo $proaddErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="educ">Highest Educational Attainment * :</label>
						<input type="text" class="form-control" name="educ" placeholder="Highest Educational Attainment" onkeypress="return validateKeyStroke(event)"  maxlength="30" value="<?php echo $educ;?>"  >
						<span class="error"> <?php echo $educErr;?></span>
				  </div>
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Philhealth No. :</label>
						<input type="text" class="form-control" name="philn" style="text-transform: lowercase;" placeholder="xxxx-xxxx-xxxx" data-inputmask="'mask' : '9999-9999-9999'" value="<?php echo $philn;?>" >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Skills/Occupation * :</label>
						<input type="text" class="form-control" name="skill"  maxlength="30" placeholder="Skills/Occupation"  onkeypress="return validateKeyStroke(event)" value="<?php echo $skill;?>" >
						<span class="error"> <?php echo $skillErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Estimated Family Income * :</label>
						<input type="text" class="form-control" name="income"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal(this.name, this.value); return 0;" onkeyup="compute_total_amount(); return 0;"; onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; } compute_total_amount();" value="<?php echo $income;?>"   />
						<span class="error"> <?php echo $incomeErr;?></span>
				  </div>
				  
				  </div>

				<div class="row" >
				  <p style="font-weight: bold;" >II. Family Composition</p>
				  
				  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
                    <label for="family_head">Family Head * :</label>
						<input type="text" class="form-control" name="family_head" placeholder="Family Head" onkeypress="return validateKeyStroke(event)" maxlength="50" value="<?php echo $family_head;?>"  >
						<span class="error"> <?php echo $family_headErr;?></span>
				  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="family_head">Position in the Family * :</label>
						<select class="select2_single form-control" name="position" tabindex="-1" >
							<option></option>
							<option value="Mother" <?php if ($position == 'Mother') { echo 'selected'; } ?> >Mother</option>
							<option value="Father" <?php if ($position == 'Father') { echo 'selected'; } ?> >Father</option>
							<option value="Spouse" <?php if ($position == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
							<option value="Son" <?php if ($position == 'Son') { echo 'selected'; } ?> >Son</option>
							<option value="Daughter" <?php if ($position == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
							<option value="Brother" <?php if ($position == 'Brother') { echo 'selected'; } ?> >Brother</option>
							<option value="Sister" <?php if ($position == 'Sister') { echo 'selected'; } ?> >Sister</option>
							<option value="Grandfather" <?php if ($position == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
							<option value="Grandmother" <?php if ($position == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
							<option value="Uncle" <?php if ($position == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
							<option value="Auntie" <?php if ($position == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
							<option value="Cousin"  <?php if ($position == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
							<option value="Niece" <?php if ($position == 'Niece') { echo 'selected'; } ?> >Niece</option>
							<option value="Relative" <?php if ($position == 'Relative') { echo 'selected'; } ?> >Relative</option>
						</select>
						<span class="error"> <?php echo $positionErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <!-- Start Table -->
				  <div class="table-responsive" style="width: 100%;" >   
				  <table class="hover">
					<thead>
						<tr>
							<th>#</th>
							<th style="width:20%;" >Name</th>
							<th>Sex</th>
							<th>Civil Status</th>
							<th>Relationship</th>
							<th style="width:10%;" >Educational Attainment</th>
							<th style="width:10%;" >Skill/Occupation</th>
							<th style="width:10%;">Monthly Income</th>
							<th style="width:10%;">Birthdate</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><input type="text" class="form-control" maxlength="30" name="name1" value="<?php echo $name1;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex1" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex1 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex1 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil1" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil1 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil1 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil1 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation1" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation1 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation1 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation1 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation1 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation1 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation1 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation1 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation1 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation1 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation1 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation1 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation1 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation1 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation1 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ1" value="<?php echo $educ1;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill1" value="<?php echo $skill1;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income1" value="<?php echo $income1;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate1" value="<?php echo $birthdate1;?>" /></td>
						</tr>
						<tr>
							<td>2</td>
							<td><input type="text" class="form-control" maxlength="30" name="name2" value="<?php echo $name2;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex2" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex2 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex2 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil2" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil2 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil2 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil2 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation2" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation2 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation2 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation2 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation2 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation2 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation2 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation2 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation2 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation2 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation2 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation2 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation2 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation2 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation2 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ2" value="<?php echo $educ2;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill2" value="<?php echo $skill2;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income2" value="<?php echo $income2;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate2" value="<?php echo $birthdate2;?>" /></td>
						</tr>
						<tr>
							<td>3</td>
							<td><input type="text" class="form-control" maxlength="30" name="name3" value="<?php echo $name3;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex3" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex3 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex3 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil3" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil3 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil3 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil3 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation3" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation3 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation3 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation3 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation3 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation3 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation3 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation3 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation3 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation3 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation3 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation3 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation3 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation3 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation3 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ3" value="<?php echo $educ3;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill3" value="<?php echo $skill3;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income3" value="<?php echo $income3;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate3" value="<?php echo $birthdate3;?>" /></td>
						</tr>
						<tr>
							<td>4</td>
							<td><input type="text" class="form-control" maxlength="30" name="name4" value="<?php echo $name4;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex4" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex4 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex4 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil4" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil4 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil4 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil4 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation4" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation4 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation4 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation4 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation4 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation4 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation4 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation4 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation4 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation4 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation4 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation4 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation4 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation4 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation4 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ4" value="<?php echo $educ4;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill4" value="<?php echo $skill4;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income4" value="<?php echo $income4;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate4" value="<?php echo $birthdate4;?>" /></td>
						</tr>
						<tr>
							<td>5</td>
							<td><input type="text" class="form-control" maxlength="30" name="name5" value="<?php echo $name5;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex5" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex5 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex5 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil5" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil5 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil5 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil5 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation5" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation5 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation5 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation5 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation5 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation5 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation5 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation5 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation5 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation5 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation5 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation5 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation5 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation5 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation5 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ5" value="<?php echo $educ5;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill5" value="<?php echo $skill5;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income5" value="<?php echo $income5;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate5" value="<?php echo $birthdate5;?>" /></td>
						</tr>
						<tr>
							<td>6</td>
							<td><input type="text" class="form-control" maxlength="30" name="name6" value="<?php echo $name6;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex6" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex6 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex6 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil6" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil6 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil6 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil6 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation6" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation6 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation6 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation6 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation6 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation6 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation6 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation6 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation6 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation6 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation6 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation6 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation6 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation6 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation6 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ6" value="<?php echo $educ6;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill6" value="<?php echo $skill6;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income6" value="<?php echo $income6;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate6" value="<?php echo $birthdate6;?>" /></td>
						</tr>
						<tr>
							<td>7</td>
							<td><input type="text" class="form-control" maxlength="30" name="name7" value="<?php echo $name7;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex7" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex7 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex7 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil7" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil7 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil7 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil7 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation7" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation7 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation7 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation7 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation7 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation7 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation7 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation7 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation7 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation7 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation7 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation7 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation7 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation7 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation7 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ7" value="<?php echo $educ7;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill7" value="<?php echo $skill7;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income7" value="<?php echo $income7;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate7" value="<?php echo $birthdate7;?>" /></td>
						</tr>
						<tr>
							<td>8</td>
							<td><input type="text" class="form-control" maxlength="30" name="name8" value="<?php echo $name8;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex8" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex8 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex8 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil8" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil8 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil8 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil8 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation8" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation8 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation8 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation8 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation8 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation8 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation8 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation8 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation8 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation8 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation8 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation8 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation8 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation8 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation8 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ8" value="<?php echo $educ8;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill8" value="<?php echo $skill8;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income8" value="<?php echo $income8;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate8" value="<?php echo $birthdate8;?>" /></td>
						</tr>
						<tr>
							<td>9</td>
							<td><input type="text" class="form-control" maxlength="30" name="name9" value="<?php echo $name9;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex9" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex9 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex9 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil9" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil9 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil9 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil9 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation9" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation9 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation9 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation9 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation9 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation9 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation9 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation9 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation9 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation9 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation9 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation9 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation9 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation9 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation9 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ9" value="<?php echo $educ9;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill9" value="<?php echo $skill9;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income9" value="<?php echo $income9;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate9" value="<?php echo $birthdate9;?>" /></td>
						</tr>
						<tr>
							<td>10</td>
							<td><input type="text" class="form-control" maxlength="30" name="name10" value="<?php echo $name10;?>" onkeypress="return validateKeyStroke(event)" /></td>
							<td>
							<select class="select2_single form-control" name="sex10" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Male" <?php if ($sex10 == 'Male') { echo 'selected';} ?> >Male</option>
								<option value="Female" <?php if ($sex10 == 'Female') { echo 'selected';} ?> >Female</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="civil10" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Single" <?php if ($civil10 == 'Single') { echo 'selected';} ?> >Single</option>
								<option value="Married" <?php if ($civil10 == 'Married') { echo 'selected';} ?> >Married</option>
								<option value="Others" <?php if ($civil10 == 'Others') { echo 'selected';} ?> >Others</option>
							</select>
							</td>
							<td>
							<select class="select2_single form-control" name="relation10" tabindex="-1" style="width: auto;">
								<option></option>
								<option value="Mother" <?php if ($relation10 == 'Mother') { echo 'selected'; } ?> >Mother</option>
								<option value="Father" <?php if ($relation10 == 'Father') { echo 'selected'; } ?> >Father</option>
								<option value="Spouse" <?php if ($relation10 == 'Spouse') { echo 'selected'; } ?> >Spouse</option>
								<option value="Son" <?php if ($relation10 == 'Son') { echo 'selected'; } ?> >Son</option>
								<option value="Daughter" <?php if ($relation10 == 'Daughter') { echo 'selected'; } ?> >Daughter</option>
								<option value="Brother" <?php if ($relation10 == 'Brother') { echo 'selected'; } ?> >Brother</option>
								<option value="Sister" <?php if ($relation10 == 'Sister') { echo 'selected'; } ?> >Sister</option>
								<option value="Grandfather" <?php if ($relation10 == 'Grandfather') { echo 'selected'; } ?> >Grandfather</option>
								<option value="Grandmother" <?php if ($relation10 == 'Grandmother') { echo 'selected'; } ?> >Grandmother</option>
								<option value="Uncle" <?php if ($relation10 == 'Uncle') { echo 'selected'; } ?> >Uncle</option>
								<option value="Auntie" <?php if ($relation10 == 'Auntie') { echo 'selected'; } ?> >Auntie</option>
								<option value="Cousin"  <?php if ($relation10 == 'Cousin') { echo 'selected'; } ?> >Cousin</option>
								<option value="Niece" <?php if ($relation10 == 'Niece') { echo 'selected'; } ?> >Niece</option>
								<option value="Relative" <?php if ($relation10 == 'Relative') { echo 'selected'; } ?> >Relative</option>
							</select>
							</td>
							<td><input type="text" class="form-control" maxlength="20" name="educ10"  value="<?php echo $educ10;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="skill10" value="<?php echo $skill10;?>" /></td>
							<td><input type="text" class="form-control" maxlength="20" name="income10" value="<?php echo $income10;?>" /></td>
							<td><input type="date" class="form-control" style="text-transform: lowercase;"  name="birthdate10" value="<?php echo $birthdate10;?>" /></td>
						</tr>
					</tbody>
				  </table>
				  </div>
				  <!-- End Table -->

				  <br>
				  
				  </div>
				  
				 <div class="row">
				  
				<p style="font-weight: bold;" >III. Social Worker's Assessment/Problem Presented</p>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="type">Type of Abuse * :</label>
						<select class="select2_single form-control" name="type" tabindex="-1"  >
                            <option placeholder="Type of Abuse"></option>
							<option value="Physical Abuse" <?php if ($type == 'Physical Abuse') { echo 'selected'; } ?> >Physical Abuse</option>
							<option value="Sexual Abuse" <?php if ($type == 'Sexual Abuse') { echo 'selected'; } ?> >Sexual Abuse</option>
							<option value="Verbal Abuse" <?php if ($type == 'Verbal Abuse') { echo 'selected'; } ?> >Verbal Abuse</option>
							<option value="Psychological Abuse" <?php if ($type == 'Psychological abuse') { echo 'selected'; } ?> >Psychological Abuse</option>
							<option value="Emotional Abuse" <?php if ($type == 'Emotional Abuse') { echo 'selected'; } ?> >Emotional Abuse</option>
							<option value="Economic/Financial Abuse" <?php if ($type == 'Economic/financial Abuse') { echo 'selected'; } ?> >Economic/Financial Abuse</option>
						</select>
						<span class="error"> <?php echo $typeErr;?></span>
                  </div>

				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Name of Perpetrator * :</label>
					<input type="text" name="perpetrator" placeholder="Name of Perpetrator" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $perpetrator;?>"  >
					<span class="error"> <?php echo $perpetratorErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">When * :</label>
					<div class='input-group date' type="date" id='myDatepicker22'>
                            <input type='text' class="form-control" name="when" value="<?php if (empty($when)) { echo "".date("m/d/y").""; } else { echo date('m/d/y', strtotime($when)); } ?>"   />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
					<span class="error"> <?php echo $whenErr;?></span>
                  </div>
				  
				</div>
				
				<div class="row">
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Where * :</label>
					<input type="text" name="where" placeholder="Where" class="form-control" maxlength="30" onkeypress="return validateKeyStrokes(event)" value="<?php echo $where;?>"  >
					<span class="error"> <?php echo $whereErr;?></span>
                  </div>
				
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
				    <label for="name">Parent Name * :</label>
                    <input type="text" name="parent" placeholder="Parent Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $parent;?>"  >
					<span class="error"> <?php echo $parentErr;?></span>
                  </div>

				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Service Rendered * :</label>
					<input type="text" name="service" placeholder="Service Rendered" class="form-control" maxlength="30" onkeypress="return validateKeyStrokes(event)" value="<?php echo $service;?>"  >
					<span class="error"> <?php echo $whereErr;?></span>
                  </div>
				
				</div>
				
				<div class="row">
				
				 <label for="message">Disposition * :</label>
                          <textarea id="message"  =" " class="form-control" name="disposition" maxlength="1000" ><?php echo $disposition;?> </textarea>
						  <span class="error"> <?php echo $dispositionErr;?></span>
				 
				  <br>
				
				</div>
				
				<!-- Hidden values: Please Ignore -->
                   <input type="text" name="admission" value="walkin" hidden />
				   <input type="text" name="reff1" hidden  />
				   <input type="text" name="reff2" hidden />
                   <input type="text" name="house" hidden/> 
                   <input type="text" name="lot" hidden/> 
                   <input type="text"  name="areff1" hidden /> 
                   <input type="text" name="areff2" hidden /> 
				   <input type="text" name="assestment" hidden /> 
				
				  <br>
				  <center>
				  <input class="btn btn-round btn-danger" name="submit" type="submit">
				  </center>
				
			   </form>

              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
		
		<?php include 'form-footer.php'; ?>
