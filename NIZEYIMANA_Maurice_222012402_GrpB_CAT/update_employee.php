<?php
include('db_connection.php');

// Check if Product_Id is set
if(isset($_REQUEST['Employee_Id'])) {
    $Employee_Id = $_REQUEST['Employee_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Employee WHERE Employee_Id=?");
    $stmt->bind_param("i", $Employee_Id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $t = $row['Employee_Id'];
        $u = $row['First_Name'];
        $v = $row['Last_Name'];
        $w = $row['Date_Of_Birth'];
        $x = $row['Position'];
        $y = $row['Department'];
        $z = $row['Contact_Information'];
    } else {
        echo "Employee not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Employee form -->
    <h2><u>Update Form of Employee</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="fname">First_Name:</label>
        <input type="text" name="fname" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="lname">Last_Name:</label>
        <input type="text" name="lname" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>

        <label for="dob">Date_Of_Birth:</label>
        <input type="date" name="dob" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="pos">Position:</label>
        <input type="text" name="pos" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="dep">Department:</label>
        <input type="text" name="dep" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="continfo">Contact_Information:</label>
        <input type="text" name="continfo" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $First_Name = $_POST['fname'];
    $Last_Name = $_POST['lname'];
    $Date_Of_Birth = $_POST['dob'];
    $Position = $_POST['pos'];
    $Department = $_POST['dep'];
    $Contact_Information = $_POST['continfo'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE Employee SET First_Name=?, Last_Name=?, Date_Of_Birth=?, Position=?, Department=?, Contact_Information=? WHERE Employee_Id=?");
    $stmt->bind_param("sssssss", $First_Name, $Last_Name, $Date_Of_Birth, $Position, $Department, $Contact_Information ,$Employee_Id);
    $stmt->execute();
    
    // Redirect to employee.php
    header('Location: employee.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
