<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $landlord_name = $_POST['landlord_name'];
    $landlord_email = $_POST['landlord_email'];
    $landlord_phone = $_POST['landlord_phone'];

    // Perform server-side validation (you can add more validation as needed)
    if (empty($landlord_name) || empty($landlord_email) || empty($landlord_phone)) {
        // Handle empty fields
        echo "All fields are required.";
    } else {
        // Connect to the database (assuming you have already established a connection)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "rentify_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into the Landlords table
        $sql = "INSERT INTO landlords (LandlordName, Email, Phone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $landlord_name, $landlord_email, $landlord_phone);

        // Execute the SQL statement
        if ($stmt->execute() === TRUE) {
            // Landlord added successfully
            echo '<script>';
            echo 'alert("landlord added sucessfully!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
        } else {
            // Error occurred
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $stmt->close();
        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Landlords</title>
    <link rel="stylesheet" href="./styles/service.css" />
</head>
<body>
    
<div class="serv_out-box">
      <div class="serv_in-box">
        <div class="serv_form-box">
          <h1 class="serv_heading">ADD LANDLORDS</h1>

<form action="landlords.php" method="POST">
        <label for="landlord_name">Landlord Name:</label><br>
        <input type="text" id="landlord_name" name="landlord_name" required><br>
        <label for="landlord_email">Email:</label><br>
        <input type="email" id="landlord_email" name="landlord_email" required><br>
        <label for="landlord_phone">Phone:</label><br>
        <input type="text" id="landlord_phone" name="landlord_phone" required><br><br>
        <button type="submit" value="Add Landlord">submit</button>
    </form>
    </div>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/62713cab29.js"
      crossorigin="anonymous"></script>
</body>
</html>