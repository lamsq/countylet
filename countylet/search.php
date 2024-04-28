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
                
    </header>


    <main>
    <div class="search_subtitle"><h2 >Search your property</h2></div>
        <div class="search">
            
            <form id="form_id" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="GET" novalidate>

                <div class="search_dates">
                    <div id="start_date_div">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" value=" <?php if(isset($_GET['start_date'])) echo htmlspecialchars($_GET['start_date'])?> ">
                    </div>

                    <div id="end_date_div">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" value=" <?php if(isset($_GET['end_date'])) echo htmlspecialchars($_GET['end_date'])?> ">
                    </div>
                </div>

                <div id="bed_dropdown_div">
                <label for="bedrooms">Number of Bedrooms:</label>
                <select id="bed_dropdown" name="bed_dropdown">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                </select>
                </div>
        
                    <div class="price-input"> 
                        <div id="min_price_div" class="price-field"> 
                            <span>Price range: From</span> 
                            <input type="number" class="min-input" name="min_price" value="0"> 
                        </div> 
                        <div class="price-field" id="max_price_div"> 
                            <span>To</span> 
                            <input type="number" class="max-input" name="max_price" value="5000"> 
                        </div> 
                    </div> 
                    
                <input class="search_button" type="submit" name="search" value="Search">
            </form>
        </div>    

                <?php

                    function sanitized($input) {  
                        $input = strip_tags($input); //strip tags
                        $input = htmlspecialchars($input); //converting special characters
                        $input = stripslashes($input);  //strip quotemarks
                        $input = trim($input);  //sctrip whitespaces
                        return $input; //returns edited value
                        }

                    $boxes_search_results = array();
                    $search_errors = [];

                    $start_date='';
                    $end_date='';
                    $beds='';
                    $min_price='';
                    $max_price='';

                    // Retrieve and sanitize the input
                    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
                        
                        // Ensure $_POST['purchaseDate'] and $_POST['warrantyExpDate'] are set
                        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
                        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;

                        // Get today's date string in 'Y-m-d' format to compare with input dates
                        $today_str = date('Y-m-d');                        

                        // Convert dates to Unix timestamps for comparison
                        $startDateTimestamp = strtotime($start_date);
                        $endDateTimestamp = strtotime($end_date);
                        $todayTimestamp = strtotime($today_str);

                        // Validate Purchase Date

                        if($start_date != null && $end_date!=null){
                            $startDateTimestamp = strtotime($start_date);
                            $endDateTimestamp = strtotime($end_date);
                            $todayTimestamp = strtotime($today_str);
                            if($todayTimestamp>$startDateTimestamp || $todayTimestamp>$endDateTimestamp ){
                                $search_errors[]="Incorrect start/end date, can not be in the past;";
                            } else if($endDateTimestamp-$startDateTimestamp<=0){
                                $search_errors[]="Start date must be before end date;";
                            }

                        }else if (($start_date == null || $end_date==null) && ( $start_date != null || $end_date!=null)  ){
                            $search_errors[]="Set up both start and end dates;";
                        }

                        if (isset($_GET['bed_dropdown']) && preg_match('/^[1-4]$/', $_GET['bed_dropdown']) ){
                            $beds = htmlentities(sanitized($_GET['bed_dropdown']));                           
                        }else {
                            $beds=null;
                        }

                        if (isset($_GET['min_price']) && preg_match('/^\d*\.?\d+$/', $_GET['min_price']) ){
                            $min_price=htmlentities(sanitized($_GET['min_price']));
                        } else if (!preg_match('/^\d*\.?\d+$/', $_GET['min_price'])) {
                            $search_errors[] = "Incorrect min price format;";
                        } else {
                            $min_price=null;
                        }

                        if (isset($_GET['max_price']) && preg_match('/^\d*\.?\d+$/', $_GET['max_price'])){
                            $max_price=htmlentities(sanitized($_GET['max_price']));
                        } else if (!preg_match('/^\d*\.?\d+$/', $_GET['max_price'])){
                            $search_errors[] = "Incorrect max price format;";
                        } else {
                            $max_price=null;
                        }
                        
                        if(empty($search_errors)){

                            require_once '../mysql_connect.php';                           
                            $query = "SELECT * FROM property WHERE available=1 "; 
                           
                            if(($start_date!=null && $end_date!=null) || $beds!=null || $min_price!=null || $max_price!=null){
                                
                                if($start_date!=null && $end_date!=null){

                                    $start_date = strtotime($start_date);
                                    $end_date = strtotime($end_date);
                                    $months = ceil(abs($end_date - $start_date) / (30 * 24 * 60 * 60));
                                    $query.="AND length>=".$months." ";
                                }
                                if($beds!=null){
                                    $query.="AND bedrooms=".$beds." ";
                                }
                                if ($min_price!=null){
                                    $query.="AND mon_rent>=".$min_price." ";
                                }
                                if( $max_price!=null){
                                    $query.="AND mon_rent<=".$max_price.";";
                                }
                            }

                            $result = mysqli_query($db_connection, $query);
                            
                            if ($result){ 
                                
                                while($row = mysqli_fetch_assoc($result)){ 
                                    $boxes_search_results[]=$row;
                                }
                                
                                $search_done = true;                                
                                mysqli_free_result($result); 
                                
                            } else { 
                                echo "<h3>Something went wrong, try again;</h3>";
                            }
                        }                        
                    }

                ?>

        <!-- content -->
        <div class="errors_search" id="errors_search_id">
            <?php 
                foreach ($search_errors as $search_err){
                    echo "<div >";
                    echo $search_err;
                    echo "</div>";
                }
            ?>
        </div>

            <?php 

                if(isset($search_done)) {
                echo "<div id='search_results'>Results found: ".count($boxes_search_results)."</div>";}

                if(count($boxes_search_results)>0){

                    for ($t=0; $t<count($boxes_search_results); $t++){

                        echo "<div class='boxes_search' id='boxes_search_id'>
    
                            <div class='search_results_row'>

                                    <div class='main_photo_search'>    
                                            <img src='".$boxes_search_results[$t]['photos']."0.jpg"."                                            
                                            ' alt=''>      
                                    </div>
    
                                <div class='box_search' id='box_search_id'>
    
                                    <div class='price_search'>         
                                        ".$boxes_search_results[$t]['mon_rent']." EUR/mon
                                    </div>
    
                                    <div class='type_search'>     
                                        <b>Property type:</b> ".$boxes_search_results[$t]['type']."    
                                    </div>  
                                    
    
                                    <div class='bedrooms_search'>    
                                        <b>Number of bedrooms:</b> ".$boxes_search_results[$t]['bedrooms']."    
                                    </div>
    
                                    <div class='address_search'>    
                                        <b>Address: </b>".strtoupper($boxes_search_results[$t]['eircode']).", ".$boxes_search_results[$t]['address']."    
                                    </div>
    
                                    <div class='length_search'>
                                        <b>Available for:</b> ".$boxes_search_results[$t]['length']." months
                                    </div>
    
                                    <div class='text_search'>
                                        ".$boxes_search_results[$t]['description']."
                                    </div>
                                
                                </div>
    
                            </div>
     
                        </div> ";
    
                    }

                }

            ?>
        
    </main>

    <?php //scripts to show/hide suboptions when user hovers header options

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
        else if (isset($_COOKIE['logged_in']) && $_SESSION["role"]=="tenant"){
            echo "<script>
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
            </script>";
        }
        
    ?>

</body>

    <?php //scripts to show/hide suboptions when user hovers header options

        if(isset($_COOKIE['loggedin_msg']) || isset($_COOKIE['loggedout_msg']) || isset($_COOKIE['registered'])){
            echo "
            <script>              
            document.getElementById('msg').removeAttribute('hidden');
            setTimeout(function() { document.getElementById('msg').setAttribute('hidden', true); }, 2000); 
            </script> ";
        }

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

        require_once  '../mysql_connect.php';
        // Generate a random number between 1 and 3
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

