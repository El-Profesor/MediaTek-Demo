<?php

include_once "../utils/regex.php";

include_once "./partials/top.php";

$errors = [];
$successes = [];

/**
 * ******************** [1] Check if submitted form is valid
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Is method allowed ?
    if (isset($_GET['title']) && trim($_GET['title']) !== '') { // Required field value
        // OK
        $title = $_GET['title'];
        $titleLen = strlen($title);
        if ($titleLen < 2 || $titleLen > 150) { // Format check
            // KO
            $errors[] = "Le champ 'Titre' doit contenir entre 2 et 150 caractères.";
        }
    } else { // KO
        $errors[] = "Le champ 'Titre' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_GET['isbn']) && trim($_GET['isbn']) !== '') { // Required field value
        $isbn = $_GET['isbn'];
        if (!preg_match($validPatterns['isbn'], $isbn)) { // Format check
            // KO
            $errors[] = "Le champ 'ISBN' doit contenir exactement 13 chiffres.";
        }
    } else { // KO
        $errors[] = "Le champ 'ISBN' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_GET['summary']) && trim($_GET['summary']) !== '') { // Not required field value but essential test needed
        // OK
        $summary = $_GET['summary'];
        $summaryLen = strlen($summary);
        if ($summary > 65535) { // Format check
            // KO
            $errors[] = "Le champ 'Résumé' doit contenir au plus 65535 caractères.";
        }
    }

    if (isset($_GET['publication_year']) && trim($_GET['publication_year']) !== '') { // Required field value
        // OK
        $publicationYear = $_GET['publication_year'];
        if (!preg_match($validPatterns['year'], $publicationYear)) { // Format check
            // KO
            $errors[] = "Le champ 'Année de publication' doit être au format YYYY (ex. : 1997).";
        }
    } else { // KO
        $errors[] = "Le champ 'Année de publication' est obligatoire. Merci de saisir une valeur.";
    }

    if (count($errors) !== 0) {
        $errorMsg = "<ul>";
        foreach ($errors as $error) {
            $errorMsg .= "<li>$error</li>";
        }
        $errorMsg .= "</ul>";
        echo $errorMsg;
    } else {
        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';
    }
} else { // KO
    // Traitement de l'erreur
    header('Location: ../405.php');
}

include_once "./partials/bottom.php";