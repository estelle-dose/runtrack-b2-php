<?php
// Fonction pour récupérer tous les étudiants depuis la base de données
function find_all_students() {
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'Etoile19*');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Requête SQL pour sélectionner tous les étudiants
        $query = "SELECT * FROM student";
        
        // Exécutez la requête
        $stmt = $pdo->query($query);
        
        // Récupérez tous les résultats sous forme de tableau associatif
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Fermez la connexion à la base de données
        $pdo = null;
        
        return $students;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Appel de la fonction pour récupérer tous les étudiants
$students = find_all_students();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
</head>
<body>
    <h1>Liste des Étudiants</h1>
    
    <?php
    // Vérifiez si des étudiants ont été récupérés
    if (count($students) > 0) {
        // Affichez un tableau HTML avec les étudiants
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Grade ID</th><th>Email</th><th>Nom Complet</th><th>Date de Naissance</th><th>Genre</th></tr>';
        foreach ($students as $student) {
            echo '<tr>';
            echo '<td>' . $student['id'] . '</td>';
            echo '<td>' . $student['grade_id'] . '</td>';
            echo '<td>' . $student['email'] . '</td>';
            echo '<td>' . $student['fullname'] . '</td>';
            echo '<td>' . $student['birthdate'] . '</td>';
            echo '<td>' . $student['gender'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucun étudiant trouvé.';
    }
    ?>
</body>
</html>
