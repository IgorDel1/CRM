<?php



if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = $_GET['id'];

    require_once '../../api/DB.php';

    echo $id;
    
    $stmt = $DB->prepare("DELETE FROM `clients` WHERE `id` = ?");
    $stmt->execute([$id]);

    header('Location:../../clients.php');


} else{
    header('Location:../../clients.php');
}