<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $tenant_name = htmlspecialchars($_POST['tenant_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $move_in_date = $_POST['move_in_date']; // No need for htmlspecialchars as it's a date field
    $move_out_date = isset($_POST['move_out_date']) ? $_POST['move_out_date'] : null;

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rentify_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert tenant data
    $sql = "INSERT INTO Tenants (TenantName, Email, Phone, MoveInDate, MoveOutDate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $tenant_name, $email, $phone, $move_in_date, $move_out_date);

    // Execute the SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New tenant added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!-- ----------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="serv_out-box">
        <div class="serv_in-box">
            <div class="serv_form-box">
                <h1>service 1</h1>
                <form action="tenants.php" method="POST">
                    <label for="tenant_name">Tenant Name:</label><br>
                    <input type="text" id="tenant_name" name="tenant_name" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    <label for="phone">Phone:</label><br>
                    <input type="text" id="phone" name="phone" required><br>
                    <label for="move_in_date">Move-In Date:</label><br>
                    <input type="date" id="move_in_date" name="move_in_date" required><br>
                    <label for="move_out_date">Move-Out Date:</label><br>
                    <input type="date" id="move_out_date" name="move_out_date"><br><br>
                    <input type="submit" value="Add Tenant">
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/62713cab29.js" crossorigin="anonymous"></script>
</body>

</html>