<?php
// Connection details
include('db_connection.php');

// Check if Performance_Id is set
if(isset($_REQUEST['Performance_Id'])) {
    $performid = $_REQUEST['Performance_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Performance WHERE Performance_Id=?");
    $stmt->bind_param("i", $performid);
     ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="performid" value="<?php echo $performid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "Performance_Id is not set.";
}

$connection->close();
?>
