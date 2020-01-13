<?php 
    $headerConfig = [
        'title'=>'Корзина',
        'styles'=>['style.css', 'basket.css']
    ];
    include('modules/header.php');
    //unset($_SESSION['basket']);
    $template = [
        'products'=>[],
        'full_price'=>0
    ];
    if( !empty( $_SESSION['basket'] ) ){
        foreach( $_SESSION['basket'] as $basket_item ){
            $sql_basket_item = "
                SELECT * FROM products WHERE id = {$basket_item['id']}
            ";
            $result_basket_item = mysqli_query($db, $sql_basket_item);
            $data_basket_item = mysqli_fetch_assoc($result_basket_item);
            $data_basket_item['quantity'] =  $basket_item['quantity'];
            $data_basket_item['full_price'] = $basket_item['quantity'] * $data_basket_item['price'];
            $template['products'][] = $data_basket_item;

            $template['full_price'] += $data_basket_item['full_price'];
        }
    }

    //d($template);
    //d($_SESSION['basket']);
    //echo json_encode($template);
?>


<!-- Начало кода Виноградовой -->

<main class="basket" style="padding-top:50px">
    <div class="basket__head head">
        <h1 class="head__title">Ваша корзина</h1>
        <p class="head__subtitle">Товары резервируются на ограниченное время</p>
    </div>
    <table class="basket__table table">
        <thead>
            <tr class="table__head">
                <th class="t-left">Фото</th>
                <th class="t-left">Наименование</th>
                <th>Размер</th>
                <th>Количество</th>
                <th>Стоимость</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>   
            <?php foreach( $template['products'] as $product ): ?>
            
            <tr class="table__products"  >
                <td class="t-left width-0">
                    <div class="items__pic" style="background-image:url(<?=$product['pic']?>)"></div>
                </td>
                <td class="t-left">
                    <div class="items__head"><a href="product.php?id=<?=$product['id']?>"><?=$product['name']?></a></div>
                    <div class="items__sku">арт. <?=$product['sku']?></div>
                </td>
                <td class="width-0">
                    <div class="item__size"><?=$product['size']?></div>
                </td>
                <td class="width-0">
                    
                    <div class="item__quantity-button" data-id="<?=$product['id']?>">
                        <div class="quantity-button_btn">+</div>
                        <div class="item__quantity-number"><?=$product['quantity']?></div>
                        <div class="quantity-button_btn">-</div>
                    </div>
                </td>
                <td class="width-0">
                    <div class="item-price"><?=$product['full_price']?> руб.</div>
                </td>
                <td class="width-0">
                    <div class="item-delete">Х</div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody> 
    </table>

    <div class="basket__zigzag zigzag">
        <div class="zigza__wrapper">
            <div class="orange-line-item1">
                <div class="orange-line down"></div>
                <div class="orange-line up"></div>
            </div>
            <div class="orange-line-item2">
                <div class="orange-line down"></div>
                <div class="orange-line up"></div>
            </div>
            <div class="orange-line-item3">
                <div class="orange-line down"></div>
                <div class="orange-line up"></div>
            </div>
        </div>
    </div>

    <div class="basket__middle head">
        <h1 class="head__title">Адрес доставки</h1>
        <p class="head__subtitle">Все поля обязательны для заполнения</p>
    </div>
    
    <form class="basket__form form" action="handlers/form.php" method="POST">
        <div class="form__block">
            <div class="form__block__select select">
                <label class="select__label" for="delivery-id">Выберите вариант доставки</label>
                <select class="select__select" id="delivery-id" name="delivery-option" required>
                    <option class="select__value" value="500">Курьерская служба - 500 руб.</option>
                    <option class="select__value" value="0">Самовывоз - 0 руб.</option>
                    <option class="select__value" value="100">Пункты выдачи - 100 руб.</option>
                </select>
            </div>
            
            <div class="form__block__input input">
                <div class="input__block input__block_fl-l input__block_pd-r">
                    <label class="input__block__label" for="name-id">Имя</label>
                    <input class="input__block__input" id="name-id" type="text" name="name" placeholder="Имя" value="">
                </div>
                <div class="input__block input__block_pd-l">
                    <label class="input__block__label" for="surname-id">Фамилия</label>
                    <input class="input__block__input" id="surname-id" type="text" name="surname" placeholder="Фамилия" value="">
                </div>
            </div>
            <div class="form__block__input input">
                <div class="input__block input__block_wh-100">
                    <label class="input__block__label" for="adress-id">Адрес</label>
                    <input class="input__block__input" id="adress-id" type="text" name="adress" placeholder="Адрес" value="">
                </div>
            </div>
                      
            <div class="form__block__input input">
                <div class="input__block input__block_fl-l input__block_pd-r">
                    <label class="input__block__label" for="city-id">Город</label>
                    <input class="input__block__input" id="city-id" type="text" name="city" placeholder="Город" value="">
                </div>
                <div class="input__block input__block_pd-l">
                    <label class="input__block__label" for="index-id">Индекс</label>
                    <input class="input__block__input" id="index-id" type="text" name="index" placeholder="Индекс" value="">
                </div>
            </div>
           
            <div class="form__block__input input">
                <div class="input__block input__block_fl-l input__block_pd-r">
                    <label class="input__block__label" for="phone-id">Телефон</label>
                    <input class="input__block__input" id="phone-id" type="text" name="phone" placeholder="+7(905) 184-81-40" value="">
                </div>
                <div class="input__block input__block_pd-l">
                    <label class="input__block__label" for="email-id">Email</label>
                    <input class="input__block__input" id="email-id" type="text" name="email" placeholder="Электронная почта" value="">
                </div>
            </div>
        </div>
      
        <div class="basket__payment payment ">
            <div class="payment__head head">
                <h1 class="head__title">Варианты оплаты</h1>
                <p class="head__subtitle">Все поля обязательны для заполнения</p>
            </div>
            
            <div class="payment__info ">
                <div class="payment__price">Стоимость: <?=$template['full_price']?> руб.</div>
                <div class="payment__delivery">Доставка: руб.</div>
                <div class="payment__price-delivery">Итого: руб.</div>
            </div>
          
            <div class="payment__options">
                <label class="payment__label" for="payment-id">Выберите способ оплаты</label>
                <select class="payment__select" id="payment-id" name="payment-select" required>
                    <option class="select-value" value="card">Банковская карта</option>
                    <option class="select-value" value="score">По счету</option>
                    <option class="select-value" value="cash">Наличными при получении</option>
                </select>
            </div>
            <button class="form__submit" type="submit"> Заказать </button>
        </div>
        

    </form>
</main>
        <!-- Конец кода Виноградовой -->

<?php 
    $footerConfig = [
        'scripts'=>['script.js', 'basket.js']    
    ];
    include('modules/footer.php');
?>