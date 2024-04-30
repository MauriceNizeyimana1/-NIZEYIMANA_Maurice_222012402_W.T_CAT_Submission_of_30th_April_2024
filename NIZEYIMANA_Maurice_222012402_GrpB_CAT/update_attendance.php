<?php
include('db_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Attendance_Id'])) {
    $AttId = $_REQUEST['Attendance_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Attendance WHERE Attendance_Id=?");
    $stmt->bind_param("i", $AttId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $u = $row['Employee_Id'];
        $v = $row['Date'];
        $w = $row['Clock_In_Time'];
        $x = $row['Clock_Out_Time'];
        $y = $row['Total_Hours'];
    } else {
        echo "Attendance not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Attendance</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Attendance form -->
    <h2><u>Update Form of Attendance</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="empid">Employee_Id:</label>
        <input type="number" name="empid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>

        <label for="cin">Clock_In_Time:</label>
        <input type="time" name="cin" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="cout">Clock_Out_Time:</label>
        <input type="time" name="cout" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="thours">Total_Hours:</label>
        <input type="number" name="thours" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Attendance_Id = $_REQUEST['Attendance_Id'];
    $Employee_Id = $_POST['empid'];
    $Date = $_POST['date'];
    $Clock_In_Time = $_POST['cin'];
    $Clock_Out_Time = $_POST['cout'];
    $Total_Hours = $_POST['thours'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Attendance SET Employee_Id=?, Date=?, Clock_In_Time=?, Clock_Out_Time=?, Total_Hours=? WHERE Attendance_Id=?");
    $stmt->bind_param("issssi", $Employee_Id, $Date, $Clock_In_Time, $Clock_Out_Time, $Total_Hours, $Attendance_Id);
    $stmt->execute();
    
    // Redirect to attendance.php
    header('Location: attendance.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
