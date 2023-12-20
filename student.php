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
        <article id="welcome">
            <h2>Welcome to the Student Record Management System</h2>
            <p>This system helps you manage student records efficiently.</p>
        </article>


        <article id="viewData">
            <h2>View Student Data</h2>
            
            <!-- Add content and buttons for viewing data -->
            <button id="view data" >View Data</button>
            <script>
            // Get the button element
            var openLocalPageButton = document.getElementById('view data');

            // Attach a click event listener to the button
            openLocalPageButton.addEventListener('click', function() {
                // Relative path to the local webpage
                var localPagePath = 'student_view.php';

                // Open the local webpage in a new window or tab
                window.location.href = localPagePath;
            });
            </script>
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
