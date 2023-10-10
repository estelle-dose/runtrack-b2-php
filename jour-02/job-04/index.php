<?php
// Fonction pour récupérer les emails, noms complets et noms de promotions des étudiants
function find_all_students_grades() {
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'Etoile19*');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Requête SQL pour récupérer les données nécessaires
        $query = "SELECT student.email, student.fullname, grade.name AS grade_name
                  FROM student
                  INNER JOIN grade ON student.grade_id = grade.id";
        
        // Exécutez la requête et récupérez les résultats sous forme de tableau associatif
        $stmt = $pdo->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Fermez la connexion à la base de données
        $pdo = null;
        
        return $results;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Appel de la fonction pour récupérer les données des étudiants et promotions
$studentsGrades = find_all_students_grades();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants avec leurs Promotions</title>
</head>
<body>
    <h1>Liste des Étudiants avec leurs Promotions</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nom Complet</th>
                <th>Nom de Promotion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Afficher les données des étudiants et promotions dans le tableau HTML
            foreach ($studentsGrades as $student) {
                echo '<tr>';
                echo '<td>' . $student['email'] . '</td>';
                echo '<td>' . $student['fullname'] . '</td>';
                echo '<td>' . $student['grade_name'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
