<?php session_start();

require_once '../DB.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $formData = $_POST;
    $fields = ['name', 'descc', 'price', 'stock'];
    $errors = [];

    $_SESSION['product-errors'] = '';

    foreach($fields as $key => $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $errors[$field][] = 'Field is required';
        }
    }

    if(!empty($errors)){
        $_SESSION['product-errors'] = json_encode($errors);
        header('Location: ../../products.php');
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

    $name = $formData['name'];

    $existingProduct = $DB-> query(
        "SELECT id FROM products WHERE name = '$name'"
    )->fetchAll();

    //echo json_encode($clientsID);

    if(!empty($existingProduct)){
        $_SESSION['product-errors'] = '<h4>Такой товар уже есть в БД</h4>';

        header('Location: ../../products.php');
        exit();
    }

    $sql = "INSERT INTO products (name, descc, price, stock)
            VALUES (:name, :descc, :price, :stock)";

    $stmt = $DB -> prepare($sql);
    $stmt->execute([
        ':name' => $formData['name'],
        ':descc' => $formData['descc'],
        ':price' => $formData['price'],
        ':stock' => $formData['stock']
    ]);   
    
    header('Location: ../../products.php');
    exit();

} else {
    echo json_encode([
        "error" => 'Неверный запрос'
    ]);
}

?>