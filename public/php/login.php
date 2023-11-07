<?php
$ckuser = "admin";
$ckpassword = 1234;

$user = $_POST ["user"];
$password = $_POST ["pass"];

if ($ckuser == $user && $ckpassword == $password){
  header ("location:../../views/lista.php");
} else {
  echo "<script>alert('Incorrect user or password');window.location='../../views/login.html'</script>";
}
 ?>
