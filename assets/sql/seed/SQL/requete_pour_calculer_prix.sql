update exemplaire_occasion set prix = (select prix from livre where id = livre_id)*(1-(select decote from etat where id = etat_id)/100);

update exemplaire_occasion set date_achat = DATE_ADD(date_depot,INTERVAL 21 DAY) where famille_acheteuse_id is not null