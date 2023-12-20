<?php
// Include the database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentName = $_POST["studentName"];
    $studentID = $_POST["studentID"];
    $email = $_POST["email"];

    // Perform additional validation here if needed

    // Attempt to connect to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to insert data into the database
    $query = mysqli_prepare($conn, "INSERT INTO student (id, name, email) VALUES (?, ?, ?)");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($query, 'sss', $studentID, $studentName, $email);

    // Execute the statement
    $result = mysqli_stmt_execute($query);

    // Check if the execution was successful
    if ($result) {
        
        // Output a success message
        echo "Student record added successfully!";
    } else {
        // Output an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($query);
    mysqli_close($conn);
}
?>

