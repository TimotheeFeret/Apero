<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Établissements</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

    <main class="container">
        <h1 class="center">Établissements</h1>

        <!--        Récupération & afficharge des données-->
        <?php
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/etablissement.php';
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'assets/php/Table.php';

        $etablissement = new Etablissement();
        Table::render(['nom' => 'Établissement',
            'telephone' => 'Téléphone'
        ], $etablissement->get());
        ?>

        <div class="fixed-action-btn">
            <a href="vues/etablissement/add.php" class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>