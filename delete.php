
<?php
// include DB connection
include 'DBconnection.php';
$watch_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($watch_id>0) {
    
    $sql= "DELETE FROM watches WHERE ID = ?";
    $stmt= $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param("i", $watch_id);

        if ($stmt->execute()) {
            echo "Record deleted successfully!.";
        } else {
            echo "Error while deketing the record: " ;
        }

        
    } else {
        echo "Error preparing the SQL statement: " . $conn->error;
    }
} else {
    echo "incorrect ID";
}
?>
<style>
    body{
        color:#00aaff;
    }
    
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting the record</title>
</head>
<body>
    
</body>
</html>
