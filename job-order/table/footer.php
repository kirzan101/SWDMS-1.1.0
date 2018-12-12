        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Social Welfare and Development Management System - Canaman &copy 2018
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
	
		<script>
	    function setTime() {
    var d = new Date(),
      el = document.getElementById("time");

      el.innerHTML = formatAMPM(d);

    setTimeout(setTime, 1000);
    }

    function formatAMPM(date) {
      var hours = date.getHours(),
        minutes = date.getMinutes(),
        seconds = date.getSeconds(),
        ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
      return strTime;
    }

    setTime();
	
	// Modal Link for choosing services
	
	$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
	 
	 var myidtoinsert = eventId;
document.getElementById("link1").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link2").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link3").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link4").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link5").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link7").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link12").href += myidtoinsert;

	var myidtoinsert = eventId;
document.getElementById("link13").href += myidtoinsert;

});


<!-- For Default sort to Descending-->

$('#datatable').dataTable({
    "order": [[0, "desc"], [1, "desc"]]
});

var table = $('#datatable').DataTable();
 
// #column3_search is a <input type="text"> element
$('#myInput').on( 'keyup', function () {
    table
        .columns( 1 )
        .search( this.value )
        .draw();
} );


$(document).ready(function() {
   var table =  $('#datatable').DataTable();
    
     $('#myInput1').on('change', function () {
                    table.columns(6).search( this.value ).draw();
                } );
});

function myFunctionss() {
    document.getElementById("link1").removeAttribute("href"); 
	document.getElementById("link1").setAttribute("href","../choose/choose-aics.php?serivice_id=1&&client_id=");
	document.getElementById("link2").removeAttribute("href"); 
	document.getElementById("link2").setAttribute("href","../choose/choose-aics.php?serivice_id=2&&client_id="); 
	document.getElementById("link3").removeAttribute("href"); 
	document.getElementById("link3").setAttribute("href","../choose/choose-aics.php?serivice_id=3&&client_id="); 
	document.getElementById("link4").removeAttribute("href"); 
	document.getElementById("link4").setAttribute("href","../choose/choose-aics.php?serivice_id=4&&client_id="); 
	document.getElementById("link5").removeAttribute("href"); 
	document.getElementById("link5").setAttribute("href","../choose/choose-aics.php?serivice_id=5&&client_id="); 
	document.getElementById("link7").removeAttribute("href"); 
	document.getElementById("link7").setAttribute("href","../choose/choose-dascpd.php?client_id="); 
	document.getElementById("link12").removeAttribute("href"); 
	document.getElementById("link12").setAttribute("href","../choose/choose-pwd.php?client_id="); 
	document.getElementById("link13").removeAttribute("href"); 
	document.getElementById("link13").setAttribute("href","../choose/choose-solo-parent.php?client_id="); 
}

  
  $(document).ready(function(){
      $('#checkAll').click(function(){
         if(this.checked){
             $('.checkbox').each(function(){
                this.checked = true;
             });   
         }else{
            $('.checkbox').each(function(){
                this.checked = false;
             });
         } 
      });


    $('#delete').click(function(){
       var dataArr  = new Array();
       if($('input:checkbox:checked').length > 0){
          $('input:checkbox:checked').each(function(){
              dataArr.push($(this).attr('id'));
              $(this).closest('tr').remove();
          });
          sendResponse(dataArr)
       }else{
         alert('No record selected ');
       }

    });  


    function sendResponse(dataArr){
        $.ajax({
            type    : 'post',
            url     : '../action/delete_function.php',
            data    : {'data' : dataArr}                
        });
    }

  });
	</script>

  </body>
</html>
