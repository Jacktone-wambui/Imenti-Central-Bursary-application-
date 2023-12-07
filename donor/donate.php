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


$donorId = 5; 
$sql = "SELECT fname FROM donor WHERE donor_id = $donorId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $donorName = $row["fname"];
} else {
    echo "No donor found with the given ID";
    exit;
}

// Retrieve donor contributions from the database
$sql = "SELECT donor_name, location, amount, DATE(created_at) AS donation_date FROM donations";
$result = $conn->query($sql);

// Calculate total amount donated
$totalAmount = 0;
while ($row = $result->fetch_assoc()) {
    $totalAmount += $row["amount"];
}
// Reset the result set pointer to the beginning
$result->data_seek(0);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donors Dashboard</title>
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
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome {
            text-align: center;
            margin-bottom: 20px;
        }

        .donations {
            margin-bottom: 20px;
        }

        .donation-table {
            width: 100%;
            border-collapse: collapse;
        }

        .donation-table th,
        .donation-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .donation-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .donation-form {
            margin-top: 20px;
            text-align: center;
        }

        .donation-form input[type="text"],
        .donation-form input[type="number"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .donation-form button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Donors Dashboard</h2>
            <ul>
                <li><a href="donate.php">Donations Records</a></li>
                <li><a href="mchango.php">Donate</a></li>
                <li><a href="students.php">View student to support</a></li>
                <li><a href="../Index.html" class="logout-btn">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
        <h1>Welcome, <?php echo $donorName; ?></h1>
        <strong><p>Total Amount Donated: Ksh. <?php echo $totalAmount; ?></p></strong>
            <div class="container">
        
        <div class="welcome">
            <p>Thank you for your contributions. Here are the donors' contributions:</p>
            <div class="donations">
                <?php
                if ($result->num_rows > 0) {
                    echo '<table class="donation-table">';
                    echo '<tr><th>Date</th><th>Location</th><th>Amount</th><th>Date</th></tr>';

                    while ($row = $result->fetch_assoc()) {
                        $donor = $row["donor_name"];
                        $location = $row["location"];
                        $amount = $row["amount"];
                        $date = $row["donation_date"];
                        echo "<tr><td>$donor</td><td>$location</td><td>ksh $amount</td><td>$date</td></tr>";
                    }

                    echo '</table>';
                } else {
                    echo "No donor contributions found.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

        </div>
    </div>
</body>
</html>