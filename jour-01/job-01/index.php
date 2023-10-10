<?php

function my_str_search(string $haystack, string $needle): int {
    $count = 0;
    $needle = strtolower($needle); // Convertir la lettre recherchée en minuscules pour une correspondance insensible à la casse
    $haystack = strtolower($haystack); // Convertir la chaîne de caractères en minuscules pour une correspondance insensible à la casse

    for ($i = 0; $i < strlen($haystack); $i++) {
        if ($haystack[$i] === $needle) {
            $count++;
        }
    }

    return $count;
}

// Exemple d'utilisation de la fonction
$result = my_str_search('La Plateforme', 'a');
echo "Le nombre d'occurrences de la lettre 'a' dans 'La Plateforme' est : $result";

?>
