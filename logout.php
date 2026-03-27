<?php
session_start();

$user = $_SESSION['user'];

session_destroy();

echo "<script>
alert('👋 $user logged out successfully');
window.location='index.php';
</script>";
?>