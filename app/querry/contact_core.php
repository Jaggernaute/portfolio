<?php

//definition des variables de connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

//definition des variables a rentrer dans la BDD
$fname = htmlentities($_POST["fname"], ENT_QUOTES, "UTF-8");
$lname = htmlentities($_POST["lname"], ENT_QUOTES, "UTF-8");
$mail = htmlentities($_POST["mail"], ENT_QUOTES, "UTF-8");
$adr = htmlentities($_POST["adr"], ENT_QUOTES, "UTF-8");
$tel = htmlentities($_POST["tel"], ENT_QUOTES, "UTF-8");
$msg = htmlentities($_POST["msg"], ENT_QUOTES, "UTF-8");
$contact = $_POST['contact'];

// creation de la connection
$conn = new mysqli($servername, $username, $password, $dbname);

// verification de la connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// insertion des infos dans la BDD
$sql = "INSERT INTO contact ( fname, lname ,mail, adr, tel, msg)
VALUES ( '$fname', '$lname', '$mail', '$adr', '$tel', '$msg', '$contact')";

//info sur la creation du compte
if ($conn->query($sql) === TRUE) {
    echo "C'est fait !";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

//fermeture de la onnection
$conn->close();
?>
