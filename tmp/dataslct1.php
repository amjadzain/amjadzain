<?php
require_once 'connect.php';
 
try {
 
    $sql = 'SELECT * FROM testtable';
 
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
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
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['test_ID']) ?></td>
                            <td><?php echo htmlspecialchars($row['test_Name']); ?></td>
                            <td><?php echo htmlspecialchars($row['test_DT']); ?></td>
							<td><?php echo htmlspecialchars($row['test_Desc']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>