<?php

function my_closest_to_zero(array $array): int {
    $closest = null;

    foreach ($array as $number) {
        // Calculer la valeur absolue du nombre
        $absoluteValue = abs($number);

        if ($closest === null || $absoluteValue < abs($closest) || ($absoluteValue === abs($closest) && $number > 0)) {
            // Si $closest est null ou si la valeur absolue du nombre actuel est plus proche de zéro que celle de $closest
            // ou si les deux valeurs absolues sont égales et le nombre actuel est positif, mettre à jour $closest
            $closest = $number;
        }
    }

    return $closest;
}

// Exemples d'utilisation de la fonction
$result1 = my_closest_to_zero([2, -1, 5, 23, 21, 9]);
$result2 = my_closest_to_zero([234, -142, 512, 1223, 451, -59]);

echo "Le nombre le plus proche de zéro dans le premier tableau est : $result1";

echo "<br>";

echo "Le nombre le plus proche de zéro dans le deuxième tableau est : $result2";

?>
