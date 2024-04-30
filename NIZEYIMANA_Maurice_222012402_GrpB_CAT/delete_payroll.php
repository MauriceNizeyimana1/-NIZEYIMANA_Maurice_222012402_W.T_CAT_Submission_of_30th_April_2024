<?php
// Connection details
include('db_connection.php');

// Check if Payroll_Id is set
if(isset($_REQUEST['Payroll_Id'])) {
    $payid = $_REQUEST['Payroll_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Payroll WHERE Payroll_Id=?");
    $stmt->bind_param("i", $payid);
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
            <input type="hidden" name="payid" value="<?php echo $payid; ?>">
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
    echo "Payroll_Id is not set.";
}

$connection->close();
?>
