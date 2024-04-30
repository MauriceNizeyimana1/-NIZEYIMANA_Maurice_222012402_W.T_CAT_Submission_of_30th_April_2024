<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Our Leave Rquest</title>
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
  background-color:orange;
  padding: 20px;
}
    section{
    padding:82px;
    border-bottom: 1px solid #ddd;
}
footer{
    text-align: center;
    padding: 20px;
    background-color:orange;
    }
.search-button {
    background-color: yellow;
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

		<h1>Leave Request Form</h1>
<form method="post" onsubmit="return confirmInsert();">

<label for="leaveid">Leave Rquest Id:</label>
<input type="number" id="leaveid" name="leaveid"><br><br>

<label for="empid">Employee Id:</label>
<input type="number" id="empid" name="empid" required><br><br>

<label for="leavet">Leave Type:</label>
<input type="text" id="leavet" name="leavet" required><br><br>

<label for="startd">Start Date:</label>
<input type="date" id="startd" name="startd" required><br><br>

<label for="endd">End Date:</label>
<input type="date" id="endd" name="endd" required><br><br>

<label for="status">Status:</label>
<input type="text" id="status" name="status" required><br><br>

<input type="submit" name="add" value="Insert"><br><br>

<a href="./home.html">Go Back to Home</a>

</form>
	

<?php
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Leave_Request(Request_Id, Employee_Id , Leave_Type , Start_Date,End_Date,Status) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $leaveid, $empid,$leavet,$startd,$endd, $status);
    // Set parameters and execute
    $leaveid = $_POST['leaveid'];
    $empid = $_POST['empid'];
    $leavet = $_POST['leavet'];
    $startd = $_POST['startd'];
    $endd = $_POST['endd'];
    $status = $_POST['status'];
   
    if ($stmt->execute() == TRUE) {
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
// SQL query to fetch data from the leave_request table
$sql = "SELECT * FROM Leave_Request";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail informations Of Leave_Request</title>
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
    <center><h2>Table of Leave_Request</h2></center>
    <table border="5">
        <tr>
            <th>Request_Id</th>
            <th>Employee_Id</th>
            <th>Leave_Type</th>
            <th>Start_Date</th>
            <th>End_Date</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('db_connection.php');

        // Prepare SQL query to retrieve all Request
        $sql = "SELECT * FROM Leave_Request";
        $result = $connection->query($sql);

        // Check if there are any leave request
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $requeid = $row['Request_Id']; // Fetch the Request_Id
                echo "<tr>
                    <td>" . $row['Request_Id'] . "</td>
                    <td>" . $row['Employee_Id'] . "</td>
                    <td>" . $row['Leave_Type'] . "</td>
                    <td>" . $row['Start_Date'] . "</td>
                    <td>" . $row['End_Date'] . "</td>
                    <td>" . $row['Status'] . "</td>
                    <td><a style='padding:4px' href='delete_leave_Request.php?Request_Id=$requeid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_leave_Request.php?Request_Id=$requeid'>Update</a></td> 
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
    </centesr>
  </footer>
</body>
</html>