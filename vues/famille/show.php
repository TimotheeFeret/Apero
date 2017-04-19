<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nom famille</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

<main class="container">
    <h1 class="center">Nom famille</h1>

<!--    Information de la famille-->
    <h5>Information générales</h5>
    <div class="row">
        <div class="col s12">
            <div class="card darken-1">
                <div class="card-content">
                    <p>
                        <i class="material-icons prefix">phone</i>
                        <span>Téléphone :</span>
                        <span>00 00 00 00 00</span>
                    </p>

                    <br>

                    <p>
                        <i class="material-icons prefix">place</i>
                        <span>Adresse :</span>
                        <span>Addrr</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

<!--    Enfants-->
    <h5>Enfants</h5>
    <div class="row">
        <div class="card">
            <div class="card-tabs ">
                <ul class="tabs tabs-fixed-width white-text">
                    <li class="tab"><a href="#test4">Enfant 1</a></li>
                </ul>
            </div>
            <div class="card-content grey lighten-5">
                <div id="test4">

                    <p>
                        <i class="material-icons prefix">date_range</i>
                        <span>Date de naissance :</span>
                        <span>01/01/1995 (22 ans)</span>
                    </p>

                    <br>

                    <p>
                        <i class="material-icons prefix">class</i>
                        <span>Section :</span>
                        <span>Terminale S - Etablissement 1</span>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!--    Livres déposés-->
    <h5>Livre déposés</h5>
    <div class="row">
        <div class="col s12">
            <div class="card darken-1">
                <div class="card-content">
                    <!--                    TODO: Mettre la date-->
                </div>
            </div>
        </div>
    </div>

    <!--    Livres achetés-->
    <h5>Livres achetés</h5>
    <div class="row">
        <div class="col s12">
            <div class="card darken-1">
                <div class="card-content">
<!--                    TODO: Mettre la date-->
                </div>
            </div>
        </div>
    </div>


    <div class="fixed-action-btn">
        <a href="vues/famille/update.php" class="btn-floating btn-large">
            <i class="large material-icons">edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="material-icons">delete</i></a></li>
        </ul>
    </div>
</main>

<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>
</body>
</html>