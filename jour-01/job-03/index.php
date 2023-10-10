<?php

function my_is_multiple(int $divider, int $multiple): bool {
    // Vérifier si le multiple est divisible par le diviseur (c'est-à-dire, le reste de la division est zéro)
    return $multiple % $divider === 0;
}

// Exemples d'utilisation de la fonction
$result1 = my_is_multiple(2, 4);
$result2 = my_is_multiple(2, 5);

echo "Est-ce que 4 est un multiple de 2 ? ";
echo $result1 ? "Oui" : "Non";

echo "<br>";

echo "Est-ce que 5 est un multiple de 2 ? ";
echo $result2 ? "Oui" : "Non";

?>
