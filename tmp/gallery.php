<?php
 
require_once 'connect.php';
 
try {
	$tableContent = '';
	
	$sql = "select top 10
n.b.value('.','nvarchar(100)') AS doc,
n2.b.value('.','nvarchar(100)') AS photo
from dbo.photo p
cross apply p.data.nodes('/record/field[@tag=\"rf\"]') AS n(b)
cross apply p.data.nodes('/record/field[@tag=\"FN\"]') AS n2(b)
where n.b.value('.','nvarchar(100)') between 901000001 and 902000000";
 
    // prepare statement for execution
   $stmt = $DB_con->prepare($sql);
    
    // pass values to the query and execute it
    $stmt->execute();
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
	//-------------------------------------------
	
	while ($row = $stmt->fetch()){
			$source = str_replace(substr($row['photo'], 0, 38),"/docs/",$row['photo']);
            $tableContent = $tableContent.'<div class="col-md-4"><div class="thumbnail"><a href="'.$source.'" target="_blank" rel="noopener">'
            .'<img src="'.$source.'" alt="Lights" style="width:100%"><div class="caption"><p>'
			.$row['doc']."&nbsp;-&nbsp;".$row['photo'].'</p></div></a></div></div>';
              
	}
	 
    
} catch(PDOException $e) {
     die("Some problem getting data from database !!!" . $e->getMessage());
}
$DB_con = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--<base href="./">  -->
</head>
<body>
	<div class="container">
           
		</div>
        <div class="container">
		 <h2>Image Gallery</h2>
		<p>Click on the images to enlarge them.</p>
		<div class="row">
		<!––<div class="col-md-4">
      <!–– <div class="thumbnail">
	  
                    <?php
                
                echo $tableContent;
                
                ?>
       <!––</div>
   <!–– </div>
  </div>
</div>

</body>
</html>