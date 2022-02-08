<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login_page.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik">
</head>

<body>
    <div>
        <img src="Images/college-attendance-management-system.jpg" id="main_background_img" alt="">

        <div
            style=" width: 100%; background-color:transparent; position: absolute; top: 0; display: flex; justify-content: center;">
            <div id=signin_div>
                <h1 style="color: white;">Sign in</h1>

                <form action="" method="POST">
                    <input type="email" name="email_signin" class="email" placeholder="Please enter email" required>
                    <input style="margin-bottom: 10px;" type="password" name="password_signin" class="email"
                        placeholder="Password" maxlength="30" minlength="5" required>
                    <a href="#"
                        style="color: rgba(256, 256, 256, 0.6); font-size:small; text-decoration-line: none; float: right;">Forgot
                        password ?</a>
                    <p id="field_check" style="color: goldenrod; margin-top: 23px; font-weight: 100; display:none"></p>
                    <input type="submit" id="signin_but" value="Sign in" name="sign_but"><br><br>
                </form>
            </div>
        </div>
    </div>
    <?php

        include 'php_connection.php';
            if (isset($_POST['sign_but'])){
                $email = mysqli_real_escape_string($conn,$_POST['email_signin']);
                $password_signin = mysqli_real_escape_string($conn,$_POST['password_signin']);
                $check_email = " select Password from teachers_login where Mail_id = '$email' ";
                $ce=mysqli_query($conn,$check_email);
                
                if(mysqli_num_rows($ce)){
                    
                    $pass_verify = mysqli_fetch_assoc($ce);
                    $pv = $pass_verify['Password'];
                    $pass_decode = password_verify($password_signin,$pv);

                    if($pass_decode){
                        ?>
                        <script>
                            location.replace("homepage.php");
                        </script>
                    <?php
                    }
                    else{
                        ?>
                        <script>
                            document.getElementById("field_check").innerHTML="* Incorrect password"
                            document.getElementById("field_check").style.display = "block"
                        </script>
                <?php
                    }
                }
                else{
                    ?>
                        <script>
                            document.getElementById("field_check").innerHTML="* Account doesn't exist"
                            document.getElementById("field_check").style.display = "block"
                        </script>
                <?php
                }
            }mysqli_close($conn)
    ?>
</body>
</html>