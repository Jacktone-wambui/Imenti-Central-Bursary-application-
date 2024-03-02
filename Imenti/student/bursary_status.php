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

// Check if the search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the student name is obtained from the user input
    $studentName = $_POST['student_name'];

    // Query the allocations for the specified student name
    $query = "SELECT amount, student_name FROM allocate WHERE student_name LIKE '%$studentName%'";
    $result = $conn->query($query);

    echo "<div class='dashboard-container'>";
    echo "<div class='logout'>";
    echo "<a href='../Index.html'>Logout</a>";
    echo "</div>";

    if ($result->num_rows > 0) {
        echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;'>"; // Container div
        echo "<h2>Allocations for Student: $studentName</h2>";
        echo "<table style='border-collapse: collapse;'>";
        echo "<tr><th style='text-align: left; padding: 5px;'>Allocated Amount</th><th style='text-align: left; padding: 5px;'>Student Name</th></tr>";

        while ($row = $result->fetch_assoc()) {
            $allocatedAmount = $row['amount'];
            $allocatedStudentName = $row['student_name'];

            echo "<tr><td style='padding: 5px;'>Ksh. $allocatedAmount</td><td style='padding: 5px;'>$allocatedStudentName</td></tr>";
        }

        echo "</table>";
        echo "</div>"; // End container div
    } else {
        echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>"; // Container div
        echo "<h2>No allocations found for student: $studentName</h2>";
        echo "</div>"; // End container div
    }

    echo "</div>"; // End dashboard-container
} else {
    // Display the default dashboard page with links or any other content
    echo "<div class='dashboard-container'>";

    echo "<div style='display: flex; justify-content: center; align-items: center; margin-top: 20px;' class='logout'>";
    echo "<a href='../Index.html'>Logout</a>";
    echo "</div>";

    // Display your default content here (links, etc.)
    
    echo "<form method='POST' style='display: flex; justify-content: center; align-items: center; margin-top: 20px;' action=''>";
    echo "<input type='text' name='student_name' placeholder='Enter student name'>";
    echo "<button type='submit' name='search'>Search</button>";
    echo "</form>";
    
    echo "</div>"; // End dashboard-container
}

// Close the connection
$conn->close();
?>