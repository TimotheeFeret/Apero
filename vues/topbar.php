<header>
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="index.php" class="brand-logo">APERO</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="vues/famille/list.php">Familles</a></li>
                    <li><a href="vues/etablissement/list.php">Établissements</a></li>
                    <li><a href="vues/livre/list.php">Livres</a></li>
                    <li><a href="vues/stock/list.php">Stock</a></li>
                    <li><a href="vues/historique/list.php">Historique</a></li>
                    <li><a href="vues/depot/add.php">Dépôt</a></li>
                    <li><a href="vues/achat/add.php">Achat</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script type="text/javascript">
    var url = window.location.href;

    // Permet d'ajouter la classe 'active' sur l'onglet actuel
    $.each($('nav').find('ul li'), function(index, val) {
        var href = $(val).find('a').prop('href');
        if( url == href ) {
            $(val).addClass('active');
            return;
        }
    });
</script>
