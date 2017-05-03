<?php

/**
 * Created by PhpStorm.
 * User: jerem
 * Date: 03/05/2017
 * Time: 18:05
 */
class Table
{
    public static function render($columns, $data) {
        echo 
        '<table>
            <thead>
                <tr>'.self::constructHeader($columns).'</tr>
            </thead>

            <tbody>
                '.self::constructBody($columns, $data).'
            </tbody>
        </table>';
    }
    
    private static function constructHeader($columns) {
        return '<th>'.join('</th><th>', $columns).'</th>';
    }
    
    private static function constructBody($columns, $data) {
        $body = '';
        
        // Parcours les données
        foreach ($data as $info) {
            
            // Création de la ligne
            $body .= '<tr>';
            
            // Parcours les informations
            foreach ($columns as $key => $column) {
                if(!empty($info[$key])) {
                    // Création de la donnée
                    $body .= '<td>'.$info[$key].'</td>';
                }
            }
            
            $body .= '</tr>';
        }
        
        return $body;
    }
}