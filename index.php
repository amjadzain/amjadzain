
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap-select.css">
  <script src="js/bootstrap-select.js"></script>
   <script>
function populateEndDate() {
  var date2 = $('#dateStart').datepicker('getDate');
  date2.setDate(date2.getDate()); <!--date2.setDate(date2.getDate() + 1);-->
  $('#dateEnd').datepicker('setDate', date2);
  $("#dateEnd").datepicker("option", "minDate", date2);
}

$(document).ready(function() {

  $("#dateStart").datepicker({
    dateFormat: "yy-mm-dd",
    minDate: '01-01-1800', <!--'daytoday'-->
    onSelect: function(date) {
      populateEndDate();
    }
  }).datepicker("setDate", new Date());
  $('#dateEnd').datepicker({
    dateFormat: "yy-mm-dd",
    minDate: 1,
    onClose: function() {
      var dt1 = $('#dateStart').datepicker('getDate');
      var dt2 = $('#dateEnd').datepicker('getDate');
      if (dt2 <= dt1) {
        var minDate = $('#dateEnd').datepicker('option', 'minDate');
        $('#dateEnd').datepicker('setDate', minDate);
      }
    }
  }).datepicker("setDate", new Date());
});
</script>
    </head>
    <body>
	<div class="w3-container">
            <h1>Search and Filter</h1>
            <form action="" method="post">

            <input type="text" name="fromdate" id="dateStart" placeholder="From Date">

            <input type="text" name="todate" id="dateEnd" placeholder="To Date">


            <input type="submit" name="submit" value="Search" class="btn btn-danger">

        </form>
		</div>
        <div class="w3-container">
            <h1>Employees</h1>
            <table class="w3-table w3-bordered w3-striped">
                <thead>
                    <tr>
                        <th>userID</th>
            <th>userName</th>
            <th>userProfession</th>
			<th>userPic</th>
           <th>test_dt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                require_once 'getbl.php';
                echo $tableContent;
                
                ?>
                </tbody>
            </table>
		</div>
    </body>

</html>