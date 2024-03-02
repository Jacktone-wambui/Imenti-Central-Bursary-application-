<?php
// Get the amount and student name from the POST request
$amount = $_POST['amount'];
$studentName = $_POST['student_name'];

// Perform any necessary processing or validation with the amount and student name

// Create the Allocate table
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

// Create the Allocate table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS allocate (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    allocated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === true) {
    // Table created successfully

    // Insert the allocation into the Allocate table
    $insertSql = "INSERT INTO allocate (amount, student_name) VALUES ($amount, '$studentName')";

    if ($conn->query($insertSql) === true) {
        
        
        // Retrieve allocated amount and student name from the Allocate table
        $retrieveSql = "SELECT amount, student_name FROM allocate WHERE id = LAST_INSERT_ID()";
        $result = $conn->query($retrieveSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $allocatedAmount = $row['amount'];
            $allocatedStudentName = $row['student_name'];
        
            echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;'>"; // Container div
            echo "<table style='border-collapse: collapse;'>";
            echo "<tr><th style='text-align: left; padding: 5px;'>Allocated Amount:</th><td style='padding: 5px;'><span style='color: green;'>Ksh." . $allocatedAmount . "</span></td></tr>";
            echo "<tr><th style='text-align: left; padding: 5px;'>Student Name:</th><td style='padding: 5px;'><span style='color: blue;'>" . $allocatedStudentName . "</span></td></tr>";
            echo "</table>";
            echo "<button onclick=\"location.href='admin_dashboard.php'\" style='margin-top: 20px;'>Confirm</button>"; // Confirm button with margin-top
            echo "</div>"; // End container div
        } else {
            echo "Error retrieving allocation data.";
        }
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
