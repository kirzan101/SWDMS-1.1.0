		<!-- Page Header -->
		<?php include 'choose-header.php'; ?>
		
		<!-- Set service_id -->
		<?php $service_id = '10'; ?>
		
		<!-- Error Handling -->
		<?php include 'error/error-handling.php'; ?>
		
		<!-- Get client ID -->
		<?php $client_id = $_GET['client_id']; ?>

		<!-- Query for client -->
		<?php include 'query/query-details.php'; ?>
		
		<!-- Service Error Handling -->
		<?php include 'error/error-handling-dascpd.php'; ?>

		<!-- SQL Insert file -->
		<?php if ($countErr == 1 OR $countErrs == 1) { echo ""; } else { include '../action/choose_dascpd.php'; } ?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Death Aid of Senior Citizen & Person with Disability</h4>
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

			  <?php $client = '?client_id='.$client_id; ?>
			  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].''.$client);?>">
			  <!-- Hidden values -->
                <div class="row">

				<p style="font-weight: bold;" >I. Identifying Information</p>
                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
				    <label for="name">First Name * :</label>
                    <input type="text" name="firstname" placeholder="First Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $firstname;?>" readonly >
					<span class="error"> <?php echo $firstnameErr;?></span>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Middle Name * :</label>
					<input type="text" name="middlename" placeholder="Middle Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $middlename;?>" readonly >
					<span class="error"> <?php echo $middlenameErr;?></span>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="name">Last Name * :</label>
					<input type="text" name="lastname" placeholder="Last Name" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $lastname;?>" readonly >
					<span class="error"> <?php echo $lastnameErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				   <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                    <label for="sex">Sex * :</label>
					<input type="text" name="sex" placeholder="Sex" class="form-control" maxlength="30" onkeypress="return validateKeyStroke(event)" value="<?php echo $sex;?>" readonly >
					<span class="error"> <?php echo $sexErr;?></span>
                  </div>
				  
				  <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                    <label for="age">Age * :</label>
					<p style="font-weight: bold; font-size: 16px; text-align: center;" ><?php echo $age; ?></p>
                  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="bday">Date of Birth * :</label>
					<div class='input-group date' type="date" id='myDatepicker2'>
                            <input type='text' class="form-control" name="bday" id="bday" value="<?php if (empty($bday)) { echo "".date("m/d/y").""; } else { echo date('m/d/y', strtotime($bday)); } ?>" onblur="submitBday()" onkeyup="submitBday()"  readonly />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						<span class="error"> <?php echo $bdayErr;?></span>
                  </div>
				  
				  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                    <label for="bplace">Birthplace * :</label>
					<input type="text" name="bplace" placeholder="Birthplace" class="form-control" maxlength="50" onkeypress="return validateKeyStrokess(event)" value="<?php echo $bplace;?>" readonly  >
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
					<input type="text" name="preadd" placeholder="Present Address" class="form-control" maxlength="50" value="<?php echo $preadd;?>" readonly  >
					<p><i>No./ Building / Street / City/Municipality / District/Province / Region</i></p>
					<span class="error"> <?php echo $preaddErr;?></span>
                  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="barangay">Barangay * :</label>
					<input type="text" name="barangay" placeholder="Barangay" class="form-control" maxlength="30" value="<?php echo $barangay;?>" readonly  >
					<span class="error"> <?php echo $barangayErr;?></span>
                  </div>
				  
				  <div class="col-md-8 col-sm-4 col-xs-12 form-group">
                    <label for="proadd">Provincial Address * :</label>
					<input type="text" name="proadd" placeholder="Provincial Address" value="Camarines Sur" class="form-control" onkeypress="return validateKeyStroke(event)" maxlength="30" value="<?php echo $proadd;?>" readonly  >
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
						<input type="text" class="form-control" name="skill"  maxlength="30" placeholder="Skills/Occupation"  onkeypress="return validateKeyStroke(event)" value="<?php echo $skill;?>"   >
						<span class="error"> <?php echo $skillErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Estimated Family Income * :</label>
						<input type="text" class="form-control" name="income"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal(this.name, this.value); return 0;" onkeyup="compute_total_amount(); return 0;"; onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; } compute_total_amount();" value="<?php echo $income;?>"   />
						<span class="error"> <?php echo $incomeErr;?></span>
				  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-3 col-sm-12 col-xs-12">
                    <label for="admission">Type of Admission * :</label>
                      <p  >
                        Walk-in:
                        <input type="radio" class="flat" name="admission" value="walkin" <?php if ($admission == 'walkin') { echo 'checked'; } ?> /> &nbsp;&nbsp;&nbsp;
						Referral:
                        <input type="radio" class="flat" name="admission" value="referral" <?php if ($admission == 'referral') { echo 'checked'; } ?> /> 
                      </p>
					  <span class="error"> <?php echo $admissionErr;?></span>
                  </div>

				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="">Referring Party (1) :</label>
						<input type="text" class="form-control" placeholder="Referring Party (1)" maxlength="30" onkeypress="return validateKeyStrokes(event)"  name="reff1" value="<?php echo $reff1;?>"  />
				  </div>
				  
				  <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                    <label for="">Referring Party (2) :</label>
						<input type="text" class="form-control"  placeholder="Referring Party (2)" maxlength="30" onkeypress="return validateKeyStrokes(event)" name="reff2" value="<?php echo $reff2;?>" />
				  </div>
				  
				  </div>
				  
				  <div class="row">
				  
				  <div class="col-md-4 col-sm-12 col-xs-12">
                    <label for="ownership">Ownership :</label>
                      <p>
                        <label>A. House:</label>
                        <input type="text" class="form-control"  placeholder="House" maxlength="20" onkeypress="return validateKeyStrokes(event)" name="house" value="<?php echo $house;?>" /> 
					  </p>
					  <p>
						<label>B. Lot:</label>
                        <input type="text" class="form-control" placeholder="Lot"  maxlength="20" onkeypress="return validateKeyStrokes(event)" name="lot" value="<?php echo $lot;?>" /> 
                      </p>
                  </div>

				  <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                    <label for="">Address/Contact # of the reffering party:</label>
					  <p>
                        <label>(Referring Party 1)</label>
                        <input type="text" class="form-control" placeholder="(Referring Party 1)"  maxlength="20" onkeypress="return validateKeyStrokess(event)" name="areff1" value="<?php echo $areff1;?>" /> 
					  </p>
					  <p>
						<label>(Referring Party 2)</label>
                        <input type="text" class="form-control" placeholder="(Referring Party 2)"  maxlength="20" onkeypress="return validateKeyStrokess(event)" name="areff2" value="<?php echo $areff2;?>" /> 
                      </p>
				  </div>
				  <br>

                </div>
				  
				 <div class="row">
				  
				 <p style="font-weight: bold;" >II. Social Worker's Assessment/Problem Presented</p>
				 
				 <label for="message">Assessment * :</label>
                          <textarea id="message"  =" " class="form-control" name="assestment" maxlength="1000" ><?php echo $assestment;?> </textarea>
						  <span class="error"> <?php echo $assestmentErr;?></span>
				 
				  <br>
				 
				 <p style="font-weight: bold;" >III. Assistance to be given</p>
				 
				 <!-- Start row-->
				  <div class="row">
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="category">Type of Client * :</label>
						<select class="select2_single form-control" name="category" tabindex="-1"  >
                            <option></option>
							<option value="Senior Citizen" <?php if ($category == 'Senior Citizen') { echo 'selected'; } ?> >Senior Citizen</option>
							<option value="Person with Disability" <?php if ($category == 'Person with Disability') { echo 'selected'; } ?> >Person with Disability</option>
						</select>
						<span class="error"> <?php echo $categoryErr;?></span>
                  </div>
				  
				  <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                    <label for="">Name of Deceased * :</label>
						<input type="text" class="form-control"  placeholder="Name of Deceased" maxlength="50" onkeypress="return validateKeyStrokes(event)" name="name_of_deceased" value="<?php echo $name_of_deceased;?>" />
						<span class="error"> <?php echo $name_of_deceasedErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="amount">Amount * :</label>
					<input type="text" class="form-control" maxlength="20" name="amount" value="" id="edit1" placeholder="0.00" onchange="make_decimal1(this.name, this.value); return 0;"  onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; }" value="<?php echo $amount;?>"    />
					<span class="error"> <?php echo $amountErr;?></span>
				  </div>
                  </div>
				  <!-- End row-->
				  
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
		
		<?php include 'choose-footer.php'; ?>
