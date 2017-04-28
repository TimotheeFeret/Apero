<?php
/**
 * Project : Apero
 * File name : test.php
 * Created by: Jérémy PÉPIN
 * Date: 28/04/2017 - 09:28
 */

// Récupère les données de la requete ajax
parse_str($_POST['data']['famille'], $data);
var_dump($data);
var_dump(json_decode($_POST['data']['enfants'], true));