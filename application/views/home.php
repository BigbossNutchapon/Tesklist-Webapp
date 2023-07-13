<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/home.css">

</head>

<body>

    <div class="form-box">

        <div class="button-box">

            <div id="btn-login"></div>
            <div id="btn-register"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log-in</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>

        </div>

        <div id="login" class="input-group">
            <span>Username</span>
            <input type="text" class="input-field" id="input_username" placeholder="Enter your username" required>

            <span>Password</span>
            <input type="password" class="input-field" id="input_password" placeholder="Enter your password" required>

            <button class="submit-btn" onclick="loginSummit()">Log-in</button>
        </div>

        <div id="register" class="input-group">
            <span>Username</span>
            <input type="text" class="input-field" id="enter_username" placeholder="Enter your username" required>

            <span>Password</span>
            <input type="password" class="input-field" id="enter_password" placeholder="Enter your password" required>

            <span>Confirm Password</span>
            <input type="password" class="input-field" id="confirm_password" placeholder="Confirm your password" required>
            
            <button class="submit-btn" onclick="registerSummit()">Register</button>
        </div>

    </div>

    <!-- JavaScript -->
    <script>

        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var login_btn = document.getElementById("btn-login");
        var register_btn = document.getElementById("btn-register");

        function register() {
            x.style.left = "-600px";
            y.style.left = "5px";
            login_btn.style.left = "-600px";
            register_btn.style.left = "272.5px";
        }

        function login() {
            x.style.left = "0px";
            y.style.left = "600px";
            login_btn.style.left = "0px";
            register_btn.style.left = "700px";
        }

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="assets/js/login.js"></script>
    
</body>

</html>
