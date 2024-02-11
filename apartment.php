<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Retrieve form data
    $apartment_name = $_POST['apartment_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $num_bedrooms = $_POST['num_bedrooms'];
    $num_bathrooms = $_POST['num_bathrooms'];
    $rent_amount = $_POST['rent_amount'];
    $availability = $_POST['availability'];

    // Connect to the database (replace with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rentify_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert apartment data into the database
    $sql = "INSERT INTO Apartments (ApartmentName, Address, City, State, ZipCode, NumBedrooms, NumBathrooms, RentAmount, Availability) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiidi", $apartment_name, $address, $city, $state, $zip_code, $num_bedrooms, $num_bathrooms, $rent_amount, $availability);

    // Execute the SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New apartment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
?>











<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./styles/service.css" />
  </head>

  <body>
    <div class="serv_out-box">
      <div class="serv_in-box">
        <div class="serv_form-box">
          <h1>service 1</h1>
          <form action="apartment.php" method="POST">
            <label for="apartment_name">Apartment Name:</label><br />
            <input
              type="text"
              id="apartment_name"
              name="apartment_name"
              required /><br />
            <label for="address">Address:</label><br />
            <input type="text" id="address" name="address" required /><br />
            <label for="city">City:</label><br />
            <input type="text" id="city" name="city" required /><br />
            <label for="state">State:</label><br />
            <input type="text" id="state" name="state" required /><br />
            <label for="zip_code">Zip Code:</label><br />
            <input type="text" id="zip_code" name="zip_code" required /><br />
            <label for="num_bedrooms">Number of Bedrooms:</label><br />
            <input
              type="number"
              id="num_bedrooms"
              name="num_bedrooms"
              required /><br />
            <label for="num_bathrooms">Number of Bathrooms:</label><br />
            <input
              type="number"
              id="num_bathrooms"
              name="num_bathrooms"
              required /><br />
            <label for="rent_amount">Rent Amount:</label><br />
            <input
              type="number"
              id="rent_amount"
              name="rent_amount"
              required /><br />
            <label for="availability">Availability:</label><br />
            <select id="availability" name="availability">
              <option value="1">Available</option>
              <option value="0">Not Available</option></select
            ><br /><br />
            <input type="submit" value="Add Apartment" />
          </form>
        </div>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/62713cab29.js"
      crossorigin="anonymous"></script>
  </body>
</html>
