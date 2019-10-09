<?php
 
require_once '../db/connect.php';    // connect to Database
 
try {
	$tableContent = '';
	if(isset($_POST['submit']))
{
	$tableContent = '';
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$sql1 = "select nv.priref AS nvpriref,
 n.b.value('.','nvarchar(100)') AS RecCreator,
n2.b.value('.','nvarchar(100)') AS TimeCreate,
n3.b.value('.','nvarchar(100)') AS DateCreate
from collect c inner join collect_ni_index nv on c.priref=nv.priref
cross apply c.data.nodes('/record/field[@tag=\"ni\"]') AS n(b)
cross apply c.data.nodes('/record/field[@tag=\"tx\"]') AS n2(b)
cross apply c.data.nodes('/record/field[@tag=\"di\"]') AS n3(b)
where nv.displayterm='hanan'
and n2.b.value('.','nvarchar(100)') between '14:50:00' and '23:59:59'
and n3.b.value('.','nvarchar(100)') between '2018-10-07' and '2018-11-01'"; // :fromdate and :todate

    // prepare statement for execution
    $q = $DB_con->prepare("select nv.priref AS nvpriref,
 n.b.value('.','nvarchar(100)') AS RecCreator,
n2.b.value('.','nvarchar(100)') AS TimeCreate,
n3.b.value('.','nvarchar(100)') AS DateCreate
from collect c inner join collect_ni_index nv on c.priref=nv.priref
cross apply c.data.nodes('/record/field[@tag=\"ni\"]') AS n(b)
cross apply c.data.nodes('/record/field[@tag=\"tx\"]') AS n2(b)
cross apply c.data.nodes('/record/field[@tag=\"di\"]') AS n3(b)
where nv.displayterm='hanan'
and n2.b.value('.','nvarchar(100)') between '14:50:00' and '23:59:59'
and n3.b.value('.','nvarchar(100)') between '2018-10-07' and '2018-11-01'");
    
    // pass values to the query and execute it
    $q->execute(); //$q->execute(array(":fromdate"=>$fromdate,":todate"=>$todate));
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
   
	while ($row = $q->fetch()){
            $tableContent = $tableContent.'<tr>'.
            '<td>'.$row['nvpriref'].'</td>'
            .'<td>'.$row['RecCreator'].'</td>'
            .'<td>'.$row['TimeCreate'].'</td>'
            .'<td>'.$row['DateCreate'].'</td>'.'</tr>';     
	}
	
}   
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$DB_con = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>مديرية الوثائق والتوثيق</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/bootstrap-select.css">
  <script src="../js/bootstrap-select.js"></script>
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
  <style>
  .jumbotron {
    background-color: #900C3F;
    color: #fff;
  }
  input[type="text"]::placeholder {  
                  
                /* Firefox, Chrome, Opera */ 
                text-align: right; 
            }
			.navbar {
 
  background-color: #900C3F;
  font-size: 16px !important;
  font-weight: bold;
 
}

.navbar li a, .navbar .navbar-brand {
  color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
  color: #f4511e !important;
  background-color: #fff !important;
}

.navbar-default .navbar-toggle {
  border-color: transparent;
  color: #fff !important;
}
  </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
       
        
        <li><a href="rep/dtls.php">تقارير مفصلة</a></li>
		<li><a href="rep/mnthly.php">تقارير شهرية</a></li>
		<li><a href="rep/yrly.php">تقارير سنوية</a></li>
		<li><a href="rep/stats.php">احصائيات</a></li>
		<li><a href="index.php">الصفحة الرئيسية</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
  <h1>تقرير مفصل</h1> 
  <br>
  
  <form class="form-inline">
  <div class="form-group">
  <label for="">From Date</label>
<input type="text" class="form-control" id="dateStart" name="fromdate">
<label for="">To Date</label>
<input type="text" class="form-control" id="dateEnd" name="todate">
</div>
<button type="button" name="submit" class="btn btn-danger">Search</button>
<br>

    <div class="col-sm-9">
	
    <?php 

   /*   require_once '../db/connect.php';    // connect to Database

        try
        {
                 $sql = "SELECT distinct displayterm as creator from collect_ni_index where priref between 901000001 and 901700000";
                 $projresult = $DB_con->query($sql);
                 $projresult->setFetchMode(PDO::FETCH_ASSOC);

                 echo '<select name="creator"  id="" data-live-search="true" size="50" data-live-search-style="startsWith" class="selectpicker" >';
				 echo '<option disabled>All</option>';

             while ( $row = $projresult->fetch() ) 
             {
                echo '<option value="'.$row[''].'">'.$row['creator'].'</option>';
             }

             echo '</select>';
            }
            catch (PDOException $e)
            {   
                die("Some problem getting data from database !!!" . $e->getMessage());
            }
			

*/

    ?> 
      </div>
    </div>
  </form>  
</div>
<!--------------------------------------------------------->
<div class="w3-container">
            <h1>النتائج</h1>
            <table class="w3-table w3-bordered w3-striped">
                <thead>
                    <tr>
                        <th>priref</th>
						<th>RecCreator</th>
						<th>TimeCreate</th>
						<th>DateCreate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
               echo $tableContent;
                
                ?>
                </tbody>
            </table>
		</div>
</body>
</html>