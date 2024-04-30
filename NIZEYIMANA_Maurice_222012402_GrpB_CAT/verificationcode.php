<?php
// Include the database connection script
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the verification code entered by the user
    $verification_code = $_POST['verification_code'];

    // For demonstration purposes, let's assume the verification code is correct
    // In a real scenario, you would retrieve the verification code from the database
    // and compare it with the one entered by the user

    // Assuming the verification code is correct
    $verification_code_correct = true;

    if ($verification_code_correct) {
        // Verification successful, proceed with resetting the password
        echo "Verification successful. You can proceed with resetting your password.";
        // You can redirect the user to the password reset page or any other relevant page
    } else {
        // Verification failed, display an error message
        echo "Verification failed. Please enter the correct verification code.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code Confirmation</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Verification Code Confirmation</h2>
        <p>Please enter the verification code you received on you phone number.</p>

            <label for="verification_code">Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <input type="submit" value="Confirm">
        </form>
    </div>
</body>
</html>
