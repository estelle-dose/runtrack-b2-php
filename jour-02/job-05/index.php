<?php
// Fonction pour récupérer les noms, capacités et déterminer si une salle est pleine
function find_full_rooms() {
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'Etoile19*');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Requête SQL pour récupérer les données des salles et leur capacité
        $query = "SELECT room.name, room.capacity, COUNT(student.id) AS students_count
                  FROM room
                  LEFT JOIN student ON room.id = student.grade_id
                  GROUP BY room.id";
        
        // Exécutez la requête et récupérez les résultats sous forme de tableau associatif
        $stmt = $pdo->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Créez un tableau final pour les salles avec les indicateurs de salle pleine
        $rooms = [];
        foreach ($results as $room) {
            $isFull = ($room['students_count'] >= $room['capacity']) ? 'Oui' : 'Non';
            $rooms[] = [
                'name' => $room['name'],
                'capacity' => $room['capacity'],
                'is-full' => $isFull,
            ];
        }
        
        // Fermez la connexion à la base de données
        $pdo = null;
        
        return $rooms;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Appel de la fonction pour récupérer les données des salles
$roomsData = find_full_rooms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Salles et Capacités</title>
</head>
<body>
    <h1>Liste des Salles et Capacités</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Nom de la Salle</th>
                <th>Capacité</th>
                <th>Salle Pleine</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Afficher les données des salles dans le tableau HTML
            foreach ($roomsData as $room) {
                echo '<tr>';
                echo '<td>' . $room['name'] . '</td>';
                echo '<td>' . $room['capacity'] . '</td>';
                echo '<td>' . $room['is-full'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
