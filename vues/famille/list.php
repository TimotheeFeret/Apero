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
        Table::render(['nom' => 'Nom', 'adresse' => 'Adresse', 'telephone' => 'Téléphone'], $famille->get());
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