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
// Retrieve student's profile information
$studentId = 1; // Assuming the student ID is 1 for this example
$sql = "SELECT sname FROM student WHERE student_id = $studentId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Retrieve student's name and profile thumbnail
    $row = $result->fetch_assoc();
    $studentName = $row["sname"];
} else {
    echo "No student found with the given ID";
    exit;
}

// Define variables and set to empty values
$first_name  = $email = $phone_number = $ward = $parent_name = $id_num = $school = $registration_number = $arrears = $document = "";
$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $first_name = sanitizeInput($_POST["first_name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone_number = sanitizeInput($_POST["phone_number"]);
    $ward = sanitizeInput($_POST["ward"]);
    $parent_name = sanitizeInput($_POST["parent_name"]);
    $id_num = sanitizeInput($_POST["id_num"]);
    $school = sanitizeInput($_POST["school"]);
    $registration_number = sanitizeInput($_POST["registration_number"]);
    $arrears = sanitizeInput($_POST["arrears"]);

    // Upload document file
    if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["document"]["name"]);
        $document = $target_file;

        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            // File uploaded successfully
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the application table
    $sql = "INSERT INTO application (first_name, email, phone_number, ward, parent_name, id_num, school, registration_number, arrears, document)
            VALUES('$first_name', '$email', '$phone_number', '$ward', '$parent_name', '$id_num', '$school', '$registration_number', '$arrears', '$document')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Application submitted successfully.";
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bursary Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

<script>
    function redirectToDashboard() {
        alert('Application submitted successfully.');
        window.location.href = 'dashboard.php';
        return false;
    }
</script>
<script>
        // JavaScript code
        <?php if (!empty($success_message)): ?>
        alert("<?php echo $success_message; ?>");
        <?php endif; ?>
        
        <?php if (!empty($error_message)): ?>
        alert("<?php echo $error_message; ?>");
        <?php endif; ?>
    </script>
</head>
<body>
    <h1>Bursary Application Form</h1>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $studentName; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number" required>
        
        <label for="ward">Ward:</label>
        <input type="text" name="ward" required>
        
        <label for="parent_name">Parent Name:</label>
        <input type="text" name="parent_name" required>
        
        <label for="id_num">ID Number:</label>
        <input type="text" name="id_num" required>

        <label for="school">School:</label>
        <input type="text" name="school" required>

        <label for="registration_number">Registration/Admission Number:</label>
        <input type="text" name="registration_number" required>

        <label for="arrears">Arrears:</label>
        <input type="number" name="arrears" step="0.01" min="0" required>

        <label for="document">Upload Document:</label>
        <input type="file" name="document" accept=".pdf,.doc,.docx">

        <input type="submit" value="Submit Application">
    </form>
</body>
</html>