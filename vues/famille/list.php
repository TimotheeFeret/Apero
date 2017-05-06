<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Familles</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

    <main class="container">
        <h1 class="center">Familles</h1>

        <!--        Récupération & afficharge des données-->
        <?php
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/famille.php';
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'assets/php/Table.php';

        $famille = new Famille();
        $famille->setNomTable('v_famille');
        Table::render(['nom' => 'Nom'
            , 'telephone' => 'Téléphone'
            , 'code_postal_ville' => 'Lieu'
            , 'adhesion_libelle' => 'Status'
        ], $famille->get());
        ?>
        
        <div class="fixed-action-btn">
            <a href="vues/famille/add.php" class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>