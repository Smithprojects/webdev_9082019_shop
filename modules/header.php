<?php 
    include ('config/db.php');
    include ('modules/functions.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $headerConfig['title']?></title>
   
    <?php foreach($headerConfig['styles'] as $stylePath): ?>
        <link rel="stylesheet" href="/styles/<?=$stylePath?>">
    <?php endforeach;?>
    
</head>
<body>
    <div class="wrapper">
        <header class="header flex">
            <div class="header-left flex">
                <div class="logo"><a href="/"></a></div>
                <nav class="menu menu_margin">
                    <a href="/catalog.php?id=1" class="menu__link link-base">Мужчинам</a>
                    <a href="/catalog.php?id=2" class="menu__link link-base">Женщинам</a>
                    <a href="/catalog.php?id=3" class="menu__link link-base menu__link_color-orange">Детям</a>
                    <a href="/catalog.php?id=4" class="menu__link link-base">Новинки</a>
                    <a href="/catalog.php?id=4" class="menu__link link-base">О нас</a>
                </nav>
            </div>
            <div class="header-right flex">
                <div class="icon-block flex icon-block_margin">
                    <div class="icon-block__icon icon-block__icon_human"></div>
                    <a href="#" class="icon-block__text link-base">Войти</a>
                </div>
                <div class="icon-block flex icon-block_margin">
                    <div class="icon-block__icon icon-block__icon_basket"></div>
                    <a href="/basket.php" class="icon-block__text link-base">Корзина
                    (<span class="user-basket__basket__count"></span>)</a>
                </div>
            </div>
        </header>
        <!-- <header>

            <nav>
                <a href="/catalog.php?id=1">Мужчинам</a>
                <a href="/catalog.php?id=2">Женщинам</a>
                <a href="/catalog.php?id=3">Детям</a>
            </nav>
            <div class="user-basket">
                <a href="/basket.php" class="user-basket__basket">Корзина
                    (<span class="user-basket__basket__count"></span>)
                </a>

            </div>

        </header> -->