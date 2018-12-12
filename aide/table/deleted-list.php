
        <!-- header content -->
<?php include 'header.php'; ?>
        <!-- /header content -->

<?php
    include "../../db_connect.php";

      $sql = "SELECT * FROM client WHERE status = 'DELETED' ";
	  // SELECT * FROM client c INNER JOIN services s, interview i WHERE s.service_id = c.service_id AND i.client_id = c.client_id

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
		<!-- Table Start-->	
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2><b>Deleted List</b></h2>
					<div class="col-md-2 col-sm-5 col-xs-12 pull-right">
					<!--<a type="button" class="btn btn-round btn-danger" href="index.php"><i class="fa fa-refresh"> Refresh list</i></a>-->
					</div>
                    <div class="clearfix"></div>
                  </div> 
				 <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Household ID</th>
						  <th>Name</th>
						  <th>Age</th>
                          <th>Sex</th>
						  <th>Address</th>
						  <th>Restore</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php while($rows = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $rows['household_id'] ?></td>
							<td><?php echo $rows['last_name'].', '.$rows['first_name']; ?></td>
							<td><?php echo $rows['age'] ?></td>
							<td><?php echo $rows['sex'] ?></td>
							<td><?php echo $rows['address'] ?></td>
							<td style="text-align: center;"><a type="button" class="btn btn-success btn-xs" href="undelete-client.php?client_id=<?php echo $rows['client_id']; ?>&&worker_id=<?php echo $worker_id; ?>" >Restore</a></td>	
						
						</tr>	
						<?php } ?>
                      </tbody>
                    </table>
					
                  </div>
				  </div>
				  </div>
				  <!-- /Table-->
                </div>
				
        </div>
        <!-- /page content -->
		
 
         <!-- footer content -->
<?php include 'footer.php'; ?>
        <!-- /footer content -->