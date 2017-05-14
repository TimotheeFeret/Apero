<?php

/**
 * Created by PhpStorm.
 * User: jerem
 * Date: 07/05/2017
 * Time: 13:36
 */
class Utility
{
    /**
     * Regroupe les éléments ayant la même key/value dans un tableau
     * @param  array $array 	Tableau
     * @param  string $key   	Key sur laquelle sera fait la comparaison
     * @return array        	Tableau groupé
     */
    public static function arrayGroupBySameValue($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }

    public static function extractDataWithKey($array, $key)
    {
        $return = [];

        foreach ($array as $item) {
            if (empty($item[$key])) continue;
            $return[] = $item[$key];
        }

        return $return;
    }
}