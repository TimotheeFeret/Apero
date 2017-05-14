<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier un livre</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

<main class="container">
    <h1 class="center">Modifier un livre</h1>

    <?php
    $submit_text = 'Modifier';
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/livre/form.php';
    ?>
</main>

<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>