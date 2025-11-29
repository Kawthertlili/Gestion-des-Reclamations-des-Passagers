<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "monastir_airport";

// Créez la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérez les données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Préparez et liez la déclaration SQL
$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Variable pour stocker le message de confirmation
$confirmation_message = '';

// Exécutez la déclaration
if ($stmt->execute()) {
    $confirmation_message = "Message envoyé avec succès!";
} else {
    $confirmation_message = "Erreur: " . $stmt->error;
}

// Fermez la déclaration et la connexion
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - Aéroport de Monastir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <header>
            <h1>Contact et Assistance - Aéroport de Monastir</h1>
        </header>

        <main>
            <section id="confirmation-message">
                <h2>Confirmation</h2>
                <p><?php echo $confirmation_message; ?></p>
                <a href="index.html" class="button">Retour à la page principale</a>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Aéroport de Monastir. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
