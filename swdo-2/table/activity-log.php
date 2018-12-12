        <!-- Page Header -->
		<?php include 'header.php'; ?>

		<?php
		include "../../db_connect.php";

		$sql = "SELECT * FROM activity_log";
		$result = $con->query($sql);
		?>
		
		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>SWDMS - Canaman</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <h4>
				  <span id='time'></span>
                  <?php 
				  date_default_timezone_set("Asia/Manila");
				  echo " | " . date("M d,Y") . "<br>"; 
				  ?>
				  </h4>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Activity Log</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th><center>Activity Date & Time</center></th>
									<th><center>Description</center></th>
								</tr>
							</thead>

							<tbody>
							<?php while($rows = mysqli_fetch_array($result)) { ?>
								<tr>
									<td><center><?php echo date( "M d,Y h:i:s", strtotime( $rows['activity_date'] )); ?></center></td>
									<td><?php echo $rows['details']; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- /page content -->
		
		<!-- Page Footer -->
		<?php include 'footer.php'; ?>