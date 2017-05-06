<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Historique</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

<main class="container">
    <h1 class="center">Historique</h1>

    <!--        Récupération & afficharge des données-->
    <?php
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'modeles/exemplaire.php';
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'assets/php/Table.php';

    $exemplaire = new Exemplaire();
    $exemplaire->setNomTable('v_historique');
    Table::render([
        'livre_id' => 'Livre',
        'famille_vendeuse_nom' => 'Famille déposante',
        'famille_acheteuse_nom' => 'Famille acheteuse',
        'prix' => 'Prix de vente (€)',
        'date_depot_format' => 'Date de dépôt',
        'date_achat_format' => 'Date d\'achat'
    ], $exemplaire->get(),
        []);
    ?>
</main>

<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>