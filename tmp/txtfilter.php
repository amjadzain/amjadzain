<?php
 
require_once 'connect.php';
 
try {
	$tableContent = '';
	$sql = 'SELECT * FROM testtable';
 
    // prepare statement for execution
    $q = $conn->prepare($sql);
    
    // pass values to the query and execute it
    $q->execute();
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
	while ($row = $q->fetch()){
            $tableContent = $tableContent.'<tr>'.
            '<td>'.$row['test_ID'].'</td>'
            .'<td>'.$row['test_Name'].'</td>'
            .'<td>'.$row['test_DT'].'</td>'
            .'<td>'.$row['test_Desc'].'</td>'.'</tr>';     
	}
	if(isset($_POST['submit']))
{
	$tableContent = '';
	$tname = $_POST['tname'];
	$tdesc = $_POST['tdesc'];
	
	$sql = 'SELECT * FROM testtable WHERE test_Name LIKE :tname OR test_Desc LIKE :tdesc';
 
    // prepare statement for execution
    $q = $conn->prepare($sql);
    
    // pass values to the query and execute it
    $q->execute(array(":tname"=>$tname.'%',":tdesc"=>$tdesc.'%'));
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
   
	while ($row = $q->fetch()){
            $tableContent = $tableContent.'<tr>'.
            '<td>'.$row['test_ID'].'</td>'
            .'<td>'.$row['test_Name'].'</td>'
            .'<td>'.$row['test_DT'].'</td>'
            .'<td>'.$row['test_Desc'].'</td>'.'</tr>';     
	}
}   
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
	<div class="w3-container">
            <h1>Search and Filter</h1>
            <form action="" method="post">

            <input type="text" name="tname" placeholder="Test Name"><br><br>

            <input type="text" name="tdesc" placeholder="Test Desc"><br><br>


            <input type="submit" name="submit" value="Search">

        </form>
		</div>
        <div class="w3-container">
            <h1>Employees</h1>
            <table class="w3-table w3-bordered w3-striped">
                <thead>
                    <tr>
                        <th>Test ID</th>
						<th>Test Name</th>
						<th>Date & Time</th>
						<th>Description</th>
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