<?php

function my_fizz_buzz(int $length): array {
    $result = [];
    
    for ($i = 1; $i <= $length; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) {
            // Si c'est un multiple de 3 et de 5, ajouter 'FizzBuzz' au tableau
            $result[] = 'FizzBuzz';
        } elseif ($i % 3 === 0) {
            // Si c'est un multiple de 3, ajouter 'Fizz' au tableau
            $result[] = 'Fizz';
        } elseif ($i % 5 === 0) {
            // Si c'est un multiple de 5, ajouter 'Buzz' au tableau
            $result[] = 'Buzz';
        } else {
            // Sinon, ajouter l'entier au tableau
            $result[] = $i;
        }
    }

    return $result;
}

// Exemple d'utilisation de la fonction
$result = my_fizz_buzz(15);
var_dump($result);

?>
