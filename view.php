<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages de Contact - Aéroport de Monastir</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styles pour la modale */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="content">
        <header>
            <h1>Messages de Contact - Aéroport de Monastir</h1>
            <a href="logout.php">Déconnexion</a>
        </header>

        <main>
            <section id="messages">
                <h2>Liste des messages</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Sujet</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // Configuration de la base de données
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "monastir_airport";

                        // Créez la connexion
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Vérifiez la connexion
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Récupérez les messages de la base de données
                        $sql = "SELECT id, name, email, subject, message FROM contact_messages";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Affichez les données de chaque ligne
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["subject"] . "</td>
                                        <td>" . $row["message"] . "</td>
                                        <td><button onclick='openModal(" . $row["id"] . ")'>Répondre</button></td>
                                      </tr>";
                                // Modale pour répondre au message
                                echo "<div id='modal" . $row["id"] . "' class='modal'>
                                        <div class='modal-content'>
                                            <span class='close' onclick='closeModal(" . $row["id"] . ")'>&times;</span>
                                            <h2>Répondre à " . $row["name"] . "</h2>
                                            <form action='send_response.php' method='POST'>
                                                <input type='hidden' name='email' value='" . $row["email"] . "'>
                                                <label for='response'>Message de réponse :</label>
                                                <textarea id='response' name='response' rows='4' required></textarea>
                                                <button type='submit'>Envoyer</button>
                                            </form>
                                        </div>
                                      </div>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Aucun message trouvé</td></tr>";
                        }

                        // Fermez la connexion
                        $conn->close();
                        ?>
                    </tbody>
                    
                </table>
                <a href="index.html" class="button">Retour à la page principale</a>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Aéroport de Monastir. Tous droits réservés.</p>
        </footer>
    </div>

    <script>
        // Fonctions pour ouvrir et fermer la modale
        function openModal(id) {
            document.getElementById('modal' + id).style.display = "block";
        }

        function closeModal(id) {
            document.getElementById('modal' + id).style.display = "none";
        }
    </script>
    
</body>
</html>
