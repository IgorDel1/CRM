<?php session_start();

require_once '../DB.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $formData = $_POST;
    $fields = ['clients', 'products'];
    $errors = [];

    $_SESSION['orders-errors'] = '';

    foreach($fields as $key => $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $errors[$field][] = 'Field is required';
        }
    }

    if(!empty($errors)){
        $_SESSION['orders-errors'] = json_encode($errors);
        header('Location: ../../orders.php');
        exit;
    }


} else {
    echo json_encode([
        "error" => 'Неверный запрос'
    ]);
}

?>