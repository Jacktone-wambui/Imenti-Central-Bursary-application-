<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Imenticentral";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables to store form data
$email = $name = $form = $contacts = $postAddress = $postalCode = $dateOfBirth = $placeOfBirth = $password = "";

// Process the form data upon submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $email = sanitizeInput($_POST["email"]);
    $name = sanitizeInput($_POST["name"]);
    $form = sanitizeInput($_POST["form"]);
    $contacts = sanitizeInput($_POST["contacts"]);
    $postAddress = sanitizeInput($_POST["postAddress"]);
    $postalCode = sanitizeInput($_POST["postalCode"]);
    $dateOfBirth = sanitizeInput($_POST["dateOfBirth"]);
    $placeOfBirth = sanitizeInput($_POST["placeOfBirth"]);
    $password = $_POST["password"]; // Password should not be sanitized

    // Insert the form data into the database
    $sql = "INSERT INTO student (semail, sname, Form, contacts, post_address, Postal_code, Date_of_Birth, Place_of_Birth, newpassword, cpassword)
            VALUES ('$email', '$name', '$form', '$contacts', '$postAddress', '$postalCode', '$dateOfBirth', '$placeOfBirth', '$password', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to sanitize form inputs
function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 500px; /* Adjust the width as desired */
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
        }

        .form-group {
            display: table-row;
        }

        .form-group label,
        .form-group input {
            display: table-cell;
            padding: 8px;
        }

        .form-group .error {
            color: red;
        }

        .form-group .btn {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            border: none;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .form-group .btn:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <table>
                <tr class="form-group">
                    <td><label>Email:</label></td>
                    <td><input type="text" name="semail" value="<?php echo $email; ?>"></td>
                    <td><span class="error"><?php echo $emailErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Name:</label></td>
                    <td><input type="text" name="sname" value="<?php echo $name; ?>"></td>
                    <td><span class="error"><?php echo $nameErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Form:</label></td>
                    <td><input type="text" name="Form" value="<?php echo $form; ?>"></td>
                    <td><span class="error"><?php echo $formErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Contacts:</label></td>
                    <td><input type="text" name="contacts" value="<?php echo $contacts; ?>"></td>
                    <td><span class="error"><?php echo $contactsErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Post Address:</label></td>
                    <td><input type="text" name="post_address" value="<?php echo $postAddress; ?>"></td>
                    <td><span class="error"><?php echo $postAddressErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Postal Code:</label></td>
                    <td><input type="text" name="postal_Code" value="<?php echo $postalCode; ?>"></td>
                    <td><span class="error"><?php echo $postalCodeErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Date of Birth:</label></td>
                    <td><input type="text" name="Date_of_Birth" value="<?php echo $dateOfBirth; ?>"></td>
                    <td><span class="error"><?php echo $dateOfBirthErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Place of Birth:</label></td>
                    <td><input type="text" name="Place_of_Birth" value="<?php echo $placeOfBirth; ?>"></td>
                    <td><span class="error"><?php echo $placeOfBirthErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Password:</label></td>
                    <td><input type="password" name="newpassword"></td>
                    <td><span class="error"><?php echo $passwordErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td><label>Confirm Password:</label></td>
                    <td><input type="password" name="cpassword"></td>
                    <td><span class="error"><?php echo $confirmPasswordErr; ?></span></td>
                </tr>
                <tr class="form-group">
                    <td></td>
                    <td><input type="submit" class="btn" value="Sign Up"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>
</html>
    
       