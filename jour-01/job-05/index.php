<?php

function my_is_prime(int $number): bool {
    if ($number <= 1) {
        return false; // Les nombres inférieurs ou égaux à 1 ne sont pas premiers
    }

    // Vérifier la divisibilité par tous les entiers de 2 à la racine carrée du nombre
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false; // Le nombre n'est pas premier s'il est divisible par un autre nombre
        }
    }

    return true; // Si aucune division exacte n'a été trouvée, le nombre est premier
}

// Exemples d'utilisation de la fonction
$result1 = my_is_prime(3);
$result2 = my_is_prime(12);

echo "Est-ce que 3 est un nombre premier ? ";
echo $result1 ? "Oui" : "Non";

echo "<br>";

echo "Est-ce que 12 est un nombre premier ? ";
echo $result2 ? "Oui" : "Non";

?>
