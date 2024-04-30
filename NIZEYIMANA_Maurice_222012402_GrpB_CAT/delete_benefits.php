<?php
include('db_connection.php');
// Checking if Benefit_Id is set
if(isset($_REQUEST['Benefit_Id'])) {
    $benId = $_REQUEST['Benefit_Id'];
    
    // Preparing and executing the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Benefits WHERE Benefit_Id=?");
    $stmt->bind_param("i", $benId);
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
            <input type="hidden" name="benId" value="<?php echo $benId; ?>">
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
    echo "Benefit_Id is not set.";
}

$connection->close();
?>
