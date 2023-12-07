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
$adminId = 1; 
$sql = "SELECT fname FROM admin WHERE id = $adminId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $adminName = $row["fname"];
} else {
    echo "No admin found with the given ID";
    exit;
}
// Fetch all registered students
$sql = "SELECT student_id, semail, sname, Form, contacts, post_address, Postal_code, Date_of_Birth, Place_of_Birth FROM student";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #333;
            color: #fff;
            width: 250px;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: peru;
            text-decoration: none;
            font-size: 20px;
        }
        .sidebar a:hover {
            color: #fff;
            text-decoration: none;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .main-content h1 {
            margin-top: 0;
        }

        .logout-btn {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 10px 10px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
            margin: 30px;
            position: absolute;
        }

        .logout-btn:hover {
            background-color: #555;
        }

        .applications {
            margin-bottom: 30px;
        }

        .applications table {
            width: 100%;
            border-collapse: collapse;
        }

        .applications th,
        .applications td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .confirm-btn,
        .reject-btn {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .confirm-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
        }

        .confirm-btn:hover {
            background-color: #45a049;
        }

        .reject-btn {
            background-color: #f44336;
            color: #fff;
            border: none;
        }

        .reject-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="admin_dashboard.php">View Applications</a></li>
                <li><a href="accept_application.php">Accepted Applications</a></li>
                <li><a href="reject_application.php">Rejected Applications</a></li>
                <li><a href="students.php">View Students</a></li>
                <li><a href="donors.php">View Donors</a></li>
                <li><a href="../Index.html" class="logout-btn">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Welcome Admin <?php echo $adminName; ?></h1>

            <div class="applications">
                <h2>Registered students</h2>
                <table>
                    <thead>
                        <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Form</th>
                    <th>Contacts</th>
                    <th>Post Address</th>
                    <th>Postal Code</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        
                        $email = $row["semail"];
                        $name = $row["sname"];
                        $form = $row["Form"];
                        $contacts = $row["contacts"];
                        $postAddress = $row["post_address"];
                        $postalCode = $row["Postal_code"];
                        $dateOfBirth = $row["Date_of_Birth"];
                        $placeOfBirth = $row["Place_of_Birth"];

                        echo "<tr>";
                       
                        echo "<td>$email</td>";
                        echo "<td>$name</td>";
                        echo "<td>$form</td>";
                        echo "<td>$contacts</td>";
                        echo "<td>$postAddress</td>";
                        echo "<td>$postalCode</td>";
                        echo "<td>$dateOfBirth</td>";
                        echo "<td>$placeOfBirth</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No registered students found</td></tr>";
                }
                ?>
            </tbody>
                        
                </table>
            </div>

        </div>
    </div>
</body>
</html>