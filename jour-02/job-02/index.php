<?php
// Fonction pour récupérer un étudiant en fonction de son email
function find_one_student(string $email) {
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'Etoile19*');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Requête SQL pour sélectionner un étudiant en fonction de l'email
        $query = "SELECT * FROM student WHERE email = :email";
        
        // Préparez la requête
        $stmt = $pdo->prepare($query);
        
        // Liez le paramètre email à la valeur fournie
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        // Exécutez la requête
        $stmt->execute();
        
        // Récupérez le résultat sous forme de tableau associatif
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Fermez la connexion à la base de données
        $pdo = null;
        
        return $student;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Vérifiez si le formulaire a été soumis
if (isset($_GET['input-email-student'])) {
    $email = $_GET['input-email-student'];
    $student = find_one_student($email);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'Étudiant par Email</title>
</head>
<body>
    <h1>Recherche d'Étudiant par Email</h1>
    
    <form method="get">
        <label for="input-email-student">Email de l'Étudiant :</label>
        <input type="text" id="input-email-student" name="input-email-student">
        <input type="submit" value="Rechercher">
    </form>
    
    <?php
    // Affichez les informations de l'étudiant s'il a été trouvé
    if (isset($student)) {
        if ($student) {
            echo '<h2>Informations de l\'étudiant :</h2>';
            echo '<ul>';
            echo '<li>ID : ' . $student['id'] . '</li>';
            echo '<li>Grade ID : ' . $student['grade_id'] . '</li>';
            echo '<li>Email : ' . $student['email'] . '</li>';
            echo '<li>Nom complet : ' . $student['fullname'] . '</li>';
            echo '<li>Date de naissance : ' . $student['birthdate'] . '</li>';
            echo '<li>Genre : ' . $student['gender'] . '</li>';
            echo '</ul>';
        } else {
            echo 'Aucun étudiant trouvé pour cet email.';
        }
    }
    ?>
</body>
</html>
