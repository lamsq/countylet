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
            
                $msg_reg = "";
               $role;
               function sanitized($input) {  
                $input = strip_tags($input); //strip tags
                $input = htmlspecialchars($input); //converting special characters
                $input = stripslashes($input);  //strip quotemarks
                $input = trim($input);  //sctrip whitespaces
                return $input; //returns edited value
                }

                if (isset($_COOKIE['logged_in']) && ($_COOKIE['logged_in'])==true){
                    require_once ("../mysql_connect.php");
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

                    //options for different access levels
                    if ($role=="admin"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\" \"><div id=\"option1\" class=\"option\">Landlord options</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Tenant options</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option3\" class=\"option\">Search</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Adverts</div></a>";
                        echo "<a href=\"testimonial.php\"><div id=\"option5\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option6\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option7\" class=\"option\">Log out</div></a>";
                        

                    }
                    else if ($role=="landlord"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Adverts</div></a>";
                        echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Landlord account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                    else if ($role=="tenant"){
                        echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                        echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";
                        echo "<a href=\" \"><div id=\"option2\" class=\"option\">Adverts</div></a>";
                        echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                        echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                        echo "<a href=\" \"><div id=\"option5\" class=\"option\">Tenant account</div></a>";
                        echo "<a href=\"logout.php\"><div id=\"option6\" class=\"option\">Log out</div></a>";
                    }
                }
                //options for public level
                else {
                    echo "<a href=\"index.php\"><div id=\"option0\" class=\"option\">Home</div></a>";
                    echo "<a href=\"search.php\"><div id=\"option1\" class=\"option\">Search</div></a>";
                    echo "<a href=\" \"><div id=\"option2\" class=\"option\">Adverts</div></a>";
                    echo "<a href=\"testimonial.php\"><div id=\"option3\" class=\"option\">Testimonial</div></a>";
                    echo "<a href=\" \"><div id=\"option4\" class=\"option\">Contact us</div></a>";
                    echo "<a href=\"#\" onclick=\"show_login_suboptions()\"><div id=\"option5\" class=\"option\">Login/Register</div></a>";
                }

            ?>
        </div>

            <div id="msg" hidden>
                <div >
                    <?php
                         
                        if(isset($_COOKIE['loggedin_msg'])){
                            echo $_COOKIE['loggedin_msg'];
                        }
                        else if(isset($_COOKIE['loggedout_msg'])){
                            echo "Successfully logged out";
                        }
                        else if(isset($_COOKIE['registered'])){
                            echo $_COOKIE['registered'];
                        }
                        else if(isset($_COOKIE['existed'])){
                           
                            echo $_COOKIE['existed'];
                        }


                    ?>
                </div>
            </div> 

                <?php 

                $error = '';
                $error_reg='';
                $reg_msg ='';

                //conditions for different access levels with corresponding suboptions
                if (isset($_COOKIE['logged_in']) && $role=="admin"){

                    echo "<div id=\"home_suboptions\" class=\"suboptions\" hidden>";
                    echo "<a href=\"index_edit.php\"><div id=\"suboption01\" class=\"suboption\">Edit home page </div></a>";                    
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
                //if user isnt logged in
                else {

                    
                        require_once ("../mysql_connect.php");
                        require_once ("session.php");
                        
                        //if login button pressed
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

                            // validate email 
                            if (isset($_POST['email']) && !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', sanitized($_POST['email']))){
                                $error.= '<p class="">Incorrect email format;</p>';
                            }
                            else if (empty(sanitized($_POST['email']))) {
                                $error.= '<p class="">Please enter email;</p>';
                            }
                            else {
                                $email = htmlentities(sanitized($_POST['email']));
                            }
                        
                            // validate password
                            if (isset($_POST['password']) && strlen($_POST['password'])<8){
                                $error.= '<p class="">Incorrect password format;</p>';
                            }
                            else if (empty(sanitized($_POST['password']))) {
                                $error.= '<p class="">Please enter your password;</p>';
                            }
                            else {
                                $password = htmlentities(sanitized($_POST['password']));
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
                                        $_SESSION["user_id"] = $row['id'];
                                        $_SESSION["user"] = $row;
                                        $_SESSION["name"] = $row['name'];
                                        $_SESSION["surname"] = $row['surname'];

                                        setcookie('logged_in', true, time()+30*24*60*60, '/', '', true, true);
                                        setcookie('user_id', $row['id'], time()+30*24*60*60, '/', '', true, true);
                                        setcookie('loggedin_msg', "Successfully logged in", time()+3, '/', '', true, true);
                        
                                        // Redirect the user to welcome page
                                        header("location: index.php");

                                        exit;
                                    } else {
                                        $error.= '<p class="">The password is not valid;</p>';
                                    }
                                } else {
                                    $error.= '<p class="">User is not registered;</p>';
                                }

                                $stmt->close();
                            }
                            
                            //mysqli_close($db_connection);
                            
                        }

                        //if register button pressed
                        else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg'])){


                            // validate name 
                            if (isset($_POST['name']) && preg_match('/[a-zA-Z]+(?:[-\s][a-zA-Z]+)*/', ($_POST['name']))){
                                $name = htmlentities(sanitized($_POST['name']));
                            }
                            else if (empty($_POST['name'])) {
                                $error_reg.= '<p class="">Enter your name;</p>';
                            }
                            else {
                                $error_reg.= '<p class="">Incorrect name;</p>';
                            } 

                            // validate surname 
                            if (isset($_POST['surname']) && preg_match('/[a-zA-Z]+(?:[-\s][a-zA-Z]+)*/', ($_POST['surname']))){
                                $surname = htmlentities(sanitized($_POST['surname']));
                            }
                            else if (empty(($_POST['surname']))) {
                                $error_reg.= '<p class="">Enter your surname;</p>';
                            }
                            else {
                                $error_reg.= '<p class="">Incorrect surname;</p>';
                            } 


                            // validate email 
                            if (isset($_POST['email']) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', ($_POST['email']))){
                                $email = htmlentities(sanitized($_POST['email']));
                            }
                            else if (empty($_POST['email'])) {
                                $error_reg.= '<p class="">Enter email;</p>';
                            }
                            else {
                                $error_reg.= '<p class="">Incorrect email format;</p>';
                            } 


                            // validate password 
                            if (strlen(($_POST['password'])<8 && strlen(($_POST['password'])>0))){
                                $error_reg.= '<p class="">Password is too short;</p>';
                            }
                            else if (!empty($_POST['password']) && !preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[*.,!_\-()a-zA-Z\d]+$/', ($_POST['password']))){
                                $error_reg.= '<p class="">Incorrect password format;</p>';
                            }
                            else if (strlen(($_POST['password'])<8 && strlen(($_POST['password'])>0))){
                                $error_reg.= '<p class="">Password is too short;</p>';
                            }
                            else if (empty(($_POST['password']))) {
                                $error_reg.= '<p class="">Enter password;</p>';
                            }
                            else {
                                
                                $password = htmlentities(sanitized($_POST['password']));
                                if($password==htmlentities(sanitized($_POST['confirm_password'])) && !empty($_POST['confirm_password'])){
                                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                                    
                                }
                                else if (empty($_POST['confirm_password'])){
                                    $error_reg.='<p class="">Password does not match the confirmation;</p>';
                                }
                                else {
                                    $error_reg.='<p class="">Confirm the password;</p>';
                                }
                            } 


                            if(isset($_POST['tenant']) && !empty($_POST['tenant'])){    
                                $user_role = 'tenant';
                            }
                            else if (isset($_POST['landlord']) && !empty($_POST['landlord'])){
                                $user_role = "landlord";
                            }
                            else {
                                $error_reg.='<p class="">Choose user type;</p>';
                            }

                            

                            if(empty($error_reg)){

                                $userFound = false; //user found flag
                                $userDBId = 0; //user id

                                require_once '../mysql_connect.php';   //requires the connection script

                                $query = "SELECT * FROM users"; //mysql statement to check the user data
                                $result = mysqli_query($db_connection, $query);

                                if($result){ //if there are results
                                    while($row = mysqli_fetch_assoc($result)){ //loop through the data
                                        
                                        if(str_contains(implode($row), $email) ){ //if user exists in the db
                                            //prints the messages 
                                            
                                            
                                            setcookie('existed', "User with ".$email." email is alredy registered", time()+5, '/', '', true, true);                             //FIX
                                            
                                            //echo " <div class=\"\"><h5>User with ".$email." email is already registered</h5></div>"  ;  
                                            //toggle the flag
                                            $userFound = true;
                                            $userDBId = $row['id'];  //sets user id to add the appliance
                                            break; //exits the loop
                                        }
                                        
                                    }
                                    
                                    if (!$userFound){ //if user was not found

                                        //prepares data for mysql statement
                                        $name = mysqli_real_escape_string($db_connection, $name);
                                        $surname = mysqli_real_escape_string($db_connection, $surname);
                                        $email = mysqli_real_escape_string($db_connection, $email);
                                        $password_hash = mysqli_real_escape_string($db_connection, $password_hash);
                                        $user_role = mysqli_real_escape_string($db_connection, $user_role);
                                        
                                        //mysql statement
                                        $add_user_statement = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password_hash')";

                                        $result = mysqli_query($db_connection, $add_user_statement); //passes the statement

                                        if ($result) { //if user was registered

                                            require_once '../mysql_connect.php';   //requires the connection script

                                            $query = "SELECT id FROM users WHERE email='$email'"; //mysql statement to check the user data
                                            $result = mysqli_query($db_connection, $query);
                                            
                                            if($result){

                                                $user_id = (mysqli_fetch_assoc($result))['id'];

                                                $add_user_role = "INSERT INTO roles (user_id, user_role) VALUES ('$user_id', ' $user_role')";

                                                $result = mysqli_query($db_connection, $add_user_role); //passes the statement

                                                if ($result){
                                                    $msg = $name." was registered with email ".$email;
                                                    setcookie('registered', $msg, time()+5, '/', '', true, true);                                                           //FIX                                                   
                                                }
                                                else{
                                                    echo "Something went wrong;</br>".mysqli_error($db_connection);
                                                }                                               

                                            }

                                            else {
                                                echo "Something went wrong;</br>".mysqli_error($db_connection);
                                            }



                                        } else {
                                            echo "Error adding user;</br> ".mysqli_error($db_connection);
                                        }

                                    }
                                    
                                    
                                    } else { //connection error
                                        echo "<div class=\"\">";
                                        echo "<h5>Something went wrong, try again;</h5>";
                                        echo "</div>";
                                    }


                                    }
                                    
                                    //mysqli_close($db_connection);


                            }
                            
                            
                        
                    
                    echo "
                    <div id=\"login_suboptions\" class=\"suboptions\"   hidden>    
                    <div id=\"log_reg\">
                        <a id=\"log\" onclick=\"show_log()\" href=\"#\"><div id=\"\">  Log in   </div></a>
                        <a id=\"reg\" onclick=\"show_reg()\" href=\"#\"><div id=\"\">    Register   </div></a>
                    </div>
        
                    <div id=\"login_form\" >
                        <form method=\"post\" novalidate action=\""; 

                        echo htmlspecialchars($_SERVER["PHP_SELF"]);
                        
                        echo "\">
                        <div class=\"form-group\">
                            <label>Email Address</label>
                            <input type=\"email\" id=\"email_input\" name=\"email\" class=\"form-control\"  value=\"";
                            
                            if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);

                        echo "\" autofocus/>
                        </div> 
                           
                        <div class=\"form-group\">
                            <label>Password</label>
                            <input type=\"password\" id=\"password_input\" name=\"password\" class=\"form-control\" >
                        </div>";
                    
                        if (!empty($error)) { echo '<div class="error">' . $error . '</div>'; } 
                        
                        echo"
                        <div class=\"form-group\">
                        <input type=\"submit\" name=\"login\"  class=\"btn btn-primary\" value=\"Log in\">
                        </div>
                    
                    </form>
                    </div>


                    <div id=\"registration_form\" hidden>

                        <form method=\"post\" novalidate action=\"";                       
                        echo $_SERVER['PHP_SELF'];                         
                        echo "\">

                            <div class=\"form-group\">
                                <label>Name</label>
                                <input type=\"text\" name=\"name\" class=\"form-control\"  value=\"";                                
                                if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']);                                
                            echo "\">
                            </div>   

                            <div class=\"form-group\">
                                <label>Surname</label>
                                <input type=\"text\" name=\"surname\" class=\"form-control\"  value=\"";                                
                                if(isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']);                                
                            echo "\">
                            </div> 
                            
                            <div class=\"form-group\">
                                <label>Email Address</label>
                                <input type=\"email\" name=\"email\" class=\"form-control\" value=\"";                                
                                if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);                                
                            echo "\" >
                            </div>    

                            <div class=\"form-group\">
                                <label>Password</label>
                                <input type=\"password\" name=\"password\" class=\"form-control\" >
                            </div>

                            <div class=\"form-group\">
                                <label>Confirm Password</label>
                                <input type=\"password\" name=\"confirm_password\" class=\"form-control\" >
                            </div>
                            
                            <div id=\"choose_role\" class=\"form-group\">
                                I am a:</br>
                                <input type=\"radio\" id=\"tenant\" class=\"\" name=\"tenant\" value=\"tenant\">
                                <label for=\"html\">Tenant</label><br>
                               <input type=\"radio\" id=\"landlord\" class=\"\" name=\"landlord\" value=\"landlord\">
                               <label for=\"html\">Landlord</label><br>
                            </div>";

                            if (!empty($error_reg)) {
                                echo '<div class="error">' . $error_reg . '</div>';
                            } 

                            echo "
                            <div class=\"form-group\">
                                <input type=\"submit\" name=\"reg\" class=\"btn btn-primary\" value=\"Register\">
                            </div>
                        </form>
                    </div>  
                    ";

                }

                ?>
                
    </header>

    <main>     
        
    

        <?php if (isset($_COOKIE['logged_in']) && $role=="admin"){

                echo "
                <form id='index_edit' action='". htmlspecialchars($_SERVER["PHP_SELF"])."' method='POST' novalidate>

                    <div id='index_edit_photo'>
                        <label for='edit_photo'>Show photo:</label>
                        <input type='checkbox' id='edit_photo_box' name='edit_photo_box'"; 
                        if(isset($_POST['edit_photo_box']) || (isset($_COOKIE["index_photo"]) && $_COOKIE["index_photo"]==1)) echo " checked";
                        echo "> </div> 

                    <div id='index_edit_type'>
                        <label for='edit_type'>Show type:</label>
                        <input type='checkbox' id='edit_type_box' name='edit_type_box'"; 
                        if(isset($_POST['edit_type_box']) || (isset($_COOKIE["index_type"]) && $_COOKIE["index_type"]==1)) echo " checked";
                        echo "> </div> 

                    <div id='index_edit_price'>
                        <label for='edit_price'>Show price:</label>
                        <input type='checkbox' id='edit_price_box' name='edit_price_box'"; 
                        if(isset($_POST['edit_price_box']) || (isset($_COOKIE["index_price"]) && $_COOKIE["index_price"]==1)) echo " checked";
                        echo "> </div> 

                    <div id='index_edit_text'>
                        <label for='edit_text'>Show description:</label>
                        <input type='checkbox' id='edit_text_box' name='edit_text_box' "; 
                        if(isset($_POST['edit_text_box']) || (isset($_COOKIE["index_text"]) && $_COOKIE["index_text"]==1)) echo " checked";
                        echo "></div> 
                        
                    <input class='save_index' type='submit' id='save_index' name='save_index' value='Save'>

                </form>";


                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_index'])){

                    setcookie('index_photo', isset($_POST['edit_photo_box']) ? 1 : 0, time()+(10*365*24*60*60), '/', '', true, true);
                    setcookie('index_type', isset($_POST['edit_type_box']) ? 1 : 0, time()+(10*365*24*60*60), '/', '', true, true);
                    setcookie('index_price', isset($_POST['edit_price_box']) ? 1 : 0, time()+(10*365*24*60*60), '/', '', true, true);
                    setcookie('index_text', isset($_POST['edit_text_box']) ? 1 : 0, time()+(10*365*24*60*60), '/', '', true, true);

                    echo "<div class='changed_msg'>Settings successfully changed;</div>";
                    
                }
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
            </script>";

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
</html>

