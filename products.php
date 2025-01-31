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
                        <a href="orders.php">Заказы</a>
                    </li>
                </ul>
                <a class="header_logout" href="?do=logout" >Выйти</a>
            </div>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="" class="form_filters">
                    <label for="search">Поиск по названию</label>
                    <input type="text" id="search" name ="search" placeholder="Ноутбук">
                    <select name="sort" id="sort">
                        <option value="">По умолчанию</option>
                        <option value="ASC">По возрастанию</option>
                        <option value="DESC">По убыванию</option>
                    </select>
                    <select name="search_name" id="sort">
                        <option value="name">Название</option>
                        <option value="price">Цена</option>
                        <option value="stock">Количество</option>
                    </select>
                    <button type = "submit">Поиск</button>
                    <a href="products.php">Сбросить</a>
                </form>
            </div>
        </section>
        
    </main>
    <section class="clients">
        <div class="container">
            <div class="info">
                <h2 class="clients_title">Список товаров</h2>
            </div>
            <table >
                <thead>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                    <th>Создать QR</th>
                </thead>
                <tbody>
                    <?php
                     require_once 'api/DB.php';
                     require_once ('api/product/ProductSearch.php');
                     require_once ('api/product/OutputProducts.php');

                     $products = ProductSearch($_GET, $DB);

                     OutputProducts($products);
                    ?>
                    <!-- <tr>
                        <td>1</td>
                        <td>Кроссовки</td>
                        <td>Кроссовки Nike</td>
                        <td>20000</td>
                        <td>100</td>
                        <td onclick="MicroModal.show('edit-modal')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <td onclick="MicroModal.show('delete-modal')"><i class="fa fa-trash-o" aria-hidden="true"></i></td>
                        <td onclick="MicroModal.show('history-modal')"><i class="fa fa-qrcode" aria-hidden="true"></i>
                        </td>
                    </tr> -->
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
                        Редактировать товар
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <div class="form-group">
                            <label for="full-name">Название</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Описание</label>
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


    <div class="modal micromodal-slide" id="add-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Добавить товар
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form" action = "api/product/AddProduct.php" method = "POST">
                        <div class="form-group">
                            <label for="full-name">Название</label>
                            <input type="text" id="full-name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Описание</label>
                            <input type="text" id="email" name="descc">
                        </div>
                        <div class="form-group">
                            <label for="phone">Цена</label>
                            <input type="tel" id="phone" name="price">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Количество</label>
                            <input type="text" id="cont" name="stock">
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

    <div class="modal micromodal-slide  <?php

            if (isset($_SESSION['product-errors']) &&
            !empty($_SESSION['product-errors'])){
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
                if (isset($_SESSION['product-errors']) && !empty($_SESSION['product-errors'])){
                    echo $_SESSION['product-errors'];

                    $_SESSION['product-errors'] = '';
                }
                ?>

                </main>
            </div>
        </div>
    </div>
    
    
    
          

    <script  defer src ="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

    <script defer src="scripts/initClientsModal.js"></script>

</body>
</html>
</body>
</html>