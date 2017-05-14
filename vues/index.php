<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Acceuil</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/vues/topbar.php'; ?>

<main class="container">
    <h1 class="center">Acceuil</h1>

    <div class="row center">
        <div class="col s1"></div>
        <a href="vues/famille/list.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/famille.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Familles</span>
                    </div>
                </div>
            </div>
        </a>

        <a href="vues/etablissement/list.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/etablissement.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Établissements</span>
                    </div>
                </div>
            </div>
        </a>

        <a href="vues/livre/list.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/livre.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Livres</span>
                    </div>
                </div>
            </div>
        </a>

        <a href="vues/stock/list.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/stock.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Stock</span>
                    </div>
                </div>
            </div>
        </a>

        <a href="vues/historique/list.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/historique.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Historique</span>
                    </div>
                </div>
            </div>
        </a>
        <div class="col s1"></div>
    </div>

    <div class="row center">
        <div class="col s4"></div>
        <a href="vues/depot/add.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/depot.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Dépôt</span>
                    </div>
                </div>
            </div>
        </a>

        <a href="vues/achat/add.php">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="/apero/assets/img/achat.png" class="btn-img">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Achat</span>
                    </div>
                </div>
            </div>
        </a>
        <div class="col s4"></div>
    </div>


    </div>
</main>

<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/vues/footer.php'; ?>
</body>
</html>