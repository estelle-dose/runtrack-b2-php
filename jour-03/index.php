<?php
include "class/Student.php";
include "class/Grade.php";
include "class/Room.php";
include "class/Floor.php";
include "functions.php";

//job-01

// $student1 = new Student(1, 1, "email@email.com", "Terry Cristinelli", "1990-01-18", "male");
// $student2 = new Student();

//     echo $student1;
//     echo $student2;

//job-02

// $grade1 = new Grade(1, 8, "Bachelor 1", "2023-01-09");
// $grade2 = new Grade();
// $room1 = new Room(1, 1, "RDC Food and Drinks", 90);
// $room2 = new Room();
// $floor1 = new Floor(1, "Rez-de-chaussée", 0);
// $floor2 = new Floor();

//     echo $grade1;
//     echo $grade2;
//     echo $room1;
//     echo $room2;
//     echo $floor1;
//     echo $floor2;

//job-04

// Appelez la fonction pour récupérer un étudiant par ID
$student = findOneStudent(100); // Remplacez numero par l'ID de l'étudiant que vous souhaitez récupérer

if ($student) {
    // Si l'étudiant a été trouvé, affichez ses informations
    echo $student;
} else {
    echo "Étudiant non trouvé.";
}

$grade = findOneGrade(2); // Remplacez numero par l'ID de la promo que vous souhaitez récupérer

if ($grade) {
    // Si la promo a été trouvé, affichez ses informations
    echo $grade;
} else {
    echo "Promo non trouvé.";
}

$floor = findOneFloor(1); // Remplacez numero par l'ID de l'étage que vous souhaitez récupérer

if ($floor) {
    // Si l'étage' a été trouvé, affichez ses informations
    echo $floor;
} else {
    echo "Etage non trouvé.";
}

$room = findOneRoom(3); // Remplacez numero par l'ID de la salle que vous souhaitez récupérer

if ($room) {
    // Si la salle a été trouvé, affichez ses informations
    echo $room;
} else {
    echo "Salle non trouvé.";
}

?>