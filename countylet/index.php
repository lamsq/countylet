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

            <!-- Script that checks the role and prints corresponding options and suboptions for each user role -->

            <?php
                session_start();            
                $msg_reg = "";
                
                // if the role is set (user is logged in)
                if (isset($_SESSION["role"])){                    

                    //options for different access levels
                    if ($_SESSION["role"]=="admin"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\" \"><div id=\"option1\" class=\"option\">Landlord options</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Tenant options</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option3\" class=\"option\">Search</div></a>";                
                        echo "<a href=\"testimonial.php\"><div id=\"option5\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\"contact_us.php\"><div id=\"option6\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option7\" class=\"option\">Log out</div></a>";                        
                    }
                    else if ($_SESSION["role"]=="landlord"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";                        
                        echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\"contact_us.php\"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Landlord account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                    else if ($_SESSION["role"]=="tenant"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";                  
                        echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\"contact_us.php\"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\"tenant_account.php\"><div id=\"option5\" class=\"option\">Tenant account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                }
                //options for public level
                else {
                    echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                    echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";                    
                    echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                    echo "<a href=\"contact_us.php\"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                    echo "<a href=\"login_register.php\" ><div id=\"option5\" class=\"option\">Login/Register</div></a>";   
                }

            ?>
        </div>

                <?php 
                    // if the role is set (user is logged in)
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
                            echo "<a href=\"contact_us_manage.php\"><div id=\"suboption60\" class=\"suboption\">Manage contact us</div></a>";
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
                <div id="msg" hidden>
                <div >
                    <!-- script that prints the message if user is logged in/out or registered -->
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
                
    </header>

    <main>

        <!-- Title and description -->
        <div class="title_description">
            <!-- bootstrap form-group -->
            <div class="">
                <!-- company name -->
                <div class='company_name'><h1>CountyLet</h1></div>
                <!-- company description -->
                <div class='company_description'><h5 class="">

                Your Gateway to Seamless Property Solutions

                    </br></br>Nestled in the heart of Dublin, CountyLet stands tall as a beacon of excellence in property management. With a rich tapestry of experience, a dedication to client satisfaction, and a commitment to excellence, we are your premier partner in navigating the intricate landscape of property letting in Ireland’s capital city and beyond.

                    </br></br>CountyLet was born from a vision of simplifying the rental process for both landlords and tenants alike. Our mission is to provide a seamless experience marked by transparency, integrity, and efficiency, ensuring that every interaction with us exceeds expectations.

                
                </h5></div>
            </div>
        </div>

        <!-- boxes for the last properties added -->
        <div class="boxes">

                <?php
                    //gets data for index_show table to check what data should be displayed
                    require_once '../mysql_connect.php';                           
                    $query = "SELECT * FROM index_show;";
                    $result = mysqli_query($db_connection, $query);

                    if (!isset($index_show)){
                        $index_show = array();
                    }
                    if ($result){                         
                        while($row = mysqli_fetch_assoc($result)){ 
                            $index_show[]=$row;
                        }                                                    
                        mysqli_free_result($result);                         
                    } else { 
                        echo "<h3>Something went wrong, try again;</h3>";
                    }

                    // property arrays to get the last 3 records from the db

                    $property0=array();
                    $property1=array();
                    $property2=array();
                    $boxes_data=array($property2,$property1,$property0);

                    require_once  '../mysql_connect.php';   // Require database connection script                            
                    $query = "SELECT * FROM property ORDER BY property_id DESC;"; // MySQL statement
                    $result = mysqli_query($db_connection, $query);
                    
                    if ($result){ // Check if query was successful
                        
                        $ads_counter=3;

                        //loop to populate the array 

                        while($row = mysqli_fetch_assoc($result)){ // Loop through the data
                            $ads_counter--;
                            $boxes_data[$ads_counter] = array(
                                "type"=>$row['type'],
                                "bedrooms"=>$row['bedrooms'],
                                "description"=>$row['description'],
                                "photos"=>$row['photos'],
                                "property_id"=>$row['property_id'],
                                "owner_id"=>$row['owner_id'],
                                "mon_rent"=>$row['mon_rent'],
                                "eircode"=>$row['eircode'],
                                "address"=>$row['address']
                            );
                            if($ads_counter==0){
                                break;
                            }                             
                        }

                        //condition that print property boxes depends on the amount in db

                        if($ads_counter!=0){

                            if($ads_counter>1){
                                echo "  
                                <script>
                                let box0 = document.getElementById('box0');                                
                                box.setAttribute('hidden', true);                                
                                </script>";

                                if($ads_counter>2){
                                    echo " 
                                    <script>
                                    let box1 = document.getElementById('box1');                                    
                                    box.setAttribute('hidden', true);                                     
                                    </script>";

                                    if($ads_counter==3){
                                        echo "  <script>
                                        let box2 = document.getElementById('box2');
                                        box.setAttribute('hidden', true);                             
                                        </script>";    
                                    }
                                }                                
                            }                             
                        }
                        //mysqli_free_result($result); // free the result set                        
                    } else { // connection error
                        echo "<h3>Something went wrong, try again;</h3>";
                    }
                    
                ?>


                <!-- html elements to display properties -->
                <div class="box" id="box2">
                    <div class="img" <?php if($index_show[0]['display']==0) echo " hidden " ?>>
                        <img <?php 
                        echo "src='".$boxes_data[count($boxes_data)-1]['photos']."0.jpg'";   
                        ?> alt="">
                    </div>
                    <div class="type" <?php if($index_show[1]['display']==0) echo " hidden " ?>> 
                    <?php echo $boxes_data[count($boxes_data)-1]["type"]; ?>  </div>
                    <div class="price" <?php if($index_show[2]['display']==0) echo " hidden " ?>> 
                    <?php echo $boxes_data[count($boxes_data)-1]["mon_rent"]; ?> € </div>
                    <div class="text" <?php if($index_show[3]['display']==0) echo " hidden " ?>>  
                    <?php echo $boxes_data[count($boxes_data)-1]["description"]; ?> </div>                
                </div>

                <div class="box" id="box1">
                    <div class="img" <?php if($index_show[0]['display']==0) echo " hidden " ?>> <img <?php 
                        echo "src='".$boxes_data[count($boxes_data)-2]['photos']."0.jpg'";   
                        ?> alt="">
                    </div>
                    <div class="type" <?php if($index_show[1]['display']==0) echo " hidden " ?>>
                    <?php echo $boxes_data[count($boxes_data)-2]["type"]; ?> </div>
                    <div class="price" <?php if($index_show[2]['display']==0) echo " hidden " ?>> 
                    <?php echo $boxes_data[count($boxes_data)-2]["mon_rent"]; ?> €</div>
                    <div class="text" <?php if($index_show[3]['display']==0) echo " hidden " ?>>
                    <?php echo $boxes_data[count($boxes_data)-2]["description"]; ?> </div>                
                </div>
                
                <div class="box" id="box0">
                    <div class="img" <?php if($index_show[0]['display']==0) echo " hidden " ?>> <img <?php 
                        echo "src='".$boxes_data[count($boxes_data)-3]['photos']."0.jpg'";   
                        ?> alt="">
                    </div>  
                    <div class="type" <?php if($index_show[1]['display']==0) echo " hidden " ?>> 
                    <?php echo $boxes_data[count($boxes_data)-3]["type"]; ?></div> 
                    <div class="price" <?php if($index_show[2]['display']==0) echo " hidden " ?>>
                    <?php echo $boxes_data[count($boxes_data)-3]["mon_rent"]; ?> € </div>
                    <div class="text" <?php if($index_show[3]['display']==0) echo " hidden " ?>>
                    <?php echo $boxes_data[count($boxes_data)-3]["description"]; ?></div>                
                </div>
                
        </div>

    </main>

</body>
                


    <?php 
    
        //scripts to show/hide suboptions when user hovers header options

        if(isset($_COOKIE['loggedin_msg']) || isset($_COOKIE['loggedout_msg']) || isset($_COOKIE['registered'])){
            echo "
            <script>              
            document.getElementById('msg').removeAttribute('hidden');
            setTimeout(function() { document.getElementById('msg').setAttribute('hidden', true); }, 2000); 
            </script> ";
        }

        //if user is admin
        if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="admin"){
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
        //if user is landlord
        else if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="landlord"){
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
        //if user is tenant
        else if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="tenant"){
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

        // script to show ads
        $random_number = rand(1, 2);
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

