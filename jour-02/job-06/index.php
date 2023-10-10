<?php
// Fonction pour récupérer les noms des promotions et les étudiants associés
function find_ordered_students() {
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'Etoile19*');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Requête SQL pour récupérer les noms des promotions et les étudiants associés
        $query = "SELECT grade.name AS grade_name, student.fullname, student.birthdate, student.email
                  FROM student
                  INNER JOIN grade ON student.grade_id = grade.id
                  ORDER BY grade_name";
        
        // Exécutez la requête et récupérez les résultats sous forme de tableau associatif
        $stmt = $pdo->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Organisez les données en fonction des promotions
        $grades = [];
        foreach ($results as $row) {
            $gradeName = $row['grade_name'];
            $studentData = [
                "fullname" => $row['fullname'],
                "birthdate" => $row['birthdate'],
                "email" => $row['email'],
            ];
            
            if (!isset($grades[$gradeName])) {
                $grades[$gradeName] = [];
            }
            
            $grades[$gradeName][] = $studentData;
        }
        
        // Fermez la connexion à la base de données
        $pdo = null;
        
        return $grades;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Appel de la fonction pour récupérer les données des étudiants triées par promotion
$orderedStudents = find_ordered_students();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants par Promotion</title>
</head>
<body>
    <h1>Liste des Étudiants par Promotion</h1>
    
    <?php
    // Afficher les données des étudiants triées par promotion
    foreach ($orderedStudents as $gradeName => $students) {
        echo '<h2>' . $gradeName . '</h2>';
        echo '<ul>';
        foreach ($students as $student) {
            echo '<li>';
            echo 'Nom complet : ' . $student['fullname'] . '<br>';
            echo 'Date de naissance : ' . $student['birthdate'] . '<br>';
            echo 'Email : ' . $student['email'];
            echo '</li><br>';
        }
        echo '</ul>';
    }
    ?>
</body>
</html>
