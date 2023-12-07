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
$sql = "SELECT * FROM application";
$result = $conn->query($sql);

// Fetch total amount from donations table
$sql = "SELECT SUM(amount) AS total_amount FROM donations";
$esult = $conn->query($sql);

if ($esult->num_rows > 0) {
    $row = $esult->fetch_assoc();
    $totalAmount = $row["total_amount"];
} else {
    $totalAmount = 0;
}

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
            <strong><p>Total Amount Donated: Ksh. <?php echo $totalAmount; ?></p></strong>
            <div class="container">
            <div class="applications">
                <h2>Applications</h2>
                <table>
                    <thead>
                       <?php
                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>First Name</th><th>Email</th><th>Phone Number</th><th>Ward</th><th>Parent Name</th><th>ID Number</th><th>School</th><th>Registration Number</th><th>Arrears</th><th>Allocate</th><th>Status</th><th>Action</th></tr>";
                    
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["first_name"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone_number"] . "</td>";
                                echo "<td>" . $row["ward"] . "</td>";
                                echo "<td>" . $row["parent_name"] . "</td>";
                                echo "<td>" . $row["id_num"] . "</td>";
                                echo "<td>" . $row["school"] . "</td>";
                                echo "<td>" . $row["registration_number"] . "</td>";
                                echo "<td>" . $row["arrears"] . "</td>";
                                echo "<td>";
                                echo "<form action='allocate.php' method='POST'>";
                                echo "<input type='hidden' name='amount' value='" . $totalAmount . "'>";
                                echo "<input type='hidden' name='student_name' value='" . $row["first_name"] . "'>";
                                echo "<input type='submit' value='Allocate'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>" . $row["sstatus"] . "</td>";
                                echo "<td>";
                                echo "<form action='reject_application.php' method='POST'>";
                                echo "<input type='hidden' name='application_id' value='" . $row["id"] . "'>";
                                echo "<input type='submit' value='Reject'>";
                                echo "</form>";

                                echo "<form action='accept_application.php' method='POST'>";
                                echo "<input type='hidden' name='application_id' value='" . $row["id"] . "'>";
                                echo "<input type='submit' value='Accept'>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No applications found.";
                        }

                         ?>                    
            </tbody>
                        
                </table>
            </div>

        </div>
    </div>
</body>
</html>