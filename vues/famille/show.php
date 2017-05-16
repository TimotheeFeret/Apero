<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'modeles/famille.php';

if (empty($_GET['id'])) {
    die('Identifiant introuvable');
}

$famille = new Famille($_GET['id']);
$famille->setNomTable('v_famille');
$enfants = $famille->getEnfants();
$exemplaireDeposes = $famille->getExemplairesDeposes();
$exemplaireAchetes = $famille->getExemplairesAchetes();
$famille = $famille->get($_GET['id']);
if (empty($famille[0])) {
    die('Famille inexistante');
} else {
    $famille = $famille[0];
}
$colorAdhesion = strpos(strtolower($famille['adhesion_libelle']), 'non') > -1 ? 'red' : 'green';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Famille : <?php echo $famille['nom'] ?></title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>



<main class="container">
    <h1 class="center"><?php echo $famille['nom']; ?></h1>
    <span class="new badge <?php echo $colorAdhesion ?>"
          data-badge-caption=<?php echo '"' . $famille['adhesion_libelle'] . '"' ?>></span>

    <!--    <div class="row">-->
    <!--        <a class="waves-effect waves-light btn right"><i class="material-icons left">print</i>Imprimer la facture</a>-->
    <!--    </div>-->

    <!--    Information de la famille-->
    <h5>Informations générales</h5>
    <div class="row">
        <div class="col s12">
            <div class="card darken-1">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <i class="material-icons prefix">phone</i>
                            <span class="underline">Téléphone :</span>
                            <span class="bold"><?php echo $famille['telephone'] ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <i class="material-icons prefix">place</i>
                            <span class="underline">Adresse :</span>
                            <span class="bold"><?php echo $famille['adresse'] ?></span>
                        </div>

                        <div class="col s6">
                            <i class="material-icons prefix white">place</i>
                            <span class="bold"><?php echo $famille['code_postal'] . ' ' . $famille['ville'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    Enfants-->
    <h5>Enfants</h5>
    <div class="row">

        <?php
        $hidden = '';
        if (empty($enfants)) {
            $hidden = 'hidden';
            echo '
            <div class="row center-align text-grey"">
                <div class="col s12">
                    <h1>Aucun enfant</h1>
                </div>
            </div>
            ';
        }
        ?>

        <div class="card" <?php echo $hidden ?>>
            <div class="card-tabs ">
                <ul class="tabs tabs-fixed-width white-text">
                    <?php
                    foreach ($enfants as $key => $enfant) {
                        echo '<li class="tab"><a href="#' . $key . '">' . $enfant['prenom'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="card-content grey lighten-5">
                <!-- Construit le détails de chaque enfants de la famille-->
                <?php
                foreach ($enfants as $key => $enfant) {
                    $ageEnfant = (new DateTime($enfant['date_naissance']))->diff(new DateTime('today'))->y;
                    echo '
                    <div id="' . $key . '">
                        <div class="row">
                            <div class="col s12">
                                <i class="material-icons prefix">date_range</i>
                                <span class="underline">Date de naissance :</span>
                                <span class="bold">' . $enfant['date_naissance_format'] . ' (' . $ageEnfant . ' ans)' . '</span>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col s12">
                                <i class="material-icons prefix">class</i>
                                <span class="underline">Classe :</span>
                                <span class="bold">' . $enfant['section_nom'] . ' (' . $enfant['etablissement_nom'] . ')</span>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>

    <!--    Livres déposés-->
    <h5>Livre déposés</h5>
    <div class="row">

        <?php
        $hidden = '';
        if (empty($exemplaireDeposes)) {
            $hidden = 'hidden';
            echo '
            <div class="row center-align text-grey"">
                <div class="col s12">
                    <h1>Aucun livre déposé</h1>
                </div>
            </div>
            ';
        }
        ?>

        <div class="col s12">
            <div class="card darken-1">
                <div class="card-content">
                    <?php
                    foreach ($exemplaireDeposes as $exemplaireDepose) {
                        echo '
                        <div class="row">
                            <div class="col s3">
                                <i class="material-icons prefix tooltipped" data-tooltip="Livre">book</i>
                                <span>' . $exemplaireDepose['nom_livre'] . '</span>
                            </div>
    
                            <div class="col s2">
                                <i class="material-icons prefix tooltipped" data-tooltip="État">grade</i>
                                <span>' . $exemplaireDepose['etat'] . '</span>
                            </div>
    
                            <div class="col s2">
                                <i class="material-icons prefix tooltipped" data-tooltip="Prix">euro_symbol</i>
                                <span>' . $exemplaireDepose['prix'] . ' €</span>
                            </div>
    
                           <div class="col s2">
                               <i class="material-icons prefix tooltipped" data-tooltip="Date d\'achat">date_range</i>
                               <span>' . $exemplaireDepose['date_depot_format'] . '</span>
                           </div>';

                        if (!empty($exemplaireDepose['date_achat'])) {
                            echo '
                            <div class="col s3">
                                <span class="new badge" data-badge-caption="Acheté par ' . $exemplaireDepose['famille_acheteuse_nom'] . ' le ' . $exemplaireDepose['date_achat_format'] . '"></span>
                            </div>
                            ';
                        }

                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--    Livres achetés-->
    <h5>Livres achetés</h5>
    <div class="row">

        <?php
        $hidden = '';
        if (empty($exemplaireAchetes)) {
            $hidden = 'hidden';
            echo '
            <div class="row center-align text-grey"">
                <div class="col s12">
                    <h1>Aucun livre acheté</h1>
                </div>
            </div>
            ';
        }
        ?>

        <div class="col s12" <?php echo $hidden ?>>
            <div class="card darken-1">
                <div class="card-content">
                    <?php
                    foreach ($exemplaireAchetes as $exemplaireAchete) {
                        echo '
                        <div class="row">
                            <div class="col s3">
                                <i class="material-icons prefix tooltipped" data-tooltip="Livre">book</i>
                                <span>' . $exemplaireAchete['nom_livre'] . '</span>
                            </div>
    
                            <div class="col s3">
                                <i class="material-icons prefix tooltipped" data-tooltip="État">grade</i>
                                <span>' . $exemplaireAchete['etat'] . '</span>
                            </div>
    
                            <div class="col s3">
                                <i class="material-icons prefix tooltipped" data-tooltip="Prix">euro_symbol</i>
                                <span>' . $exemplaireAchete['prix'] . ' €</span>
                            </div>
    
                           <div class="col s3">
                               <i class="material-icons prefix tooltipped" data-tooltip="Date d\'achat">date_range</i>
                               <span>' . $exemplaireAchete['date_achat_format'] . '</span>
                           </div>
                        </div>
                    ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="fixed-action-btn">
        <a href="vues/famille/update.php?id=<?php echo $_GET['id'] ?>" class="btn-floating btn-large">
            <i class="large material-icons">edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="Supprimer la famille"
                   id="BtDeleteFamille"><i
                        class="material-icons">delete</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-tooltip="Imprimer la facture" id="BtImprimerFacture"><i
                        class="material-icons">print</i></a></li>
        </ul>
    </div>
</main>

<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/footer.php'; ?>

<script>
    var id = <?php echo json_encode($famille['id']); ?>;
</script>

<script type="application/javascript" src="assets/js/famille/show.js"></script>
</body>
</html>