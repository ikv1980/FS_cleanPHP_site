<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$data['title']?></title>
    <meta name="description" content="<?=$data['title']?>">

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1><?=$data['title']?></h1>
        <div class="products">
            <?php for($i = 0; $i < count($data['products']); $i++): ?>
                <div class="product">
                    <div class="image">
                        <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    </div>
                    <h3><?=$data['products'][$i]['title']?></h3>
                    <p><?=$data['products'][$i]['anons']?></p>
                    <a href="/product/<?=$data['products'][$i]['id']?>"><button class="btn">Детальнее</button></a>
                </div>
            <?php endfor; ?>
        </div>
        <!-- БЛОК ПАГИНАЦИИ -->
        <?php if(isset($data['page'])):?>
            <div class="pagination">
            <ul>
                <!-- Вывод первой страницы (выводится всегда) -->
                <a href="http://localhost/categories/1">
                    <li class="<?php if($data['page'] == 1){ echo 'active';}?>">1</li>
                </a>
                <!-- Вывод стрелки назад -->
                <a href="http://localhost/categories/<?=$data['page'] - 1?>">
                    <li class="<?php if($data['page'] <= 1){ echo 'disabled'; } ?>"><i class="fas fa-backward"></i></li>
                </a>
                <!-- Вывод текущей страницы -->
                <a href="http://localhost/categories/<?= $data['page']?>">
                    <li class="<?php if($data['page'] == 1 || $data['page'] == $data['total_page']){ echo 'disabled'; } else {echo 'active';}?>"><?=$data['page']?></li>
                </a>
                <!-- Вывод стрелки вперед -->
                <a href="http://localhost/categories/<?=$data['page'] + 1?>">
                    <li class="<?php if($data['page'] >= $data['total_page']){ echo 'disabled'; } ?>"><i class="fas fa-forward"></i></li>
                </a>
                <!-- Вывод последней страницы (выводится всегда) -->
                <a href="http://localhost/categories/<?=$data['total_page']?>">
                <li class="<?php if($data['page'] == $data['total_page']){ echo 'active';}?>"><?=$data['total_page']?></li>
                </a>
            </ul> 
        </div>
        <?php endif;?>
        
    </div>
    <?php require 'public/blocks/footer.php' ?>
</body>
</html>