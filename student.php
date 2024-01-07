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
       
    </nav>
    <button id="Back to Main" >Back to Main</button>
            <script>
            // Get the button element
            var openLocalPageButton = document.getElementById('Back to Main');

            // Attach a click event listener to the button
            openLocalPageButton.addEventListener('click', function() {
                // Relative path to the local webpage
                var localPagePath = 'index.php';

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



        
        <article id="addStudent">
            <h2>Add New Student</h2>
            <!-- Add content and buttons for viewing data -->
            <button id="Add data" >Add Data</button>
            <script>
            // Get the button element
            var openLocalPageButton = document.getElementById('Add data');

            // Attach a click event listener to the button
            openLocalPageButton.addEventListener('click', function() {
                // Relative path to the local webpage
                var localPagePath = 'student_entry.php';

                // Open the local webpage in a new window or tab
                window.location.href = localPagePath;
            });
            </script>
        </article>

        

        <article id="editData">
            <h2>Update Student Data</h2>
            <!-- Add content and buttons for editing data -->
            <button id="edit data" >Update Data</button>


            <script>
            // Get the button element
            var openLocalPageButton = document.getElementById('edit data');

            // Attach a click event listener to the button
            openLocalPageButton.addEventListener('click', function() {
                // Relative path to the local webpage
                var localPagePath = 'student_update.php';

                // Open the local webpage in a new window or tab
                window.location.href = localPagePath;
            });
            </script>
        </article>


        <article id="deleteData">
            <h2>Delete Student Data</h2>
            
            <!-- Add content and buttons for viewing data -->
            <button id="delete data" >Delete Data</button>
            <script>
            // Get the button element
            var openLocalPageButton = document.getElementById('delete data');

            // Attach a click event listener to the button
            openLocalPageButton.addEventListener('click', function() {
                // Relative path to the local webpage
                var localPagePath = 'student_delete.php';

                // Open the local webpage in a new window or tab
                window.location.href = localPagePath;
            });
            </script>
        </article>

        <!-- Add more sections and articles as needed -->

    </section>

    <footer>
        <p>&copy; 2023 Student Record Management System</p>
    </footer>

</body>
</html>
