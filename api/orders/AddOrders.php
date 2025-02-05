<?php session_start();

require_once '../DB.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $formData = $_POST;
    $fields = ['client', 'products'];
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

    require_once '../DB.php';

    $productIDs = $formData['products'];

    $allProducts = $DB->query("SELECT * FROM products")->fetchAll();

    $total = 0;



    foreach ($allProducts as $key => $product) {
        if (in_array($product['id'], $productIDs)){
            $total = $total + $product['price'];
        }
    }

    $orders = [
        'id' => time(),
        'client_id' => $formData['client'],
        'total' => $total,
    ];

    $stmt = $DB->prepare(
        "INSERT INTO orders(id, client_id, total) values(?, ?, ?)"
    );

    $stmt->execute([
        $orders['id'],  
        $orders['client_id'],
        $orders['total'],
    ]);

    foreach($formData['products'] as $key => $product){
        $stmt = $DB->prepare(
            "INSERT INTO order_items(order_id, product_id, quantity, price) values (?, ?, ?, ?)"
        );

        $stmt->execute([
            $orders['id'],
            $product,
            1,
            100
        ]);

    }

    header('Location: ../../orders.php');



} else {
    echo json_encode([
        "error" => 'Неверный запрос'
    ]);
}

?>