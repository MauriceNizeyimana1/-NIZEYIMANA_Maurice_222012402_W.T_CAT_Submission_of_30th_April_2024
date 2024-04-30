<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Our Attendance</title>
	<style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
    section{
    padding:10px;
    }
    header{
  background-color:blue;
  padding: 20px;
}
    section{
    padding:50px;
    border-bottom: 1px solid #ddd;
}
footer{
    text-align: center;
    padding: 30px;
    background-color:blue;
}
.search-button {
    background-color: magenta;
}

  </style>
  <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  
<header>
   

</head>

<body bgcolor="Cyan">
<form class="d-flex" role="search" action="search.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
    <button class="btn btn-outline-success search-button" type="submit">Search</button>
</form>

    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Image/Worker_logo.jpg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./attendance.php">ATTENDANCE</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./benefits.php">BENEFITS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./employee.php">EMPLOYEE</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./leave_request.php">LEAVE_REQUEST</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./payroll.php">PAYROLL</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./Performance.php">PERFORMANCE</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./training.php">TRAINING</a>
  </li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

	<h1>Attendance Form</h1>
	<form method="post" onsubmit="return confirmInsert();">
		<label for="attid">Attendance Id:</label>
		<input type="number" id="attid" name="attid"><br><br>

		<label for="empid">Employee Id:</label>
		<input type="number" id="empid" name="empid" required><br><br>

		<label for="date">Date:</label>
		<input type="date" id="date" name="date" required><br><br>

		<label for="cin">Clock In Time:</label>
		<input type="time" id="cin" name="cin" required><br><br>

		<label for="cout">Clock Out Time:</label>
		<input type="time" id="cout" name="cout" required><br><br>

		<label for="thours">Total Hours:</label>
		<input type="number" id="thours" name="thours" required><br><br>

		<input type="submit" name="add" value="Insert"><br><br>

		<a href="./home.html">Go Back to Home</a>
	</form>
</body>
</html>

<?php
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Attendance (Attendance_Id, Employee_Id, Date, Clock_In_Time, Clock_Out_Time, Total_Hours) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",$attid, $empid, $date, $cin, $cout, $thours);
    // Set parameters and execute
    $attid = $_POST['attid'];
    $empid  = $_POST['empid'];
    $date = $_POST['date'];
    $cin = $_POST['cin'];
    $cout = $_POST['cout'];
    $thours = $_POST['thours'];
   
    if ($stmt->execute()) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>


<?php
include('db_connection.php');
// SQL query to fetch data from the Product table
$sql = "SELECT * FROM Attendance";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail informations Of Attendance</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of Attendance</h2></center>
    <table border="5">
        <tr>
            <th>Attendance_Id</th>
            <th>Employee_Id</th>
            <th>Date</th>
            <th>Clock_In_Time</th>
            <th>Clock_Out_Time</th>
            <th>Total_Hours</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('db_connection.php');

        // Prepare SQL query to retrieve all attendance
        $sql = "SELECT * FROM Attendance";
        $result = $connection->query($sql);

        // Check if there are any attendance
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $Attendance_Id = $row['Attendance_Id']; // Fetch the Attendance_Id
                echo "<tr>
                    <td>" . $row['Attendance_Id'] . "</td>
                    <td>" . $row['Employee_Id'] . "</td>
                    <td>" . $row['Date'] . "</td>
                    <td>" . $row['Clock_In_Time'] . "</td>
                    <td>" . $row['Clock_Out_Time'] . "</td>
                    <td>" . $row['Total_Hours'] . "</td>
                    <td><a style='padding:4px' href='delete_attendance.php?Attendance_Id=$Attendance_Id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_attendance.php?Attendance_Id=$Attendance_Id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>
</section>
    <footer>
    <center> 
      <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA</h2></b>
    </center>
  </footer>
</body>
</html>