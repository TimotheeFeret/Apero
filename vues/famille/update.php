<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter une famille</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

    <main class="container">
        <h1 class="center">Modifier une famille</h1>

        <?php
        $submit_text = 'Modifier';
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/famille/form.php';
        ?>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>

    <script>
        var event = <?php echo json_encode(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>;
    </script>
</body>
</html>