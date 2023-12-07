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

// Check if the form submission contains the application ID
if (isset($_POST["id"])) {
    $applicationId = $_POST["id"];

    // Update the status of the application to "disbursed"
    $sql = "UPDATE application SET sstatus = 'disbursed' WHERE id = $applicationId";

    if ($conn->query($sql) === TRUE) {
        echo "Application accepted successfully.";
    } else {
        echo "Error updating application status: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accepted Applications</title>
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
    <h1>Accepted Applications</h1>

    <?php
   
    // Fetch accepted applications from the database
    $sql = "SELECT * FROM application WHERE sstatus = 'disbursed'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>First Name</th><th>Email</th><th>Phone Number</th><th>Ward</th><th>Parent Name</th><th>ID Number</th><th>School</th><th>Registration Number</th><th>Arrears</th><th>Status</th></tr>";

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
            echo "<td>" . $row["sstatus"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No accepted applications found.";
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>