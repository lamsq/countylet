<!-- Action page -->


<?php

//database connection
require ("../mysql_connect.php");


if (isset($_GET['id'])) {

    $property_id = mysqli_real_escape_string($db_connection, $_GET['id']);

    //SQL query for delete the property row
    $sql = "DELETE FROM property WHERE property_id = $property_id";

    //Execute query
    if (mysqli_query($db_connection, $sql)) {
        echo "Property with ID $property_id has been deleted successfully.";
    } else {
        echo "Error deleting property: " . mysqli_error($db_connection);
    }
} else {
    echo "Property ID not provided.";
}

//Close the database connection
mysqli_close($db_connection);

?>
