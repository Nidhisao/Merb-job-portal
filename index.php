<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Job Portal</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
}

/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 80px;
    position:fixed;
    width:100%;
    top:0;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
    z-index:1000;
}

.logo{
    font-size:22px;
    font-weight:bold;
    color:#6c5ce7;
}

.right{
    display:flex;
    align-items:center;
    gap:15px;
}

.signup{
    background:#6c5ce7;
    color:white;
    padding:8px 18px;
    border:none;
    border-radius:20px;
    cursor:pointer;
}

/* HERO */
.hero{
    height:100vh;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 100px;
    padding-top:80px;

    background:linear-gradient(135deg,#dcd6ff,#f3e8ff);
}

/* LEFT TEXT */
.hero-text{
    width:50%;
}

.hero-text h1{
    font-size:50px;
    color:#3b2f63;
}

.hero-text p{
    color:#6b5fa3;
}

/* BUTTONS */
.hero-btn{
    margin-top:20px;
}

.hero-btn button{
    margin:5px;
    padding:12px 25px;
    border:none;
    border-radius:25px;
    cursor:pointer;
}

.btn-dark{
    background:#6c5ce7;
    color:white;
}

.btn-light{
    background:white;
    color:#6c5ce7;
    border:1px solid #6c5ce7;
}

/* RIGHT IMAGE */
.hero-img{
    width:50%;
    display:flex;
    justify-content:center;
}

.hero-img img{
    width:80%;
}

/* FOOTER */
.footer{
    position:absolute;
    bottom:20px;
    width:100%;
    text-align:center;
    font-size:12px;
    color:#555;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">💼 Job Portal</div>

    <div class="right">

        <?php if(isset($_SESSION['user'])) { ?>

            <span><?php echo $_SESSION['user']; ?></span>

            <a href="logout.php">
                <button class="signup">Logout</button>
            </a>

        <?php } else { ?>

            <a href="login.php">Login</a>

            <a href="register.php">
                <button class="signup">Sign up</button>
            </a>

        <?php } ?>

    </div>

</div>

<!-- HERO -->
<div class="hero">

    <!-- LEFT TEXT -->
    <div class="hero-text">
        <h1>Connecting talent with opportunity</h1>
        <p>Find your dream job with top companies</p>

        <div class="hero-btn">

            <?php if(isset($_SESSION['user'])) { ?>

                <a href="home.php">
                    <button class="btn-dark">Browse Jobs</button>
                </a>

            <?php } else { ?>

                <a href="register.php">
                    <button class="btn-dark">Get Started</button>
                </a>

                <a href="login.php">
                    <button class="btn-light">Login</button>
                </a>

            <?php } ?>

        </div>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="hero-img">
        <img src="img1.png">
    </div>

</div>

<div class="footer">
    © 2026 Job Portal
</div>

</body>
</html>