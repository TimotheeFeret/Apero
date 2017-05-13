<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livres</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

    <main class="container">
        <h1 class="center">Livres</h1>

        <!--        Récupération & afficharge des données-->
        <?php
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/modeles/livre.php';
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/assets/php/Table.php';

        $livre = new Livre();
        Table::render([
            'isbn' => 'ISBN',
            'nom_livre' => 'Nom',
            'annee_usage' => 'Année d\'usage',
            'prix' => 'Prix (€)'
        ],
            $livre->get(),
            ['edit', 'delete']);
        ?>

        <div class="fixed-action-btn">
            <a href="vues/livre/add.php" class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>