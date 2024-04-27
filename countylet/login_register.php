<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CountyLet</title> <!-- page title-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap CSS -->
    <link href="style.css" rel="stylesheet"><!-- CSS -->
</head>

<?php 
        session_start();
        require_once ("../mysql_connect.php");        

        function sanitized($input) {  
            $input = strip_tags($input); //strip tags
            $input = htmlspecialchars($input); //converting special characters
            $input = stripslashes($input);  //strip quotemarks
            $input = trim($input);  //sctrip whitespaces
            return $input; //returns edited value
            }

        $error = '';
        $error_reg='';

        //if login button pressed
        if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['login'])) {

            // validate email 
            if (isset($_POST['email']) && !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', sanitized($_POST['email']))){
                $error.= '<p class="">Incorrect email format;</p>';
            } else if (empty(sanitized($_POST['email']))) {
                $error.= '<p class="">Please enter email;</p>';
            } else {
                $email = htmlentities(sanitized($_POST['email']));
            }

            // validate password
            if (isset($_POST['password']) && strlen($_POST['password'])<8){
                $error.= '<p class="">Incorrect password format;</p>';
            } else if (empty(sanitized($_POST['password']))) {
                $error.= '<p class="">Please enter your password;</p>';
            } else {
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

                        $_SESSION["user"] = $row;
                        $_SESSION["user_id"] = $row['id'];
                        $_SESSION["user_email"] = $row['email'];
                        $_SESSION["name"] = $row['name'];
                        $_SESSION["surname"] = $row['surname'];
                        $_SESSION["loggedin"] = true;
                        
                        $query = "SELECT user_role FROM roles WHERE user_id=".$_SESSION['user_id'].";"; // MySQL statement
                        $result = mysqli_query($db_connection, $query);
                        if ($result){
                            $_SESSION["role"]=(mysqli_fetch_assoc($result))["user_role"];
                        } else {
                            echo "The error occured, try again;";
                        }

                        setcookie('logged_in', true, time()+30*24*60*60, '/', '', true, true);
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
            } else if (empty($_POST['name'])) {
                $error_reg.= '<p class="">Enter your name;</p>';
            } else {
                $error_reg.= '<p class="">Incorrect name;</p>';
            } 

            // validate surname 
            if (isset($_POST['surname']) && preg_match('/[a-zA-Z]+(?:[-\s][a-zA-Z]+)*/', ($_POST['surname']))){
                $surname = htmlentities(sanitized($_POST['surname']));
            } else if (empty(($_POST['surname']))) {
                $error_reg.= '<p class="">Enter your surname;</p>';
            } else {
                $error_reg.= '<p class="">Incorrect surname;</p>';
            } 


            // validate email 
            if (isset($_POST['email']) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', ($_POST['email']))){
                $email = htmlentities(sanitized($_POST['email']));
            } else if (empty($_POST['email'])) {
                $error_reg.= '<p class="">Enter email;</p>';
            } else {
                $error_reg.= '<p class="">Incorrect email format;</p>';
            } 


            // validate password 
            if (strlen(($_POST['password'])<8 && strlen(($_POST['password'])>0))){
                $error_reg.= '<p class="">Password is too short;</p>';
            } else if ((!empty($_POST['password']) && !preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[*.!_\-()a-zA-Z\d]+$/', ($_POST['password']))) || str_contains($_POST['password']," ")){
                $error_reg.= '<p class="">Password should contain uppercase, lowercase letters and special character;</p>';
            } else if (strlen(($_POST['password'])<8 && strlen(($_POST['password'])>0))){
                $error_reg.= '<p class="">Password is too short;</p>';
            } else if (empty(($_POST['password']))) {
                $error_reg.= '<p class="">Enter password;</p>';
            } else {                
                $password = htmlentities(sanitized($_POST['password']));
                if($password==htmlentities(sanitized($_POST['confirm_password'])) && !empty($_POST['confirm_password'])){
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);                    
                } else if (empty($_POST['confirm_password'])){
                    $error_reg.='<p class="">Password does not match the confirmation;</p>';
                } else {
                    $error_reg.='<p class="">Confirm the password;</p>';
                }
            } 

            if(isset($_POST['role']) && !empty($_POST['role'])){    
                $user_role = htmlentities(sanitized($_POST['role']));
            } else {
                $error_reg.='<p class="">Choose user type;</p>';
            }

            if(empty($error_reg)){

                $userFound = false; //user found flag

                require_once '../mysql_connect.php';   //requires the connection script

                $query = "SELECT * FROM users"; //mysql statement to check the user data
                $result = mysqli_query($db_connection, $query);

                if($result){ //if there are results
                    while($row = mysqli_fetch_assoc($result)){ //loop through the data                        
                        if(str_contains(implode($row), $email) ){ //if user exists in the db
                            
                            $userFound = true;
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
                                $add_user_role = "INSERT INTO roles (user_id, user_role) VALUES ('$user_id', '$user_role')";
                                $result = mysqli_query($db_connection, $add_user_role); //passes the statement

                                if ($result){
                                    $msg = $name." was registered with ".$email." email;";
                                    setcookie('registered', $msg, time()+5, '/', '', true, true); 
                                    header("Location: index.php");                                                                                 
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

                    } else {
                        $error_reg="<p class=''>User with ".$email." email is alredy registered</p>";
                    }
                    
                } else { //connection error
                    echo "<div class=\"\">";
                    echo "<h5>Something went wrong, try again;</h5>";
                    echo "</div>";
                }

            }                    
            //mysqli_close($db_connection);
        }        
        
        if (!empty($error_reg)){
            $_SESSION["reg_page"]=true;            
        }
?>

<body>
    
    <div id="login_suboptions" class="suboptions">    

                    <div id="log_reg">
                        <a id="log" onclick="history.back()" href="#"><div id="">< </div></a>
                        <a id="log" href="index.php"><div id="">Home</div></a>
                        <a id="log" onclick="show_log()" href="#"><div id="">Login</div></a>
                        <a id="reg" onclick="show_reg()" href="#"><div id="">Register</div></a>
                    </div>
        
                    <div id="login_form">
                        <form method="post" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" id="email_input" name="email" class="form-control" value=" <?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?> " autofocus/>
                            </div> 
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password_input" name="password" class="form-control" >
                            </div>
                        
                            <?php if (!empty($error)) { echo '<div class="error">' . $error . '</div>'; } ?>
                                                        
                            <div class="form-group">
                                <input type="submit" name="login"  class="btn btn-primary" value="Log in">
                            </div>                    
                        </form>
                    </div>


                    <div id="registration_form" hidden>

                        <form method="post" novalidate action="<?php echo $_SERVER['PHP_SELF'];?>">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']);?>">
                            </div>   

                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" name="surname" class="form-control" value="<?php if(isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']);?>">
                            </div> 
                            
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="example@email.com" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>" >
                            </div>    

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" >
                            </div>
                            
                            <div id="choose_role" class="form-group">
                                I am:</br>
                                <input type="radio" id="tenant" class="" name="role" value="tenant">
                                <label for="html">Tenant</label><br>
                               <input type="radio" id="landlord" class="" name="role" value="landlord">
                               <label for="html">Landlord</label><br>
                            </div>

                            <?php if (!empty($error_reg)) {echo '<div class="error">' . $error_reg . '</div>'; } ?>

                            <div class="form-group">
                                <input type="submit" name="reg" class="btn btn-primary" value="Register">
                            </div>
                        </form>
                    </div> 


</body>

    <script>    
        let login_form = document.getElementById('login_form');
        let registration_form = document.getElementById('registration_form');
        
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
        if( isset($_SESSION["reg_page"]) && $_SESSION["reg_page"]==true){
            echo "<script>         
                document.getElementById('registration_form').removeAttribute('hidden');
                document.getElementById('login_form').setAttribute('hidden', true);
            </script> ";            
        }
        session_destroy();
    ?>

</html>
                  
                  






    
    








                    
                     
                    