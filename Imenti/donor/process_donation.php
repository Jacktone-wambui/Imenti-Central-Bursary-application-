<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $location = $_POST["location"];
    $donor = $_POST["donor_name"];
    $amount = $_POST["amount"];
    $code = $_POST["code"];

    // Validate the form data (you can add more validation if needed)
    if (!empty($location) && !empty($donor) && !empty($amount) && !empty($code)) {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "Imenticentral";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $sql = "INSERT INTO donations (location, donor_name, amount, code) VALUES (?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters with the form data
        $stmt->bind_param("ssds", $location, $donor, $amount, $code);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Donation submitted successfully!";
            header("Location: donate.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>