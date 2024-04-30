<?php
include('db_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Payroll_Id'])) {
    $payId = $_REQUEST['Payroll_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Payroll WHERE Payroll_Id=?");
    $stmt->bind_param("i", $payId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['Payroll_Id'];
        $v = $row['Employee_Id'];
        $w = $row['Salary'];
        $x = $row['Overtime'];
        $y = $row['Deductions'];
        $z = $row['Net_Pay'];
    } else {
        echo "Payroll not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Payroll</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Payroll form -->
    <h2><u>Update Form of Payroll</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="empid">Employee_Id:</label>
        <input type="number" name="empid" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>

        <label for="salary">Salary:</label>
        <input type="text" name="salary" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="overt">Overtime:</label>
        <input type="time" name="overt" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="ded">Deductions:</label>
        <input type="number" name="ded" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>


        <label for="netp">Net_Pay:</label>
        <input type="number" name="netp" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Payroll_Id = $_REQUEST['Payroll_Id'];
    $Employee_Id = $_POST['empid'];
    $Salary = $_POST['salary'];
    $Overtime = $_POST['overt'];
    $Deductions = $_POST['ded'];
    $Net_Pay = $_POST['netp'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Payroll SET Employee_Id=?, Salary=?,  Overtime=?, Deductions=?, Net_Pay=? WHERE Payroll_Id=?");
    $stmt->bind_param("ssssss", $Employee_Id, $Salary, $Overtime, $Deductions, $Net_Pay, $Payroll_Id);
    $stmt->execute();
    
    // Redirect to Payroll.php
    header('Location: payroll.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
