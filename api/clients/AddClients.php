<?php session_start();

require_once '../DB.php';

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

    function clearData($input){
        $cleaned = strip_tags($input);
        $cleaned = trim($cleaned);
        $cleaned = preg_replace('/\s+/',' ',$cleaned);
        return $cleaned;
    };

    foreach($formData as $key => $value){
        $formData[$key] = clearData($value);
    }

   // echo json_encode($formData);

    /////////////проверка клиента///////////////

    $phone = $formData['phone'];

    $clientsID = $DB-> query(
        "SELECT id FROM clients WHERE phone = '$phone'"
    )->fetchAll();

    //echo json_encode($clientsID);

    if(empty($clientsID)){
        $request = $DB-> query(
            "INSERT INTO `clients`(`name`, `email`, `phone`, `birthday`) 
             VALUES (?,?,?,?)"
        )->execute([
            $formData['name'],
            $formData['email'],
            $formData['phone'],
            $formData['birthday']
        ]);

        header('Location: ../../clients.php');

        exit;
    } else {

        echo 'Такой юзер есть';

    }

  

} else {
    echo json_encode([
        "error" => 'Неверный запрос'
    ]);
}

?>
