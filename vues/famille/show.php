<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nom famille</title>
    <?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/head.php'; ?>
</head>

<body>
<?php include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/vues/topbar.php'; ?>

<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . 'modeles/famille.php';

$famille = new Famille($_GET['id']);
$famille->setNomTable('v_famille');
$enfants = $famille->getEnfants();
$exemplaireDeposes = $famille->getExemplairesDeposes();
$exemplaireAchetes = $famille->getExemplairesAchetes();
$famille = $famille->get($_GET['id'])[0];
$colorAdhesion = strpos(strtolower($famille['adhesion_libelle']), 'non') > -1 ? 'red' : 'green';
?>

<main class="container">
    <h1 class="center"><?php echo $famille['nom']; ?></h1>
    <span class="new badge <?php echo $colorAdhesion ?>"
          data-badge-caption=<?php echo '"' . $famille['adhesion_libelle'] . '"' ?>></span>

<!--    Information de la famille-->
    <h5>Information générales</h5>
    <div class="row">
        <div class="col s12">
            <div class="card darken-1">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <i class="material-icons prefix">phone</i>
                            <span>Téléphone :</span>
                            <span><?php echo $famille['telephone'] ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <i class="material-icons prefix">place</i>
                            <span>Adresse :</span>
                            <span><?php echo $famille['adresse'] . ', ' . $famille['code_postal'] . ' ' . $famille['ville'] ?></span>
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
                                <span>Date de naissance :</span>
                                <span>' . $enfant['date_naissance_format'] . ' (' . $ageEnfant . ' ans)' . '</span>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col s12">
                                <i class="material-icons prefix">class</i>
                                <span>Classe :</span>
                                <span>' . $enfant['section_nom'] . ' (' . $enfant['etablissement_nom'] . ')</span>
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
                                <span class="new badge" data-badge-caption="Acheté par la famille ' . $exemplaireDepose['famille_acheteuse_nom'] . ' le ' . $exemplaireDepose['date_achat_format'] . '"></span>
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