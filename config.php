<?php
try {
    // dev configuration
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0) {
        $bdd = new mysqli(
            'localhost',
            'root',
            '',
            'vap_factory'
        );
    }
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0) {
        $bdd = new mysqli('109.234.164.161', $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD'], 'sc1lgvu9627_techer-gregory.sprint-06 ');
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>