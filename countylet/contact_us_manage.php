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
                
    </header>

    <?php 

        if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){

            $contact_us_msgs = array();            
            require_once '../mysql_connect.php';   
                                        
            $query = "SELECT * FROM contact_us WHERE done=0 ORDER BY id ASC;"; 
            $result = mysqli_query($db_connection, $query);

            if ($result){                         
                while($row = mysqli_fetch_assoc($result)){ 
                    $contact_us_msgs[]=$row;
                }                    
                //mysqli_free_result($result);                         
            } else { 
                echo "<h3>Something went wrong, try again;</h3>";
            }

        }


        function sanitized($input) {  
        $input = strip_tags($input); //strip tags
        $input = htmlspecialchars($input); //converting special characters
        $input = stripslashes($input);  //strip quotemarks
        $input = trim($input);  //sctrip whitespaces
        return $input; //returns edited value
        }

    ?>

    <main> 

        <div class="contact_us_manage_title">
            <?php 
                if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
                    echo "Contact us manage";
                } else {
                    echo "Access denied;";
                }            
            ?>                    
        </div>
        
        <div class="contact_us_manage" <?php if(!isset($_SESSION['role']) || $_SESSION['role']!='admin' || empty($contact_us_msgs)) echo "hidden" ?>>

            <form id="contact_us_manage_box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" novalidate>

                <?php 

                    for($r=0; $r<count($contact_us_msgs); $r++){

                        echo "
                        <div class='manage_contact_us'>
                            <div class='name_email_manage_contact_us'>
                                <div class='name_manage_contact_us'>"; 
                                    
                                    echo $contact_us_msgs[$r]['name'];
                                         
                                echo "</div>

                                <div class='email_manage_contact_us'>";
                                    echo $contact_us_msgs[$r]['email'];
                                echo "</div>
                            </div>

                            <div class='text_manage_contact_us'>";
                                echo $contact_us_msgs[$r]['message'];
                            echo "</div>

                            <div class='phone_approve_manage_contat_us'>

                                <div class='phone_manage_contact_us'>";
                                    echo $contact_us_msgs[$r]['phone'];
                                echo "</div>

                                <div class='approve_manage_contact_us'>";
                                
                                if ( isset($_POST['contact_us_done_'.$r]) ) echo "Successfully done &nbsp;   ";
                                    
                                echo "<input class='contact_us_done' form='contact_us_manage_box' type='submit' name='contact_us_done_".$r."' value='Approve'";
                                
                                if ( isset($_POST['contact_us_done_'.$r]) ) echo "disabled";
                                
                                echo ">      
                                                                
                                </div>

                            </div>

                        </div>";

                    }

                ?>

            </form>
            
        </div>

        <?php

            for($r=0; $r<count($contact_us_msgs); $r++){

                $button = "contact_us_done_".$r;

                if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST[$button])){

                    require_once '../mysql_connect.php';
                    $query= "UPDATE contact_us SET done=1 WHERE id=".$contact_us_msgs[$r]['id'].";";
                    $result = mysqli_query($db_connection, $query);

                    if($result){

                    }
                                
                    if (!$result){ 
                        echo "<h3>Something went wrong, try again;</h3>";
                        
                    }

                }

            }

        ?>

    </main>

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

        require_once '../mysql_connect.php';  
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

