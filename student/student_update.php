<?php
// Include the database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentID = $_POST["studentID"];
    $studentName = $_POST["studentName"];
    $email = $_POST["email"];
    $dep = $_POST["dep"];
    $cgpa = $_POST["cgpa"];

    // Perform additional validation here if needed

    // Attempt to connect to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to update data in the database
    $query = mysqli_prepare($conn, "UPDATE student SET name=?, email=?, dep=?, cgpa=? WHERE id=?");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($query, 'ssssi', $studentName, $email, $dep, $cgpa, $studentID);

    // Execute the statement
    $result = mysqli_stmt_execute($query);

    // Check if the execution was successful
    if ($result) {
        // Data updated successfully
    } else {
        // Output an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($query);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Student Record</title>
</head>
<body>
    <header>
        <h1>Student Record Management System</h1>
    </header>
    
    <nav>
        <!-- Add navigation links here if needed -->
    </nav>

    <button id="Back to Main">Back to Main</button>
    <script>
        // Get the button element
        var openLocalPageButton = document.getElementById('Back to Main');

        // Attach a click event listener to the button
        openLocalPageButton.addEventListener('click', function() {
            // Relative path to the local webpage
            var localPagePath = 'student.php';

            // Open the local webpage in a new window or tab
            window.location.href = localPagePath;
        });
    </script>

    <section id="main-content">
        <article>
            <h2>Update Student Record</h2>
            <form action="student_update.php" method="post">
                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" required>

                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="dep">Department:</label>
                <input type="text" id="dep" name="dep" required>

                <label for="cgpa">CGPA:</label>
                <input type="text" id="cgpa" name="cgpa" required>

                <button type="submit" onclick="editData()" >Update Student</button>
            </form>
        </article>
    </section>

    <footer>
        <p>&copy; 2023 Student Record Management System</p>
    </footer>
</body>
</html>
<script>
    function editData() {
            // Implement logic for editing data
            alert('Data Updated Sucessfully!!');
        }
</script>