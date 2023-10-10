<?php
// Fonction pour insérer un nouvel étudiant en base de données
function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId) {
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'Etoile19*');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Requête SQL d'insertion d'un nouvel étudiant
        $query = "INSERT INTO student (grade_id, email, fullname, birthdate, gender) VALUES (:gradeId, :email, :fullname, :birthdate, :gender)";
        
        // Préparez la requête
        $stmt = $pdo->prepare($query);
        
        // Liez les paramètres aux valeurs fournies en utilisant bindValue
        $stmt->bindValue(':gradeId', $gradeId, PDO::PARAM_INT);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $birthdate->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
        
        // Exécutez la requête
        $stmt->execute();
        
        // Fermez la connexion à la base de données
        $pdo = null;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdateValue = $_POST['input-birthdate'];
    $birthdate = new DateTime($birthdateValue);
    $gradeIdValue = $_POST['input-grade_id'];
    $gradeId = intval($gradeIdValue);
    
    // Appel de la fonction pour insérer un nouvel étudiant
    insert_student($email, $fullname, $gender, $birthdate, $gradeId);
    echo 'Étudiant inséré avec succès.';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion d'un Nouvel Étudiant</title>
</head>
<body>
    <h1>Insertion d'un Nouvel Étudiant</h1>
    
    <form method="post">
        <label for="input-email">Email :</label>
        <input type="email" id="input-email" name="input-email" required><br>
        
        <label for="input-fullname">Nom complet :</label>
        <input type="text" id="input-fullname" name="input-fullname" required><br>
        
        <label for="input-gender">Genre :</label>
        <select id="input-gender" name="input-gender" required>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select><br>
        
        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" id="input-birthdate" name="input-birthdate" required><br>
        
        <label for="input-grade_id">Grade ID :</label>
        <select id="input-grade_id" name="input-grade_id" required>
            <option value="1">Bachelor 1</option>
            <option value="2">Bachelor 2 Web</option>
            <option value="3">Bachelor 2 Logiciel</option>
            <option value="4">Bachelor 2 Cyber</option>
            <option value="5">Bachelor 2 IA</option>
            <option value="6">Bachelor 3 Web</option>
            <option value="7">Bachelor 3 Logiciel</option>
            <option value="8">Bachelor 3 Cyber</option>
            <option value="9">Bachelor 3 IA</option>
            <option value="10">Mastère 1 IT Business IT</option>
            <option value="11">Mastère 2 IT Business IT</option>
            <option value="12">Mastère DPO</option>
        </select><br>
        
        <input type="submit" value="Insérer Étudiant">
    </form>
</body>
</html>
