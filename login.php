<?php
session_start();

// Configuration de la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "monastir_airport";

// Créez la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérez les données du formulaire
$user = $conn->real_escape_string($_POST['username']);
$pass = md5($_POST['password']); // Hash du mot de passe pour correspondre au stockage en base

// Afficher les valeurs pour le débogage (à retirer en production)
echo "Nom d'utilisateur: $user<br>";
echo "Mot de passe (hashé): $pass<br>";

// Vérifiez les informations d'identification
$sql = "SELECT * FROM admin_users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Connexion réussie
    $_SESSION['admin'] = $user;
    header("Location: view.php");
    exit(); // Assurez-vous de quitter après la redirection
} else {
    // Connexion échouée
    $_SESSION['login_error'] = "Nom d'utilisateur ou mot de passe incorrect";
    header("Location: index.php"); // Redirection vers la page de connexion
    exit(); // Assurez-vous de quitter après la redirection
}

// Fermez la connexion
$conn->close();
?>
