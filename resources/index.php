<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

<div class="cart-main-area pt-95 pb-100 index-page">
    <div class="container">
        <h3 class="page-title">Тестовое задание WP Studio</h3>
        <div class="row">

            <p>
            Дано:<br>
                - <a href="product-details.php">Страница товара</a> с кнопкой "Добавить в корзину";<br>
                - <a href="basket.php">Страница корзины</a> с кнопками изменения количества и удаления товара из корзины.
            </p>
            <p>
            Нужно:<br>
            - Реализовать структуру хранения данных товарной корзины на PHP;<br>
            - При нажатии на кнопку "Добавить в корзину" - добавлять товар в корзину и сохранять на выбор с помощью: Cookie, Session, file-storage;<br>
            - На странице корзины, при помощи jQuery, нужно отслеживать изменение поля количества товара в корзине - отправлять на сервер ajax-запросом;<br>
            - Структура файлов может любой, запуск веб-сервера на ваше усмотрение (nginx, apache, php -S);<br>
            - Логику доступа к структуре данных на бэкенде нужно реализовать на ООП;<br>
            - В ответ на ajax-запросы при изменении количества товара или удалении товара из корзины - возвращайте шаблон списка товаров корзины и заменяйте содержимое слоя;<br>
            - Данные о стоимости позиций в корзине должны отображать реальную картину - Цена товара * На количество. Расчет должен производится на бэкенде.
            </p>
        </div>
    </div>
</div>

</body>
</html>
