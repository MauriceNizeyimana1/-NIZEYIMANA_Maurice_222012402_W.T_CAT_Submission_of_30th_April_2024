<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Confirmation</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <div class="container">
        <h2>Password Reset Confirmation</h2>
        <p>Your password reset request has been processed successfully.</p>
        <p>An email has been sent to your email address with further instructions on how to reset your password.</p>
        <p>If you've requested to reset your password via phone number, please enter the 6-digit verification code you received on your phone:</p>
        <form action="verify_code.php" method="post">
            <label for="verification_code">Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" maxlength="6" required>
            <input type="submit" value="Submit">
        </form>
        <p>If you prefer to reset your password via phone number, please enter your phone number below:</p>
        <form action="reset_via_phone.php" method="post">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required>
            <input type="submit" value="Submit">
        </form>
        <p>Please check your email inbox for the password reset email as well.</p>
        <p><a href="login.html">Return to Login Page</a></p>
    </div>
</body>
</html>




