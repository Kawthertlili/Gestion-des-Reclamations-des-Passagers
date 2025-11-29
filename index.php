<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Aéroport de Monastir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <header>
            <h1>Connexion Admin</h1>
        </header>

        <main>
            <section id="login-form">
                <h2>Connectez-vous</h2>
                <?php
                if (isset($_SESSION['login_error'])) {
                    echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
                    unset($_SESSION['login_error']); // Supprimez le message d'erreur après l'affichage
                }
                ?>
                <form action="login.php" method="POST">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Se connecter</button>
                </form>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Aéroport de Monastir. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
