		<!-- Page Header -->
		<?php include 'choose-header.php'; ?>
		
		<!-- Set service_id -->
		<?php $service_id = '7'; ?>
		
		<!-- Error Handling -->
		<?php include 'error/error-handling.php-3'; ?>
		
		<!-- Get client ID -->
		<?php $client_id = $_GET['client_id']; ?>

		<!-- Query for client -->
		<?php include 'query/query-details.php'; ?>
		
		<!-- Service Error Handling -->
		<?php include 'error/error-handling-dwyna.php'; ?>

		<!-- SQL Insert file -->
		<?php if ($countErr == 1 OR $countErrs == 1) { echo ""; } else { include '../action/choose_dwyna.php'; } ?>

		<!-- Query for client assistance acquirement -->
		<?php include 'query/query-assistance.php'; ?>
	
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
              <!-- Error notif if the client is already acquire another services in the same month -->
			  <?php echo $serviceErr; ?>
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
						<input type="text" class="form-control" name="skill"  maxlength="30" placeholder="Skills/Occupation"  onkeypress="return validateKeyStroke(event)" value="<?php echo $skill;?>" >
						<span class="error"> <?php echo $skillErr;?></span>
				  </div>
				  
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                    <label for="proadd">Estimated Family Income * :</label>
						<input type="text" class="form-control" name="income"  maxlength="30" placeholder="0.00" id="edit1" onchange="make_decimal(this.name, this.value); return 0;" onkeyup="compute_total_amount(); return 0;"; onfocus="if (this.value == '0.00') {this.value = '';}" onblur="if (this.value == '') {this.value = '0.00'; } compute_total_amount();" value="<?php echo $income;?>"   />
						<span class="error"> <?php echo $incomeErr;?></span>
				  </div>
				  
				  </div>
				  
				 <div class="row">
				  
				<p style="font-weight: bold;" >II. Social Worker's Assesment/Problem Presented</p>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label for="type">Type of Abuse * :</label>
						<select class="select2_single form-control" name="type" tabindex="-1"  >
                            <option placeholder="Type of Abuse"></option>
							<option value="Physical Abuse" <?php if ($type == 'Physical Abuse') { echo 'selected'; } ?> >Physical Abuse</option>
							<option value="Sexual Abuse" <?php if ($type == 'Sexual Abuse') { echo 'selected'; } ?> >Sexual Abuse</option>
							<option value="Verbal Abuse" <?php if ($type == 'Verbal Abuse') { echo 'selected'; } ?> >Verbal Abuse</option>
							<option value="Psychological Abuse" <?php if ($type == 'Psychological Abuse') { echo 'selected'; } ?> >Psychological Abuse</option>
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
                          <textarea id="message"  =" " class="form-control" name="disposition" maxlength="1000" ><?php echo $disposition;?></textarea>
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
				  <?php
				  if ($serviceNotif == 1) {
				  	echo '<input class="btn btn-round btn-danger" name="submit" type="submit" disabled="disabled">';
				  } else {
				    echo '<input class="btn btn-round btn-danger" name="submit" type="submit">';
				  }
				  ?>
				  </center>
				
			   </form>

              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
		
		<?php include 'choose-footer.php'; ?>