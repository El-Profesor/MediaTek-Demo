# MediaTek-Demo

## 01 – Entrées / Sorties

### Validation des données saisies

Documentation : [PHP: Fonctions sur les chaînes de caractères - Manual](https://www.php.net/manual/fr/ref.strings.php)

1. Méthode de soumission des données
    - `$_SERVER['REQUEST_METHOD']`
    - Gestion de l'erreur correspondante (redirection, code de statut HTTP)
2. Champ requis (obligatoire)
    - Rappel : les données du formulaire sont récupérées dans un tableau (ici, `$_GET`) de chaînes de caractères (`string`)
    - `isset($_GET['champ'])`
    - `trim($_GET['champ']) !== ''`
    - Gestion de l'erreur correspondante (redirection, code de statut HTTP)  
3. Spécifications (format des données)
    - Taille (ex. : nombre de caractères min. et max.) : `strlen()`
    - Format spécifique (ex. : email, date, etc.) : utilisation des expressions régulières (*regex*)
    - Gestion de l'erreur correspondante (redirection, code de statut HTTP)
4. Cas particulier des fichiers uploadés
    - Rappel : le traitement des fichiers uploadés se fait via un tableau distinct (`$_FILES`)
    - Réussite ou échec de l'upload : `$_FILES['champ']['error']`
    - Spécifications (cas d'une image)
        - Poids du fichier (octets) : `$_FILES['champ']['size']`
        - Type de fichier (ex. : image) : `getimagesize()` et/ou classe `finfo` 
        - Format du fichier (ex. : JPEG ou PNG) : `getimagesize()` et/ou classe `finfo` 
        - Dimensions (hauteur × largeur) : `getimagesize()` et/ou classe `finfo`
        - Nom du fichier (ex. : nombre de caractères min. et max.) : `strlen()`
    - Gestion de l'erreur correspondante (redirection, code de statut HTTP)
