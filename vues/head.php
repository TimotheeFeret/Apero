<?php // session_start(); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
    $domain = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['CONTEXT_PREFIX'];
?>

<base href=<?php echo $domain.'/'?> >

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
    echo '<link rel="stylesheet" href="'.$domain.'/assets/css/style.css'.'"/>';

    echo '<script src="'.$domain.'/lib/js/jquery-3.1.1.min.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/lib/js/materialize.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/lib/js/fr_FR.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/lib/js/formatter.min.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/lib/js/jquery.formatter.min.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/lib/js/jquery.validate/jquery.validate.min.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/lib/js/jquery.validate/localization/messages_fr.min.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/assets/js/js_general.js'.'" type="text/javascript"></script>';
    echo '<script src="'.$domain.'/assets/js/jquery.validator.custom.js'.'" type="text/javascript"></script>';

//DataTable
echo '<link rel="stylesheet" href="' . $domain . '/lib/css/dataTable/material.min.css' . '"/>';
echo '<link rel="stylesheet" href="' . $domain . '/lib/css/dataTable/dataTables.material.min.css' . '"/>';
echo '<script src="' . $domain . '/lib/js/dataTable/jquery.dataTables.min.js' . '" type="text/javascript"></script>';
echo '<script src="' . $domain . '/lib/js/dataTable/dataTables.material.min.js' . '" type="text/javascript"></script>';

echo '<link rel="stylesheet" href="' . $domain . '/lib/css/materialize.css' . '"/>';
?>
