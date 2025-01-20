<?php

session_start();

require_once 'modules/AuthCheck.php';

AuthCheck('', 'login.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM | Клиенты</title>
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pages/setting.css">
    <link rel="stylesheet" href="styles/pages/clients.css">
    <link rel="stylesheet" href="styles/modules/font-awesome-4.7.0/micromodal.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header_navigation">
                <p class="header_admin">Фамилия Имя Отчество</p>
                <ul class="header_links">
                    <li>
                        <a href="#">Клиенты</a>
                        <a href="#">Товары</a>
                        <a href="#">Заказы</a>
                    </li>
                </ul>
                <a class="header_logout" href="#">Выйти</a>
            </div>
        </div>
    </header>
    <main>
        <section class="filters">
            <div class="container">
                <form action="" class="form_filters">
                    <label for="search">Поиск по имени</label>
                    <input type="text" id="search" placeholder="Александр">
                    <select name="sort" id="sort">
                        <option value="0">По возрастанию</option>
                        <option value="1">По убыванию</option>
                    </select>
                </form>
            </div>
        </section>
        
    </main>
    <section class="clients">
        <div class="container">
            <div class="info">
                <h2 class="clients_title">Список клиентов</h2>
            </div>
            <table >
                <thead>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Почта</th>
                    <th>Телефон</th>
                    <th>Дата рождения</th>
                    <th>Дата создания</th>
                    <th>История заказов</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </thead>
                <tbody>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td onclick="MicroModal.show('history-modal')"><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td onclick="MicroModal.show('edit-modal')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td onclick="MicroModal.show('delete-modal')"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Иванов Иван Иванович</td>
                        <td>ivan@example.com</td>
                        <td>+79998887766</td>
                        <td>10.01.1999</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Петров Петр Петрович</td>
                        <td>petr@example.com</td>
                        <td>+79997778866</td>
                        <td>10.01.1990</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Максимов Максим Максимович</td>
                        <td>maks@example.com</td>
                        <td>+79606786236</td>
                        <td>10.01.2002</td>
                        <td>15.01.2025</td>
                        <td><i class="fa fa-history" aria-hidden="true"></i></td>
                        <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </td>
                        <td><i class="fa fa-trash-o" aria-hidden="true"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button onclick="MicroModal.show('add-modal')" class="clients_add" >
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </button>
        </div>
    </section>

    <div class="modal micromodal-slide" id="add-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Добавить клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <div class="form-group">
                            <label for="full-name">ФИО:</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Почта:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="birthday">День рождения:</label>
                            <input type="date" id="birthday" name="birthday" required>
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

    <div class="modal micromodal-slide" id="delete-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Удалить клиента?
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

    <div class="modal micromodal-slide" id="edit-modal" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Редактировать клиента
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <form id="registration-form">
                        <div class="form-group">
                            <label for="full-name">ФИО:</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Почта:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
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
                            <p class="order_total">Общая сумма: 300.00</p>
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
    
    
    
          

    <script  defer src ="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

    <script defer src="scripts/initClientsModal.js"></script>

</body>
</html>