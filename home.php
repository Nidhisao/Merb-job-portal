<?php
session_start();
$conn = new mysqli("localhost","root","seedit","jobportal");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Jobs</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
     background:linear-gradient(to bottom,#dcd6ff,#f3e8ff);
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 50px;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.logo{
    font-weight:bold;
    font-size:20px;
}

.user{
    font-size:14px;
}

.user a{
    margin-left:15px;
    text-decoration:none;
    color:#333;
}

/* SEARCH BAR */
.search{
    padding:20px 50px;
}

.search input{
    width:300px;
    padding:10px;
    border-radius:20px;
    border:1px solid #ddd;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    padding:20px 50px;
}

/* CARD */
.card{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

/* TEXT */
.title{
    font-weight:bold;
    font-size:15px;
    margin-bottom:5px;
}

.company{
    font-size:13px;
    color:#777;
    margin-bottom:10px;
}

.tag{
    display:inline-block;
    background:#eee;
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    margin:3px 3px 10px 0;
}

/* BUTTON */
button{
    padding:8px 15px;
    border:none;
    border-radius:20px;
    background:#6c5ce7;
    color:white;
    cursor:pointer;
}

button:hover{
    background:#4834d4;
}
</style>

</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="logo">💼 Job Portal</div>

    <div class="user">
        <?php echo $_SESSION['user']; ?>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- SEARCH -->
<div class="search">
    <input type="text" placeholder="Search jobs...">
</div>

<!-- JOB GRID -->
<div class="grid">

<?php
$result = $conn->query("SELECT * FROM jobs");

while($row = $result->fetch_assoc()){
?>

<div class="card">

    <div class="title"><?php echo $row['title']; ?></div>

    <div class="company"><?php echo $row['company']; ?></div>

    <!-- TAGS (static for UI look) -->
    <span class="tag">Full Time</span>
    <span class="tag">Remote</span>

    <br>

    <a href="apply.php?id=<?php echo $row['id']; ?>">
        <button>Apply</button>
    </a>

</div>

<?php } ?>

</div>

</body>
</html>