<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина товаров</title>
    <meta name="description" content="Корзина товаров">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/products.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Корзина товаров</h1>
        <?php if(count($data['products']) == 0): ?>
            <p><?=$data['empty']?></p>
        <?php else: ?>
            <!-- Кнопка удалить все!!! -->
            <form method="post" class="form-control">
                <input type='hidden' name='allitems' value='allitems' />
                <button type="submit" class="btn" name="dellall">Удалить все!!! <i class="fas fa-trash"></i></button>
            </form>
            <div class="products">
                <?php
                    $sum = 0;
                    for($i = 0; $i < count($data['products']); $i++):
                        $sum += $data['products'][$i]['price'];
                ?>
                <div class="row">
                    <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    <h4><?=$data['products'][$i]['title']?></h4>
                    <span><?=$data['products'][$i]['price']?> рублей</span>
                    <!-- Кнопка удаления товара -->
                    <form method="post" class="form-control">
                        <input type='hidden' name='id' value='<?=$data['products'][$i]['id']?>' />
                        <button type="submit" class="btn" name="delete">Удалить  <i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <?php endfor; ?>

                <?php require 'pay.php' ?>
            </div>
        <?php endif;?>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>