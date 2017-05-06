<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Stock</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

<main class="container">
    <h1 class="center">Stock</h1>

    <!--        Récupération & afficharge des données-->
    <?php
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'modeles/exemplaire.php';
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'assets/php/Table.php';

    $exemplaire = new Exemplaire();
    $exemplaire->setNomTable('v_stock');
    Table::render(['livre_nom' => 'Livre',
        'famille_nom' => 'Famille déposante',
        'prix' => 'Prix estimé (€)',
        'etat' => 'État',
        'date_depot_format' => 'Date du dépôt'
    ], $exemplaire->get(),
        []);
    ?>
</main>

<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>