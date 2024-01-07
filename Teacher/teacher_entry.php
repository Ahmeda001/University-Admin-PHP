<?php
// Include the database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teacherName = $_POST["teacherName"];
    $teacherID = $_POST["teacherID"];
    $phone = $_POST["phone"];   
    $email = $_POST["email"];
    $dep = $_POST["dep"];
    $exp = $_POST["exp"];

    // Perform additional validation here if needed

    // Attempt to connect to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to insert data into the database
    $query = mysqli_prepare($conn, "INSERT INTO teacher (id, name, phone, email, dep, exp) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($query, 'isssss', $teacherID, $teacherName, $phone, $email, $dep, $exp);

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
    <title>Teacher Record Management</title>
</head>
<body>
    <header>
        <h1>Teacher Record Management System</h1>
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
                var localPagePath = 'teacher.php';

                // Open the local webpage in a new window or tab
                window.location.href = localPagePath;
            });
            </script>


    <section id="main-content">
        
        <article>
            <h2>Add New Teacher</h2>
            <form action="teacher_entry.php" method="post">
            <label for="teacherID">Teacher ID:</label>
                <input type="text" id="teacherID" name="teacherID" required>
                
                
                <label for="teacherName">Teacher Name:</label>
                <input type="text" id="teacherName" name="teacherName" required>

                <label for="phone">Phone:</label>
                <input type="phone" id="phone" name="phone" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="dep">Dep:</label>
                <input type="dep" id="dep" name="dep" required>

                <label for="exp">Exp (Years):</label>
                <input type="exp" id="exp" name="exp" required>
                
                <button type="submit"  onclick="editData()" >Add teacher</button>
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

