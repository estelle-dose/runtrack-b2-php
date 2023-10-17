<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Etoile19*";
$dbname = "lp_official";

// Fonction pour récupérer un étudiant par ID
function findOneStudent(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, grade_id, email, fullname, birthdate, gender FROM student WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$studentData) {
            return null;
        }

        // Créez une instance de la classe Student en utilisant les données récupérées
        $student = new Student(
            $studentData['id'],
            $studentData['grade_id'],
            $studentData['email'],
            $studentData['fullname'] ?? '',
            $studentData['birthdate'] ?? '',
            $studentData['gender'] ?? ''
        );
        return $student;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour récupérer une grade par ID
function findOneGrade(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, room_id, name, year FROM grade WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $gradeData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$gradeData) {
            return null;
        }

        // Créez une instance de la classe Grade en utilisant les données récupérées
        $grade = new Grade(
            $gradeData['id'],
            $gradeData['room_id'],
            $gradeData['name'],
            $gradeData['year']
        );
        return $grade;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour récupérer un étage (floor) par ID
function findOneFloor(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, name, level FROM floor WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $floorData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$floorData) {
            return null;
        }

        // Créez une instance de la classe Floor en utilisant les données récupérées
        $floor = new Floor(
            $floorData['id'],
            $floorData['name'],
            $floorData['level']
        );
        return $floor;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour récupérer une salle (room) par ID
function findOneRoom(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, floor_id, name, capacity FROM room WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $roomData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$roomData) {
            return null;
        }

        // Créez une instance de la classe Room en utilisant les données récupérées
        $room = new Room(
            $roomData['id'],
            $roomData['floor_id'],
            $roomData['name'],
            $roomData['capacity']
        );
        return $room;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}


?>