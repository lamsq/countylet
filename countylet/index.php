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

               $role;
               function sanitized($input) {  
                $input = strip_tags($input); //strip tags
                $input = htmlspecialchars($input); //converting special characters
                $input = stripslashes($input);  //strip quotemarks
                $input = trim($input);  //sctrip whitespaces
                return $input; //returns edited value
                }

                if (isset($_COOKIE['logged_in']) && ($_COOKIE['logged_in'])==true){
                    require ("../mysql_connect.php");
                    $query = "SELECT * FROM roles"; // MySQL statement
                    $result = mysqli_query($db_connection, $query);
                    if ($result){
                        while($row = mysqli_fetch_assoc($result)){ // Loop through the data  
                            if($_COOKIE['user_id'] == $row['user_id'] ){ // Condition to check if appliance exists                            
                                $role = $row['user_role'];
                                break;
                            } 
                        }
                    }

                    if ($role=="admin"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\" \"><div id=\"option1\" class=\"option\">Landlord options</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Tenant options</div></a>";
                        echo "<a href=\" \"><div id=\"option3\" class=\"option\">Search</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Adverts</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option6\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option7\" class=\"option\">Log out</div></a>";
                    }
                    else if ($role=="landlord"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\" \"><div id=\"option1\" class=\"option\">Search</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Adverts</div></a>";
                        echo "<a href=\" \"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Landlord account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                    else if ($role=="tenant"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\" \"><div id=\"option1\" class=\"option\">Search</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Adverts</div></a>";
                        echo "<a href=\" \"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Tenant account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                }

                else {
                    echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                    echo "<a href=\" \"><div id=\"option1\" class=\"option\">Search</div></a>";
                    echo "<a href=\" \"><div id=\"option2\" class=\"option\">Adverts</div></a>";
                    echo "<a href=\" \"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                    echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                    echo "<a href=\"login_page.php\"><div id=\"option5\" class=\"option\">Login/Register</div></a>";
                }

            ?>
        </div>

                <?php 

                    $error = '';
                    $error_reg='';
                
                if (isset($_COOKIE['logged_in']) && $role=="admin"){

                    echo "<div id=\"home_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption01\" class=\"suboption\">Edit home page </div></a>";                    
                    echo "</div>";

                    echo "<div id=\"testimonial_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption50\" class=\"suboption\">Manage testimonial</div></a>";       
                    echo "<a href=\" \"><div id=\"suboption51\" class=\"suboption\">Testimonial add</div></a>";      
                    echo "</div>";

                    echo "<div id=\"contact_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption60\" class=\"suboption\">Manage contuct us</div></a>";
                    echo "</div>";

                    echo "<div id=\"landlord_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption10\" class=\"suboption\">Edit landlord account </div></a>";
                    echo "<a href=\" \"><div id=\"suboption11\" class=\"suboption\">Property listing </div></a>";
                    echo "<a href=\" \"><div id=\"suboption12\" class=\"suboption\">Edit property </div></a>";
                    echo "<a href=\" \"><div id=\"suboption13\" class=\"suboption\">Inventory details  </div></a>";
                    echo "<a href=\" \"><div id=\"suboption14\" class=\"suboption\">Edit inventory details  </div></a>";
                    echo "</div>";

                    echo "<div id=\"tenant_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption20\" class=\"suboption\">Edit tenant account </div></a>";
                    echo "<a href=\" \"><div id=\"suboption21\" class=\"suboption\">Inventory details </div></a>";
                    echo "</div>";
                }

                else if (isset($_COOKIE['logged_in']) && $role=="landlord"){


                    echo "<div id=\"testimonial_suboptions\" class=\"suboptions\" hidden>";    
                    echo "<a href=\" \"><div id=\"suboption30\" class=\"suboption\">Add testimonial </div></a>";      
                    echo "</div>";


                    echo "<div id=\"landlord_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption50\" class=\"suboption\">Property listing </div></a>";
                    echo "<a href=\" \"><div id=\"suboption51\" class=\"suboption\">Edit property </div></a>";
                    echo "<a href=\" \"><div id=\"suboption52\" class=\"suboption\">Inventory details  </div></a>";
                    echo "<a href=\" \"><div id=\"suboption53\" class=\"suboption\">Edit inventory details  </div></a>";
                    echo "</div>";


                }

                else if (isset($_COOKIE['logged_in']) && $role=="tenant"){

                    echo "<div id=\"testimonial_suboptions\" class=\"suboptions\" hidden>";    
                    echo "<a href=\" \"><div id=\"suboption60\" class=\"suboption\">Add testimonial </div></a>";      
                    echo "</div>";

                    echo "<div id=\"tenant_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\" \"><div id=\"suboption50\" class=\"suboption\">Inventory details </div></a>";
                    echo "</div>";

                }

                else {

                    
                        require_once ("../mysql_connect.php");
                        require_once ("session.php");
                        
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
                        
                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);
                        
                            // validate if email is empty
                            if (empty($email)) {
                                $error .= '<p class="error">Please enter email.</p>';
                            }
                        
                            // validate if password is empty
                            if (empty($password)) {
                                $error .= '<p class="error">Please enter your password.</p>';
                            }
                        
                            if (empty($error)) {
                                // prepare and execute the SELECT query
                                $stmt = $db_connection->prepare("SELECT * FROM users WHERE email = ?");
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $result = $stmt->get_result();
                        
                                if ($result->num_rows > 0) {
                                    // get the user data from the database
                                    $row = $result->fetch_assoc();
                        
                                    // verify the password
                                    if (password_verify($password, $row['password'])) {
                                        $_SESSION["userid"] = $row['id'];
                                        $_SESSION["user"] = $row;
                                        $_SESSION["name"] = $row['name'];
                        
                                        setcookie('logged_in', true, time()+30*24*60*60, '/', '', true, true);
                                        setcookie('user_id', $row['id'], time()+30*24*60*60, '/', '', true, true);
                        
                        
                                        // Redirect the user to welcome page
                                        header("location: index.php");
                                        exit;
                                    } else {
                                        $error .= '<p class="error">The password is not valid.</p>';
                                    }
                                } else {
                                    $error .= '<p class="error">No User exist with that email address.</p>';
                                }
                        
                                $stmt->close();
                            }
                            
                            mysqli_close($db_connection);
                            
                        }

                        else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg'])){

                            $fullname = trim($_POST['name']);
                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);
                            $confirm_password = trim($_POST["confirm_password"]);
                            $password_hash = password_hash($password, PASSWORD_BCRYPT);
                            $insertQuery = null;
                            
                            if($query = $db_connection->prepare("SELECT * FROM users WHERE email = ?")) {
                                // Bind parameters (s = string, i = int), username is a string so use "s"
                                $query->bind_param('s', $email);
                                $query->execute();
                                // Store the result so we can check if the account exists in the database.
                                $query->store_result();
                                if ($query->num_rows > 0) {
                                    $error_reg .= '<p class="error">The email address is already registered!</p>';
                                } else {
                                    // Validate password
                                    if (strlen($password ) < 6) {
                                        $error_reg .= '<p class="error">Password must have atleast 6 characters.</p>';
                                    }
                        
                                    // Validate confirm password
                                    if (empty($confirm_password)) {
                                        $error_reg .= '<p class="error">Please enter confirm password.</p>';
                                    } else {
                                        if (empty($error_reg) && ($password != $confirm_password)) {
                                            $error_reg .= '<p class="error">Password did not match.</p>';
                                        }
                                    }
                                    if (empty($error_reg) ) {
                                        $insertQuery = $db_connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
                                        $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                                        $result = $insertQuery->execute();
                                        var_dump($result); // for debugging
                                        if ($result) {
                                            $success = '<p class="success">Your registration was successful, please login to continue!</p>';
                                        } else {
                                            $error_reg .= '<p class="error">Something went wrong: '.$insertQuery->error_reg.'</p>';
                                        }
                                    }
                                }
                                $query->close();
                            }
                            // Close DB connection
                            mysqli_close($db_connection);

                        }


                        
                        
                    
                    // echo "
                    // <div id=\"login_suboptions\" class=\"suboptions\" hidden>    
                    // <div id=\"log_reg\">
                    //     <div id=\"log\">
                    //     Log in
                    //     </div>
                    //     <div id=\"reg\">
                    //     Register
                    //     </div>

                    // </div>
        
                    // ";


                    // echo "

                    //         <div id=\"login_form\">

                    //         <form method=\"post\" action=\"";
                    //         echo $_SERVER['PHP_SELF'];
                    // echo "

                    //         
                    //         \">
                    //     <div class=\"form-group\">
                    //         <label>Email Address</label>
                    //         <input type=\"email\" id=\"email_input\" name=\"email\" class=\"form-control\" required autofocus/>
                    //     </div>    
                    //     <div class=\"form-group\">
                    //         <label>Password</label>
                    //         <input type=\"password\" id=\"password_input\" name=\"password\" class=\"form-control\" required>
                    //     </div>
                    
                    
                    // ";
                    // if (!empty($error)) {
                    //     echo '<div class=" ">' . $error . '</div>';
                    // }

                    // echo "
                            
                            
                    //         <div class=\"form-group\">
                    //         <input type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"Log in\">
                    //         </div>";
                    
                     

                    // echo "
                    //     <p>Don't have an account? <a href=\"register.php\">Register here</a>.</p>
                    // </form>";

                    // echo "</div>";



                }
                
                ?>





                    <div id="login_suboptions" class="suboptions"   >    
                    <div id="log_reg">
                        <a id="log" href=""><div id="">  Log in   </div></a>
                        <a id="reg" href=""><div id="">    Register   </div></a>

                    </div>
        
                    <div id="login_form" >

                        <form method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?> ">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email_input" name="email" class="form-control" required autofocus/>
                        </div> 
                           
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password_input" name="password" class="form-control" required>
                        </div>
                    
                    
                    
                        <?php if (!empty($error)) {
                            echo '<div class=" ">' . $error . '</div>';
                        } ?>

                        <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary" value="Log in">
                        </div>
                    
                    </form>

                    </div>




                    <div id="registration_form" hidden>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>    
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" required />
                            </div>    
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>

                            <?php if (!empty($error_reg)) {
                                echo '<div class=" ">' . $error_reg . '</div>';
                            } ?>

                            <div class="form-group">
                                <input type="submit" name="reg" class="btn btn-primary" value="Register">
                            </div>
                            
                        </form>

                    </div>

            
        
    </header>

    <main>

        <!-- bootstrap container -->
        <div class="">
            <!-- bootstrap form-group -->
            <div class="form-group mx-auto col-md-6 pt-4 text-center">
                <!-- form title -->
                <h1>CountyLet</h1>
                <h5 class="text-secondary">Your trusted agency for renting and managing quality residential and commercial properties in Dublin. We specialize in personalized service, ensuring seamless transactions and satisfied landlords and tenants.</h2>
            </div>
        </div>

        <div class="boxes">
                
                <div class="box">
                test
                </div>
                
                <div class="box">
                test
                </div>
                
                <div class="box">
                test
                </div>
                
            </div>

    </main>


    <?php

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

            echo "

                <script>
                let login = document.getElementById('option5');
                let login_sub = document.getElementById('login_suboptions');

                let array =[login_sub];

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

                login.addEventListener('mouseover', () => {show(login_sub); });
                login.addEventListener('mouseout', () => { hide(login_sub);  });
                login_sub.addEventListener('mouseover', () => {show(login_sub);});
                login_sub.addEventListener('mouseout', () => { hide(login_sub); });

                </script>
            
            ";

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
            
            
            
            log_link.addEventListener('click', function(event) {
                event.preventDefault(); 
                show_log(); 
            });
            
            reg_link.addEventListener('click', function(event) {
                event.preventDefault(); 
                show_reg(); 
            });
        
    </script>



    
            


</body>
</html>

