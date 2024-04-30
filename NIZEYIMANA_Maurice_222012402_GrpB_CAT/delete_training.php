<?php
include('db_connection.php');

// Check if Training_Id is set
if(isset($_REQUEST['Training_Id'])) {
    $trainid = $_REQUEST['Training_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Training WHERE Training_Id=?");
    $stmt->bind_param("i", $trainid);
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
            <input type="hidden" name="trainid" value="<?php echo $trainid; ?>">
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
    echo "Training_Id is not set.";
}

$connection->close();
?>
