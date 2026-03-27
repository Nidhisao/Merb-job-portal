<?php
session_start();
$conn = new mysqli("localhost","root","seedit","jobportal");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

if(isset($_POST['apply'])){

    $name = $_POST['name'];
    $email = $_SESSION['user'];
    $phone = $_POST['phone'];
    $college = $_POST['college'];
    $passout = $_POST['passout'];
    $percentage = $_POST['percentage'];

    $file = $_FILES['resume']['name'];
    $tmp = $_FILES['resume']['tmp_name'];

    $file = str_replace(" ","_",$file);
    $target = "uploads/".$file;

    if(!file_exists("uploads")){
        mkdir("uploads");
    }

    if(move_uploaded_file($tmp,$target)){

        $conn->query("INSERT INTO applications 
        (user_email,job_id,name,phone,college,passout,percentage,resume)
        VALUES('$email','$id','$name','$phone','$college','$passout','$percentage','$file')");

        echo "<script>
        alert('🎉 Applied Successfully!');
        window.location='home.php';
        </script>";

    } else {
        echo "<script>alert('❌ Upload Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Apply Job</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:flex-start; /* FIX */
    padding-top:40px;
    background:linear-gradient(to bottom,#dcd6ff,#f3e8ff);
}

/* MAIN BOX */
.container{
    width:850px;
    display:flex;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

/* LEFT FORM */
.form-box{
    width:50%;
    background:#ffffff;
    padding:40px;
    max-height:520px;   /* FIX */
    overflow-y:auto;    /* FIX */
}

.form-box h2{
    margin-bottom:10px;
}

.form-box p{
    font-size:13px;
    color:#777;
}

/* INPUT */
input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:5px;
}

input[readonly]{
    background:#f1f1f1;
}

button{
    width:100%;
    padding:12px;
    background:#a29bfe;   /* ✅ light purple */
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    margin-top:10px;
    font-weight:bold;
    transition:0.3s;
}

/* hover effect */
button:hover{
    background:#6c5ce7;   /* darker purple */
    transform:scale(1.03);
}
/* RIGHT IMAGE */
.image-box{
    width:50%;
    background:#f2f6fb;
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

    <!-- LEFT -->
    <div class="form-box">
        <h2>Apply for Job</h2>
        <p>Fill your details below</p>

        <form method="post" enctype="multipart/form-data">

            <input name="name" placeholder="Full Name" required>

            <input value="<?php echo $_SESSION['user']; ?>" readonly>

            <input name="phone" placeholder="Phone Number" required>

            <input name="college" placeholder="College Name" required>

            <input name="passout" placeholder="Passout Year" required>

            <input name="percentage" placeholder="Percentage" required>

            <input type="file" name="resume" required>

            <button name="apply">Submit Application</button>

        </form>
    </div>

    <!-- RIGHT -->
    <div class="image-box">
        <img src="img.png">
    </div>

</div>

</body>
</html>