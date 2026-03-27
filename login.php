<?php
session_start();
$conn = new mysqli("localhost","root","seedit","jobportal");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");

    if($result->num_rows > 0){
        $_SESSION['user'] = $email;
        header("Location: home.php");
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(to bottom,#dcd6ff,#f3e8ff);
}

/* MAIN BOX */
.container{
    width:850px;
    height:500px;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
}

/* LEFT FORM */
.form-box{
    width:50%;
    background:white;
    padding:50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.form-box h2{
    margin-bottom:10px;
    color:#6c5ce7;
}

.form-box p{
    font-size:14px;
    color:#777;
    margin-bottom:20px;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    background:#6c5ce7;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    margin-top:10px;
    font-size:16px;
}

/* REGISTER LINK */
.register{
    margin-top:15px;
    font-size:13px;
}

.register a{
    color:#6c5ce7;
    text-decoration:none;
}

/* RIGHT IMAGE */
.image-box{
    width:50%;
    background:#f3e8ff;
    display:flex;
    justify-content:center;
    align-items:center;
}

.image-box img{
    width:80%;
}
</style>

</head>

<body>

<div class="container">

    <!-- LEFT FORM -->
    <div class="form-box">
        <h2>Welcome Back 👋</h2>
        <p>Login to continue your journey</p>

        <form method="post">
            <input name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>

            <button name="login">Login</button>
        </form>

        <div class="register">
            Don’t have an account? <a href="register.php">Register</a>
        </div>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="image-box">
        <img src="img.png">
    </div>

</div>

</body>
</html>