<?php session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $formData = $_POST;
    $fields = ['full-name', 'email', 'phone', 'birthday'];
    $errors = [];

    $_SESSION['clients-errors'] = '';

    foreach($fields as $key => $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $errors[$field][] = 'Field is required';
        }
    }

    if(!empty($errors)){
        $_SESSION['clients-errors'] = json_encode($errors);
        header('Location: ../../clients.php');
        exit;
    }

} else {
    echo json_encode([
        "error" => 'Неверный запрос'
    ]);
}

?>
