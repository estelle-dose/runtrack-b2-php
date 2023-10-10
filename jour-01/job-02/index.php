<?php

function my_str_reverse(string $string): string {
    $reversedString = '';
    
    // Parcourir la chaîne de caractères de la fin vers le début
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $reversedString .= $string[$i];
    }

    return $reversedString;
}

// Exemple d'utilisation de la fonction
$result = my_str_reverse('Hello');
echo "La chaîne inversée de 'Hello' est : $result";

?>
