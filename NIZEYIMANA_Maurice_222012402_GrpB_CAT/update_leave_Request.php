<?php
include('db_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Request_Id'])) {
    $requeId = $_REQUEST['Request_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Leave_Request WHERE Request_Id=?");
    $stmt->bind_param("i", $requeId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['Request_Id'];
        $v = $row['Employee_Id'];
        $w = $row['Leave_Type'];
        $x = $row['Start_Date'];
        $y = $row['End_Date'];
        $z = $row['Status'];
    } else {
        echo "Leave_Request not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Leave_Request</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Leave_Request form -->
    <h2><u>Update Form of Leave_Request</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="empid">Employee_Id:</label>
        <input type="number" name="empid" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>

        <label for="leavet">Leave_Type:</label>
        <input type="text" name="leavet" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="startd">Start_Date:</label>
        <input type="date" name="startd" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="endd">End_Date:</label>
        <input type="date" name="endd" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>


        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Request_Id = $_REQUEST['Request_Id'];
    $Employee_Id = $_POST['empid'];
    $Leave_Type = $_POST['leavet'];
    $Start_Date = $_POST['startd'];
    $End_Date = $_POST['endd'];
    $Status = $_POST['status'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Leave_Request SET Employee_Id=?, Leave_Type=?,  Start_Date=?, End_Date=?, Status=? WHERE Request_Id=?");
    $stmt->bind_param("ssssss", $Employee_Id, $Leave_Type, $Start_Date, $End_Date, $Status, $Request_Id);
    $stmt->execute();
    
    // Redirect to leave_Request.php
    header('Location: leave_request.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
