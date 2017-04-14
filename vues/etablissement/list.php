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

        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
            </tr>
            </thead>

            <tbody>
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="vues/etablissement/add.php" class="btn-floating btn-large">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>