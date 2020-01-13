<?php 
    $headerConfig = [
        'title'=>'Карточка товара',
        'styles'=>['style.css', 'product.css']
    ];
    include('modules/header.php');

    $template = [];

    if ( !empty( $_GET['id'] ) ){
        
        $sql_product = "SELECT * FROM products WHERE id = {$_GET['id']}";
        
        $result_product = mysqli_query($db, $sql_product);
        
        $data_product = mysqli_fetch_assoc($result_product);
        $template = $data_product;
            
        //d($template);
  

    } else {
        header('Location: /catalog.php?id=1');
    }
?>

<section class="product">
    <div class="product__img">
        <img src="<?=$template['pic']?>" alt="<?=$template['name']?>">
    </div>
    <div class="product__info">
        <h1 class="product__name"><?=$template['name']?></h1>
        <div class="product__sku">Артикул: <?=$template['sku']?></div>
        <div class="product__price"><?=$template['price']?> руб.</div>
        <div class="product__description"><?=$template['text']?></div>
        <div class="product__size size">
            <div class="size__name">Размер</div>
            <div class="size__number">
                <div class="number">39</div>
                <div class="number">40</div>
                <div class="number">41</div>
                <div class="number">42</div>
                <div class="number">43</div>
            </div>
        </div>
        
    </div>
    <button class="product__btn" data-id=<?=$template['id']?>>Добавить в корзину</button>
    
</section>

<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'product.js']    
    ];
    include('modules/footer.php');
?>