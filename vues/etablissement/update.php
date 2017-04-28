<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier un établissement</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

    <main class="container">
        <h1 class="center">Modifier un établissement</h1>

        <?php
        $submit_text = 'Modifier';
        include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/etablissement/form.php';
        ?>
    </main>

    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>

    <script>
        var event = <?php echo json_encode('update'); ?>;
        var id = <?php echo json_encode($_GET['id']); ?>;
    </script>
</body>
</html>