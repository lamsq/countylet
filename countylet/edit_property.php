<?php
//database connection
require ("../mysql_connect.php");

if (isset($_GET['id'])) {

    $property_id = mysqli_real_escape_string($db_connection, $_GET['id']);

    //Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize form data
        $type = mysqli_real_escape_string($db_connection, $_POST["type"]);
        $bedrooms = mysqli_real_escape_string($db_connection, $_POST["bedrooms"]);
        $description = mysqli_real_escape_string($db_connection, $_POST["description"]);
        $mon_rent = mysqli_real_escape_string($db_connection, $_POST["mon_rent"]);
        $eircode = mysqli_real_escape_string($db_connection, $_POST["eircode"]);
        $address = mysqli_real_escape_string($db_connection, $_POST["address"]);

        // SQL query to update property details
        $sql = "UPDATE property
                SET type = '$type', bedrooms = $bedrooms, description = '$description', mon_rent = $mon_rent, eircode = '$eircode', address = '$address'
                WHERE property_id = $property_id";

        // Execute the update query
        if (mysqli_query($db_connection, $sql)) {
            echo "Property details updated successfully.";
        } else {
            echo "Error updating property details: " . mysqli_error($db_connection);
        }
    }

    // Fetch current property details
    $sql = "SELECT * FROM property WHERE property_id = $property_id";
    $result = mysqli_query($db_connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display a form with current property details pre-filled
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$property_id"); ?>" method="POST">
            Type: <input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
            <!-- Bedrooms: <input type="number" name="bedrooms" value="<?php echo $row['bedrooms']; ?>"> -->
            <label for="bedrooms">Bedrooms:</label>
               <select id="bedrooms" name="bedrooms">
                   <option value="1">1 Bed</option>
                   <option value="2">2 Bed</option>
                   <option value="3">3 Bed</option>
                   <option value="4">4 Bed</option>
               </select>
               <br>
            Description: <input type="text" name="description" value="<?php echo $row['description']; ?>"><br>
            Monthly Rent: <input type="number" name="mon_rent" value="<?php echo $row['mon_rent']; ?>"><br>
            Eircode: <input type="text" name="eircode" value="<?php echo $row['eircode']; ?>"><br>
            Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
            <button type="submit">Update</button>
        </form>
        <?php
    } else {
        echo "No property found with ID: $property_id";
    }
} else {
    echo "Property ID not provided.";
}

// Close the database connection
mysqli_close($db_connection);

?>
