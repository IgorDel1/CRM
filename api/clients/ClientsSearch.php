<?php

function ClientsSearch($params, $DB){

    $search_name = isset($params['search_name']) ?  $params['search_name'] : 'name';

    $search = isset($params['search']) ?  $params['search'] : '';
    $sort = isset($params['sort']) ? $params['sort'] : '';

    $search = trim (strtolower($search));

    if($sort){
        $sort = "ORDER BY $search_name $sort";
    }

    $search = trim(strtolower($search));

    $clients = $DB->query(
        "SELECT * FROM clients WHERE LOWER($search_name) LIKE '%$search%' $sort
    ")->fetchAll();
        

    return $clients;

}


?>