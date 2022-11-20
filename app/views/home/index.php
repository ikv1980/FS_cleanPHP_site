<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница интернет-магазина" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link type="Image/x-icon" href="/favicon.ico" rel="icon">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Популярные товары</h1>
        <div class="products">
            <?php for($i = 0; $i < 6; $i++): ?>
            <div class="product">
                <div class="image">
                    <img src="/public/img/watch.jpg" alt="Товар">
                </div>
                <h3>Крутой товар</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cumque ex necessitatibus
                    totam voluptatem. Accusantium explicabo fuga nobis provident quaerat.</p>
                <a href="/product/1"><button class="btn">Детальнее</button></a>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>