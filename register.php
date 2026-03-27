<?php
$conn = new mysqli("localhost","root","seedit","jobportal");

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");

    echo "<script>alert('Registered Successfully'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

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

/* LOGIN LINK */
.login{
    margin-top:15px;
    font-size:13px;
}

.login a{
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
        <h2>Create Account</h2>
        <p>Join and start your career journey</p>

        <form method="post">
            <input name="name" placeholder="Full Name" required>
            <input name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="submit">Register</button>
        </form>

        <div class="login">
            Already have account? <a href="login.php">Login</a>
        </div>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="image-box">
        <img src="img.png">
    </div>

</div>

</body>
</html>