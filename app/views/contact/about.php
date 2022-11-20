<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про нас</title>
    <meta name="description" content="Про нас" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link type="Image/x-icon" href="/favicon.ico" rel="icon">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Про компанию</h1>
        <p>Здесь просто информация про нас.</p>
        <img src="/public/img/mountain.jpg" alt="Горы">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda blanditiis culpa, cumque impedit,
            itaque laborum natus nemo nihil pariatur placeat porro praesentium, quam repellendus sit totam veniam.
            Veritatis, voluptate.</p>
        <!-- Вывод дополнительных параметров-->
        <?php require_once 'parameters.php'; ?>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>