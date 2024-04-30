<?php
include('db_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Benefit_Id'])) {
    $benId = $_REQUEST['Benefit_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Benefits WHERE Benefit_Id=?");
    $stmt->bind_param("i", $benId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $v = $row['Benefit_Id'];
        $w = $row['Employee_Id'];
        $x = $row['Health_Insurance'];
        $y = $row['Retirement_Plans'];
        $z = $row['Other_Benefits'];
    } else {
        echo "Benefits not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Benefits</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Benefits form -->
    <h2><u>Update Form of Benefits</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        
        <label for="empid">Employee_Id:</label>
        <input type="number" name="empid" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="hinsu">Health_Insurance:</label>
        <input type="text" name="hinsu" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="retp">Retirement_Plans:</label>
        <input type="text" name="retp" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="otherben">Other_Benefits:</label>
        <input type="text" name="otherben" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Benefit_Id = $_REQUEST['Benefit_Id'];
    $Employee_Id = $_POST['empid'];
    $Health_Insurance = $_POST['hinsu'];
    $Retirement_Plans = $_POST['retp'];
    $Other_Benefits = $_POST['otherben'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Benefits SET Employee_Id=?, Health_Insurance=?, Retirement_Plans=?, Other_Benefits=? WHERE Benefit_Id=?");
    $stmt->bind_param("sssss", $Employee_Id, $Health_Insurance, $Retirement_Plans, $Other_Benefits, $Benefit_Id);
    $stmt->execute();
    
    // Redirect to benefits.php
    header('Location: benefits.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
