<?php
include('db_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Performance_Id'])) {
    $performId = $_REQUEST['Performance_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM Performance WHERE Performance_Id=?");
    $stmt->bind_param("i", $performId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['Performance_Id'];
        $v = $row['Employee_Id'];
        $w = $row['Evaluation_Period'];
        $x = $row['Key_Performance_Indicators'];
        $y = $row['Rating'];
        $z = $row['Comments'];
    } else {
        echo "Performance not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Performance</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Performance form -->
    <h2><u>Update Form of Performance</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="empid">Employee_Id:</label>
        <input type="number" name="empid" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>

        <label for="evluap">Evaluation_Period:</label>
        <input type="date" name="evluap" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="kpi">Key_Performance_Indicators:</label>
        <input type="text" name="kpi" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="rating">Rating:</label>
        <input type="number" name="rating" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>


        <label for="comm">Comments:</label>
        <input type="text" name="comm" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Performance_Id = $_REQUEST['Performance_Id'];
    $Employee_Id = $_POST['empid'];
    $Evaluation_Period = $_POST['evluap'];
    $Key_Performance_Indicators = $_POST['kpi'];
    $Rating = $_POST['rating'];
    $Comments = $_POST['comm'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Performance SET Employee_Id=?, Evaluation_Period=?,  Key_Performance_Indicators=?, Rating=?, Comments=? WHERE Performance_Id=?");
    $stmt->bind_param("ssssss", $Employee_Id, $Evaluation_Period, $Key_Performance_Indicators, $Rating, $Comments, $Performance_Id);
    $stmt->execute();
    
    // Redirect to Performance.php
    header('Location: performance.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
