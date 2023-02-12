<?php
include 'include/db.php';

$nom = $_POST['nom'];
$user = $_POST['user'];
$pass = $_POST['pass'];


$sql = "INSERT INTO USUARIO (NOMBRE, USERNAME, PASSWORD) VALUES('$nom', '$user', '$pass')";}
$query = mysqli_query($conn, $sql);
header("Location: index.html");
?>