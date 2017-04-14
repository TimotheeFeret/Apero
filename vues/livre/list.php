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

        <table>
            <thead>
            <tr>
                <th>ISBN</th>
                <th>Nom</th>
                <th>Année d'usage</th>
                <th>Prix</th>
            </tr>
            </thead>

            <tbody>
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="vues/livre/add.php" class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>