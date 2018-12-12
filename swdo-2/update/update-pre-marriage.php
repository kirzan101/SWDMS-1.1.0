		<!-- Page Header -->
		<?php include 'update-header.php'; ?>
		
		<!-- Set service_id -->
		<?php $service_id = '8'; ?>
		
		<!-- Get client ID -->
		<?php $count = $_GET['count']; ?>
		
		<!-- Query for client -->
		<?php include 'query/query-pre-marriage.php'; ?>
		
		<!-- Error Handling -->
		<?php include 'error/error-handling-premarriage.php'; ?>

		<!-- SQL Insert file -->
		<?php if ($countErr == 1) { echo ""; } else { include '../action/update_premarriage.php'; } ?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Pre-marriage Counselling</h4>
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

			  <?php $client = '?count='.$count; ?>
			  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].''.$client);?>">
			  
                <div class="row">

				<p style="font-weight: bold; color: blue;" >Man (Lalaki)</p>
				
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
				    <label for="name">First Name * :</label>
                    <input type="text" name="firstnamem" placeholder="First Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $firstnamem;?>" readonly >
					<span class="error"> <?php echo $firstnamemErr;?></span>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Middle Name * :</label>
					<input type="text" name="middlenamem" placeholder="Middle Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $middlenamem;?>" readonly >
					<span class="error"> <?php echo $middlenamemErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Last Name * :</label>
					<input type="text" name="lastnamem" placeholder="Last Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $lastnamem;?>" readonly >
					<span class="error"> <?php echo $lastnamemErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="sex">Sex * :</label>
						<select class="select2_single form-control" name="sexm" tabindex="-1" readonly>
							<option value="Male" selected >Male</option>
						</select>
						<span class="error"> <?php echo $sexmErr;?></span>
                  </div>
				  
				  <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                    <label for="age">Age * :</label>
					<p style="font-weight: bold; font-size: 16px; text-align: center;" ><?php echo $agem; ?></p>
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="bday">Date of Birth * :</label>
					<div class='input-group date' type="date" id='myDatepicker2'>
                            <input type='text' class="form-control" name="bdaym" value="<?php if (empty($bdaym)) { echo "".date("m/d/y").""; } else { echo date('m/d/y', strtotime($bdaym)); } ?>" readonly />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						<span class="error"> <?php echo $bdaymErr;?></span>
                  </div>
				  
				  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                    <label for="bplace">Birthplace * :</label>
					<input type="text" name="bplacem" placeholder="Birthplace" class="form-control" maxlength="50" onkeypress="return validateKeyStrokess(event)" value="<?php echo $bplacem;?>" readonly  >
					<span class="error"> <?php echo $bplacemErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="civil">Civil Status * :</label>
                      <p  >
                        Single:
                        <input type="radio" class="flat" name="civilm" value="Single" <?php if ( isset($civilm) && $civilm == 'Single') { echo 'checked'; }?> /> 
						Married:
                        <input type="radio" class="flat" name="civilm" value="Married"  <?php if ( isset($civilm) && $civilm == 'Married') { echo 'checked'; }?> /> 
						Other:
                        <input type="radio" class="flat" name="civilm" value="Other" <?php if ( isset($civilm) && $civilm == 'Other') { echo 'checked'; }?> />
                      </p>
					  <span class="error"> <?php echo $civilmErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="religion">Religion :</label>
					<input type="text" name="religionm" placeholder="Religion" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $religionm;?>"  >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="tel">Telephone :</label>
					<input type="text" name="telm" placeholder="999-99-99" class="form-control" data-inputmask="'mask': '999-99-99'" maxlength="30" value="<?php if (empty($telephonem)) { echo ""; } else { echo $telephonem; } ?>"  >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="contactno">Contact No. :</label>
					<input type="text" name="contactnom" placeholder="0999-999-9999" class="form-control" data-inputmask="'mask': '9999-999-9999'" maxlength="30" value="<?php if (empty($contactnom)) { echo ""; } else { echo $contactnom; } ?>"  >
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="preadd">Present Address * :</label>
					<input type="text" name="preaddm" placeholder="Present Address" class="form-control" maxlength="50" value="<?php echo $preaddm;?>" readonly >
					<p><i>No./ Building / Street / City/Municipality / District/Province / Region</i></p>
					<span class="error"> <?php echo $preaddmErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="barangay">Barangay * :</label>
					<input type="text" name="barangaym" placeholder="Barangay" class="form-control" maxlength="30" value="<?php echo $barangaym;?>" readonly  >
					<span class="error"> <?php echo $barangaymErr;?></span>
                  </div>
				  
				  <div class="col-md-5 col-sm-4 col-xs-12 form-group">
                    <label for="proadd">Provincial Address * :</label>
					<input type="text" name="proaddm" placeholder="Provincial Address" value="Camarines Sur" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $proaddm;?>" readonly  >
					<span class="error"> <?php echo $proaddmErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="educ">Highest Educational Attainment * :</label>
						<input type="text" class="form-control" name="educm" placeholder="Highest Educational Attainment" onkeypress="return validateKeyStroke(event)"  maxlength="30" value="<?php echo $educm;?>"  >
						<span class="error"> <?php echo $educmErr;?></span>
				  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Philhealth No. :</label>
						<input type="text" class="form-control" name="philnm" style="text-transform: lowercase;" placeholder="xxxx-xxxx-xxxx" data-inputmask="'mask' : '9999-9999-9999'" value="<?php echo $philnm;?>" >
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Skills/Occupation * :</label>
						<input type="text" class="form-control" name="skillm"  maxlength="30" placeholder="Skills/Occupation"  onkeypress="return validateKeyStroke(event)" value="<?php echo $skillm;?>"   >
						<span class="error"> <?php echo $skillmErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Monthly Income * :</label>
						<input type="text" class="form-control" name="mincomem"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal(this.name, this.value); return 0;" onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; }" value="<?php echo $mincomem;?>"   />
						<span class="error"> <?php echo $mincomemErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Estimated Family Income * :</label>
						<input type="text" class="form-control" name="incomem"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal1(this.name, this.value); return 0;"  onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; }" value="<?php echo $incomem;?>"   />
						<span class="error"> <?php echo $incomemErr;?></span>
				  </div>
				  
				  </div>
				  
				<div class="row" >  
				  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="preadd">Address After Marriage * :</label>
					<input type="text" name="afaddm" placeholder="Address After Marriage" class="form-control" maxlength="50" value="<?php echo $afaddm;?>"  >
					<p><i>No./ Building / Street / City/Municipality / District/Province / Region</i></p>
					<span class="error"> <?php echo $afaddmErr;?></span>
                  </div> 
				</div>
				
				
				<!-- Female inputs-->
					
				<div class="row">
				
				<p style="font-weight: bold; color: blue;" >Woman (Babae)</p>
				
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
				    <label for="name">First Name * :</label>
                    <input type="text" name="firstnamef" placeholder="First Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $firstnamef;?>" readonly >
					<span class="error"> <?php echo $firstnamefErr;?></span>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Middle Name * :</label>
					<input type="text" name="middlenamef" placeholder="Middle Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $middlenamef;?>" readonly >
					<span class="error"> <?php echo $middlenamefErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Last Name * :</label>
					<input type="text" name="lastnamef" placeholder="Last Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $lastnamef;?>" readonly >
					<span class="error"> <?php echo $lastnamefErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="sex">Sex * :</label>
						<select class="select2_single form-control" name="sexf" tabindex="-1" readonly>
							<option value="Female" selected >Female</option>
						</select>
						<span class="error"> <?php echo $sexfErr;?></span>
                  </div>
				  
				  <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                    <label for="age">Age * :</label>
					<p style="font-weight: bold; font-size: 16px; text-align: center;" ><?php echo $agef; ?></p>
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="bday">Date of Birth * :</label>
					<div class='input-group date' type="date" id='myDatepicker22'>
                            <input type='text' class="form-control" name="bdayf" value="<?php if (empty($bdayf)) { echo "".date("m/d/y").""; } else { echo date('m/d/y', strtotime($bdayf)); } ?>" readonly  />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						<span class="error"> <?php echo $bdayfErr;?></span>
                  </div>
				  
				  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                    <label for="bplace">Birthplace * :</label>
					<input type="text" name="bplacef" placeholder="Birthplace" class="form-control" maxlength="50" onkeypress="return validateKeyStrokess(event)" value="<?php echo $bplacef;?>" readonly  >
					<span class="error"> <?php echo $bplacefErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="civil">Civil Status * :</label>
                      <p  >
                        Single:
                        <input type="radio" class="flat" name="civilf" value="Single" <?php if ( isset($civilf) && $civilf == 'Single') { echo 'checked'; }?> /> 
						Married:
                        <input type="radio" class="flat" name="civilf" value="Married"  <?php if ( isset($civilf) && $civilf == 'Married') { echo 'checked'; }?> /> 
						Other:
                        <input type="radio" class="flat" name="civilf" value="Other" <?php if ( isset($civilf) && $civilf == 'Other') { echo 'checked'; }?> />
                      </p>
					  <span class="error"> <?php echo $civilfErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="religion">Religion :</label>
					<input type="text" name="religionf" placeholder="Religion" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $religionf;?>"  >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="tel">Telephone :</label>
					<input type="text" name="telf" placeholder="999-99-99" class="form-control" data-inputmask="'mask': '999-99-99'" maxlength="30" value="<?php if (empty($telephonef)) { echo ""; } else { echo $telephonef; } ?>"  >
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="contactno">Contact No. :</label>
					<input type="text" name="contactnof" placeholder="0999-999-9999" class="form-control" data-inputmask="'mask': '9999-999-9999'" maxlength="30" value="<?php if (empty($contactnof)) { echo ""; } else { echo $contactnof; } ?>"  >
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="preadd">Present Address * :</label>
					<input type="text" name="preaddf" placeholder="Present Address" class="form-control" maxlength="50" value="<?php echo $preaddf;?>" readonly >
					<p><i>No./ Building / Street / City/Municipality / District/Province / Region</i></p>
					<span class="error"> <?php echo $preaddfErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="barangay">Barangay * :</label>
					<input type="text" name="barangayf" placeholder="Barangay" class="form-control" maxlength="30" value="<?php echo $barangayf;?>" readonly  >
					<span class="error"> <?php echo $barangayfErr;?></span>
                  </div>
				  
				  <div class="col-md-5 col-sm-4 col-xs-12 form-group">
                    <label for="proadd">Provincial Address * :</label>
					<input type="text" name="proaddf" placeholder="Provincial Address" value="Camarines Sur" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $proaddf;?>" readonly  >
					<span class="error"> <?php echo $proaddfErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="educ">Highest Educational Attainment * :</label>
						<input type="text" class="form-control" name="educf" placeholder="Highest Educational Attainment" onkeypress="return validateKeyStroke(event)"  maxlength="30" value="<?php echo $educf;?>"  >
						<span class="error"> <?php echo $educfErr;?></span>
				  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Philhealth No. :</label>
						<input type="text" class="form-control" name="philnf" style="text-transform: lowercase;" placeholder="xxxx-xxxx-xxxx" data-inputmask="'mask' : '9999-9999-9999'" value="<?php echo $philnf;?>" >
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Skills/Occupation * :</label>
						<input type="text" class="form-control" name="skillf"  maxlength="30" placeholder="Skills/Occupation"  onkeypress="return validateKeyStroke(event)" value="<?php echo $skillf;?>"   >
						<span class="error"> <?php echo $skillfErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Monthly Income * :</label>
						<input type="text" class="form-control" name="mincomef"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal(this.name, this.value); return 0;" onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; }" value="<?php echo $mincomef;?>"   />
						<span class="error"> <?php echo $mincomefErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Estimated Family Income * :</label>
						<input type="text" class="form-control" name="incomef"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal1(this.name, this.value); return 0;"  onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; }" value="<?php echo $incomef;?>"   />
						<span class="error"> <?php echo $incomefErr;?></span>
				  </div>
				  
				  </div>
				
				<div class="row" >  
				  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="preadd">Address After Marriage * :</label>
					<input type="text" name="afaddf" placeholder="Address After Marriage" class="form-control" maxlength="50" value="<?php echo $afaddf;?>"  >
					<p><i>No./ Building / Street / City/Municipality / District/Province / Region</i></p>
					<span class="error"> <?php echo $afaddfErr;?></span>
                  </div> 
				</div>
				
				<div class="row">
				
				<div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="bday">Date of Marriage * :</label>
					<div class='input-group date' type="date" id='myDatepicker222'>
                            <input type='text' class="form-control" name="marriage_date" value="<?php if (empty($marriage_date)) { echo "".date("m/d/y").""; } else { echo date('m/d/y', strtotime($marriage_date)); } ?>"  />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						<span class="error"> <?php echo $marriage_dateErr;?></span>
                </div>
				
				</div>
				
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
		
		<?php include 'update-footer.php'; ?>