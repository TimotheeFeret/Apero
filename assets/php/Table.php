<?php

/**
 * Created by PhpStorm.
 * User: jerem
 * Date: 03/05/2017
 * Time: 18:05
 */
class Table
{
    /**
     * Créer un tableau
     * @param $columns Colonnes du tableau
     * @param $data
     * @param array $buttons Bouton de contrôles du tableau, les clés possibles sont : details, edit, delete
     */
    public static function render($columns, $data, $buttons = ['details', 'edit', 'delete'])
    {
        if (empty($data)) {
            echo
            '<div class="row center-align text-grey" style="margin-top: 100px;">
                    <div class="col s12">
                        <i class="material-icons md-80">highlight_off</i>
                    </div>
                    
                    <div class="col s12">
                        <h1>Aucune donnée</h1>
                    </div>
                </div>';
        } else {
            echo
                '<table class="mdl-data-table">
                    <thead>
                        <tr>' . self::constructHeader($columns, !empty($buttons)) . '</tr>
                    </thead>
        
                    <tbody>
                        ' . self::constructBody($columns, $data, $buttons) . '
                    </tbody>
                </table>';
        }
    }

    private static function constructHeader($columns, $withButtons = true)
    {
        return '<th>' . join('</th><th>', $columns) . '</th>' . ($withButtons ? '<th class="no-order"></th>' : '');
    }

    private static function constructBody($columns, $data, $buttons)
    {
        $body = '';
        $buttons = self::constructButtons($buttons);

        // Parcours les données
        foreach ($data as $info) {
            // Création de la ligne
            $body .= '<tr data-id="' . $info['id'] . '">';

            // Parcours les informations
            foreach ($columns as $key => $column) {
                $body .= '<td>';
                if(!empty($info[$key])) {
                    // Création de la donnée
                    $body .= $info[$key];
                }
                $body .= '</td>';
            }

            if (!empty($buttons)) {
                $body .= '<td>' . $buttons . '</td>'; // Ajoute les boutons de controles
            }

            $body .= '</tr>';
        }
        return $body;
    }

    private static function constructButtons($buttons)
    {
        $strButtons = '';

        if (empty($buttons)) {
            return $strButtons;
        }

        if (in_array('details', $buttons)) {
            $strButtons .= '<a class="waves-effect waves-light btn blue tooltipped details" data-tooltip="Voir les détails"><i class="material-icons">visibility</i></a>' . "\n";
        }

        if (in_array('edit', $buttons)) {
            $strButtons .= '<a class="waves-effect waves-light btn yellow darken-3 tooltipped edit" data-tooltip="Modifier l\'élément"><i class="material-icons">edit</i></a>' . "\n";
        }

        if (in_array('delete', $buttons)) {
            $strButtons .= '<a class="waves-effect waves-light btn red tooltipped delete" data-tooltip="Supprimer l\'élément"><i class="material-icons">delete</i></a>' . "\n";
        }

        return $strButtons;
    }
}