<?php

function ProductSearch($params, $DB){

    $search = isset($params['search']) ?  $params['search'] : '';
    $sort = isset($params['sort']) ? $params['sort'] : '';
    $search_name = isset($params['search_name']) ? $params['search_name'] : 'name';

    $search = trim (strtolower($search));

    if($sort){
        $sort = "ORDER BY $search_name  $sort";
    }

    $search = trim(strtolower($search));

    $products = $DB->query(
        "SELECT * FROM products WHERE LOWER(name) LIKE '%$search%' $sort
    ")->fetchAll();
        

    return $products;

}


?>