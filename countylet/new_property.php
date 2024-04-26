<!-- Action page -->


<?php
//database connection
require "../mysql_connect.php"; // Adjust the path to your database connection file

//check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //create variables to collect and store data
    $type = $_POST["type"];
    $bedrooms = $_POST["bedrooms"];
    $description = $_POST["description"];
    $mon_rent = $_POST["mon_rent"];
    $eircode = $_POST["eircode"];
    $address = $_POST["address"];

    //Placeholder for the photos name, adjust later
    $photos = 'apartment1.jpg';

    $owner_id = 5;

    //SQL insert statement
    $sql = "INSERT INTO property (type, bedrooms, description, photos, owner_id, mon_rent, eircode, address)
            VALUES ('$type', $bedrooms, '$description', '$photos', $owner_id, $mon_rent, '$eircode', '$address')";




    //Execute the INSERT statement
    if (mysqli_query($db_connection, $sql)) {
        //Get the last inserted property ID
        $property_id = mysqli_insert_id($db_connection);
        echo "New record inserted successfully with Property ID: " . $property_id;

        //Create folder name based on the last inserted property ID
        $folderName = $property_id;

        //Set target directory
        $target_dir = "property/" . $folderName . "/";

        //Check if the directory exists, if not, create
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    } else {
        echo "Error: " . mysqli_error($db_connection);
    }

    //Save image into the folder where folder name is the property id
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];




        // $num_files = count($_FILES['file']['name']);
        // for ($i = 0; $i < $num_files; $i++) {
        //     $fileName = $_FILES['file']['name'][$i];
        //     $fileTempName = $_FILES['file']['tmp_name'][$i];
        //     $fileSize = $_FILES['file']['size'][$i];
        //     $fileError = $_FILES['file']['error'][$i];
        //     $fileType = $_FILES['file']['type'][$i];
        // }

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt; // Random name for image
                    $fileDestination = $target_dir . $fileNameNew; // Adjusted destination path
                    move_uploaded_file($fileTempName, $fileDestination);

                    echo "Image uploaded!";
                } else {
                    echo "Error: file too big!";
                }
            } else {
                echo "Error uploading file!";
            }
        } else {
            echo "Please upload jpg, jpeg or png file!";
        }
    }

    //Close database connection
    mysqli_close($db_connection);
}
?>
