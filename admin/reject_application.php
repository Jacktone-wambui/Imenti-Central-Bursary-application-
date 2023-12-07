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

// Get the application ID from the form submission
$applicationId = $_POST["id"];

// Update the application status to "default"
$sql = "UPDATE application SET sstatus = 'default' WHERE id = ?";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameter with the application ID
$stmt->bind_param("i", $applicationId);

// Execute the prepared statement
if ($stmt->execute()) {
   
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and connection
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rejected Applications</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rejected Applications</h1>

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

    // Fetch rejected applications from the database
    $sql = "SELECT * FROM application WHERE sstatus = 'default'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>First Name</th><th>Email</th><th>Phone Number</th><th>Ward</th><th>Parent Name</th><th>ID Number</th><th>School</th><th>Registration Number</th><th>Arrears</th><th>Status</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["first_name"] . "</td</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "<td>" . $row["ward"] . "</td>";
            echo "<td>" . $row["parent_name"] . "</td>";
            echo "<td>" . $row["id_num"] . "</td>";
            echo "<td>" . $row["school"] . "</td>";
            echo "<td>" . $row["registration_number"] . "</td>";
            echo "<td>" . $row["arrears"] . "</td>";
            echo "<td>" . $row["sstatus"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No rejected applications found.";
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>