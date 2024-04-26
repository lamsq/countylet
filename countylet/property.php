<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Landlord</title>
  </head>
  <body>
      <div><h1>Landlord pic</h1></div>
  </body>
</html>


<?php
//database connection
require ("../mysql_connect.php");
//Only id 5 or 16 available for now
$owner_id = 5;

$sql = "SELECT property_id, type, bedrooms, description, photos, owner_id, mon_rent, eircode, address
        FROM property
        WHERE owner_id = $owner_id";

//Execute the query
$result = mysqli_query($db_connection, $sql);

//If query was successful
if ($result) {
    //Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        //Output data
        while ($row = mysqli_fetch_assoc($result)) {







            $property_id = $row["property_id"];

            //folder path with property ID
            $folderPath = "property/" . $property_id . "/";




            $imageFiles = scandir($folderPath);

            //Loop through the files and filter out non-image files
            foreach ($imageFiles as $file) {
                //Check if the file is ending with 'jpg' or 'jpeg' or 'png'
                if (is_file($folderPath . '/' . $file) && in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png'))) {
                    echo "<img src='$folderPath$file' alt='$file'><br>";
                }
            }
            echo "Owner ID: " . $row["owner_id"] . "<br>";
            echo "Property ID: " . $row["property_id"] . "<br>";
            echo "Type: " . $row["type"] . "<br>";
            echo "Bedrooms: " . $row["bedrooms"] . "<br>";
            echo "Description: " . $row["description"] . "<br>";


            echo "Monthly Rent: " . $row["mon_rent"] . "<br>";
            echo "Eircode: " . $row["eircode"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "<a href='edit_property.php?id=" . $row["property_id"] . "'>Edit</a><br>";
            echo "<a href='delete_property.php?id=" . $row["property_id"] . "'>Delete</a><br>";
            echo "<hr>";
        }
    } else {
        echo "No property found.";
    }
} else {
    echo "Error: " . mysqli_error($db_connection);
}

// Close the database connection
mysqli_close($db_connection);
?>
