<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>View Student Records</title>
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
            <?php
            // Include the database connection file
            include('db_connection.php');

            // Attempt to connect to the database
            $conn = mysqli_connect($host, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepare and execute the SQL query to fetch all student records
            $query = "SELECT * FROM student";
            $result = mysqli_query($conn, $query);

            // Check if there are any records
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Student Records</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Student ID</th><th>Student Name</th><th>Email</th><th>Department</th><th>CGPA</th></tr>";

                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["dep"] . "</td>";
                    echo "<td>" . $row["cgpa"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No records found";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </article>
    </section>

    <footer>
        <p>&copy; 2023 Student Record Management System</p>
    </footer>
</body>
</html>
