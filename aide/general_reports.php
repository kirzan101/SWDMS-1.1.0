        <!-- header content -->
<?php include 'table-header.php'; ?> <!-- UNFINISH! EDIT QUERY OF SERVICE COUNT  -->
        <!-- /header content -->


<?php

// Connect to MySQL DB
include "../db_connect.php";
    
?>

<style>
th, p {
  text-align: center;
  vertical-align: middle;   
}

input[type="date"]::before { 
  content: attr(data-placeholder);
  width: 100%;
}

input[type="date"]:focus::before,
input[type="date"]:valid::before { display: none }

</style>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>SWDMS - Canaman</h3>
              </div>

              <div class="title_right"> <!-- Display Time && Date -->
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <h4>
          <span id='time'></span> <!-- JS Active Time -->
                  <?php 
          date_default_timezone_set("Asia/Manila");
          echo " | " . date("M d,Y") . "<br>"; // Display Current Date
          ?>
        </h4>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
          <div align="left">
            <div class="col-md-4">
            <h2><b>General Report</b></h2>
                      </div>
                      <div class="col-md-4">
                      </div>
                      <div align="right" class="col-md-4">
                        <!--<a class="btn btn-round btn-danger" onclick="openInNewTab('../dompdf/print_general_reports.php');"><i class="fa fa-print"></i> Print</a>-->
                      </div>
          </div>
          
          <div class="clearfix"></div>
                  </div>
          <form target="_blank" action="../dompdf/print_general_reports.php" method="get">
          <div class="col-md-12" style="float:right;">
          <div class="col-md-3">
          <input type="date" name="From" id="From" class="form-control" placeholder="From Date" required /> <!-- data-inputmask="'mask': '99/99/9999'" -->
          </div>
          <div class="col-md-3">
          <input type="date" name="to" id="to" class="form-control" placeholder="To Date" required />
          </div>
          <div class="col-md-3">
          <input type="button" name="range" id="range" value="Range" class="btn btn-round btn-danger" required />
          </div>
          <div align="right" class="col-md-3">
          <input type="submit" class="btn btn-round btn-danger" value="Print">
          </div>
          </div>
          </form>
          <div id="result">
          <br>
                 <table class="table table-bordered">
<thead>
  <tr>
    <th>Sevices</th>
    <th colspan="3">No. of Client</th>
    <th>Amount</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td></td>
    <td>Male</td>
    <td>Female</td>
    <td>Couple</td>
    <td></td>
  </tr>
  <tr>
    <td><b>Pre-marriage Counselling</b></td>
    <td></td>
    <td></td>
    <td><p><?php $sql =  "SELECT * FROM client_couple"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countc = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Social Case Study</b></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 13 AND l.service_id = 13 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm1 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 13 AND l.service_id = 13 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf1 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Children in Conflict with the Law</b></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 6 AND l.service_id = 6 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm2 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 6 AND l.service_id = 6 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf2 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Referral to Other Agency</b></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 12 AND l.service_id = 12 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm3 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 12 AND l.service_id = 12 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf3 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Livelihood Assistance</b></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 11 AND l.service_id = 11 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm4 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 11 AND l.service_id = 11 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf4 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="5"><b>Disadvantaged Women, Youth & Othe Needy Adult</b></td>
  </tr>
  <tr>
    <td>&nbsp; Physical Abuse</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Physical Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm5 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Physical Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf5 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Sexual Abuse</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Sexual Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm6 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Sexual Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf6 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Verbal Abuse</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Verbal Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm7 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Verbal Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf7 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Psychological Abuse</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Psychological Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm8 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Psychological Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf8 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Emotional Abuse</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Emotional Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm9 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Emotional Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf9 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Economic/Financial Abuse</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND d.interview_id = l.interview_id AND l.service_id = 7 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Economic/Financial Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm10 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_dwyna_details d WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 7 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND d.type_of_abuse = 'Economic/Financial Abuse'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf10 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Certificate of Indigency</b></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 14 AND c.sex = 'Male' AND c.status = 'ACTIVE'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm11 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND l.service_id = 14 AND c.sex = 'Female' AND c.status = 'ACTIVE'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf11 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="5"><b>Issuance of Solo Parent and PWD ID</b></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp; Solo Parent</td>
  </tr>
  <tr>
    <td>&nbsp; &nbsp; A - Upper Class</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND c.status = 'ACTIVE' AND s.income_monthly >= 50000.00"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm12 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND c.status = 'ACTIVE' AND s.income_monthly >= 50000.00"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf12 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; &nbsp; B - Middle Class</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND c.status = 'ACTIVE' AND s.income_monthly BETWEEN 10001.00 AND 49999.00"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm13 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND c.status = 'ACTIVE' AND s.income_monthly BETWEEN 10001.00 AND 49999.00"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf13 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; &nbsp; C - Indigent</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND c.status = 'ACTIVE' AND s.income_monthly <= 10000.00"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm14 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_solo_details s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND c.status = 'ACTIVE' AND s.income_monthly <= 10000.00"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf14 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp; Person with Disability (PWD)</td>
  </tr>
  <tr>
    <td>&nbsp; &nbsp; Minor: 0-18</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.details = 'Person with Disability ID' AND c.age <= 18"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm15 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.details = 'Person with Disability ID' AND c.age <= 18"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf15 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; &nbsp; Adult: 19-59</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.details = 'Person with Disability ID' AND c.age BETWEEN '19' AND '59' "; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm16 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.details = 'Person with Disability ID' AND c.age BETWEEN '19' AND '59' "; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf16 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; &nbsp; Senior Citizen: 60+</td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Male' AND s.details = 'Person with Disability ID' AND c.age >= 60"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm17 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM interview_log l INNER JOIN client c, interview i, client_pwd_solo s WHERE l.client_id = c.client_id AND l.interview_id = i.interview_id AND s.client_id = c.client_id AND i.interview_id = s.interview_id AND c.sex = 'Female' AND s.details = 'Person with Disability ID' AND c.age >= 60"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf17 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Aid to Individual in Crisis Situation</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Burial Assistance</td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 1 AND l.service_id = 1 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm18 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 1 AND l.service_id = 1 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf18 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 1 AND l.service_id = 1 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id  "; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total1 = $row['total']; } ?></p></td>
  </tr>
  <tr>
    <td>&nbsp; Educational Assistance</td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 2 AND l.service_id = 2 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount);  $countm19 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 2 AND l.service_id = 2 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf19 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 2 AND l.service_id = 2 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id  "; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total2 = $row['total']; } ?></p></td>
  </tr>
  <tr>
    <td>&nbsp; Food Assistance</td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 3 AND l.service_id = 3 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm20 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 3 AND l.service_id = 3 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf20 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 3 AND l.service_id = 3 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id  "; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total3 = $row['total']; } ?></p></td>
  </tr>
  <tr>
    <td>&nbsp; Medical Assistance</td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 4 AND l.service_id = 4 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm21 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 4 AND l.service_id = 4 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf21 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 4 AND l.service_id = 4 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id  "; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total4 = $row['total']; } ?></p></td>
  </tr>
  <tr>
    <td>&nbsp; Transportation Assistance</td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 5 AND l.service_id = 5 AND c.sex = 'Male' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm22 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 5 AND l.service_id = 5 AND c.sex = 'Female' AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf22 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, interview_log l WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 5 AND l.service_id = 5 AND c.status = 'ACTIVE' AND i.interview_id = l.interview_id  "; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total5 = $row['total']; } ?></p></td>
  </tr>
  <tr>
    <td><b>PWD and Senior Citizen Death Aid</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp; Person with Disability</td>
    <td><p><?php $sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Male'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND d.category = 'Person with Disability'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm23 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Female'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND d.category = 'Person with Disability'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf23 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, client_death_aid_details d WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 10 AND c.status = 'ACTIVE' AND i.interview_id = d.interview_id AND d.category = 'Person with Disability'  "; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total6 = $row['total']; } ?></p></td>
 </tr>
  <tr>
    <td>&nbsp; Senior Citizen</td>
   <td><p><?php $sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Male'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND  d.category = 'Senior Citizen';"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countm24 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td><p><?php $sql =  "SELECT * FROM assistance a  INNER JOIN client c,  interview i,  client_death_aid_details d  WHERE a.client_id = c.client_id  AND  a.interview_id = i.interview_id  AND  a.interview_id = d.interview_id  AND  a.service_id = 10  AND  c.sex = 'Female'  AND  c.status = 'ACTIVE'  AND  i.interview_id = d.interview_id  AND  d.category = 'Senior Citizen'"; if ($result=mysqli_query($con,$sql)) { $rowcount=mysqli_num_rows($result); printf($rowcount); $countf24 = $rowcount; mysqli_free_result($result); } ?></p></td>
    <td></td>
    <td><p><?php $sql =  "SELECT sum(amount) as total FROM assistance a INNER JOIN client c, interview i, client_death_aid_details d WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id AND a.service_id = 10 AND c.status = 'ACTIVE' AND i.interview_id = d.interview_id AND d.category = 'Senior Citizen'"; $result = $con->query($sql); while ($row = $result->fetch_assoc()) { echo $row['total']; $total7 = $row['total']; } ?></p></td>
  </tr>
 <tr>
  <?php $totalc = $countc; ?>
  <?php $totalm = $countm1 + $countm2 + $countm3 + $countm4 + $countm5 + $countm6 + $countm7 + $countm8 + $countm9 + $countm10 + $countm11 + $countm12 + $countm13 + $countm14 + $countm15 + $countm16 + $countm17 + $countm18 + $countm19 + $countm20 + $countm21 + $countm22 + $countm23 + $countm24; ?>
  <?php $totalf = $countf1 + $countf2 + $countf3 + $countf4 + $countf5 + $countf6 + $countf7 + $countf8 + $countf9 + $countf10 + $countf11 + $countf12 + $countf13 + $countf14 + $countf15 + $countf16 + $countf17 + $countf18 + $countf19 + $countf20 + $countf21 + $countf22 + $countf23 + $countf24; ?>
  <?php $totala = $total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7; ?>
    <td><b>Total</b></td>
    <td><p><b><?php echo $totalm; ?></b></p></td>
    <td><p><b><?php echo $totalf; ?></b></p></td>
    <td><p><b><?php echo $totalc; ?></b></p></td>
    <td><p><b><?php echo number_format("$totala",2); ?></b></p></td>
  </tr>
</tbody>
</table>
        </div>
        </div>
        </div>
            </div>
          </div>
        </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
<?php include 'table-footer.php'; ?>
        <!-- /footer content -->