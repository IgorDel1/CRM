<?php


function AuthCheck($successPath = '', $errorPath  = '') {

    require_once 'api/DB.php';
    require_once 'LogoutUser.php';

    //$_SESSION['token'] = '';
   

    if (!isset($_SESSION['token'])) {

        if($errorPath){
            header("Location: $errorPath");
        }

        return;
    }
 
    $token = $_SESSION['token'];

    $adminID = $DB-> query(
        "SELECT id FROM users WHERE token = '$token'"
    )->fetchAll();

    if (empty($adminID) && $errorPath) {
        LogotUser($errorPath, $DB);

        header ("Location: $errorPath");
    }

    if(!empty($adminID) && $successPath){
    header ("Location: $successPath");
    }

    
     
}

?>
