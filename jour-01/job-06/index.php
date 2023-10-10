<?php

function my_array_sort(array $arrayToSort, string $order): array {
    if ($order === 'ASC') {
        // Trie le tableau en ordre croissant
        usort($arrayToSort, function ($a, $b) {
            if (is_string($a) && is_string($b)) {
                return strcmp($a, $b);
            }
            return $a - $b;
        });
    } elseif ($order === 'DESC') {
        // Trie le tableau en ordre décroissant
        usort($arrayToSort, function ($a, $b) {
            if (is_string($a) && is_string($b)) {
                return strcmp($b, $a);
            }
            return $b - $a;
        });
    } else {
        // Gère les cas où l'ordre n'est ni 'ASC' ni 'DESC'
        return $arrayToSort;
    }

    return $arrayToSort;
}

// Exemples d'utilisation de la fonction pour trier des tableaux d'entiers et de chaînes de caractères
$result1 = my_array_sort([2, 24, 12, 7, 34], 'ASC');
$result2 = my_array_sort([8, 5, 23, 89, 6, 10], 'DESC');
$result3 = my_array_sort(['saphir', 'améthyste', 'rubis', 'diamant'], 'ASC');

echo "Tri croissant (entiers) : ";
echo implode(', ', $result1);

echo "<br>";

echo "Tri décroissant (entiers) : ";
echo implode(', ', $result2);

echo "<br>";

echo "Tri croissant (chaînes de caractères) : ";
echo implode(', ', $result3);


?>
