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

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }
        
        .dashboard-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
        }
        
        .dashboard-links {
            list-style: none;
            padding: 0;
        }
        
        .dashboard-links li {
            margin-bottom: 10px;
        }
        
        .dashboard-links li a {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .dashboard-links li a:hover {
            background-color: #0056b3;
        }
        
        .logout {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .logout a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .logout a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo $studentName; ?></h1>
        
        <div class="logout">
            <a href="../Index.html">Logout</a>
        </div>
        
        <h2>Dashboard Links</h2>
        <ul class="dashboard-links">
            <li><a href="application.php">Bursary Application</a></li>
            <li><a href="bursary_status.php">View Bursary Status</a></li>
        </ul>
    </div>
</body>
</html>