<?php
// Include the database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentName = $_POST["studentName"];
    $studentID = $_POST["studentID"];
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

    // Prepare and execute the SQL query to insert data into the database
    $query = mysqli_prepare($conn, "INSERT INTO student (id, name, email, dep, cgpa) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($query, 'isssd', $studentID, $studentName, $email, $dep, $cgpa);

    // Execute the statement
    $result = mysqli_stmt_execute($query);

    // Check if the execution was successful
    if ($result) {
        
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
    <title>Student Record Management</title>
</head>
<body>
    <header>
        <h1>Student Record Management System</h1>
    </header>
    
    <nav>
        <!-- Add navigation links here if needed -->
    </nav>

        <button id="Back to Main" >Back to Main</button>
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
            <h2>Add New Student</h2>
            <form action="student_entry.php" method="post">
            <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" required>
                
                
                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" required>

                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="dep">Dep:</label>
                <input type="dep" id="dep" name="dep" required>

                <label for="cgpa">CGPA:</label>
                <input type="cgpa" id="cgpa" name="cgpa" required>
                
                <button type="submit"  onclick="editData()" >Add Student</button>
            </form>
        </article>

        <!-- Add more sections and articles as needed -->

    </section>

    <footer>
        <p>&copy; 2023 Student Record Management System</p>
    </footer>
</body>
</html>
<script>
    function editData() {
            // Implement logic for editing data
            alert('Data Entered Sucessfully!!');
        }
</script>

