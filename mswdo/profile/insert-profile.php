		<!-- Page Header -->
		<?php include 'profile-header.php'; ?>
		
		<!-- Error Handling -->
		<?php include 'error-handling.php'; ?>

		<!-- SQL Insert file -->
		<?php if ($countErr == 1) { echo ""; } else { include 'update.php'; } ?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Profile</h4>
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
                <h2><b>Add User</b></h2>				  
				
                <div class="clearfix"></div>
				
              </div>
              <div class="x_content">

			  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="firstname" id="first-name" ="required" class="form-control col-md-7 col-xs-12" value="<?php echo $firstname; ?>">
						  <span class="error"  ><?php echo $firstnameErr; ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name <span class="required">*</span>
						</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middlename" value="<?php echo $middlename; ?>">
						  <span class="error" ><?php echo $middlenameErr; ?></span>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="lastname" ="required" class="form-control col-md-7 col-xs-12" value="<?php echo $lastname; ?>">
						  <span class="error" ><?php echo $lastnameErr; ?></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="edit1" name="contactno" ="required" maxlength="11" class="form-control col-md-7 col-xs-12" value="<?php echo $contactno; ?>">
						  <span class="error" ><?php echo $contactnoErr; ?></span>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Position <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="position" class="form-control col-md-7 col-xs-12">
							<option></option>
							<option value="SWDO II" <?php if ( $position == 'SWDO II' ) { echo 'selected'; } ?> >SWDO II</option>
							<option value="Admin Aide" <?php if ( $position == 'Admin Aide' ) { echo 'selected'; } ?> >Admin Aide</option>
							<option value="DCW" <?php if ( $position == 'DCW' ) { echo 'selected'; } ?> >DCW</option>
							<option value="Job Order" <?php if ( $position == 'Job Order' ) { echo 'selected'; } ?> >Job Order</option>
						  </select>
						  <span class="error" ><?php echo $positionErr; ?></span>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $passwords; ?>" id="password" >
						  <span class="error" ><?php echo $passwordErr; ?></span>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Re-type Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="re-password" class="form-control col-md-7 col-xs-12" value="<?php echo $passwords; ?>" id="confirm_password" > <!-- <span  id='message'></span> -->
						  <span id='message'></span><br>
						  <span class="error" ><?php echo $passwordErr; ?></span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary" type="button" href="index.php" >Cancel</a>
                          <button type="submit" id="submit" name="submit" class="btn btn-success">Create</button>
                        </div>
                      </div>
					  <br><br><br><br><br><br><br><br><br><br><br>

              </form>

              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
		
		<?php include 'profile-footer.php'; ?>