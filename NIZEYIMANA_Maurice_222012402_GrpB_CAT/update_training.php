<?php
include('db_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Training_Id'])) {
    $trainId = $_REQUEST['Training_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Training WHERE Training_Id=?");
    $stmt->bind_param("i", $trainId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['Training_Id'];
        $v = $row['Employee_Id'];
        $w = $row['Training_Type'];
        $z = $row['Trainner'];
        $x = $row['Duration'];
        $y = $row['Completion_Status'];
        
    } else {
        echo "Training not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Training</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Training form -->
    <h2><u>Update Form of Training</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="empid">Employee_Id:</label>
        <input type="number" name="empid" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>

        <label for="traint">Training_Type:</label>
        <input type="text" name="traint" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="trainner">Trainner:</label>
        <input type="text" name="trainner" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="duration">Duration:</label>
        <input type="text" name="duration" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>


        <label for="comps">Completion_Status:</label>
        <input type="text" name="comps" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Training_Id = $_REQUEST['Training_Id'];
    $Employee_Id = $_POST['empid'];
    $Training_Type = $_POST['traint'];
    $Trainner = $_POST['trainner'];
    $Duration = $_POST['duration'];
    $Completion_Status = $_POST['comps'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Training SET Employee_Id=?, Training_Type=?,  Trainner=?, Duration=?, Completion_Status=? WHERE Training_Id=?");
    $stmt->bind_param("ssssss", $Employee_Id, $Training_Type, $Trainner, $Duration, $Completion_Status, $Training_Id);
    $stmt->execute();
    
    // Redirect to Training.php
    header('Location: training.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
