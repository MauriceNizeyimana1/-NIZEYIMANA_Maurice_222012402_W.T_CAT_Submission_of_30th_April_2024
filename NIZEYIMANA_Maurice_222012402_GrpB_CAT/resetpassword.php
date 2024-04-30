<?php
// Include the db connection script
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email address and phone number entered by the user
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Here you would typically send a verification code to the user's phone number
    // For demonstration purposes, let's assume we've sent the verification code and redirect the user to the confirmation page
    header("Location: Password_reset_confirmation.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff; /* Blue color */
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="email"],
        input[type="tel"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Ensure the padding and border are included in the width */
            transition: border-color 0.3s ease; /* Smooth transition for border color */
        }

        input[type="email"]:focus,
        input[type="tel"]:focus {
            border-color: #007bff; /* Change border color on focus */
            outline: none; /* Remove default focus outline */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <p>Enter your email address and phone number below. We'll send you a verification code to reset your password.</p>
        <form action="Password_reset_confirmation.php" method="post"> <!-- Changed action to Password_reset_confirmation.php -->
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Phone Number:</label>
            <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
