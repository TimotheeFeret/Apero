<?php

/**
 * Created by PhpStorm.
 * User: jerem
 * Date: 03/05/2017
 * Time: 17:26
 */
class BaseComponent
{
    /**
     * @param $strTitle
     * @param $strBtAdd
     * @param $idContent
     * @param $idBtAdd
     * @return string
     */
    public static function listEdit($strTitle, $strBtAdd, $idSuffix) {
        echo
            '<h5>' . $strTitle . ' <span class="new badge lg-badge" data-badge-caption="Appuyez sur la touche \'+\' ou \'-\' de votre clavier pour gérer la liste"></span></h5>
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div id="Content'.$idSuffix.'" class="card-content">
                                                    
                        </div>
    
                        <div class="card-action">
                            <a id="BtAdd'.$idSuffix.'" href="#">'.$strBtAdd.'</a>
                        </div>
                    </div>
                </div>
            </div>';
    }
}