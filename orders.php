<?php

session_start();

if(isset($_GET['do']) && $_GET['do'] === 'logout'){
    require_once 'api/auth/LogoutUser.php';
    require_once 'api/DB.php';

    LogoutUser('login.php', $DB, $_SESSION['token']);
    exit;
}

require_once 'api/auth/AuthCheck.php';

AuthCheck('', 'login.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары | CRM</title>
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pages/setting.css">
    <link rel="stylesheet" href="styles/pages/products.css">
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/micromodal.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header_navigation">
                <p class="header_admin">

                <?php
                    require 'api/DB.php';
                    require_once 'api/clients/AdminName.php';

                    echo AdminName($_SESSION['token'], $DB);
                    ?>

                </p>
                <ul class="header_links">
                    <li>
                        <a href="clients.php">Клиенты</a>
                        <a href="products.php">Товары</a>
                        <a href="#">Заказы</a>
                    </li>
                </ul>
                <a class="header_logout" href="?do=logout">Выйти</a>
            </div>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="" class="form_filters">
                <label for="search">Поиск по названию</label>
                    <input type="text" id="search" name="search" placeholder="Ноутбук">
                    <select name="sort" id="sort">
                        <option value="">По умолчанию</option>
                        <option value="ASC">По возрастанию</option>
                        <option value="DESC">По убыванию</option>
                    </select>
                    <select name="search_name" id="search_name">
                        <option value="clients.name">По клинету</option>
                        <option value="orders.id">По ID</option>
                        <option value="orders.total">По цене</option>
                        <option value="orders.order_date">По дате</option>
                    </select>
                    <button type = "submit">Поиск</button>
                    <a href="orders.php">Сбросить</a>
                </form>
            </div>
        </section>
        
    </main>
    <section class="clients">
        <div class="container">
            <div class="info">
                <h2 class="clients_title">Список заказов</h2>
            </div>
            <table >
                <thead>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Дата заказа</th>
                    <th>Цена</th>
                    <th>Название</th>
                    <!-- <th>Количество</th>
                    <th>Общая цена</th> -->
                    <th>Редактировать</th>
                    <th>Удалить</th>
                    <th>Создать чек</th>
                    <th>Подробнее</th>
                </thead>
                <tbody>
                <?php
                     require_once 'api/DB.php';
                     require_once 'api/orders/OutputOrders.php';
                     require_once 'api/orders/OrdersSearch.php';

                     $orders = OrdersSearch($_GET, $DB);
                     
                    //  $orders = $DB->query("
                     
                    //     SELECT 
                    //         orders.id, 
                    //         clients.name, 
                    //         orders.order_date, 
                    //         orders.total,
                    //         GROUP_CONCAT(CONCAT(products.name, ' (',order_items.quantity, 'шт. : ', products.price, ')') SEPARATOR ', ') AS product_details
                    //     FROM
                    //         orders
                    //     JOIN
                    //         clients ON orders.client_id = clients.id
                    //     JOIN
                    //         order_items ON orders.id = order_items.order_id
                    //     JOIN 
                    //         products ON order_items.product_id = products.id
                    //     GROUP BY
                    //         orders.id, clients.name, orders.order_date, orders.total; 
                     
                    //  ")->fetchAll();

                     OutputOrders($orders);
                    ?>



                    <!-- <tr>
                        <td>1</td>
                        <td>Иванов Иван Иванович</td>
                        <td>24.01.2025</td>
                        <td>20000</td>
                        <td>Футболка</td>
                        <td>20 шт.</td>
                        <td>400000</td>
                        <td onclick="MicroModal.show('edit-modal')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <td onclick="MicroModal.show('delete-modal')"><i class="fa fa-trash-o" aria-hidden="true"></i></td>
                        <td onclick="MicroModal.show('history-modal')"><i class="fa fa-qrcode" aria-hidden="true"></i>
                        <td onclick="MicroModal.show('more detailed-modal')"><i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                        </i>
                        </td>
                    </td>
                    </tr>  -->
                </tbody>
            </table>
            <button onclick="MicroModal.show('add-modal')" class="clients_add" >
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </button>
        </div>
    </section>


                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="edit-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Редактировать заказ
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <div class="form-group">
                            <label for="full-name">ФИО</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Дата заказа</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Цена</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Количество</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Общая цена</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    
                        <div class="form-actions">
                            <button type="submit">Редактировать</button>
                            <button type="button" data-micromodal-close>Отменить</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="history-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Создать QR
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="delete-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Удалить заказ?
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">

                            <button type="submit">Удалить</button>
                            <button type="button" data-micromodal-close>Отменить</button>
                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="add-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Добавить заказ
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form" method="POST" action="api/orders/AddOrders.php">
                        <div class="form-group">
                            <label for="client">Клиент</label>
                            <select name="client" id="client" class = "main_select">
                            <option value = "new">Новый пользователь</option>
                            <?php
                            $users = $DB->query("SELECT id, name FROM clients")->fetchAll();
                            foreach($users as $key => $user){
                                $id = $user['id'];
                                $name = $user['name'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>

                            </select>
                            
                        </div>
                        <div id = "email-field" class ="modal_form-group">
                            <label for="email">Почта</label>
                            <input type="email" id="email" name = "email">
                        </div>
                        <div class="form-group">
                        <label for="products">Товары</label>
                        <select name="products[]" id="products" class = "main_select" multiple>
                        <?php
                            $users = $DB->query("SELECT id, name, price, stock FROM products WHERE stock > 0")->fetchAll();
                            foreach($users as $key => $product){
                                $id = $product['id'];
                                $name = $product['name'];
                                $price = $product['price'];
                                $stock = $product['stock'];
                                echo "<option value='$id'>$name : $price\$ : $stock шт.</option>";
                            }
                            ?>
                        </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit">Добавить</button>
                            <button type="button" data-micromodal-close>Отменить</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="more detailed-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        История заказов
                    </h2>
                    <small>Иванов Иван Иванович</small>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <div class="order">
                        <div class="order-info">
                            <h3 class="order_number">Заказ 1</h3>
                            <time class="order_date">Дата оформления: 2025-01-13 09:25:30</time>
                            <p class="order_total">Общая сумма: 100000</p>
                        </div>
                        <table class="order_items">
                            <tr>
                                <th>ID</th>
                                <th>Название товара</th>
                                <th>Количество</th>
                                <th>Цена</th>
                            </tr>
                            <tr>
                                <th>9a45</th>
                                <th>Футболка</th>
                                <th>10</th>
                                <th>10000</th>
                            </tr>
                        </table>
                    </div>
                </main>

                

            </div>
        </div>
    </div>
    
    <div class="modal micromodal-slide  <?php

if (isset($_SESSION['orders-errors']) &&
!empty($_SESSION['orders-errors'])){
    echo 'open';
}

?>"  id="error-modal" aria-hidden="true">

<div class="modal__overlay" tabindex="-1" data-micromodal-close>
<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
    <header class="modal__header">
        <h2 class="modal__title" id="modal-1-title">
            Ошибка
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
    </header>
    <main class="modal__content" id="modal-1-content">
        <?php
    if (isset($_SESSION['orders-errors']) && !empty($_SESSION['orders-errors'])){
        echo $_SESSION['orders-errors'];

        $_SESSION['orders-errors'] = '';
    }
    ?>

    </main>
</div>
</div>
</div>
    
          

    <script  defer src ="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

    <script defer src="scripts/initClientsModal.js"></script>

    <script defer src="scripts/orders.js"></script>

</body>
</html>
</body>
</html>