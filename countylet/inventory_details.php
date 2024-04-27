<!DOCTYPE html>
<html>

<!-- meta info -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CountyLet</title> <!-- page title-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap CSS -->
    <link href="style.css" rel="stylesheet"><!-- CSS -->
</head>

<body>
    
    <header>
        <div class="options">

            <?php
                session_start();            
                $msg_reg = "";
                
                if (isset($_SESSION["role"])){                    

                    //options for different access levels
                    if ($_SESSION["role"]=="admin"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\" \"><div id=\"option1\" class=\"option\">Landlord options</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Tenant options</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option3\" class=\"option\">Search</div></a>";                
                        echo "<a href=\"testimonial.php\"><div id=\"option5\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option6\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option7\" class=\"option\">Log out</div></a>";                        
                    }
                    else if ($_SESSION["role"]=="landlord"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";                        
                        echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Landlord account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                    else if ($_SESSION["role"]=="tenant"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";                  
                        echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\"tenant_account.php\"><div id=\"option5\" class=\"option\">Tenant account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                }
                

            ?>
        </div>

            <div id="msg" hidden>
                <div >
                    <?php                         
                        if(isset($_COOKIE['loggedin_msg'])){
                            echo $_COOKIE['loggedin_msg'];
                        } else if(isset($_COOKIE['loggedout_msg'])){
                            echo $_COOKIE['loggedout_msg'];
                        } else if(isset($_COOKIE['registered'])){
                            echo $_COOKIE['registered']; //"Successfully registered"
                        } 
                    ?>
                </div>
            </div> 

                <?php 

                    if (isset($_SESSION["role"])){

                        //conditions for different access levels with corresponding suboptions
                        if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="admin"){

                            echo "<div id=\"home_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\"index_edit.php\"><div id=\"suboption01\" class=\"suboption\">Edit home page </div></a>";                    
                            echo "</div>";

                            echo "<div id=\"testimonial_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\"testimonial_manage.php\"><div id=\"suboption50\" class=\"suboption\">Manage testimonial</div></a>";       
                            echo "<a href=\"testimonial_add.php\"><div id=\"suboption51\" class=\"suboption\">Add testimonial</div></a>";      
                            echo "</div>";

                            echo "<div id=\"contact_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\" \"><div id=\"suboption60\" class=\"suboption\">Manage contuct us</div></a>";
                            echo "</div>";

                            echo "<div id=\"landlord_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\" \"><div id=\"suboption10\" class=\"suboption\">Edit landlord account </div></a>";
                            echo "<a href=\" \"><div id=\"suboption11\" class=\"suboption\">Property listing </div></a>";
                            echo "<a href=\" \"><div id=\"suboption12\" class=\"suboption\">Edit property </div></a>";
                            echo "<a href=\"inventory_details.php\"><div id=\"suboption13\" class=\"suboption\">Inventory details  </div></a>";
                            echo "<a href=\" \"><div id=\"suboption14\" class=\"suboption\">Edit inventory details  </div></a>";
                            echo "</div>";

                            echo "<div id=\"tenant_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\"tenant_acc_edit.php\"><div id=\"suboption20\" class=\"suboption\">Edit tenant account </div></a>";
                            echo "<a href=\"inventory_details.php\"><div id=\"suboption21\" class=\"suboption\">Inventory details </div></a>";
                            echo "</div>";
                        }

                        else if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="landlord"){

                            echo "<div id=\"testimonial_suboptions\" class=\"suboptions\" hidden>";    
                            echo "<a href=\"testimonial_add.php\"><div id=\"suboption30\" class=\"suboption\">Add testimonial </div></a>";      
                            echo "</div>";

                            echo "<div id=\"landlord_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\" \"><div id=\"suboption50\" class=\"suboption\">Property listing </div></a>";
                            echo "<a href=\" \"><div id=\"suboption51\" class=\"suboption\">Edit property </div></a>";
                            echo "<a href=\"inventory_details.php\"><div id=\"suboption52\" class=\"suboption\">Inventory details  </div></a>";
                            echo "<a href=\" \"><div id=\"suboption53\" class=\"suboption\">Edit inventory details  </div></a>";
                            echo "</div>";
                        }

                        else if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="tenant"){

                            echo "<div id=\"testimonial_suboptions\" class=\"suboptions\" hidden>";    
                            echo "<a href=\"testimonial_add.php\"><div id=\"suboption60\" class=\"suboption\">Add testimonial </div></a>";      
                            echo "</div>";

                            echo "<div id=\"tenant_suboptions\" class=\"suboptions\" hidden>";
                            echo "<a href=\"inventory_details.php\"><div id=\"suboption50\" class=\"suboption\">Inventory details </div></a>";
                            echo "</div>";
                        }

                    }

                ?>
                
    </header>


<main>

<?php 
$user_id = $_SESSION["user_id"];
$role = $_SESSION["role"];

require_once '../mysql_connect.php'; 
$query = "SELECT * FROM contracts JOIN property ON contracts.property_id = property.property_id WHERE tenant_id = '" . $user_id . "'";

$result = mysqli_query($db_connection, $query);
// $property_id  = array();
// $inventory_result = array(); // Initialize the array
// var_dump($result);

if ($result){ 
                                
    while($row = mysqli_fetch_assoc($result)){ 
        //var_dump($row); // Add this line for debugging
        $boxes_search_results[] = $row;
        $property_id = $row['property_id']; // Move the assignment inside the loop
    }
    //echo '<p>' . $property_id . '</p>';

    if (empty($boxes_search_results)) {
        echo '<div class="alert alert-warning">No tenancies found with the provided details.</div>';
    } else {

    if(count($boxes_search_results) == 1){
        
        echo "<div id='search_results'>You has ".count($boxes_search_results)." Tenancy</div>";
    
    }else if (count($boxes_search_results) >1){
    
        echo "<div id='search_results'>You has ".count($boxes_search_results)." Tenancies</div>";
    
    }
    
     mysqli_free_result($result); 




        for ($t=0; $t<count($boxes_search_results); $t++){

            echo"

            <div class='boxes_search' id='boxes_search_id'>

                <div class='search_results_row'>

                        <div class='main_photo_search'>

                            
                                <img src='".$boxes_search_results[$t]['photos']."0.jpg"."
                                
                                ' alt=''>
                            

                        </div>

                        
                    <div class='box_search' id='box_search_id'>

                        <div class='price_search'> 

                        ".$boxes_search_results[$t]['mon_rent']." EUR/mon

                        </div>

                        <div class='owed'> 
                        
                        <b>Amount owed:</b> ".$boxes_search_results[$t]['owed']." EUR
                        
                        </div>
                        <div class='paid'> 
                        
                        <b>Amount paid:</b> ".$boxes_search_results[$t]['paid']." EUR
                        
                        </div>

                        <div class='start_end_dates'>

                        <b>Start Date: </b>".strtoupper($boxes_search_results[$t]['start']).", <b>End Date: </b> ".$boxes_search_results[$t]['end']."

                        </div>

                        <div class='tenancy_length'>
                        <b>Tenancy lenght:</b> ".$boxes_search_results[$t]['tenancy_length']." months
                        </div>

                        <div class='tenancy_agreement'>
                        <b>Tenancy Agreement:</b> ".$boxes_search_results[$t]['contract']."
                        </div>

                    </div>

                </div>";
                $property_id =$boxes_search_results[$t]['property_id'];
                $query_inventory = "SELECT * FROM inventory WHERE property_id = '" . $property_id . "'";
                $result = mysqli_query($db_connection, $query_inventory);

                if ($result && $result->num_rows > 0){ 
            // Display search results
            echo '<div class="">';
            echo '<h4>Inventory Results:</h4>';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">WIFI</th>';
            echo '<th scope="col">Television</th>';
            echo '<th scope="col">Parking</th>';
            echo '<th scope="col">Air_conditioned</th>';
            echo '<th scope="col">Refrigerator</th>';
            echo '<th scope="col">Oven</th>';
            echo '<th scope="col">Stove</th>';
            echo '<th scope="col">Microwave</th>';
            echo '<th scope="col">Dishwasher</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($rows = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $rows['WIFI'] . '</td>';
                echo '<td>' . $rows['Television'] . '</td>';
                echo '<td>' . $rows['Parking'] . '</td>';
                echo '<td>' . $rows['Air_conditioned'] . '</td>';
                echo '<td>' . $rows['Refrigerator'] . '</td>';
                echo '<td>' . $rows['Oven'] . '</td>';
                echo '<td>' . $rows['Stove'] . '</td>';
                echo '<td>' . $rows['Microwave'] . '</td>';
                echo '<td>' . $rows['Dishwasher'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo "</div> ";

        }else {
            // No inventory found for this property
            echo '<div class="alert alert-warning">No inventory found for this property.</div>';
        }
    
    }

    }

} else { 
    echo "<h3>This user has no tenancies;</h3>";
}

?>

</main>



    <?php //scripts to show/hide suboptions when user hovers header options

        if (isset($_COOKIE['logged_in']) && $role=="admin"){
            echo "
            <script>
            let home = document.getElementById('option0');
            let home_sub = document.getElementById('home_suboptions');

            let testimonial = document.getElementById('option5');
            let testimonial_sub = document.getElementById('testimonial_suboptions');

            let contact = document.getElementById('option6');
            let contact_sub = document.getElementById('contact_suboptions');

            let landlord = document.getElementById('option1');
            let landlord_sub = document.getElementById('landlord_suboptions');

            let tenant = document.getElementById('option2');
            let tenant_sub = document.getElementById('tenant_suboptions');

            let array =[home_sub, testimonial_sub, contact_sub, landlord_sub, tenant_sub];

            function show(element) {
                clearTimeout(element.timeoutId);
                for (let i = 0; i < array.length; i++) {
                    hideNow(array[i]);
                }
                
                element.removeAttribute('hidden');
            }
            
            function hide(element) {
                element.timeoutId = setTimeout(() => {
                    element.setAttribute('hidden', true);
                }, 500);

            }

            function hideNow(element) {
                clearTimeout(element.timeoutId);
                element.setAttribute('hidden', true);
            }

            home.addEventListener('mouseover', () => {show(home_sub); });
            home.addEventListener('mouseout', () => { hide(home_sub);  });
            home_sub.addEventListener('mouseover', () => {show(home_sub);});
            home_sub.addEventListener('mouseout', () => { hide(home_sub); });

            testimonial.addEventListener('mouseover', () => {show(testimonial_sub); });
            testimonial.addEventListener('mouseout', () => { hide(testimonial_sub);  });
            testimonial_sub.addEventListener('mouseover', () => {show(testimonial_sub);});
            testimonial_sub.addEventListener('mouseout', () => { hide(testimonial_sub); });

            contact.addEventListener('mouseover', () => {show(contact_sub); });
            contact.addEventListener('mouseout', () => { hide(contact_sub);  });
            contact_sub.addEventListener('mouseover', () => {show(contact_sub);});
            contact_sub.addEventListener('mouseout', () => { hide(contact_sub); });

            landlord.addEventListener('mouseover', () => {show(landlord_sub); });
            landlord.addEventListener('mouseout', () => { hide(landlord_sub);  });
            landlord_sub.addEventListener('mouseover', () => {show(landlord_sub);});
            landlord_sub.addEventListener('mouseout', () => { hide(landlord_sub); });
            
            tenant.addEventListener('mouseover', () => {show(tenant_sub); });
            tenant.addEventListener('mouseout', () => { hide(tenant_sub);  });
            tenant_sub.addEventListener('mouseover', () => {show(tenant_sub);});
            tenant_sub.addEventListener('mouseout', () => { hide(tenant_sub); });
            </script>
            ";

        }
        else if (isset($_COOKIE['logged_in']) && $role=="landlord"){
            echo "
            <script>
            let testimonial = document.getElementById('option3');
            let testimonial_sub = document.getElementById('testimonial_suboptions');

            let landlord = document.getElementById('option5');
            let landlord_sub = document.getElementById('landlord_suboptions');

            let array =[testimonial_sub, landlord_sub];

            function show(element) {
                clearTimeout(element.timeoutId);
                for (let i = 0; i < array.length; i++) {
                    hideNow(array[i]);
                }
                element.removeAttribute('hidden');
            }
            
            function hide(element) {
                element.timeoutId = setTimeout(() => {
                    element.setAttribute('hidden', true);
                }, 500);
            }

            function hideNow(element) {
                clearTimeout(element.timeoutId);
                element.setAttribute('hidden', true);
            }

            testimonial.addEventListener('mouseover', () => {show(testimonial_sub); });
            testimonial.addEventListener('mouseout', () => { hide(testimonial_sub);  });
            testimonial_sub.addEventListener('mouseover', () => {show(testimonial_sub);});
            testimonial_sub.addEventListener('mouseout', () => { hide(testimonial_sub); });

            landlord.addEventListener('mouseover', () => {show(landlord_sub); });
            landlord.addEventListener('mouseout', () => { hide(landlord_sub);  });
            landlord_sub.addEventListener('mouseover', () => {show(landlord_sub);});
            landlord_sub.addEventListener('mouseout', () => { hide(landlord_sub); });
            </script>
            ";

        }
        else if (isset($_COOKIE['logged_in']) && $role=="tenant"){
            echo "
            <script>
            let testimonial = document.getElementById('option3');
            let testimonial_sub = document.getElementById('testimonial_suboptions');

            let tenant = document.getElementById('option5');
            let tenant_sub = document.getElementById('tenant_suboptions');

            let array =[testimonial_sub, tenant_sub];

            function show(element) {
                clearTimeout(element.timeoutId);
                for (let i = 0; i < array.length; i++) {
                    hideNow(array[i]);
                }
                element.removeAttribute('hidden');
            }
            
            function hide(element) {
                element.timeoutId = setTimeout(() => {
                    element.setAttribute('hidden', true);
                }, 500);
            }

            function hideNow(element) {
                clearTimeout(element.timeoutId);
                element.setAttribute('hidden', true);
            }

            testimonial.addEventListener('mouseover', () => {show(testimonial_sub); });
            testimonial.addEventListener('mouseout', () => { hide(testimonial_sub);  });
            testimonial_sub.addEventListener('mouseover', () => {show(testimonial_sub);});
            testimonial_sub.addEventListener('mouseout', () => { hide(testimonial_sub); });

            tenant.addEventListener('mouseover', () => {show(tenant_sub); });
            tenant.addEventListener('mouseout', () => { hide(tenant_sub);  });
            tenant_sub.addEventListener('mouseover', () => {show(tenant_sub);});
            tenant_sub.addEventListener('mouseout', () => { hide(tenant_sub); });
            </script>
            ";

        }
        else {

            echo "<script>
            function show_login_suboptions() {
                let login_suboptions = document.getElementById('login_suboptions');
                
                if (!login_suboptions.hasAttribute('hidden')) {                    
                    login_suboptions.setAttribute('hidden', true); 
                } else {                    
                    login_suboptions.removeAttribute('hidden'); 
                }
            }

            </script>";

            
            if (!empty($error)){
                echo "<script>
                document.getElementById('login_suboptions').removeAttribute('hidden'); 
                </script>";
            }
            else if (!empty($error_reg)){
                echo "<script>
                
                    let login_suboptions = document.getElementById('login_suboptions');
                    let login_form = document.getElementById('login_form');
                    let reg_form = document.getElementById('registration_form');
                                
                    login_suboptions.removeAttribute('hidden'); 
                    login_form.setAttribute('hidden', true);
                    reg_form.removeAttribute('hidden');

                </script>
                
                ";
            }


        }

    ?>

    <script>  
        let login_form = document.getElementById('login_form');
        let registration_form = document.getElementById('registration_form');
        
        let log_link = document.getElementById('log');
        let reg_link = document.getElementById('reg');
        
        function show_log() {
            login_form.removeAttribute('hidden');
            registration_form.setAttribute('hidden', true);
        }
        
        function show_reg() {
            login_form.setAttribute('hidden', true);
            registration_form.removeAttribute('hidden');
        }

    </script>


    <?php 

        if(isset($_COOKIE['loggedin_msg']) || isset($_COOKIE['loggedout_msg']) || isset($_COOKIE['registered']) || isset($_COOKIE['existed'])){
            echo "
            <script>    
            let msg = document.getElementById('msg');
            msg.removeAttribute('hidden');
            setTimeout(function() {
                msg.setAttribute('hidden', true);
            }, 5000); 
            </script> ";
        }

    ?>

    


</body>

<?php //ad block 
    $random_number = rand(1, 2);    // Generate a random number between 1 and 3

    $query = "SELECT * FROM advert WHERE id = '" . $random_number . "'";

    $result = mysqli_query($db_connection, $query);

    if ($result) { 
        while($row = mysqli_fetch_assoc($result)) { 
            echo "
            <div class='ad-container'>
            <div class='main_ad'>
                <img src='" . $row['picture'] . "0.jpg' alt=''>
                <b>Contact Details:</b>
                <b>". $row['service_name']. "</b>
                <b>". $row['email']. "</b>
                <b>". $row['phone']. "</b>
                <b>". $row['text']. "</b>
                </div>
            </div>";
        }
    }
?>

</html>

