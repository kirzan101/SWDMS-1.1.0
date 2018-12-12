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
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley 
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>-->
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

<!-- Start Additional Script -->
<script>
// Validation for number input
$(document).ready(function(){
    $('[id^=edit]').keypress(validateNumber);
});

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
    	return true;
    }
};
// Add coma or decimal in integer value
  function make_decimal(ElementId, val){
    var id = ElementId.toString();
    var val = parseInt(val);

    if((val < 0) || isNaN(val)){
       document.getElementsByName(id)[0].value = 0.00.toFixed(2);
    }
    else{
      document.getElementsByName(id)[0].value = val.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      
    }
  }

  function make_decimal1(ElementId, val){
    var id = ElementId.toString();
    var val = parseInt(val);

    if((val < 0) || isNaN(val)){
       document.getElementsByName(id)[0].value = 0.00.toFixed(2);
    }
    else{
      document.getElementsByName(id)[0].value = val.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      
    }
  }


$(document).ready(function(){
    $('[id^=decimal]').keypress(validateNumber);
});

  function make_decimal1(ElementId, val){
    var id = ElementId.toString();
    var val = parseInt(val);

    if((val < 0) || isNaN(val)){
       document.getElementsByName(id)[0].value = 0.00.toFixed(2);
    }
    else{
      document.getElementsByName(id)[0].value = val.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      
    }


  }

    <!-- Custom Theme Scripts -->

    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'MM/DD/YYYY'
    });
	
	$('#myDatepicker22').datetimepicker({
        format: 'MM/DD/YYYY'
    });
	
	$('#myDatepicker222').datetimepicker({
        format: 'MM/DD/YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });

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

	// Age computation
function submitBday() {
    var Q4A = "";
    var Bdate = document.getElementById('bday').value;
    var Bday = +new Date(Bdate);
    Q4A += + " " + ~~ ((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('resultBday');
    theBday.innerHTML = Q4A;
}

function submitBday2() {
    var Q4A = "";
    var Bdate = document.getElementById('bday').value;
    var Bday = +new Date(Bdate);
    Q4A += + " " + ~~ ((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('resultBday2');
    theBday.innerHTML = Q4A;
}


$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('*Password is match.').css('color', 'green');
  } else 
    $('#message').html('*Password is not match.').css('color', 'red');
});
// Block the number input
function validateKeyStrokes(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if ("></\"=:;\!?<>.,+_'{'}[]|#$%^*()@".indexOf(chr) >= 0) { //if(!(charCode >= 65 && charCode <= 120) && (charCode != 32 && charCode != 0)){
        return false;
    }
    return true;
}

// Block the input of special characters
document.getElementById("explicit-block-txt").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("></\"=:;!?<>.,+_'{'}[]|#$%^*()@1234567890".indexOf(chr) >= 0)
        return false;
};

// Block the input of special characters and numbers
function validateKeyStroke(event) {
    var chr = String.fromCharCode(event.which);
    if ("></\"=:;\!?<>.,+_'{'}[]|#$%^*()@1234567890".indexOf(chr) >= 0) {
        return false;
    }
    return true;
}

// Wizard Scripts
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
<!-- Date Range Query-->
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'mm-dd-yy'
	});

	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"general_reports_range.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#result').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
<!-- End Additional scripts-->
	
  </body>
</html>