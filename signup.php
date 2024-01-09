<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data (you may want to add more robust validation)
    if ( empty($email) || empty($password)) {
        echo "All fields are required";
    } else {
        // Connect to your database (replace these credentials with your actual database information)
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "university";

        $conn = new mysqli($servername, $db_username, $db_password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hash the password (for better security, consider using password_hash())
        $hashed_password = md5($password);

        // Insert user data into the database (replace 'users' with your actual table name)
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>University Signup Page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #2c3e50; /* Dark blue background */
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    form {
        background-color: #3498db; /* Blue form background */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    h2 {
        color: #fff; /* White text color */
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #ecf0f1; /* Light grey label text color */
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #bdc3c7; /* Border color */
        border-radius: 4px;
    }

    button {
        background-color: #2ecc71; /* Green button background */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #27ae60; /* Dark green button hover background */
    }

    img {
        width: 100px; /* Set the desired width */
        height: auto;
        margin: 0 auto;
        display: block;
    }
</style>

    <!-- Add your CSS styles here -->


</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<img src="uni.png" alt="Description of the image"> 
    <h2>CTU Signup</h2>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" onclick="editData()">Sign Up</button>
</form>

</body>
</html>

<script>
    function editData() {
            // Implement logic for editing data
            alert('User Entered Sucessfully!!');
        }
</script>
