<?php
 
require_once 'connect.php';
 
try {
	$tableContent = '';
	$sql = 'SELECT * FROM tbl_users';
 
    // prepare statement for execution
    $q = $DB_con->prepare($sql);
    
    // pass values to the query and execute it
    $q->execute();
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
	while ($row = $q->fetch()){
            $tableContent = $tableContent.'<tr>'.
            '<td>'.$row['userID'].'</td>'
            .'<td>'.$row['userName'].'</td>'
            .'<td>'.$row['userProfession'].'</td>'
			.'<td>'.$row['userPic'].'</td>'
            .'<td>'.$row['test_dt'].'</td>'.'</tr>';      
	}
	if(isset($_POST['submit']))
{
	$tableContent = '';
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	
	$sql = 'SELECT * FROM tbl_users WHERE test_dt BETWEEN :fromdate and :todate';
 
    // prepare statement for execution
    $q = $DB_con->prepare($sql);
    
    // pass values to the query and execute it
    $q->execute(array(":fromdate"=>$fromdate.'%',":todate"=>$todate.'%'));
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
   
	while ($row = $q->fetch()){
            $tableContent = $tableContent.'<tr>'.
            '<td>'.$row['userID'].'</td>'
            .'<td>'.$row['userName'].'</td>'
            .'<td>'.$row['userProfession'].'</td>'
			.'<td>'.$row['userPic'].'</td>'
            .'<td>'.$row['test_dt'].'</td>'.'</tr>';    
	}
}   
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$DB_con = null;
?>